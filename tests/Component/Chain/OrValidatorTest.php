<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Chain;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Chain\OrValidator;
use Ulrack\Validator\Component\Type\StringValidator;
use Ulrack\Validator\Component\Type\NumberValidator;
use stdClass;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Chain\OrValidator
 */
class OrValidatorTest extends TestCase
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
        $subject = new OrValidator(new StringValidator(), new NumberValidator());
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
                true
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
                true
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
