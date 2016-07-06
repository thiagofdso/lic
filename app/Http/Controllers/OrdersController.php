<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Http\Requests;
use CodeDelivery\Models\EnumOrderStatus;

class ordersController extends Controller
{

    private $repository;
    private $userrepository;
    public function __construct(OrderRepository $repository,UserRepository $userrepository)
    {
        $this->repository = $repository;
        $this->userrepository = $userrepository;
    }

    public function index(){
        $orders = $this->repository->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }
    public function create(){
        return view('admin.orders.create');
    }

    public function store(AdminOrderRequest $request){
        $this->repository->create($request->all());
        return redirect(route('admin.orders.index'));
    }

    public function show($id){
        $order = $this->repository->find($id);
        return view('admin.orders.show',compact('order'));
    }

    public function edit($id){
        $order = $this->repository->find($id);
        $list_status = EnumOrderStatus::getList();
        $list_deliveryman=$this->userrepository->deliverymans();
        return view('admin.orders.edit',compact('order','list_status','list_deliveryman'));
    }
    public function update($id,AdminOrderRequest $request){
        $this->repository->update($request->all(),$id);
        return redirect(route('admin.orders.index'));
    }
    public function destroy($id){
        $this->repository->delete($id);
        return redirect(route('admin.orders.index'));
    }
}
