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

        $storageTypes = [new SessionStorage(), new FileStorage(), new SQLiteStorage(), new MySQLStorage()];

        foreach ($storageTypes as $storage)
            foreach ($widgets as $widget)
                $storage->store($widget);


        foreach ($storageTypes as $storage) {
            echo get_class($storage);
            foreach ($storage->loadAll() as $widget)
                $this->render($widget);
            echo "<br/>";
        }
    }

    private function render(Widget $widget) {
        $widget->draw();
    }
}
