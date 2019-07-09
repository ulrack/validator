<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Numeric;

use Ulrack\Validator\Common\ValidatorInterface;

class MaximumValidator implements ValidatorInterface
{
    /**
     * The maximum the input can be.
     *
     * @var float
     */
    private $maximum;

    /**
     * Constructor
     *
     * @param float $maximum
     */
    public function __construct(float $maximum)
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
        return !(is_int($data) || is_float($data)) || $data <= $this->maximum;
    }
}
