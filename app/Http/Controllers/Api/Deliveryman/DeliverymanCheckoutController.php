<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Models\EnumOrderStatus;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CodeDelivery\Http\Controllers\Controller;

class DeliverymanCheckoutController extends Controller
{
    private $orderRepository;
    private $service;
    private $userRepository;

    private $with = ['client','items','deliveryman'];
    public function __construct(OrderRepository $orderRepository,UserRepository $userRepository,OrderService $service)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index(){
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository
            ->skipPresenter(false)
  //          ->with($this->with)
            ->findByIdDeliveryman($idDeliveryman);

        return $orders;
    }


    public function show($id){
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->orderRepository
            ->skipPresenter(false)
//            ->with($this->with)
            ->findByIdAndDeliveryman($id,$idDeliveryman);
        return $order;
    }

    public function updateStatus($id,Request $request){
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $orderUpdated=$this->service->updateStatus($id,$idDeliveryman,$request->get('status'));
        $order = $this->orderRepository
            ->skipPresenter(false)
//            ->with($this->with)
            ->findByIdAndDeliveryman($id,$idDeliveryman);
        if($order)
            return $order;
        else
            abort(400,"Pedido não encontrado");
    }

}
