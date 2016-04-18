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
     * Set the validator object.
     */
    public function __construct($validator)
    {
        $this->validator = $validator;
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
        $rule = $this->validator->rule($this->ruleName, $this->arguments);

        // If validate returns a positive result it means all is well.
        if ($rule->validate($value)) {
            return true;
        }

        return false;
    }
}
