@extends('app')
@section('content')

        <h3>Clientes</h3>
        <br>
        <a href="{{route('admin.clients.create')}}" class="btn btn-success">Novo Cliente</a>
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
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->user->name}}</td>
                    <td >
                        {!! Form::open(['route'=>['admin.clients.destroy',$client->id],'method'=>'delete']) !!}
                        <a href="{{route('admin.clients.show',['id'=>$client->id])}}" class="btn btn-info ">Exibir</a>
                        <a href="{{route('admin.clients.edit',['id'=>$client->id])}}" class="btn btn-info ">Editar</a>
                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$clients->render()}}
        </div>

@endsection