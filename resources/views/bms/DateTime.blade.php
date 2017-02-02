@extends('bms.PageContent')
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/clockpicker.css">
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert.css">
@endsection

@section('content')
    <div class="content">
        {{--Menu Monitoring&Setting--}}
        <div class="content-header leftside-content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="#" class="text-capitalize">{{ Request::segment(1) }}</a></li>
                </ul>
            </div>
        </div>
        {{--Menu Monitoring&Setting--}}

        <div class="row animated slideInLeft" id="form-create"  >
            <div class="col-sm-12 col-md-6">
                {{--<h4 class="section-subtitle"><b>Horizontal</b> form</h4>--}}
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-stripe" id="dateTime">
                                    {{csrf_field()}}

                                    {{--<h5 class="mb-lg">To enjoy more, sing in!</h5>--}}
                                    <div class="form-group">
                                        <label for="default-datepicker" class="col-sm-2 control-label ">Date</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                                <input type="text" name="date" class="form-control" id="default-datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Time</label>
                                        <div class="col-sm-10">
                                            <div class="input-group clockpicker" data-autoclose="true">
                                                <span class="input-group-addon x-primary"><i class="fa fa-clock-o"></i></span>
                                                <input class="form-control timepicker" id="timepicker1" name="time" value="" type="text">                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-wide" id="store">Save</button>
                                            <button type="reset" class="btn btn-warning btn-wide">Refresh</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Modal -->
@endsection
@section('js')
    <script src="{{ asset('/') }}js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}js/clockpicker.js"></script>
    <script src="{{ asset('/') }}js/sweetalert.min.js"></script>
    <script>
        $('#default-datepicker').datepicker({
            todayHighlight: true,
            format: "yyyy-mm-dd",
            autoClose:true
        });

        $('.clockpicker').clockpicker();

        $('#store').click(function (e) {
            $.ajax({
                url: '{{ url('save-datetime') }}',
                data: $('#dateTime').serialize(),
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    swal("Success!", "Data Saved!", "success");
                },
                error: function (jqXhr) {
                    var errorHtml = '';

                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: true,
                        text: errorHtml,
                        type: 'error'
                    });
                }
            });
            e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
        });

    </script>

@endsection