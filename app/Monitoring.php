<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Monitoring
 *
 * @property-read \App\ParameterMonitoring $parameterMonitoring
 * @method static \Illuminate\Database\Query\Builder|\App\Monitoring packParameterBetween($pack_id, $id_start, $id_end)
 * @mixin \Eloquent
 */
class Monitoring extends Model {


    protected $table = 'monitoring';


    public function parameterMonitoring()
    {
        return $this->belongsTo(ParameterMonitoring::class, 'parameter_id', 'id');
    }


    public function scopePack_ParameterBetween($query, $pack_id, $id_start, $id_end)
    {
        return $query->whereBetween('id', [$id_start, $id_end])->get([$pack_id . ' as value', 'updated_at']);
    }
}
