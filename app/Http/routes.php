<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', ['as' => 'Login','uses'=> function () {
    //return view('welcome');
    if (Auth::check() == true){
        return redirect()->back();
    }
    return view('bms.Login');

}]);*/

/*Route::get('/',function (){
    return redirect('dashboard');
});*/



//BEFORE YOU ADD NEW ROUTE MAKE SURE TO CLEAR YOUR ROUTE CACHE !!
Route::auth();

Route::group(['middleware'=>['auth']],function (){

    Route::get('/','DashboardController@index');

    Route::get('dashboard', ['as' => 'Dashboard', 'uses' => 'DashboardController@index']);
    Route::get('dashboard/{pack_id}', ['as' => 'Dashboard', 'uses' => 'DashboardController@pack']);

   /* //Route::get('dashboard-ajax/{id}',['as'=>'Dashboard-ajax','uses'=> 'DashboardController@ajax']);
    Route::get('parameter-setting', 'ParameterSettingController@index');
    Route::post('save-setting', 'ParameterSettingController@store');
    Route::get('reset-setting/{id}','ParameterSettingController@reset_default');


    //configuration group
    Route::get('configuration-datetime','ConfigurationController@dateTime');
    Route::post('save-datetime', 'ConfigurationController@saveDateTime');
    Route::get('configuration-network', 'ConfigurationController@network');
    Route::post('save-network', 'ConfigurationController@saveNetwork');
    Route::post('save-snmp', 'ConfigurationController@saveSNMP');
    Route::get('configuration-siteinfo', 'ConfigurationController@siteInfo');
    Route::post('save-siteinfo', 'ConfigurationController@saveSiteInfo');
    Route::get('configuration-pack','ConfigurationController@packaddress');
    Route::post('save-pack','ConfigurationController@savePack');*/

    //administration group
   /* Route::get('administration', 'UsersController@index');
    Route::get('user-show', 'UsersController@show');
    Route::get('user-edit/{id}', 'UsersController@edit');
    Route::post('user-save', 'UsersController@store');
    Route::post('user-update/{id}', 'UsersController@update');
    Route::delete('user-delete/{id}', 'UsersController@destroy');*/

    //datalog group
    Route::get('datalog-monitoring', 'DataLogController@index');
    //Route::get('datalog-monitoring/{id}', 'DataLogController@show');
    Route::any('monitoringlog-range', 'DataLogController@monitoringRange');
    Route::get('download-log-monitoring', 'DataLogController@downloadMonitoring');

    Route::get('datalog-alarm', 'AlarmLogController@index');
    //Route::get('datalog-alarm/{id}', 'AlarmLogController@show');
    Route::any('alarmlog-range', 'AlarmLogController@alarmRange');
    Route::get('download-log-alarm', 'AlarmLogController@downloadAlarm');


});

Route::group(['middleware' => 'admin'],function(){
    //Route::get('dashboard-ajax/{id}',['as'=>'Dashboard-ajax','uses'=> 'DashboardController@ajax']);
    Route::get('parameter-setting', 'ParameterSettingController@index');
    Route::post('save-setting', 'ParameterSettingController@store');
    Route::get('reset-setting/{id}','ParameterSettingController@reset_default');
    Route::post('authorize-write','ParameterSettingController@authorizeWrite');


    //configuration group
    Route::get('configuration-datetime','ConfigurationController@dateTime');
    Route::post('save-datetime', 'ConfigurationController@saveDateTime');
    Route::get('configuration-network', 'ConfigurationController@network');
    Route::post('save-network', 'ConfigurationController@saveNetwork');
    Route::post('save-snmp', 'ConfigurationController@saveSNMP');
    Route::get('configuration-siteinfo', 'ConfigurationController@siteInfo');
    Route::post('save-siteinfo', 'ConfigurationController@saveSiteInfo');
    Route::get('configuration-pack','ConfigurationController@packaddress');
    Route::post('save-pack','ConfigurationController@savePack');

    Route::get('administration', 'UsersController@index');
    Route::get('user-show', 'UsersController@show');
    Route::get('user-edit/{id}', 'UsersController@edit');
    Route::post('user-save', 'UsersController@store');
    Route::post('user-update/{id}', 'UsersController@update');
    Route::delete('user-delete/{id}', 'UsersController@destroy');
});

/*Route::get('debug',function (){
    return view('vendor.Debug2');
});
Route::post('debug-save',function (){
    return response()->json('saved',200);
});*/


/*Route::get('debug',function (){
   return view('vendor.Debug');
});

Route::delete('debug-delete/{id}',function ($id){
    return response()->json('delete'.$id);
});



Route::post('debug-update/{id}',function ($id){
    return response()->json('updated '.$id);
});*/
