@extends('app')
@section('content')

    <h3>Pedido</h3>
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Numero:</th>
                <td>{{$order->id}}</td>
            </tr>
        <tr>
            <th>Total:</th>
            <td>{{'R$ '.$order->total}}</td>
        </tr>
        <tr>
            <th>Data:</th>
            <td>{{$order->created_at}}</td>
        </tr>
        <tr>
            <th>Cliente:</th>
            <td>{{$order->client->name}}</td>
        </tr>
        <tr>
            <th>Endereço de Entrega:</th>
            <td>{{$order->client->client->address.'-'.$order->client->client->city.'/'.$order->client->client->state}}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{$order->status}}</td>
        </tr>
        <tr>
            <th>Entregador:</th>
            <td>
                @if($order->deliveryman)
                    {{$order->deliveryman->name}}
                @else
                    Sem entregador
                @endif
            </td>
        </tr>
            <tr>
                <td colspan="2">
            <table class="table">
                <tbody>
         <tr>
             <th>Produtos</th>
             <th>Preço</th>
             <th>Quantia</th>
             <th>Total</th>
         </tr>
            @foreach($order->items as $item)
            <tr>
                <td>{{$item->product->name}}</td>
                <td>R$ {{$item->price}}</td>
                <td>{{$item->qtd}}</td>
                <td>R$ {{$item->qtd*$item->price}}</td>
            </tr>
            @endforeach
                </tbody>
                </table>
                </td>
            </tr>
        </table>
        <br>
        <a href="{{URL::previous()}}" class="btn btn-info">Voltar</a>
    </div>


@endsection