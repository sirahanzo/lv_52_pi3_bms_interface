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
                    <li><i class="fa fa-cube" aria-hidden="true"></i><a href="#" class="text-capitalize">{{ Request::segment(1) }}</a></li>
                </ul>
            </div>
        </div>
        {{--Menu Monitoring&Setting--}}

        <div class="row animated slideInLeft" id="form-create"  >

            <div class="col-lg-12">
                {{--<h4 class="section-subtitle"><b>Stripe</b> form</h4>--}}
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6">
                                    <form class="form-horizontal  form-stripe" id="networkForm">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">IPaddress</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="ipaddress" class="form-control" id="ipaddress" placeholder="192.168.1.100" value="{{$network->ipaddress}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Subet Mask</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="netmask" class="form-control" id="netmask" placeholder="255.25.255.0" value="{{$network->netmask}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gateway</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="gateway" class="form-control" id="gateway" placeholder="255.25.255.0" value="{{$network->gateway}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-wide" id="storeNetwork">Save</button>
                                                <button type="reset" class="btn btn-warning btn-wide">Refresh</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-sm-6">
                                    <form class="form-horizontal  form-stripe" id="snmpForm">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">SNMP IPaddress</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="snmp_ip" class="form-control" id="snmp_server" placeholder="192.168.1.100" value="{{$network->snmp_ip}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">SNMP Version</label>
                                            <div class="col-sm-8">
                                                <select name="snmp_version" id="snmp_version" class="form-control">
                                                    <option value="{{$network->snmp_version}}">SNMP V.{{$network->snmp_version}}</option>
                                                    <option value="2">SNMP V.2</option>
                                                    <option value="3">SNMP V.3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-wide" id="storeSnmp">Save</button>
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

    </div>
    <!-- Modal -->
@endsection
@section('js')
    <script src="{{ asset('/') }}js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}js/clockpicker.js"></script>
    <script src="{{ asset('/') }}js/sweetalert.min.js"></script>
    <script>
        $('#default-datepicker').datepicker({
            todayHighlight: true
        });

        $('.clockpicker').clockpicker();

        $('#storeNetwork').click(function (e) {

            $.ajax({
                url: '{{ url('save-network') }}',
                data: $('#networkForm').serialize(),
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

        $('#storeSnmp').click(function (e) {

            $.ajax({
                url: '{{ url('save-snmp') }}',
                data: $('#snmpForm').serialize(),
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