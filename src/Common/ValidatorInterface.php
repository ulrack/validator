<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Common;

interface ValidatorInterface
{
    /**
     * Validate the data against the validator.
     *
     * @param string|object|array $data
     *
     * @return bool
     */
    public function __invoke($data): bool;
}
