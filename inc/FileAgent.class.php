<?php

class FileAgent {
    
    public static function readFile() : string {

        try {
            $fh = fopen(PIZZA_FILE, 'r');
            $contents = fread($fh, filesize(PIZZA_FILE));

            if (!$fh)    {
                throw new Exception("Problem reading file". PIZZA_FILE);
            }
        } catch (Exception $ex)   {

            echo $ex->getMessage();

        } finally {

            fclose($fh);
        
        }

        return $contents;
    } 
}

?>