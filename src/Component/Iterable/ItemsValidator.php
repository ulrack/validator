<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Iterable;

use Ulrack\Validator\Common\ValidatorInterface;
use Ulrack\Validator\Component\Logical\AlwaysValidator;

class ItemsValidator implements ValidatorInterface
{
    /**
     * The maximum size of the array.
     *
     * @var ValidatorInterface|ValidatorInterface[]|null
     */
    private $items;

    /**
     * The additional items will be validated against this validator.
     *
     * @var ValidatorInterface
     */
    private $additionalItems;

    /**
     * Constructor
     *
     * @param ValidatorInterface|ValidatorInterface[]|null $items
     * @param ValidatorInterface|null                      $additionalItems
     */
    public function __construct(
        $items,
        ValidatorInterface $additionalItems = null
    ) {
        $this->items = $items;
        $this->additionalItems = $additionalItems ?? new AlwaysValidator(true);
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
        if (!is_array($data)) {
            return true;
        }

        foreach ($data as $key => $value) {
            if (is_array($this->items)) {
                if (array_key_exists($key, $this->items)) {
                    if (!$this->items[$key]($value)) {
                        return false;
                    }
                } else {
                    if (!($this->additionalItems)($value)) {
                        return false;
                    }
                }
            } elseif ($this->items instanceof ValidatorInterface) {
                if (!($this->items)($value)) {
                    return false;
                }
            }
        }


        return true;
    }
}
