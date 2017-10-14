<?php

namespace Bookshare\Models;

use Bookshare\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property string $title
 * @property string $desc
 * @property string $image
 * @property Author $author
 * @property User $user
 * @package Bookshare\Models
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $authorId
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Book whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Book whereUpdatedAt($value)
 */
class Book extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class, 'authorId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genreId');
    }
}
