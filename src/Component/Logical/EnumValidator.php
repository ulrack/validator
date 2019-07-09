<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Logical;

use Ulrack\Validator\Common\ValidatorInterface;
use Ulrack\Validator\Helper\DataPreparationHelper;

class EnumValidator implements ValidatorInterface
{
    /**
     * The options for the values.
     *
     * @var mixed[]
     */
    private $enum;

    /**
     * Constructor
     *
     * @param mixed[] $enum
     */
    public function __construct(array $enum)
    {
        $this->enum = DataPreparationHelper::prepareComparisonData($enum);
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
        $preparedData = DataPreparationHelper::prepareComparisonData($data);
        foreach ($this->enum as $option) {
            if ($preparedData === $option) {
                return true;
            }
        }

        return false;
    }
}
