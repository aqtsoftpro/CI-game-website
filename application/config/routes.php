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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// simple routes
$route['login'] = 'login/index/$1';
$route['search'] = 'search/index/$1';
$route['members'] = 'members/index/$1';
$route['myprofile'] = 'myprofile/index/$1';
$route['dashboard'] = 'dashboard/index/$1';
$route['favrote/loadGames']='home/loadFavGames';
$route['favrote/makeFavorite']= 'game/makeFavorite';

// Frontend routes
$route['tags'] = 'tags/index/$1';
$route['keyword/(:any)']='keyword/index/$1';
$route['page/(:any)'] = 'page/index/$1';
$route['pages/header_image']='header_image';
$route['user/(:any)'] = 'user/index/$1';
$route['category/(:any)'] = 'category/index/$1';
$route['category/(:any)/(:num)'] = 'category/index/$1//$2';
$route['category/(:any)/(:any)'] = 'category/index/$1/$2';
$route['category/(:any)/(:any)/(:any)'] = 'category/index/$1/$2/$3';
$route['game/(:any)']="game/play/$1";
$route['played_games']="game/getPlayedGames";
$rout['game/likesComs/(:any)']='game/likesComs/$1';
$route['user/played_games'] = 'user/played_games/$1';
$route['checkfavorite'] = 'game/checkfavorite';


$route['(:num)'] = 'home/index//$1';
$route['(:any)'] = 'home/index/$1';
$route['(:any)/(:num)'] = 'home/index/$1/$2';
$route['langswitch/switchlang/(:any)'] = 'langswitch/switchlang/$1';
$route['(:any)/langswitch/switchlang/(:any)'] = 'langswitch/switchlang/$2';

// Dashboard routes
$route['dashboard/gamecontrol/del_control/(:num)']='GameControl/del_control/$1';
$route['dashboard/gamecontrol/update_control/(:any)']='GameControl/update_control/$1';
$route['dashboard/gamecontrol/edit/(:num)']='GameControl/edit/$1';
$route['dashboard/gamecontrol/add']='GameControl/add';
$route['dashboard/gamecontrol']='GameControl/index';
$route['dashboard/(:any)'] = '$1';
$route['dashboard/(:any)/(:any)'] = '$1/$2';
$route['dashboard/(:any)/(:any)/(:any)'] = '$1/$2/$3';
