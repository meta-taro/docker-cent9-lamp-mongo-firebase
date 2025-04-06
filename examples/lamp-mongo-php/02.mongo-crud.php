<?php
require 'vendor/autoload.php';

/**
 * sampledb001DBに対して、
 * 1. usersコレクションを作成し
 * 2. データ挿入
 * 3. データ取得
 * 4. データ更新
 * 5. データ削除
 * します。
**/
try {
    $client = new MongoDB\Client("mongodb://mongo:27017");
    $collection = $client->sampledb001->users;

    // データ挿入
    $insertResult = $collection->insertOne(['name' => 'Taro', 'email' => 'taro@example.com']);
    echo "<p>挿入: " . $insertResult->getInsertedId() . "</p>\n";

    // データ取得
    $user = $collection->findOne(['name' => 'Taro']);
    echo "<p>取得: " . $user['name'] . " (" . $user['email'] . ")</p>\n";

    // データ更新
    $collection->updateOne(['name' => 'Taro'], ['$set' => ['email' => 'newtaro@example.com']]);
    echo "<p>更新完了</p>\n";

    // データ削除
    $collection->deleteOne(['name' => 'Taro']);
    echo "<p>削除完了</p>\n";

} catch (Exception $e) {
    echo "<h1>エラー: " . $e->getMessage() . "</h1>\n";
}
?>
