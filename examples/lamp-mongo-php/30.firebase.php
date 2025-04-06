<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

/**
 * Firebase Emulator 用設定
 *
 * - projectId: 任意の ID（Emulator では "demo-project" が推奨）
 * - apiEndpoint: Firestore Emulator のポートに合わせる（デフォルト 8080 or 8088）
 * - credentials: null を指定して認証スキップ
 */

try {
    $firestore = new FirestoreClient([
        'projectId' => 'demo-project',
        'apiEndpoint' => 'localhost:8088',
        'credentials' => null
    ]);

    echo "<h1>✅ Firebase Emulator に接続成功！</h1>\n";
} catch (Exception $e) {
    echo "<h1>❌ Firebase Emulator 接続エラー</h1>\n";
    echo "<pre>" . htmlspecialchars($e->getMessage(), ENT_QUOTES) . "</pre>\n";
}

/**
 * 本番環境用（コメントアウト中）
 *
 * - projectId: 実際の Firebase プロジェクト ID
 * - keyFilePath: Firebase サービスアカウントキーのパス
 */
// $firestore = new FirestoreClient([
//     'projectId' => 'your-production-project-id',
//     'keyFilePath' => '/path/to/firebase-adminsdk.json'
// ]);
 ?>
 