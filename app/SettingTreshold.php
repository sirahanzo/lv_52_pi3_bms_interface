<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SettingTreshold
 *
 * @property-read \App\ParameterSetting $parameterSetting
 * @mixin \Eloquent
 */
class SettingTreshold extends Model {


    protected $table = 'setting_treshold';


    public function parameterSetting()
    {
        return $this->belongsTo(ParameterSetting::class, 'setting_id', 'id');
    }
}
