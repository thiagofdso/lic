@extends('app')
@section('content')

    <h3>Categoria</h3>
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nome:</th>
                <td>{{$category->name}}</td>
            </tr>
        </table>
        <br>
        <a href="{{URL::previous()}}" class="btn btn-info">Voltar</a>
    </div>


@endsection