<?php

use TheSupportGroup\Common\ValidationAdaptor\ValidationAdaptor;

use Respect\Validation\Validator;

class ruleMock
{
    public function validate($value)
    {
        return true;
    }
}

class ValidatorAdaptorTest extends PHPUnit_Framework_TestCase
{
    private $validator;

    /**
     * Setup test object.
     */
    public function setup()
    {
        $this->validator = new Validator();

        $this->testObject = new ValidationAdaptor($this->validator);
    }

    /**
     * Test that the rule method works as expected.
     */
    public function testRule()
    {
        // Rule name
        $ruleName = 'banana';
        $arguments = ['orange', 'apple'];

        $result = $this->testObject->rule($ruleName, $arguments);

        $reflectionClass = new \ReflectionClass(get_class($result));

        $ruleNameReflectionProperty = $reflectionClass->getProperty('ruleName');
        $ruleNameReflectionProperty->setAccessible(true);
        $value = $ruleNameReflectionProperty->getValue($result);

        $this->assertEquals($ruleName, $value);

        $ruleNameReflectionProperty = $reflectionClass->getProperty('arguments');
        $ruleNameReflectionProperty->setAccessible(true);
        $value = $ruleNameReflectionProperty->getValue($result);

        $this->assertEquals($arguments, $value);
    }

    /**
     * Test that the validate method works as expected.
     */
    public function testValidateTrue()
    {
        // Rule name
        $ruleName = 'alpha';
        $arguments = ['orange', 'apple'];

        // Rule
        $value = 'Coolio';

        $result = $this->testObject->rule($ruleName, $arguments);

        $result = $this->testObject->validate($value);

        $this->assertTrue($result);
    }

    /**
     * Test that the validate method works as expected.
     */
    public function testValidateFalse()
    {
        // Rule name
        $ruleName = 'alpha';
        $arguments = ['orange', 'apple'];

        // Rule
        $value = 123;

        $result = $this->testObject->rule($ruleName, $arguments);

        $result = $this->testObject->validate($value);

        $this->assertFalse($result);
    }

    /**
     * testGetMappedMethod Test that getMappedMethod executes as expected.
     */
    public function testGetMappedMethod()
    {
        // Prepare / Mock
        $method = 'alpha';
    
        // Execute
        $result = $this->testObject->getMappedMethod($method);
    
        // Assert Result
        $this->assertInternalType('string', $result);
    }

    /**
     * testGetMappedMethod Test that getMappedMethod executes as expected.
     * 
     * @expectedException Exception
     */
    public function testGetMappedMethodThrowsException()
    {
        // Prepare / Mock
        $method = 'blaksbdfkalbsdfbjlabsjkdf';
    
        // Execute
        $this->testObject->getMappedMethod($method);
    }
}
