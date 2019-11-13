<p>Loaded widgets:</p>

<?php
    foreach ($widgets as $widget) {
        $widget->draw();
    }
?>

<p>Loaded links:</p>

<?php
    foreach ($links as $link) {
        $link->draw();
    }
?>


<p>Loaded buttons:</p>

<?php
    foreach ($buttons as $button) {
        $button->draw();
    }
?>

<p>Loaded widgets after removal:</p>

<?php
    foreach ($after as $widget) {
        $widget->draw();
    }
?>
