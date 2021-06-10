@extends('layouts.app')

@section('content')

    {{-- Modal delete --}}
    <div class="modal fade" id="modal_deletelist" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans('Listas::front_lang.list_delete_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    {{ trans('Listas::front_lang.list_delete_info') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('front_lang.no') }}</button>
                    <button class="btn btn-danger" id="btn_delete">{{ trans('front_lang.yes') }}</button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="mt-4">{{ trans('Listas::front_lang.my_list') }}</h1>
    <div class="d-grid gap-2 my-4 position-relative">
        <div class="save-button text-center">
            <i class="fas fa-store fa-2x"></i>
        </div>
        <button class="button" id="btn_newlist">
            {{ trans('Listas::front_lang.new_list') }}
        </button>
    </div>
    @foreach ($productList as $list)
        <div class="alert alert-danger">
            <div class="row">
                <div class="col-10 div_edit" data-id="{{ $list->id }}">
                    <span>{{ \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s', $list->created_at)->format('d/m/Y') }}</span>
                    <strong>{{ $list->name }}</strong>
                </div>
                <div class="col-2">
                    <button class="btn btn-danger btn-sm delete" data-id="{{ $list->id }}">&times;</button>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('footer')
    <script>
        var deleteId = 0;

        $('.delete').click(function() {
            deleteId = this.dataset.id;
            $('#modal_deletelist').modal('show')
        });

        $('#btn_delete').click(() => {
            location.href = `{{ url('/listas/delete') }}/${deleteId}`;
        });

        $('.div_edit').click(function() {
            location.href = `{{ url('/listas/edit') }}/${this.dataset.id}`;
        });

        $('#btn_newlist').click(() => location.href = '{{ route("listas.create") }}');
    </script>
@endsection
