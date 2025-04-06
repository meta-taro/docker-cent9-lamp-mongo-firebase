<?php
require 'vendor/autoload.php';

use MongoDB\Client;
use MongoDB\Exception\Exception;
use MongoDB\Driver\Exception\BulkWriteException;

try {
    $client = new Client("mongodb://mongo:27017");
    $collection = $client->sampledb002->validated_users;

    $collection->insertOne([
        'name' => '田中一郎',
        // emailフィールドがない → バリデーション違反
        'age' => 20
    ]);

    echo "<h1>挿入成功</h1>\n";
} catch (BulkWriteException $e) {
    echo "<h1>MongoDB バリデーションエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
} catch (Exception $e) {
    echo "<h1>その他のエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
}
