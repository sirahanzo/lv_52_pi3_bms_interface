<?php

namespace App\Http\Controllers;

use App\Http\Requests\NetworkRequest;
use App\Http\Requests\SiteInfoRequest;
use App\Http\Requests\SNMPRequest;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;

class ConfigurationController extends Controller {


    public function dateTime()
    {
        return view('bms.DateTime');
    }


    public function saveDateTime(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);
        }

        //do set time to RaspberryPi
        $this->setRaspberryTime($request);

    }


    public function network()
    {
        $network = DB::table('network_setting')->first();

        return view('bms.Network', compact('network'));
    }


    public function saveNetwork(NetworkRequest $request)
    {
        DB::table('network_setting')->update($request->except('_token'));

        $this->setRaspberryIPaddress($request);
    }


    public function saveSNMP(SNMPRequest $request)
    {
        DB::table('network_setting')->update($request->except('_token'));
    }


    public function siteInfo()
    {
        $site = DB::table('site_info')->first();

        return view('bms.SiteInfo',compact('site'));
    }


    public function saveSiteInfo(SiteInfoRequest $request)
    {
        DB::table('site_info')->update($request->except('_token'));
    }


    public function packaddress()
    {
        $pack = DB::table('pack_config')->get();

        return view('bms.PackConfig',compact('pack'));
    }


    public function savePack()
    {
        $input = Input::get('id');

        DB::table('pack_config')->update(['state' => 0]);

        foreach ($input as $id => $value):
            DB::table('pack_config')->where('id', $id)->update($value);
        endforeach;
    }


    /**
     * @param Request $request
     */
    protected function setRaspberryTime(Request $request)
    {
        $time = $request->get('time');
        $new_date = date("d M Y", strtotime($request->get('date')));
        $char = '"';

        shell_exec(" echo > /var/www/change_time.sh ");
        shell_exec(" echo '#!/bin/bash -e' >> /var/www/change_time.sh ");
        shell_exec(" echo 'sudo date -s $char $new_date $time $char ' >> /var/www/change_time.sh ");
        shell_exec(" echo 'sudo hwclock --set --date $char $new_date $time $char ' >> /var/www/change_time.sh ");

        //execute changetime script
        shell_exec("sh /var/www/change_time.sh");
        shell_exec("sudo  hwclock -w");
    }


    /**
     * @param NetworkRequest $request
     */
    protected function setRaspberryIPaddress(NetworkRequest $request)
    {
        $ipaddress = $request->get('ipaddress');
        $netmask = $request->get('netmask');
        $gateway = $request->get('gateway');

        //save variable network setting to interfaces_temp
        shell_exec(" echo > /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'auto lo' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'iface lo inet loopback' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'auto eth0' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '#iface eth0 inet dhcp' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'iface eth0 inet static' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'address $ipaddress' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'netmask $netmask' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo 'gateway $gateway' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '#allow-hotplug wlan0' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '#iface wlan0 inet manual' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '#wpa-roam /etc/wpa_supplicant/wpa_supplicant.conf' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("echo '#iface default inet dhcp' >> /home/pi/www/uploads/interfaces_temp ");
        shell_exec("sudo cp /home/pi/www/uploads/interfaces_temp /etc/network/interfaces ");
    }
}
