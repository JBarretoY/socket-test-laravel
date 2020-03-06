<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Education
 *
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Education onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Education withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Education withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read int|null $files_count
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $institution
 * @property string $date_from
 * @property string $date_to
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereUserId($value)
 */
class Education extends Model
{
    use SoftDeletes;

    protected $table = 'educations';
    protected $fillable = [
        'name',
        'institution',
        'date_from',
        'date_to',
        'description',
        'user_id'
    ];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
