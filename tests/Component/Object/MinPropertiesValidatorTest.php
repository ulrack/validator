<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Object;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Object\MinPropertiesValidator;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Object\MinPropertiesValidator
 */
class MinPropertiesValidatorTest extends TestCase
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
        $subject = new MinPropertiesValidator(2);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                (object) [
                    'foo' => 'baz',
                    'bar' => 'qux'
                ],
                true
            ],
            [
                (object) [
                    'foo' => 'baz'
                ],
                false
            ],
            [
                'foo',
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
