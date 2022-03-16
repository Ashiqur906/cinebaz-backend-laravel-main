<?php

namespace Cinebaz\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cinebaz\Pricing\Models\SubscriptionHead;
use Cinebaz\Order\Models\OrderDetails;
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function Subscription()
    {
        return $this->hasOne(SubscriptionHead::class, 'id', 'sub_head_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }


}
