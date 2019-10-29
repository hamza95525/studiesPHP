<?php


namespace Widgets;


class Button extends Widget
{
    public function draw(){
        $napis = $this->key();
        echo "<button typ='button' value='widget_button_2'>$napis</button>";
    }


}