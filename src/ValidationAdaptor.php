<?php

namespace TheSupportGroup\Common\ValidationAdaptor;

use TheSupportGroup\Common\ValidationInterop\ValidationProviderInterface;

class ValidationAdaptor implements validationProviderInterface
{
    /**
     * Holds the rule name in operation.
     */
    private $ruleName;

    /**
     * Holds the arguments for the rule.
     */
    private $arguments;

    /**
     * Validation mapping.
     */
    private static $validatorMapping = [];

    /**
     * Set the validator object.
     */
    public function __construct($validator)
    {
        $this->validator = $validator;

        // Import mapping only once.
        if (! self::$validatorMapping) {
            self::$validatorMapping = require __DIR__ . '/Mapping/Mapping.php';
        }
    }

    /**
     * @param string $ruleName The rule name.
     * @param array $arguments The arguments for the rule.
     */
    public function rule($ruleName, array $arguments = [])
    {
        $this->ruleName = $ruleName;
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @param mixed $value
     */
    public function validate($value)
    {
        $rule = $this->validator->buildRule($this->ruleName, $this->arguments);

        // If validate returns a positive result it means all is well.
        if ($rule->validate($value)) {
            return true;
        }

        return false;
    }

    /**
     * Get mapped method.
     * 
     * @param string $method The validation method to map.
     * 
     * @return string
     */
    public function getMappedMethod($method)
    {
        // Check if the method called is provided in the mapping.
        if (! array_key_exists($method, self::$validatorMapping)) {
            throw new Exception(sprintf(
                'Mapping for method "%s" not found, make sure it exists in the mapping file.',
                $method
            ));
        }

        return self::$validatorMapping[$method];
    }
}
