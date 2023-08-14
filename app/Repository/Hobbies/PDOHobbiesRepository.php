<?php declare(strict_types=1);

namespace SokTechnical\Repository\Hobbies;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use SokTechnical\Core\Database;
use SokTechnical\Models\Hobbies;

class PDOHobbiesRepository implements HobbiesRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }

    public function save(Hobbies $hobbies): void
    {
        $queryBuilder = $this->queryBuilder;
        $queryBuilder
            ->insert('hobbies')
            ->values(
                [
                    'date_from' => '?',
                    'date_to' => '?',
                    'gender' => '?',
                    'age' => '?',
                    'employment' => '?',
                    'hobbies' => '?',
                ]
            )
            ->setParameter(0, $hobbies->getDateFrom())
            ->setParameter(1, $hobbies->getDateTo())
            ->setParameter(2, $hobbies->getGender())
            ->setParameter(3, $hobbies->getAge())
            ->setParameter(4, $hobbies->getEmployment())
            ->setParameter(5, $hobbies->getHobbies());

        $queryBuilder->executeQuery();

        $hobbies->setUserid((int)$this->connection->lastInsertId());
    }

    private function buildModel($user): Hobbies
    {
        return new Hobbies(
            $user['date_from'],
            $user['date_to'],
            $user['gender'],
            $user['age'],
            $user['employment'],
            $user['hobbies'],
            (int)$user['user_id']
        );
    }

}