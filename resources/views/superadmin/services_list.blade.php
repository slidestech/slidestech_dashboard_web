@extends('layouts.base')

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/list-scroll/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/stroll/css/stroll.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/nestable/nestable.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/j-pro/css/j-pro-modern.css') }}">
@endsection

@section('page_title')
    <h4>Services List</h4>
    <span>Add, edit or delete a service</span>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('services-list') }}">Services list</a>
    </li>
@endsection


@include('superadmin.navigation')


@section('page_content')





    {{-- Modal static --}}
    <div class="modal fade" id="add-service-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text"
                        :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']"
                        placeholder="Enter service name..." maxlength="25" v-model="newServiceName" required
                        v-on:input="errors.name=null" />
                    <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.name.toString() }}</p>
                    <br>
                    <input type="text"
                        :class="[errors.description ? 'form-control form-control-danger' : 'form-control form-control-success']"
                        placeholder="Enter service description..." maxlength="255" v-model="newServiceDescription" required
                        v-on:input="errors.description=null" />
                    <p class="text-danger m-t-5" v-if="errors.description">@{{ errors.description.toString() }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        v-on:click="add_service()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-question-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text"
                        :class="[errors.question ? 'form-control form-control-danger' : 'form-control form-control-success']"
                        placeholder="Enter question..." maxlength="25" v-model="newQuestion" required
                        v-on:input="errors.name=null" />
                    <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.question.toString() }}</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        v-on:click="add_question()">Save</button>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="edit-service-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text"
                        :class="[errors.name ? 'form-control form-control-danger' : 'form-control form-control-success']"
                        maxlength="25" required v-on:input="errors.name=null" :placeholder="selectedServiceName"
                        v-model="serviceName" />
                    <p class="text-danger m-t-5" v-if="errors.name">@{{ errors.name.toString() }}</p>
                    <br>
                    <input type="text"
                        :class="[errors.description ? 'form-control form-control-danger' : 'form-control form-control-success']"
                        maxlength="255" required v-on:input="errors.description=null"
                        :placeholder="selectedServiceDescription" v-model="serviceDescription" />
                    <p class="text-danger m-t-5" v-if="errors.description">@{{ errors.description.toString() }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        v-on:click="update_service(serviceName,serviceDescription,selectedServiceIndex)">Save</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header table-card-header">

                    <h5>Services List</h5>

                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li>
                                <span data-toggle="tooltip" data-placement="top" data-original-title="Add a Service">
                                    <i class="feather icon-plus text-success md-trigger" data-toggle="modal"
                                        data-target="#add-service-modal">
                                    </i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive" style="max-height:500px;">

                        <table id="states-table" class="table table-hover table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(service, index) in services" v-bind:key="index"
                                    :class="{ 'selected-row': selectedServiceName === service.name }"
                                    v-on:click="showQuestions(service, service.questions), selectedServiceIndex = index">
                                    <td>@{{ index + 1 }}</td>
                                    <td>@{{ service.name }}</td>
                                    <td>@{{ service.description }}</td>
                                    <td>
                                        <div class="text-center">
                                            <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                                <i class="feather icon-edit text-custom f-18 clickable md-trigger"
                                                    data-toggle="modal" data-target="#edit-service-modal"
                                                    v-on:click="serviceName=service.name, serviceDescription=service.description">
                                                </i>
                                            </span>
                                            <i class="feather icon-trash text-danger f-18 clickable"
                                                v-on:click="deleteService(service.id, index)" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete">
                                            </i>
                                            <i class="feather icon-eye text-warning f-18 clickable"
                                                v-on:click="showQuestions(service, service.questions)"
                                                data-toggle="tooltip" data-placement="top"
                                                data-original-title="Show Questions">
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

                    <h5>Questions list for the service : <span class="label label-info" v-if="selectedServiceName">
                            <strong>@{{ selectedServiceName }} </strong></span> </h5>

                    <div class="card-header-right" v-if="selectedServiceName">
                        <ul class="list-unstyled card-option">
                            <li>
                                <span data-toggle="tooltip" data-placement="left" data-original-title="Add Question">
                                    <i class="feather icon-plus text-success md-trigger" data-toggle="modal"
                                        data-target="#add-question-modal">
                                    </i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Modal static-->
                <div class="card-block">
                    <div class="dt-responsive table-responsive" style="max-height:500px;">

                        <table id="communes-table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px">#</th>
                                    <th>Question</th>
                                    <th style="width:50px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(question, index) in service_questions" :key="index">
                                    <td>@{{ index + 1 }}</td>
                                    <td>@{{ question.content }}</td>
                                    <td>
                                        <div class="text-center">
                                            <i class="feather icon-trash text-danger f-18 clickable" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete"
                                                v-on:click="delete_question(question.id,index)">
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

    {{-- <div class="col-md-12">

        <div class="card-header">
            <h5>Nestable</h5>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Nestable</h5>

            </div> --}}
            {{-- <div class="card-block">
                <div id="nestable-menu" class="m-b-10">
                    <button type="button" class="btn btn-primary waves-effect waves-light m-b-10 m-r-20" data-action="expand-all">Expand All</button>
                    <button type="button" class="btn btn-success waves-effect waves-light m-b-10" data-action="collapse-all">Collapse All</button>
                </div>
                <div class="row">


                    <div class="col-lg-4 col-sm-12">
                        <div class="cf nestable-lists">
                            <div class="dd" id="nestable2">
                                <ol class="dd-list">



                                    <li v-for="(question, index) in service_questions" :key="index"class="dd-item dd3-item" data-id="index" v-if="question.question_id == null">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div  class="dd3-content">@{{ question.content }}</div>
                                        <ol class="dd-list">

                                            <li  :key="index" class="dd-item dd3-item" data-id="index"  class="dd-item dd3-item" data-id="index">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">@{{ question.children_questions[index].content }}</div>
                                            </li>

                                        </ol>
                                    </li> --}}

                                    {{-- <li class="dd-item dd3-item" data-id="15">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">Item 15</div>
                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item" data-id="16">
                                                <div class="dd3-content">Item 16</div>
                                                <div class="dd-handle dd3-handle"></div>
                                                <ol class="dd-list">
                                                    <li class="dd-item dd3-item" data-id="17">
                                                        <div class="dd-handle dd3-handle"></div>
                                                        <div class="dd3-content">Item 17</div>
                                                    </li>

                                                </ol>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="18">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">Item 18</div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="19">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">Item 19</div>
                                            </li>
                                        </ol> --}}
                                    {{-- </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
@endsection

@section('page_scripts')
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('pages/nestable/jquery.nestable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/nestable/custom-nestable.js') }}"></script>

    <script>
        // $(document).ready(function() {
        //     $('#test').multiSelect({
        //         selectableHeader: "<div class='custom-header'>Available communes</div>",
        //         selectionHeader: "<div class='custom-header'>Selected communes</div>",

        //     });

        //     $('#assign-communes-modal').on('hide.bs.modal', function() {
        //         $('#test').multiSelect('deselect_all');
        //     });
        // });
    </script>

    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    service: '',
                    selectedService: '',
                    serviceName: '',
                    serviceDescription: '',
                    newServiceName: '',
                    newServiceDescription: '',
                    newQuestion: '',
                    selectedServiceName: '',
                    selectedServiceDescription: '',
                    selectedServiceIndex: '',
                    service_questions: [],
                    question_documents: [],
                    services: [],
                    questions: [],
                    selectedQuestions: [],
                    errors: [],
                    notifications: [],
                    notifications_fetched: false,
                }
            },
            methods: {
                showQuestions(service, question) {
                    app.service = service;
                    app.service_questions = service.questions;
                    console.log(this.service_questions);
                    app.selectedService = service.id;
                    app.selectedServiceName = service.name;
                    console.log(app.selectedService);
                },

                fetch_services() {
                    return axios.get('/getServices')
                        .then(response => {
                            this.services = response.data.services;
                            console.log('Services fetched successfully');
                            console.log(this.services);
                        })
                        .catch();
                },
                fetch_questions() {
                    return axios.get('/getQuestions')
                        .then(function(response) {
                            this.questions = response.data.questions;
                            console.log("hna");
                            console.log( response.data.questions);
                            // this.questions.forEach(question => {
                            //     $('#test').multiSelect(
                            //         'addOption', {
                            //             value: question.id,
                            //             text: question.question
                            //         },
                            //     );
                            // });
                        })
                        .catch();
                },
                add_service() {
                    axios.post('/services', {
                            'name': app.newServiceName,
                            'description': app.newServiceDescription,
                        })
                        .then(function(response) {
                            app.services.push(response.data.service);
                            $('#add-service-modal').modal('toggle');
                            app.newServiceName = '';
                            app.newServiceDescription = '';
                            app.selectedServiceName = '';
                            app.selectedServiceIndex = '';
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
                add_question() {
                    axios.post('/questions', {
                            'content': app.newQuestion,
                            'service_id': app.selectedService,
                            'question_id': null,
                        })
                        .then(function(response) {
                            app.service.questions.push(response.data.question);
                            $('#add-question-modal').modal('toggle');
                            app.newQuestion = '';

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
                get_selected_questions() {
                    $('#test').multiSelect('select', app.service_questions.map(p => p.id + ''));

                },
                attach_documents() {
                    this.selectedDocuments = $('#test').multiSelect().val();
                    var documents = this.selectedDocuments.toString().split(',').map(Number);
                    axios.post('/attachDocuments' + this.selectedQuestion, {
                            'documents': documents
                        })
                        .then(function(response) {
                            // app.$set(app.questions,index,response.data.role);
                            // app.fetch_questions();
                            $('#assign-documents-modal').modal('toggle');
                            app.question_documents = response.data.documents;
                            console.log(response.data.questions);
                            console.log(app.questions);

                            app.questions = response.data.questions;
                            console.log(app.questions);
                            app.selectedDocuments = '';
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
                deleteService(id, index) {
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
                                axios.delete('/services/' + id)
                                    .then(function(response) {
                                        if (response.data.success) {
                                            app.services.splice(index, 1)
                                            app.selectedServiceName = '';
                                            app.selectedServiceIndex = '';
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
                update_service(name, description, index) {
                    axios.put('/services/' + this.selectedService, {
                            'name': name,
                            'description': description,
                        })
                        .then(function(response) {
                            app.$set(app.services, index, response.data.service);
                            $('#edit-service-modal').modal('toggle');
                            app.selectedServiceName = app.serviceName;
                            app.serviceName = '';
                            app.serviceDescription = '';
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
                get_selected_documents() {
                    $('#test').multiSelect('select', app.question_documents.map(p => p.id + ''));

                },
            },
            created() {
                this.fetch_services();
                // this.fetch_questions();




            },
            mounted() {
                $('#optgroup').multiSelect();
                this.fetch_services();
                this.fetch_questions();
            }

        });
    </script>
@endsection
