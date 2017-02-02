<?php

namespace App\Http\Controllers;

use App\ParameterSetting;
use App\SettingTreshold;

use Illuminate\Support\Facades\Input;

class ParameterSettingController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['setting1a'] = SettingTreshold::with('parametersetting')->whereBetween('id', [1, 4])->get();
        $data['setting1b'] = SettingTreshold::with('parametersetting')->whereBetween('id', [5, 8])->get();
        $data['setting1c'] = SettingTreshold::with('parametersetting')->whereBetween('id', [9, 12])->get();
        $data['setting1d'] = SettingTreshold::with('parametersetting')->whereBetween('id', [13, 16])->get();
        $data['setting2a'] = SettingTreshold::with('parametersetting')->whereBetween('id', [17, 19])->get();
        $data['setting2b'] = SettingTreshold::with('parametersetting')->whereBetween('id', [20, 22])->get();
        $data['setting2c'] = SettingTreshold::with('parametersetting')->whereBetween('id', [23, 24])->get();
        $data['setting2d'] = SettingTreshold::with('parametersetting')->whereBetween('id', [54, 54])->get();//dummy
        $data['setting3a'] = SettingTreshold::with('parametersetting')->whereBetween('id', [25, 32])->get();
        $data['setting3b'] = SettingTreshold::with('parametersetting')->whereBetween('id', [33, 38])->get();
        //$data['setting4'] = SettingTreshold::with('parametersetting')->whereBetween('id', [25, 32])->get();
        //$data['setting5'] = SettingTreshold::with('parametersetting')->whereBetween('id', [33, 40])->get();
        //$data['setting6'] = SettingTreshold::with('parametersetting')->whereBetween('id', [41, 48])->get();
        //$data['setting7'] = SettingTreshold::with('parametersetting')->whereBetween('id', [48, 53])->get();

        return view('bms.ParameterSetting', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //todo : check input do to isssue on codeinginter

        $i1 = Input::get('id')[1]['value'];
        $i2 = Input::get('id')[2]['value'];
        $i3 = Input::get('id')[3]['value'];
        $i5 = Input::get('id')[5]['value'];
        $i6 = Input::get('id')[6]['value'];
        $i7 = Input::get('id')[7]['value'];
        $i9 = Input::get('id')[9]['value'];
        $i10 = Input::get('id')[10]['value'];
        $i11 = Input::get('id')[11]['value'];
        $i13 = Input::get('id')[13]['value'];
        $i14 = Input::get('id')[14]['value'];
        $i15 = Input::get('id')[15]['value'];
        $i17 = Input::get('id')[17]['value'];
        $i18 = Input::get('id')[18]['value'];
        $i20 = Input::get('id')[20]['value'];
        $i21 = Input::get('id')[21]['value'];
        $i33 = Input::get('id')[33]['value'];
        $i34 = Input::get('id')[34]['value'];
        $i35 = Input::get('id')[35]['value'];
        $i36 = Input::get('id')[36]['value'];
        $i37 = Input::get('id')[37]['value'];
        /*$i38 = Input::get('id')[38]['value'];
        $i40 = Input::get('id')[40]['value'];
        $i41 = Input::get('id')[41]['value'];
        $i43 = Input::get('id')[43]['value'];
        $i44 = Input::get('id')[44]['value'];
        $i46 = Input::get('id')[46]['value'];
        $i47 = Input::get('id')[47]['value'];
        $i49 = Input::get('id')[49]['value'];
        $i50 = Input::get('id')[50]['value'];
        $i52 = Input::get('id')[52]['value'];
        $i53 = Input::get('id')[53]['value'];*/

        //rules message
        $error_over_pa = ['message' => 'Over Protection must Higher than Alarm'];
        $error_over_pr = ['message' => 'Over Protection must Higher than Release'];
        $error_under_pa = ['message' => 'Under Protection must Less than Alarm'];
        $error_under_pr = ['message' => 'Under Protection must Less than Release'];

        if ($i2 < $i1 or $i6 < $i5 or $i18 < $i17 or $i21 < $i20 or $i34 < $i33 or $i37 < $i36) {

            return response()->json($error_over_pa, 422);

        } elseif ($i2 < $i3 or $i6 < $i7 or $i34 < $i35) {

            return response()->json($error_over_pr, 422);

        } elseif ($i10 > $i9 or $i14 > $i13) {

            return response()->json($error_under_pa, 422);

        } elseif ($i10 > $i11 or $i14 > $i15) {

            return response()->json($error_under_pr, 422);

        }


        foreach (Input::get('id') as $id => $value):
            SettingTreshold::where('setting_id', $id)->update(['state' => '0']); //clear state first before update
            SettingTreshold::where('setting_id', $id)->update($value);
        endforeach;

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
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


    public function reset_default($id)
    {
        if ($id == 1) {
            $default = [1, 16];
        } elseif ($id == 2) {
            $default = [17, 24];
        } else {
            $default = [25, 38];
        }

        $data = ParameterSetting::whereBetween('id', $default)->get();

        foreach ($data as $dt):
            SettingTreshold::where('id', $dt->id)->update(['value' => $dt->default_value, 'state' => $dt->state]);
        endforeach;

    }
}
