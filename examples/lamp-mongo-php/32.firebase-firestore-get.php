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
$documents = $collection->documents();

echo "<h1>📄 取得したドキュメント一覧</h1>\n";
foreach ($documents as $doc) {
    echo "<pre>";
    print_r($doc->data());
    echo "</pre>";
}
?>
