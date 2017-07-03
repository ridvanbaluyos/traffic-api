<?php
namespace App\Repositories\Traffic\MMDA;

use App\Repositories\Traffic\TrafficRepositoryInterface;
use Cache;
use Ridvanbaluyos\Mmda\MMDA as MMDA;
use Noodlehaus\Config as Config;

/**
 * MMDA Traffic Data Repository
 * http://mmdatraffic.interaksyon.com/livefeed/
 *
 * @package    Traffic Data
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/mmda-api
 * @license    MIT
 */
class MMDATrafficRepository implements TrafficRepositoryInterface
{
    private $highways;
    private $segments;

    /**
     * Gets the MMDA Traffic Data.
     *
     * @return array|null
     */
    public function getTraffic()
    {
        $trafficRepository = new MMDA();
        $traffic = $trafficRepository->traffic();

        return $traffic;
    }

    public function getHighways()
    {
        $trafficRepository = new MMDA();
        $highways = $trafficRepository->highways();

        return $highways;
    }

    public function getSegments($highway)
    {
        $trafficRepository = new MMDA();
        $segments = $trafficRepository->segments($highway);

        return $segments;
    }
}