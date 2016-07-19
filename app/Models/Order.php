<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;
    public function transform()
    {
        return [
            'id'=>$this->id
        ];
    }
    protected $fillable=[
        'client_id',
        'user_deliveryman_id',
        'total',
        'status',
    ];

    public function getStatusAttribute($value){
        return EnumOrderStatus::getStatus($value);
    }
    public function setStatusAttribute($value){
        if(is_numeric($value))
            $this->attributes['status'] = $value;
        else
            $this->attributes['status'] = EnumOrderStatus::getStatusId($value);
    }
    public function cupom(){
        return $this->belongsTo(Cupom::class);
    }
    public function items(){
        return $this->hasMany(OrderItem::class);
    }
    public function client(){
        return $this->belongsTo(User::class);
    }
    public function deliveryman(){
        return $this->belongsTo(User::class,'user_deliveryman_id');
    }

}
