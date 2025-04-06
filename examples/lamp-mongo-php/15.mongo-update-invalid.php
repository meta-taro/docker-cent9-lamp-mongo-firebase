<?php
require 'vendor/autoload.php';

use MongoDB\Client;
use MongoDB\Exception\Exception;
use MongoDB\Driver\Exception\BulkWriteException;

try {
    $client = new Client("mongodb://mongo:27017");
    $collection = $client->sampledb002->validated_users;

    $collection->updateOne(
        ['name' => '佐藤花子'],
        ['$set' => ['age' => '若い']] // age は int が必要 → バリデーション違反
    );

    echo "<h1>更新成功（バリデーションをすり抜け？）</h1>\n";
} catch (BulkWriteException $e) {
    echo "<h1>MongoDB バリデーションエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
} catch (Exception $e) {
    echo "<h1>その他のエラー:</h1>";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
}
?>
