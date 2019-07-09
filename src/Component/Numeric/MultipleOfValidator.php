<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Numeric;

use Ulrack\Validator\Common\ValidatorInterface;

class MultipleOfValidator implements ValidatorInterface
{
    /**
     * The modulus for the comparison.
     *
     * @var float
     */
    private $modulus;

    /**
     * Constructor
     *
     * @param float $minimum
     */
    public function __construct(float $modulus)
    {
        $this->modulus = $modulus;
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
        if (!(is_int($data) || is_float($data))) {
            return true;
        }

        // Calculate the division.
        $division = $data / $this->modulus;

        // Validate whether the division is a round number.
        return  $division == (int) $division;
    }
}
