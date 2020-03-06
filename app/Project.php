<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Project
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $file_id
 * @property string $budget
 * @property int $country_id
 * @property int $client_id
 * @property int|null $consulter_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bid[] $bids
 * @property-read int|null $bids_count
 * @property-read \App\Country $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $subCategories
 * @property-read int|null $sub_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 * @property-read int|null $tasks_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereConsulterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Project withoutTrashed()
 * @mixin \Eloquent
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read int|null $files_count
 * @property-read \App\User $user
 * @property string|null $slug
 * @property string|null $publish_date
 * @property string|null $countdown
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCountdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereSlug($value)
 * @property bool $draft
 * @property-read \App\User|null $consulter
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDraft($value)
 */
class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';
    protected $fillable = [
        'name',
        'description',
        'budget',
        'country_id',
        'client_id',
        'consulter_id',
        'status',//1: Disponible 2:Working 3:vencido 0:Culminado 
        'slug',
        'publish_date',
        'countdown',
        'draft'
    ];
    protected $dates = ['deleted_at'];

    protected $with = [
        'user', 'subCategories.category','tasks','country','bids', 'skills'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'client_id');
    }

    public function consulter() {
        return $this->belongsTo('App\User', 'consulter_id');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function subCategories(){
        return $this->morphToMany('App\SubCategory','cateable','cateables');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function bids(){
        return $this->hasMany('App\Bid');
    }

    public function files(){
        return $this->morphMany('App\File', 'fileable','fileable_type','fileable_id');
    }

    public function skills ()
    {
        return $this->morphToMany('App\SubCategory','cateable','cateables');
    }
}
