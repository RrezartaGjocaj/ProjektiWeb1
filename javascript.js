function validateLogin() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Ju lutem plotësoni të gjitha fushat!");
        return false;
    }

    if (!email.includes("@")) {
        alert("Email nuk është valid!");
        return false;
    }

    if (password.length < 6) {
        alert("Password duhet të ketë minimum 6 karaktere!");
        return false;
    }

    return true;
}
