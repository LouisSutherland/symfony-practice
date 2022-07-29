<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MethodForwarding extends AbstractController
{
    /**
     * @return Response
     * @Route("/method-forwarding", name="method-forwarding")
     */
    public function forwardFrom(): Response
    {
        return $this->forward(
            'App\Controller\MethodForwarding::forwardTo'
        );
    }

    public function forwardTo()
    {
        return exit('Method was forwarded');
    }
}