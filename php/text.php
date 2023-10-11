<?php
//***Ingredient Class***//
class ingredient extends food_product{
    
    $name;
    $food_products;
    $num_food_products;
    $id_num;
    $cost;
    /*
    //set
    function set_id_num ($num);
    function set_name($s);
    function set_multiple_food_products($arr_food_product);
    function set_food_product($temp_food_product);
    function set_all_food_products($fp);
    function set_cost($num);
    //get
    function get_id_num ();
    function get_name ();
    //food_product get_food_product(food_product temp_food_product);
    functionget_all_food_products();
    $get_num_food_products();
    functionget_food_product_by_id($num);
    function get_cost();
    //methods
    function print_all_food_products();
    //constructor
    */
    function __constructor(){
        $this->name = "";
        $this->food_products = NULL;
        $this->num_food_products = 0;
        $this->id_num = -1;
        $this->cost = 0;
    }
    function set_cost ($num){
        $cost =$num;
    }
    function get_cost (){
        return cost;
    }
    function set_all_food_products($fp){
        $food_products = $fp;
    }
    function set_id_num ($num){
        $id_num =$num;
    }
    function get_id_num (){
        return $id_num;
    }
    function set_name ($s){
        $name = $s;
    }
    function get_name (){
        return $name;
    }
    function set_multiple_food_products ($arr_food_products){
    
        //cannot track array size
        //food_products = new food_product[5];
        $food_products = $arr_food_products;
        $num_food_products = *(&$food_products + 1) - $food_products;
    
        
    }
    function ingredient::set_food_product ($temp_food_product){
        $temp_food_product.set_id_num($this->num_food_products);
        $this->num_food_products = $this->num_food_products+1;
        $temp_arr = NULL;
        $temp_arr = new food_product[$this->num_food_products];
        for( $i = 0; $i <$num_food_products-1; $i++){
            $temp_arr[$i] = $food_products[i];
        }
        $temp_arr[$num_food_products-1] = $temp_food_product;
        $food_products = $temp_arr;
        //delete [] temp_arr;
    }
    function get_food_product_by_id($num){
            return $food_products[$num];
    }
    /*food_product ingredient::get_food_product(ingredient temp_food_product){
        return food_products[];
    }*/
    function get_all_food_products(){
        return $food_products;
    }
    function get_num_food_products(){
        return $num_food_products;
    }
    /*
    function ingredient:: print_all_food_products(){
        std::cout << "All Food Products for (" << name << "): " <<endl;
        for ($i =0; i <$num_food_products; i++){ 
            std::cout << food_products[i].food_product::get_name() << endl;
        }
    }
    */
}


/***Specific Meal Class***/
class specific_meal extends ingredient  {
    //$* servings_per_ingredient;
    
    $name;
    $ingredients;
    $num_ingredients;
    $id_num;
    $grams_needed_per_ingredient;
    $nutrition_facts [$NFACTS];
    $cost_per_ingredient;
    $cost_per_specific_meal;
    $total_grams_of_specific_meal;
    
    /*
    //set
    function set_id_num ($num);
    function set_name ($s);
    function set_grams_needed_per_ingredient($arr_grams_needed_per_ingredient);
    function set_multiple_ingredients($arr_ingredients);
    function set_ingredient($temp_ingredient, $grams_needed);
    function set_grams_needed_per_ingredient_by_id($id_num, $grams);
    function set_nutrition_facts();
    function set_nutrition_fact($func_get, $func_set, $func_getpg);
    function set_daily_value_percentage($func_set,$func_get, $func_get_dv);    
    function set_daily_value_percentages();
    function set_nutrition_facts_and_daily_values();
    function set_nutrition_facts_by_adding_portioned_ingredients_nutrition_facts();
    function set_cost_per_ingredient();
    function set_cost_per_specific_meal();
    //get
    function get_id_num ();
    function get_name ();
    function get_grams_needed_per_ingredient();
    function get_ingredients();
    function get_num_ingredients();
    function get_ingredient_by_id($num);
    function get_grams_needed_per_ingredient_by_id($id_num);
    function get_nutrition_facts();
    function get_cost_per_ingredient();
    function get_cost_per_ingredient_by_id($id);
    function get_cost_per_specific_meal();
    function get_total_grams_of_specific_meal();
    //other methods
    function print_servings_per_ingredient();
    function print_nutrition_fact($str, $func_get,$func_get_dvp);
    function print_nutrition_facts();
    function print_grams_and_cost_of_ingredients();
    function pick_ingredients_from_food_products();
    function meet_calorie_requirement($calorie_restriction, $num_meal_types, $grams_needed_per_ingredient);
    //constructor
    specific_meal();
    */
    __constructor(){
        //food_product();
        $this->name = "";
        $this->ingredients = NULL;
        $this->num_ingredients = 0;
        $this->id_num = -1;
        $this->grams_needed_per_ingredient = NULL;
        $this->cost_per_ingredient = NULL;
        $this->total_grams_of_specific_meal = 0;
    }
    function get_total_grams_of_specific_meal(){
        return $total_grams_of_specific_meal;
    }
    function meet_calorie_requirement($calorie_restriction, $num_meal_types, $grams_needed_per_ingredient){
        $percent_from_100= 1;
        $total_cal = 0;
            while((get_calories_per_serving()> ($calorie_restriction/$num_meal_types)) && ($percent_from_100 > .15)){
                $percent_from_100= $percent_from_100- .01;
                for ($l = 0; $l < get_num_ingredients(); $l++){
                    if (!get_ingredient_by_id($l).get_food_product_by_id(0).get_indivisible_bool()){
                    set_grams_needed_per_ingredient_by_id($l,$grams_needed_per_ingredient[$l]*$percent_from_100);                    
                    }                
                    $total_cal+= get_grams_needed_per_ingredient_by_id($l)*get_ingredient_by_id($l).get_food_product_by_id(0).get_calories_per_gram();
                }
                set_calories_per_serving($total_cal);
                $total_cal = 0;
    
            }
        set_cost_per_ingredient();
        set_cost_per_specific_meal();
    }
    function set_cost_per_specific_meal(){
        //add up cost of all ingredients
        $temp_num = 0;
        for ($l = 0; $l < get_num_ingredients(); $l++){ 
            $temp_num += $cost_per_ingredient[l];
        }
        $cost_per_specific_meal = $temp_num;
    }
    function get_cost_per_specific_meal(){
        return $cost_per_specific_meal;
    }
    function set_cost_per_ingredient(){
    
        $temp_arr_double2 = NULL;
        //cost_per_ingredient
        $temp_arr_double2 = new double[$this->$num_ingredients];
        for($i = 0; $i < get_num_ingredients(); $i++){
            $temp_arr_double2[$i] = get_grams_needed_per_ingredient_by_id($i)*get_ingredient_by_id($i).get_food_product_by_id(0).get_cost_per_gram();
        }
    
        $cost_per_ingredient = $temp_arr_double2;
    
    }
    function get_cost_per_ingredient(){
        return $cost_per_ingredient;
    }
    function get_cost_per_ingredient_by_id($id){
        return $cost_per_ingredient[$id];
    }
    
    function pick_ingredients_from_food_products(){
        $temp_calories_per_gram = 0;
        $lowest_calories_per_gram = 0;
        $lowest_id_num = 0;
        //pick lowest calorie ingredient function
        //cycle ingredients
        for ($l = 0; $l < get_num_ingredients(); $l++){
            
            //cycle food_products
            for ($m = 0; $m < get_ingredient_by_id($l).get_num_food_products(); $m++){
                
                //calories/grams per serving
                $temp_calories_per_gram = get_ingredient_by_id($l).get_food_product_by_id($m).get_calories_per_serving()/get_ingredient_by_id($l).get_food_product_by_id($m).get_grams_per_serving();
                if($temp_calories_per_gram< $lowest_calories_per_gram){
                    $lowest_calories_per_gram = $temp_calories_per_gram;
                    $lowest_id_num = $m;
                } 
            }
            if( get_ingredient_by_id($l).get_num_food_products()>1){
            //get_ingredient_by_id($l).set_all_food_products(NULL);
            //get_ingredient_by_id($l).set_food_product(get_meal_plan_by_id(meal_plan_id_num).get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).get_ingredient_by_id($l).get_food_product_by_id(lowest_id_num));
            }
        }
    }
    /*
    function print_grams_and_cost_of_ingredients(){
        std:: cout << "Portion sizes of ingredients: \n"; 
        for ($l = 0; l < get_num_ingredients(); l++){
           std:: cout<< "("<<get_grams_needed_per_ingredient_by_id($l) << "g) of ("<<get_ingredient_by_id($l).get_food_product_by_id(0).get_name()<< ") cost ( "<< get_cost_per_ingredient_by_id($l)<<")\n";
        }
        std::cout << endl<< endl;
    }
    */
    function set_nutrition_fact($func_get,$func_set,$func_getpg){
        ($this->$func_set)(0);
        for ($l = 0; $l < get_num_ingredients(); $l++){
           ($this->$func_set)(($this->$func_get)() + (get_ingredient_by_id($l).get_food_product_by_id(0).$func_getpg)()*$get_grams_needed_per_ingredient_by_id($l));
        }
    }
    function set_nutrition_facts_by_adding_portioned_ingredients_nutrition_facts(){
    //new
        set_nutrition_fact(&$get_calories_per_serving,&$set_calories_per_serving,&$get_calories_per_gram);
        set_nutrition_fact(&$get_total_fat_per_serving,&$set_total_fat_per_serving,&$get_total_fat_per_gram);
        set_nutrition_fact(&$get_saturated_fat_per_serving,&$set_saturated_fat_per_serving, &$get_saturated_fat_per_gram);
        set_nutrition_fact(&$get_trans_fat_per_serving,&$set_trans_fat_per_serving,&$get_trans_fat_per_gram );
        set_nutrition_fact(&$get_cholesterol_per_serving,&$set_cholesterol_per_serving, &$get_cholesterol_per_gram);
        set_nutrition_fact(&$get_sodium_per_serving,&$set_sodium_per_serving,&$get_sodium_per_gram );
        set_nutrition_fact(&$get_total_carbs_per_serving,&$set_total_carbs_per_serving,&$get_total_carbs_per_gram);
        set_nutrition_fact(&$get_fiber_per_serving,&$set_fiber_per_serving, &$get_fiber_per_gram);
        set_nutrition_fact(&$get_total_sugar_per_serving,&$set_total_sugar_per_serving,&$get_total_sugar_per_gram);
        set_nutrition_fact(&$get_added_sugar_per_serving,&$set_added_sugar_per_serving, &$get_added_sugar_per_gram);
        set_nutrition_fact(&$get_protein_per_serving,&$set_protein_per_serving, &$get_protein_per_gram);
        set_nutrition_fact(&$get_vitamin_d_per_serving,&$set_vitamin_d_per_serving,&$get_vitamin_d_per_gram );
        set_nutrition_fact(&$get_calcium_per_serving,&$set_calcium_per_serving,&$get_calcium_per_gram );
        set_nutrition_fact(&$get_iron_per_serving,&$set_iron_per_serving, &$get_iron_per_gram);
        set_nutrition_fact(&$get_potassium_per_serving,&$set_potassium_per_serving, &$get_potassium_per_gram);
        set_nutrition_fact(&$get_vitamin_a_per_serving,&$set_vitamin_a_per_serving, &$get_vitamin_a_per_gram);
        set_nutrition_fact(&$get_vitamin_c_per_serving,&$set_vitamin_c_per_serving,&$get_vitamin_c_per_gram);
    
    
    }
    function set_daily_value_percentage($func_set,$func_get,$func_get_dv){
        if(($this->$func_get_dv)()>.00001){
                ($this->$func_set)( round( ($this->$func_get)() / ($this->$func_get_dv)() * 100 ) );
        }
    }
    function set_daily_value_percentages(){
    
        set_daily_value_percentage(&$set_calories_daily_value_percentage, &$get_calories_per_serving, &$get_calories_daily_value);
        set_daily_value_percentage(&$set_total_fat_daily_value_percentage,&$get_total_fat_per_serving,&$get_total_fat_daily_value);
        set_daily_value_percentage(&$set_saturated_fat_daily_value_percentage,&$get_saturated_fat_per_serving,&$get_saturated_fat_daily_value);
        set_daily_value_percentage(&$set_trans_fat_daily_value_percentage,&$get_trans_fat_per_serving,&$get_trans_fat_daily_value);
        set_daily_value_percentage(&$set_cholesterol_daily_value_percentage,&$get_cholesterol_per_serving,&$get_cholesterol_daily_value);
        set_daily_value_percentage(&$set_sodium_daily_value_percentage,&$get_sodium_per_serving,&$get_sodium_daily_value);
        set_daily_value_percentage(&$set_total_carbs_daily_value_percentage,&$get_total_carbs_per_serving,&$get_total_carbs_daily_value);
        set_daily_value_percentage(&$set_fiber_daily_value_percentage,&$get_fiber_per_serving,&$get_fiber_daily_value);
        set_daily_value_percentage(&$set_total_sugar_daily_value_percentage,&$get_total_sugar_per_serving,&$get_total_sugar_daily_value);
        set_daily_value_percentage(&$set_added_sugar_daily_value_percentage,&$get_added_sugar_per_serving,&$get_added_sugar_daily_value);
        set_daily_value_percentage(&$set_protein_daily_value_percentage,&$get_protein_per_serving,&$get_protein_daily_value);
        set_daily_value_percentage(&$set_vitamin_d_daily_value_percentage,&$get_vitamin_d_per_serving,&$get_vitamin_d_daily_value);
        set_daily_value_percentage(&$set_calcium_daily_value_percentage,&$get_calcium_per_serving,&$get_calcium_daily_value);
        set_daily_value_percentage(&$set_iron_daily_value_percentage,&$get_iron_per_serving,&$get_iron_daily_value);
        set_daily_value_percentage(&$set_potassium_daily_value_percentage,&$get_potassium_per_serving,&$get_potassium_daily_value);
        set_daily_value_percentage(&$set_vitamin_a_daily_value_percentage,&$get_vitamin_a_per_serving,&$get_vitamin_a_daily_value);
        set_daily_value_percentage(&$set_vitamin_c_daily_value_percentage,&$get_vitamin_c_per_serving,&$get_vitamin_c_daily_value);
    }
    function set_nutrition_facts_and_daily_values(){
                set_nutrition_facts_by_adding_portioned_ingredients_nutrition_facts();
                set_daily_value_percentages();
    }
    /*
    function print_nutrition_fact($str, $(food_product::*func_get)(),$(food_product::*func_get_dvp)()){
        $width_cal = 25-str.size();
        $metric_inc = 0;
        $amt_num = (this->*func_get)();
        
        //set each value to the next metric measurement 
        while ((amt_num < 1) &$&$ (metric_inc <2)){
            //increment to next metric value
            amt_num = amt_num * 1000;
            metric_inc++;
        }
        
        std::cout << str << setw(width_cal)<<round(amt_num);
        
        if(str == "Calories: "){
        std::cout<<" cal";
        }
        else if (metric_inc == 0){
        std::cout<<" g  ";
        }
        else if (metric_inc == 1){
        std::cout <<" mg ";
        }
        else if (metric_inc == 2){
        std::cout<<" mcg";
        }
        
        if ((this->*func_get_dvp)() !=0 ){
            std::cout << "     " << "%" <<(this->*func_get_dvp)();
        }
        std::cout << endl;
    }  
    
    function print_nutrition_facts(){
        $str = "Nutrition Facts: ";
        $width_nut = 25-$str.size();
        
        std::cout << "Nutrition Facts: " << setw(width_nut) << "Amt" <<  "     " << "    \%DV" <<"\n";
        print_nutrition_fact("Calories: ", &$get_calories_per_serving, &$get_calories_daily_value_percentage);
        print_nutrition_fact("Total Fat: ", &$get_total_fat_per_serving, &$get_total_fat_daily_value_percentage);
        print_nutrition_fact("Saturated Fat: ", &$get_saturated_fat_per_serving,&$get_saturated_fat_daily_value_percentage);
        print_nutrition_fact("Trans Fat: ", &$get_trans_fat_per_serving,&$get_trans_fat_daily_value_percentage);
        print_nutrition_fact("Cholesterol: ", &$get_cholesterol_per_serving,&$get_cholesterol_daily_value_percentage);
        print_nutrition_fact("Sodium: ", &$get_sodium_per_serving,&$get_sodium_daily_value_percentage);
        print_nutrition_fact("Total Carbs: ", &$get_total_carbs_per_serving,&$get_total_carbs_daily_value_percentage);
        print_nutrition_fact("Fiber: ", &$get_fiber_per_serving,&$get_fiber_daily_value_percentage);
        print_nutrition_fact("Total Sugar: ", &$get_total_sugar_per_serving,&$get_total_sugar_daily_value_percentage);
        print_nutrition_fact("Added Sugar: ", &$get_added_sugar_per_serving,&$get_added_sugar_daily_value_percentage);
        print_nutrition_fact("Protein: ", &$get_protein_per_serving,&$get_protein_daily_value_percentage);
        print_nutrition_fact("Vitamin D: ", &$get_vitamin_d_per_serving,&$get_vitamin_d_daily_value_percentage);
        print_nutrition_fact("Calcium: ", &$get_calcium_per_serving,&$get_calcium_daily_value_percentage);
        print_nutrition_fact("Iron: ", &$get_iron_per_serving,&$get_iron_daily_value_percentage);
        print_nutrition_fact("Potassium: ", &$get_potassium_per_serving,&$get_potassium_daily_value_percentage);
        if (get_vitamin_a_per_serving() != 0){
        print_nutrition_fact("Vitamin A: ", &$get_vitamin_a_per_serving,&$get_vitamin_a_daily_value_percentage);
        }
        if (get_vitamin_c_per_serving() != 0){
        print_nutrition_fact("Vitamin C: ", &$get_vitamin_c_per_serving,&$get_vitamin_c_daily_value_percentage);
        }
        std::cout << "\n";
        
    }
    */
    function get_nutrition_facts(){
        return $nutrition_facts;
    }
    function get_grams_needed_per_ingredient_by_id($id_num){
        return $grams_needed_per_ingredient[$id_num];
    }
    function set_grams_needed_per_ingredient_by_id($id_num, $grams){
        $grams_needed_per_ingredient[$id_num]= $grams;
    }
    function get_num_ingredients(){
        return$num_ingredients;
    }
    function set_name ($s){
        $name = $s;
    }
    function get_name (){
        return $name;
    }
    function function set_grams_needed_per_ingredient($arr_grams_needed_per_ingredient){
        $grams_needed_per_ingredient = $arr_grams_needed_per_ingredient;
    }
    
    $get_grams_needed_per_ingredient(){
        return $grams_needed_per_ingredient;
    }
    function print_servings_per_ingredient(){
        $size = get_num_ingredients();
        
        $temp_ingredients;
        $temp_ingredients = get_ingredients();
        
        $temp_servings_per_ingredient;
        $temp_servings_per_ingredient=get_grams_needed_per_ingredient();
        /*
        for ($i = 0; i < size; i++){
            
            //std::cout << "Meal Name:" << " " << get_name() << endl;
           // std::cout << temp_ingredients[i].ingredient::get_name() <<" in grams/mL: " << temp_servings_per_ingredient[i] << endl;
            //std::cout << "\n";
        }
        */
    }
    function get_ingredient_by_id($num){
            return $ingredients[$num];
    }
    
    function set_id_num ($num){
        $id_num =$num;
    }
    function get_id_num (){
        return $id_num;
    }
    function set_ingredient ($temp_ingredient, $grams_needed){
            
        $temp_ingredient.set_id_num($this->num_ingredients);
        $this->num_ingredients = $this->num_ingredients+1;
        $temp_arr = NULL;
        $temp_arr_num= NULL;
        //grams needed per specific meal
        $temp_num= 0;
        //ingredients
        $temp_arr = new ingredient[$this->num_ingredients];
        //grams_needed_per_ingredient
        $temp_arr_num= new double[$this->num_ingredients];
    
        
        //copies old info
        for( $i = 0; $i <$num_ingredients-1; $i++){
            $temp_arr[$i] = $ingredients[$i];
            $temp_arr_double[$i] = $grams_needed_per_ingredient[$i];
            $temp_num+= $temp_arr_double[$i];
                    
        }
        
        //copies new info
        $temp_arr[$num_ingredients-1] = $temp_ingredient;
        $temp_arr_double[$num_ingredients-1] = $grams_needed;
        $temp_num += $grams_needed;
        //copies to class property
        $ingredients = $temp_arr;
        $grams_needed_per_ingredient = $temp_arr_double;
        $total_grams_of_specific_meal = $temp_double;
    }
    function set_multiple_ingredients($arr_ingredients){
        $num_ingredients = sizeof($arr_ingredients)/sizeof($arr_ingredients[0]);
        $ingredients = $arr_ingredients;
    }
    function get_ingredients(){
        return $ingredients;
    }
}



/***Generic Meal Class***/
class generic_meal {
    
    $name;
    $specific_meals;
    $num_specific_meals;
    $id_num;
    
    /*
    //set
    function set_id_num ($num);
    function set_specific_meal($temp_specific_meal);
    function set_multiple_specific_meals($arr_specific_meals);
    function set_name ($s);
    //get
    $get_id_num ();
    $get_name ();
    $get_num_specific_meals();
    $get_specific_meal_by_id($num);
    //constructor
    generic_meal();
    */
    function __constructor(){
        $this->name = "";
        $this->specific_meals = NULL;
        $this->num_specific_meals = 0;
        $this->id_num = -1;
    }
    function get_num_specific_meals(){
        return$num_specific_meals;
    }
    function set_id_num ($num){
        $id_num =$num;
    }
    function get_id_num (){
        return $id_num;
    }
    function set_name ($s){
        $name = $s;
    }
    function get_name (){
        return $name;
    }
    function set_multiple_specific_meals($arr_specific_meals){
        $num_specific_meals = sizeof($arr_specific_meals)/sizeof($arr_specific_meals[0]);
        $specific_meals = $arr_specific_meals;
    }
    function get_specific_meal_by_id($num){
            return $specific_meals[$num];
    }
    function set_specific_meal ($temp_specific_meal){
        $temp_specific_meal.set_id_num($this->num_specific_meals);
        $this->num_specific_meals = $this->num_specific_meals+1;
        $temp_arr = NULL;
        $temp_arr = new specific_meal[$this->num_specific_meals];
        for( $i = 0; $i <$num_specific_meals-1; $i++){
            $temp_arr[$i] = $specific_meals[$i];
        }
        $temp_arr[$num_specific_meals-1] = $temp_specific_meal;
        $specific_meals = $temp_arr;
        //delete [] temp_arr;
    }
    /*function meal::print_nutrition_info(){
    
        food_product::print_nutrition_info();
    
    }
    */
}


/***Meal Type Class***/
class meal_type {
    $name;
    $generic_meals;
    $num_generic_meals;
    $id_num;
    /*
    //set
    function set_id_num ($num);
    function set_name ($s);
    function set_multiple_generic_meals($arr_generic_meals);
    function set_generic_meal($temp_generic_meal);
    //get
    $get_id_num ();
    $get_name ();
    $get_generic_meal_by_id($num);
    $get_num_generic_meals();
    //constructor
    meal_type();
    */
    function __constructor(){
        $this->name = "";
        $this->generic_meals = NULL;
        $this->num_generic_meals = 0;
        $this->id_num = -1;
    }
    function get_num_generic_meals(){
        return$num_generic_meals;
    }
    function set_name ($s){
        $name = $s;
    }
    function get_name (){
        return $name;
    }
    function set_multiple_generic_meals($arr_generic_meals){
        $num_generic_meals = sizeof($arr_generic_meals)/sizeof($arr_generic_meals[0]);
        $generic_meals = $arr_generic_meals;
    }
    function set_id_num ($num){
        $id_num =$num;
    }
    function get_id_num (){
        return $id_num;
    }
    function get_generic_meal_by_id($num){
            return $generic_meals[$num];
    }
    function set_generic_meal ($temp_generic_meal){
        $temp_generic_meal.set_id_num($this->num_generic_meals);
        $this->num_generic_meals = $this->num_generic_meals+1;
        $temp_arr = NULL;
        $temp_arr = new generic_meal[$this->num_generic_meals];
        for( $i = 0; $i <$num_generic_meals-1; $i++){
            $temp_arr[$i] = $generic_meals[$i];
        }
        $temp_arr[$num_generic_meals-1] = $temp_generic_meal;
        $generic_meals = $temp_arr;
        //delete [] temp_arr;
    }
    
}

/***Meal Plan Class***/
class meal_plan extends food_product{
    $name;
    $meal_types;
    $num_meal_types;
    $id_num;
    /*
    //set
    function set_name ($s);
    function set_multiple_meal_types($arr_meal_types);
    function set_meal_type($temp_meal_type);
    function set_id_num ($num);
    //get
    $get_name ();
    $get_meal_type_by_id($num);
    $get_num_meal_types();
    $get_id_num ();
    //constructor
    meal_plan();
    */
    function __constructor(){
        $this->name = "";
        $this->meal_types = NULL;
        $this->num_meal_types = 0;
        $this->id_num = -1;
    }
    function get_num_meal_types(){
        return$num_meal_types;
    }
    function get_meal_type_by_id($num){
            return $meal_types[$num];
    }
    function set_id_num ($num){
        $id_num =$num;
    }
    function get_id_num (){
        return id_num;
    }
    function set_name ($s){
        $name = $s;
    }
    function get_name (){
        return $name;
    }
    function set_multiple_meal_types($arr_meal_types){
        $num_meal_types = sizeof($arr_meal_types)/sizeof($arr_meal_types[0]);
        $meal_types = $arr_meal_types;
    }
    function set_meal_type ($temp_meal_type){
        $temp_meal_type.set_id_num($this->num_meal_types);
        $this->num_meal_types = $this->num_meal_types+1;
        $temp_arr = NULL;
        $temp_arr = new meal_type[$this->num_meal_types];
        for( $i = 0; $i <$num_meal_types-1; $i++){
            $temp_arr[$i] = $meal_types[$i];
        }
        $temp_arr[$num_meal_types-1] = $temp_meal_type;
        $meal_types = $temp_arr;
        //delete [] temp_arr;
        
    }
}

/***Person Class***/
class person{
    $portion_percent;
    $id_num;
    $calorie_restriction;
    $name;
    /*
    //set
    function set_id_num ($num);
    function set_portion_percent($num);
    function set_calorie_restriction($num);
    function set_name($s);
    //get
    $get_id_num ();
    $get_portion_percent();
    $get_calorie_restriction();
    $get_name();
    //constructor
    person();
    */
    __constructor(){
        $this->name = "";
        $this->portion_percent = 0;
        $this->calorie_restriction = 0;
        $this->id_num = 0;
    }
    function set_id_num ($num){
        $this->id_num =$num;
    }
    function get_id_num (){
        return $id_num;
    }
    function set_portion_percent($num){
        $portion_percent =$num;
    }
    function get_portion_percent(){
        return $portion_percent;
    }
    function set_calorie_restriction($num){
        $calorie_restriction =$num;
    }
    function set_name($s){
        $name = $s;
    }
    function get_name(){
        return $name;
    }
    function get_calorie_restriction(){
        return $calorie_restriction;
    }
    
}


/***Personal Meal Plan Class***/
class personal_meal_plan extends meal_plan{
    $name;
    $meal_plans;
    $num_meal_plans;
    $persons;
    $num_persons;
    $id_num;
    $portion_percentage_for_each_ingredient;
    /*
    //set
    function set_name ($s);
    function set_id_num ($num);
    function set_multiple_meal_plans($arr_meal_plans);
    function set_multiple_persons($arr_persons);     
    function set_person($temp_person);
    function set_meal_plan($temp_meal_plan);
    //get
    function get_name ();
    function get_meal_plan_by_id($num);
    function get_meal_plan_by_id_t($num);
    function get_id_num ();
    function get_person_by_id($num);
    function generate_personal_meal_plan($person_id_num, $meal_plan_id_num);
    //constructor
    personal_meal_plan();
*/
__constructor(){
    $this->name = "";
    $this->meal_plans = NULL;
    $this->num_meal_plans = 0;
    $this->id_num = -1;
    $this->num_persons = 0;
    $this->persons= NULL;
    $this->portion_percentage_for_each_ingredient = NULL;
}

function get_meal_plan_by_id($num){
    return $meal_plans[$num];
}
function get_meal_plan_by_id_t($num){
    return $meal_plans[$num];
}
function set_id_num ($num){
    $id_num =$num;
}
function get_id_num (){
    return $id_num;
}
function set_name ($s){
    $name = $s;
}
function get_name (){
    return $name;
}
function set_multiple_meal_plans($arr_meal_plans){
    $num_meal_plans = sizeof($arr_meal_plans)/sizeof($arr_meal_plans[0]);
    $meal_plans = $arr_meal_plans;
}
function get_person_by_id($num){
    return $persons[$num];
}
function set_multiple_persons($arr_persons){
    $num_persons = sizeof($arr_persons)/sizeof($arr_persons[0]);
    $persons = $arr_persons;
}
function set_person ($temp_person){
    $num_persons =$num_persons+1;
    $temp_person.set_id_num($this->num_persons);

    $temp_arr;
    $temp_arr = new person[$this->num_persons];
    //copies current persons
    for( $i = 0; $i <$num_persons-1; $i++){
        $temp_arr[$i] = $persons[$i];
    //std::cout << "persons:"<< persons[i].get_id_num() << endl;
    //std::cout << "temp_person:"<< temp_arr[i].get_id_num() << endl;
    }
    //std::cout << temp_person.person::get_id_num() << endl;
    $temp_arr[$num_persons-1] = $temp_person;
    $persons = $temp_arr;
    //delete [] temp_arr;;

}
function set_meal_plan ($temp_meal_plan){
    $temp_meal_plan.set_id_num($this->num_meal_plans);
    $this->num_meal_plans = $this->num_meal_plans+1;
    $temp_arr = NULL;
    $temp_arr = new meal_plan[$this->num_meal_plans];
    for( $i = 0; $i <$num_meal_plans-1; $i++){
        $temp_arr[$i] = $meal_plans[$i];
    }
    $temp_arr[$num_meal_plans-1] = $temp_meal_plan;
    $meal_plans = $temp_arr;
    //delete [] temp_arr;
}
function generate_personal_meal_plan($person_id_num, $meal_plan_id_num){
    //add indevisible servings parameter to food_product
    //how do i solve problem of 1.7 tortillas
    //subtract calories until I reach a po$of which a serving is indivisible and then add that subtraction
    // to the remaining ingredients until the next divisible portion is reached and then
    // subtract the sum that was divided to other ingredients from indivisible ingredient 
    //repeat
    //add check not to add indivisible ingredient subtraction to another indivisible ingredient
    //all divisible ingredients get ind_cal1+ind_cal2 until one or both are then divisible by the next factor.
    
    $temp_person = get_person_by_id($person_id_num);
    $temp_meal_plan = get_meal_plan_by_id($meal_plan_id_num);

    //cycle meal_types
    for ($i = 0; $i < $temp_meal_plan.get_num_meal_types(); $i++){
        
        //cycle generic_meals
        for ($j = 0; $j < $temp_meal_plan.get_meal_type_by_id($i).get_num_generic_meals(); $j++){
            
            //cycle specific_meals
            for ($k = 0; $k < $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_num_specific_meals(); k++){
                
                /***CALCULATION***/
                //pick ingredients function
                $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).pick_ingredients_from_food_products();
                
                //reduce portion sizes per ingredient until calorie restriction is met function
                $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).meet_calorie_requirement(temp_person.get_calorie_restriction(),temp_meal_plan.get_num_meal_types(), get_meal_plan_by_id(0).get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).get_grams_needed_per_ingredient());
                
                //set_nutrition_facts_and_daily_values function
                $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).set_nutrition_facts_and_daily_values();
                
                /***PRINTING***/
                //Pr$name of meal
                //std::cout <<temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_name()<<" - "<<temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).get_name()<<endl<<endl;
                
                //print_nutrition_facts_and_daily_values
                $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).print_nutrition_facts();
                
                //Pr$Cost of meal
                //std::cout << "Cost for the meal: $(" << temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).get_cost_per_specific_meal() << setprecision(3) << ")\n\n";
                
                //print_grams_and_cost_of_ingredients
                $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_specific_meal_by_id($k).print_grams_and_cost_of_ingredients();
            }
        }
    }
    //std::cout << "end" << endl;
}
}

    ?>