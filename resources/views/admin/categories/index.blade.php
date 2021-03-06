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
                        {!! Form::open(['route'=>['admin.categories.destroy',$category->id],'method'=>'delete']) !!}
                        <a href="{{route('admin.categories.show',['id'=>$category->id])}}" class="btn btn-info ">Exibir</a>
                        <a href="{{route('admin.categories.edit',['id'=>$category->id])}}" class="btn btn-info ">Editar</a>
                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$categories->render()}}
        </div>

@endsection