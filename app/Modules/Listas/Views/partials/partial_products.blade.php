{{-- Modal Product --}}
<div class="modal fade" id="modal_addproduct" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('Listas::front_lang.product') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_addproduct_body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('Listas::front_lang.close') }}</button>
                <button type="button" class="btn btn-primary" id="btn_saveproduct">{{ trans('Listas::front_lang.save_product') }}</button>
            </div>
      </div>
    </div>
</div>

<div class="d-grid gap-2 my-4 position-relative">
    <div class="save-button text-center">
        <i class="fas fa-shopping-bag fa-2x"></i>
    </div>
    <button class="button" id="btn_addproduct" {{ is_null($productList->id) ? 'disabled' : '' }}>
        {{ trans('Listas::front_lang.add_product') }}
    </button>
    </button>
</div>

<div class="position-relative">


<div id="product_list">
    @foreach ($productList->products as $product)
        <div class="alert alert-dark">
            <div class="row">
                <div class="col-1">
                    <i class="fas {{ $product->category->icon ?? '' }}"></i>
                </div>
                <div class="col-9 div_edit" data-id="{{ $product->id }}">
                    <strong>{{ $product->name }}</strong>
                    <span>{{ is_null($product->quantity) ? '' : " - $product->quantity" }}</span>
                </div>
                <div class="col-2">
                    <a class="btn btn-danger btn-sm" href="{{ route('product.delete', ['product_id' => $product->id]) }}">&times;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
