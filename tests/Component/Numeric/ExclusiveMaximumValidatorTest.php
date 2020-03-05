<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Numeric;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Numeric\ExclusiveMaximumValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Numeric\ExclusiveMaximumValidator
 */
class ExclusiveMaximumValidatorTest extends TestCase
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
        $subject = new ExclusiveMaximumValidator(2);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                1,
                true
            ],
            [
                2,
                false
            ],
            [
                2.5,
                false
            ],
            [
                4,
                false
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
            ],
            [
                [],
                true
            ]
        ];
    }
}
