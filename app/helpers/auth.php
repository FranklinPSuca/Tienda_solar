<?php

function requireLogin($return = null) {
    if (!isset($_SESSION['usuario_id'])) {

        $url = 'index.php?page=home';
        
        if ($return) {
            $url .= '&return=' . urlencode($return);
        }

        header("Location: $url");
        exit;
    }
}
