<?php
require 'vendor/autoload.php';

use MongoDB\Client;
use MongoDB\Exception\Exception;

try {
    $client = new Client("mongodb://mongo:27017");
    $db = $client->sampledb002;

    $db->dropCollection('validated_users'); // 先に削除
    $db->createCollection('validated_users', [
        'validator' => [
            '$jsonSchema' => [
                'bsonType' => 'object',
                'required' => ['name', 'email'],
                'properties' => [
                    'name' => ['bsonType' => 'string'],
                    'email' => ['bsonType' => 'string'],
                    'age' => ['bsonType' => 'int']
                ]
            ]
        ]
    ]);

    echo "<h1>コレクション作成成功（バリデーション付き）</h1>\n";
} catch (Exception $e) {
    echo "<h1>作成失敗: " . $e->getMessage() . "</h1>\n";
}
