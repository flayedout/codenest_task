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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'logincontroller/index';
$route['lists'] = 'listcontroller/index';
$route['lists/test'] = 'listcontroller/test';

//$route['lists/show/(:any)'] = 'listcontroller/show/$1';
$route['lists/update/(:any)'] = 'listcontroller/update/$1';
$route['lists/delete'] = 'listcontroller/deleteList';
$route['list/create'] = 'listcontroller/createList';
$route['mylists'] = 'listcontroller/myLists';
$route['list/create/index'] = 'listcontroller/createListIndex';
$route['list/delete/index'] = 'listcontroller/deleteListIndex';
$route['list/confirm/delete'] = 'listcontroller/confirmDelete';
$route['login'] = 'logincontroller/index';
$route['logout'] = 'logincontroller/logout';
$route['login/attempt'] = 'logincontroller/login';
$route['login/register'] = 'logincontroller/register';
$route['task/create'] = 'taskcontroller/createTask';
$route['task/create/index'] = 'taskcontroller/createTaskIndex';
$route['task/delete/index'] = 'taskcontroller/deleteTaskIndex';
$route['task/delete'] = 'taskcontroller/deleteTask';
$route['tasks/export/(:any)'] = 'taskcontroller/exportToExcelAllTasks/$1';
$route['mytasks'] = 'taskcontroller/mytasks';

$route['ajax/cancel']  = 'ajaxcontroller/cancelByUser';
$route['ajax/update']  = 'ajaxcontroller/updateByAdmin';
$route['ajax/status/done']  = 'ajaxcontroller/updateTaskStatusDone';
$route['ajax/status/undone']  = 'ajaxcontroller/updateTaskStatusNotFinished';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
