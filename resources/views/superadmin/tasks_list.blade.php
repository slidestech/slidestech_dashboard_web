@extends('layouts.base')

@section('page_title')
    <h5>Tasks list</h5>
    <span>Add, edit and delete tasks</span>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('tasks.index') }}">Tasks list</a>
    </li>
@endsection
{{-- <style>
    .table tbody td {
    vertical-align: middle;
    font-size: 12px
  }
</style> --}}

@include('superadmin.navigation')


@section('page_content')
    <div class="row ">


        <div class="modal fade" id="task-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@{{ modal_title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row" id="add-task-form">

                                <div class="form-group col-md-12 m-t-15">
                                    <label for="-date" class="block">User <span class="text-danger">
                                            (*)</span></label>
                                    <div :class="[errors.user_id ? '  input-group input-group-danger' :
                                        '  input-group input-group-inverse'
                                    ]"
                                        data-toggle="tooltip" data-placement="top" :data-original-title="errors.user_id"
                                        data-live-search="true">
                                        <select id="users" class="selectpicker show-tick text-center"
                                            title="Sélectionner un user.." data-width="100%" data-live-search="true"
                                            data-style="btn-default" data-size="10">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->fullname }}</option>
                                            @endforeach

                                        </select>
                                        <span class="input-group-addon">
                                            <i class="icofont icofont-id-card"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="name" class="block">Task<span class="text-danger">
                                            (*)</span></label>
                                    <div
                                        :class="[errors.name ? ' input-group input-group-danger' :
                                            ' input-group input-group-inverse'
                                        ]">
                                        <input id="name" type="text" class="form-control  text-center"
                                            placeholder="Task..." data-toggle="tooltip" data-placement="top"
                                            v-model="taskContent" :data-original-title="errors.name">
                                        <span class="input-group-addon">
                                            <strong class="icofont icofont-social-slack"></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="start_date" class="block">Start date<span class="text-danger">
                                            (*)</span></label>
                                    <div
                                        :class="[errors.start_date ? ' input-group input-group-danger' :
                                            ' input-group input-group-inverse'
                                        ]">
                                        <input id="start_date" type="text" class="form-control date text-center"
                                            placeholder="Start date..." data-toggle="tooltip" data-placement="top"
                                            :data-original-title="errors.start_date">
                                        <span class="input-group-addon">
                                            <strong class="icofont icofont-calendar"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="end_date" class="block">End date<span class="text-danger">
                                            (*)</span></label>
                                    <div
                                        :class="[errors.end_date ? ' input-group input-group-danger' :
                                            ' input-group input-group-inverse'
                                        ]">
                                        <input id="end_date" type="text" class="form-control date text-center"
                                            placeholder="End date..." data-toggle="tooltip" data-placement="top"
                                            :data-original-title="errors.end_date">
                                        <span class="input-group-addon">
                                            <strong class="icofont icofont-social-slack"></strong>
                                        </span>
                                    </div>
                                </div>



                                {{-- <div class="form-group col-md-6">
                                    <label for="end_date" class="block">End date<span class="text-danger">
                                            (*)</span></label>
                                    <div
                                        :class="[errors.end_date ? ' input-group input-group-danger' :
                                            ' input-group input-group-inverse'
                                        ]">
                                        <div class='input-group'>
                                            <input class="form-control text-center " type="time" id="end_date"
                                                placeholder="End date..." v-model="end_date" data-toggle="tooltip"
                                                data-placement="top" :data-original-title="errors.end_date">>
                                            <span class="input-group-addon ">
                                                <span class="icofont icofont-ui-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group col-md-12">
                                    <label for="status" class="block">Status <span class="text-danger">
                                            (*)</span></label>
                                    <div :class="[errors.status ? '  input-group input-group-danger' :
                                        '  input-group input-group-inverse'
                                    ]"
                                        data-toggle="tooltip" data-placement="top" :data-original-title="errors.status">
                                        <select id="status" class="selectpicker show-tick text-center" title="Status..."
                                            data-width="100%" v-model="status" data-style="btn-default">
                                            <option value="PENDING">PENDING</option>
                                            <option value="COMPLETED">COMPLETED</option>
                                        </select>
                                        <span class="input-group-addon">
                                            <i class="icofont icofont-id-card"></i>
                                        </span>
                                    </div>
                                </div>



                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="operation=='add'" type="button" class="btn btn-primary waves-effect waves-light "
                            v-on:click="add_task()">Save</button>
                        <button v-if="operation=='edit'" type="button" class="btn btn-primary waves-effect waves-light "
                            v-on:click="update_task()">Save</button>
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- right column start -->
        <div class="col-lg-12 col-xl-12">
            <!-- Filter card start -->
            <div class="card">
                <div class="card-header">
                    <h5><i class="icofont icofont-filter m-r-5"></i>Search</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li>
                                <span>
                                    <i class="fa fa-refresh faa-spin animated text-warning " data-toggle="tooltip"
                                        data-placement="top" data-original-title="Refresh" style="font-size:18px"
                                        id="refresh">
                                    </i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-block">

                    <form class="row" action="#">
                        <div class="form-group col-sm-4 ">
                            {{-- <label for="drivers" class="block">user CNAS</label> --}}
                            <div class="input-group input-group-inverse">
                                <select id="f-users" class="selectpicker show-tick text-center" title="Select a user.."
                                    data-width="100%" data-style="btn-default" data-size="5">


                                </select>

                                <span class="input-group-addon">
                                    <i class="icofont icofont-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            {{-- <label for="demo" class="block">Date</label> --}}
                            <div class="input-group input-group-inverse">
                                <input type="text" id="demo" class="form-control" style="height:41px">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-calendar"></i>
                                </span>
                            </div>
                        </div>

                        {{-- <div class="form-group col-sm-3">

                            <div class="input-group input-group-inverse">
                                <select id="f-responsables" class="selectpicker show-tick text-center"
                                    title="Sélectionner un responsable.." data-width="100%" data-style="btn-default">


                                </select>

                                <span class="input-group-addon">
                                    <i class="icofont icofont-list"></i>
                                </span>
                            </div>
                        </div> --}}

                        <div class="form-group col-sm-4">

                            <div class="input-group input-group-inverse">
                                <select id="f-status" class="selectpicker show-tick text-center" title="Select status.."
                                    data-width="100%" data-style="btn-default">
                                    {{-- <option value="AP">PENDING</option>
                                    <option value="RS">COMPLETED</option> --}}

                                </select>

                                <span class="input-group-addon">
                                    <i class="icofont icofont-list"></i>
                                </span>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
            <!-- Filter card end -->



        </div>
        <!-- right column end -->

        <div class="col-lg-12 col-xl-12 col-md-12">
            <!-- Job description card start -->
            <div class="card " style="overflow-x:hidden;">
                <div class="card-header table-card-header">
                    <h5><i class="icofont icofont-list m-r-5"></i>Tasks list</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <!-- <li v-on:click="calculate_fees_for_all();
                        ">
                                                                                                                                                                                                                                                                                                                                                                                                    <span >
                                                                                                                                                                                                                                                                                                                                                                                                        <i class="fa fa-calculator faa-vertical animated text-info " data-toggle="tooltip"
                                                                                                                                                                                                                                                                                                                                                                                                            data-placement="top" data-original-title="Decomptes" style="font-size:22px"
                                                                                                                                                                                                                                                                                                                                                                                                            v-on:click="calculate_fees_for_all();
                                    ">
                                                                                                                                                                                                                                                                                                                                                                                                        </i>
                                                                                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                                                                                </li> -->
                            <li v-on:click="operation='add';modal_title='Add task';
                        clearInputs()">
                                <span data-toggle="modal" data-target="#task-modal">
                                    <i class="fa fa-plus faa-horizontal animated text-success " data-toggle="tooltip"
                                        data-placement="top" data-original-title="add task"
                                        v-on:click="operation='add';clearInputs();">
                                    </i>
                                </span>
                            </li>


                        </ul>
                    </div>
                </div>

                <div class="card-block ">
                    <div class="dt-responsive table-responsive ">
                        <table id="tasks-table" class="table table-bordered dataex-colvis-exclude "
                            style="width:100%;font-size:12px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center noExport">ACTION</th>
                                    <th class="text-center ">USER</th>
                                    <th class="text-center ">TASK</th>
                                    <th class="text-center">START DATE</th>
                                    <th class="text-center">END DATE</th>
                                    <th class="text-center ">STATUS</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <tr v-for="(task, index) in tasks">
                                    <td style="width:20px"></td>
                                    <td class="text-center f-14">
                                        <div class="dropdown-secondary dropdown ">
                                            <button
                                                class="btn btn-inverse btn-mini dropdown-toggle waves-light b-none txt-muted "
                                                type="button" id="dropdown11" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="icofont icofont-options f-16"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdown11"
                                                data-dropdown-in="fadeIn" data-dropdown-out="fadeOut"
                                                x-placement="top-start"
                                                style="position: absolute; transform: translate3d(0px, -2px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a data-toggle="modal" data-target="#task-modal"
                                                    class="dropdown-item waves-light waves-effect clickable"
                                                    v-on:click="edit_task(task,index);modal_title='Edit task';"><i
                                                        class="icofont icofont-ui-edit f-18"></i> Edit</a>
                                                {{-- <a class="dropdown-item waves-light waves-effect clickable" v-on:click="print_task_fr(task)"><i --}}
                                                <a class="dropdown-item waves-light waves-effect clickable"
                                                    v-on:click="print_task_fr(task)" {{-- data-toggle="modal" data-target="#task-preview"><i --}}>
                                                    <i class="icofont icofont-print f-18"></i> Print</a>
                                                {{-- <a class="dropdown-item waves-light waves-effect clickable" v-on:click="calculate_fees(task);"><i
                                                    class="icofont icofont-ui-calculator f-18"></i> Decompte</a> --}}
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item waves-light waves-effect clickable text-danger"
                                                    v-on:click="delete_task(task.id,index)"><i
                                                        class="feather icon-trash text-danger f-18"></i> Delete</a>
                                            </div>
                                            <!-- end of dropdown menu -->
                                        </div>
                                    </td>

                                    <td class="text-center f-14" style="width:auto;vertical-align:middle">
                                        @{{ task.user.fullname.toUpperCase() }}

                                    </td>
                                    <td class="text-center f-14" style="width:auto;vertical-align:middle">
                                        @{{ task.name.toUpperCase() }}

                                    </td>


                                    </td>
                                    <td class="text-center f-14" style="vertical-align:middle">
                                        @{{ reFormatDate(task.start_date) }}
                                    </td>
                                    <td class="text-center f-14" style="vertical-align:middle">
                                        @{{ reFormatDate(task.end_date) }}
                                    </td>
                                    <td class="text-center f-16" style="vertical-align:middle">
                                        <span v-if=" task.status.toUpperCase()  == 'PENDING'"
                                            class="label label-warning">@{{ task.status.toString() }}</span>

                                        <span class="label label-success"
                                            v-else=" task.status.toUpperCase()  == 'COMPLETED'">
                                            @{{ task.status.toString() }} </span>
                                    </td>





                                </tr>
                            </tbody>
                            {{-- <tfoot>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                


                            </tr>
                        </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- Left column end -->



    </div>
@endsection

@section('page_scripts')
    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    operation: '',
                    selected_task: '',
                    status: '',
                    reference: '',
                    details: '',
                    // responsable: '',
                    start_date: '',
                    user_id: '',
                    end_date: '',
                    end_date: '',
                    name: '',

                    modal_title: '',
                    taskContent: '',
                    selectedtaskId: '',
                    selectedtaskIndex: '',
                    notifications: [],

                    notifications_fetched: false,

                    tasks: [],

                    errors: [],
                }
            },

            mounted() {
                $(document).ready(function() {

                    $('#refresh').on('click', function() {
                        // $('#demo').data('daterangepicker').setStartDate('01/01/1900')
                        // $('#demo').data('daterangepicker').setEndDate(new Date())
                        $('#demo').val("");
                        $("#tasks-table").DataTable().search("").draw();
                        $('#f-users').selectpicker('val', null);
                        $('#f-motif').selectpicker('val', null);
                        $('#f-status').selectpicker('val', null);

                    });
                    $('#demo').on('cancel.daterangepicker', function(ev, picker) {
                        $('#demo').data('daterangepicker').setStartDate('01/01/1900')
                        $('#demo').data('daterangepicker').setEndDate(new Date())
                        $('#demo').val("");
                    });
                    $('#demo').on("change", function() {


                        $.fn.dataTable.ext.search.push(
                            function(settings, data, dataIndex) {

                                var min = new Date($('#demo').data('daterangepicker').startDate
                                    .format('YYYY-MM-DD'));
                                var max = new Date($('#demo').data('daterangepicker').endDate
                                    .format('YYYY-MM-DD'));
                                min = moment(min).format('YYYY-MM-DD');
                                max = moment(max).format('YYYY-MM-DD');
                                app.filterFrom = min;
                                app.filterTo = max;
                                // var max = $('#max').datepicker("getDate");
                                var d = data[4];
                                console.log(d);

                                // d = d.split(' - ');
                                d = d.split('/');
                                console.log(d);

                                var start = [d[2], d[1], d[0]].join('-');
                                start = moment(new Date(start)).format('YYYY-MM-DD');

                                console.log(moment(min).format('YYYY-MM-DD'));
                                console.log(max);
                                console.log(start);

                                if (start <= app.filterTo && start >= app.filterFrom) {
                                    return true;
                                }
                                return false;

                            }
                        );
                        $('#tasks-table').DataTable().draw();

                    });
                    $('#f-motif').on("change", function() {


                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        $("#tasks-table").DataTable().columns([7])
                            .search(val, true, false)
                            .draw();

                    });
                });
                $('#demo').daterangepicker({
                    "autoApply": true,
                    "locale": {
                        "applyLabel": "Filter",
                        "cancelLabel": "Cancel",
                        "fromLabel": "From",
                        "toLabel": "To",
                        "customRangeLabel": "Custom filter",
                        "format": "DD/MM/YYYY",
                        "daysOfWeek": [
                            "Su",
                            "Mo",
                            "Tu",
                            "We",
                            "Th",
                            "Fr",
                            "Sa"
                        ],
                        "monthNames": [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "Septembre",
                            "Octobre",
                            "Novembre",
                            "Decembre"

                        ],
                        "firstDay": 1
                    },
                    ranges: {
                        "Today": [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        '7 last days': [moment().subtract(6, 'days'), moment()],
                        '30 last days': [moment().subtract(29, 'days'), moment()],
                        'This month': [moment().startOf('month'), moment().endOf('month')],
                        'Last month': [moment().subtract(1, 'month').startOf('month'), moment()
                            .subtract(1, 'month').endOf('month')
                        ]
                    },
                });
                $('#files').filer({
                    limit: 1,
                    maxSize: 1,
                    extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                    showThumbs: false,
                    addMore: false,
                    changeInput: true,
                    maxSize: 100,

                    captions: {
                        button: "<span class='icofont icofont-file-pdf'> </span>",
                        feedback: "Demande d'ordre de task...",
                        feedback2: "Fichier sélectionné &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp" +
                            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",

                        errors: {
                            filesLimit: 'Only ${limit} files are allowed to be uploaded.',
                            filesType: 'Veuillez sélectionner des fichiers de type : PDF, JPG, JPEG, PNG',
                            fileSize: '${name} is too large! Please choose a file up to ${fileMaxSize}MB.',
                            filesSizeAll: 'Files that you chose are too large! Please upload files up to ${maxSize} MB.',
                            fileName: 'File with the name ${name} is already selected.',
                            folderUpload: 'Veuillez sélectionner des fichiers uniquement (pas de dossiers!)'
                        }
                    },

                });
                $('#files_').filer({
                    limit: 1,
                    maxSize: 1,
                    extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                    showThumbs: false,
                    addMore: false,
                    changeInput: true,
                    maxSize: 100,

                    captions: {
                        button: "<span class='icofont icofont-file-pdf'> </span>",
                        feedback: "Rapport de task...",
                        feedback2: "Fichier sélectionné &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp" +
                            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",

                        errors: {
                            filesLimit: 'Only ${limit} files are allowed to be uploaded.',
                            filesType: 'Veuillez sélectionner des fichiers de type : PDF, JPG, JPEG, PNG',
                            fileSize: '${name} is too large! Please choose a file up to ${fileMaxSize}MB.',
                            filesSizeAll: 'Files that you chose are too large! Please upload files up to ${maxSize} MB.',
                            fileName: 'File with the name ${name} is already selected.',
                            folderUpload: 'Veuillez sélectionner des fichiers uniquement (pas de dossiers!)'
                        }
                    },

                });

                this.fill_table('/getTasks', 'tasks-table');

                $('.date').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    "timePicker": false,
                    "parentEl": "#task-modal",
                    "opens": "right",
                    "locale": {
                        "applyLabel": "Filter",
                        "cancelLabel": "Cancel",
                        "fromLabel": "From",
                        "toLabel": "To",
                        "customRangeLabel": "Custom filter",
                        "format": "DD/MM/YYYY",
                        "daysOfWeek": [
                            "Su",
                            "Mo",
                            "Tu",
                            "We",
                            "Th",
                            "Fr",
                            "Sa"
                        ],
                        "monthNames": [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "Septembre",
                            "Octobre",
                            "Novembre",
                            "Decembre"

                        ],
                        "firstDay": 1
                    }
                });
                // this.fetch_notifications();
            },
            methods: {
                get_max_distance(source_id, destinations_ids) {

                },
                calculate_fees(task) { //check error when more than 1 day (number of meals...)
                    // console.log(task.destinations.map(d =>d.id));
                    var app = this;
                    if (task.start_date && task.end_date && task.user_id &&
                        task.name && task.status && task.status && task.source &&
                        task.destinations) {
                        app.maxDistance = 0;
                        app.km_fees = 0; // (0, 3, 12)
                        app.travel_allowances;
                        app.food_allowances;
                        app.km_total = 0;
                        app.food_total = 0;
                        app.meals = 0;
                        app.nights = 0;
                        app.total = 0;
                        app.dates = [];
                        app.nights_total = 0;
                        app.lunch_total = 0;
                        app.km_top_position = 0;



                        switch (task.transportation.slice(0, 2)) {
                            case 'AU':
                                app.km_fees = 3;
                                km_top_position = 126;
                                break;
                            case 'VS':
                                app.km_fees = 0;
                                km_top_position = 103;
                                break;
                            case 'VP':
                                app.km_fees = 12;
                                km_top_position = 103;
                                break;
                        }


                        axios.post('/getDistances/', {
                            'source_id': task.source_id,
                            'destinations_ids': task.destinations.map(d => d.id),
                            'grade_id': task.user.fonction.grade_id
                        }).then(function(response) {
                            if (response.data.error) {
                                // app.tasks.splice(index,1)
                                notify('Erreur', response.data.error, 'red', 'topCenter',
                                    'bounceInDown');

                            } else {
                                console.log('distances', response.data.distances);

                                app.maxDistance = Math.max(...response.data.distances);
                                app.travel_allowances = response.data.travel_allowances.map(d => d.cost);
                                app.food_allowance_intervals = response.data.food_allowances.map(d => [d
                                    .starts_at, d.ends_at
                                ]);
                                //    console.log(food_allowances);

                                console.log(app.travel_allowances);
                                console.log(app.food_allowance_intervals);
                                // console.log(maxDistance);
                                // console.log(maxDistance);

                                if (app.maxDistance < 30) {
                                    app.total = 0;
                                } else if (app.maxDistance >= 30 && app.maxDistance < 50) {
                                    app.food_total = 0;
                                    app.km_total = (app.maxDistance * app.km_fees) * 2;
                                    app.total = app.km_total + app.food_total;
                                    //    console.log(total);

                                } else if (app.maxDistance >= 50) {
                                    app.dates = getDates(task.end_date, task.ended_at);
                                    // meals = dates.length *2;
                                    // nights = dates.length;
                                    app.km_total = (app.maxDistance * app.km_fees) * 2;
                                    // food total

                                    if (app.dates.length < 2) { // same day
                                        let timeSegments = [];
                                        timeSegments.push([task.start_date, task.end_date]);
                                        timeSegments.push(app.food_allowance_intervals[0]);
                                        console.log(overlap(timeSegments)); // true
                                        (overlap(timeSegments) ? app.meals += 1 : app.meals += 0);

                                        timeSegments = [];
                                        timeSegments.push([task.start_date, task.end_date]);
                                        timeSegments.push(app.food_allowance_intervals[1]);
                                        console.log(overlap(timeSegments)); // true
                                        (overlap(timeSegments) ? app.meals += 1 : app.meals += 0);

                                        // timeSegments = [];
                                        // timeSegments.push([task.start_date, task.end_date]);
                                        // timeSegments.push(food_allowance_intervals[2]);
                                        // console.log( overlap(timeSegments) ); // true
                                        // ( overlap(timeSegments) ? nights += 1 : nights +=0);

                                    } else { //more than 1 day
                                        console.log(task.start_date, app.food_allowance_intervals[1][
                                                1
                                            ], task.start_date <= app
                                            .food_allowance_intervals[1][1]);

                                        var da = [];
                                        da.push(app.dates[0], app.dates[app.dates.length - 1]);

                                        if (task.start_date < app.food_allowance_intervals[0][1]) {
                                            app.meals += 2;

                                        }
                                        // else  if (task.start_date <= food_allowance_intervals[1][0]){
                                        //     meals += 1; 

                                        // } 
                                        else if (task.start_date < app.food_allowance_intervals[1][
                                                1
                                            ]) {
                                            app.meals += 1;

                                        }

                                        console.log('meals of start', app.meals);
                                        if (task.end_date <= app.food_allowance_intervals[0][
                                                0
                                            ]) { // <= 11:00
                                            app.meals += 0;
                                        } else if (task.end_date <= app.food_allowance_intervals[1][
                                                0
                                            ]) { // <= 18:00
                                            app.meals += 1;
                                        } else if (moment(app.food_allowance_intervals[2][0], 'HH:mm').diff(
                                                moment(task.end_date, 'HH:mm')) < 0) { // <= 00:00
                                            app.meals += 2;
                                        }
                                        app.nights += (app.dates.length - 2) + 1;





                                        // console.log('meals of start and end',meals);

                                        app.meals += (app.dates.length - 2) * 2;



                                    }

                                    app.food_total = (app.meals * app.travel_allowances[0]) + (app.nights *
                                        app.travel_allowances[2]);
                                    app.km_total = (app.maxDistance * app.km_fees) * 2;

                                    app.total = app.food_total + app.km_total;
                                    console.log('number of meals', app.meals);
                                    console.log('number of nights', app.nights);
                                    app.nights_total = app.nights * app.travel_allowances[2];
                                    app.lunch_total = app.meals * app.travel_allowances[0];
                                    console.log('food total', app.food_total);
                                    console.log('km total', app.km_total);
                                    console.log('TOTAL', app.total);

                                }
                                console.log('number of meals', app.meals);
                                console.log('number of nights', app.nights);

                                console.log('food total', app.food_total);
                                console.log('km total', app.km_total);
                                console.log('TOTAL', app.total);
                            }



                            axios.put('/updateDecompte/' + task.id, {
                                    'total': app.total.toFixed(2),
                                    'status': 'CALCULE'

                                    // 'status': 'DEPOSE',
                                })
                                .then(function(response) {


                                    notify('Succès', response.data.success, 'green', 'topCenter',
                                        'bounceInDown');
                                    app.fill_table('/getTasks', 'tasks-table');

                                })
                                .catch(function(error) {
                                    if (error.response) {
                                        app.$set(app, 'errors', error.response.data.errors);
                                        notify('Erreurs!',
                                            'Veuillez vérifier les informations introduites', 'red',
                                            'topCenter', 'bounceInDown');
                                    } else if (error.request) {
                                        console.log(error.request);
                                    } else {
                                        console.log('Error', error.message);
                                    }
                                });
                            swal({
                                    title: "Impression du decompte?",
                                    text: "Voulez-vous imprimer ce decompte!",
                                    type: "info",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Imprimer",
                                    cancelButtonText: "Annuler",
                                    closeOnConfirm: true,
                                    closeOnCancel: true
                                },
                                function(isConfirm) {
                                    if (isConfirm) {
                                        app.print_decompte_fr(task);


                                    }


                                });




                        });

                    } else {
                        notify('Erreurs!', 'Veuillez assurer que toutes les informations sont introduites', 'red',
                            'topCenter', 'bounceInDown');
                    }
                },





                clearInputs() {
                    $('#users').selectpicker('val', '');
                    // $('#responsable').selectpicker('val', '');


                    $('#end_date').val('');
                    $('#end_date').val('');
                    $('#start_date').val('');



                    this.reference = '';

                    this.user_id = '';
                    // this.responsable = '';

                    this.end_date = '';

                    this.start_date = '';
                    this.end_date = '';
                    this.status = '';
                    this.details = '';

                    this.selectedtaskId = '';
                    this.selectedtaskIndex = '';
                },

                handleFilesUpload() {
                    this.request_scan = this.$refs.files.files;
                    this.request_scan_name = this.request_scan[0].name;
                    $('#request-file').val(this.request_scan_name);

                },
                handleFiles_Upload() {
                    this.report_scan = this.$refs.files_.files;
                    this.report_scan_name = this.report_scan[0].name;
                    $('#report-file').val(this.report_scan_name);

                },
                fff() {
                    console.log(this.$refs.files.files[0]);
                    console.log(this.$refs.files_.files[0]);

                },
                // fetch_notifications() {
                //     var app = this;

                //     app.notifications_fetched = false;
                //     return axios.get('/getNotifications')
                //         .then(function(response) {
                //             app.notifications = response.data.notifications;
                //             app.notifications_fetched = true;
                //             if (app.notifications.length > 0) {

                //             }
                //         });
                // },
                init_table(tableName) {

                    new $.fn.dataTable.Responsive($('#' + tableName).DataTable({

                        scrollX: false,
                        scrollCollapse: false,
                        scroller: false,
                        responsive: {
                            details: {
                                type: 'column'
                            }
                        },
                        columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }, {
                            orderable: false,
                            targets: 1
                        }],
                        order: [3, 'asc'],

                        // "footerCallback": function (row, data, start, end, display) {
                        //     var api = this.api(),
                        //         data;

                        //     // Remove the formatting to get integer data for summation
                        //     var intVal = function (i) {
                        //         return typeof i === 'string' ?
                        //             i.replace(/[\$,]/g, '') * 1 :
                        //             typeof i === 'number' ?
                        //             i : 0;
                        //     };

                        //     // Total over all pages
                        //     total = api
                        //         .column(8)
                        //         .data()
                        //         .reduce(function (a, b) {
                        //             return intVal(a) + intVal(b);
                        //         }, 0);

                        //     // Total over this page
                        //     pageTotal = api
                        //         .column(8, {
                        //             page: 'current'
                        //         })
                        //         .data()
                        //         .reduce(function (a, b) {
                        //             return intVal(a) + intVal(b);
                        //         }, 0);

                        //     // Update footer
                        //     $(api.column(8).footer()).html(
                        //         'TOTAL : ' + formatMoney(pageTotal) + ' DA ' + '<br>' +
                        //         ' (GLOBAL : ' + formatMoney(total) + ' DA)'
                        //     );
                        // },
                        initComplete: function() {

                            this.api().columns([2]).every(function() {

                                var column = this;

                                column.data().unique().sort().each(function(d, j) {
                                    $('#f-users').append('<option value="' + d +
                                        '">' +
                                        d + '</option>')
                                });
                            });

                            $('#f-users').selectpicker('refresh').on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                $("#tasks-table").DataTable().columns([2])
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                            this.api().columns([6]).every(function() {

                                var column = this;

                                column.data().unique().sort().each(function(d, j) {
                                    $('#f-status').append('<option value="' +
                                        d +
                                        '">' +
                                        d + '</option>')
                                });
                            });

                            $('#f-status').selectpicker('refresh').on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                $("#tasks-table").DataTable().columns([6])
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });


                            // $('#f-drivers').selectpicker('refresh').on('change', function() {
                            //             var val = $.fn.dataTable.util.escapeRegex(
                            //                 $(this).val()
                            //             );

                            //             $("#petrolCoupons-table").DataTable().columns([2])
                            //                 .search(val ? '^' + val + '$' : '', true, false)
                            //                 .draw();
                            //         });
                        },
                        'dom': 'Bfrtip',
                        "colVis": {
                            aiExclude: [1],
                        },
                        language: {
                            "decimal": "",
                            "emptyTable": "No data available in table",
                            "info": "Displaying _START_ to _END_ of _TOTAL_ entries ",
                            "infoEmpty": "Displaying from 0 to 0 of 0 entries",
                            "infoFiltered": "(Filter of _MAX_ total entries)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Display _MENU_ entries",
                            "loadingRecords": "Loading...",
                            "processing": "Processing...",
                            "search": "Rechercher:",
                            "zeroRecords": "No matching records found",
                            "paginate": {
                                "first": "First",
                                "last": "Last",
                                "next": "Next",
                                "previous": "Previous"
                            },
                        },

                        buttons: [{
                                extend: 'excelHtml5',
                                text: 'EXCEL',
                                className: 'btn-inverse ',
                                footer: true,
                                exportOptions: {
                                    columns: "thead th:not(.noExport)",
                                }

                            }, {

                                extend: 'print',
                                text: 'Print',
                                className: 'btn-inverse',
                                footer: true,
                                exportOptions: {
                                    columns: "thead th:not(.noExport)"
                                }

                            },
                            // {
                            //     extend: 'colvis',
                            //     text: 'AFFICHAGE',
                            //     className: 'btn-inverse',
                            //     targets: [1,2] 
                            // }
                        ]

                    }));

                },
                fill_table(url, tableName) {
                    var app = this;
                    this.fetch_tasks(url, tableName).then((response) => {
                        app.init_table(tableName);
                        app.unblock(tableName);
                    });
                },
                fetch_tasks(url, tableName) {
                    var app = this;
                    app.block(tableName);
                    $('#' + tableName).DataTable().destroy();
                    return axios.get(url)
                        .then(function(response) {
                            console.log(response.data);
                            app.tasks = response.data.tasks;
                        })
                        .catch();
                },
                delete_task(id, index) {
                    swal({
                            title: "Are you sure to delete this ?",
                            text: "This action is not reversible !",
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
                                axios.delete('/tasks/' + id)
                                    .then(function(response) {
                                        if (response.data.error) {
                                            // app.tasks.splice(index,1)
                                            notify('Erreur', response.data.error, 'red', 'topCenter',
                                                'bounceInDown');

                                        } else {
                                            notify('Succès', response.data.success, 'green', 'topCenter',
                                                'bounceInDown');
                                            app.fill_table('/getTasks', 'tasks-table');
                                            app.clearInputs();
                                        }
                                    });
                            }
                        }
                    )

                },
                edit_task(task, index) {
                    var app = this;
                    app.selectedtaskId = task.id;
                    app.selectedtaskIndex = index;
                    app.operation = 'edit';
                    app.modal_title = "Edit task";
                    app.user_id = task.user_id;
                    app.status = task.status;
                    app.taskContent = task.name;
                    app.start_date = task.start_date;
                    app.end_date = task.end_date;


                    // this.cost = task.cost;
                    $('#start_date').data('daterangepicker').setStartDate(reFormatDateTime(task.start_date));
                    $('#end_date').data('daterangepicker').setEndDate(reFormatDateTime(task.end_date));



                    $('#users').selectpicker('val', task.user_id);

                    $('#status').selectpicker('val', task.status.toUpperCase());





                    // this.transportation = task.transportation;


                    if (app.status == 'RS') {
                        app.details = task.details;

                    }
                },
                add_task() {
                    var app = this;

                    app.operation = 'add';
                    app.modal_title = "Add task";

                    app.end_date = formatDate($('#end_date').data('daterangepicker').startDate);
                    app.start_date = formatDate($('#start_date').data('daterangepicker').startDate);

                    app.user_id = $('#users').selectpicker('val');
                    // app.responsable = $('#responsable').selectpicker('val');

                    app.status = $('#status').selectpicker('val');





                    // app.report_scan = app.$refs.files.files[0];

                    let formData = new FormData();

                    formData.append('user_id', app.user_id);
                    // formData.append('responsable', app.responsable);
                    formData.append('end_date', app.end_date);
                    formData.append('start_date', app.start_date);
                    formData.append('name', app.name);
                    formData.append('status', app.status);
                    formData.append('name', app.taskContent);


                    // formData.append('report_scan', app.report_scan);
                    axios.post('/tasks', formData,
                            //  {
                            //         headers: {
                            //             'Content-Type': 'multipart/form-data'
                            //         }
                            //     }
                        )
                        .then(function(response) {

                            $('#task-modal').modal('hide');
                            notify('Succès', response.data.success, 'green', 'topCenter', 'bounceInDown');
                            $('#f-users').selectpicker('refresh');
                            app.fill_table('/getTasks', 'tasks-table');
                            app.clearInputs();
                            console.log(response.data.m);


                        })
                        .catch(function(error) {
                            if (error.response) {
                                app.$set(app, 'errors', error.response.data.errors);
                                notify('Error!', 'Please check all fields', 'red',
                                    'topCenter', 'bounceInDown');
                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                },
                update_task() {
                    var app = this;

                    app.operation = 'edit';
                    app.modal_title = "Edit a task";

                    app.end_date = formatDate($('#end_date').data('daterangepicker').startDate);
                    app.start_date = formatDate($('#start_date').data('daterangepicker').startDate);

                    app.user_id = $('#users').selectpicker('val');
                    // app.responsable = $('#responsable').selectpicker('val');

                    app.status = $('#status').selectpicker('val');


                    console.log(app.operation);


                    // app.report_scan = app.$refs.files.files[0];

                    let formData = new FormData();



                    // formData.append('report_scan', app.report_scan);
                    axios.put('/tasks/' + app.selectedtaskId, {
                            'user_id': app.user_id,
                            // 'responsable': app.responsable,
                            'end_date': app.end_date,
                            'start_date': app.start_date,

                            'name': app.taskContent,


                            'status': app.status,

                        })
                        .then(function(response) {

                            $('#task-modal').modal('hide');
                            notify('Success', response.data.success, 'green', 'topCenter', 'bounceInDown');
                            app.fill_table('/getTasks', 'tasks-table');
                            app.clearInputs();

                        })
                        .catch(function(error) {
                            if (error.response) {
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


                block(element) {
                    $('#' + element).block({
                        message: '<div class="preloader3 loader-block">' +
                            '<div class="circ1 loader-info"></div>' +
                            '<div class="circ2 loader-info"></div>' +
                            '<div class="circ3 loader-info"></div>' +
                            '<div class="circ4 loader-info"></div>' +
                            '</div>',
                        css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: 0.5,
                            showOverlay: false,
                        }
                    });
                },
                unblock(element) {
                    $('#' + element).unblock();
                },

            },
        });
    </script>
@endsection
