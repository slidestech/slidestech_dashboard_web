@extends('layouts.base')

@section('page_title')
    <h4>Users List</h4>
    <span> Number of Users: <strong>@{{ number_users }}</strong> </span>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('users-list') }}">Users List</a>
    </li>
@endsection


@include('superadmin.navigation')


@section('page_content')
    <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add a User</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <!-- Flying Word card start -->
                            <div class="card" id="add-user-modal">
                                <div class="card-header">
                                    <h5 class="text-danger"> Please fill the necessary fields (*)</h5>
                                    <div v-if="errors.length"> @{{ errors }}</div>
                                </div>
                                <div class="card-block">
                                    <h6 class="sub-title">Personal details <span class="text-danger">(*)</span> </h6>
                                    <form>
                                        <div class="form-group row">
                                            <div
                                                :class="[errors.fullname ? 'col-sm-4 m-b-5 input-group input-group-danger' :
                                                    'col-sm-4 m-b-5 input-group input-group-inverse'
                                                ]">
                                                {{-- <i class="text-danger m-t-5" v-if="errors.fullname" >@{{ errors.fullname.toString() }}</i> --}}
                                                <input id="fullname" type="text" class="form-control"
                                                    placeholder="Fullname" v-model="fullname1" data-toggle="tooltip"
                                                    data-placement="top" :data-original-title="errors.fullname">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-user" data-toggle="tooltip"
                                                        data-placement="top" :data-original-title="errors.fullname"></i>
                                                </span>
                                            </div>
                                            <div
                                                :class="[errors.email ? 'col-sm-4 input-group input-group-danger' :
                                                    'col-sm-4 input-group input-group-inverse'
                                                ]">
                                                <input type="text" class="form-control" placeholder="Email"
                                                    v-model="email1" data-toggle="tooltip" data-placement="top"
                                                    :data-original-title="errors.email">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-mail"></i>
                                                </span>
                                            </div>
                                            <div
                                                :class="[errors.telephone ? 'col-sm-4 input-group input-group-danger' :
                                                    'col-sm-4 input-group input-group-inverse'
                                                ]">
                                                <input type="text" class="form-control" placeholder="Phone Number"
                                                    v-model="telephone1" data-toggle="tooltip" data-placement="top"
                                                    :data-original-title="errors.telephone">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-telephone"></i>
                                                </span>
                                            </div>
                                            <div
                                                :class="[errors.address ? 'col-sm-12 input-group input-group-danger' :
                                                    'col-sm-12 input-group input-group-inverse'
                                                ]">
                                                <input type="text" class="form-control" placeholder="Adress"
                                                    v-model="address1" data-toggle="tooltip" data-placement="top"
                                                    :data-original-title="errors.address">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-location-pin"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <h5 class="sub-title">Authentication Credentials <span class="text-danger">(*)</span>
                                    </h5>
                                    <form>
                                        <div class="form-group row">



                                            <div
                                                :class="[errors.username ? 'col-sm-4 m-b-5 input-group input-group-danger' :
                                                    'col-sm-4 m-b-5 input-group input-group-inverse'
                                                ]">
                                                <input type="text" class="form-control" placeholder="Username"
                                                    data-toggle="tooltip" data-placement="top"
                                                    :data-original-title="errors.username" v-model="username1">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-business-man-alt-2"></i>
                                                </span>
                                            </div>
                                            <div :class="[errors.password ? 'col-sm-4 input-group input-group-danger' :
                                                'col-sm-4 input-group input-group-inverse'
                                            ]"
                                                data-toggle="tooltip" data-placement="top"
                                                :data-original-title="errors.password">
                                                <input type="password" class="form-control" placeholder="Password"
                                                    v-model="password1">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-lock"></i>
                                                </span>
                                            </div>
                                            <div :class="[errors.password ? 'col-sm-4 input-group input-group-danger' :
                                                'col-sm-4 input-group input-group-inverse'
                                            ]"
                                                data-toggle="tooltip" data-placement="top"
                                                :data-original-title="errors.password">
                                                <input type="password" class="form-control"
                                                    placeholder="Password Confirmation" v-model="password_confirmation1">
                                                <span class="input-group-addon">
                                                    <i class="icofont icofont-lock"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <h5 class="sub-title">Roles and permissions <span class="text-danger">(*)</span></h5>
                                    <form class="row">
                                        <div class="form-radio col-md-3">
                                            <h4 class="sub-title">Select a Role <span class="text-danger">(*)</span></h4>
                                            <p class="text-danger text-center m-t-5" v-if="errors.role_id">
                                                @{{ errors.role_id.toString() }}</p>
                                            @foreach ($roles as $role)
                                                <div class="radio radiofill  radio-inverse m-l-10 ">
                                                    <label class="clickable">
                                                        <input type="radio" name="radio" value="{{ $role->id }}"
                                                            v-model="role_id1">
                                                        <i class="helper"></i> {{ $role->name }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="sub-title text-center ">Select a Permission <span
                                                    class="text-danger">(*)</span></h4>
                                            <p class="text-danger text-center m-t-5" v-if="errors.permissions">
                                                @{{ errors.permissions.toString() }}</p>
                                            <select multiple id="permissionss">
                                                @foreach ($roles as $role)
                                                    <optgroup label="{{ $role->name }}">
                                                        @foreach ($role->permissions as $permission)
                                                            <option value="{{ $permission->id }}">{{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                                {{-- <optgroup label="lool">
                                                    <option value="1">1</option>
                                                    <option value="3">2</option>
                                                    <option value="4">3</option>
                                                    <option value="2">4</option>
                                                </optgroup> --}}
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    {{-- <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-primary m-r-10" v-on:click="add_user()"
                                                data-dismiss="modal">Save</button>
                                            <button type="submit" class="btn btn-default"
                                                v-on:click="reset_form()">Cancel</button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button> --}}
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary m-r-10" v-on:click="add_user()"
                                data-dismiss="modal">Save</button>
                            <button type="submit" class="btn btn-default" v-on:click="reset_form()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div :class="[!show_edit ? 'col-lg-12 animated fadeInDown' : 'col-lg-12 animated fadeOutDown']"
            v-show="!show_edit">
            <div class="card">
                <div class="card-header table-card-header">
                    <h5>Users List</h5>

                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li>
                                <span data-toggle="tooltip" data-placement="top" data-original-title="Add a User">
                                    <i class="feather icon-plus text-success md-trigger" data-toggle="modal"
                                        data-target="#add-user-modal">
                                    </i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-block">
                    <div class="dt-responsive table-responsive">

                        <table id="users-table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px">#</th>
                                    <th>Username</th>
                                    <th>Nom - Prénom</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>



                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr id="tr_{{ $index }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->telephone }}</td>




                                        <td>
                                            <div class="text-center">
                                                {{-- <a href="{{ route('edit-user', $user->id) }}"> --}}
                                                <i data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Modifier"
                                                    class="feather icon-edit text-custom f-18 clickable md-trigger"
                                                    v-on:click="edit_user({{ $user }})">
                                                </i>
                                                {{-- </a> --}}
                                                <i class="feather icon-trash text-danger f-18 clickable"
                                                    v-on:click="delete_user({{ $user->id }},{{ $index }})"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Supprimer">
                                                </i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div :class="[show_edit ? 'col-lg-12 animated fadeInRight' : 'col-lg-12 animated fadeOutRight']"
            v-show="show_edit">
            <!-- Flying Word card start -->
            <div class="card">
                <div class="card-header">
                    <h5 class="text-danger">Please fill the necessary fields (*)</h5>
                    <div v-if="errors.length"> @{{ errors }}</div>
                </div>
                <div class="card-block">
                    <h6 class="sub-title">Personal details <span class="text-danger">(*)</span> </h6>
                    <form>
                        <div class="form-group row">
                            <div
                                :class="[errors.fullname ? 'col-sm-4 m-b-5 input-group input-group-danger' :
                                    'col-sm-4 m-b-5 input-group input-group-inverse'
                                ]">
                                {{-- <i class="text-danger m-t-5" v-if="errors.fullname" >@{{ errors.fullname.toString() }}</i> --}}
                                <input id="fullname" type="text" class="form-control" placeholder="Nom et Prénom"
                                    v-model="fullname" data-toggle="tooltip" data-placement="top"
                                    :data-original-title="errors.fullname">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-user" data-toggle="tooltip" data-placement="top"
                                        :data-original-title="errors.fullname"></i>
                                </span>
                            </div>
                            <div
                                :class="[errors.email ? 'col-sm-4 input-group input-group-danger' :
                                    'col-sm-4 input-group input-group-inverse'
                                ]">
                                <input type="text" class="form-control" placeholder="Email" v-model="email"
                                    data-toggle="tooltip" data-placement="top" :data-original-title="errors.email">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-mail"></i>
                                </span>
                            </div>
                            <div
                                :class="[errors.telephone ? 'col-sm-4 input-group input-group-danger' :
                                    'col-sm-4 input-group input-group-inverse'
                                ]">
                                <input type="text" class="form-control" placeholder="Numéro de télételephone"
                                    v-model="telephone" data-toggle="tooltip" data-placement="top"
                                    :data-original-title="errors.telephone">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-telephone"></i>
                                </span>
                            </div>
                            <div
                                :class="[errors.address ? 'col-sm-12 input-group input-group-danger' :
                                    'col-sm-12 input-group input-group-inverse'
                                ]">
                                <input type="text" class="form-control" placeholder="Adresse" v-model="address"
                                    data-toggle="tooltip" data-placement="top" :data-original-title="errors.address">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-location-pin"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h5 class="sub-title">Authentication Credentilas<span class="text-danger">(*)</span></h5>
                    <form>
                        <div class="form-group row">
                            <div
                                :class="[errors.username ? 'col-sm-4 m-b-5 input-group input-group-danger' :
                                    'col-sm-4 m-b-5 input-group input-group-inverse'
                                ]">
                                <input type="text" class="form-control" placeholder="Username" data-toggle="tooltip"
                                    data-placement="top" :data-original-title="errors.username" v-model="username">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-business-man-alt-2"></i>
                                </span>
                            </div>
                            <div :class="[errors.password ? 'col-sm-4 input-group input-group-danger' :
                                'col-sm-4 input-group input-group-inverse'
                            ]"
                                data-toggle="tooltip" data-placement="top" :data-original-title="errors.password">
                                <input type="password" class="form-control" placeholder="Password" v-model="password">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-lock"></i>
                                </span>
                            </div>
                            <div :class="[errors.password ? 'col-sm-4 input-group input-group-danger' :
                                'col-sm-4 input-group input-group-inverse'
                            ]"
                                data-toggle="tooltip" data-placement="top" :data-original-title="errors.password">
                                <input type="password" class="form-control" placeholder="Password confirmation"
                                    v-model="password_confirmation">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-lock"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h5 class="sub-title">Roles and Permissions<span class="text-danger">(*)</span></h5>
                    <form class="row">
                        <div class="form-radio col-md-3">
                            <h4 class="sub-title">Select a role <span class="text-danger">(*)</span></h4>
                            <p class="text-danger text-center m-t-5" v-if="errors.role_id">@{{ errors.role_id.toString() }}</p>
                            @foreach ($roles as $role)
                                <div class="radio radiofill  radio-inverse m-l-10 ">
                                    <label class="clickable">
                                        <input type="radio" name="role" value="{{ $role->id }}"
                                            v-model="role_id">
                                        <i class="helper"></i> {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                        <div class="col-md-9">
                            <h4 class="sub-title text-center ">Select a permission <span class="text-danger">(*)</span>
                            </h4>
                            <p class="text-danger text-center m-t-5" v-if="errors.permissions">@{{ errors.permissions.toString() }}</p>
                            <select class="form-control form-control-inverse" multiple="multiple" id="permissions">
                                @foreach ($roles as $role)
                                    <optgroup label="{{ $role->name }}">
                                        @foreach ($role->permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach

                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary m-r-10"
                                v-on:click="update_user(user_id)">Save</button>
                            <button type="submit" class="btn btn-default"
                                v-on:click="reset_form();show_edit=false;">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable();

            $('#permissions').multiSelect({
                selectableHeader: "<div class='custom-header bg-inverse'>Les permissions disponibles</div>",
                selectionHeader: "<div class='custom-header bg-inverse'>Les permissions sélectionnées</div>",
                selectableOptgroup: true,
                keepOrder: true
            });
            $('#permissionss').multiSelect({
                selectableHeader: "<div class='custom-header bg-inverse'>Les permissions disponibles</div>",
                selectionHeader: "<div class='custom-header bg-inverse'>Les permissions sélectionnées</div>",
                selectableOptgroup: true,
                keepOrder: true
            });
            $('#structure-types').selectpicker({});
            $('#structures').selectpicker({});
        });
    </script>

    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    show_edit: false,
                    show_add: false,
                    fullname: '<?php echo $user->fullname; ?>',
                    email: '<?php echo $user->email; ?>',
                    telephone: '<?php echo $user->telephone; ?>',
                    address: '<?php echo $user->address; ?>',
                    username: '<?php echo $user->username; ?>',
                    password: '',
                    password_confirmation: '',

                    fullname1: '',
                    email1: '',
                    telephone1: '',
                    address1: '',
                    username1: '',
                    password1: '',
                    structure_id1: '',
                    role_id1: '',
                    password_confirmation1: '',
                    structure_id: '',
                    role_id: '',
                    permissions: [],
                    selectedPermissions: [],
                    user_id: '',

                    number_users: "<?php echo $users->count(); ?>",
                    notifications: [],
                    notifications_fetched: false,
                    errors: [],
                }
            },
            methods: {
                delete_user(id, index) {
                    swal({
                            title: "Êtes-vous sûr?",
                            text: "Cette action est irréversible!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Supprimer",
                            cancelButtonText: "Annuler",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                axios.delete('/user_delete/' + id)
                                    .then(function(response) {
                                        if (response.data.error) {
                                            // app.users.splice(index,1)
                                            notify('Erreur', response.data.error, 'red', 'topCenter',
                                                'bounceInDown');
                                        } else {
                                            $('#tr_' + index).remove();
                                            notify('Succès', response.data.success, 'green', 'topCenter',
                                                'bounceInDown');
                                        }
                                    });
                            }
                        }
                    )

                },
                update_user(id) {
                    var app = this;
                    app.permissions = '';
                    app.structure_id = $('#structures').selectpicker('val');
                    app.selectedPermissions = $('#permissions').multiSelect().val();
                    console.log(app.selectedPermissions.length)
                    if (app.selectedPermissions.length > 0) {
                        app.selectedPermissions = app.selectedPermissions.toString().split(',').map(Number);
                        app.permissions = app.selectedPermissions;
                    }
                    axios.put('/update_user/' + id, {
                            'fullname': app.fullname,
                            'email': app.email,
                            'telephone': app.telephone,
                            'address': app.address,
                            'username': app.username,
                            'password': app.password,
                            'password_confirmation': app.password_confirmation,
                            'structure_id': app.structure_id,
                            'role_id': app.role_id,
                            'permissions': app.permissions
                        })
                        .then(function(response) {
                            //notify('Succès',response.data.success,'green', 'topCenter','bounceInDown');
                            //  app.show_edit =false;
                            swal({
                                    title: "Succès?",
                                    text: "Informations modifiées avec succès!",
                                    type: "success",
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Fermer",
                                    closeOnConfirm: true,
                                },
                                function(isConfirm) {
                                    if (isConfirm) {

                                        location.reload();
                                    }
                                }
                            )

                        })
                        .catch(function(error) {
                            if (error.response) {
                                //app.errors = error.response.data.errors;
                                console.log(error.response.data.errors);

                                app.$set(app, 'errors', error.response.data.errors);
                                notify('Erreurs!', 'Veuillez vérifier les informations introduites', 'red',
                                    'topCenter', 'bounceInDown');
                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                },
                edit_user(user) {
                    var app = this;
                    app.show_edit = true;
                    app.reset_form();

                    user.permissions.forEach(permission => {
                        app.permissions.push(permission.id.toString());
                    });

                    $('#permissions').multiSelect('select', app.permissions);
                    // $('#structure-types').selectpicker('val',user.structure.structure_type_id);
                    // $('#structures').selectpicker('val',user.structure_id);
                    // $('#state').val(user.structure.state);

                    app.fullname = user.fullname;
                    app.email = user.email;
                    app.telephone = user.telephone;
                    app.address = user.address;
                    app.username = user.username;
                    app.role_id = user.roles[0].id;
                    app.user_id = user.id;

                },
                add_user() {
                    var app = this;
                    app.permissions = '';
                    app.structure_id = $('#structures').selectpicker('val');
                    app.selectedPermissions = $('#permissions').multiSelect().val();
                    console.log(app.selectedPermissions.length)
                    if (app.selectedPermissions.length > 0) {
                        app.selectedPermissions = app.selectedPermissions.toString().split(',').map(Number);
                        app.permissions = app.selectedPermissions;
                    }

                    console.log('structure_id = ', app.structure_id == '')
                    console.log($('#permissions').multiSelect().val())
                    axios.post('/add_user', {
                            'fullname': app.fullname,
                            'email': app.email,
                            'telephone': app.telephone,
                            'address': app.address,
                            'username': app.username,
                            'password': app.password,
                            'password_confirmation': app.password_confirmation,
                            'structure_id': app.structure_id,
                            'role_id': app.role_id,
                            'permissions': app.permissions
                        })
                        .then(function(response) {
                            notify('Succès', response.data.success, 'green', 'topCenter', 'bounceInDown');
                            app.reset_form();

                        })
                        .catch(function(error) {
                            if (error.response) {
                                //app.errors = error.response.data.errors;
                                console.log(error.response.data.errors);

                                app.$set(app, 'errors', error.response.data.errors);
                                notify('Erreurs!', 'Veuillez vérifier les informations introduites', 'red',
                                    'topCenter', 'bounceInDown');
                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                },
                reset_form() {
                    var app = this;
                    app.fullname = '';
                    app.email = '';
                    app.telephone = '';
                    app.address = '';
                    app.username = '';
                    app.password = '';
                    app.password_confirmation = '';
                    app.structure_id = '';
                    app.role_id = '';
                    app.permissions = [];
                    app.selectedPermissions = '';
                    app.user_id = '';

                    app.errors = '';

                }
            },
        });
    </script>
@endsection
