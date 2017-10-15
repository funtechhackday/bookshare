<?php

namespace Bookshare\Models;

use Bookshare\Models\Order;
use Illuminate\Database\Eloquent\Model;

/**
 * Bookshare\Models\OrderStatus
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $title
 * @property string|null $desc
 * @property int|null $available
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bookshare\Models\Order[] $orders
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\OrderStatus whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\OrderStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\OrderStatus whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bookshare\Models\OrderStatus whereTitle($value)
 * @mixin \Eloquent
 */
class OrderStatus extends Model
{

    public $timestamps = FALSE;

    public function orders()
    {
        return $this->hasMany(Order::class, 'statusId');
    }
}
