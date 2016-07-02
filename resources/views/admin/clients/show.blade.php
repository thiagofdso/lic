@extends('app')
@section('content')

    <h3>Categoria</h3>
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Usuário:</th>
                <td>{{$client->user->name}}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{$client->phone}}</td>
            </tr>
            <tr>
                <th>Endereço:</th>
                <td>{{$client->address}}</td>
            </tr>
            <tr>
                <th>Cidade:</th>
                <td>{{$client->addres}}</td>
            </tr>
            <tr>
                <th>Estado:</th>
                <td>{{$client->state}}</td>
            </tr>
            <tr>
                <th>CEP:</th>
                <td>{{$client->zipcode}}</td>
            </tr>
        </table>
        <br>
        <a href="{{URL::previous()}}" class="btn btn-info">Voltar</a>
    </div>


@endsection