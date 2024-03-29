<?php

/**
 * Functions definitions
 */

$app->get('/', 'panel');

// Service
$app->get('/services/(:page)', 'getServices')
	->conditions(array('page' => '\d+'));
$app->get('/service/new', 'addService');
$app->post('/service/new', 'addService');
$app->get('/service/edit/:id', 'editService');
$app->put('/service/edit/:id', 'editService');
$app->get('/service/delete/:id', 'deleteService');
$app->delete('/service/delete/:id', 'deleteService');

// Collaborator
$app->get('/collaborators/(:page)', 'getCollaborators')
	->conditions(array('page' => '\d+'));
$app->get('/collaborator/new', 'addCollaborator');
$app->post('/collaborator/new', 'addCollaborator');
$app->get('/collaborator/edit/:id', 'editCollaborator');
$app->put('/collaborator/edit/:id', 'editCollaborator');
$app->get('/collaborator/delete/:id', 'deleteCollaborator');
$app->delete('/collaborator/delete/:id', 'deleteCollaborator');

// Cash
$app->get('/cash/(:page)', 'getCashs')
	->conditions(array('page' => '\d+'));
$app->get('/cash/new', 'addCash');
$app->post('/cash/new', 'addCash');
$app->get('/cash/edit/:id', 'editCash');
$app->put('/cash/edit/:id', 'editCash');
$app->get('/cash/delete/:id', 'deleteCash');
$app->delete('/cash/delete/:id', 'deleteCash');

// $app->group('/admin', function() use ($app) {




	// $app->group('/users', function() use ($app) {
		//Profile
		// $app->get('/profiles/(:page)', 'getProfiles')
		// 	->conditions(array('page' => '\d+'));
		// $app->get('/profile/new', 'addProfile');
		// $app->post('/profile/new', 'addProfile');
		// $app->get('/profile/edit/:id', 'editProfile');
		// $app->put('/profile/edit/:id', 'editProfile');
		// $app->get('/profile/delete/:id', 'deleteProfile');
		// $app->delete('/profile/delete/:id', 'deleteProfile');

		//User
	// 	$app->get('/users/(:page)', 'getUsers')
	// 		->conditions(array('page' => '\d+'));
	// 	$app->get('/user/new', 'addUser');
	// 	$app->post('/user/new', 'addUser');
	// 	$app->get('/user/edit/:id', 'editUser');
	// 	$app->put('/user/edit/:id', 'editUser');
	// 	$app->get('/user/delete/:id', 'deleteUser');
	// 	$app->delete('/user/delete/:id', 'deleteUser');
	// });


	//Providers
	// $app->get('/providers/(:page)', 'getProviders')
	// 	->conditions(array('page' => '\d+'));
	// $app->get('/provider/new', 'addProvider');
	// $app->post('/provider/new', 'addProvider');
	// $app->get('/provider/edit/:id', 'editProvider');
	// $app->put('/provider/edit/:id', 'editProvider');
	// $app->get('/provider/delete/:id', 'deleteProvider');
	// $app->delete('/provider/delete/:id', 'deleteProvider');

	//Group Products
	// $app->group('/products', function() use ($app) {
	// 	// Category
	// 	$app->get('/categories/(:page)', 'getCategories')
	// 		->conditions(array('page' => '\d+'));
	// 	$app->get('/category/new', 'addCategory');
	// 	$app->post('/category/new', 'addCategory');
	// 	$app->get('/category/edit/:id', 'editCategory');
	// 	$app->put('/category/edit/:id', 'editCategory');
	// 	$app->get('/category/delete/:id', 'deleteCategory');
	// 	$app->delete('/category/delete/:id', 'deleteCategory');

		// Products
		// $app->get('/products/(:page)', 'getProducts')
		// 	->conditions(array('page' => '\d+'));
		// $app->get('/product/new', 'addProduct');
		// $app->post('/product/new', 'addProduct');
		// $app->get('/product/edit/:id', 'editProduct');
		// $app->put('/product/edit/:id', 'editProduct');
		// $app->get('/product/delete/:id', 'deleteProduct');
		// $app->delete('/product/delete/:id', 'deleteProduct');
	// });

// });