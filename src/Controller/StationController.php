<?php

namespace App\Controller;

use App\Entity\Station;
use App\Service\NsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @package App\Controller
 *
 * @Route("/ns/stations")
 */
class StationController extends AbstractController
{
    /**
     * @var NsService
     */
    protected $nsService;

    /**
     * @param NsService $nsService
     */
    public function __construct(NsService $nsService)
    {
        $this->nsService = $nsService;
    }

    /**
     * @Route("/", name="ns_stations")
     */
    public function indexAction()
    {
        $stations = $this->nsService->fetch(NsService::NODE_STATIONS);

        /** @var Station $station */
        foreach ($stations as $station) {
            echo $station->getNameLong() . '<br>';
        }

        exit;
    }
}
