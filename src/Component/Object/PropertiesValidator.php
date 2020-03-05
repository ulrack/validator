<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Validator\Component\Object;

use Ulrack\Validator\Common\ValidatorInterface;
use Ulrack\Validator\Component\Logical\AlwaysValidator;

class PropertiesValidator implements ValidatorInterface
{
    /**
     * The property configuration that needs to be validated.
     *
     * @var ValidatorInterface[]
     */
    private $properties;

    /**
     * The additional property configuration that needs to be validated.
     *
     * @var ValidatorInterface
     */
    private $additionalProperties;

    /**
     * The pattern properties configuration that needs to be validated.
     *
     * @var ValidatorInterface[]
     */
    private $patternProperties;

    /**
     * The property names validator.
     *
     * @var ValidatorInterface
     */
    private $propertyNames;

    /**
     * Constructor
     *
     * @param ValidatorInterface[]|null $properties
     * @param ValidatorInterface[]|null $patternProperties
     * @param ValidatorInterface|null   $propertyNames
     * @param ValidatorInterface|null   $additionalProperties
     */
    public function __construct(
        ?array $properties,
        ?array $patternProperties,
        ?ValidatorInterface $propertyNames,
        ValidatorInterface $additionalProperties = null
    ) {
        $this->properties = $properties;
        $this->patternProperties = $patternProperties;
        $this->propertyNames = $propertyNames;
        $this->additionalProperties = $additionalProperties
            ?? new AlwaysValidator(true);
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
        if (!is_object($data)) {
            return true;
        }

        foreach (get_object_vars($data) as $key => $value) {
            $found = false;

            if ($this->patternProperties !== null) {
                foreach ($this->patternProperties as $pattern => $schema) {
                    if (preg_match(sprintf('/%s/', $pattern), $key) === 1) {
                        if (!$schema($value)) {
                            return false;
                        }

                        $found = true;
                    }
                }
            }

            if ($this->propertyNames !== null) {
                if (!($this->propertyNames)($key)) {
                    return false;
                }
            }

            if ($this->properties !== null && isset($this->properties[$key])) {
                if (!$this->properties[$key]($value)) {
                    return false;
                }

                $found = true;
            } elseif ($found === false) {
                if (!($this->additionalProperties)($value)) {
                    return false;
                }
            }
        }

        return true;
    }
}
