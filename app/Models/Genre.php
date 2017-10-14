<?php

namespace Bookshare\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Bookshare\Models\Genre
 *
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bookshare\Models\Book[] $books
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Genre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Genre whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Genre whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Genre extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class, 'genreId');
    }
}
