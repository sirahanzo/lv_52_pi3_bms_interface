@extends('bms.PageContent')

@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert.css">
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
                            <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nama</td>
                                    <td>Nama User</td>
                                    <td>
                                        <button class="btn btn-primary" id="edit" onclick="edit(1)">Edit</button>
                                        <button class="btn btn-danger" id="delete" onclick="destroy(1)">Delete</button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <button type="button" class="btn btn-wide btn-info" id="showForm">Add New User</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" id="form-create" style="display: none">
            <div class="col-md-12">
                {{--<h4 class="section-subtitle"><b>Stripe</b> form</h4>--}}
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal form-stripe" id="newUserForm">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" id="username" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Password</label>
                                        <div class="col-sm-10">
                                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">Level</label>
                                        <div class="col-sm-10">
                                            <select name="level" id="level" class="form-control">
                                                <option value=""> -- Select One -- </option>
                                                <option value="0"> Admin </option>
                                                <option value="1"> User </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-wide" id="store_btn" onclick="store()" >Save</button>
                                            <button type="reset" class="btn btn-warning btn-wide">Refresh</button>
                                            <button type="button" class="btn btn-danger btn-wide" id="cancel">Cancel</button>
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
    <script src="{{ asset('/') }}js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('/') }}js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#showForm').click(function () {
                $('#form-create').toggle('slide');
                $('#user-list').toggle('hide');
                $('#newUserForm').trigger("reset");

            });

            $('#cancel').click(function () {
                $('#form-create').toggle('hide');
                $('#user-list').toggle('slide');

            });


        });

        function edit(id) {
            console.log('edit data!');
            $('#store_btn').text('Update');

            $('#form-create').toggle('slide');
            $('#user-list').toggle('hide');
            $('#newUserForm').trigger("reset");
            $('#store_btn').attr('onclick','update('+id+')');
            $('#store_btn').attr('id','update_btn');
        }

        function update(id) {

            console.log('update : update data user id'+id);
            var formData = $('#newUserForm').serialize();

            $.ajax({
                type: 'POST',
                url: "{{ url('debug-update').'/' }}" + id,
                data: formData,

                success: function (data) {
                    console.log(data);
                    //Success Message == 'Title', 'Message body', Last one leave as it is
                    swal("Success!", "Data Updated!", "success");
                    oTable.draw();
                    $('#newUserForm').trigger("reset");
                    e.preventDefault();
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

            })
            e.preventDefault();
        }

        /*$(document).ready(function(){
            $('#newUserForm').submit(function(e){
//                alert("Submitted");
                $.ajax({
                    url: '{{ url('debug-save') }}',
                    data: $('#newUserForm').serialize(),
                    type: 'POST',
                    success: function (data) {
                        console.log(data);
                        swal("Success!", "Data Saved!", "success");
//                    oTable.draw();
                        $('#form-create').toggle('hide');
                        $('#user-list').toggle('slide');
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
        });*/


        function destroy(id) {
            console.log('Delete : destroy user id ='+id);
            $('#newUserForm').submit(
                function (e) {
                    $.ajax({
                        url: '{{ url('debug-save') }}',
                        data: $('#newUserForm').serialize(),
                        type: 'POST',
                        success: function (data) {
                            console.log(data);
                            swal("Success!", "Data Saved!", "success");
//                    oTable.draw();
                            $('#form-create').toggle('hide');
                            $('#user-list').toggle('slide');
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
                    e.preventDefault(); //This is to Avo
                }

            );

        }

        /*$('#store_btn').click(function (e) {
            $.ajax({
                url: '{{ url('debug-save') }}',
                data: $('#newUserForm').serialize(),
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    swal("Success!", "Data Saved!", "success");
//                    oTable.draw();
                    $('#form-create').toggle('hide');
                    $('#user-list').toggle('slide');
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
*/
    </script>

@endsection