<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Tests\Component\Object;

use PHPUnit\Framework\TestCase;
use Ulrack\Validator\Common\ValidatorInterface;
use Ulrack\Validator\Component\Object\PropertiesValidator;
use Ulrack\Validator\Component\Type\StringValidator;
use Ulrack\Validator\Component\Type\NumberValidator;
use Ulrack\Validator\Component\Logical\AlwaysValidator;
use Ulrack\Validator\Component\Textual\MaxLengthValidator;

/**
 * @coversDefaultClass Ulrack\Validator\Component\Object\PropertiesValidator
 */
class PropertiesValidatorTest extends TestCase
{
    /**
     * @param ValidatorInterface|null $additionalValidator
     * @param mixed                   $data
     * @param bool                    $expected
     *
     * @return void
     *
     * @covers ::__invoke
     * @covers ::__construct
     *
     * @dataProvider dataProvider
     */
    public function testInvoke(
        ?ValidatorInterface $additionalValidator,
        $data,
        bool $expected
    ): void {
        $subject = new PropertiesValidator(
            ['bar' => new StringValidator()],
            ['ba(?!r).*' => new NumberValidator()],
            new MaxLengthValidator(3),
            $additionalValidator
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
                new AlwaysValidator(false),
                (object) [
                    'baz' => 'foo',
                    'foo' => 'baz',
                    'bar' => 'qux'
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 'qux',
                    'baz' => 1
                ],
                true
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 'qux',
                    'bazz' => 1
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'foo' => 'baz'
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 1
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 'baz'
                ],
                true
            ],
            [
                null,
                'foo',
                true
            ],
            [
                null,
                1,
                true
            ],
            [
                null,
                2.5,
                true
            ],
            [
                null,
                true,
                true
            ],
            [
                null,
                null,
                true
            ],
            [
                null,
                [],
                true
            ]
        ];
    }
}
