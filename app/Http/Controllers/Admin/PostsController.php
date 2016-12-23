<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categorias;
use App\Posts;
use App\RelacaoPostCategoria;

use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Posts::where('ativo','=',true)->orderBy('titulo','asc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categorias',Categorias::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $mensagens = [
        'imagem.required' => 'Você não colocou a imagem no texto.',
        'imagem.mimes' => 'Somente imagem no formato de jpeg e png.',
      ];

      $this->validate($request,[
        'imagem' => 'required|mimes:jpeg,png',
      ],$mensagens);

      $post = new Posts;
      $post->user_id = Auth::user()->id;
      $post->titulo = $request->input('titulo');
      $post->conteudo = $request->input('conteudo');
      $post->save();

      $request->file('imagem')->move('imagens-post/',$post->id.'.'.$request->file('imagem')->getClientOriginalExtension());
      $post->imagem = 'imagens-post/'.$post->id.'.'.$request->file('imagem')->getClientOriginalExtension();
      $post->save();

      $relacaoPostCategoria = new RelacaoPostCategoria;
      $relacaoPostCategoria->post_id = $post->id;
      $relacaoPostCategoria->categoria_id = $request->input('categoria');
      $relacaoPostCategoria->save();

      return redirect('painel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
