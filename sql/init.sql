CREATE DATABASE IF NOT EXISTS mpdb;
USE mpdb;
# Create users table
CREATE TABLE IF NOT EXISTS users(
    login_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

# Create meal_types table
CREATE TABLE IF NOT EXISTS meal_types(
    meal_type_name VARCHAR(255) NOT NULL PRIMARY KEY
) ENGINE=InnoDB;

# Create meal_plans table
CREATE TABLE IF NOT EXISTS meal_plans(
    meal_plan_name VARCHAR(255) NOT NULL,
    meal_type_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (meal_plan_name, meal_type_name),
    FOREIGN KEY (meal_type_name) REFERENCES meal_types (meal_type_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    meal_type_amount INT(5) UNSIGNED
) ENGINE=InnoDB;

# Create person_info table
CREATE TABLE IF NOT EXISTS person_info(
    person_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    person_name VARCHAR(255) NOT NULL,
    daily_caloric_intake INT(5) UNSIGNED NOT NULL,
    weight_goal DECIMAL(6,3) UNSIGNED NOT NULL,
    daily_protein_intake INT(5) UNSIGNED NOT NULL,
    percent_of_daily_calories_from_meal_prep DECIMAL(6,3) UNSIGNED NOT NULL,
    meal_plan_name VARCHAR(255) NOT NULL,
    prep_cycle INT(5) UNSIGNED NOT NULL,
    FOREIGN KEY (meal_plan_name) REFERENCES meal_plans (meal_plan_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create food_allergens table
CREATE TABLE IF NOT EXISTS food_allergens(
    allergen_name VARCHAR(255) PRIMARY KEY
) ENGINE=InnoDB;

# Create dietary_restrictions table
CREATE TABLE IF NOT EXISTS dietary_restrictions(
    restriction_name VARCHAR(255) PRIMARY KEY
) ENGINE=InnoDB;

# Create person_id_to_food_allergens table
CREATE TABLE IF NOT EXISTS person_id_to_food_allergens(
    person_id INT(5) UNSIGNED,
    allergen_name VARCHAR(255),
    PRIMARY KEY (person_id, allergen_name),
    FOREIGN KEY (person_id) REFERENCES person_info (person_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (allergen_name) REFERENCES food_allergens (allergen_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create person_id_to_dietary_restrictions table
CREATE TABLE IF NOT EXISTS person_id_to_dietary_restrictions(
    person_id INT(5) UNSIGNED,
    restriction_name VARCHAR(255),
    PRIMARY KEY (person_id, restriction_name),
    FOREIGN KEY (person_id) REFERENCES person_info (person_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (restriction_name) REFERENCES dietary_restrictions (restriction_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create person_id_to_weight table
CREATE TABLE IF NOT EXISTS person_id_to_weight(
    weight INT(5) UNSIGNED,
    date VARCHAR(255),
    person_id INT(5) UNSIGNED,
    PRIMARY KEY (person_id, weight, date),
    FOREIGN KEY (person_id) REFERENCES person_info (person_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create stores table
CREATE TABLE IF NOT EXISTS stores(
    store_name VARCHAR(255) PRIMARY KEY
) ENGINE=InnoDB;

# Create store_locations table
CREATE TABLE IF NOT EXISTS store_locations(
    store_location VARCHAR(255) PRIMARY KEY,
    store_name VARCHAR(255),
    FOREIGN KEY (store_name) REFERENCES stores (store_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create brands table
CREATE TABLE IF NOT EXISTS brands(
    brand_name VARCHAR(255) PRIMARY KEY,
    store_name VARCHAR(255),
    FOREIGN KEY (store_name) REFERENCES stores (store_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    generic TINYINT(1)
) ENGINE=InnoDB;

# Create generic_meals table
CREATE TABLE IF NOT EXISTS generic_meals(
    generic_meal_name VARCHAR(255) NOT NULL PRIMARY KEY,
    meal_type_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (meal_type_name) REFERENCES meal_types (meal_type_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create specific_meals table
CREATE TABLE IF NOT EXISTS specific_meals(
    specific_meal_name VARCHAR(255) NOT NULL,
    generic_meal_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (specific_meal_name, generic_meal_name),
    FOREIGN KEY (generic_meal_name) REFERENCES generic_meals (generic_meal_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create specific_meal_ingredients table
CREATE TABLE IF NOT EXISTS specific_meal_ingredients(
    ingredient_name VARCHAR(255) NOT NULL,
    specific_meal_name VARCHAR(255) NOT NULL,
    generic_meal_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (specific_meal_name, generic_meal_name, ingredient_name),
    FOREIGN KEY (specific_meal_name, generic_meal_name)
        REFERENCES specific_meals (specific_meal_name, generic_meal_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    grams_needed DECIMAL(6,3) UNSIGNED NOT NULL
) ENGINE=InnoDB;

# Create specific_meal_preparation_steps table
CREATE TABLE IF NOT EXISTS specific_meal_preparation_steps(
    preparation_step_number INT(5) UNSIGNED,
    specific_meal_name VARCHAR(255) NOT NULL,
    generic_meal_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (preparation_step_number, specific_meal_name, generic_meal_name),
    FOREIGN KEY (specific_meal_name, generic_meal_name)
        REFERENCES specific_meals (specific_meal_name, generic_meal_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    preparation_step_description VARCHAR(255)
) ENGINE=InnoDB;

# Create specific_meal_cooking_steps table
CREATE TABLE IF NOT EXISTS specific_meal_cooking_steps(
    cooking_step_number INT(5) UNSIGNED,
    specific_meal_name VARCHAR(255) NOT NULL,
    generic_meal_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (cooking_step_number, specific_meal_name, generic_meal_name),
    FOREIGN KEY (specific_meal_name, generic_meal_name)
        REFERENCES specific_meals (specific_meal_name, generic_meal_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    cooking_step_description VARCHAR(255)
) ENGINE=InnoDB;

# Create specific_meal_finishing_steps table
CREATE TABLE IF NOT EXISTS specific_meal_finishing_steps(
    finishing_step_number INT(5) UNSIGNED,
    specific_meal_name VARCHAR(255) NOT NULL,
    generic_meal_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (finishing_step_number, specific_meal_name, generic_meal_name),
    FOREIGN KEY (specific_meal_name, generic_meal_name)
        REFERENCES specific_meals (specific_meal_name, generic_meal_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    finishing_step_description VARCHAR(255)
) ENGINE=InnoDB;

# Create ingredients table
CREATE TABLE IF NOT EXISTS ingredients(
    ingredient_name VARCHAR(255) NOT NULL PRIMARY KEY
) ENGINE=InnoDB;

# Create ingredient_substitutes table
CREATE TABLE IF NOT EXISTS ingredient_substitutes(
    ingredient_name_1 VARCHAR(255) NOT NULL,
    ingredient_name_2 VARCHAR(255) NOT NULL,
    PRIMARY KEY (ingredient_name_1, ingredient_name_2),
    FOREIGN KEY (ingredient_name_1) REFERENCES ingredients (ingredient_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (ingredient_name_2) REFERENCES ingredients (ingredient_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# Create products table
CREATE TABLE IF NOT EXISTS products(
    product_id INT(255) UNSIGNED PRIMARY KEY,
    store_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (store_name) REFERENCES stores (store_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(6,2) UNSIGNED NOT NULL,
    rating DECIMAL(2,1) UNSIGNED,
    brand_name VARCHAR(255),
    FOREIGN KEY (brand_name) REFERENCES brands (brand_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    ingredient_name VARCHAR(255),
    FOREIGN KEY (ingredient_name) REFERENCES ingredients (ingredient_name)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    size DECIMAL(5,2) UNSIGNED,
    size_unit VARCHAR(20),
	size_unit_per_serving DECIMAL(6,3) UNSIGNED,
    organic TINYINT(1),
    indivisible_bool TINYINT(1)
) ENGINE=InnoDB;

# Create product_nutrition_facts table
CREATE TABLE IF NOT EXISTS product_nutrition_facts(
    product_id INT(255) UNSIGNED,
    PRIMARY KEY (product_id),
    FOREIGN KEY (product_id) REFERENCES products (product_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
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
    potassium_per_serving DECIMAL(6,3) UNSIGNED NOT NULL
) ENGINE=InnoDB;

# Create product_allergen_info table
CREATE TABLE IF NOT EXISTS product_allergen_info(
    product_id INT(255) UNSIGNED,
    PRIMARY KEY (product_id),
    FOREIGN KEY (product_id) REFERENCES products (product_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    contains_milk_bool TINYINT(1) NOT NULL,
    contains_tree_nuts_bool TINYINT(1) NOT NULL,
    contains_peanuts_bool TINYINT(1) NOT NULL,
    contains_eggs_bool TINYINT(1) NOT NULL,
    contains_fish_bool TINYINT(1) NOT NULL,
    contains_shellfish_bool TINYINT(1) NOT NULL,
    contains_wheat_bool TINYINT(1) NOT NULL,
    contains_soy_bool TINYINT(1) NOT NULL,
    contains_sesame_bool TINYINT(1) NOT NULL
) ENGINE=InnoDB;
