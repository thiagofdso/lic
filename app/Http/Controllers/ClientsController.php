<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Requests;

class clientsController extends Controller
{

    private $repository;
    private $userrepository;

    public function __construct(ClientRepository $repository,UserRepository $userrepository)
    {
        $this->repository = $repository;
        $this->userrepository = $userrepository;
    }

    public function index(ClientRepository $repository){
        $clients = $this->repository->paginate(10);
        return view('admin.clients.index',compact('clients'));
    }
    public function create(){
        $users = $this->userrepository->lists('name','id');
        return view('admin.clients.create',compact('users'));
    }

    public function store(AdminClientRequest $request){
        $this->repository->create($request->all());
        return redirect(route('admin.clients.index'));
    }

    public function show($id){
        $client = $this->repository->find($id);
        return view('admin.clients.show',compact('client'));
    }

    public function edit($id){
        $client = $this->repository->find($id);
        $users = $this->userrepository->lists('name','id');
        return view('admin.clients.edit',compact('client','users'));
    }
    public function update($id,AdminClientRequest $request){
        $this->repository->find($id);
        $this->repository->update($request->all(),$id);
        return redirect(route('admin.clients.index'));
    }
    public function destroy($id){
        $this->repository->delete($id);
        return redirect(route('admin.clients.index'));
    }
}
