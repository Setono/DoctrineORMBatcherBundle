<?php

declare(strict_types=1);

namespace Tests\Setono\DoctrineORMBatcherBundle\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Setono\DoctrineORMBatcher\Factory\BatcherFactory;
use Setono\DoctrineORMBatcher\Factory\BatcherFactoryInterface;
use Setono\DoctrineORMBatcher\Query\QueryRebuilder;
use Setono\DoctrineORMBatcher\Query\QueryRebuilderInterface;
use Setono\DoctrineORMBatcherBundle\DependencyInjection\SetonoDoctrineORMBatcherExtension;

final class SetonoDoctrineORMBatcherExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions(): array
    {
        return [new SetonoDoctrineORMBatcherExtension()];
    }

    /**
     * @test
     */
    public function after_loading_the_services_exist(): void
    {
        $this->load();

        $this->assertContainerBuilderHasService('setono_doctrine_orm_batcher.factory.batcher', BatcherFactory::class);
        $this->assertContainerBuilderHasService('setono_doctrine_orm_batcher.query.rebuilder', QueryRebuilder::class);
    }

    /**
     * @test
     */
    public function after_loading_the_aliases_exist(): void
    {
        $this->load();

        $this->assertContainerBuilderHasAlias(BatcherFactoryInterface::class, 'setono_doctrine_orm_batcher.factory.batcher');
        $this->assertContainerBuilderHasAlias(QueryRebuilderInterface::class, 'setono_doctrine_orm_batcher.query.rebuilder');
    }
}
