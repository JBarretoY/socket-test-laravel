<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Suscription
 *
 * @property-read \App\Package $package
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suscription query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $package_id
 * @property int $status
 * @property int $num_projects_available
 * @property string $renewal_date
 * @property string $last_renewal_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereLastRenewalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereNumProjectsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereRenewalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUserId($value)
 */
class Subscription extends Model
{
    protected $table = "suscriptions";
    protected $fillable = [
    	'user_id',
    	'package_id',
        'num_projects_available',
    	'status', //0: cancelada 1: activa 
    	'renewal_date',
    	'last_renewal_date'
    ];

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
