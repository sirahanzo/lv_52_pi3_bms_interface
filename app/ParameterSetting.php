<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ParameterSetting
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SettingTreshold[] $settingTreshold
 * @mixin \Eloquent
 */
class ParameterSetting extends Model {


    protected $table = 'parameter_setting';


    public function settingTreshold()
    {
        return $this->hasMany(SettingTreshold::class, 'setting_id', 'id');
    }
}
