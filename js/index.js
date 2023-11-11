function FetchMySqlIndex(table_name, name){
    let p = 0;
    let temp= document.getElementById('category_menu');


                    
        //loading in php
        var xhttpphp = new XMLHttpRequest();
        xhttpphp.onload = function(){
            console.log(this.responseText);
                let class_name= ' ';
                myObj = JSON.parse(this.responseText);
                myObjLength = 0;
                let list_arr = [];
                let insert_table = ' ';
                console.log(myObj);
                
                if (table_name == 'meal_types'){

                        myObjLength= myObj.length
                        for (let i = 0; i < myObjLength; i++){
                            temp_list_arr=(myObj[i].generic_meal_name)
                            list_arr=list_arr.concat(temp_list_arr);
                        }
                        
                    class_name= 'td_category_menu_item';
                    insert_table = 'category_menu';
                }
                //clears category list upon category selection
                
                Array.prototype.slice.call(temp.getElementsByTagName('tr')).forEach(
                    function(item) {

                        if (p > 0){
                        item.remove();
                        }
                        p++;
                        // or item.parentNode.removeChild(item); for older browsers (Edge-)
                    });
                    
                //loop to create x by y textboxes for Matrix A
                for (let i = 0; i < myObjLength; i++){
                    let r = document.createElement('tr');
                    

                    for(let j = 0; j < 1; j++){
                        let c = document.createElement('td');
                        if (i==0){
                            c.setAttribute('class', 'first '+class_name)
                        }
                        else if(i+1 == myObjLength){
                            c.setAttribute('class', 'last '+class_name);
                        }
                        else{
                            c.setAttribute('class', class_name)
                        }

                        c.innerText= list_arr[i];
                        r.appendChild(c);

                    }
                    r.setAttribute('onclick','load_meal_page(textContent);');
                    document.getElementById('category_menu').appendChild(r);

                }
                let button_id_name = 'span_remove_button';
                document.getElementById(button_id_name).removeAttribute('style');
                button_id_name = 'span_add_button';
                document.getElementById(button_id_name).removeAttribute('style');                    
                button_id_name = 'span_edit_button';
                document.getElementById(button_id_name).removeAttribute('style');
        }
        xhttpphp.open("GET","php/GetData.php?meal_page=false&table_name="+table_name+"&name="+name,true);
        xhttpphp.send();
}
function CUD(table_name,operation_type,old_name,old_cat,new_name,new_cat){
    //i should store the category of which the operations were conducted
        //only one edit shluld be conducted at a time
     //loading in php

     var xhttpphp = new XMLHttpRequest();
        xhttpphp.onload = function(){
            console.log(this.responseText);

        }
        if(operation_type == 'update'){
            
            let tempCat;
            let p1 = 0;
            //create options here
            Array.prototype.slice.call(document.getElementsByClassName('td_meal_type_menu_item')).forEach(
            function(item) {

                if (p1 > 0){
                    if(item.getAttribute('style') != null){
                        tempCat = item.id;
                    }
                }
                p1++;
                // or item.parentNode.removeChild(item); for older browsers (Edge-)
            });
            let tempName;
            let p2 = 0;
            //create options here
            Array.prototype.slice.call(document.getElementsByClassName('tr_category_menu_item_edit')).forEach(
            function(item) {

                if (p1 > 0){
                    //console.log(item.getAttribute('hidden'));
                    if(item.getAttribute('hidden') == 'hidden'){
                        tempName = item.getElementsByClassName('td_category_menu_item')[0].textContent;
                        //console.log(tempName);
                        old_name = tempName;
                    }
                }
                p1++;
                // or item.parentNode.removeChild(item); for older browsers (Edge-)
            });

            //find which category the selected name belongs too
            let current_cat = '';
            // Loop through myObj array
            for (var i = 0; i < myObj.length; i++) {
                // Check if generic_meal_name includes category_name
                if (myObj[i].generic_meal_name.includes(old_cat)) {
                    // Assign category name to current_cat variable
                    current_cat = myObj[i].meal_type_name;
                    break; // Exit the loop if found (optional)
                }
            }
            
            if(myObj.length>1&&current_cat=='Breakfasts'){
                console.log(myObj.length);
                old_cat = 'Breakfasts';
            }
            if(myObj.length == 1&& tempCat == 'td_breakfasts_button'){
                old_cat = 'Breakfasts';
            }

            if(myObj.length>1&&current_cat=='Entrees'){
                old_cat = 'Entrees';
            }
            if(myObj.length == 1&& tempCat == 'td_entrees_button'){
                old_cat = 'Entrees';
            }

            if(myObj.length>1&&current_cat=='Desserts'){
                old_cat = 'Desserts';
            }
            if(myObj.length == 1&& tempCat == 'td_desserts_button'){
                old_cat = 'Desserts';
            }
            console.log(old_name);
            console.log(old_cat);
            console.log(new_name);
            console.log(new_cat);
            
            xhttpphp.open("GET","php/CUD.php?table_name="+table_name+"&operation_type="+operation_type+"&old_name="+old_name+"&old_cat="+old_cat+"&new_name="+new_name+"&new_cat="+new_cat,true);
        }
        else if(operation_type == 'create'){
            console.log(old_name);
            xhttpphp.open("GET","php/CUD.php?table_name="+table_name+"&operation_type="+operation_type+"&old_name="+old_name+"&old_cat="+old_cat,true);
        }
        else if(operation_type == 'delete'){
            xhttpphp.open("GET","php/CUD.php?table_name="+table_name+"&operation_type="+operation_type+"&old_name="+old_name,true);
        }
        xhttpphp.send();
        location.reload();
}
function sort_table(b, o){
    by = b; 
    order = o; 
    //FetchMySqlIndex();
}
function dynamic_page_change(button_id_name,all_menu_items_class_name,table_name){
    var elms = document.getElementsByClassName(all_menu_items_class_name);

    //clears styles of all elements with the same class name
    if(all_menu_items_class_name == 'span_crud_button'){
        let checkVar = document.getElementById(button_id_name).getAttribute('style');
        //a CUD button was clicked previously and this will wipe the traces of the other dselecrted crud
        if (checkVar != null){

            //clears styles of all elements with the same class name
            for (var i = 0; i < elms.length; i++) {
                    elms[i].removeAttribute("style");
            }

            //cancel all setps of the selected operation
            //add
            let eleTemp=  document.getElementById('add_button_row');
            if(eleTemp){
                document.getElementById('add_button_row').remove();
            }
            //edit
            //delete all edit stuff
            p = 0;
            temp = document.getElementById('category_menu');
            Array.prototype.slice.call(temp.getElementsByClassName('class_add_button_row')).forEach(
            function(item) {
                    item.remove();
                // or item.parentNode.removeChild(item); for older browsers (Edge-)
            });
            //unhide value replaced with text
            p = 0;
            temp = document.getElementById('category_menu');
            Array.prototype.slice.call(temp.getElementsByTagName('tr')).forEach(
            function(item) {

                if (p > 0){
                    item.setAttribute('onclick','load_meal_page()');
                    item.removeAttribute('class');
                    item.removeAttribute('hidden');
                }
                p++;
                // or item.parentNode.removeChild(item); for older browsers (Edge-)
            });

        }

        else{
            //add
            eleTemp=  document.getElementById('add_button_row');
            if(eleTemp!=null){
                document.getElementById('add_button_row').remove();
            }
            //edit
            //delete all edit stuff
            eleTemp=  document.getElementsByClassName('class_add_button_row')[0];
            if(eleTemp!=null){
                p = 0;
                temp = document.getElementById('category_menu');
                Array.prototype.slice.call(temp.getElementsByClassName('class_add_button_row')).forEach(
                function(item) {
                        item.remove();
                    // or item.parentNode.removeChild(item); for older browsers (Edge-)
                });
                //unhide value replaced with text
                p = 0;
                temp = document.getElementById('category_menu');
                Array.prototype.slice.call(temp.getElementsByTagName('tr')).forEach(
                function(item) {

                    if (p > 0){
                        item.setAttribute('onclick','load_meal_page()');
                        item.removeAttribute('class');
                        item.removeAttribute('hidden');
                    }
                    p++;
                    // or item.parentNode.removeChild(item); for older browsers (Edge-)
                });
            }
            //clears styles of all elements with the same class name
            for (var i = 0; i < elms.length; i++) {
                    elms[i].removeAttribute("style", "");
            }

            document.getElementById(button_id_name).setAttribute('style','background-color:'+document.defaultView.getComputedStyle(document.getElementById(button_id_name), "").getPropertyValue('color')+';color:#FAFAFA;');//border-bottom: 2px solid #939799; border-top: 2px solid #939799; ');
            
            //call operation selection function
            if (button_id_name == 'span_add_button'){add_meal_type();}
            else if (button_id_name == 'span_edit_button'){edit_meal_type();}
            else if (button_id_name == 'span_remove_button'){remove_meal_type();}


        }
    }
    else{

        //clears styles of all elements with the same class name
        for (var i = 0; i < elms.length; i++) {
                elms[i].removeAttribute("style");
        }

        document.getElementById(button_id_name).setAttribute('style','background-color:#d3d3d3;');//border-bottom: 2px solid #939799; border-top: 2px solid #939799; ');
    }

    //update page data in given table
    if (table_name == 'table_meal_type_menu'){
        //change 'Popular Meals' section to 'Meals' and add a category section called 'Categories' and
        //default select to all, update categories section with all generic meal types.  
    }
}
function load_meal_page(generic_meal_name){
    window.location.href = "../Meal-Prep-Website/meal.html?generic_meal_name=" + encodeURIComponent(generic_meal_name);
}
function add_meal_type(){
    //if(add_bool == false){
    //this should add a textbox at the top of the category table and upon clikcing away, or pressing enter, the entry will be inputted and
    //reordered, as it will go into the database.
    //a category, breakfast, entree, or dessert must also be assigned.
    //a textbox must be created along with the attribute of clickaway, it should call a function to insert it into
    //the category list
    //ok button to click
    //a category select should be allowed to select an categorize the meal
    //the button will not work unless the category is specified
    class_name= 'td_category_menu_item';

    let insert_after_element = document.getElementById('tr_category_menu_header'); 
    let temp_tr = document.createElement('tr');
    let temp_td = document.createElement('td');
    let temp_input_textbox = document.createElement('input');
    let temp_form = document.createElement('form');
    let temp_select = document.createElement('select');
    let temp_option = document.createElement('option');
    let temp_input_button = document.createElement('input');
    let temp_br = document.createElement('br');

    //select button
    temp_select.setAttribute('id','add_category_selector');

    //enter button
    temp_input_button.setAttribute('type', 'button');
    temp_input_button.value = 'Enter';
    temp_input_button.setAttribute('id','button_new_category');
    temp_input_button.setAttribute('onclick','CUD(\'meal_types\',\'create\',document.getElementById(\'textbox_add\').value,document.getElementById(\'add_category_selector\').value);');

    //textbox
    temp_input_textbox.addEventListener('keypress',function(event){
        if(event.keyCode === 13){
            document.getElementById('button_new_category').click();
            this.blur();
            event.preventDefault();
        }
    });
    temp_input_textbox.setAttribute('id','textbox_add');

    //create options here
    let tempVal;
    let p1 = 0;
    //create options here
    Array.prototype.slice.call(document.getElementsByClassName('td_meal_type_menu_item')).forEach(
    function(item) {

        if (p1 > 0){
            if(item.getAttribute('style') != null){
                tempVal = item.id;
            }
        }
        p1++;
        // or item.parentNode.removeChild(item); for older browsers (Edge-)
    });

    temp_option.textContent = 'Breakfasts';

    if(tempVal == 'td_breakfasts_button'){
        temp_option.setAttribute('selected','selected');
    }
    temp_select.appendChild(temp_option);

    temp_option = document.createElement('option');
    temp_option.textContent = 'Entrees';

    if(tempVal == 'td_entrees_button'){
        temp_option.setAttribute('selected','selected');
    }
    temp_select.appendChild(temp_option);

    temp_option = document.createElement('option');
    temp_option.textContent = 'Desserts';

    if(tempVal == 'td_desserts_button'){
        temp_option.setAttribute('selected','selected');
    }
    temp_select.appendChild(temp_option);

    temp_form.appendChild(temp_input_textbox);
    temp_form.appendChild(temp_br);

    temp_form.appendChild(temp_select);
    temp_form.appendChild(temp_input_button);
    temp_td.appendChild(temp_form);

    temp_td.setAttribute('class', 'first '+class_name);

    temp_tr.setAttribute('id', 'add_button_row')
    temp_tr.appendChild(temp_td);


    insert_after_element.after(temp_tr);
    
    add_bool = true;
    //}
}
function edit_meal_type(){
    //add edit button to the side of each meal name
    let p = 0;
    let temp= document.getElementById('category_menu');
    //clears category list upon category selection
    Array.prototype.slice.call(temp.getElementsByTagName('tr')).forEach(
    function(item) {

        if (p > 0){
        item.setAttribute('class','tr_category_menu_item_edit');

        item.setAttribute('onclick','edit_selected(this.textContent);');

        }
        p++;
        // or item.parentNode.removeChild(item); for older browsers (Edge-)
    });
}
function remove_meal_type(){
    // add remove button tot he side of each meal name
    let p = 0;
    let temp= document.getElementById('category_menu');
    //clears category list upon category selection
    Array.prototype.slice.call(temp.getElementsByTagName('tr')).forEach(
    function(item) {

        if (p > 0){
        item.setAttribute('class','tr_category_menu_item_remove');
        item.setAttribute('onclick','remove_selected(this.textContent)');

        }
        p++;
        // or item.parentNode.removeChild(item); for older browsers (Edge-)
    });
    }
function edit_selected(category_name){
    //input the check so only 1 edit at a time here
    let check_edit = document.getElementsByClassName('class_add_button_row')[1];
    //double click of edit resets the button to only have 1 category selected
    document.getElementById('span_edit_button').click();
    document.getElementById('span_edit_button').click();

    //console.log(check_edit);
    class_name= 'td_category_menu_item';

    let insert_after_element = document.getElementById('tr_category_menu_header'); 
    let temp_tr = document.createElement('tr');
    let temp_td = document.createElement('td');
    let temp_input_textbox = document.createElement('input');
    let temp_form = document.createElement('form');
    let temp_select = document.createElement('select');
    let temp_option = document.createElement('option');
    let temp_input_button = document.createElement('input');
    let temp_br = document.createElement('br');

    //select button
    temp_select.setAttribute('id','edit_category_selector');

    //enter button
    temp_input_button.setAttribute('type', 'button');
    temp_input_button.value = 'Enter';
    temp_input_button.setAttribute('id','button_new_category');
    temp_input_button.setAttribute('onclick','CUD(\'meal_types\',\'update\',\'\',\'\',document.getElementById(\'textbox_edit\').value,document.getElementById(\'edit_category_selector\').value);');

    //textbox
    temp_input_textbox.addEventListener('keypress',function(event){
        if(event.keyCode === 13){
            document.getElementById('button_new_category').click();
            this.blur();
            event.preventDefault();
        }
    });
    temp_input_textbox.value = category_name;
    temp_input_textbox.setAttribute('id','textbox_edit');

    
    let tempVal;
    let p1 = 0;
    //create options here
    Array.prototype.slice.call(document.getElementsByClassName('td_meal_type_menu_item')).forEach(
    function(item) {

        if (p1 > 0){
            if(item.getAttribute('style') != null){
                tempVal = item.id;
            }
        }
        p1++;
        // or item.parentNode.removeChild(item); for older browsers (Edge-)
    });
    //find which category the selected name belongs too
    let current_cat = '';
    // Loop through myObj array
    for (var i = 0; i < myObj.length; i++) {
        // Check if generic_meal_name includes category_name
        if (myObj[i].generic_meal_name.includes(category_name)) {
            // Assign category name to current_cat variable
            current_cat = myObj[i].meal_type_name;
            break; // Exit the loop if found (optional)
        }
    }
    temp_option.textContent = 'Breakfasts';
    
    if(temp_option.textContent == current_cat){
        temp_option.setAttribute('selected','selected');
    }
    if(myObj.length == 1&& tempVal == 'td_breakfasts_button'){
        temp_option.setAttribute('selected','selected');
    }
    
    temp_select.appendChild(temp_option);

    temp_option = document.createElement('option');
    temp_option.textContent = 'Entrees';
    
    if(temp_option.textContent == current_cat){
        temp_option.setAttribute('selected','selected');
    }
    if(myObj.length == 1&& tempVal == 'td_entrees_button'){
        temp_option.setAttribute('selected','selected');
    }
    
    temp_select.appendChild(temp_option);

    temp_option = document.createElement('option');
    temp_option.textContent = 'Desserts';
    
    if(temp_option.textContent == current_cat){
        temp_option.setAttribute('selected','selected');
    }
    if(myObj.length == 1&& tempVal == 'td_desserts_button'){
        temp_option.setAttribute('selected','selected');
    }
    
    temp_select.appendChild(temp_option);

    temp_form.appendChild(temp_input_textbox);
    temp_form.appendChild(temp_br);
    

    temp_form.appendChild(temp_select);
    temp_form.appendChild(temp_input_button);
    temp_td.appendChild(temp_form);

    temp_td.setAttribute('class', 'first '+class_name);

    temp_tr.setAttribute('class', 'class_add_button_row')
    temp_tr.appendChild(temp_td);
    
    //hide the current listing and create an edit of a new one in its place
    //scan through all category names and check which holds the category name in textContent
    //grab that element and add attribute hidden and append the edit content below this element
    //when edit is deselected unhide all hidden and delete all edit content
    let p = 0;
    let temp = document.getElementById('category_menu');
    Array.prototype.slice.call(temp.getElementsByTagName('tr')).forEach(
    function(item) {

        if (p > 0){
            if(item.textContent == category_name){
                item.setAttribute('hidden','hidden');
                item.after(temp_tr);
            }
        }
        p++;
        // or item.parentNode.removeChild(item); for older browsers (Edge-)
    });
}
function remove_selected(category_name){
    document.getElementById("span_name_overlay").textContent = category_name;
    document.getElementById("overlay").style.display = "block";
}
function delete_category(name){
    //remove overlay
    document.getElementById("overlay").style.display = "none";
    //delete category && //refresh page
    CUD('meal_types','delete',name,'');
}
function load_pmp_page(){
    window.location.href = "../Meal-Prep-Website/PMP.html";
}