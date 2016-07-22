<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;

/**
 * Class DeliverymanTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class DeliverymanTransformer extends TransformerAbstract
{


    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'Nome' => $model->name,
            'Email' => $model->email,

            /* place your other model properties here */
/*
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at*/
        ];
    }
}
