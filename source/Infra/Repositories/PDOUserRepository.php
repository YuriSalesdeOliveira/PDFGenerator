<?php

namespace Source\Infra\Repositories;

use PDO;
use DateTimeImmutable;
use Source\domain\Entities\User;
use Source\domain\ValueObjects\Name;
use Source\domain\ValueObjects\Email;
use Source\domain\ValueObjects\Identity;
use Source\domain\ValueObjects\Password;
use Source\domain\Repositories\GetUserRepositoryInterface;

class PDOUserRepository implements GetUserRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserById(Identity $id): User
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $statement->execute([':id' => $id]);
        $result = $statement->fetch(PDO::FETCH_OBJ);

        $user = new User(
            Identity::parse($result->id),
            Name::parse($result->name),
            Email::parse($result->email),
            Password::parse($result->password),
            new DateTimeImmutable($result->createdAt),
            new DateTimeImmutable($result->updatedAt),
        );

        return $user;
    }
}