<?php

declare(strict_types=1);

namespace Tests\Setono\DoctrineORMBatcherBundle\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Setono\DoctrineORMBatcher\Factory\BestIdRangeBatcherFactory;
use Setono\DoctrineORMBatcher\Factory\BestIdRangeBatcherFactoryInterface;
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

        $this->assertContainerBuilderHasService('setono_doctrine_orm_batcher.factory.best_id_range_batcher', BestIdRangeBatcherFactory::class);
        $this->assertContainerBuilderHasService('setono_doctrine_orm_batcher.query.rebuilder', QueryRebuilder::class);
    }

    /**
     * @test
     */
    public function after_loading_the_aliases_exist(): void
    {
        $this->load();

        $this->assertContainerBuilderHasAlias(BestIdRangeBatcherFactoryInterface::class, 'setono_doctrine_orm_batcher.factory.best_id_range_batcher');
        $this->assertContainerBuilderHasAlias(QueryRebuilderInterface::class, 'setono_doctrine_orm_batcher.query.rebuilder');
    }
}
