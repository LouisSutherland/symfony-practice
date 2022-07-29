<?php

namespace App\Controller;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Routing\Annotation\Route;

class Exceptions extends AbstractController
{
    /** @Route("/exceptions", name="exceptions") */
    public function index()
    {
        $users = [];

        if(count($users) <= 0 ){
            // Creates a new 404 error
            throw $this->createNotFoundException('No users');
        }
    }
}