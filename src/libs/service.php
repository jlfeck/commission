<?php
use \Slim\Slim as Slim;

function getServices($page = 1) {
	$app = Slim::getInstance();

	$paginator = Util::paginator("Service", 5, $page);
	
	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

	$app->render('service/services.twig', array('services' => $paginator['entities'],
									 	  		  'pages' => $paginator['pages'],
									 	  		  'route' => '/admin/services/',
										  		  'service_active' => true,
									 	  		  'page' => $page,
									 	  		  'error' => $error));
}

function addService() {
	$app = Slim::getInstance();

	if ($app->request->isPost()) {

		$serviceController = new ServiceController();
		$return = $serviceController->newService($app->request->post());
		
		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

	$app->render('service/service_new.twig', array('service_active' => true,
									 	     		 'error' => $error));

}

function editService($id) {
	$app = Slim::getInstance();
	
	$serviceController = new ServiceController();
	$service = $serviceController->findByServiceId($id);

	if ($app->request->isPut()) {
		$return = $serviceController->editService($app->request->post());
		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);
	}
	
	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';
	$app->render('service/service_edit.twig', array('service' => $service,
										 			  'service_active' => true,
								 	     			  'error' => $error));

}

function deleteService($id) {
	$app = Slim::getInstance();

	if ($app->request->isDelete()) {

		$serviceController = new ServiceController();
		$return = $serviceController->deleteService($id);

		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';
	
}