<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MonitoringAlarm
 *
 * @property-read \App\ParameterAlarm $parameterAlarm
 * @mixin \Eloquent
 */
class MonitoringAlarm extends Model {


    protected $table = 'monitoring_alarm';


    public function parameterAlarm()
    {
        return $this->belongsTo(ParameterAlarm::class, 'alarm_id', 'id');
    }
}
