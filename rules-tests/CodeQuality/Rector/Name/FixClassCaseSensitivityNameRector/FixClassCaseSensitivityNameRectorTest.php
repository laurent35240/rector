<?php

declare(strict_types=1);

namespace Rector\Tests\CodeQuality\Rector\Name\FixClassCaseSensitivityNameRector;

use Iterator;
use Rector\CodeQuality\Rector\Name\FixClassCaseSensitivityNameRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class FixClassCaseSensitivityNameRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        // for PHPStan class reflection
        require_once __DIR__ . '/Source/MissCaseTypedClass.php';

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
        return FixClassCaseSensitivityNameRector::class;
    }
}
