<?php

declare(strict_types=1);

namespace Rector\Tests\NetteToSymfony\Rector\Interface_\DeleteFactoryInterfaceRector;

use Iterator;
use Rector\NetteToSymfony\Rector\Interface_\DeleteFactoryInterfaceRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class DeleteFactoryInterfaceFileSystemRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $smartFileInfo): void
    {
        $this->doTestFileInfo($smartFileInfo);
        $this->assertFileWasRemoved($this->originalTempFileInfo);
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
        return DeleteFactoryInterfaceRector::class;
    }
}
