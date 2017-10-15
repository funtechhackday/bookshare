<?php

namespace Bookshare\Models;

use Bookshare\Models\OrderStatus;
use Bookshare\Models\Book;
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
 * @property int|null $statusId
 * @property-read \Bookshare\Models\OrderStatus|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Order whereStatusId($value)
 */
class Order extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'ownerId');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiverId');
    }

    /**
     * TODO В будушем в одном заказе должно быть несколько книг
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookId');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'statusId');
    }

    public function save(array $options = [])
    {
        if (!empty($this->id)) {         //Old record
            $oldStatus = $this->getOriginal('statusId');
        } else {
            $this->statusId = 1;
            $oldStatus = 1;
            $book = Book::find($this->bookId);
            $status = $this->status();
            if ( !empty($book) AND !empty($status)) {
                $book->first()->setAvailable($status->first()->available);
            }
        }
        parent::save();
        $new_status = $this->statusId;
        if ($new_status != $oldStatus) {
            //var_dump(Book::find($this->bookId)->first()->setAvailable($this->status()->first()->available)); die;
            $book = Book::find($this->bookId);
            $status = $this->status();
            if ( !empty($book) AND !empty($status)) {
                $book->first()->setAvailable($status->first()->available);
            }
        }
    }
}
