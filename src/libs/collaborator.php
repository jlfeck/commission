<?php
use \Slim\Slim as Slim;

function getCollaborators($page = 1) {
	$app = Slim::getInstance();

	$paginator = Util::paginator("Collaborator", 5, $page);

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

	$app->render('collaborator/collaborators.twig', array('collaborators' => $paginator['entities'],
													 	  'pages' => $paginator['pages'],
													 	  'route' => '/collaborators/',
														  'collaborator_active' => true,
													 	  'page' => $page,
													 	  'error' => $error));
}

function addCollaborator() {
	$app = Slim::getInstance();

	if ($app->request->isPost()) {

		$collaboratorController = new CollaboratorController();
		$return = $collaboratorController->newCollaborator($app->request->post());

		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

	$app->render('collaborator/collaborator_new.twig', array('collaborator_active' => true,
													 	     'error' => $error));

}

function editCollaborator($id) {
	$app = Slim::getInstance();

	$collaboratorController = new CollaboratorController();
	$collaborator = $collaboratorController->findByCollaboratorId($id);

	if ($app->request->isPut()) {

		$return = $collaboratorController->editCollaborator($app->request->post());
		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';
	$app->render('collaborator/collaborator_edit.twig', array('collaborator' => $collaborator,
															  'collaborator_active' => true,
												 	     	  'error' => $error));

}

function deleteCollaborator($id) {
	$app = Slim::getInstance();

	if ($app->request->isDelete()) {

		$collaboratorController = new CollaboratorController();
		$return = $collaboratorController->deleteCollaborator($id);

		$app->flash('error', $return['msg']);
		$app->redirect($return['route']);

	}

	$flash = $app->view()->getData('flash');
	$error = isset($flash['error']) ? $flash['error'] : '';

}
