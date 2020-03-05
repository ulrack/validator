<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Chain;

use Ulrack\Validator\Common\ValidatorInterface;

class OneOfValidator implements ValidatorInterface
{
    /**
     * The validators that need to be chain checked.
     *
     * @var ValidatorInterface[]
     */
    private $validators;

    /**
     * Constructor
     *
     * @param ValidatorInterface[] $validators
     */
    public function __construct(ValidatorInterface ...$validators)
    {
        $this->validators = $validators;
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
        $trueCount = 0;

        foreach ($this->validators as $validator) {
            if ($validator($data)) {
                $trueCount++;
            }
        }

        return $trueCount === 1;
    }
}
