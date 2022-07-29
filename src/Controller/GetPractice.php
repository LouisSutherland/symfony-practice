<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetPractice extends AbstractController
{
    /** @Route("/get-practice", name="get-practice") */
    public function index(Request $req)
    {
        $val = $req->query->get('name');
        $server = $req->server->get('HTTP_HOST');
        $isAjax = $req->isXmlHttpRequest();

        dump($val, $server, $isAjax);

        return $this->render('GetPractice/index.twig');
    }
}