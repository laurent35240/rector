<?php

declare(strict_types=1);

namespace Rector\NodeTypeResolver\Reflection\BetterReflection;

use PHPStan\BetterReflection\SourceLocator\Type\AggregateSourceLocator;
use PHPStan\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use PHPStan\BetterReflection\SourceLocator\Type\SourceLocator;
use PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocator\IntermediateSourceLocator;

final class RectorBetterReflectionSourceLocatorFactory
{
    /**
     * @var BetterReflectionSourceLocatorFactory
     */
    private $betterReflectionSourceLocatorFactory;

    /**
     * @var IntermediateSourceLocator
     */
    private $intermediateSourceLocator;

    public function __construct(
        BetterReflectionSourceLocatorFactory $betterReflectionSourceLocatorFactory,
        IntermediateSourceLocator $intermediateSourceLocator
    ) {
        $this->betterReflectionSourceLocatorFactory = $betterReflectionSourceLocatorFactory;
        $this->intermediateSourceLocator = $intermediateSourceLocator;
    }

    public function create(): SourceLocator
    {
        $phpStanSourceLocator = $this->betterReflectionSourceLocatorFactory->create();

        // make PHPStan first source locator, so we avoid parsing every single file - huge performance hit!
        $aggregateSourceLocator = new AggregateSourceLocator([$phpStanSourceLocator, $this->intermediateSourceLocator]);

        // important for cache
        return new MemoizingSourceLocator($aggregateSourceLocator);
    }
}
