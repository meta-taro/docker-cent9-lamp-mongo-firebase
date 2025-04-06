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
    $doc->reference()->delete();
    echo "<p>🗑️ " . $doc->id() . " を削除しました。</p>";
}
?>
