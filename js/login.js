function spa_post() {
    let user = document.getElementById("username").value;
    let pass = document.getElementById("current-password").value;

    arr = { username: user, password: pass };
    document.getElementById("username_err").textContent = '';
    document.getElementById("password_err").textContent = '';
    //arr = '{\'username\':\''+username+'\'},{password:\''+password+'\'}';

    //Create an XMLHttpRequest object
    var xhttp = new XMLHttpRequest();
    console.log(JSON.stringify(arr));
    //Define a callback function (used for async)
    xhttp.onload = function () {
        //process data
        console.log(this.responseText);
        //console.log(JSON.parse(this.responseText));
        let err = this.responseText;
        err = err.replace("\"\"", "*");
        err = err.replace("\"", "");
        err = err.replace("\"", "");
        myArray = err.split("*");
        console.log(myArray);
        myArray.forEach(element => {
            if (element.includes('Please enter username.') || element.includes('No account found with that username.')) {
                document.getElementById('username_err').innerHTML = element;
            }
            else if (element.includes('Please enter your password.') || element.includes('The password you entered was not valid.')) {
                document.getElementById('password_err').innerHTML = element;
            }
            else if (element.includes('Please confirm password.') || element.includes('Password did not match.')) {
                document.getElementById('confirm_password_err').innerHTML = element;
            }
            else {
                document.getElementById('username_err').innerHTML = element;
                redirectToMainPage();
                //document.getElementById('logout_link').removeAttribute('hidden');
            }
        });

    }
    // open object
    xhttp.open("POST", "php/login_mysql.php", true);
    //send request
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + user + "&current-password=" + pass, true);
}
// Add event listeners for the Enter key press on the input fields

document.getElementById("username").addEventListener("keypress", function(event) {
    if (event.keyCode === 13) { // Check if Enter key is pressed
        spa_post(); // Call the function to sign in
        event.preventDefault();
    }
});
document.getElementById("current-password").addEventListener("keypress", function(event) {
    if (event.keyCode === 13) { // Check if Enter key is pressed
        spa_post(); // Call the function to sign in
    }
});