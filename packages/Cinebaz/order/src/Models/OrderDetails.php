<?php

namespace Cinebaz\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cinebaz\Pricing\Models\SubscriptionHead;
use Cinebaz\Media\Models\Media;
use Cinebaz\Member\Models\Member;
use Cinebaz\Order\Models\Order;
class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    public function media(){
        return $this->belongsTo(Media::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }


}
