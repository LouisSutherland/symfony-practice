<?php

namespace App\Controller;



use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;

class CRUDdelete extends AbstractController
{
    /** @Route("/delete", name="delete") */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var UserRepository $userRepo */
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepo->findAll()[array_rand($userRepo->findAll())];
        $em->remove($user);

        if(!$em->contains($user)){
            dd('USER DELETED');
        } else {
            dd('USER NOT DELETED');
        }
    }
}