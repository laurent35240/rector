<?php

declare(strict_types=1);

namespace Rector\Tests\Defluent\Rector\MethodCall\InArgChainFluentMethodCallToStandaloneMethodCallRectorTest;

use Iterator;
use Rector\Defluent\Rector\MethodCall\InArgFluentChainMethodCallToStandaloneMethodCallRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class InArgChainFluentMethodCallToStandaloneMethodCallRectorTest extends AbstractRectorTestCase
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
        return InArgFluentChainMethodCallToStandaloneMethodCallRector::class;
    }
}
