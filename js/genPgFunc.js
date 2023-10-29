function isEmpty(obj) {
    return Object.keys(obj).length === 0;
}
function prepArgs(argsArr){
    try{
        let retObj ={};
        //retObj.Object.keys(argsArr[i]) = argsArr[i];
        let objkeys = Object.keys(argsArr);
        for (let i = 0; i< objkeys.length; i++){
            retObj[objkeys[i]] = argsArr[objkeys[i]];
        }
    return retObj;
    }
    catch(error) {
        console.log(error);
    }
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
function FetchMySqlHelper(xhttp, injected_table_name){
    let p = 0;
    let temp= document.getElementById(injected_table_name);                    
    let myObj = JSON.parse(xhttp.responseText);
    console.log(myObj);

    if(document.getElementById('select_person').value==''){
        //gets name
        let c = document.createElement('td');
        let s = document.createElement('span');
        p = 0;
        Array.prototype.slice.call(myObj).forEach(function(obj){
            let o = document.createElement('option');
            o.setAttribute('id','option_'+p)
            o.textContent = obj.person_name;
            temp.getElementsByTagName('tr')[0].getElementsByTagName('select')[0].appendChild(o);
            p++;
        })
        c.appendChild(s);
        temp.getElementsByTagName('tr')[0].appendChild(c);
    }
    else{
        p = 0;
        //delete all data before insertion
        Array.prototype.slice.call(temp.getElementsByTagName('span')).forEach(
            function(item) {
                //this is only used on the person table
                if (p >= 0){
                item.remove();
                }
                p++;
                // or item.parentNode.removeChild(item); for older browsers (Edge-)
            });
        //append meal plans to pmp header to amount of bs and es
        let temp_header = document.getElementById("div_personal_meal_plan_header");
        //extract indexes of meal type names
        indexBreakfasts = -1;
        indexEntrees = -1;
        indexDesserts = -1;
        for (var i = 0; i < myObj.length; i++) {
            if (myObj[i].meal_type_name === "Breakfasts") {
                indexBreakfasts = i; // Assign the index value when validation is successful
            }
            else if (myObj[i].meal_type_name === "Entrees") {
                indexEntrees = i; // Assign the index value when validation is successful
            }
            else if (myObj[i].meal_type_name === "Desserts") {
                indexDesserts = i; // Assign the index value when validation is successful
            }
        }
        let b_count = myObj[indexBreakfasts].meal_type_amount;
        let e_count = myObj[indexEntrees].meal_type_amount;
        let d_count = myObj[indexDesserts].meal_type_amount;
        p = 0;
        while(b_count > p){
            let temp_s = document.createElement('span');
            temp_s.setAttribute('class','span_meal_type_non_clickable_button');
            temp_s.textContent = 'B'+(p+1);
            temp_header.appendChild(temp_s);
            p++;
        }
        p = 0;
        while(e_count > p){
            let temp_s = document.createElement('span');
            temp_s.setAttribute('class','span_meal_type_non_clickable_button');
            temp_s.textContent = 'E'+(p+1);
            temp_header.appendChild(temp_s);
            p++;
        }
        p = 0;
        while(d_count > p){
            let temp_s = document.createElement('span');
            temp_s.setAttribute('class','span_meal_type_non_clickable_button');
            temp_s.textContent = 'D'+(p+1);
            temp_header.appendChild(temp_s);
            p++;
        }
        let temp_s = document.createElement('span');
        temp_s.setAttribute('class','span_meal_type_clickable_button');
        temp_s.setAttribute('onclick','load_pmp_page();');
        temp_s.textContent = 'View All';
        temp_header.appendChild(temp_s);
    }
}
function FetchMySql(injected_table_name,sql_table_name, name){
    console.log(sql_table_name);
        //loading in php
    var xhttpphp = new XMLHttpRequest();
    xhttpphp.onload = function(){FetchMySqlHelper(this, injected_table_name)};
    console.log(name);
    console.log(document.getElementById('select_person').value);
    if (document.getElementById('select_person').value == '' && attempts < maxAttempts){
        xhttpphp.open("GET","php/GetData.php?meal_page=\"false\"&table_name="+sql_table_name+"&name=NULL",true);
        attempts++;
        xhttpphp.onloadend=function(){FetchMySql(injected_table_name,sql_table_name, document.getElementById('select_person').value);};
    }
    else{
        xhttpphp.open("GET","php/GetData.php?meal_page=\"false\"&table_name="+sql_table_name+"&name="+name,true);
    }
    xhttpphp.send();

}