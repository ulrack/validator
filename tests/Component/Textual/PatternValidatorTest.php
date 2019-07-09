<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Textual;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Textual\PatternValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Textual\PatternValidator
 */
class PatternValidatorTest extends TestCase
{
    /**
     * @param mixed $data
     * @param bool  $expected
     *
     * @return void
     *
     * @covers ::__invoke
     * @covers ::__construct
     *
     * @dataProvider dataProvider
     */
    public function testInvoke($data, bool $expected): void
    {
        $subject = new PatternValidator('f.{1}o');
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                new stdClass(),
                true
            ],
            [
                'foo',
                true
            ],
            [
                'f0o',
                true
            ],
            [
                'bar',
                false
            ],
            [
                1,
                true
            ],
            [
                2.5,
                true
            ],
            [
                true,
                true
            ],
            [
                null,
                true
            ],
            [
                [],
                true
            ]
        ];
    }
}
