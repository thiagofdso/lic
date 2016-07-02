@extends('app')
@section('content')

    <h3>Criar nova Categoria</h3>
    {!! Form::open(['route'=>'admin.categories.store','method'=>'post']) !!}
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
    @include('admin.categories.form')

    <!-- Form Submit-->

    <div class="form-group">
        {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
        <a href="{{URL::previous()}}" class="btn btn-info">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection