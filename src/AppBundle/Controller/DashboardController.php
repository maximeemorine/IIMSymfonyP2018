<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * @Route("/admin")
 */
class DashboardController extends Controller
{

    /**
     * @Route("/", name="back_index")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
}
