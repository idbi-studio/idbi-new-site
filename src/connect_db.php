<?php

require_once 'config.php';
/**
 * @var $host
 * @var $user
 * @var $pass
 * @var $name
 */

$db = new mysqli($host, $user, $pass, $name);
if ($db->connect_error) {
    die('Database error' . $db->connect_errno);
}
$db->set_charset("utf8mb4");
