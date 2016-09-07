<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Ridvanbaluyos\Mmda\MMDA as MMDA;

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
$app->group('/v1', function() {
    $this->get('/traffic[/{highway}[/{segment}[/{direction}]]]', function ($request, $response, $args) {
        $mmda = new MMDA();
        $traffic = $mmda->traffic();
        $response = false;

        $highway = $args['highway'];
        $segment = $args['segment'];
        $direction = $args['direction'];
    
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
            header("Content-Type: application/json");
            $response = json_encode($response);
            echo $response;
            exit;
        }
    });
});

$app->run();
