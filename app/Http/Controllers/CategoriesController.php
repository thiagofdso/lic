<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Requests;

class CategoriesController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(CategoryRepository $repository){
        $categories = $this->repository->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }
    public function create(){
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request){
        $this->repository->create($request->all());
        return redirect(route('admin.categories.index'));
    }

    public function edit($id){
        $category = $this->repository->find($id);
        return view('admin.categories.edit',compact('category'));
    }
    public function update($id,AdminCategoryRequest $request){
        $this->repository->find($id);
        $this->repository->update($request->all(),$id);
        return redirect(route('admin.categories.index'));
    }
    public function destroy($id){
        $this->repository->delete($id);
        return redirect(route('admin.categories.index'));
    }
    public function cancel(){
        return redirect(route('admin.categories.index'));
    }


}
