@extends('layouts.base')

@section('page-styles')
    <style>
    .ms-container .ms-selectable li.ms-hover, .ms-container .ms-selection li.ms-hover {
    background-color: #404e67;
}
    </style>
@endsection

@section('page_title')
<h4>Add a User</h4>
<span>Please fill the necessary fields</span>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
<a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="{{ route('create-user') }}">Add a User</a>
</li>
@endsection


@include('superadmin.navigation')


@section('page_content')
<div class="row">
<div class="col-lg-12 ">
        <!-- Flying Word card start -->
        <div class="card" id="add_user-modal">
            <div class="card-header">
                <h5 class="text-danger"> Please fill the necessary fields (*)</h5>
            <div v-if="errors.length"> @{{ errors}}</div>
            </div>
            <div class="card-block">
                <h6 class="sub-title">Personal details <span class="text-danger">(*)</span> </h6>
                <form >
                    <div class="form-group row">
                        <div :class="[errors.fullname ? 'col-sm-4 m-b-5 input-group input-group-danger' : 'col-sm-4 m-b-5 input-group input-group-inverse']">
                            {{-- <i class="text-danger m-t-5" v-if="errors.fullname" >@{{errors.fullname.toString()}}</i> --}}
                            <input id="fullname" type="text" class="form-control" placeholder="Fullname" v-model="fullname" data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.fullname" >
                            <span class="input-group-addon">
                                <i class="icofont icofont-user" data-toggle="tooltip" data-placement="top" :data-original-title="errors.fullname"></i>
                            </span>
                        </div>
                        <div :class="[errors.email ? 'col-sm-4 input-group input-group-danger' : 'col-sm-4 input-group input-group-inverse']">
                            <input type="text" class="form-control" placeholder="Email" v-model="email"
                            data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.email">
                            <span class="input-group-addon">
                                <i class="icofont icofont-mail"></i>
                            </span>
                        </div>
                        <div :class="[errors.telephone ? 'col-sm-4 input-group input-group-danger' : 'col-sm-4 input-group input-group-inverse']">
                            <input type="text" class="form-control" placeholder="Phone Number" v-model="telephone"
                            data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.telephone">
                            <span class="input-group-addon">
                                <i class="icofont icofont-telephone"></i>
                            </span>
                        </div>
                        <div :class="[errors.address ? 'col-sm-12 input-group input-group-danger' : 'col-sm-12 input-group input-group-inverse']">
                            <input type="text" class="form-control" placeholder="Adress" v-model="address"
                            data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.address">
                            <span class="input-group-addon">
                                <i class="icofont icofont-location-pin"></i>
                            </span>
                        </div>
                    </div>
                </form>
                <hr>
                <h5 class="sub-title">Affectation et Informations d'identification <span class="text-danger">(*)</span></h5>
                <form>
                    <div class="form-group row">
                        <div :class="[errors.structure_id ? 'col-sm-3 m-b-5 input-group input-group-danger' : 'col-sm-3 m-b-5 input-group input-group-inverse']"
                        data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.structure_id">
                            <select id="structure-types" class="selectpicker show-tick" title="Structure type.."
                            >
                                @foreach ($structureTypes as $structureType)
                                    <option value="{{$structureType->id}}">{{$structureType->name}}</option>
                                @endforeach
                            </select>
                            <span class="input-group-addon">
                                <i class="icofont icofont-listing-box"></i>
                            </span>
                        </div>

                        <div :class="[errors.structure_id ? 'col-sm-6 input-group input-group-danger' : 'col-sm-6 input-group input-group-inverse']"
                        data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.structure_id">
                            <select id="structures"  class="selectpicker show-tick" data-live-search="true" title="Structure name.." data-width="100%" data-size="8">

                                @foreach ($structureTypes as $structureType)
                                    <optgroup label="{{$structureType->name}}" >
                                        @foreach ($structureType->structures as $structure)
                                            <option value="{{$structure->id}}" v-model="structure_id"> {{$structure->name}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <span class="input-group-addon">
                                <i class="icofont icofont-sub-listing"></i>
                            </span>
                        </div>
                        <div :class="[errors.username ? 'col-sm-4 m-b-5 input-group input-group-danger' : 'col-sm-4 m-b-5 input-group input-group-inverse']">
                            <input type="text" class="form-control" placeholder="Username"
                            data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.username" v-model="username">
                            <span class="input-group-addon">
                                <i class="icofont icofont-business-man-alt-2"></i>
                            </span>
                        </div>
                        <div :class="[errors.password ? 'col-sm-4 input-group input-group-danger' : 'col-sm-4 input-group input-group-inverse']"
                        data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.password">
                            <input type="password" class="form-control" placeholder="Password" v-model="password">
                            <span class="input-group-addon">
                                <i class="icofont icofont-lock"></i>
                            </span>
                        </div>
                        <div :class="[errors.password ? 'col-sm-4 input-group input-group-danger' : 'col-sm-4 input-group input-group-inverse']"
                        data-toggle="tooltip" data-placement="top"
                        :data-original-title="errors.password">
                            <input type="password" class="form-control" placeholder="Password Confirmation" v-model="password_confirmation">
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
                        <p class="text-danger text-center m-t-5" v-if="errors.role_id" >@{{errors.role_id.toString()}}</p>
                        @foreach ($roles as $role)
                            <div class="radio radiofill  radio-inverse m-l-10 ">
                                <label class="clickable">
                                <input type="radio" name="radio" value="{{$role->id}}" v-model="role_id">
                                    <i class="helper"></i> {{$role->name}}
                                </label>
                            </div>
                        @endforeach

                    </div>
                    <div class="col-md-9">
                        <h4 class="sub-title text-center ">Select a Permission <span class="text-danger">(*)</span></h4>
                        <p class="text-danger text-center m-t-5" v-if="errors.permissions" >@{{errors.permissions.toString()}}</p>
                        <select  multiple id="permissions">
                            @foreach ($roles as $role)
                                <optgroup label="{{$role->name}}" >
                                    @foreach ($role->permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name }}</option>
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
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary m-r-10" v-on:click="add_user()">Save</button>
                        <button type="submit" class="btn btn-default" v-on:click="reset_form()">Restore</button>
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


    $('#structure-types').selectpicker({
        placeholder: "Type du structure.."
    });
    $('#structures').selectpicker({
        placeholder: "Nom du structure.."
    });


});
</script>
<script>
const app = new Vue({
  el: '#app',
        data(){
            return {
                fullname:'',
                email:'',
                telephone:'',
                address:'',
                username:'',
                password:'',
                password_confirmation:'',
                structure_id:'',
                role_id:'',
                permissions:[],
                selectedPermissions:[],
                errors:[],
                notifications:[],
                notifications_fetched: false,
            }
        },
        methods:{
        add_user(){
                var app = this;
                app.permissions = '';
                app.structure_id = $('#structures').selectpicker('val');
                app.selectedPermissions = $('#permissions').multiSelect().val();
                 console.log(app.selectedPermissions.length )
                if ( app.selectedPermissions.length > 0) {
                    app.selectedPermissions =  app.selectedPermissions.toString().split(',').map(Number);
                    app.permissions = app.selectedPermissions;
                }

                 console.log('structure_id = ',app.structure_id=='' )
                 console.log($('#permissions').multiSelect().val() )
                axios.post('/add_user', {
                    'fullname':app.fullname,
                    'email':app.email,
                    'telephone':app.telephone,
                    'address':app.address,
                    'username':app.username,
                    'password':app.password,
                    'password_confirmation':app.password_confirmation,
                    'structure_id':app.structure_id,
                    'role_id':app.role_id,
                    'permissions':app.permissions
                })
                .then(function (response) {
                    notify('Succès',response.data.success,'green', 'topCenter','bounceInDown');
                    app.reset_form();

                })
                .catch(function (error) {
                    if (error.response) {
                        //app.errors = error.response.data.errors;
                        console.log(error.response.data.errors);

                        app.$set(app,'errors', error.response.data.errors);
                    notify('Erreurs!','Please check your information','red', 'topCenter','bounceInDown');
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                });
            },
            reset_form(){
                this.fullname='';
                this.email='';
                this.telephone='';
                this.address='';
                this.username='';
                this.password='';
                this.password_confirmation='';
                this.structure_id='';
                this.role_id='';
                this.permissions=[];
                this.errors=[];

                $('#structures').selectpicker('val',null);
                $('#structure-types').selectpicker('val',null);
                $('#permissions').multiSelect('deselect_all');
            },


        },
        mounted(){
           console.log($('#structures').selectpicker('val'));

            // this.reset_form();
            $('#permissions').multiSelect({
                selectableHeader: "<div class='text-center bg-inverse'>Les permissions disponibles</div>",
                selectionHeader: "<div class='text-center bg-inverse'>Les permissions sélectionnées</div>",
                selectableOptgroup: true,
                keepOrder: true
            });
            }


});

</script>







@endsection
