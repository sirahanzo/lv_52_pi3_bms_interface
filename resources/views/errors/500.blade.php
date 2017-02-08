@extends('layouts.bms')

@section('content')
    <div class="page-body">
        <div class="row animated bounce">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel mt-xlg">
                    <div class="panel-content">
                        <h1 class="error-number">500</h1>
                        <h2 class="error-name">Internal server error</h2>
                        <p class="error-text">Sorry, something went wrong.
                            <br/>Please wait a moment and try again or use one of the options below</p>
                        <div class="row mt-xlg">
                            <div class="col-sm-6  col-sm-offset-3">
                                <button class="btn btn-sm btn-darker-2 btn-block" onclick="history.back();">Previous page</button>
                                <a href="{{ url('dashboard') }}" class="btn btn-sm btn-primary btn-block">Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection