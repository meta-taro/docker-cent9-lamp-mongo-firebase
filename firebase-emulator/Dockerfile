FROM node:22

# Java for Firestore Emulator（Firestore に必要）
RUN apt-get update && apt-get install -y openjdk-17-jre && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Firebase CLI をグローバルにインストール
RUN npm install -g firebase-tools

# Firebase Functions の作業ディレクトリ
WORKDIR /app/functions

# 依存関係のインストール（package.json + tsconfig.json）
COPY functions/package.json functions/tsconfig.json ./
RUN npm install

# ソースをコピー後に TypeScript をトランスパイル（lib 出力）
COPY functions/src ./src
RUN npm run build || ./node_modules/.bin/tsc

# Firebase Emulator 設定ファイルの配置
WORKDIR /app
COPY firebase.json .

# ポートを公開（エミュレータ UI や各種サービス）
EXPOSE 4000 5001 8088 9099

# Firebase Emulator 起動コマンド
CMD ["firebase", "emulators:start", "--project", "demo-project", "--only", "firestore,auth,functions"]
