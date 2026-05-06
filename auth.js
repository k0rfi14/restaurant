// REGISTER
function register() {
    let email = document.getElementById("regEmail").value;
    let password = document.getElementById("regPassword").value;

    if (!email || !password) {
        alert("Please fill in all fields");
        return;
    }

    let users = JSON.parse(localStorage.getItem("users")) || [];

    let exists = users.find(u => u.email === email);
    if (exists) {
        alert("User already exists!");
        return;
    }

    users.push({ email, password });
    localStorage.setItem("users", JSON.stringify(users));

    alert("Account created successfully!");
    window.location.href = "index.html";
}


// LOGIN
function login() {
    let email = document.getElementById("loginEmail").value;
    let password = document.getElementById("loginPassword").value;

    let users = JSON.parse(localStorage.getItem("users")) || [];

    let validUser = users.find(u => u.email === email && u.password === password);

    if (validUser) {
        localStorage.setItem("loggedIn", email);
        window.location.href = "dashboard.html";
    } else {
        alert("Invalid email or password!");
    }
}


// LOGOUT / BACK OUT
function backOut() {
    let confirmExit = confirm("Do you want to log out?");
    if (confirmExit) {
        localStorage.removeItem("loggedIn");
        window.location.href = "index.html";
    }
}


// BACK BUTTON
function goBack() {
    window.history.back();
}
