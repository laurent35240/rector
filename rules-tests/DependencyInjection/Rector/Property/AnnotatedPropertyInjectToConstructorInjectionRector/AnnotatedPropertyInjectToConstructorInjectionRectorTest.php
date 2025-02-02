<?php

declare(strict_types=1);

namespace Rector\Tests\DependencyInjection\Rector\Property\AnnotatedPropertyInjectToConstructorInjectionRector;

use Iterator;
use Rector\DependencyInjection\Rector\Property\AnnotatedPropertyInjectToConstructorInjectionRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class AnnotatedPropertyInjectToConstructorInjectionRectorTest extends AbstractRectorTestCase
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
        return AnnotatedPropertyInjectToConstructorInjectionRector::class;
    }
}
