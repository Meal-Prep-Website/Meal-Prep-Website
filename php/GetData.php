<?php
// Function to convert units to grams
function convertToGrams($value, $unit)
{
    // Convert to grams based on unit
    switch ($unit) {
        case 'ml':
            // Convert milliliters to grams
            return $value;
        case 'fl oz':
            // Convert fluid ounces to grams
            // 1 fl oz = 29.57353 ml
            return $value * 29.57353;
        // Add more cases for other units if needed
        case 'oz':
            // Convert ounces to grams
            // 1 oz = 28.34952 grams
            return $value * 28.34952;
        case 'g':
            // Grams to grams (already in grams)
            return $value;
        // Add more cases for other units if needed
        // case 'lb':
        //    // Convert pounds to grams
        //    // Conversion formula
        //    return $value * conversion_factor;
        // ...
        default:
            // Return the value as is if unit is not recognized
            return $value;
    }
}
// Include config file
require_once 'config_mysql.php';


$meal_page = $_GET['meal_page'];
//sql table name
$table_name = $_GET['table_name'];
//name of product to be read
$name = $_GET['name'];

if($meal_page == 'true'){

    //gets all specific meal names per generic meal name
    if($table_name == 'specific_meals'){
        $generic_meal_name = $name;
        $sql = "SELECT specific_meal_name FROM specific_meals WHERE generic_meal_name = \"".$generic_meal_name."\" ORDER BY specific_meal_name;";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        //create an array
        $emparray = array();
        while($row = mysqli_fetch_assoc($result))
        {
            //stores all specific meals
            $emparray[] = $row;
        }
        $conn->close();
        echo json_encode($emparray);
            //echo $food_arr;
    }
    //gets all left column info for a specific meal
    elseif ($table_name == 'specific_meal_info'){
    $specific_meal_name = $name;
    $generic_meal_name = $_GET['generic_meal_name'];

    $sql1 = "SELECT preparation_step_number, preparation_step_description
    FROM specific_meal_preparation_steps
    WHERE specific_meal_name = \"".$specific_meal_name."\"
        AND generic_meal_name = \"".$generic_meal_name."\";";
    

    $sql2 = "SELECT cooking_step_number, cooking_step_description
    FROM specific_meal_cooking_steps
    WHERE specific_meal_name = \"".$specific_meal_name."\"
        AND generic_meal_name = \"".$generic_meal_name."\";";
    

    $sql3 = "SELECT finishing_step_number, finishing_step_description
    FROM specific_meal_finishing_steps
    WHERE specific_meal_name = \"".$specific_meal_name."\"
        AND generic_meal_name = \"".$generic_meal_name."\";";
    
    
    $sql4 = "SELECT ingredient_name, grams_needed
    FROM specific_meal_ingredients
    WHERE specific_meal_name = \"".$specific_meal_name."\"
        AND generic_meal_name = \"".$generic_meal_name."\";";
    
    
    // Assuming you have the query results stored in variables:
    // $preparationSteps - contains the result of specific_meal_preparation_steps query
    $preparationSteps = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
    // $cookingSteps - contains the result of specific_meal_cooking_steps query
    $cookingSteps = mysqli_query($conn, $sql2) or die("Error in Selecting " . mysqli_error($conn));
    // $finishingSteps - contains the result of specific_meal_finishing_steps query
    $finishingSteps = mysqli_query($conn, $sql3) or die("Error in Selecting " . mysqli_error($conn));
    // $ingredients - contains the result of specific_meal_ingredients query
    $ingredients = mysqli_query($conn, $sql4) or die("Error in Selecting " . mysqli_error($conn));

    // Create a PHP object to hold the specific meal information
    $specificMeal = new stdClass();
    $specificMeal->specific_meal_name = $specific_meal_name;

    // Prepare an array to store the preparation steps
    $preparationStepArray = [];
    foreach ($preparationSteps as $row) {
        $preparationStep = new stdClass();
        $preparationStep->preparation_step_number = $row['preparation_step_number'];
        $preparationStep->preparation_step_description = $row['preparation_step_description'];
        $preparationStepArray[] = $preparationStep;
    }

    // Assign the preparation steps to the specific meal object
    $specificMeal->preparation_steps = $preparationStepArray;

    // Prepare an array to store the cooking steps
    $cookingStepArray = [];
    foreach ($cookingSteps as $row) {
        $cookingStep = new stdClass();
        $cookingStep->cooking_step_number = $row['cooking_step_number'];
        $cookingStep->cooking_step_description = $row['cooking_step_description'];
        $cookingStepArray[] = $cookingStep;
    }

    // Assign the cooking steps to the specific meal object
    $specificMeal->cooking_steps = $cookingStepArray;

    // Prepare an array to store the finishing steps
    $finishingStepArray = [];
    foreach ($finishingSteps as $row) {
        $finishingStep = new stdClass();
        $finishingStep->finishing_step_number = $row['finishing_step_number'];
        $finishingStep->finishing_step_description = $row['finishing_step_description'];
        $finishingStepArray[] = $finishingStep;
    }

    // Assign the finishing steps to the specific meal object
    $specificMeal->finishing_steps = $finishingStepArray;

    // Prepare an array to store the ingredients with grams needed
    $ingredientArray = [];
    foreach ($ingredients as $row) {
        $ingredient = new stdClass();
        $ingredient->ingredient_name = $row['ingredient_name'];
        $ingredient->grams_needed = $row['grams_needed'];
        $ingredientArray[] = $ingredient;
    }

    // Assign the ingredients to the specific meal object
    $specificMeal->ingredients = $ingredientArray;

    // Print the PHP object for testing or further processing
    $conn->close();
    echo json_encode($specificMeal);

    }
    else if($table_name == 'ingredient_facts'){
        $specific_meal_name = $_GET['name'];
        //store name matters
        //looks to return storename first and then if not found, will return from any store mp is products from store_name and p is all products
            $store_name = $_GET['store_name'];
            $sql1 = "SELECT
            smi.ingredient_name,
            smi.grams_needed,
            COALESCE(mp.product_id, p.product_id) AS product_id,
            COALESCE(mp.product_name, p.product_name) AS product_name,
            COALESCE(mp.store_name, p.store_name) AS store_name,
            COALESCE(mp.price, p.price) AS product_cost,
            COALESCE((mp.price / mp.size) * smi.grams_needed, (p.price / p.size) * smi.grams_needed) AS servings_cost,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.calories_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.calories_per_serving) * (smi.grams_needed / p.size)) AS calories_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.total_fat_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.total_fat_per_serving) * (smi.grams_needed / p.size)) AS total_fat_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.saturated_fat_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.saturated_fat_per_serving) * (smi.grams_needed / p.size)) AS saturated_fat_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.trans_fat_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.trans_fat_per_serving) * (smi.grams_needed / p.size)) AS trans_fat_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.cholesterol_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.cholesterol_per_serving) * (smi.grams_needed / p.size)) AS cholesterol_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.sodium_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.sodium_per_serving) * (smi.grams_needed / p.size)) AS sodium_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.total_carbs_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.total_carbs_per_serving) * (smi.grams_needed / p.size)) AS total_carbs_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.fiber_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.fiber_per_serving) * (smi.grams_needed / p.size)) AS fiber_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.total_sugar_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.total_sugar_per_serving) * (smi.grams_needed / p.size)) AS total_sugar_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.added_sugar_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.added_sugar_per_serving) * (smi.grams_needed / p.size)) AS added_sugar_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.protein_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.protein_per_serving) * (smi.grams_needed / p.size)) AS protein_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.vitamin_d_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.vitamin_d_per_serving) * (smi.grams_needed / p.size)) AS vitamin_d_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.calcium_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.calcium_per_serving) * (smi.grams_needed / p.size)) AS calcium_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.iron_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.iron_per_serving) * (smi.grams_needed / p.size)) AS iron_per_serving,
            COALESCE(((mp.size / mp.size_unit_per_serving) * nf.potassium_per_serving) * (smi.grams_needed / mp.size), ((p.size / p.size_unit_per_serving) * nf.potassium_per_serving) * (smi.grams_needed / p.size)) AS potassium_per_serving
        FROM
            specific_meals sm
            JOIN specific_meal_ingredients smi ON sm.specific_meal_name = smi.specific_meal_name
            LEFT JOIN (
                SELECT
                    *
                FROM
                    products a
                WHERE
                    store_name = \"".$store_name."\"
                AND 
                    price = (
                        SELECT MIN(price)
                            FROM products b
                            WHERE b.store_name = \"".$store_name."\" AND a.store_name = \"".$store_name."\" AND b.ingredient_name = a.ingredient_name)
            ) mp ON smi.ingredient_name = mp.ingredient_name 
            LEFT JOIN (
                SELECT
                    *
                FROM
                    products a
                WHERE
                    price = (
                        SELECT MIN(price)
                            FROM products b
                            WHERE b.ingredient_name = a.ingredient_name)
            ) p ON smi.ingredient_name = p.ingredient_name 
            LEFT JOIN product_nutrition_facts nf ON mp.product_id = nf.product_id OR p.product_id = nf.product_id
        WHERE
            sm.specific_meal_name = \"".$specific_meal_name."\"
        Group by smi.ingredient_name;";

            $product_info = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
            $product_objects = array();
            while($row = mysqli_fetch_assoc($product_info))
            {
                //stores all specific meals
                $product_objects[] = $row;
            }
            $conn->close();
            
            echo json_encode($product_objects);
    }
    else if($table_name == 'all_ingredients') {
        // Perform the SQL query to retrieve all ingredient names
        $sql = "SELECT ingredient_name FROM `ingredients`";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        // Create an empty array to store the ingredient names
        $ingredientArray = [];

        // Fetch each row and store the ingredient name in the array
        while ($row = mysqli_fetch_assoc($result)) {
            $ingredientArray[] = $row['ingredient_name'];
        }

        // Convert the array to JSON format
        $ingredientJson = json_encode($ingredientArray);
        echo $ingredientJson;
    };
}
    // Assuming $product_objects is the array containing the ProductInfo objects

    // Iterate over each element in the array
    /*
    foreach ($product_objects as $index => $product) {
        echo "Index: " . $index . "<br>";
        echo "Specific Meal: " . $product->specific_meal_name . "<br>";
        echo "Ingredient Name: " . $product->ingredient_name . "<br>";
        echo "Product ID: " . $product->product_id . "<br>";
        echo "Product Name: " . $product->product_name . "<br>";
        echo "Product Cost: " . $product->product_cost . "<br>";
        echo "Grams Needed: " . $product->grams_needed . "<br>";
        echo "<br>";
    }
*/


        /*if($nutrition_facts == "true"){

        }
        if($servings_cost == "true"){
            
        }*/
        //once the products to fill ingredients of specific meal are chosen, now we must query the 
        //servings cost of specific meal using these products
        //nutrition facts of specific meal using these products
        //the cost to buy an entire package of each product used in this specific meal



else{
    //echo ($table_name);
    if ($table_name =='meal_types'){
        if ($name == 'All'){
            $sql = "SELECT DISTINCT generic_meal_name, meal_type_name FROM generic_meals ORDER BY generic_meal_name;";
        }
        else{
            $sql = "SELECT gm.generic_meal_name, gm.meal_type_name FROM generic_meals gm JOIN meal_types mt ON gm.meal_type_name = mt.meal_type_name WHERE mt.meal_type_name= \"".$name."\" ORDER BY gm.generic_meal_name;";
        }
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    }

    else if($table_name == 'person_info'){
        if($name == 'NULL'){
            $sql = "SELECT person_id,person_name FROM person_info";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        }
        else{
            //decipher between pmp and index
            if(!isset($_GET["page"])){
                $sql = "SELECT meal_types.meal_type_name, meal_plans.meal_type_amount FROM meal_types INNER JOIN meal_plans ON meal_types.meal_type_name = meal_plans.meal_type_name INNER JOIN person_info ON meal_plans.meal_plan_name = person_info.meal_plan_name WHERE person_info.person_name = \"".$name."\";";
                //echo $sql;
                $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            }
            else{
                
                $person_id = $_GET['person_id'];

                $sql = "SELECT
                pr.`person_id`,
                pr.`person_name` AS `Person Name`,
                pr.`daily_caloric_intake`,
                pr.`weight_goal`,
                pr.`daily_protein_intake`,
                pr.`percent_of_daily_calories_from_meal_prep`,
                CONCAT(mp.`meal_plan_name`, ' (', GROUP_CONCAT(DISTINCT mp.`meal_type_name`, ': ', mp.`meal_type_amount` SEPARATOR ', '), ')') AS `formatted_meal_plan`,
                pr.`prep_cycle`,
                GROUP_CONCAT(DISTINCT dr.`restriction_name`) AS restriction_names,
                GROUP_CONCAT(DISTINCT fa.`allergen_name`) AS allergen_names,
                pw.`weight` 
            FROM
                `person_info` pr
            LEFT JOIN
                `person_id_to_dietary_restrictions` pdr ON pdr.`person_id` = pr.`person_id`
            LEFT JOIN
                `dietary_restrictions` dr ON dr.`restriction_name` = pdr.`restriction_name`
            LEFT JOIN
                `person_id_to_food_allergens` pfa ON pfa.`person_id` = pr.`person_id`
            LEFT JOIN
                `food_allergens` fa ON fa.`allergen_name` = pfa.`allergen_name`
            LEFT JOIN
                `person_id_to_weight` pw ON pw.`person_id` = pr.`person_id`
            LEFT JOIN
                `meal_plans` mp ON mp.`meal_plan_name` = pr.`meal_plan_name`
            LEFT JOIN
                `meal_types` mt ON mt.`meal_type_name` = mp.`meal_type_name`
            WHERE
                pr.`person_id` = '1'
            GROUP BY
                pr.`person_id`;";
                
                $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            }
        }
    }
        //create an array
        $emparray = array();
        while($row = mysqli_fetch_assoc($result))
        {
            //stores all specific meals
            $emparray[] = $row;
        }
        $conn->close();
        echo json_encode($emparray);
            //echo $food_arr;
    }