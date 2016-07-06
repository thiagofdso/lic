@extends('app')
@section('content')

    <h3>Cupom</h3>
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Código:</th>
                <td>{{$cupom->code}}</td>
            </tr>
            <tr>
                <th>Valor:</th>
                <td>{{$cupom->value}}</td>
            </tr>
        </table>
        <br>
        <a href="{{URL::previous()}}" class="btn btn-info">Voltar</a>
    </div>


@endsection