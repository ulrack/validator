<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Chain;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Chain\AndValidator;
use Ulrack\Validator\Component\Numeric\MinimumValidator;
use Ulrack\Validator\Component\Type\NumberValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Chain\AndValidator
 */
class AndValidatorTest extends TestCase
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
        $subject = new AndValidator(
            new NumberValidator(),
            new MinimumValidator(2)
        );

        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                [],
                false
            ],
            [
                1,
                false
            ],
            [
                2.5,
                true
            ],
            [
                new stdClass(),
                false
            ],
            [
                'foo',
                false
            ],
            [
                true,
                false
            ],
            [
                null,
                false
            ]
        ];
    }
}
