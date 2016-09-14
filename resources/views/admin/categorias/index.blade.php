@extends('admin.app')
@section('content')
<div class="row" ng-app="">
  <div class="col-md-4">
    <h2>Nova Categoria</h2>

    <form name="frmCategorias" action="{!! url('categorias') !!}" method="post">
      {!! csrf_field() !!}

      <div ng-if="frmCategorias.categoria.$error.required && frmCategorias.categoria.$dirty" class="alert alert-danger">Nome da categoria em Branco.</div>
      <div ng-if="frmCategorias.categoria.$error.maxlength" class="alert alert-danger">Nome da categoria maior que 75 caracteres.</div>

      <div class="form-group">
        <label for="">Nome da Categoria</label>
        <input type="text" name="categoria" ng-model="categoria" class="form-control" id="" placeholder="" required ng-maxlength="75">
      </div>

      <button ng-if="frmCategorias.$valid" type="submit" class="btn btn-default">Adicionar</button>

    </form>
  </div>

  <div class="col-md-8">

  </div>
</div>
@endsection
