<?php
require 'vendor/autoload.php';
require 'mmda.php';

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
	$app->get('/traffic(/:highway(/:segment(/:direction)))', function ($highway = null, $segment = null, $direction = null) {
		$trafficData = fetchTrafficData();
        $traffic = parseTrafficData($trafficData);

        if (!is_null($highway) && !is_null($segment) && !is_null($direction)) {
            return $traffic[$highway][$segment][$direction];
        } else if (!is_null($highway) && !is_null($segment)) {
            return $traffic[$highway][$segment];
        } else if (!is_null($highway)) {
            return $traffic[$highway];
        } else {
            return $traffic;
        }
	});
});
$app->run();
