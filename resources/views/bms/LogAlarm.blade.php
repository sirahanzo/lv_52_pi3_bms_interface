@extends('bms.PageContent')
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert.css">
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/loadingbox.css">

    <style>
        .btn-darker-1.active {
            background-color: lightseagreen;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        {{--Menu Monitoring&Setting--}}
        <div class="content-header leftside-content-header" style="background-color:#003561">

            <div class="btn-group ">
                @foreach($pack_list as $ls)
                    <button id="pack{{$ls->id}}" onclick="get_pack({{$ls->id}})" class="btn btn-darker-1 pack">Pack {{$ls->id}}</button>
                @endforeach
                <button class="btn btn-darker-1 pack" disabled>|</button>
            </div>
        </div>
        {{--Menu Monitoring&Setting--}}

        <div class="row animated slideInLeft" id="user-list">

            <div class="col-sm-12">
                {{--<h4 class="section-subtitle"><b>Searching, ordering and paging</b></h4>--}}

                <div class="panel">
                    <div class="panel-header">
                        <form class="form-horizontal form-stripe" id="form_data">
                            <input type="hidden" name="pack_id" id="pack_id" value="">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Range</label>
                                <div class="col-sm-6">
                                    <div class="input-daterange input-group" id="range-datepicker">
                                        <input type="text" class="input-sm form-control" name="from"/>
                                        <span class="input-group-addon x-primary">to</span>
                                        <div class="input-group">
                                            <input type="text" class="input-sm form-control" name="to" id="button-addon"/>
                                            <span class="input-group-btn">
                                                            <button class="btn btn-primary btn-sm" type="button" id="show_data">Show Data</button>
                                                            <button class="btn btn-warning btn-sm" type="button" id="download">Download</button>
                                                   </span>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm btn-loading" type="button" id="refresh">Refresh Data</button>

                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="panel-content">

                        <div class="table-responsive">

                            <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    {{--<th>No</th>--}}
                                    <th>Date/Time</th>
                                    <th>Parameter Name</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Modal -->
@endsection
@section('js')
    <script src="{{ asset('/') }}js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('/') }}js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}js/sweetalert.min.js"></script>
    <script>

        //init or set pack 1 as default active
        $('#pack{{ $pack_active->id }}').addClass('btn-lighter-1').removeClass('btn-darker-1');
        $('#pack_id').val({{ $pack_active->id }});


        //init date picker range
        $('#range-datepicker').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 1,
            todayBtn: "linked",
            todayHighlight: true
        });

        var form = $('#form_data').serialize();


        var oTable = $('#myTable').DataTable({

            processing: false,
            serverSide: true,
            searching: false,
            ajax: '{!! url('alarmlog-range') !!}'+'?'+form,

//            data: form,
            type:'POST',
            columns: [
//                {data: 'id', name: 'id'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'name', name: 'name'},
                {data: 'alarm', name: 'alarm'},
            ]
        });

        $.fn.dataTable.ext.errMode = function () {
            swal({
                title: "Error!",
                text: "Timeout response from database, no data available",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Try again?",
                closeOnConfirm: true
            }, function(){
                drawNewDatable();
            });
        };


        function drawNewDatable() {
            var form = $('#form_data').serialize();
            var newUrl = '{!! url('alarmlog-range') !!}'+'?'+form;
            oTable.ajax.url(newUrl);
            oTable.draw();
        }

        function get_pack($this) {
            $('#pack_id').val($this);
            drawNewDatable();

        }

        //group button active switch
        $('.pack').click(function () {
            $('.pack').removeClass('btn-lighter-1').addClass('btn-darker-1');
            $(this).addClass('btn-lighter-1').removeClass('btn-darker-1');
        });

        $('#show_data').click(function () {
            drawNewDatable();
            $('#form_data').trigger('reset');
        });

        $('#refresh').click(function () {
//            drawNewDatable();
            var form = $('#form_data').serialize();
            $.ajax({
                url:'{!! url('alarmlog-range') !!}',
                type:'POST',
                data: form
            })

        });



        $('#download').click(function (e) {
            $('#progress').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            var form = $('#form_data').serialize();

            e.preventDefault();

            $.ajax({
                url:'{!! url('download-log-alarm') !!}',
                data: form,
                type:'GET',
                complete: function (res) {
                    $('#progress').modal('hide');

                    var  path = res.responseJSON.path;
                    location.href = path;
                }
            });
            e.preventDefault();
        });


    </script>

@endsection