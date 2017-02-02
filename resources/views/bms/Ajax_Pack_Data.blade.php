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
                    @foreach( $pack_info as $dt)
                        <tr>
                            <th>{{ $dt->alias }}</th>
                            <th>{{ $dt->value }} {{ $dt->unit }}</th>
                        </tr>
                    @endforeach
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
                        @for ($x = 1,$i = 0; $i < 8; [$x++,$i++])
                            <tr class="{{ ($cellstatus1[$i]->value == 1)? 'warning':'' }} {{ ($cellstatus1[$i]->value == 2)? 'danger ':'' }}">
                                <td>Cell {{ $x }}</td>
                                <td>{{ $vcell1[$i]->value }} mV</td>
                                <td>{{ $tcell1[$i]->value }} &deg;C</td>
                                <td>{{ ($bal1[$i]->value == 1)?'On':'Off' }} </td>
                            </tr>
                        @endfor

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
                        @for ($x = 9,$i = 0; $i < 8; [$x++,$i++])
                            <tr class="">
                                <td>Cell {{ $x }}</td>
                                <td>{{ $vcell2[$i]->value }} mV</td>
                                <td>{{ $tcell2[$i]->value }} &deg;C</td>
                                <td>{{ ($bal2[$i]->value == 1)?'On':'Off' }} </td>
                            </tr>
                        @endfor

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
                            <td>{{ $vmax }} mV</td>
                        </tr>
                        <tr class="">
                            <td>Vmin</td>
                            <td>{{ $vmin }} mV</td>
                        </tr>
                        <tr class="">
                            <td>Env Temp.</td>
                            <td>{{ $env_temp->value }} &deg;C</td>
                        </tr>
                        <tr class="">
                            <td>MOSFET Temp.</td>
                            <td>{{ $mos_temp->value }} &deg;C</td>
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

                {{--todo: create method show alarm if setting enable--}}
                @for ($x = 1,$i = 0; $i < 4; [$x++,$i++])
                    <tr>
                        {{--System Status--}}
                        <td>
                            @if(isset($sys_stat1[$i]))
                                {{$sys_stat1[$i]->alias}} - {!! $sys_stat1[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                            @endif
                        </td>
                        {{--<td>DcgMos-Off</td>--}}
                        {{--System Status--}}

                        {{--Alarm Status--}}
                        <td class="mymonitorTable">
                            @if(isset($alarm1[$i]))
                                {{$alarm1[$i]->alias}} - {!! $alarm1[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                            @endif
                        </td>
                        <td>
                            @if(isset($alarm2[$i]))
                                {{$alarm2[$i]->alias}} - {!! $alarm2[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                            @endif
                        </td>
                        <td>
                            @if(isset($alarm3[$i]))
                                {{$alarm3[$i]->alias}} - {!! $alarm3[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                            @endif
                        </td>
                        {{--Alarm Status--}}

                        {{--Protection status--}}
                        <td class="mymonitorTable">
                            @if( $set_protection1[$i]->state == 1)

                                @if(isset($protection1[$i]))
                                    {{$protection1[$i]->alias}} - {!! $protection1[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                                @endif
                            @else
                                @if(isset($protection1[$i]))
                                    {{$protection1[$i]->alias}} - Dis
                                @endif

                            @endif
                        </td>
                        <td>
                            @if($set_protection2[$i]->state == 1)
                                @if(isset($protection2[$i]))
                                    {{$protection2[$i]->alias}} - {!! $protection2[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                                @endif
                            @else
                                @if(isset($protection2[$i]))
                                    {{$protection2[$i]->alias}} - Dis
                                @endif
                            @endif

                        </td>
                        <td>
                           @if(isset($set_protection3[$i]))
                               @if($set_protection3[$i]->state == 1)
                                    @if(isset($protection3[$i]))
                                        {{$protection3[$i]->alias}} - {!! $protection3[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                                    @endif
                               @else
                                    @if(isset($protection3[$i]))
                                        {{$protection3[$i]->alias}} -
                                    @endif
                               @endif
                           @endif

                        </td>
                        {{--<td>Env-OTP-Off</td>--}}
                        {{--Protection status--}}

                        {{--Fault Status--}}
                        <td class="mymonitorTable">
                            @if(isset($fault1[$i]))
                                {{$fault1[$i]->alias}} - {!! $fault1[$i]->value == 1 ? '<span class="btn-xs btn-danger">On</span>':'Off' !!}
                            @endif
                        </td>
                        {{--<td>Sampling Fault-Off</td>--}}
                        {{--Fault Status--}}

                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>