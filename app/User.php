<?php

namespace Bookshare;

use Bookshare\Models\Book;
use Bookshare\Models\Order;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Bookshare\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bookshare\Models\Book[] $books
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bookshare\Models\Order[] $inOrders
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bookshare\Models\Order[] $outOrders
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\User whereUpdatedAt($value)
 */
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
