<?php
require 'vendor/autoload.php';

use MongoDB\Client;

try {
    $client = new Client("mongodb://mongo:27017");
    $db = $client->selectDatabase("sampledb002");

    // コレクションの情報を取得するコマンドを実行
    $result = $db->command([
        'listCollections' => 1,
        'filter' => ['name' => 'validated_users']
    ]);

    echo "<h1>validated_users コレクションのスキーマ:</h1>\n<pre>";

    foreach ($result as $collection) {
        if (isset($collection['options']['validator']['$jsonSchema'])) {
            print_r($collection['options']['validator']['$jsonSchema']);
        } else {
            echo "スキーマ情報が見つかりませんでした。\n";
        }
    }

    echo "</pre>\n";

} catch (Exception $e) {
    echo "<h1>エラー:</h1><p>" . $e->getMessage() . "</p>\n";
}
