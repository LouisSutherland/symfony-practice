<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineLifecycleCallbacks extends AbstractController
{
    /** @Route("/doctrine-lifecycle-callbacks", name="doctrine-lifecycle-callbacks") */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName('djsjif');
        $em->persist($user);
        $em->flush();

        return $this->render('DoctrineLifecycleCallbacks/index.twig');


    }
}