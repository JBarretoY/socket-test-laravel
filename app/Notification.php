<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Notification
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property bool $read
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Notification onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Notification withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Notification withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $url
 * @property string|null $case
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereCase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUrl($value)
 */
class Notification extends Model
{
	use SoftDeletes;

    protected $table = 'notifications';
    protected $fillable = [
        'user_id',
        'message',
        'read',
        'case', //project: Importantes en el workspace
        'url'
    ];
    protected $dates = ['deleted_at'];
}
