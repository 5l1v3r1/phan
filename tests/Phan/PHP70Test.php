<?php

declare(strict_types=1);

namespace Phan\Tests;

use Phan\Config;

/**
 * Unit tests of analysis **targeting PHP 7.0 codebases**.
 * These tests are run in all PHP versions.
 */
class PHP70Test extends AbstractPhanFileTest
{
    private const OVERRIDES = [
        'target_php_version' => '7.0',
        'use_polyfill_parser' => true, // We use the polyfill parser because it behaves consistently in all php versions.
        'backward_compatibility_checks' => false,
        'dead_code_detection' => true,
        'plugins' => [
            'UnreachableCodePlugin',
        ],
    ];

    public function setUp(): void
    {
        parent::setUp();
        foreach (self::OVERRIDES as $key => $value) {
            Config::setValue($key, $value);
        }
    }

    /**
     * @suppress PhanUndeclaredConstant
     */
    public function getTestFiles(): array
    {
        return $this->scanSourceFilesDir(\PHP70_TEST_FILE_DIR, \PHP70_EXPECTED_DIR);
    }
}
