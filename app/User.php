<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')
                    ->as('usertype')
                    ->withTimestamps();
    }

    /**
     * Find all user without current logged user
     *
     * @param Builder $query
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeFindAllWithoutMe(Builder $query)
    {
        return $query->where('id', '!=', Auth::id())->get();
    }
}
