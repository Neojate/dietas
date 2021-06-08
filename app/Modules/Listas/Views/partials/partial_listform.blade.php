{!! Form::model($productList, $form_data, ['role' => 'form']) !!}
    <div class="form-group">
        {!! Form::label('list_name', trans('Listas::front_lang.list_name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'list_name']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('list_market', trans('Listas::front_lang.list_market')) !!}
        {!! Form::text('market', null, ['class' => 'form-control', 'id' => 'list_market']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('list_description', trans('Listas::front_lang.list_description')) !!}
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
            {{ $productList->description ?? '' }}
        </textarea>
    </div>
    <div class="d-grid gap-2 my-4 position-relative">
        <div class="save-button text-center">
            <i class="fas fa-save fa-2x"></i>
        </div>
        <button class="button">
            {{ trans('Listas::front_lang.list_save') }}
        </button>
    </div>
{!! Form::close() !!}
