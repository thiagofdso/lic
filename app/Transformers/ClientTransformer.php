<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['user'];
    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'         => (int) $model->id,
            'Fone' => $model->phone,
            'Endereço' => $model->address,
            'Cidade/UF' => $model->city.'/'.$model->state,
            'Cep' => $model->zipcode,
            /* place your other model properties here */
/*
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at*/
        ];
    }
    public function includeUser(Client $model){
        return $this->item($model->user,new ClientUserTransformer());
    }

}
