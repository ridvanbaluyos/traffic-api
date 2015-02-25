<?php
require_once __DIR__ . '/vendor/autoload.php';
use Ridvanbaluyos\Mmda\MMDA as MMDA;

$app = new \Slim\Slim(
    array(
        'debug' => true,
    )
);

$app->get('/', function () {
    echo "Hello world!";
});

// V1 route group
$app->group('/v1', function () use ($app) {
    $app->get('/traffic(/:highway(/:segment(/:direction)))', function ($highway = null, $segment = null, $direction = null, $json = false) {
        $mmda = new MMDA();
        $traffic = $mmda->traffic();
        $response = false;

        if (!is_null($highway) && !is_null($segment) && !is_null($direction)) {
            $response = $traffic[$highway][$segment][$direction];
        } else if (!is_null($highway) && !is_null($segment)) {
            $response = $traffic[$highway][$segment];
        } else if (!is_null($highway)) {
            $response = $traffic[$highway];
        } else {
            $response = $traffic;
        }

        $response = json_encode($response);
        echo '{"status":"SUCCESS", "code":"200", "response" : ' . $response . '}';
    });
});
$app->run();
