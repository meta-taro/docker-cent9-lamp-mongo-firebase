<?php
/**
 * Firebase Emulator の Cloud Functions へのアクセス例
 *
 * エンドポイント: http://localhost:5001/demo-project/us-central1/helloWorld
 * （emulator 側で functions/helloWorld が有効になっている必要があります）
 */

$endpoint = "http://firebase-emulator-firebase-1:5001/demo-project/us-central1/helloWorld";

// 方法①: file_get_contents (簡易)
$response = @file_get_contents($endpoint);

if ($response === false) {
    echo "<h1>❌ Cloud Function 呼び出し失敗（file_get_contents）</h1>";
} else {
    echo "<h1>✅ Cloud Function 応答</h1>";
    echo "<pre>" . htmlspecialchars($response, ENT_QUOTES) . "</pre>";
}

// 方法②: curl（より安定）
$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curlResponse = curl_exec($ch);

if ($curlResponse === false) {
    echo "<h2>❌ curl エラー: " . curl_error($ch) . "</h2>";
} else {
    echo "<h2>✅ curl 応答:</h2><pre>" . htmlspecialchars($curlResponse, ENT_QUOTES) . "</pre>";
}
curl_close($ch);
?>
