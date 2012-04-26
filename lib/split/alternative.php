<?php

namespace Split;

class Alternative {
  
  public $name,
         $experiment_name;
  
  function __construct($name, $experiment_name) {
    $this->name = $name;
    $this->experiment_name = $experiment_name;
  }
  
}