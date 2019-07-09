<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Object;

use Ulrack\Validator\Common\ValidatorInterface;

class DependencyValidator implements ValidatorInterface
{
    /**
     * The string which should be checked before executing the validation.
     *
     * @var string
     */
    private $key;

    /**
     * The validator which must be run if the key exists.
     *
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * Constructor
     *
     * @param string             $key
     * @param ValidatorInterface $validator
     */
    public function __construct(string $key, ValidatorInterface $validator)
    {
        $this->key = $key;
        $this->validator = $validator;
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
            || (property_exists($data, $this->key) ? ($this->validator)(
                $data
            ): true);
    }
}
