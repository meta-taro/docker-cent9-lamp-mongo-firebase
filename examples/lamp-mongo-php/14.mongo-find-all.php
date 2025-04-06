<?php
require 'vendor/autoload.php';

use MongoDB\Client;

try {
    $client = new Client("mongodb://mongo:27017");
    $collection = $client->sampledb002->validated_users;

    $cursor = $collection->find();

    echo "<h1>validated_users コレクションの内容:</h1>\n<pre>";
    foreach ($cursor as $doc) {
        print_r($doc);
    }
    echo "</pre>\n";
} catch (BulkWriteException $e) {
    echo "<h1>MongoDB バリデーションエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
} catch (Exception $e) {
    echo "<h1>その他のエラー:</h1>\n";
    echo "<pre>" . $e->getMessage() . "</pre>\n";
}
?>
