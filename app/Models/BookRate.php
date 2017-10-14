<?php

namespace Bookshare\Models;

use Bookshare\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Bookshare\Models\BookRate
 *
 * @property int $id
 * @property int|null $bookId
 * @property int|null $userId
 * @property string $rate
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Bookshare\Models\Book|null $book
 * @property-read \Bookshare\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\BookRate whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\BookRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\BookRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\BookRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\BookRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\BookRate whereUserId($value)
 * @mixin \Eloquent
 */
class BookRate extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
