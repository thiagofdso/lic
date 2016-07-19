<?php

namespace CodeDelivery\Repositories;

use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Models\Order;
use CodeDelivery\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    public function findByIdAndDeliveryman($id,$idDeliveryman)
    {
        $result = $this->with(['client','items','cupom','deliveryman'])->findWhere([
            'id'=>$id,'user_deliveryman_id'=>$idDeliveryman
        ]);
        if($result instanceof  Collection){
            $result = $result->first();
            $result->items->each(function($item){
                $item->product->category;
            });
            $result->client->client;
        }
        return $result;
    }
    public function findByIdDeliveryman($idDeliveryman)
    {
        $result = $this->with(['client','items','cupom','deliveryman'])->findWhere([
            'user_deliveryman_id'=>$idDeliveryman
        ]);
        if($result instanceof  Collection){
            $result = $result->all();
            foreach ($result as $order){
                $order->client->client;
                $order->items->each(function($item){
                    $item->product->category;
                });
            }
        }
        return $result;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function presenter()
    {
        return \CodeDelivery\Presenters\OrderPresenter::class;
    }
}
