<?php

namespace Split;

class Experiment {
  
  public $name,
         $winner;
         
  private $alternatives = array();
  private $callable;
 
  function __construct($name, array $alternative_names = null, $callable = null) {
    $this->name = $name;
    
    if( is_array($alternative_names) ) {
      foreach( $alternative_names as $alternative_name ) {
        array_push($this->alternatives, new Alternative($alternative_name, $name));
      }
    }
    
    if( is_callable($callable) ) {
      $this->callable = $callable;
    }
  }
  
  public function get_winner() {
    
    if( empty($this->alternatives) ) {
      $winner = (boolean) mt_rand(0, 1);
    }else {
      $key = array_rand($this->alternatives);
      $winner = $this->alternatives[$key]->name;
    }

    $this->winner = $winner;
    
    if( isset($this->callable) ) {
      call_user_func_array($this->callable, array($this->winner));
    }else {
      return $this->winner;
    }
  }
 
}