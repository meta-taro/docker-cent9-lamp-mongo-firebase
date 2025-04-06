<?php
require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb://mongo:27017");
$collection = $client->sampledb002->validated_users;
use MongoDB\Driver\Exception\BulkWriteException;

try {
    $result = $collection->insertOne([
        'name' => '佐藤花子',
        'email' => 'hanako@example.com',
        'age' => 25
    ]);

    echo "<h1>バリデーションOK：挿入成功</h1>\n";
} catch (BulkWriteException $e) {
    echo "<h1>MongoDB バリデーションエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
} catch (Exception $e) {
    echo "<h1>その他のエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
}
?>
