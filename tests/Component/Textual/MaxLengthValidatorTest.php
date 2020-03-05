<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Textual;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Textual\MaxLengthValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Textual\MaxLengthValidator
 */
class MaxLengthValidatorTest extends TestCase
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
        $subject = new MaxLengthValidator(3);
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
                true
            ],
            [
                'fooo',
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
