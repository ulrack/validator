<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Iterable;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Iterable\UniqueItemsValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Iterable\UniqueItemsValidator
 */
class UniqueItemsValidatorTest extends TestCase
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
        $subject = new UniqueItemsValidator(true);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                ['foo', 'bar', 'bar'],
                false
            ],
            [
                ['foo', 'bar'],
                true
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
