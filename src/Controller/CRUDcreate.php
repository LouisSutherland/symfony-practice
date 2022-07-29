<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;

class CRUDcreate extends AbstractController
{
    /** @Route("/crud-create/{name}", "create") */
    public function index($name)
    {
        $user = new User();
        $user->setName($name);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        if($em->contains($user)){
            $this->addFlash('success', 'User has been created.');
        } else {
            $this->addFlash('danger', 'User could not be created.');
        }

        return $this->render('Create/index.twig', [
            'user' => $user
        ]);
    }

    /** @Route("/all-users", name="all-users") */
    public function viewAllUsers()
    {
        /** @var UserRepository $usersRepo */
        $usersRepo = $this->getDoctrine()->getRepository(User::class);

        return $this->render('Users/index.twig', [
            'users' => $usersRepo->findBy()
        ]);
    }

    /** @Route("/clear-dupes", "clear-dupes") */
    public function clearDupes()
    {
        $em = $this->getDoctrine()->getManager();

        /** @Var UserRepository $usersRepo */
        $usersRepo = $this->getDoctrine()->getRepository(User::class);

        $userNames = [];

        foreach($usersRepo->findAll() as $key => $user){

            if(array_search(strtolower($user->getName()), $userNames)){
                $em->remove($user);
                $em->flush();
            } else {
                array_push($userNames, strtolower($user->getName()));
            }

        }

        return $this->redirectToRoute('all-users');
    }
}