<?php

namespace Bookshare;

use Bookshare\Models\Book;
use Bookshare\Models\Order;
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
        return $this->hasMany(Book::class, 'userId');
    }

    public function inOrders()
    {
        return $this->hasMany(Order::class, 'ownerId');
    }

    public function outOrders()
    {
        return $this->hasMany(Order::class, 'receiverId');
    }
}
