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

    protected $defaultIncludes = ['cupom'];
    //protected $availableIncludes = [];
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
            'total'      => (float) $model->total,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];

    }
    //Many To One  -> Cupom
    public function includeCupom(Order $model){
        if(!$model->cupom)
            return null;
        return $this->item($model->cupom,new CupomTransformer());
    }
    //One To Many  -> OrderItem

}
