{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('category_id', 'Categorias') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombre del Personaje') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
        {{ Form::label('slug', 'URL Amigable') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug'])}}
</div>

<div class="form-group">
    {{ Form::label('status', 'Estado') }}
    <label>
        {{ Form::radio('status', 'PUBLISHED') }} Publicado
    </label>
    <label>
        {{ Form::radio('status', 'DRAFT') }} Borrador
    </label>
  </div>

  <div class="form-group">
    {{ Form::label('seasons', 'Temporadas') }}
    <div>
      @foreach($seasons as $season)
      <label>
        {{ Form::checkbox('seasons[]', $season->id) }} {{ $season->name }}
      </label>
      @endforeach
    </div>
  </div>

  <div class="form-group">
      {{ Form::label('file', 'Imagen') }}
      {{ Form::file('file', array('onchange' => 'previewImage(this)')) }}
     <br>
        <img src="" height="400" alt="..." class="img-fluid rounded">
    </div>

<div class="form-group">
    {{ Form::label('except', 'Extracto') }}
    {{ Form::textarea('except', null, ['class' => 'form-control' , 'rows' => '2']) }}
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
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}" ></script>
<script>
$(document).ready( function() {
      $("#name, #slug").stringToSlug({
        callback: function(text){
          $('#slug').val(text);
        }
      });
    });

    CKEDITOR.config.height = 400;
    CKEDITOR.config.width = 'auto';

    //mostrar la imagen cargada desde el equipo
    function previewImage(){
      var preview = document.querySelector('img');
      var file = document.querySelector('input[type=file]').files[0];
      var reader = new FileReader();

      reader.addEventListener("load", function(){
        preview.src = reader.result;
      }, false);

      if(file){
        reader.readAsDataURL(file);
      }
    }

    CKEDITOR.replace('body');
</script>
@endsection