<?php

declare(strict_types=1);

namespace Rector\Tests\Php73\Rector\FuncCall\SensitiveDefineRector;

use Iterator;
use Rector\Php73\Rector\FuncCall\SensitiveDefineRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class SensitiveDefineRectorTest extends AbstractRectorTestCase
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
        return SensitiveDefineRector::class;
    }
}
