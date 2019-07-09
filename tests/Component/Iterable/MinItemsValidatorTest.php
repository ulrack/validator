<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Iterable;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Iterable\MinItemsValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Iterable\MinItemsValidator
 */
class MinItemsValidatorTest extends TestCase
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
        $subject = new MinItemsValidator(2);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                ['foo', 'bar', 'baz'],
                true
            ],
            [
                ['foo', 'bar'],
                true
            ],
            [
                ['foo'],
                false
            ],
            [
                [],
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
                new stdClass(),
                true
            ],
            [
                'foo',
                true
            ],
            [
                true,
                true
            ],
            [
                null,
                true
            ]
        ];
    }
}
