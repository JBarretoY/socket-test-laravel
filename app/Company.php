<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property int $id
 * @property string $name
 * @property string $count_personal
 * @property string $industry
 * @property string $email
 * @property string $agent
 * @property string $phone
 * @property int $specialist_needed
 * @property int $specialist_type
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCountPersonal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereIndustry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSpecialistNeeded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSpecialistType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUserId($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'count_personal',
        'industry',
        'email',
        'agent',
        'phone',
        'specialist_needed',
        'specialist_type',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
