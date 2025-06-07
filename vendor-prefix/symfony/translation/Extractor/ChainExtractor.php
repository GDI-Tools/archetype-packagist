<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Symfony\Component\Translation\Extractor;

use Archetype\Vendor\Symfony\Component\Translation\MessageCatalogue;

/**
 * ChainExtractor extracts translation messages from template files.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class ChainExtractor implements ExtractorInterface
{
    /**
     * The extractors.
     *
     * @var ExtractorInterface[]
     */
    private array $extractors = [];

    /**
     * Adds a loader to the translation extractor.
     */
    public function addExtractor(string $format, ExtractorInterface $extractor): void
    {
        $this->extractors[$format] = $extractor;
    }

    public function setPrefix(string $prefix): void
    {
        foreach ($this->extractors as $extractor) {
            $extractor->setPrefix($prefix);
        }
    }

    public function extract(string|iterable $directory, MessageCatalogue $catalogue): void
    {
        foreach ($this->extractors as $extractor) {
            $extractor->extract($directory, $catalogue);
        }
    }
}
