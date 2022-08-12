<?php

namespace App\Controller;

use App\Services\DateService;
use App\Services\MyService;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceParameters extends AbstractController
{
    /** @Route("/service-parameters", name="service-parameters") */
    public function index(MyService $ms)
    {
        return $this->render('blank.twig');
    }

    /** @Route("/date-service", name="date-service") */
    public function dateService(DateService $dateCreator)
    {
        $date = $dateCreator->toString($dateCreator->getToday(), true);
        dump($date);

        return $this->render('blank.twig');
    }

    /** @Route("/user-service", name="user-service") */
    public function userService(UserService $users): Response
    {
        $result = $users->getBy('name', 'name-7');
        $data['result'] = $result;

        return $this->render('blank.twig', $data);
    }
}