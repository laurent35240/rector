<?php

declare(strict_types=1);

namespace Rector\Tests\Php55\Rector\String_\StringClassNameToClassConstantRector;

use Iterator;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class StringClassNameToClassConstantRectorTest extends AbstractRectorTestCase
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
        return StringClassNameToClassConstantRector::class;
    }
}
