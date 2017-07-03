<?php
namespace App\Repositories\Traffic;

use Ridvanbaluyos\Mmda\MMDA as MMDA;

/**
 * Class TrafficRepository
 *
 * @package App\Repositories\Traffic
 */
class TrafficRepository implements TrafficRepositoryInterface
{
    /*
     * Traffic Repository class variable
     */
    private $traffic;

    /**
     * TrafficRepository constructor.
     * @param TrafficRepositoryInterface $repo
     */
    public function __construct(TrafficRepositoryInterface $repo)
    {
        $this->traffic = $repo;
    }

    /**
     * @return mixed
     */
    public function getTraffic()
    {
        return $this->traffic->getTraffic();
    }

    /**
     * @return mixed
     */
    public function getHighways()
    {
        return $this->traffic->getHighways();
    }

    /**
     * @return mixed
     */
    public function getSegments($highway)
    {
        return $this->traffic->getSegments($highway);
    }
}
