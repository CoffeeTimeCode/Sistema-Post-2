@extends('admin.app')
@section('content')
<form class="" action="{!! url('criar-post') !!}" method="post" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="row">
    <h3>Adicionar Post</h3>
    <div class="col-md-12">
        <div class="form-group">
          <label for="">Título:</label>
          <input type="text" class="form-control" name="titulo" placeholder="">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="">Selecione uma categoria:</label>
          <select class="form-control" name="categoria">
            @foreach($categorias as $categoria)
            <option value="{!! $categoria->id !!}">{!! $categoria->categoria !!}</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="">Selecione uma imagem:</label>
          <input type="file" class="form-control" name="imagem" placeholder="">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="">Conteúdo:</label>
          <textarea name="conteudo" class="form-control" rows="4"></textarea>
        </div>
    </div>

    <div class="col-md-12">
      <button type="submit" class="btn btn-success" name="button">Salvar</button>
    </div>

  </div>
</form>
@endsection
