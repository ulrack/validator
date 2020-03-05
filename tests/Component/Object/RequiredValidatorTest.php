<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Object;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Component\Object\RequiredValidator;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Object\RequiredValidator
 */
class RequiredValidatorTest extends TestCase
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
        $subject = new RequiredValidator('foo', 'bar');
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
