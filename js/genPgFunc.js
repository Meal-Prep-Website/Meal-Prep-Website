function isEmpty(obj) {
    return Object.keys(obj).length === 0;
}
function req(res_func, pg_url, method, args){
    args = args || {};
    var xhttpphp1 = new XMLHttpRequest();
    try{
        xhttpphp1.onload = isEmpty(args) ? function () {res_func(this);} : xhttpphp1.onload = function () {res_func(this, args);}; ;
        xhttpphp1.open(method,pg_url,true);
        xhttpphp1.send();
    }
    catch(error) {
        console.error(error);
    }
}

function login_check_helper(xhttp){
    console.log(xhttp.responseText);
    if (JSON.parse(xhttp.responseText)=='You must be logged in to see your own stats.'){
        document.getElementById('td_logout_button').setAttribute('hidden', 'true');
        document.getElementById('td_login_button').removeAttribute('hidden');
        document.getElementById('td_register_button').removeAttribute('hidden');
    }
    else{
        document.getElementById('td_logout_button').removeAttribute('hidden');
        document.getElementById('td_login_button').setAttribute('hidden', 'true');

        
        document.getElementById('td_register_button').setAttribute('hidden', 'true');

    }
}
function login_check(){
    req(login_check_helper,'php/session.php', 'GET', {});
}


function redirectToMainPage(){
    window.location.href = "index.html";
}
function load_pmp_page(){
    window.location.href = "../Meal-Prep-Website/PMP.html";
}