<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['product'];
    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
//            'id'         => (int) $model->id,
            'Preço' => $model->price,
            'Quantia' => $model->qtd,
//            'Total' => $model->price * $model->qtd,
            /* place your other model properties here */

        ];
    }
    public function includeProduct(OrderItem $model){
        return $this->item($model->product,new ProductTransformer());
    }
}
