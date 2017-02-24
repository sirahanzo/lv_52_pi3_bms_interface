@extends('bms.PageContent')
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert.css">
@endsection

@section('content')
    <div class="content">
        {{--Menu Monitoring&Setting--}}
        <div class="content-header leftside-content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-globe" aria-hidden="true"></i><a href="#" class="text-capitalize">{{ Request::segment(1) }}</a></li>
                </ul>
            </div>
        </div>
        {{--Menu Monitoring&Setting--}}

        <div class="row" id="form-create">
            <div class="col-md-12">
                {{--<h4 class="section-subtitle"><b>Stripe</b> form</h4>--}}
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal form-stripe" id="siteinfoForm">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Part Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="part_number" class="form-control" id="part_number" placeholder="Name" value="{{$site->part_number}}" {{ (Auth::user()->level == 'super')?'':'disabled' }}>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Serial Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="site_id" class="form-control" id="serial_number" placeholder="Name" value="{{$site->serial_number}}" {{ (Auth::user()->level == 'super')?'':'disabled' }} >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Site ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="site_id" class="form-control" id="site_id" placeholder="Name" value="{{$site->site_id}}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Site Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="site_name" class="form-control" id="site_name" placeholder="Name" value="{{$site->site_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Site Address</label>
                                        <div class="col-sm-10">
                                            <textarea name="site_address" id="site_address" cols="30" rows="3" class="form-control">{{$site->site_address}}</textarea>
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
    <script src="{{ asset('/') }}js/sweetalert.min.js"></script>
    <script>
        $('#store').click(function (e) {
            $.ajax({
                url: '{{ url('save-siteinfo') }}',
                data: $('#siteinfoForm').serialize(),
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