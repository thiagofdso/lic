<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;

/**
 * Class UserTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class UserTransformer extends TransformerAbstract
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
            'Role' => $model->role,

            /* place your other model properties here */
/*
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at*/
        ];
    }
    //One To One  -> Client
    public function includeClient(User $model){
        if(!$model->client)
            return null;
        return $this->item($model->client,new ClientTransformer());
    }
}
