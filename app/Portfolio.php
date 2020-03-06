<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Portfolio
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $subCategories
 * @property-read int|null $sub_categories_count
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Portfolio whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio withoutTrashed()
 * @mixin \Eloquent
 */
class Portfolio extends Model
{
    use SoftDeletes;

    protected $table = 'portfolios';
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];
    protected $dates = ['deleted_at'];

    protected $with = [
        'subCategories.category',
    ];

    public function files(){
        return $this->morphMany('App\File', 'fileable','fileable_type','fileable_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subCategories(){
        return $this->morphToMany('App\SubCategory','cateable','cateables');
    }
}
