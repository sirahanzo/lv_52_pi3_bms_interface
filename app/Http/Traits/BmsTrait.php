<?php

namespace App\Http\Traits;


use App\Monitoring;
use DB;

trait BmsTrait {


    public function dataMonitoring1($param_start, $param_end)
    {
        return Monitoring::with('parametermonitoring')->whereBetween('id', [$param_start, $param_end])->get();
    }


    public function dataMonitoring($pack_id, $from_id, $to_id)
    {
        return DB::table('parameter_monitoring')
            ->leftJoin('monitoring', 'parameter_monitoring.id', '=', 'monitoring.parameter_id')
            ->select('value_' . $pack_id . ' as value', 'updated_at', 'name', 'alias', 'unit')
            ->whereBetween('parameter_id', [$from_id, $to_id])
            ->get();
    }


    public function dataStatus($pack_id, $status_id)
    {
        return DB::table('parameter_status')
            ->leftJoin('monitoring_status', 'parameter_status.id', '=', 'monitoring_status.status_id')
            ->select('value_' . $pack_id . ' as value', 'updated_at', 'name', 'alias')
            ->whereIn('status_id', $status_id)
            ->get();
    }


    public function statusAlarm($pack_id, $alarm_id)
    {
        return DB::table('parameter_alarm')
            ->leftJoin('monitoring_alarm', 'parameter_alarm.id', '=', 'monitoring_alarm.alarm_id')
            ->select('value_' . $pack_id . ' as value', 'updated_at', 'name', 'alias')
            ->whereIn('alarm_id', $alarm_id)
            ->get();
    }


    /**
     * Get Data Parameter For Setting Parameter
     *
     * @param $pack_id
     * @param $from
     * @param $to
     * @param $limit
     * @param $parameter_id
     * @return array|static[]
     */
    public function dataParameter($pack_id, $from, $to, $limit, $parameter_id)
    {
        return DB::table('datalog_monitoring')->select('parameter_id', 'value_' . $pack_id . ' as value', 'updated_at')
            ->where('parameter_id', '=', $parameter_id)
            ->where('updated_at', '>=', $from)
            ->where('updated_at', '<=', $to)
            ->orderBy('updated_at','asc')
            ->take($limit)
            ->get();
    }


    public function joinParameterMonitoring($column, $from, $to, $limit)
    {
        return DB::table('parameter_monitoring')
            ->leftJoin('datalog_monitoring', 'parameter_monitoring.id', '=', 'datalog_monitoring.parameter_id')
            ->select('parameter_monitoring.id', 'name', 'unit', $column . ' as value', 'datalog_monitoring.updated_at')
            ->where('datalog_monitoring.updated_at', '>=', $from)
            ->where('datalog_monitoring.updated_at', '<=', $to)
            //->orderBy('parameter_monitoring.id', 'asc')
            ->orderBy('updated_at','dsc')
            ->take($limit);

    }



    public function joinParameterAlarm($pack_id, $from, $to, $limit)
    {
        return DB::table('parameter_alarm')
            ->leftJoin('datalog_monitoring_alarm', 'parameter_alarm.id', '=', 'datalog_monitoring_alarm.alarm_id')
            ->select('parameter_alarm.id', 'parameter_alarm.name', 'pack_id', 'value', 'updated_at')
            ->where('pack_id', '=', $pack_id)
            ->where('updated_at', '>=', $from)
            ->where('updated_at', '<=', $to)
            //->orderBy('alarm_id', 'asc')
            ->orderBy('updated_at','dsc')
            ->take($limit);
    }


    public function packList()
    {
        return DB::table('pack_config')->whereState('1')->get();
    }


    public function packActive()
    {
        return DB::table('pack_config')->whereState('1')->first();
    }


    public function iPackTotal()
    {
        return DB::table('monitoring')->select([DB::raw('value_1 + value_2 + value_3 + value_4 + value_5 + value_6 + value_7 + value_8 + value_9 + value_10 + value_11 + value_12 + value_13 + value_13 + value_14 + value_15 as value')])->where('parameter_id', 35)->first();

    }


    public function iPackTotal_log($from,$to)
    {
        return  DB::table('datalog_monitoring')->select([DB::raw('value_1 + value_2 + value_3 + value_4 + value_5 + value_6 + value_7 + value_8 + value_9 + value_10 + value_11 + value_12 + value_13 + value_13 + value_14 + value_15 as value')])
            ->where('parameter_id', 35)
            ->where('updated_at', '>=', $from)
            ->where('updated_at', '<=', $to)
            ->orderBy('updated_at','asc')
            ->get();

    }


    public function max_limit()
    {
        return DB::table('network_setting')->first()->max_log;
    }

}