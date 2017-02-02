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
                                        <div class="col-sm-3 col-sm-offset-1">
                                            @for ($x = 1,$i = 0; $i < 8; [$x++,$i++])
                                                <div class="checkbox-custom checkbox-info">
                                                    <input name="id[{{$x}}][state]" type="checkbox" id="checkboxPack{{$x}}" value="1" {{ ($pack[$i]->state == 0)?'':'checked' }}>
                                                    <label for="checkboxPack{{$x}}">Pack {{$x}}</label>
                                                </div>
                                            @endfor
                                        </div>
                                        <div class="col-sm-3">
                                            @for ($x = 9,$i = 8; $i < 15; [$x++,$i++])
                                                <div class="checkbox-custom checkbox-info">
                                                    <input name="id[{{$x}}][state]" type="checkbox" id="checkboxPack{{$x}}" value="1" {{ ($pack[$i]->state == 0)?'':'checked' }}>
                                                    <label for="checkboxPack{{$x}}">Pack {{$x}}</label>
                                                </div>
                                            @endfor
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
                url: '{{ url('save-pack') }}',
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