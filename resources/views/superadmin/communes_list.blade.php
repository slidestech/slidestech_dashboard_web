@extends('layouts.base')

@section('page_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('pages/list-scroll/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/stroll/css/stroll.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/demo.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/j-pro-modern.css') }}">


@endsection

@section('page_title')
<h4>Communes List</h4>
<span>Add, edit and delete a Commune</span>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
<a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="{{ route('communes-list') }}">Communes List</a>
</li>
@endsection


@include('superadmin.navigation')


@section('page_content')
<div class="row">
    <!-- Modal static-->
    <div class="modal fade" id="add-commune-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a commune</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']" placeholder="Enter commune name..." maxlength="25" v-model="newCommuneName" required v-on:input="errors.name=null" />
                    <p class="text-danger m-t-5" v-if="errors.name">@{{errors.name.toString()}}</p>
                    <br>
                    <input type="text" :class="[errors.code ? 'form-control form-control-danger' : 'form-control form-control-success']" placeholder="Enter commune code..." maxlength="25" v-model="newCommuneCode" required v-on:input="errors.code=null" />
                    <p class="text-danger m-t-5" v-if="errors.code">@{{errors.code.toString()}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" v-on:click="add_commune()">Save</button>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade" id="edit-commune-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit commune</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']" maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedCommuneName" v-model="communeName" />
                        <p class="text-danger m-t-5" v-if="errors.name">@{{errors.name.toString()}}</p>
                        <br>
                        <input type="text" :class="[errors.code ? 'form-control form-control-danger' : 'form-control form-control-success']" maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedCommuneCode" v-model="communeCode" />
                        <p class="text-danger m-t-5" v-if="errors.code">@{{errors.code.toString()}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" v-on:click="update_commune(communeName,communeCode,selectedCommuneIndex)">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 la-sm-12">

        <div class="card">
            <div class="card-header table-card-header">

                <h5>Communes List</h5>

                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <span data-toggle="tooltip" data-placement="top" data-original-title="Add a Commune">
                                <i class="feather icon-plus text-success md-trigger" data-toggle="modal"
                                   data-target="#add-commune-modal">
                                </i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="card-block">
                <div class="dt-responsive table-responsive" style="max-height:500px;">

                    <table id="permissions-table" class="table table-hover table-bordered nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:25px">#</th>
                                <th>Commune</th>
                                <th>Code</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(commune, index) in communes" v-bind:key="index"
                            v-on:click="selectedCommuneIndex = index">
                                <td>@{{ index+1}}</td>
                                <td>@{{ commune.name }}</td>
                                <td>@{{ commune.code }}</td>
                                <td>
                                    <div class="text-center">
                                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                            <i class="feather icon-edit text-custom f-18 clickable md-trigger"
                                                data-toggle="modal" data-target="#edit-commune-modal"
                                                v-on:click="communeName=commune.name, communeCode=commune.code, selectedCommune=commune.id">
                                            </i>
                                        </span>
                                        <i class="feather icon-trash text-danger f-18 clickable" v-on:click="deleteCommune(commune.id, index)"
                                            data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                        </i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection

@section('page_scripts')
<script type="text/javascript" src="{{ asset('bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>

<script>
const app = new Vue({
  el: '#app',
  data() {
            return {
                selectedCommune: '',
                communeName: '',
                communeCode: '',
                newCommuneName: '',
                newCommuneCode: '',
                selectedCommuneName: '',
                selectedCommuneCode: '',
                selectedCommuneIndex: '',
                communes: [],
                selectedCommunes: [],
                errors: [],
                notifications: [],
                notifications_fetched: false,
            }
        },
        methods:{
            fetch_communes() {
                return axios.get('/getCommunes')
                    .then(response => {
                        this.communes = response.data.communes;
                        console.log('Communes fetched successfully');
                        console.log(this.communes);
                    })
                    .catch();
            },
            deleteCommune(id, index) {
                swal({
                        title: "Are you sure?",
                        text: "This action is irreversible!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            axios.delete('/commune_delete/' + id)
                                .then(function(response) {
                                    if (response.data.success) {
                                        app.communes.splice(index, 1)
                                        app.selectedCommuneName = '';
                                        app.selectedCommuneIndex = '';
                                        notify('Success', response.data.success, 'green', 'topCenter', 'bounceInDown');
                                    } else {
                                        notify('Error', response.data.error, 'red', 'topCenter', 'bounceInDown');
                                    }
                                });
                        }
                    }
                );

            },
            add_commune() {
                axios.post('/communes', {
                        'name': app.newCommuneName,
                        'code': app.newCommuneCode,
                    })
                    .then(function(response) {
                        app.communes.push(response.data.commune);
                        $('#add-commune-modal').modal('toggle');
                        app.newCommuneName = '';
                        app.newCommuneCode = '';
                        app.selectedCommuneName = '';
                        app.selectedCommuneIndex = '';
                        notify('Success', response.data.success, 'green', 'topCenter', 'bounceInDown');
                    })
                    .catch(function(error) {
                        if (error.response) {
                            app.$set(app, 'errors', error.response.data.errors);
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
            },
            update_commune(name, code, index) {
                axios.put('/communes/' + this.selectedCommune, {
                        'name': name,
                        'code': code,
                    })
                    .then(function(response) {
                        app.$set(app.communes, index, response.data.commune);
                        $('#edit-commune-modal').modal('toggle');
                        app.communeName = '';
                        app.communeCode = '';
                        notify('Success', response.data.success, 'green', 'topCenter', 'bounceInDown');
                    })
                    .catch(function(error) {
                        if (error.response) {
                            app.$set(app, 'errors', error.response.data.errors);
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });

            },
        },
        created() {
            this.fetch_communes();
            console.log('Communes List created..');
        },
        mounted() {
            this.fetch_communes();
        }
});
</script>

@endsection
