@section('title','Sistema Post 2 - Página de Pesquisa')
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-offset-1 col-md-8">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Pesquisar</h3>
          </div>
          <div class="panel-body">
            <form class="" action="{!! url('pesquisar') !!}" method="post">
              {!! csrf_field() !!}
              <div class="form-group">
                <input type="text" class="form-control" name="pesquisar">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success" name="button">Pesquisar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <h4>{!! count($posts) !!} Resultados</h4>
      </div>

      <div class="col-md-12">
        <?php foreach ($posts as $key => $value): ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">{!! $value->titulo !!}</h3>
            </div>
            <div class="panel-body" style="padding:0px;" align="center">
                <img src="{!! $value->imagem !!}" class="img-responsive">
            </div>
            <div class="panel-footer">
              <a href="{!! url('post/'.$value->categoria.'/'.$value->slug) !!}" class="btn btn-success" role="button">Visualizar</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>
@endsection
