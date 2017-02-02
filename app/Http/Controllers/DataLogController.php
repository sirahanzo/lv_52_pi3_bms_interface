<?php

namespace App\Http\Controllers;

use App\Http\Traits\BmsTrait;
use Carbon\Carbon;
use Datatables;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Excel;

class DataLogController extends Controller {


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

        return view('bms.LogMonitoring',$data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $column = 'value_' . $id;

        $datalog = DB::table('parameter_monitoring')
            ->leftJoin('datalog_monitoring', 'parameter_monitoring.id', '=', 'datalog_monitoring.parameter_id')
            ->select('parameter_monitoring.id', 'name', 'unit', $column . ' as value', 'datalog_monitoring.updated_at')
            ->orderBy('parameter_monitoring.id', 'asc')
            //->groupBy('datalog_monitoring.updated_at')
            ->take(100);

        return Datatables::of($datalog)->make(true);

    }


    public function monitoringRange(Request $request)
    {
        $column = 'value_' . $request->get('pack_id');
        $from = $request->get('from');
        $to = $request->get('to');
        $limit = 1000;


        if (empty($request->get('from')) || empty($request->get('to'))) {
            $from = Carbon::now()->subHour(1);
            $to = Carbon::now();
            $limit = 300;

            return $this->drawDataTable($column, $from, $to, $limit);
        }


        return $this->drawDataTable($column, $from, $to, $limit);
    }


    /**
     * @param Request $request
     * @param Excel $phpexcel
     * @return array
     */
    public function downloadMonitoring(Request $request, Excel $phpexcel)
    {
        $column = 'value_' . $request->get('pack_id');
        $pack_id = $request->get('pack_id');
        $from = $request->get('from');
        $to = $request->get('to');
        $limit = 3000;
        $loadTemplate = 'DataLogTemplate.xlsx';
        $fileLogName = 'DataLog' . $from . '_' . $to;

        $linkDownload = [
            'success' => true,
            'path'    => 'http://' . $request->server('HTTP_HOST') . '/exports/' . $fileLogName . '.xlsx',
        ];


        //check if form/to request, is empty then generate 1 last hour time
        if (empty($request->get('from')) || empty($request->get('to'))) {
            $from = Carbon::now()->subHour(1);
            $to = Carbon::now();
            $limit = 1000;

            $this->exportMonitoringLogToExcell($phpexcel, $column, $from, $to, $limit, $loadTemplate, $pack_id, $fileLogName);

            return $linkDownload;

        }
        $this->exportMonitoringLogToExcell($phpexcel, $column, $from, $to, $limit, $loadTemplate, $pack_id, $fileLogName);

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
     * @param $column
     * @param $from
     * @param $to
     * @param $limit
     * @return mixed
     */
    protected function drawDataTable($column, $from, $to, $limit)
    {
        $datalog = $this->joinParameterMonitoring($column, $from, $to, $limit);

        return Datatables::of($datalog)->make(true);
    }


    /**
     * @param Excel $phpexcel
     * @param $column
     * @param $from
     * @param $to
     * @param $limit
     * @param $loadTemplate
     * @param $pack_id
     * @param $fileLogName
     */
    protected function exportMonitoringLogToExcell(Excel $phpexcel, $column, $from, $to, $limit, $loadTemplate, $pack_id, $fileLogName)
    {
        $datalog = $this->joinParameterMonitoring($column, $from, $to, $limit)->get();

        $phpexcel->load(public_path($loadTemplate), function ($excel) use ($datalog, $pack_id, $from, $to, $limit) {

            $excel->sheet('Sheet1', function ($sheet) use ($datalog, $pack_id, $from, $to, $limit) {

                $info = DB::table('site_info')->first();


                $sheet->cell('C1', $info->site_id);// SITE ID
                $sheet->cell('C2', $info->site_name);// SITE NAME
                $sheet->cell('C3', $info->site_address);// SITE ADDRESS
                $sheet->cell('C4', $pack_id);// PACK NO
                $sheet->cell('C5', $from);// FROM
                $sheet->cell('C6', $to);// TO


                $v1 = $this->dataParameter($pack_id, $from, $to, $limit, 1);
                $v2 = $this->dataParameter($pack_id, $from, $to, $limit, 2);
                $v3 = $this->dataParameter($pack_id, $from, $to, $limit, 3);
                $v4 = $this->dataParameter($pack_id, $from, $to, $limit, 4);
                $v5 = $this->dataParameter($pack_id, $from, $to, $limit, 5);
                $v6 = $this->dataParameter($pack_id, $from, $to, $limit, 6);
                $v7 = $this->dataParameter($pack_id, $from, $to, $limit, 7);
                $v8 = $this->dataParameter($pack_id, $from, $to, $limit, 8);
                $v9 = $this->dataParameter($pack_id, $from, $to, $limit, 9);
                $v10 = $this->dataParameter($pack_id, $from, $to, $limit, 10);
                $v11 = $this->dataParameter($pack_id, $from, $to, $limit, 11);
                $v12 = $this->dataParameter($pack_id, $from, $to, $limit, 12);
                $v13 = $this->dataParameter($pack_id, $from, $to, $limit, 13);
                $v14 = $this->dataParameter($pack_id, $from, $to, $limit, 14);
                $v15 = $this->dataParameter($pack_id, $from, $to, $limit, 15);
                $v16 = $this->dataParameter($pack_id, $from, $to, $limit, 16);
                $t1 = $this->dataParameter($pack_id, $from, $to, $limit, 17);
                $t2 = $this->dataParameter($pack_id, $from, $to, $limit, 18);
                $t3 = $this->dataParameter($pack_id, $from, $to, $limit, 19);
                $t4 = $this->dataParameter($pack_id, $from, $to, $limit, 20);
                $ipack = $this->dataParameter($pack_id, $from, $to, $limit, 23);
                $vpack = $this->dataParameter($pack_id, $from, $to, $limit, 24);
                //todo : cari nilai dari soc ,soh,dod


                $cell = 10;

                for ($x = 0; $x <= $limit; [$x++, $cell++]) {

                    //Vpack
                    if (isset($vpack[$x]->value)) {
                        $sheet->cell('C' . $cell, $vpack[$x]->value);
                    };

                    //Ipack
                    if (isset($ipack[$x]->value)) {
                        $sheet->cell('D' . $cell, $ipack[$x]->value);
                    };

                    //VCELL 1-16
                    if (isset($v1[$x]->value)) {
                        $sheet->cell('H' . $cell, $v1[$x]->value);
                    };

                    if (isset($v2[$x]->value)) {
                        $sheet->cell('I' . $cell, $v2[$x]->value);
                    };
                    if (isset($v3[$x]->value)) {
                        $sheet->cell('J' . $cell, $v3[$x]->value);
                    };

                    if (isset($v4[$x]->value)) {
                        $sheet->cell('K' . $cell, $v4[$x]->value);
                    };

                    if (isset($v5[$x]->value)) {
                        $sheet->cell('L' . $cell, $v5[$x]->value);
                    };

                    if (isset($v6[$x]->value)) {
                        $sheet->cell('M' . $cell, $v6[$x]->value);
                    };

                    if (isset($v7[$x]->value)) {
                        $sheet->cell('N' . $cell, $v7[$x]->value);
                    };

                    if (isset($v8[$x]->value)) {
                        $sheet->cell('O' . $cell, $v8[$x]->value);
                    };

                    if (isset($v9[$x]->value)) {
                        $sheet->cell('P' . $cell, $v9[$x]->value);
                    };

                    if (isset($v10[$x]->value)) {
                        $sheet->cell('Q' . $cell, $v10[$x]->value);
                    };

                    if (isset($v11[$x]->value)) {
                        $sheet->cell('R' . $cell, $v11[$x]->value);
                    };

                    if (isset($v12[$x]->value)) {
                        $sheet->cell('S' . $cell, $v12[$x]->value);
                    };

                    if (isset($v13[$x]->value)) {
                        $sheet->cell('T' . $cell, $v13[$x]->value);
                    };

                    if (isset($v14[$x]->value)) {
                        $sheet->cell('U' . $cell, $v14[$x]->value);
                    };

                    if (isset($v15[$x]->value)) {
                        $sheet->cell('V' . $cell, $v15[$x]->value);
                    };

                    if (isset($v16[$x]->value)) {
                        $sheet->cell('W' . $cell, $v16[$x]->value);
                    };

                    //TEMP.CELL 1-4
                    if (isset($t1[$x]->value)) {
                        $sheet->cell('X' . $cell, $t1[$x]->value);
                    };

                    if (isset($t2[$x]->value)) {
                        $sheet->cell('Y' . $cell, $t2[$x]->value);
                    };

                    if (isset($t3[$x]->value)) {
                        $sheet->cell('Z' . $cell, $t3[$x]->value);
                    };

                    if (isset($t4[$x]->value)) {
                        $sheet->cell('AA' . $cell, $t4[$x]->value);
                    };

                }

            });

        })->setFilename($fileLogName)->store('xlsx', 'exports');
    }
}
