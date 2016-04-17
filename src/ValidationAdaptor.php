<?php

namespace TheSupportGroup\Common\ValidationAdaptor;

use TheSupportGroup\Common\ValidationInterop\ValidationProviderInterface;

class ValidationAdaptor implements validationProviderInterface
{
    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    public function rule($ruleName, array $arguments = [])
    {
        $this->validator->rule($ruleName, $arguments);
    }
}
