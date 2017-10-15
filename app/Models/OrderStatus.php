<?php

namespace Bookshare\Models;

use Bookshare\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

    public $timestamps = FALSE;

    public function orders()
    {
        return $this->hasMany(Order::class, 'statusId');
    }
}
