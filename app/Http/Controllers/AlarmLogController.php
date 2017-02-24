<?php

namespace App\Http\Controllers;

use App\Http\Traits\BmsTrait;
use Carbon\Carbon;
use Datatables;
use DB;
use Illuminate\Http\Request;
use File;


use Maatwebsite\Excel\Excel;

class AlarmLogController extends Controller {

    use BmsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['pack_list'] = $this->packList();
        $data['pack_active'] = $this->packActive();

        return view('bms.LogAlarm',$data);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function alarmRange(Request $request)
    {
        $pack_id = $request->get('pack_id');
        $from = $request->get('from');
        $to = $request->get('to');
        $limit = 1000;


        if (empty($request->get('from')) || empty($request->get('to'))) {
            $from = Carbon::now()->subHour(1);
            $to = Carbon::now()->toDateTimeString();
            $limit = 300;

            return $this->drawDataTable($pack_id, $from, $to, $limit);

        }

        return $this->drawDataTable($pack_id, $from, $to, $limit);


    }


    public function downloadAlarm(Request $request, Excel $phpexcel)
    {
        $pack_id = $request->get('pack_id');
        $from = $request->get('from');
        $to = $request->get('to');
        //$limit = 3000;
        $limit = $this->max_limit();
        $loadTemplate = 'AlarmLogTemplate.xlsx';
        $fileLogName = 'AlarmLog' . $from . '_' . $to;

        //clear old file log
        File::cleanDirectory('exports');
        $linkDownload = [
            'success' => true,
            'path'    => 'http://' . $request->server('HTTP_HOST') . '/exports/' . $fileLogName . '.xlsx',
        ];

        if (empty($request->get('from')) || empty($request->get('to'))) {

            $from = Carbon::now()->subHour(1);
            $to = Carbon::now()->toDateTimeString();
            $limit = 1000;

            $this->exportAlarmLogToExcell($phpexcel, $pack_id, $from, $to, $limit, $loadTemplate, $fileLogName);


            return $linkDownload;

        }

        $this->exportAlarmLogToExcell($phpexcel, $pack_id, $from, $to, $limit, $loadTemplate, $fileLogName);

        return $linkDownload;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param Excel $phpexcel
     * @param $pack_id
     * @param $from
     * @param $to
     * @param $limit
     * @param $loadTemplate
     * @param $fileLogName
     */
    protected function exportAlarmLogToExcell(Excel $phpexcel, $pack_id, $from, $to, $limit, $loadTemplate, $fileLogName)
    {
        $alarm = $this->joinParameterAlarm($pack_id, $from, $to, $limit)->get();


        $phpexcel->load(public_path($loadTemplate), function ($excel) use ($alarm, $from, $to, $pack_id) {


            $excel->sheet('Sheet1', function ($sheet) use ($alarm, $from, $to, $pack_id) {

                $info = DB::table('site_info')->first();

                $sheet->cell('C1', $info->site_id);// SITE ID
                $sheet->cell('C2', $info->site_name);// SITE NAME
                $sheet->cell('C3', $info->site_address);// SITE ADDRESS
                $sheet->cell('C4', $pack_id);// PACK NO
                $sheet->cell('C5', $from);// FROM
                $sheet->cell('C6', $to);// TO

                $a = $b = $c = $d = 10;
                $i = 1;
                foreach ($alarm as $dt):
                    $sheet->cell('A' . $a++, $i++)
                        ->cell('C' . $c++, $dt->name)
                        ->cell('B' . $b++, $dt->updated_at)
                        ->cell('D' . $d++, ($dt->value == 0) ? 'Alarm Cleared' : 'Alarm Start');
                endforeach;

            });

        })->setFilename($fileLogName)->store('xlsx', 'exports');
    }


    /**
     * @param $pack_id
     * @param $from
     * @param $to
     * @param $limit
     * @return mixed
     */
    protected function drawDataTable($pack_id, $from, $to, $limit)
    {
        $alarm = $this->joinParameterAlarm($pack_id, $from, $to, $limit);

        return Datatables::of($alarm)->addColumn('alarm', function ($alarm) {
            if ($alarm->value == 1) {
                return 'Alarm Start';
            } else {
                return 'Alarm Cleared';
            }
        })->make(true);
    }

}
