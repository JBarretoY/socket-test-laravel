<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ranking
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking whereId($value)
 * @meApp\userthod static \Illuminate\Database\Eloquent\Builder|\App\Ranking whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property int $ranking
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking whereRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ranking whereUpdatedAt($value)
 */
class Ranking extends Model
{
    protected $table    = 'rankings';
    protected $fillable = ['user_id','ranking'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
