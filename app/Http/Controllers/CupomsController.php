<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CupomRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Http\Requests;

class cupomsController extends Controller
{

    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $cupoms = $this->repository->paginate(10);
        return view('admin.cupoms.index',compact('cupoms'));
    }
    public function create(){
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request){
        $this->repository->create($request->all());
        return redirect(route('admin.cupoms.index'));
    }

    public function show($id){
        $cupom = $this->repository->find($id);
        return view('admin.cupoms.show',compact('cupom'));
    }

    public function edit($id){
        $cupom = $this->repository->find($id);
        return view('admin.cupoms.edit',compact('cupom'));
    }
    public function update($id,AdminCupomRequest $request){
        $this->repository->find($id);
        $this->repository->update($request->all(),$id);
        return redirect(route('admin.cupoms.index'));
    }
    public function destroy($id){
        $this->repository->delete($id);
        return redirect(route('admin.cupoms.index'));
    }
}
