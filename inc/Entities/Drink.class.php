<?php
class Drink
{
    public $item="";
    public $description="";
    function getItem()
    {
        return $this->item;
    }
    function getDescription()
    {
        return $this->description;
    }
    function setItem($i)
    {
        $this->item = $i;
    }
    function setDescription($d)
    {
        $this->description = $d;
    }
}
?>