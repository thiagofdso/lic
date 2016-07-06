@extends('app')
@section('content')

    <h3>Editar Pedido</h3>
    <!-- Form Input Tags    -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>Pedido #{{$order->id.'- R$'.$order->total}}</h3>
    <h4>Data: {{$order->created_at}}</h4>
    <h4>Cliente: {{$order->client->name}}</h4>
    <p><b>Entregar em:</b><br>{{$order->client->client->address.'-'.$order->client->client->city.'/'.
    $order->client->client->state
    }}</p>

    {!! Form::model($order,['route'=>['admin.orders.update',$order->id],'method'=>'put']) !!}
    @include('admin.orders.form')
    {!! Form::close() !!}
@endsection