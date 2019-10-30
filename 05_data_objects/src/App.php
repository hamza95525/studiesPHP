<?php

use Widget\Widget;
use Widget\Link;
use Widget\Button;

use Storage\SessionStorage;
use Storage\FileStorage;
use Storage\SQLiteStorage;
use Storage\MySQLStorage;

class App
{
    public function run() {

        $widgets = [
            new Link(1), new Link(2), new Link(3),
            new Button(1), new Button(2), new Button(3)
        ];

        $storage = new SessionStorage();
        #$storage = new FileStorage();
        #$storage = new SQLiteStorage(); // TODO: ...
        #$storage = new MySQLStorage(); // TODO: ...

        foreach ($widgets as $widget)
            $storage->store($widget);

        $widgets = $storage->loadAll();

        foreach ($widgets as $widget)
            $this->render($widget);
    }

    private function render(Widget $widget) {
        $widget->draw();
    }
}
