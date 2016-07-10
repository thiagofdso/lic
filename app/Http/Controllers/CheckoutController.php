<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    private $orderRepository;
    private $service;

    public function __construct(OrderRepository $orderRepository,UserRepository $userRepository,ProductRepository $productRepository,OrderService $service)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function index(){
        $clientID = $this->userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->orderRepository->scopeQuery(function ($query) use($clientID){
            return $query->where('client_id','=',$clientID);
        })->paginate(10);
        return view('customer.order.index',compact('orders'));
    }
    public function create(){
        $products = $this->productRepository->lista();
        return view('customer.order.create',compact('products'));
    }

    public function store(Request $request){
        $data = $request->all();
        $clientID = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientID;
        $this->service->create($data);
        return redirect(route('customer.order.index'));
    }

    public function show($id){
        $order = $this->orderRepository->find($id);
        return view('customer.order.show',compact('order'));
    }

    public function edit($id){
        $order = $this->repository->find($id);
        return view('customer.order.edit',compact('order'));
    }
    public function update($id,Request $request){
        $this->orderRepository->find($id);
        $this->orderRepository->update($request->all(),$id);
        return redirect(route('customer.order.index'));
    }
    public function destroy($id){
        $this->orderRepository->delete($id);
        return redirect(route('customer.order.index'));
    }
}
