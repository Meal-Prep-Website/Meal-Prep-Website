async function login_check(){
            var xhttpphp1 = new XMLHttpRequest();
            xhttpphp1.onload = function(){
                console.log(this.responseText);
                let myObj = JSON.parse(this.responseText);

                    if (JSON.parse(this.responseText)=='You must be logged in to see your own stats.'){
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
            xhttpphp1.open("GET","php/session.php?",true);
            xhttpphp1.send();
        }