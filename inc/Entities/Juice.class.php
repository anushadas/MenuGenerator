<?php
class Juice extends Drink
{
    public $type="";
    function getType()
    {
        return $this->type;
    }
   
    function setType($t)
    {
        $this->type = $t;
    }
    
}
?>