<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Certificate
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $granted_by
 * @property string $date_from
 * @property string $date_to
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Certificate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereGrantedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Certificate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Certificate withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read int|null $files_count
 */
class Certificate extends Model
{
    use SoftDeletes;

    protected $table = 'certificates';
    protected $fillable = [
        'name',
        'granted_by',
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
