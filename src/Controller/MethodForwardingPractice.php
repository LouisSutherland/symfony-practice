<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class MethodForwardingPractice extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("forwarding-practice", name="forwarding-practice")
     */
    public function index()
    {
        $response = $this->forward(
            'App\Controller\MethodForwardingPractice::forwarded'
        );

        return $response;
    }

    public function forwarded()
    {
        dump('Forward successful!');

        return $this->render('base.html.twig');
    }
}