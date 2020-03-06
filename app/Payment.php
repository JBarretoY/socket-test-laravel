<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property int $package_id
 * @property string $method
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Package $package
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment withoutTrashed()
 * @mixin \Eloquent
 * @property float $amount
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereAmount($value)
 */
class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'package_id',
        'method',
        'amount',
        'refence'
    ];
    protected $dates = ['deleted_at'];

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
