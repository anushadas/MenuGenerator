<?php
 
 class Menu {

    //
    public $menuItems = array();

    //Build an array for each class type for all the classes.
    public $pizzas = array();
    public $drinks = array();

    //This function returns a flat array of objects and puts them to $this->menuItems
    function parseMenuData($fileContents)   {
        $i;
        //Lines
        $lines = explode("\n",$fileContents);
        //Walk the lines
        foreach($lines as $key=>$line)
        {
            //Pull the columns
            if($key == 0)
            {

            }
            else
            {
            $columns = explode("|",$line);
            //If the class is Pizza
            if($columns[0] == "pizza")
            {
            //Parse the different kinds of pizza  
                switch ($columns[1])    
                {
                    case "Basics":
                    //Make a new pizza
                    $pizza = new Basics();
                    $pizza->setType("Basic");
                    $pizza->setItem($columns[2]);
                    $pizza->setDescription($columns[3]);
                    break;

                    case "Chicken":
                    $pizza = new Chicken();
                    $pizza->setType("Chicken");
                    $pizza->setItem($columns[2]);
                    $pizza->setDescription($columns[3]);
                    break;

                    case "Meat":
                    $pizza = new Meat();
                    $pizza->setType("Meat");
                    $pizza->setItem($columns[2]);
                    $pizza->setDescription($columns[3]);
                    break;

                    case "Veggie":
                    $pizza = new Veggie();
                    $pizza->setType("Veggie");
                    $pizza->setItem($columns[2]);
                    $pizza->setDescription($columns[3]);
                    break;
    
                }
               $i=$pizza;
            }
            //Or if its a Drink
            if ($columns[0] == "drink") {

                //Parse the different kinds of drinks
                switch ($columns[1])    
                {
                    case "Pop":
                    $drink = new Pop();
                    $drink->setType("Pop");
                    $drink->setItem($columns[2]);
                    $drink->setDescription($columns[3]);
                    break;

                    case "Juice":
                    $drink = new Juice();
                    $drink->setType("Juice");
                    $drink->setItem($columns[2]);
                    $drink->setDescription($columns[3]);
                    break;
                }
                $i=$drink;
            }
            //Add the item
            $this->menuItems[] = $i;
  
            }
        }
      
    }
    /* Build the menu into specific categories based on the subclass and the claa name
    * Pizzas should go in the pizzas array
    * Drinks should go in the drinks array
    */

    function buildMenu() {

        //Walk through the entire menu, put each item in its respective array by class and type. HINT use is_subclass_of
        
        foreach($this->menuItems as $item)
        {
            //If its a drink (check is_subclass_of)
            if (is_subclass_of($item, "Drink"))   {
                
                //Use getClass
                switch (get_class($item)) {
                    case "Pop":
                        //Add to the drinks array with the key "pop"
                        $this->drinks['Pop'][]= $item;
                    break;

                    case "Juice":
                    $this->drinks['Juice'][] = $item;
                    break;

                    default:
                        Page::notify(array("Problem we dont know where to put this drink!"));
                    break;
                }
            }

            //If its Pizza ... is_subclass_of()
            if(is_subclass_of($item, "Pizza"))
            {
                switch(get_class($item)){
                    case "Basics":
                        //Add to the pizzas array with the "basics" key
                        $this->pizzas["basics"][] = $item;
                    break;

                    case "Chicken":
                    $this->pizzas["chicken"][] = $item;
                    break;

                    case "Meat":
                    $this->pizzas["meat"][] = $item;
                    break;

                    case "Veggie":
                    $this->pizzas["veggie"][] = $item;
                    break;

                    default:
                        Page::notify(array("Problem we dont know where to put this Pizza". get_class($item)));
                    break;
                }
            }

        }

        //Sort the arrays
        ksort($this->pizzas);
        ksort($this->drinks);

} 
}   
 ?>