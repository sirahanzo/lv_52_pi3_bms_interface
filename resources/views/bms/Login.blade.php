@extends('layouts.bms')
@section('css')
    <style>
        #stu{
            color: whitesmoke;
        }
        #stu:hover,#stu:active{
            color: orange;
        }
    </style>
@endsection
@section('page')
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                <img alt="logo" src="images/nipress-logo.png" />
                <h3 class="mb-xlg text-center " style="color: whitesmoke"><b>SNMP NS LITH</b></h3>

            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Errors!</strong>
                            @foreach($errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-content bg-scale-0">
                        <form action="{{url('login')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="mt-md">
                                    <span class="input-with-icon">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ old('username') }}">
                                    <i class="fa fa-user"></i>
                                </span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="mt-md">
                                    <span class="input-with-icon">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" id="remember-me" value="remember">
                                    <label class="check" for="remember-me">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
        <h6 class="mb-xlg text-center" style="color: whitesmoke">&copy; 2017 | Powered By , <a href="http://www.sinergiteknologi.com/" target="_blank" id="stu">PT. SINERGI TEKNOLOGI UTAMA</a></h6>
    </div>
@endsection