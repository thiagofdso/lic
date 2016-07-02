@extends('app')
@section('content')

    <h3>Produto</h3>
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Nome:</th>
                <td>{{$product->name}}</td>
            </tr>
            <tr>
                <th>Categoria:</th>
                <td>{{$product->category->name}}</td>
            </tr>
            <tr>
                <th>Descrição:</th>
                <td>{{$product->description}}</td>
            </tr>
            <tr>
                <th>Preço:</th>
                <td>{{number_format($product->price, 2, ',', '.')}}</td>
            </tr>

        </table>
        <br>
        <a href="{{URL::previous()}}" class="btn btn-info">Voltar</a>
    </div>
@endsection