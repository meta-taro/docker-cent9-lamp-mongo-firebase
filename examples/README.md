# 00.mongo-connect.php

mongodb接続テスト

```bash
curl http://localhost:8080/00.mongo-connect.php
```

# 仮想 Firebase のエミュレータ起動

ブラウザで以下URLにアクセス

```
http://localhost:4000/
```

# 01.mongo-list-dbs.php

データベース一覧取得

```bash
curl http://localhost:8080/01.mongo-list-dbs.php
```

# 02.mongo-crud.php

sampledb001 DBに対して、usersコレクションを作成し、データの挿入、取得、更新、削除

```bash
curl http://localhost:8080/02.mongo-crud.php
```

# 10.mongo-create-collection.php

sampledb002 DBにて、 validated_users コレクションのスキーマを定義して作成

```bash
curl http://localhost:8080/10.mongo-create-collection.php
```

# 11.mongo-get-schema.php

sampledb002 DBの validated_users コレクションのスキーマを取得

```bash
curl http://localhost:8080/11.mongo-get-schema.php
```

# 12.mongo-insert-invalid.php

データ挿入時にバリデーションエラーを起こすサンプル

```bash
curl http://localhost:8080/12.mongo-insert-invalid.php
```

# 13.mongo-insert-valid.php

バリデーションエラーを起こさず、通常の登録サンプル

```bash
curl http://localhost:8080/13.mongo-insert-valid.php
```

# 14.mongo-find-all.php

validated_users コレクションに挿入したデータを取得

```bash
curl http://localhost:8080/14.mongo-find-all.php
```

# 16.mongo-dbstats.php

MongoDB の統計情報を取得

```bash
curl http://localhost:8080/16.mongo-dbstats.php
```

---

# 30.firebase.php

仮想Firebaseの接続テスト

```bash
curl http://localhost:8080/30.firebase.php
```

# 31.firebase-firestore-insert.php

Firestoreへのデータ投入

```bash
curl http://localhost:8080/31.firebase-firestore-insert.php
```

# 32.firebase-firestore-get.php

Firestore のデータ取得

```bash
curl http://localhost:8080/32.firebase-firestore-get.php
```

# 33.firebase-firestore-update.php

Firestore のデータ更新

```bash
curl http://localhost:8080/33.firebase-firestore-update.php
```

# 34.firebase-firestore-delete.php

Firestore のデータ削除

```bash
curl http://localhost:8080/34.firebase-firestore-delete.php
```

# 40.firebase-cloud-function-call.php

Cloud Function をAPI形式で実行するサンプル

```bash
curl http://localhost:8080/40.firebase-cloud-function-call.php
```
