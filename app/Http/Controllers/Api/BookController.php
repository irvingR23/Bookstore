<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class BookController extends Controller {

  public function __construct() {
    $this->middleware('auth.basic',[
      'only'=>[
        'store','update','destroy'
      ]
    ]);
  }

  public function index() {
      //Devolvera todos los libros
    $books = Book::all();

    //Gennerar una respuesta 200, de encontrado ademas de enviar lo conseguido por json
    return response()->json([
      'status' => 'ok',
      'data' => $books
    ],200);
  }

  // Pasamos como parámetro al método store todas las variables recibidas de tipo Request
  // utilizando inyección de dependencias (nuevo en Laravel 5)
  // Para acceder a Request necesitamos asegurarnos que está cargado use Illuminate\Http\Request;
  public function store(Request $request) {
    if(!$request->input('name') || !$request->input('description') || !$request->input('ISBN') ||
        !$request->input('author') || !$request->input('editorial') || !$request->input('status'))
    {
      // Se devuelve un array errors con los errores encontrados y cabecera HTTP 422
      // Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
      return response()->json([
        'errors' => [
          'code' => 422,
          'message' => 'Faltan datos necesarios para enviar el formulario'
        ]
      ], 422);
    }

    //En caso de que todo sea enviado correctamente, entonces se agrega con todos los datos mencionados
    $book = Book::create($request->all());

    //Creamos nuestro arreglo con todo lo necesario
    // Devolvemos el código HTTP 201 Created – [Creada] Respuesta a un POST que resulta en una creación.
    // Debería ser combinado con un encabezado Location, apuntando a la ubicación del nuevo recurso.
    $response = Response::make(
        json_encode([
            'data' => $book
        ]),201
    )->header('Location:', 'http://localhost:8000/api/books/'.$book->id)
        ->header('Content-Type', 'application/json');

    return $response;
  }


    public function show($id) {
      $book = Book::find($id);

      //Si no existe el libro con esas caracteristicas, que se genere
      //un error 404 y ademas un arreglo con el codigo y un mensaje
      //para que el usuario pueda comprender
      if(!$book){
        return response()->json([
            'errors' => [
              'code' => 404,
              'message' => 'No se ha encontrado el libro que has buscado.'
            ]
        ], 404);
      }

      //Hacemos un return de los datos si lo ha encontrado
      return response()->json([
        'status' => 'ok',
        'data' => $book
      ], 200);
    }


    public function update(Request $request, Book $book)
    {
        //
    }


    public function destroy(Book $book)
    {
        //
    }
}
