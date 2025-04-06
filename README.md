# LAMP + MongoDB + Firebase Emulator 開発環境（Docker）

このリポジトリは、**LAMP（CentOS9）+ MongoDB + Firebase Emulator** をローカルまたはVPSで立ち上げて試せる、学習・開発用の Docker 環境テンプレートです。

## 📦 構成内容

| ディレクトリ名 | 内容 |
|----------------|------|
| `lamp-mongo/` | CentOS9ベースのApache + PHP + MongoDB構成 |
| `firebase-emulator/` | Firestore / Functions / Auth などを含むFirebaseエミュレータ構成 |

---

## 🚀 使用方法

### 1. LAMP + MongoDB の起動

```bash
cd /..DOKOKANO PATH../docker-cent9-lamp-mongo-firebase/
docker compose -f lamp-mongo/docker-compose.yml build
docker compose -f lamp-mongo/docker-compose.yml up -d
```

- gRPCを入れているので、3000s程度ビルドにかかります。FIREBASE環境が不要の場合は、Dockerfileの「pecl install grpc」辺りを削ってください。
- ブラウザで http://localhost:8080 にアクセスすると、PHP動作確認画面（phpinfo）が表示されます。
- MongoDB には mongodb://mongo:27017 で接続可能です。

### 2. Firebase Emulator の起動

```bash
cd /..DOKOKANO PATH../docker-cent9-lamp-mongo-firebase/
docker compose -f firebase-emulator/docker-compose.yml build
docker compose -f firebase-emulator/docker-compose.yml up -d
```

- Firestore / Functions / Auth などを含む Firebase のローカルテスト環境を構築します。
- エミュレーターUIは http://localhost:4000 で確認できます。

---

🔧 Firebase Functions のトランスパイル（TypeScript）
Firebase Functions は TypeScript で記述されているため、初回起動後にトランスパイル（ビルド）が必要です。

```bash
docker compose -f firebase-emulator/docker-compose.yml exec firebase npx tsc
```

このコマンドで functions/src/ 以下の TypeScript コードが functions/lib/ にコンパイルされます。
成功すると、以下のような URL で Cloud Functions にアクセスできるようになります。

```bash
curl http://localhost:5001/demo-project/us-central1/helloWorld
```

---

## 🛠 前提条件

- Docker がインストールされていること
- docker compose コマンドが使用できること（v2系推奨）

---

## 📌 補足メモ

- LAMP環境は CentOS9 ベースで構築しています。
- Firebase Emulator は、ローカル開発に特化した仮想Firebase環境です。
- セキュリティ的には **本番公開には使用しないでください**。

---

## ✨ 追加スクリプト（examples/ 以下）

- `examples/lamp-mongo-php/0系`：MongoDB 基本操作、動作確認
- `examples/lamp-mongo-php/10系`：MongoDB スキーマ設定やエラーの判定の確認
- `examples/lamp-mongo-php/30系`：PHP から Firestore 接続テストなど
- `examples/lamp-mongo-php/40系`：PHP から Functions 接続テスト
- `firebase-emulator/functions/src`：Functions テスト用 Node.js コード
