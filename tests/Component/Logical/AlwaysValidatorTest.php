<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Logical;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Logical\AlwaysValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Logical\AlwaysValidator
 */
class AlwaysValidatorTest extends TestCase
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
        $subject = new AlwaysValidator(true);
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
            ],
            [
                [],
                true
            ]
        ];
    }
}
