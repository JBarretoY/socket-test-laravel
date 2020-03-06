<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Message
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Message onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Message withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Message withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $user_id_from
 * @property int|null $user_id_to
 * @property string $message
 * @property bool $read
 * @property bool $work_space
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserIdFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserIdTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereWorkSpace($value)
 */
class Message extends Model
{
	use SoftDeletes;

    protected $table = 'messages';
    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'message',
        'read',
        'work_space',
        'project_id'
    ];
    protected $dates = ['deleted_at'];
}
