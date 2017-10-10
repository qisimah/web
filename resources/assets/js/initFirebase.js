const firebase = require('firebase');
class initFirebase{

    constructor(){
        return firebase.initializeApp({
            apiKey: "AIzaSyCjWmI30jBmMU4tTrThcn4qpGnYcvpZ7kU",
            authDomain: "qisimah-4403d.firebaseapp.com",
            databaseURL: "https://qisimah-4403d.firebaseio.com",
            projectId: "qisimah-4403d",
            storageBucket: "qisimah-4403d.appspot.com",
            messagingSenderId: "744307183277"
        });
    }
}

$initfirebase = new initFirebase();