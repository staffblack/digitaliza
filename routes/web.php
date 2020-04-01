<?php
Route::get('/', function () { return redirect('/admin/home'); });
Route::get('estudiantes', 'EstudiantesController@estudiantes')->name('estudiantes');
Route::get('estudiantesNotas', 'EstudiantesController@estudiantesNotas')->name('estudiantesNotas');
Route::get('/caja/excel', 'CajaController@excel')->name('excel');
Route::get('/caja/caja', 'CajaController@caja')->name('caja');
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
	$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	$this->post('register', 'Auth\RegisterController@register');
	$this->post('detalle', 'DetalleController@detalle');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

	Route::get('/reporte/docente', ['uses' => 'ReporteController@docente', 'as' => 'reporte.docente']);
	Route::get('/reporte/estudiante', ['uses' => 'ReporteController@estudiante', 'as' => 'reporte.estudiante']);
	Route::get('/nota/estudiante', ['uses' => 'NotaController@estudiante', 'as' => 'nota.estudiante']);
	Route::get('/getDocentes/{id}', 'ReporteController@getDocentes');
	Route::get('/getMaterias/{id}', 'NotaController@getMaterias');
	Route::get('/getEstudiantes/{id}', 'NotaController@getEstudiantes');
	Route::get('/getCupo/{id}', 'MatriculaController@getCupo');
	Route::get('/getNotas/{id}/materia/{materia}', 'NotaController@getNotas');
	Route::get('buscarnotas/{curso}', ['uses' => 'NotaController@buscarnotas', 'as' => 'nota.buscarnotas']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
	Route::resource('/curso', 'CursoController');
	Route::resource('/matricula', 'MatriculaController');
	Route::resource('/materia', 'MateriaController');
	Route::resource('/nota', 'NotaController');
	Route::resource('/reporte', 'ReporteController');
	Route::resource('/parametro', 'ParametroController');
});

Route::resource('registro', 'RegistroController');
Route::resource('grupo', 'GrupoController');
Route::resource('asignacion', 'AsignacionController');
Route::resource('evaluacion', 'EvaluacionController');
Route::resource('detalle', 'DetalleController');
Route::resource('empresa', 'EmpresaController');
Route::resource('departamento', 'DepartamentoController');
Route::resource('departamento', 'DepartamentoController');
Route::resource('subdepartamento', 'SubdepartamentoController');
Route::resource('dependencia', 'DependenciaController');
Route::resource('caja', 'CajaController');
Route::resource('sucursal', 'SucursalController');
Route::resource('ubicacion', 'UbicacionController');
Route::resource('rack', 'rackController');
Route::resource('cuerpo', 'CuerpoController');