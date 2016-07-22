<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;

/**
 * Class ClientUserTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ClientUserTransformer extends TransformerAbstract
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
            'Nome' => $model->name,
            'Email' => $model->email,

            /* place your other model properties here */
/*
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at*/
        ];
    }
}
