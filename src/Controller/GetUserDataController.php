<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Annotation\Route;

class GetUserDataController extends AbstractController
{
    /** @Route("/get-user-data", name="get-user-date") */
    public function getAllUsers()
    {
        /** @var UserRepository $userRepo */
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $users = $userRepo->findAll();
        $data = [];
        foreach($users as $user){
            $row = ['name' => $user->getName(), 'created' => $user->getDateCreated()->format('d/m/Y H:i:s')];
            array_push($data, $row);
        }

        return $this->json(['users' => $data]);
    }

    /** @Route("/update-date-created", name="update-date-created") */
    public function updateDateCreated(Connection $connection)
    {
        $sql = 'UPDATE user SET date_created = CURRENT_TIMESTAMP WHERE date_created IS NULL;';
        $connection->executeQuery($sql);

        return $this->json(['success']);
    }
}