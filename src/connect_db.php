<?php

require_once 'config.php';
/**
 * @var $config
 */

$db = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['name']);
if ($db->connect_error) {
    die('Database error' . $db->connect_errno);
}
$db->set_charset("utf8mb4");
