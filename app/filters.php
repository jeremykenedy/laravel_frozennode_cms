<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	$uri = explode('/',$_SERVER['REQUEST_URI']);
	$node = array_pop($uri);
	if (!$node){
		$node = 'home';
	}
	View::share('location', $node);

	if (Auth::check()) {
		View::share('current_user', Auth::User());
	}

	// Share the current page with all views
	// View::share('page',Page::getCurrentPage());
	View::share('company','DEFAULT COMPANY');

	//  Share the current URL with all views
	View::share('url',URL::to('/'));	

});

App::after(function($request, $response)
{

	// HTML Minification
	if(App::Environment() != 'local') {
		if($response instanceof Illuminate\Http\Response) {
			$output = $response->getOriginalContent();
			// Clean comments
			//$output = preg_replace('/<!--([^\[|(<!)].*)/', '', $output);
			$output = preg_replace('/(?<!\S)\/\/\s*[^\r\n]*/', '', $output);
			// Clean Whitespace
			$output = preg_replace('/\s{2,}/', '', $output);
			$output = preg_replace('/(\r?\n)/', '', $output);
			$response->setContent($output);
		}
	}
});



/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

//validate_admin filter
Route::filter('validate_admin', function ()
{
	$configFactory = App::make('admin_config_factory');

	//get the admin check closure that should be supplied in the config
	$permission = Config::get('administrator::administrator.permission');
	$response = $permission();

	//if this is a simple false value, send the user to the login redirect
	if (!$response)
	{
		$loginUrl = URL::to(Config::get('administrator::administrator.login_path', 'user/login'));
		$redirectKey = Config::get('administrator::administrator.login_redirect_key', 'redirect');
		$redirectUri = Request::url();

		return Redirect::guest($loginUrl)->with($redirectKey, $redirectUri);
	}
	//otherwise if this is a response, return that
	else if (is_a($response, 'Illuminate\Http\JsonResponse') || is_a($response, 'Illuminate\Http\Response'))
	{
		return $response;
	}
	//if it's a redirect, send it back with the redirect uri
	else if (is_a($response, 'Illuminate\\Http\\RedirectResponse'))
	{
		return $response->with($redirectKey, $redirectUri);
	}
});

//validate_model filter
Route::filter('validate_model', function($route, $request)
{
	$modelName = App::make('administrator.4.1') ? $route->parameter('model') : $route->getParameter('model');

	App::singleton('itemconfig', function($app) use ($modelName)
	{
		$configFactory = App::make('admin_config_factory');
		return $configFactory->make($modelName, true);
	});
});

//validate_settings filter
Route::filter('validate_settings', function($route, $request)
{
	$settingsName = App::make('administrator.4.1') ? $route->parameter('settings') : $route->getParameter('settings');

	App::singleton('itemconfig', function($app) use ($settingsName)
	{
		$configFactory = App::make('admin_config_factory');
		return $configFactory->make($configFactory->getSettingsPrefix() . $settingsName, true);
	});
});

Route::filter('post_validate', function($route, $request)
{
	$config = App::make('itemconfig');

	//if the model doesn't exist at all, redirect to 404
	if (!$config)
	{
		App::abort(404, 'Page not found');
	}

	//check the permission
	$p = $config->getOption('permission');

	//if the user is simply not allowed permission to this model, redirect them to the dashboard
	if (!$p)
	{
		return Redirect::to(URL::route('admin_dashboard'));
	}

	//get the settings data if it's a settings page
	if ($config->getType() === 'settings')
	{
		$config->fetchData(App::make('admin_field_factory')->getEditFields());
	}

	//otherwise if this is a response, return that
	if (is_a($p, 'Illuminate\Http\JsonResponse') || is_a($p, 'Illuminate\Http\Response') || is_a($p, 'Illuminate\\Http\\RedirectResponse'))
	{
		return $p;
	}
});

