<?php

namespace App\Controller;

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
     * @Route("/", name="ns_stations")
     */
    public function indexAction()
    {

    }
}
