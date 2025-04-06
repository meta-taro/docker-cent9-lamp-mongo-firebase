<?php
require 'vendor/autoload.php';

/**
 * シンプルに MongoDB アクセスのみのサンプルです。
**/
try {
    $client = new MongoDB\Client("mongodb://mongo:27017");
    echo "<h1>MongoDB 接続成功！</h1>\n";
} catch (Exception $e) {
    echo "<h1>接続失敗: " . $e->getMessage() . "</h1>\n";
}
?>
