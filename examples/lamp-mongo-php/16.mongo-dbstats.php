<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://mongo:27017");
$db = $client->sampledb002;

$stats = $db->command(['dbStats' => 1])->toArray()[0];

echo "<h1>sampledb002 の統計情報</h1>\n<pre>";
print_r($stats);
echo "</pre>\n";

$collStats = $db->command(['collStats' => 'validated_users'])->toArray()[0];
echo "<h1>sampledb002->validated_users の統計情報</h1>\n";
echo "ドキュメント数: " . $collStats['count'] . "\n";
echo "データサイズ: " . $collStats['size'] . " bytes\n";
echo "平均ドキュメントサイズ: " . $collStats['avgObjSize'] . " bytes\n";
?>
