<?php

namespace Bookshare\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Bookshare\Models\Author
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bookshare\Models\Book[] $books
 * @mixin \Eloquent
 * @property int $id
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Author whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Author whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Author whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\Author whereUpdatedAt($value)
 */
class Author extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class, 'authorId');
    }
}
