<?php

declare(strict_types=1);

namespace Rector\Tests\DeadCode\Rector\Stmt\RemoveUnreachableStatementRector;

use Iterator;
use Rector\DeadCode\Rector\Stmt\RemoveUnreachableStatementRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class RemoveUnreachableStatementRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    protected function getRectorClass(): string
    {
        return RemoveUnreachableStatementRector::class;
    }
}
