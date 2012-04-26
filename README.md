## Syntax

```php
<?php

if( ab_test('show_message') ) {
    
}

$cart_title = ab_test('basket_title', 'Shopping Cart', 'Basket', 'Cart'); // Basket

ab_test('name', 'option 1', 'option 2', function($text) {
    echo $text;
});

// alias to Split\Experiment
function ab_test($name, $alternative_names = null) {
    return Split\Experiment($title, array_shift(func_get_args()));
}

// split/experiment.php

namespace Split;

class Experiment {
    
    public $name,
           $winner;
           
    private $alternatives;
    
    function __construct($name, array $alternative_names = null) {
        $this->name = $name;
        
        // store each alternative into its own class
        foreach( $alternative_names as $alternative_name ) {
            array_push($this->alternatives, new Alternative($alternative_name, $name));
        }
    }
       
}

?>
```