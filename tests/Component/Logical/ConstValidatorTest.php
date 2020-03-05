<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Logical;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Logical\ConstValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Logical\ConstValidator
 */
class ConstValidatorTest extends TestCase
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
        $subject = new ConstValidator((object) ['foo' => new stdClass()]);
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
                false
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
