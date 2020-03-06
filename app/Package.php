<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $num_project
 * @property string $description
 * @property string $time_publish
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Payment[] $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereNumProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereTimePublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $time_num_roject
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Suscription[] $suscriptions
 * @property-read int|null $suscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereTimeNumRoject($value)
 * @property string|null $plan_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePlanId($value)
 * @property string|null $interval
 * @property int|null $count_interval
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCountInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereInterval($value)
 */
class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = [
        'price',
        'name',
        'num_project',//cantidad de proyectos
        'description',
        'time_publish',//por proyecto -> numero de dias
        'time_num_roject',//tiempo  por cantidad de proyectos --> PROJECT
        'interval', //intervalo de cobro
        'count_interval' //veces de cobro por intervalo
        /*
         * The number of intervals between subscription billings.
         *  For example, interval=month and interval_count=3 bills every 3 months.
         * Maximum of one year interval allowed (1 year, 12 months, or 52 weeks).
         * */
    ];

    public function payments(){
        return $this->hasMany('App\Payment');
    }

    public function subscriptions(){
        return $this->hasMany('App\Subscription');
    }
}
