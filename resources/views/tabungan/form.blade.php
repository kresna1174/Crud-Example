<div class="form-group">
    <label>Nominal</label>
    {!! Form::text('nominal', isset($model) ? \App\Library\Locale::numberFormat($model->nominal) : '', ['class' => 'form-control text-right', 'id' => 'nominal', 'required']) !!}
</div>
