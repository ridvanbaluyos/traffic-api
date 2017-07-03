<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Repositories\Traffic\TrafficRepository as TrafficRepository;
use App\Repositories\Traffic\MMDA\MMDATrafficRepository as MMDA;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTraffic(Request $request)
    {
        $highway = $request->input('highway');
        $segment = $request->input('segment');
        $direction = $request->input('direction');

        $repo = new MMDA();
        $trafficRepo = new TrafficRepository($repo);
        $traffic = $trafficRepo->getTraffic();

        if (!is_null($highway) || !empty($highway)) {
            $traffic = $traffic[$highway];

            if (!is_null($segment) || !empty($segment)) {
                $traffic = $traffic['segments'][$segment];

                if (!is_null($direction) || !empty($direction)) {
                    $traffic = $traffic['status'][$direction];
                }
            }
        }

        $envelope['metadata'] = [
            'url' => $request->fullUrl(),
            'title' => 'Metro Manila Traffic Data',
            'source' => 'http://mmdatraffic.interaksyon.com/livefeed/',
            'version' => '1',
            'generated' => time(),
        ];
        $envelope['traffic'] = $traffic;

        return response()->json($envelope);
    }

    /**
     * This function gets the highways.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHighways()
    {
        $repo = new MMDA();
        $trafficRepo = new TrafficRepository($repo);
        $highways = $trafficRepo->getHighways();

        return response()->json($highways);
    }

    /**
     * This function gets the segments of a highway.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSegments(Request $request)
    {
        $highway = $request->input('highway');

        if (empty($highway) || is_null($highway)) {
            return response()->json(
                [
                    'message' => 'Missing parameter {highway} is required.',
                    'meta' => 'See /highways for more details.'
                ],
                403
            );
        }
        $repo = new MMDA();
        $trafficRepo = new TrafficRepository($repo);
        $segments = $trafficRepo->getSegments($highway);

        return response()->json($segments);
    }
}
