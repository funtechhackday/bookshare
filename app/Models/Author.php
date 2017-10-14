<?php

namespace Bookshare\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class, 'authorId');
    }
}
