<?php
require __DIR__.'/config_with_app.php'; 

$di->set('Flash', function() use ($di) {
	$flash = new \Sial\FlashMessage\CFlashMessage();
	$flash->setDI($di);
	return $flash;
});

$app->router->add('', function() use ($app) {
	$app->Flash->setMessage("success");
	$app->Flash->setMessage("success", "Working like a charm :)");
	$app->Flash->setMessage("notice");
	$app->Flash->setMessage("warning");
	$app->Flash->setMessage("error");
	
	$msg = $app->Flash->getMessage();
	$app->views->add('view/flash', [
		'msg' => $msg
		]);
});

 
$app->router->handle();
$app->theme->render();
