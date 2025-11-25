<?php

$base_url = "http://localhost/lab9_php_modular/";

$app_name = "Modular PHP App";

date_default_timezone_set("Asia/Jakarta");

function url($path = "") {
    global $base_url;
    return $base_url . $path;
}
