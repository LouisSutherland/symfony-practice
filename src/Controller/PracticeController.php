<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PracticeController extends AbstractController
{
    // Create cookie
    /**
     * @return Response
     * @Route("/cookie-practice", name="cookie-practice")
     */
    public function createCookie()
    {
        $days = time() + (60 * 60 * 24 * 2);
        $cookie = new Cookie('shopOffer', 22, $days);

        $response = new Response('<h1>Cookie created!</h1>');
        $response->headers->setCookie($cookie);

        return $response;
    }

    // Read cookie
    /**
     * @param Request $request
     * @param $name
     * @Route("/read-cookie-practice/{name}", name="read-cookie-practice")
     */
    public function readCookie(Request $request, $name)
    {
        $cookie = $request->cookies->get($name);

        if($cookie){
            return exit($cookie);
        } else {
            return exit('Could not get cookie!');
        }

    }

    // Create session
    /**
     * @param SessionInterface $session
     * @return Response
     * @Route("/session-practice/{sessionName}", name="session-practice")
     */
    public function startSession(SessionInterface $session, $sessionName): Response
    {
        $session->set($sessionName, 'sessionValue');
        return new Response("<h1>Sessions started</h1>");
    }

    // Get session name
    /**
     * @param SessionInterface $session
     * @Route("/get-session-practice/{sessionName}", name="get-session")
     */
    public function getSessionId(SessionInterface $session, $sessionName): void
    {
        $session->set($sessionName, 'sessionValue');

        if($session->get('name')){
            dd($session->get('name'));
        } else {
            dd('NO');
        }
    }

    // Remove sessions
    /**
     * @param SessionInterface $session
     * @param $sessionName
     * @Route("/remove-session-practice/{sessionName}", name="remove-session-practice")
     */
    public function removeSession(SessionInterface $session, $sessionName)
    {
        if($sessionName && $session->get('name')){
            $session->remove($sessionName);
            dd('Session removed');
        } else {
            dd('Session not found or session name not provided.');
        }
    }

    // Clear all sessions
    /**
     * @param SessionInterface $session
     * @return Response
     * @Route("/clear-all-sessions", name="clear-sessions")
     */
    public function clearAllSessions(SessionInterface $session): Response
    {
        $session->clear();
        return new Response();
    }

    // Get request
    /**
     * @param Request $request
     * @Route("/get-request-practice", name="get-requests")
     */
    public function getRequest(Request $request)
    {
        $value = $request->query->get('name', 'No name');
        if($value){
            dd($value);
        } else {
            dd('No value');
        }
    }

    // Check if request is ajax
    /**
     * @param Request $request
     * @return \never|void
     * @Route("/is-ajax", name="is-ajax")
     */
    public function isRequestAjax(Request $request)
    {
        return dd($request->isXmlHttpRequest());
    }
}