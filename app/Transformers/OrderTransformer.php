<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['client','deliveryman','cupom','items'];
//    protected $availableIncludes = ['cupom','items'];
    /**
     * Transform the \Order entity
     * @param \Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id'         => (int) $model->id,


            /* place your other model properties here */
            'Total'      => (float) $model->total,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];

    }
    //Many To One  -> Deliveryman
    public function includeDeliveryman(Order $model){
        if(!$model->deliveryman)
            return null;
        return $this->item($model->deliveryman,new UserTransformer());
    }
    //Many To One  -> Client
    public function includeClient(Order $model){
        return $this->item($model->client,new UserTransformer());
    }
    //Many To One  -> Cupom
    public function includeCupom(Order $model){
        if(!$model->cupom)
            return null;
        return $this->item($model->cupom,new CupomTransformer());
    }
    //One To Many  -> OrderItem
    public function includeItems(Order $model){
        return $this->collection($model->items,new OrderItemTransformer());
    }

}
