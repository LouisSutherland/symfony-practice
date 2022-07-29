<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Video;
use App\Repository\UserRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DBcascadeRemove extends AbstractController
{
    /** @Route("/cascade-remove", name="cascade-remove") */
    public function index()
    {
//        /** @var UserRepository $userRepo */
//        $userRepo = $this->getDoctrine()->getRepository(User::class);
//        $user = $userRepo->findOneBy(['name' => 'Robert']);
//
//        $em = $this->getDoctrine()->getManager();
//        $em->remove($user);
//        $em->flush();

        /** @var VideoRepository $videoRepo */
        $videoRepo = $this->getDoctrine()->getRepository(Video::class);
        $video = $videoRepo->find(1);

        $em = $this->getDoctrine()->getManager();
        $em->remove($video);
        $em->flush();

        foreach($videoRepo->findAll() as $video){
            dump($video->getTitle());
        }

        return new Response();
    }
}