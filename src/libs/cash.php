<?php
use \Slim\Slim as Slim;

function getCashs($page = 1) {
	$app = Slim::getInstance();

	$paginator = Util::paginator("Cash", 5, $page);

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

	$app->render('cash/cash.twig', array('cash_list' => $paginator['entities'],
									 	  'pages' => $paginator['pages'],
									 	  'route' => '/cash/',
										  'cash_active' => true,
									 	  'page' => $page,
									 	  'error' => $error));
}

function addCash() {
	$app = Slim::getInstance();

	if ($app->request->isPost()) {

		$cashController = new CashController();
		$return = $cashController->newCash($app->request->post());

		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

	$app->render('cash/cash_new.twig', array('cash_active' => true,
									 	     'error' => $error));

}

function editCash($id) {
	$app = Slim::getInstance();

	$cashController = new CashController();
	$cash = $cashController->findByCashId($id);

	if ($app->request->isPut()) {

		$return = $cashController->editCash($app->request->post());
		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';
	$app->render('cash/cash_edit.twig', array('cash' => $cash,
											  'cash_active' => true,
								 	     	  'error' => $error));

}

function deleteCash($id) {
	$app = Slim::getInstance();

	if ($app->request->isDelete()) {

		$cashController = new CashController();
		$return = $cashController->deleteCash($id);

		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

}
