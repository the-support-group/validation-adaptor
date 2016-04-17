<?php

namespace TheSupportGroup\Common\ValidationAdaptor;

use TheSupportGroup\Common\ValidationInterop\ValidationProviderInterface;

class ValidationAdaptor implements validationProviderInterface
{
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
        $this->validator->rule($ruleName, $arguments);
    }
}
