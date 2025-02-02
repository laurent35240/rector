<?php

declare(strict_types=1);

namespace Rector\Tests\NetteTesterToPHPUnit\Rector\FileNode\RenameTesterTestToPHPUnitToTestFileRector;

use Iterator;
use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Rector\NetteTesterToPHPUnit\Rector\FileNode\RenameTesterTestToPHPUnitToTestFileRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;
use Symplify\SmartFileSystem\SmartFileSystem;

final class RenameTesterTestToPHPUnitToTestFileRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fixtureFileInfo, AddedFileWithContent $expectedAddedFileWithContent): void
    {
        $this->doTestFileInfo($fixtureFileInfo);
        $this->assertFileWithContentWasAdded($expectedAddedFileWithContent);
    }

    /**
     * @return Iterator<AddedFileWithContent[]|SmartFileInfo[]>
     */
    public function provideData(): Iterator
    {
        $smartFileSystem = new SmartFileSystem();

        yield [
            new SmartFileInfo(__DIR__ . '/Source/SomeCase.phpt'),
            new AddedFileWithContent(
                $this->getFixtureTempDirectory() . '/Source/SomeCaseTest.php',
                $smartFileSystem->readFile(__DIR__ . '/Source/SomeCase.phpt')
            ),
        ];
    }

    protected function getRectorClass(): string
    {
        return RenameTesterTestToPHPUnitToTestFileRector::class;
    }
}
