<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Logical;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Logical\EnumValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Logical\EnumValidator
 */
class EnumValidatorTest extends TestCase
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
        $subject = new EnumValidator([(object) ['foo' => new stdClass()], 'foo']);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                (object) ['foo' => new stdClass()],
                true
            ],
            [
                1,
                false
            ],
            [
                2.5,
                false
            ],
            [
                new stdClass(),
                false
            ],
            [
                'foo',
                true
            ],
            [
                true,
                false
            ],
            [
                null,
                false
            ],
            [
                [],
                false
            ]
        ];
    }
}
