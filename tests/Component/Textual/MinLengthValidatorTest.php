<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Textual;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Textual\MinLengthValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Textual\MinLengthValidator
 */
class MinLengthValidatorTest extends TestCase
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
        $subject = new MinLengthValidator(3);
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
                'fo',
                false
            ],
            [
                'fooo',
                true
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
