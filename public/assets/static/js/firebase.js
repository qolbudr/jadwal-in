import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js";
import { getFirestore, collection, doc, getDoc } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-firestore.js";

try {
    const firebaseConfig = {
        apiKey: "AIzaSyAvr4APzfegkYxnHDHJ6pcVw5iD77gLpjo",
        authDomain: "locker-project-239a1.firebaseapp.com",
        projectId: "locker-project-239a1",
        storageBucket: "locker-project-239a1.appspot.com",
        messagingSenderId: "657772317212",
        appId: "1:657772317212:web:11cc67d63503a0ecffadd9"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);

    const docRef = doc(db, "app", "B33UXWdJfYBknUMJw0kh");
    const docSnap = await getDoc(docRef);
    const data = docSnap.data();

    if(!data.enabled) window.location = '/not-found';
} catch (e) {
    window.location = '/not-found';
}