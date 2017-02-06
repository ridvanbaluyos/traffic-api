<?php
session_start();
error_reporting(E_ALL);

// Initiate a session
session_start();
require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Ridvanbaluyos\Mmda\MMDA as MMDA;
use \Gregwar\Cache\Cache;

if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();    
} 

$cache = null;
// Set cache class depending on the value of CACHE_DRIVER
if (getenv('CACHE_DRIVER') == 'file' && file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'cache')) {
    $cache = new Cache;
    $cache->setCacheDirectory('cache'); // This is the default
}

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/', function () {
    header("Content-Type: application/json");
    echo '{"status":"SUCCESS", "code":"200", "response":"nothing here! :)"}';
});

$app->get('/test', function () {
    header("Content-Type: application/json");
    echo '{"status":"SUCCESS", "code":"200", "response":"nothing here! :)"}';
});
$app->group('/v1', function() use ($cache) {
    $this->get('/traffic[/{highway}[/{segment}[/{direction}]]]', function ($request, $response, $args) use ($cache) {
        $highway = (isset($args['highway'])) ? $args['highway'] : null;
        $segment = (isset($args['segment'])) ? $args['segment'] : null;
        $direction = (isset($args['direction'])) ? $args['direction'] : null;

        // If CACHE_DRIVER used is 'file' use GregWar/Cache library
        if (getenv('CACHE_DRIVER') && !is_null($cache)) {
            $key = "{$highway}_{$segment}_{$direction}";
            $cachedResponse = $cache->get($key);

            if (unserialize($cachedResponse)) {
                header("Content-Type: application/json");
                $response = json_encode(unserialize($cachedResponse));
                echo $response;
                exit;
            }
        }   
        
        $mmda = new MMDA();
        $traffic = $mmda->traffic();
        $response = false;
    
        if (!is_null($highway) && !is_null($segment) && !is_null($direction)) {
            if (isset($traffic[$highway][$segment][$direction])) {
                $response[$direction] = $traffic[$highway][$segment][$direction];
            }
        } else if (!is_null($highway) && !is_null($segment)) {
            if (isset($traffic[$highway][$segment])) {
                $response = $traffic[$highway][$segment];
            }
        } else if (!is_null($highway)) {
            if (isset($traffic[$highway])) {
                $response = $traffic[$highway];
            }
        } else {
            if (isset($traffic)) {
                $response = $traffic;
            }
        }

        if (!$response) {
            header("Content-Type: application/json");
            echo json_encode(array("status"=>"NOT_ACCEPTABLE", "code"=>"406"));
            exit;
        } else {
            // If CACHE_DRIVER used is 'file' use GregWar/Cache library
            if (getenv('CACHE_DRIVER') && !is_null($cache)) {
				      $time = time();
				      $diff = 0;
				
              if(isset($_SESSION["cached_time"])){
                $diff = $time - $_SESSION["cached_time"];
              }
				
				      if(!isset($_SESSION["cached_time"]) || $diff > (15 * 60)){
                $key = "{$highway}_{$segment}_{$direction}";
					      $cache->getOrCreate($key, [], function() use ($response) {
						  return serialize($response);
					  });
					
					  $_SESSION["cached_time"] = $time;
            header("Content-Type: application/json");
            $response = json_encode($response);
            echo $response;
            exit;
        }
    });
});

$app->run();
