<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ManyToManySelfReferencingRelationship extends AbstractController
{
    /**
     * @return Response
     * @Route("/many-to-many", name="many-to-many")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

//        for($i = 1; $i <= 4; $i++){
//            ($user = new User())
//                ->setName('Trevor-' . $i);
//            $em->persist($user);
//        }
//
//        $em->flush();
//        dump($user->getId());

        /** @var UserRepository $userRepo */
        $userRepo = $em->getRepository(User::class);

        $user1 = $userRepo->find(1);
        $user2 = $userRepo->find(2);
        $user3 = $userRepo->find(3);
        $user4 = $userRepo->find(4);

        $user1->addFollowed($user2);
        $user1->addFollowed($user3);
        $user1->addFollowed($user4);

        $em->flush();

        dump($userRepo->getAllSorted());
        dump($user1->getFollowed()->count());

        return $this->render('blank.twig');
    }
}