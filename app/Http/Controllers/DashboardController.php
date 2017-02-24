<?php

namespace App\Http\Controllers;

use App\Http\Traits\BmsTrait;
use App\Monitoring;
use App\MonitoringStatus;
use App\SettingTreshold;


class DashboardController extends Controller {


    use BmsTrait;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $data['pack_list'] = $this->packList();
        $data['pack_active'] = $this->packActive();

        return view('bms.Dashboard',$data);
    }


    public function pack($pack_id = 1)
    {
        $data['pack'] = $pack_id;

        $data['pack_info'] = $this->dataMonitoring($pack_id, 35, 39);
        $data['vcell1'] = $this->dataMonitoring($pack_id, 1, 8);
        $data['vcell2'] = $this->dataMonitoring($pack_id, 9, 16);
        $data['tcell1'] = $this->dataMonitoring($pack_id, 17, 24);
        $data['tcell2'] = $this->dataMonitoring($pack_id, 25, 32);
        $data['bal1'] = MonitoringStatus::whereBetween('status_id', [49, 56])->get(['value_' . $pack_id . ' as value']);
        $data['bal2'] = MonitoringStatus::whereBetween('status_id', [57, 64])->get(['value_' . $pack_id . ' as value']);

        $data['vmax'] = Monitoring::whereBetween('parameter_id', [1, 15])->max('value_' . $pack_id);
        $data['vmin'] = Monitoring::whereBetween('parameter_id', [1, 15])->min('value_' . $pack_id);
        $data['mos_temp'] = Monitoring::where('parameter_id', 33)->first(['value_' . $pack_id . ' as value']);
        $data['env_temp'] = Monitoring::where('parameter_id', 34)->first(['value_' . $pack_id . ' as value']);
        $remain = Monitoring::where('parameter_id', 37)->first(['value_' . $pack_id . ' as value'])->value;
        $fullcap = Monitoring::where('parameter_id', 38)->first(['value_' . $pack_id . ' as value'])->value;
        $data['soc'] = ($remain /(($fullcap == 0 )? 1: $fullcap))* 100;
        $data['i_total'] = $this->iPackTotal();

        $data['cellstatus1'] = MonitoringStatus::whereBetween('id', [1, 8])->get(['value_' . $pack_id . ' as value']);
        $data['cellstatus2'] = MonitoringStatus::whereBetween('id', [9, 16])->get(['value_' . $pack_id . ' as value']);
        $data['tempstatus1'] = MonitoringStatus::whereBetween('id', [17, 24])->get(['value_' . $pack_id . ' as value']);
        $data['tempstatus2'] = MonitoringStatus::whereBetween('id', [25, 32])->get(['value_' . $pack_id . ' as value']);

        //todo: cek each alarm status base on threshold setting
        //$data['env_temp'] = MonitoringStatus::whereBetween('id', [34, 35])->get(['value_' . $pack_id . ' as value']);

        $data['protection1'] = $this->statusAlarm($pack_id, [1, 2, 3, 4]);
        $data['protection2'] = $this->statusAlarm($pack_id, [5, 6, 7, 8]);
        $data['protection3'] = $this->statusAlarm($pack_id, [9, 12, 13]);

        $data['alarm1'] = $this->statusAlarm($pack_id, [20, 21, 22, 23]);
        $data['alarm2'] = $this->statusAlarm($pack_id, [24, 25, 26, 27]);
        $data['alarm3'] = $this->statusAlarm($pack_id, [30, 31, 33]);

        $data['fault1'] = $this->statusAlarm($pack_id, [15, 16]);

        $data['set_protection1'] = SettingTreshold::whereIn('id', [3,13,8,18])->orderByRaw(" FIND_IN_SET(id, '2,10,6,14')")->get();
        $data['set_protection2'] = SettingTreshold::whereIn('id', [23,27,32,42])->orderByRaw(" FIND_IN_SET(id, '18,21,25,34')")->get();
        $data['set_protection3'] = SettingTreshold::whereIn('id', [45,56,63])->orderByRaw(" FIND_IN_SET(id, '37,46,52')")->get();

        $data['sys_stat1'] = $this->dataStatus($pack_id, [38, 40, 41, 42]);

        return view('bms.Ajax_Pack_Data', $data);
    }

}
