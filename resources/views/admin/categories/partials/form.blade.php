
<div class="form-group">
    {{ Form::label('name', 'Nombre de la Temporada') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
        {{ Form::label('slug', 'URL Amigable') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug'])}}
</div>

<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
{{-- <script src='/vendor/stringToSlug/jquery.stringtoslug.min.js'></script> --}}
<script src="{{ asset('vendor/stringToSlug/jquery.stringtoslug.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
<script>
$(document).ready( function() {
      $("#name, #slug").stringToSlug({
        callback: function(text){
          $('#slug').val(text);
        }
      });
    });
</script>
@endsection