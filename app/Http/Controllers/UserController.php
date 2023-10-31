<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Vehicle as Vehicle;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Driver;
use App\Models\Insurance;
use App\Models\Affectation;
use App\Models\StructureType as StructureType;
use \Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\View;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Notifications\DriverLicenceExpired;
use Carbon\Carbon;
use File;
use App\Charts\SampleChart;
use App\Models\Question;
use App\Models\Service;
use Charts;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\UploadedFile;
use App\Notifications\VehicleTaxExpired;
use App\Notifications\VehicleControlExpired;
use App\Notifications\VehicleInsuranceExpired;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $affectation = Affectation::findOrFail(3);
        // // AGENCE Tiaret/DECISIONS-AFFECTATION/4P47N1Kd0o8poGn5SWgnFkbAkz2kYvRdduUnr8AP.pdf

        // unlink(public_path('storage/'."AGENCE Tiaret/DECISIONS-AFFECTATION/4P47N1Kd0o8poGn5SWgnFkbAkz2kYvRdduUnr8AP.pdf"));
        // if (Auth::user()->hasRole('admin')) {

        // return view('admin.home');
        //} else return 'load the manager home';
        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();

        switch ($role) {
            case 'superadmin':
                return view('superadmin.home');
                break;
            case 'user':
                //$agents = Agent::where('structure_id',Auth::user()->structure_id)->get();
                return view('user.home');
                break;
            case 'admin':
                return view('admin.home');
                break;
            case 'responsable_patrimoine':
                return view('parc_manager.home');
                break;
            case 'superviseur':
                return view('parc_manager.home');
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        switch ($role) {
            case 'superadmin':
                $roles = Role::with('permissions')->get();
                $permissions = Permission::all();
                $structureTypes = StructureType::with('structures')->get();
                return view('superadmin.add_user', compact('roles', 'permissions', 'structureTypes'));
                break;
            case 'admin':
                $roles = Role::with('permissions')->whereNotIn('name', ['superadmin', 'admin', 'manager'])->get();
                $permissions = Permission::all();
                return view('admin.add_user', compact('roles', 'permissions'));
                break;
        }
    }

    public function user_profile()
    {
        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        switch ($role) {
            case 'superadmin':
                return view('superadmin.user_profile');
                break;
            case 'admin':
                return view('admin.user_profile');
                break;
            case 'user':
                return view('user.user_profile');
                break;
            case 'superviseur':
                return view('parc_manager.user_profile');
                break;
        }
    }

    public function update_information(Request $request)
    {
        $user = User::find(Auth::user()->id);



        $this->validate($request, [

            'password' => 'nullable|min:5|max:25|string|confirmed',
            'fullname' => 'required|min:5|max:150|string',
            'address' => 'required|max:150|string',
            'telephone' => "required|unique:users,telephone,$user->id",
            'email' => "required|email|unique:users,email,$user->id"


        ]);


        $user->fullname = $request->fullname;
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'success' => 'Informations modifiées avec succès',
            'user' => $user
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->email = $request->email;

        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        if ($role != 'superadmin') {
            $user->structure_id = Auth::user()->commune_id;
        } else {

            $user->commune_id = $request->commune_id;
        }


        $user->password = Hash::make($request->password);

        $user->save();

        $user->assignRole($request->role_id);
        $user->syncPermissions($request->permissions);

        return response()->json([
            'success' => 'Utilisateur créé avec succès',
            'user' => $user
        ]);
    }

    public function show()
    {
        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        switch ($role) {
            case 'superadmin':
                $users = User::with('permissions', 'roles')->get();
                $roles = Role::with('permissions')->get();
                $structureTypes = StructureType::with('structures')->get();
                return view('superadmin.users_list', compact('users', 'roles', 'structureTypes'));
                break;
            case 'admin':
                $roles = Role::with('permissions')->whereNotIn('name', ['superadmin', 'admin', 'manager'])->get();
                $users = User::with('structure', 'permissions', 'roles')->where('structure_id', Auth::user()->structure_id)->where('id', '!=', Auth::user()->id)->get();
                return view('admin.users_list', compact('users', 'roles'));
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);
        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        switch ($role) {
            case 'superadmin':
                $roles = Role::all();
                $permissions = Permission::all();
                return view('superadmin.edit_user', compact('user', 'roles', 'permissions'));
                break;
            case 'admin':
                $roles = Role::with('permissions')->whereNotIn('name', ['superadmin', 'admin'])->get();
                $permissions = Permission::all();
                return view('admin.edit_user', compact('user', 'roles', 'permissions'));
                break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$validated = $request->validated();


        $user = User::findOrFail($id);
        $this->authorize('update', $user);


        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->email = $request->email;

        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        if ($role != 'superadmin') {
            $user->structure_id = Auth::user()->structure_id;
        } else {
            $user->structure_id = $request->structure_id;
        }


        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->syncRoles($request->role_id);
        $user->syncPermissions($request->permissions);

        return response()->json([
            'success' => 'Informations modifiées avec succès',
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        if ($user->id != Auth::user()->id) {
            $user->delete();
            return response()->json([
                'success' => 'Utilisateur supprimé avec succès!!'
            ]);
        } else {
            return response()->json([
                'error' => 'Erreur lors de la suppression!!'
            ]);
        }
    }
    public function getUsers()
    {
        $users = User::where('structure_id', Auth::user()->structure_id)->where('id', '!=', Auth::user()->id)->get();

        return response()->json([
            'users' => $users,
        ]);
    }
    public function get_users()
    {
        $authUser = User::find(Auth::user()->id);
        $role = $authUser->getRoleNames()->first();
        switch ($role) {
            case 'superadmin':
                $users = User::with('structure')->where('id', '!=', Auth::user()->id)->get();
                return compact('users');
                break;
            case 'admin':
                $users = User::with('structure')->where('structure_id', Auth::user()->structure_id)->where('id', '!=', Auth::user()->id)->get();
                return compact('users');
                break;
        }
    }

    public function landing()
    {



        // $questions = Question::whereNull('question_id')
        //     ->with('childrenQuestions')
        //     ->get();
        $services = Service::all();
        $questionCount = Question::query()->count();
        $questions = Question::all();
        return view('user.home', compact(
            'services',
            'questionCount',
            'questions'
        )
        );
    }



    public function getQuestions(Request $request)
    {
        $questions = Question::where('question_id', '=', $request->id)->get();
        return compact('questions');
    }
}
