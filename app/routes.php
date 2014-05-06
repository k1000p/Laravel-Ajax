<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', function()
{

	return View::make('login');

});


Route::group(array('before' => 'auth'), function()
{
		Route::get('admin', function()
		{
			if(Auth::check()){
		    	return View::make('admin');
		    }
			return View::make('login');
		});


		Route::get('logout', function()
		{
		    Auth::logout();
		    return Redirect::to('login');
		});



});

Route::post('ajax', function()
		{
		    //comprobamos si es una petición ajax
			if(Request::ajax()){
				//validamos el formulario

				$rules = array(
				'username'=> 'required|min:3|max:100',
				'password'=> 'required|min:3|max:100'
				);

				$messages = array(
				'required'=> 'El campo :attribute es obligatorio.',
				'min'=> 'El campo :attribute no puede tener menos de :min carácteres.',
				 'max'=> 'El campo :attribute no puede tener más de :min carácteres.'
				);

				   sleep(1);// retardo de tiempo

				$validation = Validator::make(Input::all(), $rules, $messages);
				//si la validación falla redirigimos al formulario de login con los errores
				if ($validation->fails())
				{
				//como ha fallado el formulario, devolvemos los datos en formato json
				   return Response::json(array(
					   'success' => false,
					   'errors' => $validation->getMessageBag()->toArray()
				    ));

				}
				else{

				   $credentials = array(
					   'username' => Input::get('username'),
					   'password' => Input::get('password')
				    );

				     //check remember me

				    if(Auth::attempt($credentials, Input::get('remember', 0))){
				    	return Response::json(array(
						    'success'         =>     true,
						    'message'         =>     'Te has logeado correctamente pero no se por que no funciona mierda'
					    ));

					}
				    else{
				        $msg = array("El nombre de usuario o password no son correctos");
				        return Response::json(array(
					        'success' => false,
					        'errors' => $msg
				        ));

				    }

				}
			}

		});

