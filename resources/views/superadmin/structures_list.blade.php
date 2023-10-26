@extends('layouts.base')

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/list-scroll/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/stroll/css/stroll.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/demo.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/j-pro-modern.css') }}">
@endsection

@section('page_title')
    <h4>Structures List</h4>
    <span>Add, edit and delete a structure</span>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('structures-list') }}">Structures List</a>
    </li>
@endsection


@include('superadmin.navigation')


@section('page_content')
    <div class="row">
        <!-- Modal static-->
        <div class="modal fade" id="add-structure-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a structure</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text"
                            :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']"
                            placeholder="Enter structure name..." maxlength="25" v-model="newStructureName" required
                            v-on:input="errors.name=null" />
                        <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.name.toString() }}</p>
                    </div>

                    <label for="structure-state1" class="col-sm-3 col-form-label">State</label>
                    <div class="col-sm-10">
                        <div :class="[errors.state_id ? 'col-sm-10 m-b-5 input-group input-group-danger' :
                            'col-sm-10 m-b-5 input-group input-group-inverse'
                        ]"
                            data-toggle="tooltip" data-placement="top" :data-original-title="errors.state_id">
                            <select id="structure-state1" class="selectpicker show-tick" title="Select State..."
                                v-model="newStructureState">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-addon">
                                <i class="icofont icofont-listing-box"></i>
                            </span>
                        </div>
                    </div>

                    <label for="structure-type1" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <div :class="[errors.structure_id ? 'col-sm-10 m-b-5 input-group input-group-danger' :
                            'col-sm-10 m-b-5 input-group input-group-inverse'
                        ]"
                            data-toggle="tooltip" data-placement="top" :data-original-title="errors.structure_id">
                            <select id="structure-type1" class="selectpicker show-tick" title="Select Type..."
                                v-model="newStructureType">
                                @foreach ($structureTypes as $structureType)
                                    <option value="{{ $structureType->id }}">{{ $structureType->name }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-addon">
                                <i class="icofont icofont-listing-box"></i>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            v-on:click="add_structure()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit-structure-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit structure</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text"
                            :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']"
                            maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedStructureName"
                            v-model="structureName" />
                        <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.name.toString() }}</p>

                        <label for="structure-state" class="col-sm-3 col-form-label">State</label>
                        <div class="col-sm-10">
                            <div :class="[errors.state_id ? 'col-sm-10 m-b-5 input-group input-group-danger' :
                                'col-sm-10 m-b-5 input-group input-group-inverse'
                            ]"
                                data-toggle="tooltip" data-placement="top" :data-original-title="errors.state_id">
                                <select id="structure-state" class="selectpicker show-tick" title="Select State..."
                                    v-model="structureState">
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-addon">
                                    <i class="icofont icofont-listing-box"></i>
                                </span>
                            </div>
                        </div>
                        <label for="structure-type" class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <div :class="[errors.structure_id ? 'col-sm-10 m-b-5 input-group input-group-danger' :
                                'col-sm-10 m-b-5 input-group input-group-inverse'
                            ]"
                                data-toggle="tooltip" data-placement="top" :data-original-title="errors.structure_id">
                                <select id="structure-type" class="selectpicker show-tick" title="Select Type..."
                                    v-model="structureType">
                                    @foreach ($structureTypes as $structureType)
                                        <option value="{{ $structureType->id }}">{{ $structureType->name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-addon">
                                    <i class="icofont icofont-listing-box"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            v-on:click="update_structure(structureName,structureState,structureType,selectedStructureIndex)">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-11">

        <div class="card">
            <div class="card-header table-card-header">

                <h5>Structures List</h5>

                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <span data-toggle="tooltip" data-placement="top" data-original-title="Add a Structure">
                                <i class="feather icon-plus text-success md-trigger" data-toggle="modal"
                                    data-target="#add-structure-modal">
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
                                <th class="text-center" style="width:20px">#</th>
                                <th>Structure</th>
                                <th class="text-center">State</th>
                                <th class="text-center">Structure Type</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(structure, index) in structures" v-bind:key="index "
                                v-on:click="selectedStructureIndex = index">
                                <td>@{{ index + 1 }}</td>
                                <td>@{{ structure.name }}</td>
                                <td class="text-center">@{{ structure.state.name }}</td>
                                <td v-if="structure.structure_type != null" class="text-center">@{{ structure.structure_type.name }}
                                </td>
                                <td v-else class="text-center">/</td>
                                <td>
                                    <div class="text-center">
                                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                            <i class="feather icon-edit text-custom f-18 clickable md-trigger"
                                                data-toggle="modal" data-target="#edit-structure-modal"
                                                v-on:click="structureName=structure.name,
                                                
                                                 structureState=structure.state_id,
                                                 structure.structure_type != null ?  $('#structure-type').selectpicker('val',structure.structure_type.id):$('#structure-type').selectpicker('val',''), 
                                                 selectedStructure=structure.id,
                                                 structure.state != null ?  $('#structure-state').selectpicker('val',structure.state.id):$('#structure-state').selectpicker('val','')
                                                 ">
                                            </i>
                                        </span>
                                        <i class="feather icon-trash text-danger f-18 clickable"
                                            v-on:click="deleteStructure(structure.id, index)" data-toggle="tooltip"
                                            data-placement="top" data-original-title="Delete">
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
    <script>
        $(document).ready(function() {
            $('#structure-state1').selectpicker({
                placeholder: "Nom du structure.."
            });
            $('#structure-type1').selectpicker({
                placeholder: "Type du structure.."
            });
            $('#structure-state').selectpicker({
                placeholder: "Nom du structure.."
            });
            $('#structure-type').selectpicker({
                placeholder: "Type du structure.."
            });


        });
    </script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js') }}">
    </script>

    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    selectedStructure: '',
                    structureName: '',
                    structureState: '',
                    structureType: '',
                    newStructureName: '',
                    newStructureState: '',
                    newStructureType: '',
                    selectedStructureName: '',
                    selectedStructureState: '',
                    selectedStructureIndex: '',
                    selectedStructureType: '',
                    structures: [],
                    states: [],
                    types: [],
                    selectedStructures: [],
                    errors: [],
                    notifications: [],
                    notifications_fetched: false,
                }
            },
            methods: {
                fetch_structures() {
                    return axios.get('/getStructures')
                        .then(response => {
                            this.structures = response.data.structures;
                            console.log('Structures fetched successfully');
                            console.log(this.structures);
                        })
                        .catch(error => {
                            console.error('Error fetching structures:', error);
                        });
                },
                fetch_states() {
                    return axios.get('/getStates')
                        .then(response => {
                            this.states = response.data.states;
                            console.log('States fetched successfully');
                            console.log(this.states);
                        })
                        .catch(error => {
                            console.error('Error fetching structures:', error);
                        });
                },
                fetch_types() {
                    return axios.get('/getTypes')
                        .then(response => {
                            this.types = response.data.structuretypes;
                            console.log('Types fetched successfully');
                            console.log(this.types);
                        })
                        .catch(error => {
                            console.error('Error fetching structures:', error);
                        });
                },
                deleteStructure(id, index) {
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
                                axios.delete('/structure_delete/' + id)
                                    .then(function(response) {
                                        if (response.data.success) {
                                            app.structures.splice(index, 1)
                                            app.selectedStructureName = '';
                                            app.selectedStructureIndex = '';
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
                add_structure() {
                    axios.post('/structures', {
                            'name': app.newStructureName,
                            'state_id': app.newStructureState,
                            'structure_type_id': app.newStructureType,
                        })
                        .then(function(response) {
                            app.structures.push(response.data.structure);
                            $('#add-structure-modal').modal('toggle');
                            app.newStructureName = '';
                            $('#structure-state1').selectpicker('val', '');
                            $('#structure-type1').selectpicker('val', '');
                            app.newStructureState = '';
                            app.newStructureType = '';
                            app.selectedStructureName = '';
                            app.selectedStructureIndex = '';
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
                update_structure(name, state_id, structure_type_id, index) {
                    axios.put('/structures/' + this.selectedStructure, {
                            'name': name,
                            'state_id': state_id,
                            'structure_type_id': structure_type_id,
                        })
                        .then(function(response) {
                            app.$set(app.structures, index, response.data.structure);
                            $('#edit-structure-modal').modal('toggle');
                            app.structureName = '';
                            app.structureState = '';
                            app.structureType = '';
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
                this.fetch_structures();
                this.fetch_states();
                this.fetch_types();
            },
            mounted() {
                this.fetch_structures();
                this.fetch_states();
                this.fetch_types();
            }
        });
    </script>
@endsection
