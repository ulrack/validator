<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Logical;

use Ulrack\Validator\Common\ValidatorInterface;
use Ulrack\Validator\Helper\DataPreparationHelper;

class ConstValidator implements ValidatorInterface
{
    /**
     * The value that needs to be checked.
     *
     * @var mixed
     */
    private $value;

    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = DataPreparationHelper::prepareComparisonData($value);
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
        return DataPreparationHelper::prepareComparisonData(
            $data
        ) === $this->value;
    }
}
