@extends('bms.PageContent')

@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert2.css">
    <link rel="stylesheet" href="{{asset('/')}}css/loadingbox.css">
@endsection

@section('content')
    <div class="content">
        {{--Menu Monitoring&Setting--}}
        <div class="content-header leftside-content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-users" aria-hidden="true"></i><a href="#" class="text-capitalize">{{ Request::segment(1) }}</a></li>
                </ul>
            </div>
        </div>
        {{--Menu Monitoring&Setting--}}

        <div class="row animated slideInLeft"  id="user-list">
            <div class="col-sm-12">
                {{--<h4 class="section-subtitle"><b>Searching, ordering and paging</b></h4>--}}
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                          <form id="myform">
                          	<legend>Form Title</legend>
                              {{csrf_field()}}

                          	<div class="form-group">
                          		<label for="">Username</label>
                          		<input type="text" class="form-control" name="username" id="username" placeholder="Input...">
                          	</div>



                          	<button type="button" class="btn btn-primary store">Submit</button>
                          </form>
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
                    <h4 class="modal-title" id="modal-label">Default Modal</h4>
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

    <div class="modal fade" id="progress2" tabindex="-1" role="dialog" aria-labelledby="modal-small-label">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="modal-label">Proccessing....</h4>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>
                </div>

                <span class="sr-only">0% Complete</span>

            </div>
        </div>
    </div>
    <div class="modal" id="progress" tabindex="-1" role="dialog" aria-labelledby="modal-label" >
        <div class="modal-dialog modal-sm" role="document">

            <center id="loadingbox">
                <h2 class="">Loading</h2>
                <div id="out" class="circle">
                    <div id="quarterbox">
                        <div id="quarter" class="circle"></div>
                    </div>
                    <div id="in" class="circle"></div>
                </div>
            </center>

            <div class="loader hide">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <div class="progress hide">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    <span class="sr-only">0% Complete</span>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{ asset('/') }}js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('/') }}js/sweetalert2.js"></script>

    <script>
        $('.store2').click(function (e) {
            swal({
                title: "Ajax request example",
                text: "Submit to run ajax request",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                setTimeout(function () {
                    swal("Ajax request finished!");
                }, 2000);
            });
        });

        $('.store1').click(function (e) {
            swal({
                title: "Authorized Required",
                text: "Password:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "Write something"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                swal("Nice!", "You wrote: " + inputValue, "success");
            });
        });


        $('.store3').click(function (e) {
            swal({
                title: 'Multiple inputs',
                html:
                '<div class="form-group">'+
                '<label for="">Password</label>'+
                '<input type="password" id="password" name="password" class="swal2-input">' +
                '</div>'+
                '<input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">',

                onOpen: function () {
                    $('#password').focus()
                }
            }).then(function () {
//                swal(JSON.stringify(result));
                console.log('ajax method here');

                $.ajax({
                    url: '{{ url('authorize-write') }}',
                    data: {'password' :  $('#password').val(), '_token' : $('#_token').val()},
                    type: 'POST',
                    success: function () {
                        swal("Success!", "Data Saved!", "success");
                    },

                    error: function (jqXhr) {
                        console.log('error authorized no process allowed');
//                  console.log('re enter password');

                        //show sweet alert
                        var errorHtml = '';

                        $.each(jqXhr.responseJSON, function (index, value) {
                            errorHtml += '<div class="text-left col-sm-offset-1"><li>' + value + '</li></div>';

                        });
                        swal({
                            title: "Error!",
                            html: true,
                            text: jqXhr,
                            type: 'error'
                        });
                    },
                });

                }).catch(swal.noop);
        });

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

        $('.store7').click(function () {
            swal({
                type:'info',
                title: 'Authorize Required!',
                text: 'Password:',
                html:
                '<label for="">Password :</label>'+
                '<input type="password" id="password" name="password" class="swal2-input">' +
                '<input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">',

                animation: false
            })
        })

    </script>

@endsection