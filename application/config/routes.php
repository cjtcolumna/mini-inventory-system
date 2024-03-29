<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//DEFAULT
//$route['default_controller'] = 'welcome';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;

$route['dashboard/home'] = 'dashboard/home';
$route['dashboard/login'] = 'dashboard/login';
$route['dashboard/logout'] = 'dashboard/logout';
$route['dashboard/(:any)'] = 'dashboard/login';

$route['users/create'] = 'users/create';
$route['users/list'] = 'users/index';
$route['users/(:any)'] = 'users/index';

$route['customers/create'] = 'customers/create';
$route['customers/list'] = 'customers/index';
$route['customers/(:any)'] = 'customers/index';

$route['units/list'] = 'units/index';
$route['units/(:any)'] = 'units/index';

$route['materials/get_id/(:any)'] = 'materials/get_id/$1';
$route['materials/create'] = 'materials/create';
$route['materials/edit/(:any)'] = 'materials/edit/$1';
$route['materials/list'] = 'materials/index';
$route['materials/(:any)'] = 'materials/index';

$route['sample_method/(:any)/(:any)'] = 'dashboard/sample_method/$1/$2';

$route['default_controller'] = 'dashboard/login';
