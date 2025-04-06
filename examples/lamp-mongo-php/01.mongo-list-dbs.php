<?php
require 'vendor/autoload.php';

/**
 * データベース一覧です。作成してなければまだ何もありません。
 * 他のサンプルを実行することで、データベースが表示されます。
**/
try {
    $client = new MongoDB\Client("mongodb://mongo:27017");
    $dbs = $client->listDatabases();
    echo "<h1>MongoDB データベース一覧</h1>\n";
    foreach ($dbs as $db) {
        echo "<p>" . $db->getName() . "</p>\n";
    }
} catch (Exception $e) {
    echo "<h1>接続失敗: " . $e->getMessage() . "</h1>\n";
}
?>
