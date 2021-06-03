@extends('layouts.app')

@section('content')

    <div class="modal fade" id="modal_info" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans('Compras::front_lang.information') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('list_name', trans('Listas::front_lang.list_name')) !!}
                        <input class="form-control" disabled type="text" value="{{ $productList->name }}">
                    </div>
                    <div class="form-group">
                        {!! Form::label('list_market', trans('Listas::front_lang.list_market')) !!}
                        <input class="form-control" disabled type="text" value="{{ $productList->market }}">
                    </div>
                    <div class="form-group">
                        {!! Form::label('list_description', trans('Listas::front_lang.list_description')) !!}
                        <textarea class="form-control" disabled id="description" name="description" cols="30" rows="5">
                            {{ $productList->description ?? '' }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('Listas::front_lang.close') }}</button>
                </div>
            </div>
        </div>
    </div>

    @php
        /* <div class="modal fade" id="modal_pay" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans('Compras::front_lang.end_buy') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::model($buy, $form_data, ['role' => 'form']) !!}
                            {!! Form::hidden('productListId', $productList->id) !!}
                            {!! Form::label('in_cost', trans('Compras::front_lang.cost')) !!}
                            {!! Form::text('cost', null, ['class' => 'form-control', 'id' => 'in_cost']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('Listas::front_lang.close') }}</button>
                        <button type="button" class="btn btn-primary" id="btn_save">{{ trans('Compras::front_lang.end_buy') }}</button>
                    </div>
                </div>
            </div>
        </div> */
    @endphp

    <div class="all-height pt-4">

        <div id="product_list" style="overflow: auto; height: 300px;">
            @foreach ($productList->products as $product)
            <div class="alert alert-dark">
                <div class="row">
                    <div class="col-1">
                        <i class="fas {{ $product->category->icon }}"></i>
                    </div>
                    <div class="col-11 div_edit" data-id="{{ $product->id }}">
                        <strong class="product_name">{{ $product->name }}</strong>
                        <span>{{ is_null($product->quantity) ? '' : " - $product->quantity" }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row bottom-buttons text-center py-4">
            <div class="col d-grid gap-2">
                <button class="btn btn-primary" id="btn_pay">{{ trans('Compras::front_lang.pay') }}</button>
            </div>
            <div class="col d-grid gap-2">
                <a class="btn btn-primary" href="{{ route('compras.index') }}">{{ trans('Listas::front_lang.back') }}</a>
            </div>
            <div class="col d-grid gap-2">
                <button class="btn btn-primary" id="btn_info">{{ trans('Listas::front_lang.info') }}</button>
            </div>
        </div>

    </div>





@endsection

@section('footer')
    <script>
        $('.alert').click(function() {
            $(this).toggleClass('finished');
        });

        $('#btn_save').click(() => {
            let $in_cost = $('#in_cost').val();
            if (isNaN($in_cost) || $in_cost == '') {
                alert(`{{ trans('Compras::front_lang.put_number') }}`);
                return;
            }

            $('#form')[0].submit();
        });

        $('#btn_pay').click(() => $('#modal_pay').modal('show'));

        $('#btn_info').click(() => $('#modal_info').modal('show'));
    </script>
@endsection

