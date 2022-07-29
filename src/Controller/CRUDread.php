<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;

class CRUDread extends AbstractController
{
    /** @Route("/crud-update/{id}", name="update") */
    public function index($id)
    {
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepo->find($id);

        $user = ($user instanceof User) ? $user->getName() : throw $this->createNotFoundException();

        return $this->render('Update/index.twig ', ['user' => $user]);
    }

}