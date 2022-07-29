<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class Sessions
{
    /** @Route("/start-session/{name}/{value}", name="start-session") */
    public function startSession($name, $value, SessionInterface $session)
    {
        if(!$name || !$value){
            throw new \Exception('Please enter name and value!');
        } else {
            $session->set($name, $value);
        }
    }

    /** @Route("/read-session/{name}", name="read-session") */
    public function readSession($name, SessionInterface $session){
        if($name) {
            exit($session->getId());
        } else {
            exit('No name provided');
        }

    }

    /** @Route("/clear-session/{name}", name="clear-session") */
    public function clearSession($name, SessionInterface $session)
    {
        if($name){
            $session->clear();
        }
    }
}