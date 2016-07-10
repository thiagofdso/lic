@extends('app')
@section('content')

    <h3>Criar nova Categoria</h3>
    {!! Form::open(['route'=>'customer.order.store','method'=>'post']) !!}
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

    <!-- Form Submit-->

    <div class="form-group">
    </div>

    <div class="form-group">
        <label>Total:</label>
        <p id="total"></p>
        <a id="btnNovoItem" href="#" class="btn btn-default">Novo Item</a>

        <table class="table table-bordered">
            <thead>
                <th>Produto</th>
                <th>Quantia</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select class="form-control" name="items[0][product_id]">
                            @foreach($products as $product)
                                <option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->name.' --- '.$product->price}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        {!! Form::text('items[0][qtd]',1,['class'=>'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Form Submit-->

    <div class="form-group">
        {!! Form::submit('Criar Pedido', ['class'=>'btn btn-primary']) !!}
        <a href="{{URL::previous()}}" class="btn btn-info">Cancelar</a>
    </div>
    {!! Form::close() !!}

@endsection
@section('post-script')
<script>
    $('#btnNovoItem').click(function () {
       var row = $('table tbody > tr:last'),
           nextRow = row.clone(),
           length=$('table tbody  tr').length;

        nextRow.find('td').each(function () {
           var td = $(this),
                   input = td.find('input,select'),
                   name = input.attr('name');

            input.attr('name', name.replace((length-1) + "", length + ""));
        });
        nextRow.find('input').val(1);
        nextRow.insertAfter(row);
        calculateTotal();

    });
    $(document.body).on('click','select',function () {
        calculateTotal();
    });
    $(document.body).on('blur','input',function () {
       calculateTotal();
    });
    function calculateTotal() {
        var total = 0,
                trLen=$('table tbody  tr').length,
                tr = null,price,qtd;
        for(var i=0;i<trLen;i++){
            tr = $('table tbody tr').eq(i);
            price = tr.find(':selected').data('price');
            qtd = tr.find('input').val();
            total += price * qtd;
        }
        $('#total').html(total);
    }
</script>
@endsection