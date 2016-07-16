<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CodeDelivery\Http\Controllers\Controller;

class ClientCheckoutController extends Controller
{
    private $orderRepository;
    private $service;
    private $userRepository;

    public function __construct(OrderRepository $orderRepository,UserRepository $userRepository,OrderService $service)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index(){
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository->with(['client','items','cupom','deliveryman'])->scopeQuery(function ($query) use($id){
            return $query->where('client_id','=',$id);
        })->paginate();
        $orders->each(function($order) {
            $order->items->each(function($item){
                $item->product->category;
            });
        });

        return $orders;
    }

    public function store(Request $request){
        $id = Authorizer::getResourceOwnerId();
        $data = $request->all();
        $data['client_id'] = $id;
        $orderCreated = $this->service->create($data);
        $order = $this->orderRepository->with(['client','items','cupom','deliveryman'])->find($orderCreated->id);
        return $order;
    }

    public function show($id){
        $order = $this->orderRepository->with(['client','items','cupom','deliveryman'])->find($id);
        $order->items->each(function($item){
            $item->product->category;
        });
        return $order;
    }

}
