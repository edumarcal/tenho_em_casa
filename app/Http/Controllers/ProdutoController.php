<?php
# Agradeço a Deus pelo dom do conhecimento
namespace App\Http\Controllers;

use App\Produto;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return response()->json([
            'produtos' => $produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProdutoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $produto = new Produto([$request->only('nome', 'validade', 'quantidade')]);
        $produto->save();
        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'produto' => $produto
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json([
            'produto' => $produto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProdutoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->only('nome', 'validade', 'quantidade'));
        return Response::json([
            'produto' => $produto
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id)->first();
        $produto->delete();
        return Response::json([
            'produto' => $produto
        ], Response::HTTP_OK);

    }
}
