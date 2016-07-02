@extends('app')
@section('content')

        <h3>Produtos</h3>
        <br>
        <a href="{{route('admin.products.create')}}" class="btn btn-success">Novo Produto</a>
        <br><br>
        <div class="col-md-8">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->price, 2, ',', '.')}}</td>
                    <td>{{$product->category->name}}</td>
                    <td >
                        <a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="btn btn-info ">Editar</a>
                        <a href="{{route('admin.products.destroy',['id'=>$product->id])}}" class="btn btn-danger ">Excluir</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$products->render()}}
        </div>

@endsection