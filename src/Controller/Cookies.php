<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cookies extends AbstractController
{
    /** @Route("/cookies", name="cookies") */
    public function index()
    {

        return new Response('');

    }

    /**
     * @param string $name
     * @param mixed $value
     * @param int $days
     * @return Response
     * @Route("/create-cookie/{name}/{value}/{days}", name="create-cookie")
     */
    public function createCookie(string $name, mixed $value, int $days): Response
    {
        $days = time() + ((60 * 60 * 24) * $days);
        $cookie = new Cookie($name, $value, $days);

        // Or the php... (doesn't seem to work well)
        // setcookie('latest-cookie', 200, time() * 34);

        $response = new Response();
        $response->headers->setCookie($cookie);
        $response->send();

        return $this->redirectToRoute('cookies');
    }

    /** @Route("/clear-cookie/{name}", name="clear-cookie") */
    public function clearCookie($name)
    {
        $response = new Response();
        $response->headers->clearCookie($name);
        $response->send();

        return $this->redirectToRoute('cookies');
    }

    /** @Route("/read-cookie/{name}", name="read-cookie") */
    public function readCookie($name, Request $request)
    {
        if (!$name) {
            throw new \Exception('Could not read cookie');
        } else {
            exit($request->cookies->get($name));
        }
    }

}