@extends('bms.PageContent')
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert.css">
    <style>
        .mymonitorTable {
            border-left: 1px solid grey;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        {{--Pack List--}}
        <div class="content-header leftside-content-header" style="background-color:#003561">
            <div class="btn-group hide">
                @for ($i = 1; $i < 16; $i++)
                    <button id="pack2{{$i}}" onclick="get_pack({{$i}})" class="btn btn-darker-1 pack">Pack {{$i}}</button>
                    <input type="hidden" id="pack_id2">
                @endfor
            </div>
            <div class="btn-group ">
               @foreach($pack_list as $ls)
                    <button id="pack{{$ls->id}}" onclick="get_pack({{$ls->id}})" class="btn btn-darker-1 pack">Pack {{$ls->id}}</button>
                    <input type="hidden" id="pack_id">
               @endforeach
                <button class="btn btn-darker-1 pack" disabled>|</button>
            </div>
        </div>
        {{--Pack List--}}

        <div class="row animated fadeInRight" id="data">
            <div class="col-lg-12" >
                <div class="panel b-info bt-md">
                    <div class="panel-content p-none">
                        <div class="widget-list list-left-element list-sm">
                            <div class="col-md-3">
                                <table class="table table-hover h6">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th colspan="2" class="text-center">Pack Info:</th>
                                    </tr>
                                    <tr>
                                        <th>SOC</th>
                                        <th>100%</th>
                                    </tr>
                                    <tr>
                                        <th>SOH</th>
                                        <th>0%</th>
                                    </tr>
                                    <tr>
                                        <th>Ipack</th>
                                        <th>0 A</th>
                                    </tr>
                                    <tr>
                                        <th>Vpack</th>
                                        <th>0 V</th>
                                    </tr>
                                    <tr>
                                        <th>Remain Cap</th>
                                        <th>0 AH</th>
                                    </tr>
                                    <tr>
                                        <th>Full</th>
                                        <th>0 AH</th>
                                    </tr>
                                    <tr>
                                        <th>Cycle Count</th>
                                        <th>0 Cycle</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-6 m-none p-none">
                                    <table class="table h6">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th></th>
                                            <th class="text-left">Volt</th>
                                            <th class="text-left">Temp.</th>
                                            <th>Bal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="">
                                            <td>Cell 1</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 2</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 3</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 4</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 5</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 6</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 7</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 8</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 m-none p-none">
                                    <table class="table h6">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th></th>
                                            <th class="text-left">Volt</th>
                                            <th>Temp.</th>
                                            <th>Bal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="">
                                            <td>Cell 1</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 2</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 3</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 4</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 5</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 6</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 7</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        <tr class="">
                                            <td>Cell 8</td>
                                            <td>0 V</td>
                                            <td>0 &deg;C</td>
                                            <td>Off</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-sm-12">
                                    <table class="table h6">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th colspan="2" class="text-center">Parameter</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="">
                                            <td>Vmax</td>
                                            <td>0&deg;C</td>
                                        </tr>
                                        <tr class="">
                                            <td>Vmin</td>
                                            <td>0&deg;C</td>
                                        </tr>
                                        <tr class="">
                                            <td>Env Temp.</td>
                                            <td>0&deg;C</td>
                                        </tr>
                                        <tr class="">
                                            <td>MOSFET Temp.</td>
                                            <td>0&deg;C</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <table class="table h6">
                                <thead>
                                <tr class="info">
                                    <th colspan="1" class="text-center">System Status</th>
                                    <th colspan="3" class="text-center">Alarm Status</th>
                                    <th colspan="3" class="text-center">Protection Status</th>
                                    <th colspan="1" class="text-center">Fault Status</th>
                                </tr>
                                </thead>
                                <tbody class="text-xs">
                                <tr>
                                    <td>Fully-Off</td>
                                    <td class="mymonitorTable">POV - Off </td>
                                    <td>Chg-OC - Off</td>
                                    <td>Env-OT - Off</td>
                                    <td class="mymonitorTable">COVP - Off</td>
                                    <td>Chg-OCP - Off</td>
                                    <td>Dcg-OTP - Off</td>
                                    <td class="mymonitorTable">Dcg-Mos Fault - Off</td>
                                </tr>
                                <tr>
                                    <td>Chg Mos-Off</td>
                                    <td class="mymonitorTable">PUV - Off</td>
                                    <td>Dcg-OC - Off</td>
                                    <td>Env-UT - Off</td>
                                    <td class="mymonitorTable">CUVP - Off</td>
                                    <td>Dcg-OCP - Off</td>
                                    <td>Mos-OTP - Off</td>
                                    <td class="mymonitorTable">Chg-Mos Fault - Off</td>
                                </tr>
                                <tr>
                                    <td>Dcg Mos - Off</td>
                                    <td class="mymonitorTable">COV - Off</td>
                                    <td>Chg-OT - Off</td>
                                    <td>soc low warning - Off</td>
                                    <td class="mymonitorTable">POVP - Off</td>
                                    <td>SCP - Off</td>
                                    <td>Env-OTP - Off</td>
                                    <td class="mymonitorTable"></td>
                                </tr>
                                <tr>
                                    <td>PWR Suply - Off</td>
                                    <td class="mymonitorTable">CUV - Off</td>
                                    <td>Dcg-OT - Off</td>
                                    <td></td>
                                    <td class="mymonitorTable">PUVP - Off</td>
                                    <td>Chg-OTP - Off</td>
                                    <td></td>
                                    <td class="mymonitorTable"></td>
                                </tr>
                                </tbody>
                            </table>
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
        //init or set pack 1 as default active
        $('#pack{{$pack_active->id}}').addClass('btn-lighter-1').removeClass('btn-darker-1');
        $('#pack_id').val({{$pack_active->id}});

        //group button active switch
        $('.pack').click(function () {
            $('.pack').removeClass('btn-lighter-1').addClass('btn-darker-1');
            $(this).addClass('btn-lighter-1').removeClass('btn-darker-1');
        });

        function get_pack(id) {
            console.log(id);
            $('#pack_id').val(id);
        }

        //todo : function is ok , but temporary shut
        setTimeout(function refreshTable() {
            $.ajax({
                url:'{{ url('dashboard') }}'+'/'+ $('#pack_id').val(),
                dataType:'html',

                success:function(data) {
                    $('#data').find('div').empty().append(data);
                    setTimeout(refreshTable,1000);
                }
            });
        }, 1000);


    </script>
@endsection