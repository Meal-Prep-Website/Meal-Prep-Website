<?php
// Include config file
require_once 'config_mysql.php';

$table_name = $_GET['table_name'];
$operation_type = $_GET['operation_type'];


if ($table_name =='meal_types'){
    $old_name = $_GET['old_name'];
    if ($operation_type == 'create'){
        $meal_type_name = $_GET['old_cat'];
        $generic_meal_name = $old_name;
        $sql = "INSERT INTO generic_meals (generic_meal_name, meal_type_name)
        VALUES (\"".$generic_meal_name."\", \"".$meal_type_name."\");";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $conn->close();
    }
    else if($operation_type == 'update'){
        $meal_type_name = $_GET['new_cat'];
        $new_generic_meal_name = $_GET['new_name'];
        $old_generic_meal_name = $old_name;
        $sql = "UPDATE generic_meals
        SET generic_meal_name = \"".$new_generic_meal_name."\", meal_type_name = \"".$meal_type_name."\"
        WHERE generic_meal_name = \"".$old_generic_meal_name."\";
        ";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $conn->close();
    }
    else if ($operation_type == 'delete'){
        $generic_meal_name = $old_name;
        $sql = "DELETE FROM generic_meals WHERE generic_meal_name = \"".$generic_meal_name."\";";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $conn->close();
    }
}
else if($table_name == 'person_info'){
    $old_name = $_GET['old_name'];
    if ($operation_type == 'create'){
        //create the new
        $new_name = $_GET['new_name'];
        $new_cat = $_GET['new_cat'];

        //grab the string
        $sql = "INSERT INTO ".$table_name."(name,dietary_restrictions,food_allergens,meal_plan) VALUES ('".$new_name."','NONE','NONE','E');";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $conn->close();
        //echo $emparray['generic_meal_list'];
    }
    else if($operation_type == 'update'){
        $new_name = $_GET['new_name'];
        $new_cat = $_GET['new_cat'];

        $sql = "UPDATE `".$table_name."` SET $new_cat = \"".$new_name."\" WHERE name = \"".$old_name."\";";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        $conn->close();
    }
    else if ($operation_type == 'delete'){
        //grab the string
        $sql = "DELETE FROM `".$table_name."` WHERE name = \"".$old_name."\";";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        $conn->close();

    }
}
else if($table_name == 'meal_info'){
    // Retrieve the values sent from the AJAX request
    $generic_meal_name = $_GET['generic_meal_name'];
    $section_identifier = $_GET['section_identifier'];

    // Variation section
    if ($section_identifier === "section_variation") {
        if ($operation_type === 'operation_update') {
            // Code for operation_update
            $section_table_name = 'specific_meals';
            $old_specific_meal_name = $_GET['old_specific_meal_identifier'];
            $new_specific_meal_name = $_GET['new_specific_meal_identifier'];
            $sql = "UPDATE  $section_table_name
            SET specific_meal_name = '$new_specific_meal_name' 
            WHERE specific_meal_name = '$old_specific_meal_name' 
            AND generic_meal_name = '$generic_meal_name'";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            $conn->close();
        } elseif ($operation_type === 'operation_create') {
            // Code for operation_create
            $specific_meal_name = $_GET['specific_meal_name'];
            $section_table_name = 'specific_meals';
            $sql = "INSERT INTO $section_table_name (specific_meal_name, generic_meal_name)
            VALUES ('$specific_meal_name', '$generic_meal_name');";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            $conn->close();
        } elseif ($operation_type === 'operation_delete') {
            // Code for operation_delete
            $specific_meal_name = $_GET['specific_meal_name'];
            $section_table_name = 'specific_meals';
            $sql = "DELETE FROM $section_table_name
            WHERE specific_meal_name = '$specific_meal_name' 
            AND generic_meal_name = '$generic_meal_name'";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            $conn->close();
        }
    }
    // Ingredients required section
    elseif ($section_identifier === "section_ingredients_required") {
        $specific_meal_name = $_GET['specific_meal_name'];
        $section_table_name = 'specific_meal_ingredients';
        if ($operation_type === 'operation_update') {
            $old_ingredient_name = $_GET['old_ingredient_identifier'];
            $new_ingredient_name = $_GET['new_ingredient_identifier'];
            $grams_needed = $_GET['grams_needed'];
            
            // Code for operation_update
            // Build the update query.
            // Code for operation_update
            // Execute an SQL SELECT query to retrieve the existing steps
            $sql = "SELECT ingredient_name FROM $section_table_name WHERE specific_meal_name = '$specific_meal_name' AND generic_meal_name = '$generic_meal_name' ORDER BY ingredient_name;";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            
            // Create an empty array to store the ingredient names
            $ingredient_names = [];
            
            // Fetch each row and store the ingredient name in the array
            while ($row = mysqli_fetch_assoc($result)) {
                $ingredient_names[] = $row['ingredient_name'];
            }
            
            // Check if the updated ingredient name is already occupied
            $nameOccupied = false;
            
            foreach ($ingredient_names as $existingName) {
                if ($existingName == $new_ingredient_name && ($new_ingredient_name != $old_ingredient_name)) {
                    $nameOccupied = true;
                    break;
                }
            }
            
            $preoccupied_ingredient_name = $new_ingredient_name;
            $edited_ingredient_name = $old_ingredient_name;
            
            if($nameOccupied){
                $sql = "DELETE FROM $section_table_name where ingredient_name = '$new_ingredient_name' && specific_meal_name = '$specific_meal_name'&& generic_meal_name = '$generic_meal_name';";
                $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            }
            $sql = "UPDATE  $section_table_name
                    SET grams_needed = $grams_needed, ingredient_name = '$new_ingredient_name' 
                    WHERE ingredient_name = '$old_ingredient_name' 
                    AND specific_meal_name = '$specific_meal_name' 
                    AND generic_meal_name = '$generic_meal_name'";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            echo json_encode($nameOccupied);
            $conn->close();
        } elseif ($operation_type === 'operation_create') {
            $ingredient_name = $_GET['ingredient_identifier'];
            $grams_needed = $_GET['grams_needed'];
            // Code for operation_create
            // Prepare the SQL statement
            // Execute an SQL SELECT query to retrieve the existing steps
            $sql = "SELECT ingredient_name FROM $section_table_name WHERE specific_meal_name = '$specific_meal_name' AND generic_meal_name = '$generic_meal_name' ORDER BY ingredient_name;";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            
            // Create an empty array to store the ingredient names
            $ingredient_names = [];
            
            // Fetch each row and store the ingredient name in the array
            while ($row = mysqli_fetch_assoc($result)) {
                $ingredient_names[] = $row['ingredient_name'];
            }
            
            // Check if the updated ingredient name is already occupied
            $nameOccupied = false;
            
            foreach ($ingredient_names as $existingName) {
                if ($existingName == $ingredient_name) {
                    $nameOccupied = true;
                    break;
                }
            }
            
            $preoccupied_ingredient_name = $ingredient_name;
            
            if($nameOccupied){
                $sql = "UPDATE  $section_table_name
                SET grams_needed = $grams_needed
                WHERE ingredient_name = '$ingredient_name' 
                AND specific_meal_name = '$specific_meal_name' 
                AND generic_meal_name = '$generic_meal_name'";
            }
            
            else{ 
                $sql = "INSERT INTO  $section_table_name (generic_meal_name, specific_meal_name, ingredient_name, grams_needed)
                    VALUES ('$generic_meal_name', '$specific_meal_name', '$ingredient_name', $grams_needed)";
            }
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            echo json_encode($nameOccupied);
            $conn->close();
        } elseif ($operation_type === 'operation_delete') {
            $specific_meal_name = $_GET['specific_meal_name'];
            // Code for operation_delete
            // Prepare the SQL statement
            $ingredient_name = $_GET['ingredient_identifier'];
            $sql = "DELETE FROM $section_table_name where ingredient_name = '$ingredient_name' && specific_meal_name = '$specific_meal_name'&& generic_meal_name = '$generic_meal_name';";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            
            $conn->close();
        }
    }
    // Steps section
    elseif ($section_identifier === "section_preparation_steps" || $section_identifier === "section_cooking_steps" || $section_identifier === "section_finishing_steps") {
        $specific_meal_name = $_GET['specific_meal_name'];
        if ($section_identifier === "section_preparation_steps"){$section_step_identifier = 'preparation_step_number'; $section_description = 'preparation_step_description'; $section_table_name = 'specific_meal_preparation_steps';}
        else if ($section_identifier === "section_cooking_steps"){$section_step_identifier = 'cooking_step_number'; $section_description = 'cooking_step_description'; $section_table_name = 'specific_meal_cooking_steps';}
        else if ($section_identifier === "section_finishing_steps"){$section_step_identifier = 'finishing_step_number'; $section_description = 'finishing_step_description'; $section_table_name = 'specific_meal_finishing_steps';}

        if ($operation_type === 'operation_update') {
            $step_description = $_GET['step_description'];
            $old_step_number = $_GET['old_step_identifier'];
            $new_step_number = $_GET['new_step_identifier'];

            // Code for operation_update
             // Execute an SQL SELECT query to retrieve the existing steps
            $sql = "SELECT  $section_step_identifier FROM $section_table_name where specific_meal_name = '$specific_meal_name'&& generic_meal_name = '$generic_meal_name' ORDER BY  $section_step_identifier;";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            // Create an empty array to store the step number
            $stepNumbers = [];
            // Fetch each row and store the ingredient name in the array
            while ($row = mysqli_fetch_assoc($result)) {
                $stepNumbers[] = $row[ $section_step_identifier];
            }
            // Check if the updated step number is already occupied
            $stepOccupied = false;
            foreach ($stepNumbers as $existingStep) {
                if ($existingStep === $new_step_number && ($new_step_number != $old_step_number)) {
                    $stepOccupied = true;
                    break;
                }
            }
            $preoccupied_step_number = $new_step_number;
            $edited_step_number = $old_step_number;
            echo ($old_step_number .' '. $new_step_number.' '. $preoccupied_step_number);
            // If the updated step number is already occupied, increment or decrement the step numbers of the affected steps
            if ($stepOccupied) {
                if ($new_step_number < $old_step_number) {
                    // Move the element at the preoccupied step to the very last step
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = (SELECT MAX($section_step_identifier) + 1 FROM $section_table_name WHERE specific_meal_name = '$specific_meal_name' AND generic_meal_name = '$generic_meal_name')
                    WHERE $section_step_identifier = $preoccupied_step_number
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                    
                    // Move the edited element to the preoccupied step
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = $preoccupied_step_number
                    WHERE $section_step_identifier = $edited_step_number
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                    // Shift the remaining elements below the preoccupied step
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = $section_step_identifier + 1
                    WHERE $section_step_identifier > $preoccupied_step_number
                    AND $section_step_identifier <= $edited_step_number
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'
                    ORDER BY $section_step_identifier DESC";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                    // Move the element that was at the last step to the preoccupied step + 1 position
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = $preoccupied_step_number + 1
                    WHERE $section_step_identifier = (SELECT MAX($section_step_identifier) FROM $section_table_name WHERE specific_meal_name = '$specific_meal_name' AND generic_meal_name = '$generic_meal_name')
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                } else if ($new_step_number > $old_step_number){
                    // Move the element at the preoccupied step to the very last step
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = (SELECT MAX($section_step_identifier) + 1 FROM $section_table_name WHERE specific_meal_name = '$specific_meal_name' AND generic_meal_name = '$generic_meal_name')
                    WHERE $section_step_identifier = $preoccupied_step_number
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                    
                    // Move the edited element to the preoccupied step
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = $preoccupied_step_number
                    WHERE $section_step_identifier = $edited_step_number
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                    // Shift the remaining elements below the preoccupied step
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = $section_step_identifier - 1
                    WHERE $section_step_identifier < $preoccupied_step_number
                    AND $section_step_identifier >= $edited_step_number
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                    // Move the element that was at the last step to the preoccupied step - 1 position
                    $sql = "UPDATE $section_table_name
                    SET $section_step_identifier = $preoccupied_step_number - 1
                    WHERE $section_step_identifier = (SELECT MAX($section_step_identifier) FROM $section_table_name WHERE specific_meal_name = '$specific_meal_name' AND generic_meal_name = '$generic_meal_name')
                    AND specific_meal_name = '$specific_meal_name'
                    AND generic_meal_name = '$generic_meal_name'";
                    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                }
            }

            // Update the step with the updated step number
            // Execute an SQL UPDATE query to update the step with the new step number
            $sql = "UPDATE $section_table_name SET $section_description= '$step_description' WHERE $section_step_identifier = $new_step_number && specific_meal_name = '$specific_meal_name' && generic_meal_name = '$generic_meal_name'";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            
        } elseif ($operation_type === 'operation_create') {
            $step_number = $_GET['step_identifier'];
            $step_description = $_GET['step_description'];
            // Code for operation_create
            // Prepare the SQL statement
            $sql = "INSERT INTO $section_table_name ($section_step_identifier, specific_meal_name, generic_meal_name, $section_description) 
                VALUES ('$step_number', '$specific_meal_name', '$generic_meal_name', '$step_description')";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            $conn->close();
        } elseif ($operation_type === 'operation_delete') {
            $step_number = $_GET['step_identifier'];
            $preoccupied_step_number = $step_number;
            // Code for operation_delete
                // Prepare the SQL statement
            $sql = "DELETE FROM $section_table_name where $section_step_identifier = '$step_number' && specific_meal_name = '$specific_meal_name'&& generic_meal_name = '$generic_meal_name';";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
            
            // Shift the remaining elements below the preoccupied step
            $sql = "UPDATE $section_table_name
            SET $section_step_identifier = $section_step_identifier - 1
            WHERE $section_step_identifier > $preoccupied_step_number
            AND specific_meal_name = '$specific_meal_name'
            AND generic_meal_name = '$generic_meal_name'";
            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

            $conn->close();
        }
    }
}
?>