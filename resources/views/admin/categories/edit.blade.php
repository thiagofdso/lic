@extends('app')
@section('content')

    <h3>Editar Categoria</h3>
    {!! Form::model($category,['route'=>['admin.categories.update',$category->id],'method'=>'put']) !!}
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
        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.categories.cancel')}}" class="btn btn-info">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection