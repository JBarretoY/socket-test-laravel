<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $subCategories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $skills
 * @property-read int|null $skills_count
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function subCategories(){
        return $this->hasMany('App\SubCategory');
    }

    public function skills()
    {
        return $this->hasMany('App\SubCategory');
    }
}
