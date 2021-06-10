{!! Form::model($product, $form_data_product, ['role' => 'form']) !!}
    @csrf
    {!! Form::hidden('productlist_id', $lista_id) !!}
    <div class="form-group">
        {!! Form::label('product_name', trans('Listas::front_lang.product_name')) !!}
        {!! Form::text('name', null, ['autocomplete' => 'off', 'class' => 'form-control', 'id' => 'product_name']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('product_quantity', trans('Listas::front_lang.product_quantity')) !!}
        {!! Form::text('quantity', null, ['autocomplete' => 'off', 'class' => 'form-control', 'id' => 'product_quantity']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', trans('Listas::front_lang.category_id')) !!}
        <select class="form-control" id="category_id" name="category_id">
            <option value="">{{ trans('Listas::front_lang.category_id_helper') }}</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
{!! Form::close() !!}
