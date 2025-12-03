<?php
function renderView($view, $data = [], $layout = null) {
    extract($data);
    ob_start();
    require "../app/views/$view.php";
    $content = ob_get_clean();

    if ($layout) {
        require "../app/views/$layout.php";
    } else {
        echo $content;
    }
}