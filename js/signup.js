function spa_post(){
    let user = document.getElementById("username").value;
    let pass = document.getElementById("current-password").value;
    let conf_pass = document.getElementById("confirm_password").value;
    document.getElementById("username_err").textContent='';
    document.getElementById("password_err").textContent='';
    document.getElementById("confirm_password_err").textContent='';
    arr = {username:user, password:pass, confirm_password:conf_pass};

    //arr = '{\'username\':\''+username+'\'},{password:\''+password+'\'}';
    
    //Create an XMLHttpRequest object
    var xhttp = new XMLHttpRequest();
    console.log(JSON.stringify(arr));
    //Define a callback function (used for async)
    xhttp.onload=function(){
        //process data
        console.log(this.responseText);
        //console.log(JSON.parse(this.responseText));
        console.log(this.responseText);
        let err = this.responseText;
            err = err.replace("\"\"", "*");
            err = err.replace("\"", "");
            err = err.replace("\"", "");
            myArray = err.split("*");
            console.log(myArray);
            myArray.forEach(element => {
                if(element.includes("Please enter a username.")||element.includes("This username is already taken.")){
                    document.getElementById('username_err').innerHTML =element;
                }
                else if(element.includes("Please enter a password.")||element.includes("Password must have atleast 6 characters.")){
                    document.getElementById('password_err').innerHTML = element;
                }
                else if(element.includes('Please confirm password.')||element.includes('Password did not match.')){
                    document.getElementById('confirm_password_err').innerHTML = element;
                }
                else{
                    document.getElementById('username_err').innerHTML =element;
                }
            });
    
    }
    // open object
    xhttp.open("POST","php/register_mysql.php", true);
    //send request
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username="+user+"&current-password="+pass+"&confirm_password="+conf_pass,true);

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
document.getElementById("confirm_password").addEventListener("keypress", function(event) {
    if (event.keyCode === 13) { // Check if Enter key is pressed
        spa_post(); // Call the function to sign in
    }
});