<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;

class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return ManagerRegistry
     */
    public function getDoctrine()
    {
        return $this->doctrine;
    }
}