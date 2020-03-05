<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Iterable;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Iterable\MaxItemsValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Iterable\MaxItemsValidator
 */
class MaxItemsValidatorTest extends TestCase
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
        $subject = new MaxItemsValidator(1);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                ['foo', 'bar'],
                false
            ],
            [
                ['foo'],
                true
            ],
            [
                [],
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
