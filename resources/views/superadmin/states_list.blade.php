@extends('layouts.base')

@section('page_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('pages/list-scroll/list.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/stroll/css/stroll.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/demo.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/j-pro-modern.css') }}">


@endsection

@section('page_title')
<h4>States List</h4>
<span>Add, edit or delete a state</span>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('states-list') }}">States list</a>
</li>
@endsection


@include('superadmin.navigation')


@section('page_content')


{{-- page_content --}}
<div class="modal fade" id="add-state-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a state</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']" placeholder="Enter state name..." maxlength="25" v-model="newState" required v-on:input="errors.name=null" />
                <p class="text-danger m-t-5" v-if="errors.name">@{{errors.name.toString()}}</p>
                <br>
                <input type="text" :class="[errors.code ? 'form-control form-control-danger' : 'form-control form-control-success']" placeholder="Enter state code..." maxlength="25" v-model="newStateCode" required v-on:input="errors.code=null" />
                <p class="text-danger m-t-5" v-if="errors.code">@{{errors.code.toString()}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" v-on:click="add_state()">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="assign-communes-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"> Add communes for the state : <span v-if="selectedStateName" class="label label-info"> <strong> @{{selectedStateName}} </strong></span> </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select multiple="multiple" id="test" v-model="selectedCommunes" style="height:400px">
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" v-on:click="add_communes()">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-state-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit state</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']" maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedStateName" v-model="stateName" />
                <p class="text-danger m-t-5" v-if="errors.name">@{{errors.name.toString()}}</p>
                <br>
                <input type="text" :class="[errors.code ? 'form-control form-control-danger' : 'form-control form-control-success']" maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedStateCode" v-model="stateCode" />
                <p class="text-danger m-t-5" v-if="errors.code">@{{errors.code.toString()}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" v-on:click="update_state(stateName,stateCode,selectedStateIndex)">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header table-card-header">

                <h5>States List</h5>

                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <span data-toggle="tooltip" data-placement="top" data-original-title="Add a State">
                                <i class="feather icon-plus text-success md-trigger" data-toggle="modal" data-target="#add-state-modal">
                                </i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Modal static-->
            <div class="card-block">
                <div class="dt-responsive table-responsive" style="max-height:500px;">

                    <table id="states-table" class="table table-hover table-bordered nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:20px">#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(state, index) in states" v-bind:key="index"   :class="{'selected-row': selectedStateName === state.name}" v-on:click="showCommunes(state, state.communes),selectedStateIndex = index">
                                <td>@{{ index+1}}</td>
                                <td>@{{ state.name }}</td>
                                <td>@{{ state.code }}</td>
                                <td>
                                    <div class="text-center">
                                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                            <i class="feather icon-edit text-custom f-18 clickable md-trigger" data-toggle="modal" data-target="#edit-state-modal" v-on:click="stateName=state.name, stateCode=state.code">
                                            </i>
                                        </span>
                                        <i class="feather icon-trash text-danger f-18 clickable" v-on:click="deleteState(state.id, index)" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                        </i>
                                        <i class="feather icon-eye text-warning f-18 clickable" v-on:click="showCommunes(state, state.communes)" data-toggle="tooltip" data-placement="top" data-original-title="Show Communes">
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header table-card-header">

                <h5>Communes list for the state : <span class="label label-info" v-if="selectedStateName"> <strong>@{{selectedStateName}} </strong></span> </h5>

                <div class="card-header-right" v-if="selectedStateName">
                    <ul class="list-unstyled card-option">
                        <li>
                            <span data-toggle="tooltip" data-placement="left" data-original-title="Add communes">
                                <i class="feather icon-plus text-success md-trigger" data-toggle="modal" data-target="#assign-communes-modal" v-on:click="get_selected_communes()">
                                </i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Modal static-->
            <div class="card-block">
                <div class="dt-responsive table-responsive" style="max-height:300px;">

                    <table id="communes-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:20px">#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th style="width:50px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(commune, index) in state_communes" :key="index">
                                <td>@{{ index+1}}</td>
                                <td>@{{ commune.name }}</td>
                                <td>@{{ commune.code }}</td>
                                <td>
                                    <div class="text-center">
                                        <i class="feather icon-trash text-danger f-18 clickable" data-toggle="tooltip" data-placement="top" data-original-title="Delete" v-on:click="deleteCommune(commune.id,index)">
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
    $(document).ready(function() {
        $('#test').multiSelect({
            selectableHeader: "<div class='custom-header'>Available communes</div>",
            selectionHeader: "<div class='custom-header'>Selected communes</div>",

        });

        $('#assign-communes-modal').on('hide.bs.modal', function() {
            $('#test').multiSelect('deselect_all');
        });
    });
</script>
<script>
    const app = new Vue({
        el: '#app',
        data() {
            return {
                selectedState: '',
                stateName: '',
                stateCode: '',
                newState: '',
                newStateCode: '',
                selectedStateName: '',
                selectedStateCode: '',
                selectedStateIndex: '',
                state_communes: [],
                states: [],
                communes: [],
                selectedCommunes: [],
                errors: [],
                notifications: [],
                notifications_fetched: false,
            }
        },
        methods: {
            showCommunes(state, communes) {
                app.state_communes = communes;
                console.log(communes);
                app.selectedState = state.id;
               
                app.selectedStateName = state.name;
                console.log(app.selectedState);
            },

            fetch_states() {
                return axios.get('/getStates')
                    .then(response => {
                        this.states = response.data.states;
                        console.log('States fetched successfully');
                        console.log(this.states);
                    })
                    .catch();
            },
            fetch_communes() {
                return axios.get('/getCommunes')
                    // .then(response => this.permissions = response.data.permissions)
                    .then(function(response) {
                        this.communes = response.data.communes;
                        this.communes.forEach(commune => {
                            $('#test').multiSelect(
                                'addOption', {
                                    value: commune.id,
                                    text: commune.name
                                },
                            );
                        });
                    })
                    .catch();
            },
            add_state() {
                axios.post('/states', {
                        'name': app.newState,
                        'code': app.newStateCode,
                    })
                    .then(function(response) {
                        app.states.push(response.data.state);
                        $('#add-state-modal').modal('toggle');
                        app.newState = '';
                        app.newStateCode = '';
                        app.selectedStateName = '';
                        app.selectedStateIndex = '';
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
            add_communes() {
                this.selectedCommunes = $('#test').multiSelect().val();
                var communes = this.selectedCommunes.toString().split(',').map(Number);
                axios.post('/stateAddCommunes/' + this.selectedState, {
                        'communes': communes
                    })
                    .then(function(response) {
                        // app.$set(app.roles,index,response.data.role);
                        // app.fetch_roles();
                        $('#assign-communes-modal').modal('toggle');
                        app.state_communes = response.data.communes;
                        // console.log(response.data.states);
                        // console.log(app.states);

                        app.states = response.data.states;
                        console.log(response.data);
                        app.selectedCommunes = '';
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
            get_selected_communes() {
                $('#test').multiSelect('select', app.state_communes.map(p => p.id + ''));

            },
            deleteState(id, index) {
                swal({
                        title: "Are you sure?",
                        text: "This will delete the state with its all communes!",
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
                            axios.delete('/state_delete/' + id)
                                .then(function(response) {
                                    if (response.data.success) {
                                        app.states.splice(index, 1)
                                        app.selectedStateName = '';
                                        app.selectedStateIndex = '';
                                        notify('Success', response.data.success, 'green', 'topCenter', 'bounceInDown');
                                    } else {
                                        notify('Error', response.data.error, 'red', 'topCenter', 'bounceInDown');
                                    }
                                });
                        }
                    }
                );

            },
            deleteCommune(id, index) {
                swal({
                        title: "Are you sure?",
                        text: "This will delete this commune!",
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
                                        app.state_communes.splice(index, 1)
                                        notify('Success', response.data.success, 'green', 'topCenter', 'bounceInDown');
                                    } else {
                                        notify('Error', response.data.error, 'red', 'topCenter', 'bounceInDown');
                                    }
                                });
                        }
                    }
                );

            },
            update_state(name, code, index) {
                axios.put('/states/' + this.selectedState, {
                        'name': name,
                        'code': code,
                    })
                    .then(function(response) {
                        app.$set(app.states, index, response.data.state);
                        $('#edit-state-modal').modal('toggle');
                        app.selectedStateName = app.stateName;
                        app.stateName = '';
                        app.stateCode = '';
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
            this.fetch_states();
            this.fetch_communes();




        },
        mounted() {
            $('#optgroup').multiSelect();
            this.fetch_states();
            this.fetch_communes();
        }

    });
</script>

@endsection