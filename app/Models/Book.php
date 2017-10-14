<?php

namespace Bookshare\Models;

use Bookshare\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @property string $title
 * @property Author $author
 * @property User $user
 * @package Bookshare\Models
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
}
