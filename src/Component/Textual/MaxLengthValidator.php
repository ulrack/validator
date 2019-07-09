<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Textual;

use Ulrack\Validator\Common\ValidatorInterface;

class MaxLengthValidator implements ValidatorInterface
{
    /**
     * The maximum size of the string.
     *
     * @var int
     */
    private $maximum;

    /**
     * Constructor
     *
     * @param int $maximum
     */
    public function __construct(int $maximum)
    {
        $this->maximum = $maximum;
    }

    /**
     * Validate the data against the validator.
     *
     * @param mixed $data The data that needs to be validated.
     *
     * @return bool
     */
    public function __invoke($data): bool
    {
        return !(is_string($data)) || mb_strlen($data) <= $this->maximum;
    }
}
