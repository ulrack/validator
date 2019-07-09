<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Textual;

use Ulrack\Validator\Common\ValidatorInterface;

class MinLengthValidator implements ValidatorInterface
{
    /**
     * The minimum size of the string.
     *
     * @var float
     */
    private $minimum;

    /**
     * Constructor
     *
     * @param float $minimum
     */
    public function __construct(float $minimum)
    {
        $this->minimum = $minimum;
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
        return !(is_string($data)) || mb_strlen($data) >= $this->minimum;
    }
}
