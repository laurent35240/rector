<?php

declare(strict_types=1);

namespace Rector\Tests\DeadCode\Rector\Assign\RemoveDoubleAssignRector;

use Iterator;
use Rector\DeadCode\Rector\Assign\RemoveDoubleAssignRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class RemoveDoubleAssignRectorTest extends AbstractRectorTestCase
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
        return RemoveDoubleAssignRector::class;
    }
}
