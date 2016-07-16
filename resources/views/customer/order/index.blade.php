@extends('app')
@section('content')

        <h3>Meus Pedidos</h3>
        <br>
        <a href="{{route('customer.order.create')}}" class="btn btn-success">Novo Pedido</a>
        <br>
        <div class="col-md-10">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Entregador</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        @if($order->deliveryman)
                            {{$order->deliveryman->name}}
                        @else
                            Sem entregador
                        @endif
                    </td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>
                    <td >
                        {!! Form::open(['route'=>['customer.order.destroy',$order->id],'method'=>'delete']) !!}
                        <a href="{{route('customer.order.show',['id'=>$order->id])}}" class="btn btn-info ">Exibir</a>
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