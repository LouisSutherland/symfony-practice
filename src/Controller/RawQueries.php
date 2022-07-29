<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Annotation\Route;

class RawQueries extends AbstractController
{
    /** @Route("/raw-queries", name="raw-queries") */
    public function index(Connection $connection)
    {
        $sql = 'SELECT * FROM user WHERE id > 10';

        $users = $connection->fetchAllAssociative($sql);

        dd($users);

        return '';
    }
}