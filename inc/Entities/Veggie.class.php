<?php
class Veggie extends Pizza
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