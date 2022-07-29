<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class GetRequests
{
    /** @Route("/get-requests", name="get-requests") */
    public function getRequests(Request $request)
    {
        // Get request
        $customer = $request->server->get('HTTP_HOST');

        // Post request
        $request->request->get();


        exit($customer);
    }

    /** @R */
}