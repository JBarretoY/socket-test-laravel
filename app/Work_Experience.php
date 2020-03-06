<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Work_Experience
 *
 * @property int $id
 * @property string $name
 * @property string $company_name
 * @property string $date_from
 * @property string $date_to
 * @property bool $at_present
 * @property string $description
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereAtPresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work_Experience whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read int|null $files_count
 */
class WorkExperience extends Model
{
    protected $table = 'work_experiences';
    protected $fillable = [
        'name',
        'company_name',
        'date_from',
        'date_to',
        'at_present',
        'description',
        'user_id'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

}
