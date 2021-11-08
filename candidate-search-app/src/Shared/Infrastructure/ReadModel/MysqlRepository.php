<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\ReadModel;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\AbstractQuery;

abstract class MysqlRepository
{
    protected EntityRepository $repository;
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->setEntityManager();
    }

    abstract protected function setEntityManager(): void;

    /**
     * @param mixed $model
     */
    public function register($model): void
    {
        $this->entityManager->persist($model);
        $this->apply();
    }

    public function apply(): void
    {
        $this->entityManager->flush();
    }

    /**
     * @return mixed
     *
     * @throws NotFoundException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    protected function oneOrException(QueryBuilder $queryBuilder, int $hydration = AbstractQuery::HYDRATE_OBJECT)
    {
        $model = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult($hydration);

        if (null === $model) {
            throw new NotFoundException();
        }

        return $model;
    }
}
