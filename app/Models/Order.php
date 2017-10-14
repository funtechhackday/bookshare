<?php

namespace Bookshare\Models;

use Bookshare\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function owner() {
        return $this->belongsTo(User::class, 'ownerId');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'receiverId');
    }

    /**
     * TODO В будушем в одном заказе должно быть несколько книг
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book() {
        return $this->belongsTo(Book::class, 'bookId');
    }
}
