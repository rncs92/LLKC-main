<?php declare(strict_types=1);

namespace LLKC\Repository\User;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use LLKC\Core\Database;
use LLKC\Models\User;

class PDOUserRepository implements UserRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function save(User $user): void
    {
        $queryBuilder = $this->queryBuilder;
        $queryBuilder
            ->insert('users')
            ->values(
                [
                    'username' => '?',
                    'email' => '?',
                    'name' => '?',
                    'surname' => '?',
                    'password' => '?',
                    'address' => '?',
                    'city' => '?',
                    'postal_code' => '?',
                    'phone_number' => '?',
                    'comments' => '?',
                ]
            )
            ->setParameter(0, $user->getUsername())
            ->setParameter(1, $user->getEmail())
            ->setParameter(2, $user->getName())
            ->setParameter(3, $user->getSurname())
            ->setParameter(4, $user->getPassword())
            ->setParameter(5, $user->getAddress())
            ->setParameter(6, $user->getCity())
            ->setParameter(7, $user->getPostalCode())
            ->setParameter(8, $user->getPhoneNumber())
            ->setParameter(9, $user->getComments());

        $queryBuilder->executeQuery();

        $user->setUserid((int)$this->connection->lastInsertId());
    }

    public function byId(int $userId): string
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder
            ->select('*')
            ->from('users')
            ->where('user_id = ?')
            ->setParameter(0, $userId)
            ->fetchAssociative();


        return json_encode($user);
    }

    public function byEmail(string $email): ?User
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder->select('*')
            ->from('users')
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();

        if (!$user) {
            return null;
        }

        return $this->buildModel($user);
    }

    public function byUsername(string $username): ?User
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder->select('*')
            ->from('users')
            ->where('username = ?')
            ->setParameter(0, $username)
            ->fetchAssociative();

        if (!$user) {
            return null;
        }

        return $this->buildModel($user);
    }

    public function authenticate(User $user): bool
    {
        $user = $this->queryBuilder
            ->select('*')
            ->from('users')
            ->where('email = ?')
            ->orWhere('username = ?')
            ->setParameter(0, $user->getEmail())
            ->setParameter(1, $user->getUsername())
            ->executeStatement();

        if ($user > 0) {
            return true;
        }
        return false;
    }

    public function login(string $email, string $password): ?User
    {
        $queryBuilder = $this->queryBuilder;
        $user = $queryBuilder->select('*')
            ->from('users')
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();

        return $this->buildModel($user);
    }

    private function buildModel($user): User
    {
        return new User(
            $user['username'],
            $user['email'],
            $user['name'],
            $user['surname'],
            $user['password'],
            $user['address'],
            $user['city'],
            $user['postal_code'],
            $user['phone_number'],
            $user['comments'],
            (int)$user['user_id']
        );
    }
}
