<?php
use \Slim\Slim as Slim;

function panel() {
	$app = Slim::getInstance();
	$app->render('panel.twig', array());
}