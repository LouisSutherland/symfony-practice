<?php

namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\Result;
use Doctrine\DBAL\Exception;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class UserService
{
    /** @var UserRepository $userRepo */
    protected UserRepository $userRepo;

    protected Connection $connection;

    public function __construct(ManagerRegistry $mr, Connection $connection)
    {
        $this->userRepo = $mr->getRepository(User::class);
        $this->connection = $connection;
    }

    /**
     * @param string $column
     * @param string $value
     * @return false|mixed[]|string
     */
    public function getBy(string $column, string $value): array|bool|string
    {
        try{
            return $this->connection->fetchAssociative('SELECT * FROM user WHERE ' . $column . ' = "' . $value . '";');
        } catch (Exception $e){
            return $e->getMessage();
        }

    }
}