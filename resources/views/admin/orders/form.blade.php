
<!-- Form Input -->

<div class="form-group">
    {!! Form::label('status','Status:') !!}
    {!! Form::select('status',$list_status,null,['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('deliveryman','Entregador:') !!}
    {!! Form::select('user_deliveryman_id',$list_deliveryman,null,['class'=>'form-control']) !!}
</div>

<!-- Form Submit-->

<div class="form-group">
    {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
    <a href="{{URL::previous()}}" class="btn btn-info">Cancelar</a>
</div>