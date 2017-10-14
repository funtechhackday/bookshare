<?php

namespace Bookshare\Models;

use Bookshare\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Bookshare\Models\Order
 *
 * @property-read \Bookshare\Models\Book $book
 * @property-read \Bookshare\User $owner
 * @property-read \Bookshare\User $receiver
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $ownerId
 * @property int|null $bookId
 * @property int|null $receiverId
 * @property string|null $returnDate
 * @property string $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereUpdatedAt($value)
 */
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
