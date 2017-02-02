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
                    <li><i class="fa fa-sliders" aria-hidden="true"></i><a href="#" class="text-capitalize">{{ Request::segment(1) }}</a></li>
                </ul>
            </div>
        </div>
        {{--Menu Monitoring&Setting--}}
        <div class="row animated fadeInUp">
            <div class="col-sm-12">
                {{--<h4 class="section-subtitle"><b>Horizontal</b> Tabs</h4>--}}
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                {{--<h5><b>Basic</b> tabs</h5>--}}
                                <form id="settting">
                                    <input type="hidden" name="_token" id="" value="{{csrf_token()}}">
                                    <div class="tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#home" data-toggle="tab">Settting 1</a></li>
                                            <li><a href="#profile" data-toggle="tab">Setting 2</a></li>
                                            <li><a href="#messages" data-toggle="tab">Setting 3</a></li>
                                            <li class="hide"><a href="#settings" data-toggle="tab"> Setting 4</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="home">
                                                <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for ($i = 0; $i < 4; $i++)
                                                        <tr>
                                                            {{--end setting1a--}}
                                                            <td>
                                                                @if(isset($setting1a[$i]))
                                                                    {{$setting1a[$i]->id}}  {{$setting1a[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting1a[$i]))

                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting1a[$i]->id}}][state]" type="checkbox" id="check1a{{$i}}" value="1"
                                                                               class="checkbox1a" {{ ($setting1a[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check1a{{$i}}" class="checkbox1a">{{ ($setting1a[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting1a[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1a[$i]->id}}][value]"
                                                                           value="{{ $setting1a[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting1a--}}

                                                            {{--setting1c--}}
                                                            <td>
                                                                @if(isset($setting1c[$i]))
                                                                    {{$setting1c[$i]->id}}  {{$setting1c[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting1c[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting1c[$i]->id}}][state]" type="checkbox" id="check1c{{$i}}" value="1"
                                                                               class="checkbox1c" {{ ($setting1c[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check1c{{$i}}" class="checkbox1c">{{ ($setting1c[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting1c[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1c[$i]->id}}][value]"
                                                                           value="{{ $setting1c[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting 1c--}}
                                                        </tr>
                                                    @endfor

                                                    @for ($i = 0; $i < 4; $i++)
                                                        <tr>
                                                            {{--setting1b--}}
                                                            <td>
                                                                @if(isset($setting1b[$i]))
                                                                    {{$setting1b[$i]->id}}  {{$setting1b[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting1b[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting1b[$i]->id}}][state]" type="checkbox" id="check1b{{$i}}" value="1"
                                                                               class="checkbox1b" {{ ($setting1b[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check1b{{$i}}" class="checkbox1b">{{ ($setting1b[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting1b[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1b[$i]->id}}][value]"
                                                                           value="{{ $setting1b[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting1b--}}

                                                            {{--setting 1d--}}
                                                            <td>
                                                                @if(isset($setting1d[$i]))
                                                                    {{$setting1d[$i]->id}}  {{$setting1d[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting1d[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting1d[$i]->id}}][state]" type="checkbox" id="check1d{{$i}}" value="1"
                                                                               class="checkbox1d" {{ ($setting1d[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check1d{{$i}}" class="checkbox1d">{{ ($setting1d[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting1d[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1d[$i]->id}}][value]"
                                                                           value="{{ $setting1d[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting 1d--}}

                                                        </tr>
                                                    @endfor


                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="submit" class="btn btn-primary btn-wide store" id="store1">Write All</button>
                                                        <button type="reset" class="btn btn-warning btn-wide">Read All</button>
                                                        <button type="button" class="btn btn-danger btn-wide" id="default1" onclick="set_default(1)" >Restore Default</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>
                                            <div class="tab-pane fade" id="profile">

                                                <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for ($i = 0; $i < 3; $i++)
                                                        <tr>
                                                            {{--end setting2a--}}
                                                            <td>
                                                                @if(isset($setting2a[$i]))
                                                                    {{$setting2a[$i]->id}}  {{$setting2a[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting2a[$i]))

                                                                    <div class="checkbox-custom checkbox-inline1 checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting2a[$i]->id}}][state]" type="checkbox" id="check2a{{$i}}" value="1"
                                                                               class="checkbox2a" {{ ($setting2a[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check2a{{$i}}" class="checkbox2a">{{ ($setting2a[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting2a[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2a[$i]->id}}][value]"
                                                                           value="{{ $setting2a[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting2a--}}

                                                            {{--setting2b--}}
                                                            <td>
                                                                @if(isset($setting2b[$i]))
                                                                    {{$setting2b[$i]->id}}  {{$setting2b[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting2b[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting2b[$i]->id}}][state]" type="checkbox" id="check2b{{$i}}" value="1"
                                                                               class="checkbox2b" {{ ($setting2b[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check2b{{$i}}" class="checkbox2b">{{ ($setting2b[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting2b[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2b[$i]->id}}][value]"
                                                                           value="{{ $setting2b[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting 2b--}}
                                                        </tr>
                                                    @endfor
                                                    @for ($i = 0; $i < 3; $i++)
                                                        <tr>
                                                            {{--end setting2dummy--}}
                                                            <td>
                                                                @if(isset($setting2d[$i]))
                                                                    {{$setting2d[$i]->id}}  {{$setting2d[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting2d[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting2d[$i]->id}}][state]" type="checkbox" id="check2c{{$i}}" value="1"
                                                                               class="checkbox2c" {{ ($setting2d[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check2c{{$i}}" class="checkbox2c">{{ ($setting2d[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting2d[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2d[$i]->id}}][value]"
                                                                           value="{{ $setting2d[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--end setting2dummy--}}

                                                            {{--end setting2a--}}
                                                            <td>
                                                                @if(isset($setting2c[$i]))
                                                                    {{$setting2c[$i]->id}}  {{$setting2c[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting2c[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting2c[$i]->id}}][state]" type="checkbox" id="check2c{{$i}}" value="1"
                                                                               class="checkbox2c" {{ ($setting2c[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check2c{{$i}}" class="checkbox2c">{{ ($setting2c[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting2c[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2c[$i]->id}}][value]"
                                                                           value="{{ $setting2c[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting2c--}}


                                                        </tr>
                                                    @endfor


                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="submit" class="btn btn-primary btn-wide store" id="store2">Save</button>
                                                        <button type="reset" class="btn btn-warning btn-wide">Refresh</button>
                                                        <button type="button" class="btn btn-danger btn-wide" id="default2" onclick="set_default(2)">Restore Default</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>

                                            </div>
                                            <div class="tab-pane fade" id="messages">

                                                <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for ($i = 0; $i < 8; $i++)
                                                        <tr>
                                                            {{--end setting3a--}}
                                                            <td>
                                                                @if(isset($setting3a[$i]))
                                                                    {{$setting3a[$i]->id}}  {{$setting3a[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting3a[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary hide">
                                                                        <input name="id[{{$setting3a[$i]->id}}][state]" type="checkbox" id="check3a{{$i}}" value="1"
                                                                               class="checkbox3a" {{ ($setting3a[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check3a{{$i}}" class="checkbox3a">{{ ($setting3a[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting3a[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting3a[$i]->id}}][value]"
                                                                           value="{{ $setting3a[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting3a--}}

                                                            {{--setting3b--}}
                                                            <td>
                                                                @if(isset($setting3b[$i]))
                                                                    {{$setting3b[$i]->id}}  {{$setting3b[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting3b[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 0)? '':'hide' }}">
                                                                        <input name="id[{{$setting3b[$i]->id}}][state]" type="checkbox" id="check3b{{$i}}" value="1"
                                                                               class="checkbox3b" {{ ($setting3b[$i]->state == 0)?'':'checked' }}>
                                                                        <label for="check3b{{$i}}" class="checkbox3b">{{ ($setting3b[$i]->state == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting3b[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting3b[$i]->id}}][value]"
                                                                           value="{{ $setting3b[$i]->value }}">

                                                                @endif
                                                            </td>
                                                            {{--setting 3b--}}
                                                        </tr>
                                                    @endfor


                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="submit" class="btn btn-primary btn-wide store" id="store3">Save</button>
                                                        <button type="reset" class="btn btn-warning btn-wide">Refresh</button>
                                                        <button type="button" class="btn btn-danger btn-wide" id="default3" onclick="set_default(3)">Restore Default</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>

                                            <div class="tab-pane fade" id="settings">

                                                <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="50%">
                                                    <thead>
                                                    <tr>
                                                        <th>Parameter Name</th>
                                                        <th>state</th>
                                                        <th class="col-sm-1">Value</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>


                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="submit" class="btn btn-primary btn-wide store" id="store">Save</button>
                                                        <button type="reset" class="btn btn-warning btn-wide">Refresh</button>
                                                        <button type="button" class="btn btn-danger btn-wide" id="cancel">Cancel</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>

                                            </div>
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
@endsection
@section('js')
    <script src="{{ asset('/') }}js/sweetalert.min.js"></script>
    <script>


        $('.store').click(function (e) {
            $.ajax({
                url: '{{ url('save-setting') }}',
                data: $('#settting').serialize(),
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


        $("#check1a0").click(function () {
            $(".checkbox1a").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });


        $("#check1b0").click(function () {
            $(".checkbox1b").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check1c0").click(function () {
            $(".checkbox1c").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check1d0").click(function () {
            $(".checkbox1d").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check2a0").click(function () {
            $(".checkbox2a").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check2b0").click(function () {
            $(".checkbox2b").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check2c0").click(function () {
            $(".checkbox2c").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check3b0").click(function () {
            $(".checkbox3b").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        function set_default(id) {
//            console.log('reset group parameter:'+id);
            swal({
                title: "Reset To Default",
//                text: "Submit to run ajax request",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {

                $.ajax({
                    url: "{{ url('reset-setting') }}/" + id,
                    type: "GET"
                })
                    .done(function() {
                        swal({
                            title: "Success",
                            text: "Default Setting Successfully Loaded",
                            type: "success"
                        },function() {
                            location.reload();
                        });
                    })
                    .error(function () {
                        swal("Oops", "Error, Please Try Again!", "error");
                    });
            });

        }
    </script>

@endsection