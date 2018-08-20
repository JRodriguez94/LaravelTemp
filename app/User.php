<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyOwnResetPassword as ResetPasswordNotification;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $username
 * @property string $last_name
 * @property string $second_last_name
 * @property string $street
 * @property int $outside_number
 * @property string $interior_number
 * @property string $neighborhood
 * @property int $postal_code
 * @property string $city
 * @property string $state
 * @property int|null $phonenumber
 * @property int $cellphone
 * @property float $base_salary
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBaseSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCellphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereInteriorNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOutsideNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhonenumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSecondLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'last_name',
        'second_last_name',
        'street',
        'outside_number',
        'inside_number',
        'neighborhood',
        'postal_code',
        'city',
        'state',
        'phonenumber',
        'cellphone',
        'base_salary',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
   public function sendPasswordResetNotification($token)
   {
       $this->notify(new ResetPasswordNotification($token));
   }
}
