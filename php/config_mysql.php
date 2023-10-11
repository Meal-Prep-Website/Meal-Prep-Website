<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require_once 'classes.php';

//mysql login
$servername = 'localhost';
$username = 'username';
$password = 'password';
$dbname = 'mpdb';

$conn = mysqli_connect($servername, $username, $password,$dbname);

/*
//postgres login

$servername = 'localhost';
$username = 'postgres';
$password = 'Firefighting*Gym00';
$dbname = 'mpdb';
$portnum = '5432';

$conn = odbc_connect("DRIVER={Devart ODBC Driver for PostgreSQL};Server=$servername;Database=$dbname;Port=$portnum;String Types=Unicode", $username, $password);
*/

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*
$sql='SHOW DATABASES LIKE \'mpdb\';';
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        //$conn->close();

        // Create database
$sql = "CREATE DATABASE IF NOT EXISTS mpdb";
$conn->query($sql);




$conn->close();
$conn = mysqli_connect($servername, $username, $password, $dbname);
/* Attempt to connect to MySQL database */
         // sql to create table
         /*
          $sql = "CREATE TABLE IF NOT EXISTS user_table(
          id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          login VARCHAR(255) NOT NULL,
          password VARCHAR(255) NOT NULL,
          recipes_created INT(5) UNSIGNED,
          items_clicked INT(10) UNSIGNED

          )";
      
      $conn->query($sql);



      $sql = "CREATE TABLE IF NOT EXISTS food_product_table(
        
        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        times_clicked  INT(5) UNSIGNED NOT NULL,
        ingredient_name VARCHAR(255) NOT NULL,
        indivisible_bool TINYINT(1) NOT NULL,
        total_cost DECIMAL(6,3) UNSIGNED NOT NULL,
        num_servings DECIMAL(6,3) UNSIGNED NOT NULL,
        grams_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,

        calories_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        total_fat_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        saturated_fat_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        trans_fat_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        cholesterol_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        sodium_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        total_carbs_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        fiber_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        total_sugar_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        added_sugar_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        protein_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        vitamin_d_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        calcium_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        iron_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,
        potassium_per_serving DECIMAL(6,3) UNSIGNED NOT NULL,

        contains_milk_bool TINYINT(1) NOT NULL,
        contains_tree_nuts_bool TINYINT(1) NOT NULL,
        contains_peanuts_bool TINYINT(1) NOT NULL,
        contains_eggs_bool TINYINT(1) NOT NULL,
        contains_fish_bool TINYINT(1) NOT NULL,
        contains_shellfish_bool TINYINT(1) NOT NULL,
        contains_wheat_bool TINYINT(1) NOT NULL,
        contains_soy_bool TINYINT(1) NOT NULL,
        contains_seasame_bool TINYINT(1) NOT NULL


        )";

    $conn->query($sql);



    $sql = "CREATE TABLE IF NOT EXISTS specific_meal_table(
      id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      times_clicked  INT(5) UNSIGNED NOT NULL,
      generic_meal_name VARCHAR(255) NOT NULL,
      ingredient_list VARCHAR(255) NOT NULL,
      number_of_ingredients INT(2) NOT NULL,
      grams_needed_per_ingredient VARCHAR(255)  NOT NULL,
      preparation_steps VARCHAR(255)  NOT NULL,
      cooking_steps VARCHAR(255)  NOT NULL,
      finishing_steps VARCHAR(255)  NOT NULL

      )";
  
  $conn->query($sql);               

  $sql = "CREATE TABLE IF NOT EXISTS meal_type_table(
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    times_clicked  INT(5) UNSIGNED NOT NULL,
    generic_meal_list VARCHAR(255) NOT NULL

    )";

  $conn->query($sql);   

  //person table
  $sql = "CREATE TABLE IF NOT EXISTS person_table(
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    daily_caloric_intake INT(5) UNSIGNED NOT NULL,
    dietary_restrictions VARCHAR(255) NOT NULL,
    food_allergens VARCHAR(255) NOT NULL,
    current_weight DECIMAL(6,3) UNSIGNED NOT NULL,
    weight_goal DECIMAL (6,3) UNSIGNED NOT NULL,
    daily_protein_intake INT(5) UNSIGNED NOT NULL,
    percent_of_daily_calories_from_meal_prep DECIMAL(6,3) UNSIGNED NOT NULL,
    meal_plan VARCHAR(255) NOT NULL

    )";

  $conn->query($sql);  

      //if the db is being initialized, create dummy data
  if(json_encode($emparray) != "[{\"Database (mpdb)\":\"mpdb\"}]"){
    // Set parameters
    $param_password1 = password_hash('RolledOats', PASSWORD_DEFAULT); // Creates a password hash
    $param_password2 = password_hash('Soymilk', PASSWORD_DEFAULT); // Creates a password hash
    $param_password3 = password_hash('WholeFlaxseed', PASSWORD_DEFAULT); // Creates a password hash
    $param_password4 = password_hash('Cinnamon', PASSWORD_DEFAULT); // Creates a password hash
    $param_password5 = password_hash('Dextrose', PASSWORD_DEFAULT); // Creates a password hash
    $sql = "INSERT INTO user_table ( login, 
    password, recipes_created, items_clicked) 
    VALUES ('OldFashionedOats', '$param_password1', 150,150),
    ('Silk', '$param_password2', 110,110),
    ('Flaxseed', '$param_password3', 70,70),
    ('GroundCinnamon', '$param_password4', 0,0),
    ('Stevia', '$param_password5', 0,0)";
    $conn->query($sql);
*/
    //insert dummy data
    /*
    $sql = "INSERT INTO food_product_table(name, times_clicked, ingredient_name,indivisible_bool,total_cost,num_servings, grams_per_serving,
    calories_per_serving,total_fat_per_serving,saturated_fat_per_serving,trans_fat_per_serving,cholesterol_per_serving,sodium_per_serving,
    total_carbs_per_serving,fiber_per_serving,total_sugar_per_serving,added_sugar_per_serving,protein_per_serving,vitamin_d_per_serving,
    iron_per_serving,calcium_per_serving,potassium_per_serving,
    contains_milk_bool,contains_tree_nuts_bool,contains_peanuts_bool,contains_eggs_bool,contains_fish_bool,contains_shellfish_bool,
    contains_wheat_bool,contains_soy_bool,contains_seasame_bool) 
    VALUES ('Target Brand Old Fashioned Oats', 1, 'Old Fashioned Oats',0, 4.19,30,40,150,2.5, .5, 0, 0, 0, 27, 4, 0, 0, 5, 0, 1.6, 0, 150,0,0,0,0,0,0,0,0,0),
    ('Silk Brand Original Silk', 4, 'Silk',0, 2.99,8,240,110,4.5, .5, 0, 0, 90, 9, 2, 6, 5, 8, 3, 1.3, 450, 380,0,0,0,0,0,0,0,1,0),
    ('Target Brand Cherry Berry Blend', 3, 'Cherry Berry Blend',0, 8.99,10,135,70,0, 0, 0, 01, 0, 17, 3, 12, 0, 1, 0, .6, 20, 190,0,0,0,0,0,0,0,0,0),
    ('Target Brand Mango Strawberry Blend', 3, 'Mango Strawberry Blend',0, 10.79,10,135,70,0, 0, 0, 0, 0, 17, 2, 13, 0, 1, 0, .6, 20, 200,0,0,0,0,0,0,0,0,0),
    ('Target Brand Banana Strawberry Blend', 3, 'Banana Strawberry Blend',0, 9.99,10,140,80,0, 0, 0, 0, 0, 21, 2, 11, 0, 1, 0, .7, 20, 340,0,0,0,0,0,0,0,0,0)";
    */
    /*
    $sql = "INSERT INTO food_product_table(ingredient_name,name,total_cost,num_servings, grams_per_serving,
    calories_per_serving,total_fat_per_serving,saturated_fat_per_serving,trans_fat_per_serving,cholesterol_per_serving,sodium_per_serving,
    total_carbs_per_serving,fiber_per_serving,total_sugar_per_serving,added_sugar_per_serving,protein_per_serving,vitamin_d_per_serving,
    iron_per_serving,calcium_per_serving,potassium_per_serving) 
    VALUES
    ('Old Fashioned Oats', 'Target Brand Old Fashioned Oats', 4.19, 30, 40, 150, 2.5, .5, 0, 0, 0, 27, 4, 0, 0, 5, 0, 1.6, 0, 150),
    ('Quick Oats', 'Target Brand Quick Oats', 4.19, 30, 40, 150, 2.5, .5, 0, 0, 0, 27, 4, 0, 0, 5, 0, 1.6, 0, 150),
    ('Soy Milk', 'Silk Brand Original Silk', 2.99, 8, 240, 110, 4.5, .5, 0, 0, 90, 9, 2, 6, 5, 8, 3, 1.3, 450, 380),
    ('Vanilla Soy Milk', 'Silk Brand Vanilla Silk', 2.99, 8, 240, 100, 3.5, .5, 0, 0, 80, 11, 1, 9, 8, 6, 3, 1.1, 450, 300),
    ('Cherry Berry Blend', 'Target Brand Cherry Berry Blend', 8.99, 10, 135, 70, 0, 0, 0, 0, 0, 17, 3, 12, 0, 1, 0, 0.6, 20, 190),
    ('Mango Strawberry Blend', 'Target Brand Mango Strawberry Fruit Blend', 10.79, 10, 135, 70, 0, 0, 0, 0, 0, 17, 2, 13, 0, 1, 0, .6, 20, 200),
    ('Strawberry Banana Blend', 'Target Brand Strawberry Banana Blend', 9.99, 10, 140, 80, 0, 0, 0, 0, 0, 21, 2, 11, 0, 1, 0, 0.7, 20, 340),
    ('Passion Fruit Tropical Blend', 'Target Brand Passion Fruit Tropical Blend', 4.49, 3, 140, 70, .5, 0, 0, 0, 0, 17, 2, 13, 0, 1, .1, .4, 10, 160),
    ('Milled Flax Seed', 'Bobs Red Mill Brand Flax Seed', 4.49, 35, 13, 70, 4.5, 0, 0, 0, 0, 4, 3, 0, 0, 3, 0, 1, 24, 113),
    ('Peanut Butter Flavored Protein Powder', 'Vega Brand Peanut Butter Sport Protein Powder', 96.37, 45, 43, 170, 3, 0.5, 0, 0, 270, 6, 3, 2, 0, 30, 0, 5.5, 180, 250),
    ('Chocolate Flavored Protein Powder', 'Vega Brand Chocolate Sport Protein Powder', 83.49, 45, 44, 160, 3, .5, 0, 0, 400, 6, 2, 2, 0, 30, 0, 7.2, 200, 310),
    ('Mocha Flavored Protein Powder', 'Vega Brand Mocha Sport Protein Powder', 91.89, 45, 43, 160, 3, .5, 0, 0, 390, 5, 2, 2, 0, 30, 0, 6.8, 170, 250),
    ('Vanilla Flavored Protein Powder', 'Vega Brand Vanilla Sport Protein Powder', 83.49, 45, 44, 160, 3, .5, 0, 0, 400, 6, 2, 2, 0, 30, 0, 7.2, 200, 310),
    ('Berry Flavored Protein Powder', 'Vega Brand Berry Sport Protein Powder', 87.20, 45, 42, 160, 3, .5, 0, 0, 400, 5, 2, 2, 0, 30, 0, 6.2, 180, 190),
    ('Canned Pumpkin', 'Walmart Brand Canned Pumpkin', 2.58, 7, 120, 70, .5, 0, 0, 0, 55, 13, 6, 5, 0, 3, 0, 1.5, 60, 340),
    ('Granulated Stevia', 'Walmart Brand Granulated Stevia', 9.33, 550, 1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0), 
    ('Ground Ginger', 'Target Brand Organic Ground Ginger', 4.29, 44, 1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
    ('Ground Cloves', 'Target Brand Organic Ground Organic Cloves', 5.29, 56, 1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0), 
    ('Ground Allspice', 'Target Brand Ground Allspice', 1.99, 56, 1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0), 
    ('Ground Nutmeg', 'Target Brand Ground Nutmeg', 2.89, 60, 1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
    ('Ground Cinnamon', 'Walmart Brand Ground Cinnamon Large', 11.12, 510, 1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
    ('Burrito Tortilla', 'Xtreme Wellness High Fiber Low Carb Tortilla Wraps', 5.28, 16, 45, 50, 1.5, 0, 0, 0, 280, 15, 11, 0, 0, 5, 0, 0, 65, 1),
    ('Vegan Egg', 'Just Egg Plant Based Egg', 3.99, 8, 44, 70, 5, 0, 0, 0, 160, 1, 0, 0, 0, 5, 0, 0, 0, 0),
    ('Vegan Cheese Shreds', 'Field Roast Chao Creamery Vegan Shreds', 5.28, 7, 28, 80, 6, 6, 0, 0, 260, 6,0,0,0,0,0,0,0,0),
    ('Sliced Jalepenos', 'La Costena Sliced Jalapenos', 1.98, 11, 40, 10, 0, 0, 0, 0, 470, 2, 2, 0, 0, .5, 0, 0.4, 9.4, 60.60),
    ('Vegan Meat', 'Beyond Meat Beyond Beef Plant Based Ground', 7.99, 4, 113, 230, 14, 5, 0, 0, 390, 7, 2, 0, 0, 20, 0, 3.6, 104, 282),
    ('Taco Seasoning', 'Old El Paso 25 Percent Less Sodium', .95, 6, 5, 15, 0, 0, 0, 0, 220, 3, .5, 0, 0, 0, .4,0,0,0);";
    $conn->query($sql);

    //insert dummy data
    $sql = "INSERT INTO specific_meal_table(name, times_clicked, generic_meal_name, ingredient_list,number_of_ingredients,grams_needed_per_ingredient,preparation_steps,cooking_steps,finishing_steps) 
    VALUES ('Strawberry Banana Chocolate Oatmeal', 1, 'Oatmeal','Old Fashioned Oats,Soy Milk,Strawberry Banana Blend',3,'60,190,140','Break up frozen fruit by smashing fruit in unopened package.,Lay out meal prep container bottoms on large surface.',
    'None','Put 140g of Fruit mix (in all containers),Put 20g of chocolate protein (in all containers),Put 7g of flax seed (in all containers),Put 190g of soy milk (in all containers),Put 54g of Old-Fashioned Oats (in all containers),Put on all container tops (in all containers),Store containers in Freezer (in all containers)'),
    ('Cherry Berry Chocolate Oatmeal', 1, 'Oatmeal','Old Fashioned Oats,Soy Milk,Cherry Berry Blend',3,'60,190,135','Break up frozen fruit by smashing fruit in unopened package.,Lay out meal prep container bottoms on large surface.',
    'None','Put 140g of Fruit mix (in all containers),Put 20g of chocolate protein (in all containers),Put 7g of flax seed (in all containers),Put 190g of soy milk (in all containers),Put 54g of Old-Fashioned Oats (in all containers),Put on all container tops (in all containers),Store containers in Freezer (in all containers)'),
    ('Mango Strawberry Vanilla Oatmeal', 1, 'Oatmeal','Old Fashioned Oats,Soy Milk,Mango Strawberry Blend',3,'60,190,135','Break up frozen fruit by smashing fruit in unopened package.,Lay out meal prep container bottoms on large surface.',
    'None','Put 140g of Fruit mix (in all containers),Put 20g of chocolate protein (in all containers),Put 7g of flax seed (in all containers),Put 190g of soy milk (in all containers),Put 54g of Old-Fashioned Oats (in all containers),Put on all container tops (in all containers),Store containers in Freezer (in all containers)')";
    $conn->query($sql);

    //insert dummy data
    $sql = "INSERT INTO meal_type_table(name, times_clicked, generic_meal_list)
    VALUES 
    ('Breakfasts', 1, 'Oatmeal,Breakfast Burrito,Omelet'),
    ('Entrees', 1, 'Burger,Burrito,Casserole,Shepards Pie,Taco'),
    ('Desserts', 1, 'Cake,Pie,Cookie')";
    $conn->query($sql);

    $sql = "INSERT INTO person_table(name, daily_caloric_intake, dietary_restrictions, food_allergens, current_weight,
    weight_goal, daily_protein_intake, percent_of_daily_calories_from_meal_prep, meal_plan)
    VALUES
    ('Gayle', 1500, 'NONE','NONE', 148, 140, 80, 80, 'B,E,E'),
    ('Weston', 2200, 'NONE','NONE', 165, 170, 120, 80, 'B,E,E,E')";
    $conn->query($sql);
  }
*/
/*
  $Old_Fashioned_Oats = new ingredient();
  $Old_Fashioned_Oats->set_name("Old_Fashioned_Oats");
  $Target_Brand_Old_Fashioned_Oats = new food_product();
  $Target_Brand_Old_Fashioned_Oats->set_name("Target_Brand_Old_Fashioned_Oats");
  $Target_Brand_Old_Fashioned_Oats->set_total_cost(4.19);
  $Target_Brand_Old_Fashioned_Oats->set_num_servings(30);
  $Target_Brand_Old_Fashioned_Oats->set_grams_per_serving(40);
  $Target_Brand_Old_Fashioned_Oats->set_calories_per_serving(150);
  $Target_Brand_Old_Fashioned_Oats->set_total_fat_per_serving(2.5);
  $Target_Brand_Old_Fashioned_Oats->set_saturated_fat_per_serving(0.5);
  $Target_Brand_Old_Fashioned_Oats->set_trans_fat_per_serving(0);
  $Target_Brand_Old_Fashioned_Oats->set_cholesterol_per_serving(.001*0);
  $Target_Brand_Old_Fashioned_Oats->set_sodium_per_serving(.001*0);
  $Target_Brand_Old_Fashioned_Oats->set_total_carbs_per_serving(27);
  $Target_Brand_Old_Fashioned_Oats->set_fiber_per_serving(4);
  $Target_Brand_Old_Fashioned_Oats->set_total_sugar_per_serving(0);
  $Target_Brand_Old_Fashioned_Oats->set_added_sugar_per_serving(0);
  $Target_Brand_Old_Fashioned_Oats->set_protein_per_serving(5);
  $Target_Brand_Old_Fashioned_Oats->set_vitamin_d_per_serving(.00001*0);
  $Target_Brand_Old_Fashioned_Oats->set_iron_per_serving(.001*1.6);
  $Target_Brand_Old_Fashioned_Oats->set_calcium_per_serving(.001*0);
  $Target_Brand_Old_Fashioned_Oats->set_potassium_per_serving(.001*150);
  $Target_Brand_Old_Fashioned_Oats->set_cost_per_serving();
  $Target_Brand_Old_Fashioned_Oats->set_all_facts_per_gram();
  $Old_Fashioned_Oats->set_food_product($Target_Brand_Old_Fashioned_Oats);
  */

  //echo json_encode($Old_Fashioned_Oats);

?>