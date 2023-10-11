<?php
class food_product{

    //basic info
    public $id_num;
    public $name;
    public $indivisible_bool;
    //macronutrients
    public $num_servings;
    public $grams_per_serving;
    public $calories_per_serving;
    public $total_fat_per_serving;
    public $saturated_fat_per_serving;
    public $trans_fat_per_serving;
    public $cholesterol_per_serving;
    public $sodium_per_serving;
    public $total_carbs_per_serving;
    public $fiber_per_serving;
    public $total_sugar_per_serving;
    public $added_sugar_per_serving;
    public $protein_per_serving;
    //micronutrients needed
    public $vitamin_d_per_serving;
    public $calcium_per_serving;
    public $iron_per_serving;
    public $potassium_per_serving;
    public $vitamin_a_per_serving;
    public $vitamin_c_per_serving;
    //per gram
    public $calories_per_gram;
    public $total_fat_per_gram;
    public $saturated_fat_per_gram;
    public $trans_fat_per_gram;
    public $cholesterol_per_gram;
    public $sodium_per_gram;
    public $total_carbs_per_gram;
    public $fiber_per_gram;
    public $total_sugar_per_gram;
    public $added_sugar_per_gram;
    public $protein_per_gram;
   //micronutrients needed
    public $vitamin_d_per_gram;
    public $calcium_per_gram;
    public $iron_per_gram;
    public $potassium_per_gram;
    public $vitamin_a_per_gram;
    public $vitamin_c_per_gram;
    //cost
    public $total_cost;
    public $cost_per_serving;
    public $cost_per_gram;
    //allergen bools
    public $contains_milk_bool;
    public $contains_tree_nuts_bool;
    public $contains_peanuts_bool;
    public $contains_eggs_bool;
    public $contains_fish_bool;
    public $contains_shellfish_bool;
    public $contains_wheat_bool;
    public $contains_soy_bool;
    public $contains_sesame_bool;
    //daily nutrition values
    public $calories_daily_value;
    public $total_fat_daily_value;
    public $saturated_fat_daily_value;
    public $trans_fat_daily_value;
    public $cholesterol_daily_value;
    public $sodium_daily_value;
    public $total_carbs_daily_value;
    public $fiber_daily_value;
    public $total_sugar_daily_value;
    public $added_sugar_daily_value;
    public $protein_daily_value;
    public $vitamin_d_daily_value;
    public $calcium_daily_value;
    public $iron_daily_value;
    public $potassium_daily_value;
    public $vitamin_a_daily_value;
    public $vitamin_c_daily_value;
    //daily nutrition value percentages
    public $calories_daily_value_percentage;
    public $total_fat_daily_value_percentage;
    public $saturated_fat_daily_value_percentage;
    public $trans_fat_daily_value_percentage;
    public $cholesterol_daily_value_percentage;
    public $sodium_daily_value_percentage;
    public $total_carbs_daily_value_percentage;
    public $fiber_daily_value_percentage;
    public $total_sugar_daily_value_percentage;
    public $added_sugar_daily_value_percentage;
    public $protein_daily_value_percentage;
    public $vitamin_d_daily_value_percentage;
    public $calcium_daily_value_percentage;
    public $iron_daily_value_percentage;
    public $potassium_daily_value_percentage;
    public $vitamin_a_daily_value_percentage;
    public $vitamin_c_daily_value_percentage;

    
    //constructor
    function __construct(){
        $this-> indivisible_bool=false;
        $this-> id_num= 0;
        $this-> name= "";
        $this-> num_servings= 1;
        $this-> grams_per_serving = 0;
        $this-> calories_per_serving = 0;
        $this-> total_fat_per_serving = 0;
        $this-> saturated_fat_per_serving = 0;
        $this-> trans_fat_per_serving = 0;
        $this-> cholesterol_per_serving = 0;
        $this-> sodium_per_serving = 0;
        $this-> total_carbs_per_serving = 0;
        $this-> fiber_per_serving = 0;
        $this-> total_sugar_per_serving = 0;
        $this-> added_sugar_per_serving = 0;
        $this-> protein_per_serving = 0;
        $this-> vitamin_a_per_serving = 0;
        $this-> vitamin_c_per_serving = 0;
        $this-> vitamin_d_per_serving = 0;
        $this-> calcium_per_serving = 0;
        $this-> iron_per_serving = 0;
        $this-> potassium_per_serving = 0;
        $this-> total_cost = 0;
        $this-> contains_milk_bool= false;
        $this-> contains_tree_nuts_bool= false;
        $this-> contains_peanuts_bool= false;
        $this-> contains_eggs_bool= false;
        $this-> contains_fish_bool= false;
        $this-> contains_shellfish_bool= false;
        $this-> contains_wheat_bool= false;
        $this-> contains_soy_bool= false;
        $this-> contains_sesame_bool= false;
        $this-> cost_per_serving = 0;
        $this-> calories_per_gram = 0;
        //daily nutrition values
        $this-> calories_daily_value = 2000;
        $this-> total_fat_daily_value = 78;
        $this-> saturated_fat_daily_value = 20;
        $this-> trans_fat_daily_value = 0;
        $this-> cholesterol_daily_value = .300;
        $this-> sodium_daily_value = 2.300;
        $this-> total_carbs_daily_value = 275;
        $this-> fiber_daily_value = 28;
        $this-> added_sugar_daily_value = 50;
        $this-> protein_daily_value = 50;
        $this-> vitamin_d_daily_value = .0002;
        $this-> calcium_daily_value = 1.300;
        $this-> iron_daily_value = .018;
        $this-> potassium_daily_value = 4.7;
        $this-> vitamin_a_daily_value = .0009;
        $this-> vitamin_c_daily_value = .09;
                //daily nutrition value percentages
        $this-> calories_daily_value_percentage = 0;
        $this-> total_fat_daily_value_percentage = 0;
        $this-> saturated_fat_daily_value_percentage = 0;
        $this-> trans_fat_daily_value_percentage = 0;
        $this-> cholesterol_daily_value_percentage = 0;
        $this-> sodium_daily_value_percentage = 0;
        $this-> total_carbs_daily_value_percentage = 0;
        $this-> fiber_daily_value_percentage = 0;
        $this-> total_sugar_daily_value_percentage = 0;
        $this-> added_sugar_daily_value_percentage = 0;
        $this-> protein_daily_value_percentage = 0;
        $this-> vitamin_d_daily_value_percentage = 0;
        $this-> calcium_daily_value_percentage = 0;
        $this-> iron_daily_value_percentage = 0;
        $this-> potassium_daily_value_percentage = 0;
        $this-> vitamin_a_daily_value_percentage = 0;
        $this-> vitamin_c_daily_value_percentage = 0;
    }
    // $get and set for daily values
              //create gets and sets for all  //daily nutrition values
    function get_calories_daily_value() {return $this->calories_daily_value; }
    function get_total_fat_daily_value() {return $this->total_fat_daily_value; }
    function get_saturated_fat_daily_value() {return $this->saturated_fat_daily_value; }
    function get_trans_fat_daily_value() {return $this->trans_fat_daily_value; }
    function get_cholesterol_daily_value() {return $this->cholesterol_daily_value; }
    function get_sodium_daily_value() {return $this->sodium_daily_value; }
    function get_total_carbs_daily_value() {return $this->total_carbs_daily_value; }
    function get_fiber_daily_value() {return $this->fiber_daily_value; }
    function get_total_sugar_daily_value() {return $this->total_sugar_daily_value; }
    function get_added_sugar_daily_value() {return $this->added_sugar_daily_value; }
    function get_protein_daily_value() {return $this->protein_daily_value; }
    function get_vitamin_d_daily_value() {return $this->vitamin_d_daily_value; }
    function get_calcium_daily_value() {return $this->calcium_daily_value; }
    function get_iron_daily_value() {return $this->iron_daily_value; }
    function get_potassium_daily_value() {return $this->potassium_daily_value; }
    function get_vitamin_a_daily_value() {return $this->vitamin_a_daily_value; }
    function get_vitamin_c_daily_value() {return $this->vitamin_c_daily_value; }
    //daily nutrition value percentages
    function get_calories_daily_value_percentage() {return $this->calories_daily_value_percentage; }
    function get_total_fat_daily_value_percentage() {return $this->total_fat_daily_value_percentage; }
    function get_saturated_fat_daily_value_percentage() {return $this->saturated_fat_daily_value_percentage; }
    function get_trans_fat_daily_value_percentage() {return $this->trans_fat_daily_value_percentage; }
    function get_cholesterol_daily_value_percentage() {return $this->cholesterol_daily_value_percentage; }
    function get_sodium_daily_value_percentage() {return $this->sodium_daily_value_percentage; }
    function get_total_carbs_daily_value_percentage() {return $this->total_carbs_daily_value_percentage; }
    function get_fiber_daily_value_percentage() {return $this->fiber_daily_value_percentage; }
    function get_total_sugar_daily_value_percentage() {return $this->total_sugar_daily_value_percentage; }
    function get_added_sugar_daily_value_percentage() {return $this->added_sugar_daily_value_percentage; }
    function get_protein_daily_value_percentage() {return $this->protein_daily_value_percentage; }
    function get_vitamin_d_daily_value_percentage() {return $this->vitamin_d_daily_value_percentage; }
    function get_calcium_daily_value_percentage() {return $this->calcium_daily_value_percentage; }
    function get_iron_daily_value_percentage() {return $this->iron_daily_value_percentage; }
    function get_potassium_daily_value_percentage() {return $this->potassium_daily_value_percentage; }
    function get_vitamin_a_daily_value_percentage() {return $this->vitamin_a_daily_value_percentage; }
    function get_vitamin_c_daily_value_percentage() {return $this->vitamin_c_daily_value_percentage; }
    
    function set_calories_daily_value($num){ $this->calories_daily_value =$num;}
    function set_total_fat_daily_value($num) { $this->total_fat_daily_value=$num; }
    function set_saturated_fat_daily_value($num) { $this->saturated_fat_daily_value=$num; }
    function set_trans_fat_daily_value($num) { $this->trans_fat_daily_value=$num; }
    function set_cholesterol_daily_value($num) { $this->cholesterol_daily_value=$num; }
    function set_sodium_daily_value($num) { $this->sodium_daily_value=$num; }
    function set_total_carbs_daily_value($num) { $this->total_carbs_daily_value=$num; }
    function set_fiber_daily_value($num) { $this->fiber_daily_value=$num; }
    function set_total_sugar_daily_value($num) { $this->total_sugar_daily_value=$num; }
    function set_added_sugar_daily_value($num) { $this->added_sugar_daily_value=$num; }
    function set_protein_daily_value($num) { $this->protein_daily_value=$num; }
    function set_vitamin_d_daily_value($num) { $this->vitamin_d_daily_value=$num; }
    function set_calcium_daily_value($num) { $this->calcium_daily_value=$num; }
    function set_iron_daily_value($num) { $this->iron_daily_value=$num; }
    function set_potassium_daily_value($num) { $this->potassium_daily_value=$num; }
    function set_vitamin_a_daily_value($num) { $this->vitamin_a_daily_value=$num; }
    function set_vitamin_c_daily_value($num) { $this->vitamin_c_daily_value=$num; }
            //daily nutrition value percentages
    function set_calories_daily_value_percentage($num){ $this->calories_daily_value_percentage =$num;}
    function set_total_fat_daily_value_percentage($num) { $this->total_fat_daily_value_percentage=$num; }
    function set_saturated_fat_daily_value_percentage($num) { $this->saturated_fat_daily_value_percentage=$num; }
    function set_trans_fat_daily_value_percentage($num) { $this->trans_fat_daily_value_percentage=$num; }
    function set_cholesterol_daily_value_percentage($num) { $this->cholesterol_daily_value_percentage=$num; }
    function set_sodium_daily_value_percentage($num) { $this->sodium_daily_value_percentage=$num; }
    function set_total_carbs_daily_value_percentage($num) { $this->total_carbs_daily_value_percentage=$num; }
    function set_fiber_daily_value_percentage($num) { $this->fiber_daily_value_percentage=$num; }
    function set_total_sugar_daily_value_percentage($num) { $this->total_sugar_daily_value_percentage=$num; }
    function set_added_sugar_daily_value_percentage($num) { $this->added_sugar_daily_value_percentage=$num; }
    function set_protein_daily_value_percentage($num) { $this->protein_daily_value_percentage=$num; }
    function set_vitamin_d_daily_value_percentage($num) { $this->vitamin_d_daily_value_percentage=$num; }
    function set_calcium_daily_value_percentage($num) { $this->calcium_daily_value_percentage=$num; }
    function set_iron_daily_value_percentage($num) { $this->iron_daily_value_percentage=$num; }
    function set_potassium_daily_value_percentage($num) { $this->potassium_daily_value_percentage=$num; }
    function set_vitamin_a_daily_value_percentage($num) { $this->vitamin_a_daily_value_percentage=$num; }
    function set_vitamin_c_daily_value_percentage($num) { $this->vitamin_c_daily_value_percentage=$num; }


    function set_added_sugar_per_gram() {$this->added_sugar_per_gram = $this->added_sugar_per_serving/ $this->grams_per_serving;}
    function get_added_sugar_per_gram() {return $this->added_sugar_per_gram;}
    function set_saturated_fat_per_gram() {$this->saturated_fat_per_gram = $this->saturated_fat_per_serving/ $this->grams_per_serving;}
    function get_saturated_fat_per_gram() {return $this->saturated_fat_per_gram;}
    function set_trans_fat_per_gram() {$this->trans_fat_per_gram = $this->trans_fat_per_serving/ $this->grams_per_serving;}
    function get_trans_fat_per_gram() {return $this->trans_fat_per_gram;}
    function set_cholesterol_per_gram() {$this->cholesterol_per_gram = $this->cholesterol_per_serving/ $this->grams_per_serving;  }
    function get_cholesterol_per_gram() {return $this->cholesterol_per_gram;   }
    function set_sodium_per_gram() {$this->sodium_per_gram = $this->sodium_per_serving/ $this->grams_per_serving;}
    function get_sodium_per_gram() {return $this->sodium_per_gram;}
    function set_vitamin_a_per_gram() {$this->vitamin_a_per_gram = $this->vitamin_a_per_serving/ $this->grams_per_serving;}
    function get_vitamin_a_per_gram() {return $this->vitamin_a_per_gram;}
    function set_vitamin_c_per_gram() {$this->vitamin_c_per_gram = $this->vitamin_c_per_serving/ $this->grams_per_serving;}
    function get_vitamin_c_per_gram() {return $this->vitamin_c_per_gram;}
    function set_vitamin_d_per_gram() {$this->vitamin_d_per_gram = $this->vitamin_d_per_serving/ $this->grams_per_serving;   }
    function get_vitamin_d_per_gram() {return $this->vitamin_d_per_gram;}
    function set_calcium_per_gram() {$this->calcium_per_gram = $this->calcium_per_serving/ $this->grams_per_serving;}
    function get_calcium_per_gram() {return $this->calcium_per_gram;}
    function set_iron_per_gram() {$this->iron_per_gram = $this->iron_per_serving/ $this->grams_per_serving;}
    function get_iron_per_gram() {return $this->iron_per_gram;}
    function set_potassium_per_gram() {$this->potassium_per_gram = $this->potassium_per_serving/ $this->grams_per_serving;}
    function get_potassium_per_gram() {return $this->potassium_per_gram;} 
    function set_total_fat_per_gram() {$this->total_fat_per_gram = $this->total_fat_per_serving/ $this->grams_per_serving;}
    function get_total_fat_per_gram() {return $this->total_fat_per_gram;}
    function set_total_carbs_per_gram() {$this->total_carbs_per_gram = $this->total_carbs_per_serving/ $this->grams_per_serving;}
    function get_total_carbs_per_gram() {return $this->total_carbs_per_gram;}
    function set_fiber_per_gram() {$this->fiber_per_gram = $this->fiber_per_serving/ $this->grams_per_serving;}
    function get_fiber_per_gram() {return $this->fiber_per_gram;}
    function set_total_sugar_per_gram() {$this->total_sugar_per_gram = $this->total_sugar_per_serving/ $this->grams_per_serving;}
    function get_total_sugar_per_gram() {return $this->total_sugar_per_gram;}
    function set_protein_per_gram() {$this->protein_per_gram = $this->protein_per_serving/ $this->grams_per_serving;}
    function get_protein_per_gram() {return $this->protein_per_gram;}
    function set_added_sugar_per_serving($num) {$this->added_sugar_per_serving =$num;}
    function get_added_sugar_per_serving() {return $this->added_sugar_per_serving;}
    function set_saturated_fat_per_serving($num) {$this->saturated_fat_per_serving =$num;}
    function get_saturated_fat_per_serving() {return $this->saturated_fat_per_serving;}
    function set_trans_fat_per_serving($num) {$this->trans_fat_per_serving =$num;}
    function get_trans_fat_per_serving() {return $this->trans_fat_per_serving;}
    function set_cholesterol_per_serving($num) {$this->cholesterol_per_serving =$num;}
    function get_cholesterol_per_serving() {return $this->cholesterol_per_serving;}
    function set_sodium_per_serving($num) {$this->sodium_per_serving =$num;}
    function get_sodium_per_serving() {return $this->sodium_per_serving;}
    function set_vitamin_a_per_serving($num) {$this->vitamin_a_per_serving =$num;}
    function get_vitamin_a_per_serving() {return $this->vitamin_a_per_serving;}
    function set_vitamin_c_per_serving($num) {$this->vitamin_c_per_serving =$num;}
    function get_vitamin_c_per_serving() {return $this->vitamin_c_per_serving;}
    function set_vitamin_d_per_serving($num) {$this->vitamin_d_per_serving =$num;   }
    function get_vitamin_d_per_serving() {return $this->vitamin_d_per_serving;}
    function set_calcium_per_serving($num) {$this->calcium_per_serving =$num;}
    function get_calcium_per_serving() {return $this->calcium_per_serving;}
    function set_iron_per_serving($num) {$this->iron_per_serving =$num;}
    function get_iron_per_serving() {return $this->iron_per_serving;}
    function set_potassium_per_serving($num) {$this->potassium_per_serving =$num;}
    function get_potassium_per_serving() {return $this->potassium_per_serving;}    
    function set_contains_peanuts_bool($b) {$this->contains_peanuts= $b;}
    function get_contains_peanuts_bool() {return $this->contains_peanuts_bool;}
    function set_contains_milk_bool($b) {$this->contains_milk= $b;}
    function get_contains_milk_bool() {return $this->contains_milk_bool;}
    function set_contains_tree_nuts_bool($b) {$this->contains_tree_nuts= $b;}
    function get_contains_tree_nuts_bool() {return $this->contains_tree_nuts_bool;}
    function set_contains_eggs_bool($b) {$this->contains_eggs= $b;}
    function get_contains_eggs_bool() {return $this->contains_eggs_bool;}
    function set_contains_fish_bool($b) {$this->contains_fish= $b;}
    function get_contains_fish_bool() {return $this->contains_fish_bool;}
    function set_contains_wheat_bool($b) {$this->contains_wheat= $b;}
    function get_contains_wheat_bool() {return $this->contains_wheat_bool;}
    function set_contains_shellfish_bool($b) {$this->contains_shellfish= $b;}
    function get_contains_shellfish_bool() {return $this->contains_shellfish_bool;}
    function set_contains_soy_bool($b) {$this->contains_soy= $b;}
    function get_contains_soy_bool() {return $this->contains_soy_bool;}
    function set_contains_sesame_bool($b) {$this->contains_sesame= $b;}
    function get_contains_sesame_bool() {return $this->contains_sesame_bool;}
    function set_indivisible_bool($b) {$this->indivisible= $b;}
    function get_indivisible_bool() {return $this->indivisible_bool;}
    function get_calories_per_gram() {return $this->calories_per_gram;}
    function set_calories_per_gram() {$this->calories_per_gram = $this->calories_per_serving / $this->grams_per_serving;}
    function set_id_num ($num) {$this->id_num =$num;}
    function get_id_num () {return $this->id_num;}
    function set_name($s) {$this->name = $s;}
    function get_name() {return $this->name;}
    function set_num_servings($num) {$this->num_servings =$num;}
    function get_num_servings() {return $this->num_servings;}
    function set_grams_per_serving($num) {$this->grams_per_serving =$num;}
    function get_grams_per_serving() {return $this->grams_per_serving;}
    function set_calories_per_serving($num) {$this->calories_per_serving =$num;}
    function get_calories_per_serving() {return $this->calories_per_serving;}
    function set_total_fat_per_serving($num) {$this->total_fat_per_serving =$num;}
    function get_total_fat_per_serving() {return $this->total_fat_per_serving;}
    function set_total_carbs_per_serving($num) {$this->total_carbs_per_serving =$num;}
    function get_total_carbs_per_serving() {return $this->total_carbs_per_serving;}
    function set_fiber_per_serving($num) {$this->fiber_per_serving =$num;}
    function get_fiber_per_serving() {return $this->fiber_per_serving;}
    function set_total_sugar_per_serving($num) {$this->total_sugar_per_serving =$num;}
    function get_total_sugar_per_serving() {return $this->total_sugar_per_serving;}
    function set_protein_per_serving($num) {$this->protein_per_serving =$num;}
    function get_protein_per_serving() {return $this->protein_per_serving;}
    function set_total_cost($num) {$this->total_cost =$num;   }
    function get_total_cost () {return $this->total_cost;}
    function set_cost_per_serving() {$this->cost_per_serving = $this->total_cost/$this->num_servings;}
    function get_cost_per_serving() {return $this->cost_per_serving;}
    function set_cost_per_gram() {$this->cost_per_gram = $this->cost_per_serving/$this->grams_per_serving;}
    function get_cost_per_gram() {return $this->cost_per_gram;}


    //per gram
    function set_all_facts_per_gram(){
        $this->set_cost_per_gram();    
        $this->set_calories_per_gram();
        $this->set_total_fat_per_gram();
        $this->set_saturated_fat_per_gram();
        $this->set_trans_fat_per_gram();
        $this->set_cholesterol_per_gram();
        $this->set_sodium_per_gram();
        $this->set_total_carbs_per_gram();
        $this->set_fiber_per_gram();
        $this->set_total_sugar_per_gram();
        $this->set_added_sugar_per_gram();
        $this->set_protein_per_gram();
        $this->set_vitamin_d_per_gram();
        $this->set_calcium_per_gram();
        $this->set_iron_per_gram();
        $this->set_potassium_per_gram();
    }
}
//***Ingredient Class***//
class ingredient{
    
    public $name;
    public $food_products;
    public $num_food_products;
    public $id_num;
    //public $cost;
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
        $this->id_num = 0;
        $this->cost = 0;
    }
    /*
    function set_cost ($num){
        $this->cost =$num;
    }
    function get_cost (){
        return $this->cost;
    }
    */
    function set_all_food_products($fp){
        $this->food_products = $fp;
    }
    function set_id_num ($num){
        $this->id_num =$num;
    }
    function get_id_num (){
        return $this->id_num;
    }
    function set_name ($s){
        $this->name = $s;
    }
    function get_name (){
        return $this->name;
    }
    function get_food_product_by_id($num){
        //echo json_encode($this->food_products);
        return $this->food_products[$num];
    }
    /*food_product ingredient::get_food_product(ingredient temp_food_product){
        return food_products[];
    }*/
    function get_all_food_products(){
        return $this->food_products;
    }
    function get_num_food_products(){
        return $this->num_food_products;
    }
    function set_multiple_food_products ($arr_food_products){
    
        //cannot track array size
        //food_products = new food_product[5];
        $this->food_products = $arr_food_products;
        $this->num_food_products = ($this->food_products + 1) - $this->food_products;
    
        
    }
    function set_food_product ($temp_food_product){
        $this->num_food_products=$this->num_food_products+1;
        $temp_food_product->set_id_num($this->num_food_products-1);
        $temp_size = $this->num_food_products-1;

        $temp_array[] = new food_product();
        for( $i = 0; $i <$temp_size; $i++){

            $temp_arr[$i] = $this->food_products[$i];
        }
        $temp_arr[$this->num_food_products-1] = $temp_food_product;
        //echo json_encode($temp_arr);
        $this->food_products = $temp_arr;
        //echo json_encode($this->food_products);
        //delete [] temp_arr;
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
class specific_meal extends food_product{
    //$* servings_per_ingredient;
    
    public $name;
    public $ingredients;
    public $num_ingredients;
    public $id_num;
    public $grams_needed_per_ingredient;
    public $nutrition_facts;
    public $cost_per_ingredient;
    public $cost_per_specific_meal;
    public $total_grams_of_specific_meal;
    public $preparation_steps;
    public $cooking_steps;
    public $finishing_steps;
    
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
    function __constructor(){
        //food_product();
        $this->name = "";
        $this->ingredients = NULL;
        $this->num_ingredients = 0;
        $this->id_num = 0;
        $this->grams_needed_per_ingredient = NULL;
        $this->cost_per_ingredient = NULL;
        $this->cost_per_specific_meal = 0;
        $this->total_grams_of_specific_meal = 0;
    }
    function get_total_grams_of_specific_meal(){
        return $this->$total_grams_of_specific_meal;
    }
    function meet_calorie_requirement($calorie_restriction, $num_meal_types, $grams_needed_per_ingredient){
        $percent_from_100= 1;
        $total_cal = 0;
            while(($this->get_calories_per_serving()> ($calorie_restriction/$num_meal_types)) && ($percent_from_100 > .15)){
                $percent_from_100= $percent_from_100- .01;
                for ($l = 0; $l < $this->num_ingredients; $l++){
                    if (!$this->get_ingredient_by_id($l).get_food_product_by_id(0).get_indivisible_bool()){
                        $this->set_grams_needed_per_ingredient_by_id($l,$grams_needed_per_ingredient[$l]*$percent_from_100);                    
                    }                
                    $total_cal+= $this->get_grams_needed_per_ingredient_by_id($l)*$this->get_ingredient_by_id($l).get_food_product_by_id(0).get_calories_per_gram();
                }
                $this->set_calories_per_serving($total_cal);
                $total_cal = 0;
    
            }
            $this->set_cost_per_ingredient();
            $this->set_cost_per_specific_meal();
    }
    function set_cost_per_specific_meal(){
        //add up cost of all ingredients
        $temp_num = 0;
        for ($l = 0; $l < $this->num_ingredients; $l++){ 
            $temp_num += $this->cost_per_ingredient[$l];
        }
        $this->cost_per_specific_meal = $temp_num;
    }
    function get_cost_per_specific_meal(){
        return $this->cost_per_specific_meal;
    }
    function set_cost_per_ingredient(){
    
        $temp_arr_double2 = NULL;
        //cost_per_ingredient
        $temp_arr_double2 = array();
        for($i = 0; $i < $this->num_ingredients; $i++){
            $temp_arr_double2[$i] = $this->get_grams_needed_per_ingredient_by_id($i)*$this->get_ingredient_by_id($i)->get_food_product_by_id(0)->get_cost_per_gram();
        }
    
        $this->cost_per_ingredient = $temp_arr_double2;
    
    }
    function get_cost_per_ingredient(){
        return $this->cost_per_ingredient;
    }
    function get_cost_per_ingredient_by_id($id){
        return $this->cost_per_ingredient[$id];
    }
    
    function pick_ingredients_from_food_products(){
        $temp_calories_per_gram = 0;
        $lowest_calories_per_gram = 0;
        $lowest_id_num = 0;
        //pick lowest calorie ingredient function
        //cycle ingredients
        for ($l = 0; $l < $this->num_ingredients; $l++){
            
            //cycle food_products
            for ($m = 0; $m < $this->get_ingredient_by_id($l).get_num_food_products(); $m++){
                
                //calories/grams per serving
                $temp_calories_per_gram = $this->get_ingredient_by_id($l).get_food_product_by_id($m).get_calories_per_serving()/$this->get_ingredient_by_id($l).get_food_product_by_id($m).get_grams_per_serving();
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
        for ($l = 0; l < $this->num_ingredients; l++){
           std:: cout<< "("<<get_grams_needed_per_ingredient_by_id($l) << "g) of ("<<get_ingredient_by_id($l).get_food_product_by_id(0).get_name()<< ") cost ( "<< get_cost_per_ingredient_by_id($l)<<")\n";
        }
        std::cout << endl<< endl;
    }
    */
    function set_nutrition_fact($func_get,$func_set,$func_getpg){
        $func_set(0);
        for ($l = 0; $l < $this->num_ingredients; $l++){
            
            $func_set($func_get() + $func_getpg->call($this->get_ingredient_by_id($l)->get_food_product_by_id(0), )*$this->get_grams_needed_per_ingredient_by_id($l));
        }
    }
    function set_nutrition_facts_by_adding_portioned_ingredients_nutrition_facts(){
    //new
        //create function closures (puts function in a variable to be passed as a parameter)
        $myFunc_gps = function () { return $this->get_calories_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_calories_per_serving($num); };
        $myFunc_gpg = function () { return $this->get_calories_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);

        $myFunc_gps = function () {return  $this->get_total_fat_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_total_fat_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_total_fat_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_saturated_fat_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_saturated_fat_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_saturated_fat_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_trans_fat_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_trans_fat_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_trans_fat_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_cholesterol_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_cholesterol_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_cholesterol_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_sodium_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_sodium_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_sodium_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);

        $myFunc_gps = function () {return  $this->get_total_carbs_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_total_carbs_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_total_carbs_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_fiber_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_fiber_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_fiber_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_total_sugar_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_total_sugar_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_total_sugar_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_added_sugar_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_added_sugar_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_added_sugar_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_protein_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_protein_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_protein_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_vitamin_d_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_vitamin_d_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_vitamin_d_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_calcium_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_calcium_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_calcium_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_iron_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_iron_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_iron_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_potassium_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_potassium_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_potassium_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_vitamin_a_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_vitamin_a_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_vitamin_a_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
        
        $myFunc_gps = function () {return  $this->get_vitamin_c_per_serving(); };
        $myFunc_sps = function ($num) { $this->set_vitamin_c_per_serving($num); };
        $myFunc_gpg = function () {return  $this->get_vitamin_c_per_gram(); };
        $this->set_nutrition_fact($myFunc_gps,$myFunc_sps,$myFunc_gpg);
    
    }
    function set_daily_value_percentage($func_set,$func_get,$func_get_dv){
        if($func_get_dv()>.00001){
                ($func_set)( round( ($func_get)() / ($func_get_dv)() * 100 ) );
        }
    }
    function set_daily_value_percentages(){
        $myFunc_sdvp = function ($num) { $this->set_calories_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_calories_per_serving(); };
        $myFunc_gdv = function () { return $this->get_calories_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_total_fat_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_total_fat_per_serving(); };
        $myFunc_gdv = function () { return $this->get_total_fat_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_saturated_fat_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_saturated_fat_per_serving(); };
        $myFunc_gdv = function () { return $this->get_saturated_fat_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_trans_fat_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_trans_fat_per_serving(); };
        $myFunc_gdv = function () { return $this->get_trans_fat_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_cholesterol_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_cholesterol_per_serving(); };
        $myFunc_gdv = function () { return $this->get_cholesterol_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_sodium_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_sodium_per_serving(); };
        $myFunc_gdv = function () { return $this->get_sodium_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_total_carbs_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_total_carbs_per_serving(); };
        $myFunc_gdv = function () { return $this->get_total_carbs_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_fiber_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_fiber_per_serving(); };
        $myFunc_gdv = function () { return $this->get_fiber_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_total_sugar_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_total_sugar_per_serving(); };
        $myFunc_gdv = function () { return $this->get_total_sugar_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_added_sugar_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_added_sugar_per_serving(); };
        $myFunc_gdv = function () { return $this->get_added_sugar_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_protein_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_protein_per_serving(); };
        $myFunc_gdv = function () { return $this->get_protein_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_vitamin_d_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_vitamin_d_per_serving(); };
        $myFunc_gdv = function () { return $this->get_vitamin_d_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_calcium_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_calcium_per_serving(); };
        $myFunc_gdv = function () { return $this->get_calcium_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_iron_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_iron_per_serving(); };
        $myFunc_gdv = function () { return $this->get_iron_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_potassium_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_potassium_per_serving(); };
        $myFunc_gdv = function () { return $this->get_potassium_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_vitamin_a_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_vitamin_a_per_serving(); };
        $myFunc_gdv = function () { return $this->get_vitamin_a_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
        
        $myFunc_sdvp = function ($num) { $this->set_vitamin_c_daily_value_percentage($num); };
        $myFunc_gps = function () { return $this->get_vitamin_c_per_serving(); };
        $myFunc_gdv = function () { return $this->get_vitamin_c_daily_value(); };
        $this->set_daily_value_percentage($myFunc_sdvp,$myFunc_gps,$myFunc_gdv);
    }
    function set_nutrition_facts_and_daily_values(){
        $this->set_nutrition_facts_by_adding_portioned_ingredients_nutrition_facts();
        $this->set_daily_value_percentages();
                
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
        return $this->nutrition_facts;
    }
    function get_grams_needed_per_ingredient_by_id($id_num){
        return $this->grams_needed_per_ingredient[$id_num];
    }
    function set_grams_needed_per_ingredient_by_id($id_num, $grams){
        $this->grams_needed_per_ingredient[$id_num]= $grams;
    }
    function get_num_ingredients(){
        return $this->num_ingredients;
    }
    function set_name ($s){
        $this->name = $s;
    }
    function get_name (){
        return $this->name;
    }
    function set_grams_needed_per_ingredient($arr_grams_needed_per_ingredient){
        $this->grams_needed_per_ingredient = $arr_grams_needed_per_ingredient;
    }
    
    function get_grams_needed_per_ingredient(){
        return $this->grams_needed_per_ingredient;
    }
    function print_servings_per_ingredient(){
        $size = $this->num_ingredients;
        
        $temp_ingredients;
        $temp_ingredients = $this->get_ingredients();
        
        $temp_servings_per_ingredient;
        $temp_servings_per_ingredient=$this->get_grams_needed_per_ingredient();
        /*
        for ($i = 0; i < size; i++){
            
            //std::cout << "Meal Name:" << " " << get_name() << endl;
           // std::cout << temp_ingredients[i].ingredient::get_name() <<" in grams/mL: " << temp_servings_per_ingredient[i] << endl;
            //std::cout << "\n";
        }
        */
    }
    function get_ingredient_by_id($num){
            return $this->ingredients[$num];
    }
    
    function set_id_num ($num){
        $this->id_num =$num;
    }
    
    function get_id_num (){
        return $this->id_num;
    }
    function set_ingredient ($temp_ingredient, $grams_needed){
            
        $temp_ingredient->set_id_num($this->num_ingredients+0);
        $this->num_ingredients = ($this->num_ingredients)+1;
        $temp_arr = NULL;
        $temp_arr_num= NULL;
        //grams needed per specific meal
        $temp_double= 0;
        //ingredients
        $temp_arr = array();
        //grams_needed_per_ingredient
        $temp_arr_num= array();
    
        
        //copies old info
        for( $i = 0; $i <$this->num_ingredients-1; $i++){
            $temp_arr[$i] = $this->ingredients[$i];
            $temp_arr_double[$i] = $this->grams_needed_per_ingredient[$i];
            $temp_double+= $temp_arr_double[$i];
                    
        }
        
        //copies new info
        $temp_arr[$this->num_ingredients-1] = $temp_ingredient;
        $temp_arr_double[$this->num_ingredients-1] = $grams_needed;
        $temp_double += $grams_needed;
        //copies to class property
        $this->ingredients = $temp_arr;
        $this->grams_needed_per_ingredient = $temp_arr_double;
        $this->total_grams_of_specific_meal = $temp_double;
    }
    function set_multiple_ingredients($arr_ingredients){
        $this->num_ingredients = sizeof($arr_ingredients)/sizeof($arr_ingredients[0]);
        $this->ingredients = $arr_ingredients;
    }
    function get_ingredients(){
        return $this->ingredients;
    }
    function set_preparation_steps($str){
        $i=0;
        $temp_str = explode(',',$str);
        while ($i < count($temp_str)){
            $this->preparation_steps[$i] = $temp_str[$i];
            $i = $i+1;
        }
    }
    function set_cooking_steps($str){
        $i=0;
        $temp_str = explode(',',$str);
        while ($i < count($temp_str)){
            $this->cooking_steps[$i] = $temp_str[$i];
            $i = $i+1;
        }
    }
    function set_finishing_steps($str){
        $i=0;
        $temp_str = explode(',',$str);
        while ($i < count($temp_str)){
            $this->finishing_steps[$i] = $temp_str[$i];
            $i = $i+1;
        }
    }
}



/***Generic Meal Class***/
class generic_meal {
    
    public $name;
    public $specific_meals;
    public $num_specific_meals;
    public $id_num;
    
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
        $this->id_num = 0;
    }
    function get_num_specific_meals(){
        return $this->num_specific_meals;
    }
    function set_id_num ($num){
        $this->id_num =$num;
    }
    function get_id_num (){
        return $this->id_num;
    }
    function set_name ($s){
        $this->name = $s;
    }
    function get_name (){
        return $this->name;
    }
    function set_multiple_specific_meals($arr_specific_meals){
        $this->num_specific_meals = sizeof($arr_specific_meals)/sizeof($arr_specific_meals[0]);
        $this->specific_meals = $arr_specific_meals;
    }
    function get_specific_meal_by_id($num){
        return $this->specific_meals[$num];
    }
    function set_specific_meal ($temp_specific_meal){
        $temp_specific_meal->set_id_num($this->num_specific_meals+0);
        $this->num_specific_meals = $this->num_specific_meals+1;
        $temp_arr = NULL;
        $temp_arr = array();
        for( $i = 0; $i <$this->num_specific_meals-1; $i++){
            $temp_arr[$i] = $this->specific_meals[$i];
        }
        $temp_arr[$this->num_specific_meals-1] = $temp_specific_meal;
        $this->specific_meals = $temp_arr;
        //delete [] temp_arr;
    }

    /*function meal::print_nutrition_info(){
    
        food_product::print_nutrition_info();
    
    }
    */
}


/***Meal Type Class***/
class meal_type {
    public $name;
    public $generic_meals;
    public $num_generic_meals;
    public $id_num;
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
        return $this->num_generic_meals;
    }
    function set_name ($s){
        $this->name = $s;
    }
    function get_name (){
        return $this->name;
    }
    function set_multiple_generic_meals($arr_generic_meals){
        $this->num_generic_meals = sizeof($arr_generic_meals)/sizeof($arr_generic_meals[0]);
        $this->generic_meals = $arr_generic_meals;
    }
    function set_id_num ($num){
        $this->id_num =$num;
    }
    function get_id_num (){
        return $this->id_num;
    }
    function get_generic_meal_by_id($num){
        return $this->generic_meals[$num];
    }
    function set_generic_meal ($temp_generic_meal){
        $temp_generic_meal.set_id_num($this->num_generic_meals);
        $this->num_generic_meals = $this->num_generic_meals+1;
        $temp_arr = NULL;
        $temp_arr = array();
        for( $i = 0; $i <$this->num_generic_meals-1; $i++){
            $temp_arr[$i] = $this->generic_meals[$i];
        }
        $temp_arr[$this->num_generic_meals-1] = $temp_generic_meal;
        $this->generic_meals = $temp_arr;
        //delete [] temp_arr;
    }
    
}

/***Meal Plan Class***/
class meal_plan extends food_product{
    public $name;
    public $meal_types;
    public $num_meal_types;
    public $id_num;
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
        return $this->$num_meal_types;
    }
    function get_meal_type_by_id($num){
        return $this->$meal_types[$num];
    }
    function set_id_num ($num){
        $this->$id_num =$num;
    }
    function get_id_num (){
        return $this->id_num;
    }
    function set_name ($s){
        $this->$name = $s;
    }
    function get_name (){
        return $this->$name;
    }
    function set_multiple_meal_types($arr_meal_types){
        $this->$num_meal_types = sizeof($arr_meal_types)/sizeof($arr_meal_types[0]);
        $this->$meal_types = $arr_meal_types;
    }
    function set_meal_type ($temp_meal_type){
        $temp_meal_type->set_id_num($this->num_meal_types);
        $this->num_meal_types = $this->num_meal_types+1;
        $temp_arr = NULL;
        $temp_arr = array();
        for( $i = 0; $i <$this->num_meal_types-1; $i++){
            $temp_arr[$i] = $this->meal_types[$i];
        }
        $temp_arr[$this->num_meal_types-1] = $temp_meal_type;
        $this->meal_types = $temp_arr;
        //delete [] temp_arr;
        
    }
}

/***Person Class***/
class person{
    public $portion_percent;
    public $id_num;
    public $calorie_restriction;
    public $name;
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
    function __constructor(){
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
    public $name;
    public $meal_plans;
    public $num_meal_plans;
    public $persons;
    public $num_persons;
    public $id_num;
    public $portion_percentage_for_each_ingredient;
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
function __constructor(){
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
    $temp_arr = array();
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
    $temp_arr = array();
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
            for ($k = 0; $k < $temp_meal_plan.get_meal_type_by_id($i).get_generic_meal_by_id($j).get_num_specific_meals(); $k++){
                
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