<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Bid
 *
 * @property int $id
 * @property float $price
 * @property int $time
 * @property bool $days
 * @property string $notes
 * @property bool $last
 * @property int $type
 * @property int $user_id_from
 * @property int $user_id_to
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Project $project
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Bid onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereUserIdFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bid whereUserIdTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bid withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Bid withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\User $from
 * @property-read \App\User $to
 */
class Bid extends Model
{
	use SoftDeletes;

    protected $table = 'bids';
    protected $fillable = [
        'price',
		'time',
		'days',
		'notes',
		'last', //Ultima oferta realizada ó Oferta activa
		'type', //1:Solicitud inicial 2:Contra oferta 3:Aceptada 4:Rechazada
		'user_id_from',
		'user_id_to',
		'project_id'
	];
	
	protected $with = [
		'from', 'to'
	];

    protected $dates = ['deleted_at'];

    public function project(){
        return $this->belongsTo('App\Project');
	}
	
	public function from()
	{
		return $this->belongsTo('App\User', 'user_id_from');
	}

	public function to()
	{
		return $this->belongsTo('App\User', 'user_id_to');
	}
}
