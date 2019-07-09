<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Type;

use Ulrack\Validator\Common\ValidatorInterface;

class ArrayValidator implements ValidatorInterface
{
    /**
     * Validate the data against the validator.
     *
     * @param mixed $data The data that needs to be validated.
     *
     * @return bool
     */
    public function __invoke($data): bool
    {
        return is_array($data);
    }
}
