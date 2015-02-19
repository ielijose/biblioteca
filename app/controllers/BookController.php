<?php

class BookController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /branch
	 *
	 * @return Response
	 */        
	public function index()
	{
		$books = Book::all();

		return View::make('backend.books.index', compact('books'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /branch/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.books.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /branch
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();
		//$inputs['template_id'] = 1;
		

		$book = new Book($inputs);
		if ($book->save())
		{
			return Redirect::to('/libros')->with('alert', ['type' => 'success', 'message' => 'El libro ha sido guardado.']);;			
		}        
		return Redirect::to('/libros')->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);;

	}

	/**
	 * Display the specified resource.
	 * GET /branch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::findOrFail($id);
		return View::make('backend.books.show', compact('book'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /branch/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$property = Property::findOrFail($id);
		return View::make('backend.landings.edit', compact('property'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /branch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = Input::all();
		$book = Book::findOrFail($id);
		$book->fill($inputs);
		if ($book->save())
		{
			return Redirect::to('/libros/' . $id)->with('alert', ['type' => 'success', 'message' => 'Datos guardados.']);			
		}        
        return Redirect::to('/libros/' . $id)->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /branch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Book::destroy($id);
		return Redirect::to('/libros')->with('alert', ['type' => 'success', 'message' => 'El libro ha sido borrado.']);
	}

}