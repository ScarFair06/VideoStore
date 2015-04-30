<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'vendor/autoload.php';
require 'model/video.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */
$view = $app->view();
$view->setTemplatesDirectory('view');

// GET route
$app->get('/', function () use ($app) {
  $app->render('/index.html');
});

$app->get('/index', function () use ($app) {
  $app->render('/index_admin.html');
});

$app->get('/user', function () use ($app) {
  $app->render('/user.html');
});

$app->get('/connexion', function () use ($app) {
     $app->render('connexion.html');
   });

$app->post('/connexion', function () use ($app) {
      User::connexion($_POST['pseudo'], $_POST['password']);
     $app->render('connexion.html');
     
   });

$app->get('/inscription', function () use ($app) {
     $app->render('inscription.html');
   });

$app->post('/inscription', function () use ($app) {
     $app->render('inscription.html');
     
   });


/*$app->get('/video', function () use ($app) {
     $app->render('video.html');
     
   });*/

$app->get('/videotech', function () use ($app) {
    $tabVideo = Video::displayVideo();
    json_encode($tabVideo);
    ?>
    <?php
     $app->render('videotech.html');
     
   });

$app->get('/video', function () use ($app) {
	if(isset($_GET['id'])){
     $videoSearch = Video::searchVideo($_GET['id']);}
     $app->render('video.html');
   });

$app->post('/video', function () use ($app) {
   
     $app->render('video.html');
	});
$app->get('/video', function () use ($app) {
     $app->render('video.html');
   });

$app->get('/administration', function () use ($app) {
     $app->render('administration.php');
   });
   
$app->get('/deconnexion', function () use ($app) {
     $app->render('deconnexion.php');
   });
   
$app->get('/gestionvideo', function () use ($app) {
     $app->render('gestionvideo.php');
   });



/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
?>