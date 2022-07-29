<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigPracticeController extends AbstractController
{

    /**
     * @return Response
     * @Route("/twig-practice", name="twig-practice")
     */
    public function index()
    {
        /** @Var UserRepository $userRepo */
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $em = $this->getDoctrine()->getManager();

        $data = [
            'table' => [
                'headers' =>  $em->getClassMetadata(User::class)->getFieldNames(),
                'data' => $userRepo->findAll()
            ]
        ];

        return $this->render('TwigPractice/index.twig', $data);
    }
}