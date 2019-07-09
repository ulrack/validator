<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Iterable;

use Ulrack\Validator\Common\ValidatorInterface;
use Ulrack\Validator\Helper\DataPreparationHelper;

class UniqueItemsValidator implements ValidatorInterface
{
    /**
     * The required properties of an object.
     *
     * @var bool
     */
    private $unique;

    /**
     * Constructor
     *
     * @param bool $unique
     */
    public function __construct(bool $unique)
    {
        $this->unique = $unique;
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
        if (!is_array($data) || $this->unique === false) {
            return true;
        }

        $dataCount = count($data);
        $unique = true;

        $data = DataPreparationHelper::prepareComparisonData($data);

        for ($i = 0; $i < $dataCount; $i++) {
            for ($j = 0; $j < $dataCount; $j++) {
                if ($i === $j) {
                    continue;
                }

                $unique = $unique && $data[$i] !== $data[$j];
            }
        }

        return $unique;
    }
}
