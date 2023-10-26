<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\StructureTypeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/users_list', [UserController::class, 'show'])->name('users-list')->middleware(['auth', 'role:admin|superadmin']);


Auth::routes();
Route::get('/', [UserController::class, 'index'])->name('home')->middleware('auth');
Route::get('/landing', [UserController::class, 'landing'])->name('landing');

Route::get('/user_profile', [UserController::class, 'user_profile'])->name('user-profile')->middleware('auth');
Route::post('/change_password', [UserController::class, 'change-password'])->name('change-password')->middleware('auth');
Route::put('/update_information', [UserController::class, 'update_information'])->name('update-profile')->middleware('auth');
Route::get('/get_users', [UserController::class, 'get_users'])->name('get-users')->middleware(['auth', 'role:admin|superadmin']);
Route::get('/create_user', [UserController::class, 'create'])->name('create-user')->middleware(['auth', 'role:admin|superadmin']);
Route::post('/add_user', [UserController::class, 'store'])->name('user-add')->middleware(['auth', 'role:admin|superadmin']);
Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('edit-user')->middleware(['auth', 'role:admin|superadmin']);
Route::put('/update_user/{id}', [UserController::class, 'update'])->name('update-user')->middleware(['auth', 'role:admin|superadmin']);
Route::delete('/user_delete/{id}', [UserController::class, 'destroy'])->name('user-delete')->middleware(['auth', 'role:admin|superadmin']);


Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers')->middleware(['auth', 'role:admin|superadmin']);


Route::get('/roles_list', [RoleController::class, 'index'])->name('roles-list')->middleware(['auth', 'role:superadmin']);
// Route::get('/services_list', [ServiceController::class, 'index'])->name('services-list')->middleware(['auth', 'role:superadmin|admin']);

Route::get('/getRoles', [RoleController::class, 'getRoles'])->name('getRoles')->middleware(['auth', 'role:superadmin']);
Route::get('/getServices', [ServiceController::class, 'getServices'])->name('geServices')->middleware(['auth', 'role:superadmin|admin']);
Route::post('/role_assign_permissions/{id}', [RoleController::class, 'assignPermissions'])->name('role-assign-permissions')->middleware(['auth', 'role:superadmin']);

Route::post('/role_revoke_permission/{id}', [RoleController::class, 'revokePermission'])->name('role-revoke-permissions')->middleware(['auth', 'role:superadmin']);
Route::post('/role_add', [RoleController::class, 'store'])->name('role-add')->middleware(['auth', 'role:superadmin']);

Route::put('/role_edit/{id}', [RoleController::class, 'update'])->name('role-update')->middleware(['auth', 'role:superadmin']);

Route::delete('/role_delete/{id}', [RoleController::class, 'destroy'])->name('role-delete')->middleware(['auth', 'role:superadmin']);

Route::get('/permissions_list', [PermissionController::class, 'index'])->name('permissions-list')->middleware(['auth', 'role:superadmin']);
Route::post('/permission_add', [PermissionController::class, 'store'])->name('permission-add')->middleware(['auth', 'role:superadmin']);

Route::put('/permission_edit/{id}', [PermissionController::class, 'update'])->name('permission-update')->middleware(['auth', 'role:superadmin']);

Route::delete('/permission_delete/{id}', [PermissionController::class, 'destroy'])->name('permission-delete')->middleware(['auth', 'role:superadmin']);

Route::get('/getPermissions', [PermissionController::class, 'getPermissions'])->name('getPermissions')->middleware(['auth', 'role:superadmin']);







Route::resource('permissions', PermissionController::class);
// Route::resource('services', ServiceController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);


Route::resource('states', StateController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);
Route::resource('tasks', TaskController::class)->middleware(['auth', 'role_or_permission:admin|superadmin|user']);
Route::get('getTasks', [TaskController::class, 'getTasks'])->name('get-tasks')->middleware(['auth', 'role:superadmin|user']);



Route::resource('communes', CommuneController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);

Route::get('states_list', [StateController::class, 'index'])->name('states-list')->middleware(['auth', 'role:superadmin']);
Route::get('communes_list', [CommuneController::class, 'index'])->name('communes-list')->middleware(['auth', 'role:superadmin']);
Route::get('/getStates', [StateController::class, 'getStates'])->name('getStates')->middleware(['auth', 'role:superadmin']);
Route::delete('/state_delete/{id}', [StateController::class, 'destroy'])->name('state-delete')->middleware(['auth', 'role:superadmin']);
Route::delete('/commune_delete/{id}', [CommuneController::class, 'destroy'])->name('commune-delete')->middleware(['auth', 'role:superadmin']);
Route::get('/getCommunes', [CommuneController::class, 'getCommunes'])->name('getCommunes')->middleware(['auth', 'role:superadmin']);
Route::post('/stateAddCommunes/{id}', [StateController::class, 'addCommunes'])->name('addCommunes')->middleware(['auth', 'role:superadmin']);


Route::resource('services', ServiceController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);
Route::resource('questions', QuestionController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);
Route::get('services_list', [ServiceController::class, 'index'])->name('services-list')->middleware(['auth', 'role:superadmin']);
Route::put('/services_edit/{id}', [ServiceController::class, 'update'])->name('service-update')->middleware(['auth', 'role:superadmin']);

Route::get('questions_list', [QuestionController::class, 'index'])->name('questions-list')->middleware(['auth', 'role:superadmin']);
Route::get('/getServices', [ServiceController::class, 'getServices'])->name('getServices')->middleware(['auth', 'role:superadmin|user']);
// Route::delete('/service_delete/{id}', [ServiceController::class, 'destroy'])->name('service-delete')->middleware(['auth', 'role:superadmin']);
Route::delete('/question_delete/{id}', [QuestionController::class, 'destroy'])->name('question-delete')->middleware(['auth', 'role:superadmin']);
Route::get('/getQuestions', [QuestionController::class, 'getQuestions'])->name('getQuestions')->middleware(['auth', 'role:superadmin']);
Route::get('/getQuestions/{id}', [UserController::class, 'getQuestions'])->name('getQuestions')->middleware(['auth', 'role:superadmin']);
Route::get('/attachDocuments', [QuestionController::class, 'attachDocuments'])->name('attachDocuments')->middleware(['auth', 'role:superadmin']);
Route::post('/servicesAddQuestion/{id}', [ServiceController::class, 'addQuestions'])->name('addQuestions')->middleware(['auth', 'role:superadmin']);

Route::get('structures_list', [StructureController::class, 'index'])->name('structures-list')->middleware(['auth', 'role:superadmin']);
Route::resource('structures', StructureController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);
Route::resource('structuretypes', StructureTypeController::class)->middleware(['auth', 'role_or_permission:admin|superadmin']);
Route::get('states_list', [StateController::class, 'index'])->name('states-list')->middleware(['auth', 'role:superadmin']);

Route::get('/getStructures', [StructureController::class, 'getStructures'])->name('getStructures')->middleware(['auth', 'role:superadmin']);
Route::delete('/structure_delete/{id}', [StructureController::class, 'destroy'])->name('structure-delete')->middleware(['auth', 'role:superadmin']);

Route::get('structuretypes_list', [StructureTypeController::class, 'index'])->name('structuretypes-list')->middleware(['auth', 'role:superadmin']);
Route::delete('/structuretype_delete/{id}', [StructureTypeController::class, 'destroy'])->name('structuretype-delete')->middleware(['auth', 'role:superadmin']);
Route::get('/getTypes', [StructureTypeController::class, 'getTypes'])->name('getTypes')->middleware(['auth', 'role:superadmin']);

Route::get('/getDocuments/{id}', [QuestionController::class, 'getDocuments'])->name('getDocuments')->middleware(['auth', 'role:superadmin|user']);
