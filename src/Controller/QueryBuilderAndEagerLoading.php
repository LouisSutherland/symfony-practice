<?php

namespace App\Controller;

use App\Entity\User;
//use App\Entity\Video;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;

class QueryBuilderAndEagerLoading extends AbstractController
{
    /** @Route("/query-builder", name="query-builder") */
    public function index()
    {
//        $user = new User();
//        $user->setName('Timothy');
//        $em = $this->getDoctrine()->getManager();
//
//        for($i = 0; $i < 3; $i++){
//            $video = (new Video())
//                ->setTitle('The Movie ' . $i);
//
//            $user->addVideo($video);
//            $em->persist($video);
//        }
//        $em->persist($user);
//        $em->flush();

//        /** @var UserRepository $userRepo */
//        $userRepo = $this->getDoctrine()->getRepository(User::class);
//        $user = $userRepo->findWithVideos(1);
//        dump($user);

        return $this->render('blank.twig');
    }
}