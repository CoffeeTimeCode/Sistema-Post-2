<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Posts;
use App\Categorias;
use App\RelacaoPostCategoria;

class PesquisaController extends Controller
{
    public function pesquisar(Request $request)
    {
      $posts = Posts::where('titulo','like','%'.$request->input('pesquisar').'%')->where('ativo','=',true)->get();
      foreach ($posts as $key => $value) {
        $posts[$key]->categoria = RelacaoPostCategoria::
                                  join('categorias','relacao_post_categoria.categoria_id','=','categorias.id')
                                  ->where('relacao_post_categoria.post_id','=',$posts[$key]->id)
                                  ->first()->categoria;
      }
      return view('pesquisa')->with('posts', $posts);
    }
}
