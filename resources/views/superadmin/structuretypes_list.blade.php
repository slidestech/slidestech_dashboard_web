@extends('layouts.base')

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/list-scroll/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/stroll/css/stroll.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/demo.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/j-pro-modern.css') }}">
@endsection

@section('page_title')
    <h4>Structure Types List</h4>
    <span>Add, edit and delete a Structure Type</span>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('structuretypes-list') }}">Structure Type List</a>
    </li>
@endsection


@include('superadmin.navigation')


@section('page_content')
    <div class="row">
        <!-- Modal static-->
        <div class="modal fade" id="add-structureType-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a Structure Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text"
                            :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']"
                            placeholder="Enter Structure Type name..." maxlength="25" v-model="newStructureTypeName"
                            required v-on:input="errors.name=null" />
                        <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.name.toString() }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            v-on:click="add_structuretype()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit-structuretype-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Structure Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text"
                            :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']"
                            maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedStructureTypeName"
                            v-model="structureTypeName" />
                        <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.name.toString() }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            v-on:click="update_structuretype(structureTypeName,selectedStructureTypeIndex)">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-5">

        <div class="card">
            <div class="card-header table-card-header">

                <h5>Structure Types List</h5>

                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <span data-toggle="tooltip" data-placement="top" data-original-title="Add a Structure">
                                <i class="feather icon-plus text-success md-trigger" data-toggle="modal"
                                    data-target="#add-structureType-modal">
                                </i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="card-block">
                <div class="dt-responsive table-responsive">

                    <table id="permissions-table" class="table table-hover table-bordered nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:20px">#</th>
                                <th>Structure Type</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(structureType, index) in structuretypes" v-bind:key="index"
                                v-on:click="selectedStructureTypeIndex = index">
                                <td>@{{ index + 1 }}</td>
                                <td>@{{ structureType.name }}</td>
                                <td>
                                    <div class="text-center">
                                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                            <i class="feather icon-edit text-custom f-18 clickable md-trigger"
                                                data-toggle="modal" data-target="#edit-structuretype-modal"
                                                v-on:click="structureTypeName=structureType.name, selectedStructure=structureType.id">
                                            </i>
                                        </span>
                                        <i class="feather icon-trash text-danger f-18 clickable"
                                            v-on:click="deleteStructureType(structureType.id, index)"
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
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js') }}">
    </script>

    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    selectedStructureType: '',
                    structureTypeName: '',
                    newStructureTypeName: '',
                    selectedStructureTypeName: '',
                    selectedStructureTypeIndex: '',
                    structuretypes: [],
                    errors: [],
                    notifications: [],
                    notifications_fetched: false,
                }
            },
            methods: {
                fetch_structuretypes() {
                    return axios.get('/getTypes')
                        .then(response => {
                            this.structuretypes = response.data.structuretypes;
                            console.log('Structure types fetched successfully');
                            console.log(this.structuretypes);
                        })
                        .catch();
                },
                deleteStructureType(id, index) {
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
                                axios.delete('/structuretype_delete/' + id)
                                    .then(function(response) {
                                        if (response.data.success) {
                                            app.structuretypes.splice(index, 1)
                                            app.selectedStructureTypeName = '';
                                            app.selectedStructureTypeIndex = '';
                                            notify('Success', response.data.success, 'green', 'topCenter',
                                                'bounceInDown');
                                        } else {
                                            notify('Error', response.data.error, 'red', 'topCenter',
                                                'bounceInDown');
                                        }
                                    });
                            }
                        }
                    );

                },
                add_structuretype() {
                    axios.post('/structuretypes', {
                            'name': app.newStructureTypeName,
                        })
                        .then(function(response) {
                            app.structuretypes.push(response.data.structuretype);
                            $('#add-structureType-modal').modal('toggle');
                            app.newStructureTypeName = '';
                            app.selectedStructureTypeName = '';
                            app.selectedStructureTypeIndex = '';
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
                update_structuretype(name, index) {
                    axios.put('/structuretypes/' + this.selectedStructureType, {
                            'name': name,
                        })
                        .then(function(response) {
                            app.$set(app.structuretypes, index, response.data.structuretype);
                            $('#edit-structuretype-modal').modal('toggle');
                            app.structureTypeName = '';
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
                this.fetch_structuretypes();
                console.log('Structure Types List created..');
            },
            mounted() {
                this.fetch_structuretypes();
            }
        });
    </script>
@endsection
