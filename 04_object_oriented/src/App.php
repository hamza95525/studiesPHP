<?php

class App
{
    private function render($widget){
        $widget->draw();
    }

    public function run() {

        echo "Hello from App!";

        $storage = new Storage\SessionStorage();
        $MyFiles = new Storage\FileStorage();

        for($i=1; $i<8; $i++){ //creating multiple links and buttons, then putting them into Session and Files by using objects $storage and $MyFiles
            $link[$i] = new Widgets\Link();
            $button[$i]  = new Widgets\Button();
            $storage ->store($link[$i]);
            $MyFiles ->store($link[$i]);

            $storage ->store($button[$i]);
            $MyFiles ->store($button[$i]); //we
        }
        $Array = $storage->loadAll(); //loading all from session and putting all into array
        $ArrayF = $MyFiles->loadAll(); //loading all from Files and putting all into array

        foreach($Array as $value){ //rendering values from session
            $this->render($value);
        }

        echo "<br>";
        /*foreach ($ArrayF as $value){ //rendering values from files
            $this->render($value);
        }*/

    }


}