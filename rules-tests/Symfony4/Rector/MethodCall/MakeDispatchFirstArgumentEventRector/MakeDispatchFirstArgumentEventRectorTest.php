<?php

declare(strict_types=1);

namespace Rector\Tests\Symfony4\Rector\MethodCall\MakeDispatchFirstArgumentEventRector;

use Iterator;
use Rector\Symfony4\Rector\MethodCall\MakeDispatchFirstArgumentEventRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class MakeDispatchFirstArgumentEventRectorTest extends AbstractRectorTestCase
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
        return MakeDispatchFirstArgumentEventRector::class;
    }
}
