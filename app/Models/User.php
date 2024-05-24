<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\Activity;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
       'company',
       'cnpj',
       'nit',
       'name',
       'business',
       'email',
       'telephone',
       'state_province',
       'address',
       'activity',
       'country',
       'city',
       'password',
       'privacy_policy',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function updatePassword($newPassword)
    {
        $this->password = Hash::make($newPassword);
        $this->save();
    }

    public function upload()
    {
        return $this->hasMany(Upload::class, 'id_user');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }


}
