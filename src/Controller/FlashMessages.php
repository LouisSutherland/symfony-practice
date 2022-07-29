<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class FlashMessages extends AbstractController
{
    /** @Route("/flash-messages", name="flash-messages") */
    public function index()
    {
        return $this->render('FlashMessages/index.twig');
    }

    /** @Route("/create-message/{message}", name="create-message") */
    public function createMessage($message)
    {
        $message = explode(',', $message);
        $message = implode(' ', $message);
        $this->addFlash('success', $message);
        $this->addFlash('warning', $message);

        return $this->redirectToRoute('flash-messages');
    }

}