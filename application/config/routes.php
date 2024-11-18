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
$route['default_controller'] = 'Usercontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//admin dashbaord
$route['superadmin'] = 'Admincontroller/superadmin';
$route['admin'] = 'Admincontroller/admin';
$route['agents'] = 'Admincontroller/agents';
$route['become_agent'] = 'Admincontroller/become_agent';
$route['farmers'] = 'Admincontroller/farmers';
$route['service-providers'] = 'Admincontroller/service_providers';
$route['create-agent'] = 'Admincontroller/create_agent';
$route['all-requests'] = 'Admincontroller/all_requests';
$route['create-request'] = 'Admincontroller/create_request';
$route['all-payments'] = 'Admincontroller/payments';
$route['add-farm-type'] = 'Admincontroller/add_farm_type';
$route['farm-type/(:num)'] = 'Admincontroller/farm_type/$1';
$route['update-farm-type'] = 'Admincontroller/update_farm_type';
$route['farm-types'] = 'Admincontroller/farm_types';
$route['add-service-type'] = 'Admincontroller/add_service_type';
$route['service-type/(:num)'] = 'Admincontroller/service_type/$1';
$route['update-service-type'] = 'Admincontroller/update_service_type';
$route['service-types'] = 'Admincontroller/service_types';
$route['all_users'] = 'Admincontroller/all_users';
$route['user/(:num)'] = 'Admincontroller/user/$1';
$route['update_user'] = 'Admincontroller/update_user';
$route['all-service-prices'] = 'Admincontroller/get_all_service_type_price';
$route['set-service-price'] = 'Admincontroller/set_service_type_price';
$route['service-price/(:num)'] = 'Admincontroller/edit_service_type_price/$1';
$route['update-price'] = 'Admincontroller/update_service_type_price';
$route['create-service-provider'] = 'Admincontroller/create_service_provider';
$route['get-service-type'] = 'Admincontroller/get_service_type';
$route['get-service-price'] = 'Admincontroller/get_service_price';
$route['update-set-service-price'] = 'Admincontroller/update_set_service_price';
$route['change-service-type'] = 'Admincontroller/change_service_type';
$route['settings'] = 'Admincontroller/settings';
