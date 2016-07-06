@extends('app')
@section('content')

        <h3>Pedidos</h3>
        <br>
        <div class="col-md-10">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th>Itens</th>
                    <th>Entregador</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                        <li>{{$item->product->name.'-'.$item->product->price}}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>
                        @if($order->deliveryman)
                        {{$order->deliveryman->name}}
                        @else
                            Sem entregador
                        @endif
                    </td>
                    <td>{{$order->getStatus()}}</td>
                    <td >
                        {!! Form::open(['route'=>['admin.orders.destroy',$order->id],'method'=>'delete']) !!}
                        <a href="{{route('admin.orders.show',['id'=>$order->id])}}" class="btn btn-info ">Exibir</a>
                        <a href="{{route('admin.orders.edit',['id'=>$order->id])}}" class="btn btn-info ">Editar</a>
                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$orders->render()}}
        </div>

@endsection