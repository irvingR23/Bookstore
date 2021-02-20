<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookCategoryController extends Controller {

  public function __construct() {
    $this->middleware('auth.basic',[
      'only'=>[
        'store','update','destroy'
      ]
    ]);
  }

  public function index($bookId) {
    $book = Book::find($bookId);

    if(!$book){
      return response()->json([
          'errors' => [
            'message' => 'No se ha encontrado el libro que has buscado'
          ]
      ], 404);
    }

    return response()->json([
      'status' => 'ok',
      'data' => $book->category()->get()
    ], 200);
  }


  public function store(Request $request) {

  }


  public function show($bookId, $categoryId) {
    return "Se muestra el libro $bookId de la categoria $categoryId";
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
