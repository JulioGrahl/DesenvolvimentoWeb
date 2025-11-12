<?php
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');
define('DB_NAME', 'trabalhoFinal');
define('DB_USER', 'postgres');
define('DB_PASS', 'postgres');

function conectar_db() {
    $conn_string = "host=" . DB_HOST . 
                   " port=" . DB_PORT . 
                   " dbname=" . DB_NAME . 
                   " user=" . DB_USER . 
                   " password=" . DB_PASS;
    
    $db_conn = pg_connect($conn_string);

    if (!$db_conn) {
        return false;
    }
    return $db_conn;
}

$db = conectar_db();

if (!$db) {
    $db_error = true;
} else {
    $db_error = false;
}

?>