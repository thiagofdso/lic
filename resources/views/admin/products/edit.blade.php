@extends('app')
@section('content')

    <h3>Editar Categoria</h3>
    {!! Form::model($product,['route'=>['admin.products.update',$product->id],'method'=>'put']) !!}
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

    @include('admin.products.form')

    <!-- Form Submit-->

    <div class="form-group">
        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        <a href="{{URL::previous()}}" class="btn btn-info">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection