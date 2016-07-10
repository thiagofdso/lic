<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;

class CheckoutController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository,UserRepository $userRepository,ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function index(){
        $order = $this->repository->paginate(10);
        return view('customer.order.index',compact('order'));
    }
    public function create(){
        $products = $this->productRepository->lista();
        return view('customer.order.create',compact('products'));
    }

    public function store(Request $request){
        $this->repository->create($request->all());
        return redirect(route('customer.order.index'));
    }

    public function show($id){
        $order = $this->repository->find($id);
        return view('customer.order.show',compact('order'));
    }

    public function edit($id){
        $order = $this->repository->find($id);
        return view('customer.order.edit',compact('order'));
    }
    public function update($id,Request $request){
        $this->repository->find($id);
        $this->repository->update($request->all(),$id);
        return redirect(route('customer.order.index'));
    }
    public function destroy($id){
        $this->repository->delete($id);
        return redirect(route('customer.order.index'));
    }
}
