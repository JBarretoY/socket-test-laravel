<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\Notification;
use App\Events\Message;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $username
 * @property string $email
 * @property int $type
 * @property string|null $phone
 * @property int|null $country_id
 * @property string|null $job_title
 * @property string|null $years_experience
 * @property float $hourly_rate
 * @property string|null $email_receive
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Balance $balance
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Certificate[] $certicates
 * @property-read int|null $certicates_count
 * @property-read \App\Company $company
 * @property-read \App\Country $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Education[] $education
 * @property-read int|null $education_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Portfolio[] $portfolio
 * @property-read int|null $portfolio_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $project
 * @property-read int|null $project_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $subCategories
 * @property-read int|null $sub_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Work_Experience[] $workExperiences
 * @property-read int|null $work_experiences_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailReceive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereHourlyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereYearsExperience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 * @mixin \Eloquent
 * @property bool $work_available
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dispute[] $disputes
 * @property-read int|null $disputes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Suscription[] $suscriptions
 * @property-read int|null $suscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWorkAvailable($value)
 * @property int $cant_projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Education[] $educations
 * @property-read int|null $educations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Language[] $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Portfolio[] $portfolios
 * @property-read int|null $portfolios_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCantProjects($value)
 * @property bool $confirmed
 * @property string|null $customer_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \App\Ranking $ranking
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCustomerId($value)
 * @property int|null $count_contracts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountContracts($value)
 */
class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'username',
        'email',
        'password',
        'phone',
        'type', // 1: SuperAdmin 2:Intermediario 3:cliente 4:consultor
        'country_id',
        'job_title',
        'years_experience',
        'hourly_rate',
        'work_available',
        'email_receive',
        'about',
        'cant_projects', //Consultor: Cantidad de projectos en los que ha trabajado, Cliente: Cantidad de proyectos publicados
        'confirmed',
        'count_contracts' //Cliente: cantidad de consultores contratados
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'company','subCategories.category','workExperiences',
        'certicates','educations','portfolios.files', 'country','languages','files','balance','subscriptions.package'
    ];

    public function company(){
        return $this->hasOne('App\Company');
    }

    public function subCategories(){
        return $this->morphToMany('App\SubCategory','cateable','cateables');
    }

    public function workExperiences(){
        return $this->hasMany('App\WorkExperience');
    }

    public function certicates(){
        return $this->hasMany('App\Certificate');
    }

    public function educations(){
        return $this->hasMany('App\Education');
    }

    public function portfolios(){
        return $this->hasMany('App\Portfolio');
    }

    public function balance(){
        return $this->hasOne('App\Balance');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function projects(){
        return $this->hasMany('App\Project', 'client_id');
    }

    public function subscriptions(){
        return $this->hasMany('App\Subscription')->where('suscriptions.status', 1);
    }

    public function disputes(){
        return $this->hasMany('App\Dispute');
    }

    function isConsultor(){
        return $this->attributes['type'] === 4;
    }

    // Helper functions
    public function receiveNotification($data){
        broadcast(new Notification($this, $data));
    }

    public function receiveMessage($from, $message){
        broadcast(new Message($this, $from, $message));
    }

    public function languages(){
        return $this->morphToMany('App\Language','languable','languables')->withPivot('level');
    }

    public function files(){
        return $this->morphMany('App\File', 'fileable','fileable_type','fileable_id');
    }

    public function ranking(){
        return $this->hasOne('App\Ranking');
    }

    public function skills()
    {
        return $this->morphToMany('App\SubCategory','cateable','cateables');
    }
}
