<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $gender
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property ArrangeSectionForBusinessesByUser[] $arrangeSectionForBusinessesByUsers
 * @property ArrangeSectionForProductsByUser[] $arrangeSectionForProductsByUsers
 * @property BusinessesAdmin[] $businessesAdmins
 * @property Cart[] $carts
 * @property Comment[] $comments
 * @property SavedProduct[] $savedProducts
 * @property UsersDevice[] $usersDevices
 * @property UsersLoginActivity[] $usersLoginActivities
 * @property UsersMerchandise[] $usersMerchandises
 * @property UsersNotRegistered[] $usersNotRegistereds
 * @property UsersRegistered[] $usersRegistereds
 * @property UsersWallet[] $usersWallets
 */
class Admin extends Authenticatable
{
    use Notifiable,HasApiTokens;

    protected $table="admins";
    /**
     * @var array
     */
    protected $fillable = ['name', 'email','phone_number', 'gender', 'email_verified_at', 'password', 'remember_token', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrangeSectionForBusinessesByUsers()
    {
        return $this->hasMany('App\ArrangeSectionForBusinessesByUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrangeSectionForProductsByUsers()
    {
        return $this->hasMany('App\ArrangeSectionForProductsByUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesAdmins()
    {
        return $this->hasMany('App\BusinessesAdmin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function savedProducts()
    {
        return $this->hasMany('App\SavedProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersDevices()
    {
        return $this->hasMany('App\UsersDevice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersLoginActivities()
    {
        return $this->hasMany('App\UsersLoginActivity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersMerchandises()
    {
        return $this->hasMany('App\UsersMerchandise');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersNotRegistereds()
    {
        return $this->hasMany('App\UsersNotRegistered');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersRegistereds()
    {
        return $this->hasMany('App\UsersRegistered');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersWallets()
    {
        return $this->hasMany('App\UsersWallet');
    }
}
