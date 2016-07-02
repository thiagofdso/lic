@extends('app')
@section('content')

        <h3>Categorias</h3>
        <br>
        <a href="{{route('admin.categories.create')}}" class="btn btn-success">Nova Categoria</a>
        <br><br>
        <div class="col-md-8">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td >
                        <a href="{{route('admin.categories.edit',['id'=>$category->id])}}" class="btn btn-info ">Editar</a>
                        <a href="{{route('admin.categories.destroy',['id'=>$category->id])}}" class="btn btn-danger ">Excluir</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$categories->render()}}
        </div>

@endsection