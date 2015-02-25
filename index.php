<?php
require_once __DIR__ . '/vendor/autoload.php';
use Ridvanbaluyos\Mmda\MMDA as MMDA;

$app = new \Slim\Slim(
    array(
        'debug' => false,
    )
);

$app->get('/', function () {
    echo '{"status":"SUCCESS", "code":"200", "response":"nothing here! :)"}';
});

// V1 route group
$app->group('/v1', function () use ($app) {
    $app->get('/traffic(/:highway(/:segment(/:direction)))', function ($highway = null, $segment = null, $direction = null, $json = false) {
        $mmda = new MMDA();
        $traffic = $mmda->traffic();
        $response = false;

        if (!is_null($highway) && !is_null($segment) && !is_null($direction)) {
            if (isset($traffic[$highway][$segment][$direction])) {
                $response = $traffic[$highway][$segment][$direction];
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

        // Response
        if (!$response) {
            echo '{"status":"NOT_ACCEPTABLE", "code":"406"}';
        } else {
            $response = json_encode($response);
            echo '{"status":"SUCCESS", "code":"200", "response" : ' . $response . '}';
        }
    });
});
$app->run();
