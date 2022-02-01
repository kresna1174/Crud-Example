{!! Form::model($model, ['id' => 'formEdit']) !!}
    @include('tabungan.form')
    <div class="text-right">
        <button type="button" class="btn btn-outline-dark" onclick="bootbox.hideAll()">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="update('{{ $model->id }}')">Update</button>
    </div>
{!! Form::close() !!}
<script type="text/javascript" src="{{ asset('assets/plugin/bluid.js') }}"></script>