<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Object;

use Ulrack\Validator\Common\ValidatorInterface;

class MaxPropertiesValidator implements ValidatorInterface
{
    /**
     * The maximum amount of properties an object can have.
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
        return !(is_object($data))
            || count(get_object_vars($data)) <= $this->maximum;
    }
}
