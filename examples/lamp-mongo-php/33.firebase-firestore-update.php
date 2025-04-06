<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$firestore = new FirestoreClient([
    'projectId' => 'demo-project',
    'apiEndpoint' => 'localhost:8088',
    'credentials' => null
]);

$collection = $firestore->collection('users');
$documents = $collection->documents();

foreach ($documents as $doc) {
    $doc->reference()->update([
        ['path' => 'age', 'value' => 31]
    ]);
    echo "<p>✅ " . $doc->id() . " を更新しました。</p>";
}
?>
