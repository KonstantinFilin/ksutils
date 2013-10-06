<?php

    require "../src/Str.php";

$s1 = "archive.zip";
var_dump(\KsUtils\Str::endsWith(".zip", $s1)); // true
