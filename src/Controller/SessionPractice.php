<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SessionPractice extends AbstractController
{
    /** @Route("/session-practice-second", "session-practice-second") */
    public function sessionPractice(SessionInterface $sess)
    {
        $sess->set('name', 'my-sesh');

        return $this->render('SessionPractice/index.twig');
    }

    /**
     * @param Request $req
     * @Route("/read-session-second", name="read-session-second")
     */
    public static function readSession(SessionInterface $sesh)
    {
        dd($sesh->get('name'));
    }
}