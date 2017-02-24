<?php

namespace App\Http\Controllers;

use App\ParameterSetting;
use App\SettingTreshold;

use Hash;
use Illuminate\Support\Facades\Input;

class ParameterSettingController extends Controller {


    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data['setting1a'] = SettingTreshold::with('parametersetting')->whereBetween('id', [1, 5])->get();
        $data['setting1b'] = SettingTreshold::with('parametersetting')->whereBetween('id', [6, 10])->get();
        $data['setting1c'] = SettingTreshold::with('parametersetting')->whereBetween('id', [11, 15])->get();
        $data['setting1d'] = SettingTreshold::with('parametersetting')->whereBetween('id', [16, 20])->get();
        $data['setting2a'] = SettingTreshold::with('parametersetting')->whereBetween('id', [21, 24])->get();
        $data['setting2b'] = SettingTreshold::with('parametersetting')->whereBetween('id', [25, 28])->get();
        $data['setting2c'] = SettingTreshold::with('parametersetting')->whereBetween('id', [29, 31])->get();
        $data['setting2d'] = SettingTreshold::with('parametersetting')->whereBetween('id', [65, 66])->get();//dummy
        $data['setting3a'] = SettingTreshold::with('parametersetting')->whereBetween('id', [32, 39])->get();
        $data['setting3b'] = SettingTreshold::with('parametersetting')->whereBetween('id', [40, 46])->get();

        return view('bms.ParameterSetting', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {

        $i1 = Input::get('id')[1]['value'];
        $i2 = Input::get('id')[2]['value'];
        $i3 = Input::get('id')[3]['value'];
        $i4 = Input::get('id')[4]['value'];
        $i5 = Input::get('id')[5]['value'];
        $i6 = Input::get('id')[6]['value'];
        $i7 = Input::get('id')[7]['value'];
        $i8 = Input::get('id')[8]['value'];
        $i9 = Input::get('id')[9]['value'];
        $i10 = Input::get('id')[10]['value'];
        $i11 = Input::get('id')[11]['value'];
        $i12 = Input::get('id')[12]['value'];
        $i13 = Input::get('id')[13]['value'];
        $i14 = Input::get('id')[14]['value'];
        $i15 = Input::get('id')[15]['value'];
        $i16 = Input::get('id')[16]['value'];
        $i17 = Input::get('id')[17]['value'];
        $i18 = Input::get('id')[18]['value'];
        $i19 = Input::get('id')[19]['value'];
        $i20 = Input::get('id')[20]['value'];
        $i21 = Input::get('id')[21]['value'];
        $i22 = Input::get('id')[22]['value'];
        $i23 = Input::get('id')[24]['value'];
        $i24 = Input::get('id')[25]['value'];
        $i25 = Input::get('id')[23]['value'];
        $i26 = Input::get('id')[26]['value'];
        $i27 = Input::get('id')[27]['value'];
        $i28 = Input::get('id')[28]['value'];
        $i29 = Input::get('id')[29]['value'];
        $i30 = Input::get('id')[30]['value'];
        $i31 = Input::get('id')[31]['value'];
        $i32 = Input::get('id')[32]['value'];
        $i33 = Input::get('id')[33]['value'];
        $i34 = Input::get('id')[34]['value'];
        $i35 = Input::get('id')[35]['value'];
        $i36 = Input::get('id')[36]['value'];
        $i37 = Input::get('id')[37]['value'];
        $i38 = Input::get('id')[38]['value'];
        $i39 = Input::get('id')[39]['value'];
        $i40 = Input::get('id')[40]['value'];
        $i41 = Input::get('id')[41]['value'];
        $i42 = Input::get('id')[42]['value'];
        $i43 = Input::get('id')[43]['value'];
        $i44 = Input::get('id')[44]['value'];
        $i45 = Input::get('id')[45]['value'];

        //rules message
        $error_over_pa = ['message' => 'Over Protection must Higher than Alarm'];
        $error_over_pr = ['message' => 'Over Protection must Higher than Release'];
        $error_under_pa = ['message' => 'Under Protection must Less than Alarm'];
        $error_under_pr = ['message' => 'Under Protection must Less than Release'];

        if ($i3 < $i2 or $i8 < $i7 or $i23 < $i22 or $i27 < $i26 or $i42 < $i41 or $i45 < $i44) {

            return response()->json($error_over_pa, 422);

        } elseif ($i3 < $i3 or $i8 < $i7 or $i42 < $i43) {

            return response()->json($error_over_pr, 422);

        } elseif ($i13 > $i12 or $i18 > $i17) {

            return response()->json($error_under_pa, 422);

        } elseif ($i13 > $i14 or $i18 > $i19) {

            return response()->json($error_under_pr, 422);

        }


        foreach (Input::get('id') as $id => $value):
            SettingTreshold::where('setting_id', $id)->update(['state' => '0']); //clear state first before update
            SettingTreshold::where('setting_id', $id)->update($value);
        endforeach;

        //command for write program
        $cmd = 'cmd';

        //interval for sleep
        $intv = '10';

        //todo : after save parameter setting create notification restart bms

        //execute write program
        shell_exec("$cmd 1 $i1 $i2 $i3 $i4 $i5 ");
        shell_exec("sleep $intv");
        shell_exec("$cmd 6 $i6 $i7 $i8 $i9 $i10");
        shell_exec("sleep $intv");
        shell_exec("$cmd 11 $i11 $i12 $i13 $i14 $i15");
        shell_exec("sleep $intv");
        shell_exec("$cmd 16 $i16 $i17 $i18 $i19 $i20");
        shell_exec("sleep $intv");
        shell_exec("$cmd 21 $i21 $i22 $i23 $i24");
        shell_exec("sleep $intv");
        shell_exec("$cmd 25 $i25 $i26 $i27 $i28");
        shell_exec("sleep $intv");
        shell_exec("$cmd 29 $i29 $i30 $i31");
        shell_exec("sleep $intv");
        shell_exec("$cmd 32 $i32");
        shell_exec("sleep $intv");
        shell_exec("$cmd 33 $i33 $i34");
        shell_exec("sleep $intv");
        shell_exec("$cmd 35 $i35 $i36");
        shell_exec("sleep $intv");
        shell_exec("$cmd 37 $i37 $i38 $i39");
        shell_exec("sleep $intv");
        shell_exec("$cmd 40 $i40 $i41 $i42 $i43 $i44 $i43 $i45");

    }


    public function authorizeWrite()
    {
        $hashedPassword = \Auth::user()->getAuthPassword();

        if (Hash::check(Input::get('password'), $hashedPassword)) {
            // The passwords match...
            return 'password match';
        }

        return response()->json(['message' => 'Wrong Password'], 500);

    }


    public function reset_default($id)
    {
        if ($id == 1) {
            $default = [1, 20];
        } elseif ($id == 2) {
            $default = [21, 31];
        } else {
            $default = [32, 46];
        }

        $data = ParameterSetting::whereBetween('id', $default)->get();

        foreach ($data as $dt):
            SettingTreshold::where('id', $dt->id)->update(['value' => $dt->default_value, 'state' => $dt->state]);
        endforeach;

    }
}
