<?php

class StudentController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /branch
	 *
	 * @return Response
	 */        
	public function index()
	{
		if(Input::has('ref') && Input::get('ref') == 'notify'){
			$n = Notification::unread()->find((int) Input::get('n'));
			$n->read();			
		}

		$students = Student::all();
		return View::make('backend.students.index', compact('students'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /branch/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.students.create');
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
		

		$student = new Student($inputs);
		if ($student->save())
		{
			return Redirect::to('/estudiantes')->with('alert', ['type' => 'success', 'message' => 'El estudiante ha sido guardado.']);;			
		}        
		return Redirect::to('/estudiantes')->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);;

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
		$student = Student::findOrFail($id);
		return View::make('backend.students.show', compact('student'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /branch/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
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
		$student = Student::findOrFail($id);
		$student->fill($inputs);
		if ($student->save())
		{
			return Redirect::to('/estudiantes/' . $id)->with('alert', ['type' => 'success', 'message' => 'Datos guardados.']);			
		}        
        return Redirect::to('/estudiantes/' . $id)->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);
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
		Student::destroy($id);
		return Redirect::to('/estudiantes')->with('alert', ['type' => 'success', 'message' => 'El estudiante ha sido borrado.']);
	}



	public function prestamos()
	{		
		$prestamos = Prestamo::orderBy('id', 'DESC')->get();
		return View::make('backend.prestamos', compact('prestamos'));
	}

	public function prestar()
	{		
		$inputs = Input::all();
		$prestamo = new Prestamo($inputs);
		if ($prestamo->save())
		{	
			$prestamo->book->prestar();
			return Redirect::to('/prestamos')->with('alert', ['type' => 'success', 'message' => 'El prestamo ha sido guardado.']);
		}   
		//dd($prestamo->getErrors());     
		return Redirect::to('/prestamos')->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);;

	}



	public function devolver($id)
	{		
		$prestamo = Prestamo::find($id);
		$prestamo->devolver();
		if(Input::has('p')){
			return Redirect::to('/prestamos')->with('alert', ['type' => 'success', 'message' => 'El libro ha sido devuelto.']);
		}
		return Redirect::to('/estudiantes/'.$prestamo->student_id)->with('alert', ['type' => 'success', 'message' => 'El libro ha sido devuelto.']);
	}
	
    
}