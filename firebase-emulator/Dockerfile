FROM node:22

# Java for Firestore Emulator
RUN apt-get update && apt-get install -y openjdk-17-jre && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Firebase CLI をグローバルにインストール
RUN npm install -g firebase-tools

# Firebase Functions の作業ディレクトリ
WORKDIR /app/functions

# 依存定義ファイルを先にコピー
COPY functions/package.json functions/tsconfig.json ./

# 依存をインストール（tsc もここで入る）
RUN npm install

# TypeScript ソースコードをコピー
COPY functions/src ./src

# TypeScript をビルド
RUN npm run build

# firebase.json を配置
WORKDIR /app
COPY firebase.json .

EXPOSE 4000 5001 8088 9099

# Firebase Emulator を起動
CMD ["firebase", "emulators:start", "--project", "demo-project", "--only", "firestore,auth,functions"]
