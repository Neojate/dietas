@extends('layouts.app')

@section('content')

    <div class="all-height">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item {{ is_null($productList->id) ? 'active' : '' }}">
                    @include('Listas::partials/partial_listform')
                </div>
                <div class="carousel-item {{ is_null($productList->id) ? '' : 'active' }}">
                    @include('Listas::partials/partial_products')
                </div>
            </div>
        </div>

        <div class="row bottom-buttons text-center py-4">
            <div class="col d-grid gap-2">
                <button class="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </button>
            </div>
            <div class="col d-grid gap-2">
                <a class="button" href="{{ route('listas.index') }}">
                    <i class="fas fa-backward fa-2x"></i>
                </a>
            </div>
            <div class="col d-grid gap-2">
                <button class="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <i class="fas fa-info fa-2x"></i>
                </button>
            </div>
        </div>

    </div>

@endsection

@section('footer')
    <script>
        var $product_list = $('#product_list');
        var spinner = `<div class="text-center"><div class="lds-facebook"><div></div><div></div><div></div></div></div>`;

        @if (!is_null($productList->id))
            $('#btn_addproduct').click(() => {
                let url = `{{ route('product.create', ['lista_id' => $productList->id]) }}`;
                loadPartial(url);
            });
        @endif

        $('#btn_saveproduct').click(() => $('#form_product')[0].submit());

        $('.div_edit').click(function() {
            let url = `{{ url('/products/edit') }}/${this.dataset.id}`;
            loadPartial(url);
        });

        function loadPartial(url) {
            $('#modal_addproduct').modal('show');
            $('#modal_addproduct_body').html(spinner);
            fetch(url)
                .then(response => response.text())
                .then(text => $('#modal_addproduct_body').html(text));
        }
    </script>
@endsection
