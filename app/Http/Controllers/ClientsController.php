<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Requests;
use CodeDelivery\Services\ClientService;

class clientsController extends Controller
{

    private $repository;
    private $clientService;

    public function __construct(ClientRepository $repository,ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index(ClientRepository $repository){
        $clients = $this->repository->paginate(10);
        return view('admin.clients.index',compact('clients'));
    }
    public function create(){
        return view('admin.clients.create');
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
        return view('admin.clients.edit',compact('client'));
    }
    public function update($id,AdminClientRequest $request){
        $this->clientService->update($request->all(),$id);
        return redirect(route('admin.clients.index'));
    }
    public function destroy($id){
        $this->repository->delete($id);
        return redirect(route('admin.clients.index'));
    }
}
