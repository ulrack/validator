<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Logical;

use Ulrack\Validator\Common\ValidatorInterface;

class IfThenElseValidator implements ValidatorInterface
{
    /**
     * Contains the validator for the if statement.
     *
     * @var ValidatorInterface
     */
    private $ifValidator;

    /**
     * Contains the validator the then statement.
     *
     * @var ValidatorInterface|null
     */
    private $thenValidator;

    /**
     * Contains the validator for the else statement.
     *
     * @var ValidatorInterface|null
     */
    private $elseValidator;

    /**
     * Constructor
     *
     * @param ValidatorInterface      $ifValidator
     * @param ValidatorInterface|null $thenValidator
     * @param ValidatorInterface|null $elseValidator
     */
    public function __construct(
        ValidatorInterface $ifValidator,
        ?ValidatorInterface $thenValidator,
        ?ValidatorInterface $elseValidator
    ) {
        $this->ifValidator = $ifValidator;
        $this->thenValidator = $thenValidator;
        $this->elseValidator = $elseValidator;
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
        if (($this->ifValidator)($data)) {
            if ($this->thenValidator !== null
                && !($this->thenValidator)($data)) {
                return false;
            }
        } else {
            if ($this->elseValidator !== null
                && !($this->elseValidator)($data)) {
                return false;
            }
        }

        return true;
    }
}
