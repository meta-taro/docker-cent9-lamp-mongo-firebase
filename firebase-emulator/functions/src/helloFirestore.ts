import * as functions from "firebase-functions";
import * as admin from "firebase-admin";

admin.initializeApp();
const db = admin.firestore();

export const helloFirestore = functions.https.onRequest(async (req, res) => {
  await db.collection("test").add({
    msg: "Hello Firestore!",
    timestamp: Date.now()
  });
  res.send("Document written!");
});
