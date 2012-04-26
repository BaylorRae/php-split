<?php

spl_autoload_register(array('Split', 'autoload'));

class Split {
  
  public static function autoload($class_name) {
    if( substr($class_name, 0, 5) === 'Split' ) {
      
      $file = dirname(__FILE__) . '/' . strtolower(str_replace('\\', '/', $class_name)) . '.php';
      if( file_exists($file) ) {
        require_once $file;
      }
    }
  }
  
}

function ab_test($name, $alternative_names = null) {
  $alternatives = func_get_args();
  array_shift($alternatives);
  
  $callable = end($alternatives);
  reset($alternatives);
  
  $experiment = new Split\Experiment($name, $alternatives, $callable);
  return $experiment->get_winner();
}