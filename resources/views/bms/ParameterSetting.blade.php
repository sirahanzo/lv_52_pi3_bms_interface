@extends('bms.PageContent')
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert2.css">
    <link rel="stylesheet" href="{{asset('/')}}css/loadingbox.css">
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
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <tr>
                                                            {{--end setting1a--}}
                                                            <td class="{{ ($setting1a[$i]->id == 1)?'hide':'' }}" >
                                                                @if(isset($setting1a[$i]))
                                                                      {{$setting1a[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting1a[$i]->id == 1)?'hide':'' }}" >
                                                                @if(isset($setting1a[$i]))

                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 1)? '':'hide' }}">
                                                                        <input name="id[{{$setting1a[$i]->id}}][state]" type="checkbox" id="check1a{{$i}}" value="1"
                                                                               class="checkbox1a" {{ ($setting1a[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check1a{{$i}}" class="checkbox1a">{{ ($setting1a[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting1a[$i]->id == 1)?'hide':'' }}" >
                                                                @if(isset($setting1a[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1a[$i]->id}}][value]"
                                                                           value="{{ $setting1a[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting1a--}}

                                                            {{--setting1c--}}
                                                            <td class="{{ ($setting1c[$i]->id == 11)?'hide':'' }}" >
                                                                @if(isset($setting1c[$i]))
                                                                      {{$setting1c[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting1c[$i]->id == 11)?'hide':'' }}" >
                                                                @if(isset($setting1c[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 1)? '':'hide' }} ">
                                                                        <input name="id[{{$setting1c[$i]->id}}][state]" type="checkbox" id="check1c{{$i}}" value="1"
                                                                               class="checkbox1c" {{ ($setting1c[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check1c{{$i}}" class="checkbox1c">{{ ($setting1c[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting1c[$i]->id == 11)?'hide':'' }}" >
                                                                @if(isset($setting1c[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1c[$i]->id}}][value]"
                                                                           value="{{ $setting1c[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting 1c--}}
                                                        </tr>
                                                    @endfor

                                                    @for ($i = 0; $i < 5; $i++)
                                                        <tr>
                                                            {{--setting1b--}}
                                                            <td class="{{ ($setting1b[$i]->id == 6)?'hide':'' }}" >
                                                                @if(isset($setting1b[$i]))
                                                                    {{$setting1b[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting1b[$i]->id == 6)?'hide':'' }}" >
                                                                @if(isset($setting1b[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 1)? '':'hide' }} ">
                                                                        <input name="id[{{$setting1b[$i]->id}}][state]" type="checkbox" id="check1b{{$i}}" value="1"
                                                                               class="checkbox1b" {{ ($setting1b[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check1b{{$i}}" class="checkbox1b">{{ ($setting1b[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting1b[$i]->id == 6)?'hide':'' }}" >
                                                                @if(isset($setting1b[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1b[$i]->id}}][value]"
                                                                           value="{{ $setting1b[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting1b--}}

                                                            {{--setting 1d--}}
                                                            <td class="{{ ($setting1d[$i]->id == 16)?'hide':'' }}" >
                                                                @if(isset($setting1d[$i]))
                                                                      {{$setting1d[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting1d[$i]->id == 16)?'hide':'' }}" >
                                                                @if(isset($setting1d[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 1)? '':'hide' }} ">
                                                                        <input name="id[{{$setting1d[$i]->id}}][state]" type="checkbox" id="check1d{{$i}}" value="1"
                                                                               class="checkbox1d" {{ ($setting1d[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check1d{{$i}}" class="checkbox1d">{{ ($setting1d[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting1d[$i]->id == 16)?'hide':'' }}" >
                                                                @if(isset($setting1d[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting1d[$i]->id}}][value]"
                                                                           value="{{ $setting1d[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting 1d--}}

                                                        </tr>
                                                    @endfor


                                                    </tbody>
                                                </table>
                                                <div class="form-group hide">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="button" class="btn btn-primary btn-wide store" id="store">Write All</button>
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
                                                    @for ($i = 0; $i < 4; $i++)
                                                        <tr>
                                                            {{--end setting2a--}}
                                                            <td class="{{ ($setting2a[$i]->id == 21)?'hide':'' }}" >
                                                                @if(isset($setting2a[$i]))
                                                                       {{$setting2a[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting2a[$i]->id == 21)?'hide':'' }}" >
                                                                @if(isset($setting2a[$i]))

                                                                    <div class="checkbox-custom checkbox-inline1 checkbox-primary {{ ($i == 1)? '':'hide' }}">
                                                                        <input name="id[{{$setting2a[$i]->id}}][state]" type="checkbox" id="check2a{{$i}}" value="1"
                                                                               class="checkbox2a" {{ ($setting2a[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check2a{{$i}}" class="checkbox2a">{{ ($setting2a[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting2a[$i]->id == 21)?'hide':'' }}" >
                                                                @if(isset($setting2a[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2a[$i]->id}}][value]"
                                                                           value="{{ $setting2a[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting2a--}}

                                                            {{--setting2b--}}
                                                            <td class="{{ ($setting2b[$i]->id == 25)?'hide':'' }}" >
                                                                @if(isset($setting2b[$i]))
                                                                      {{$setting2b[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting2b[$i]->id == 25)?'hide':'' }}" >
                                                                @if(isset($setting2b[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 1)? '':'hide' }} ">
                                                                        <input name="id[{{$setting2b[$i]->id}}][state]" type="checkbox" id="check2b{{$i}}" value="1"
                                                                               class="checkbox2b" {{ ($setting2b[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check2b{{$i}}" class="checkbox2b">{{ ($setting2b[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting2b[$i]->id == 25)?'hide':'' }}" >
                                                                @if(isset($setting2b[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2b[$i]->id}}][value]"
                                                                           value="{{ $setting2b[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting 2b--}}
                                                        </tr>
                                                    @endfor
                                                    @for ($i = 0; $i < 3; $i++)
                                                        <tr>
                                                            {{--end setting2dummy--}}
                                                            <td class="">
                                                                @if(isset($setting2d[$i]))
                                                                      {{$setting2d[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting2d[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary ">
                                                                        <input name="id[{{$setting2d[$i]->id}}][state]" type="checkbox" id="check2c{{$i}}" value="1"
                                                                               class="checkbox2c" {{ ($setting2d[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check2c{{$i}}" class="checkbox2c">{{ ($setting2d[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting2d[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2d[$i]->id}}][value]"
                                                                           value="{{ $setting2d[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--end setting2dummy--}}

                                                            {{--end setting2a--}}
                                                            <td class="{{ ($setting2c[$i]->id == 29)?'hide':'' }}" >
                                                                @if(isset($setting2c[$i]))
                                                                      {{$setting2c[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($setting2c[$i]->id == 29)?'hide':'' }}" >
                                                                @if(isset($setting2c[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary {{ ($i == 1)? '':'hide' }}">
                                                                        <input name="id[{{$setting2c[$i]->id}}][state]" type="checkbox" id="check2c{{$i}}" value="1"
                                                                               class="checkbox2c" {{ ($setting2c[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check2c{{$i}}" class="checkbox2c">{{ ($setting2c[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($setting2c[$i]->id == 29)?'hide':'' }}" >
                                                                @if(isset($setting2c[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting2c[$i]->id}}][value]"
                                                                           value="{{ $setting2c[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting2c--}}


                                                        </tr>
                                                    @endfor


                                                    </tbody>
                                                </table>
                                                <div class="form-group hide">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="button" class="btn btn-primary btn-wide store" id="store2">Write All</button>
                                                        <button type="reset" class="btn btn-warning btn-wide">Read All</button>
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
                                                    @for ($x=0,$i = 0; $i < 8; $i++)
                                                        <tr>
                                                            {{--end setting3a--}}
                                                            <td>
                                                                @if(isset($setting3a[$i]))
                                                                      {{$setting3a[$i]->parametersetting['name']}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($setting3a[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary hide">
                                                                        <input name="id[{{$setting3a[$i]->id}}][state]" type="checkbox" id="check3a{{$i}}" value="1"
                                                                               class="checkbox3a" {{ ($setting3a[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check3a{{$i}}" class="checkbox3a">{{ ($setting3a[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(isset($setting3a[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting3a[$i]->id}}][value]"
                                                                           value="{{ $setting3a[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting3a--}}

                                                            {{--setting3b--}}
                                                            <td class="{{ ($i == 0)? 'hide':'' }}">
                                                                @if(isset($setting3b[$i]))
                                                                      {{$setting3b[$i]->parametersetting['name']}} {{ ($setting3b[1]->id == 40)?'hide':'' }}
                                                                @endif
                                                            </td>
                                                            <td class="{{ ($i == 0)? 'hide':'' }}">
                                                                @if(isset($setting3b[$i]))
                                                                    <div class="checkbox-custom checkbox-inline checkbox-primary hide ">
                                                                        <input name="id[{{$setting3b[$i]->id}}][state]" type="checkbox" id="check3b{{$i}}" value="1"
                                                                               class="checkbox3b" {{ ($setting3b[0]->value == 0)?'':'checked' }} disabled>
                                                                        <label for="check3b{{$i}}" class="checkbox3b">{{ ($setting3b[0]->value == 0)?'Disable':'Enable' }}</label>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td class="{{ ($i == 0)? 'hide':'' }}">
                                                                @if(isset($setting3b[$i]))
                                                                    <input class="form-control" type="text" name="id[{{$setting3b[$i]->id}}][value]"
                                                                           value="{{ $setting3b[$i]->value }}" disabled>

                                                                @endif
                                                            </td>
                                                            {{--setting 3b--}}
                                                        </tr>
                                                    @endfor


                                                    </tbody>
                                                </table>
                                                <div class="form-group hide">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="button" class="btn btn-primary btn-wide store" id="store3">Write Al</button>
                                                        <button type="reset" class="btn btn-warning btn-wide">Read All</button>
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

    <div class="modal fade" id="default-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-label"> Authorization </h4>
                </div>
                <div class="modal-body">
                    <form  role="form" id="form-authorized">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Input Password...">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="authorized">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('/') }}js/sweetalert2.js"></script>
    <script>

        function reloadPage() {
            window.location.reload();
        }

        function store() {
            console.log('store data');
            $('#progress').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            $.ajax({
                url: '{{ url('save-setting') }}',
                data: $('#settting').serialize(),
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    swal("Success!", "Data Saved!", "success");
                    $('#progress').modal('hide');
                },
                error: function (jqXhr) {
                    $('#progress').modal('hide');

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
        }


        function set_default(id){
            console.log('are you sure reset to default? (swall question)');
            swal({
                type: 'question',
                title: 'Reset To Default?',
            }).then(function () {
                console.log('group id'+id);
                swal({
                    title: 'Authorized Required',
                    type: 'info',
                    html:
                    '<label for="">Password :</label>'+
                    '<input type="password" id="password" name="password" class="swal2-input">' +
                    '<input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,

                    onOpen: function () {
                        $('#password').focus()
                    },

                    allowOutsideClick: false
                }).then(function (e) {
//                    console.log('ajax request here');
                    $.ajax({
                        url: '{{ url('authorize-write') }}',
                        data: {'password' :  $('#password').val(), '_token' : $('#_token').val()},
                        type: 'POST',
                        success:function(){
                            console.log('authorized then call restore default');
                            console.log('group id'+ id);
                            restore(id);
                            e.preventDefault();
                        },

                        error:function (jqXhr) {
                            console.log('error');

                            swal({
                                title: "Error!",
                                text: JSON.parse(jqXhr.responseText).message,
                                type: 'error'
                            });

                        },
                    });
                });
            });
//            console.log('show authorized form (swall)');
//            console.log('success/failed');
        };


        function restore(id) {
            console.log('ajax request here');
            console.log('show loading');
            $('#progress').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            $.ajax({
                url: "{{ url('reset-setting') }}/" + id,
                type: "GET",
            }).done(function() {
                $('#progress').modal('hide');
                swal({
                    title: "Success",
                    text: "Default Setting Successfully Loaded",
                    type: "success"
                });
                reloadPage();
            })
                .error(function () {
                    $('#progress').modal('hide');
                    swal("Oops", "Error, Please Try Again!", "error");
                });

//            reloadPage();

        }

        $("#check1a1").click(function () {
            $(".checkbox1a").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });


        $("#check1b1").click(function () {
            $(".checkbox1b").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check1c1").click(function () {
            $(".checkbox1c").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check1d1").click(function () {
            $(".checkbox1d").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check2a1").click(function () {
            $(".checkbox2a").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check2b1").click(function () {
            $(".checkbox2b").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check2c1").click(function () {
            $(".checkbox2c").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        $("#check3b1").click(function () {
            $(".checkbox3b").prop('checked', $(this).prop('checked'));
            if ($(this).is(':checked')) {
                $(this).siblings('label').html('Enable');
            } else {
                $(this).siblings('label').html('Disable');
            }
        });

        /*function set_default1(id) {
            console.log('reset group parameter:'+id);
            swal({
                title: "Reset To Default",
                text: "Submit to run ajax request",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {

                $.ajax({
                    url: "/" + id,
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

        }*/

        $('.store').click(function (e) {
            swal({
                title: 'Authorized Required',
                type: 'info',
                html:
                '<label for="">Password :</label>'+
                '<input type="password" id="password" name="password" class="swal2-input">' +
                '<input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,

                onOpen: function () {
                    $('#password').focus()
                },

                allowOutsideClick: false
            }).then(function () {
                console.log('ajax method here');

                $.ajax({
                    url: '{{ url('authorize-write') }}',
                    data: {'password' :  $('#password').val(), '_token' : $('#_token').val()},
                    type: 'POST',
                    success: function () {
                        console.log('call the store function here');
//                        swal("Success!", "Data Saved!", "success");
                        store();
                    },

                    error: function (jqXhr) {
                        console.log('error authorized no process allowed');
                        swal({
                            title: "Error!",
                            text:JSON.parse(jqXhr.responseText).message,
                            type: 'error'
                        });
                    },


                });
            })
        });

    </script>

@endsection