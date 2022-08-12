<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OneToOneRelationships extends AbstractController
{
    /** @Route("/onetoone", name="one-to-one") */
    public function index()
    {
        ($address = new Address())
            ->setStreet('Ten street')
            ->setNumber(10);

        ($user = new User())
            ->setName('Bobby')
            ->setAddress($address);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        dump($user->getAddress()->getStreet());

        return new Response();

    }
}