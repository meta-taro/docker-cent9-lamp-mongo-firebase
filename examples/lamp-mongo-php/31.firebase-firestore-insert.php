<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

putenv("FIRESTORE_EMULATOR_HOST=firebase:8088");

$firestore = new FirestoreClient([
    'projectId' => 'demo-project',
    'apiEndpoint' => 'localhost:8088',
    'credentials' => null
]);

$collection = $firestore->collection('users');
$docRef = $collection->add([
    'name' => 'Alice',
    'age' => 30,
    'created_at' => time()
]);

echo "<h1>✅ ドキュメント追加完了</h1>\n";
echo "<p>Document ID: " . htmlspecialchars($docRef->id(), ENT_QUOTES) . "</p>\n";
?>
