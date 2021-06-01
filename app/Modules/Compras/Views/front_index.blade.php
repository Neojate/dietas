@extends('layouts.app')

@section('content')

    <div class="text-center m-4">
        {{ trans('Compras::front_lang.select_list') }}
    </div>
    @foreach ($productList as $list)
        <div class="alert alert-danger">
            <div class="row">
                <div class="col-12 div_edit" data-id="{{ $list->id }}">
                    <span>{{ \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s', $list->created_at)->format('d/m/Y') }}</span>
                    <strong>{{ $list->name }}</strong>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('footer')
    <script>
        $('.div_edit').click(function() {
            location.href = `{{ url('/compras/edit') }}/${this.dataset.id}`;
        });
    </script>
@endsection
