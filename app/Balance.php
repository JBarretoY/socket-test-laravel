<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Balance
 *
 * @property int $id
 * @property float $working
 * @property float $available
 * @property float $pending
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Balance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance wherePending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereWorking($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Balance withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Balance withoutTrashed()
 * @mixin \Eloquent
 * @property float $win
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Balance whereWin($value)
 */
class Balance extends Model
{
    use SoftDeletes;

    protected $table = 'balances';
    protected $fillable = [
        'working',
        'available',
        'pending',
        'win',
        'user_id'
    ];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
