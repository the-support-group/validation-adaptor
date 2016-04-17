<?php

use TheSupportGroup\Common\ValidationAdaptor\ValidationAdaptor;

class ValidatorAdaptorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup test object.
     */
    public function setup()
    {
        $validator = null;

        $this->testObject = new ValidationAdaptor($validator);
    }

    /**
     * Test that the rule method works as expected.
     */
    public function testRule()
    {
        $this->markTestIncomplete('Needs implementing');

        // Rule name
        $ruleName = '';
        $arguments = [];

        $this->testObject->rule($ruleName, $arguments);
    }

    /**
     * Test that the validate method works as expected.
     */
    public function testValidate()
    {
        $this->markTestIncomplete('Needs implementing');

        // Rule
        $rule = '';
        $value = '';

        $this->testObject->validate($rule, $value);
    }
}
