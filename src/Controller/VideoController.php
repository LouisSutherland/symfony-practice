<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Video;
use App\Repository\UserRepository;
use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    /** @Route("/videos", name="videos") */
    public function index(Connection $db)
    {
        $user = new User();
        $user->setName('Carrick');
        $em = $this->getDoctrine()->getManager();

        for($i = 1; $i <= 3; $i++){
            $video = new Video();
            $video->setTitle('The Big Old Movie ' . $i);
            $user->addVideo($video);
            $em->persist($video);
        }

        $em->persist($user);
        $em->flush();



        /** @var UserRepository $userRepo */
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $videos = [];
        foreach($userRepo->findAll() as $user){
            $films = [];
            foreach($user->getVideos() as $video){
                array_push($films, $video->getTitle());
            }

            $videos[$user->getName()] = $films;
        }

        $sql = 'SELECT video.title FROM user JOIN video ON video.user_id = user.id GROUP BY user.id;';
        $usersWithVideos = $db->fetchAllAssociative($sql);
        return $this->json(['videos' => $usersWithVideos]);
    }
}