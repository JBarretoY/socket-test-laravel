<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Transaction
 *
 * @property int $id
 * @property int $user_id_from
 * @property int $user_id_to
 * @property int $task_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Task $task
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUserIdFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUserIdTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction withoutTrashed()
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';
    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'task_id',
        'status'
    ];
    protected $dates = ['deleted_at'];

    public function task(){
        return $this->belongsTo('App\Task');
    }
}
