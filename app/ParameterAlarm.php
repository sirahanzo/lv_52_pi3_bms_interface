<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ParameterAlarm
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MonitoringAlarm[] $monitoringAlarm
 * @mixin \Eloquent
 */
class ParameterAlarm extends Model {


    protected $table = 'parameter_alarm';


    public function monitoringAlarm()
    {
        return $this->hasMany(MonitoringAlarm::class, 'alarm_id', 'id');
    }
}
