<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Dispute
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Dispute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dispute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Dispute withoutTrashed()
 * @mixin \Eloquent
 * @property string $name
 * @property string $description
 * @property int $file_id
 * @property string $budget
 * @property int $country_id
 * @property int $client_id
 * @property int|null $consulter_id
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereConsulterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereStatus($value)
 * @property string|null $slug
 * @property string|null $publish_date
 * @property string|null $countdown
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereCountdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereSlug($value)
 * @property bool $draft
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dispute whereDraft($value)
 */
class Dispute extends Model
{
	use SoftDeletes;

	protected $table = 'projects';
    protected $fillable = [
        'user_id',
        'project_id',
        'description',
        'status', // 1:pendiente 2:en mediación 0:culminada
        'user_id_win',
        'ammount',
    ];
	protected $dates = ['deleted_at'];
    
    public function project(){
        return $this->belogsTo('App\Project');
    }

    public function user(){
        return $this->belogsTo('App\User');
    }
}
