@extends('app')
@section('content')

        <h3>Cupoms</h3>
        <br>
        <a href="{{route('admin.cupoms.create')}}" class="btn btn-success">Novo Cupom</a>
        <br><br>
        <div class="col-md-8">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Código</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cupoms as $cupom)
                <tr>
                    <td>{{$cupom->id}}</td>
                    <td>{{$cupom->code}}</td>
                    <td>{{$cupom->value}}</td>
                    <td >
                        {!! Form::open(['route'=>['admin.cupoms.destroy',$cupom->id],'method'=>'delete']) !!}
                        <a href="{{route('admin.cupoms.show',['id'=>$cupom->id])}}" class="btn btn-info ">Exibir</a>
                        <a href="{{route('admin.cupoms.edit',['id'=>$cupom->id])}}" class="btn btn-info ">Editar</a>
                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$cupoms->render()}}
        </div>

@endsection