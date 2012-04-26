<?php

require dirname(__FILE__) . '/../lib/split.php';

class SplitExperimentTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @test
   */
  public function it_should_return_boolean_value_if_not_alternative_names() {
    $this->assertInternalType('bool', ab_test('test_name'));
  }
  
  /**
   * @test
   */
  public function it_should_return_a_random_choice() {
    $this->assertRegExp('/^(shopping cart|basket)$/', ab_test('cart_title', 'shopping cart', 'basket'));
  }
  
  /**
   * @test
   */
  public function it_should_run_a_callable_function() {
    $return_value = null;
    
    ab_test('cart_title', 'shopping cart', 'basket', function($cart_title) use(&$return_value) {
      $return_value = 'basket';
    });
    
    $this->assertRegExp('/^(shopping cart|basket)$/', $return_value);
  }
  
}