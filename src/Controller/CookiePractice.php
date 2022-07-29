<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CookiePractice extends AbstractController
{
    /** @Route("/cookie-practice-second", "cookie-practice-second") */
    public function index()
    {
        $cookie = new Cookie(
            'my-cook',
            '22',
            time() + (60 * 60 * 24)
        );

        $response = new Response();
        $response->headers->setCookie($cookie);
        $response->send();

        return $this->redirectToRoute('cookie-created');
    }

    /**
     * @return Response
     * @Route("/cookie-created", name="cookie-created")
     */
    public function cookieCreated(Request $req): Response
    {

        return $this->render('CookiePractice/index.twig');
    }
}