<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bus
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $seat_count
 * @property bool $state
 * @property string $sended_at
 * @property string $arrived_at
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereArrivedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereIsActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereSeatCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereSendedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bus whereUpdatedAt($value)
 */
class Bus extends Model
{
    protected $table = 'scheduled_buses';


    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'bus_user', 'bus_id', 'user_id');
    }

}
