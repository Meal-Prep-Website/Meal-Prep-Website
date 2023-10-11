USE mpdb;
INSERT INTO users (login, password_hash) 
    VALUES 
    ('OldFashionedOats', PASSWORD('RolledOats')),
    ('Silk', PASSWORD('SoyMilk')),
    ('Flaxseed', PASSWORD('GroundFlaxSeed')),
    ('GroundCinnamon', PASSWORD('Cinnamon')),
    ('Stevia', PASSWORD('SteviaExtract')),
    ('Weston', PASSWORD('Weston559'));
    
# Dummy data for the 'meal_types' table
INSERT INTO meal_types (meal_type_name) VALUES
    ('Breakfasts'),
    ('Entrees'),
    ('Desserts');

# Dummy data for the 'meal_plans' table
INSERT INTO meal_plans (meal_plan_name, meal_type_name, meal_type_amount) VALUES
    ('Meal Plan 1', 'Breakfasts', 1),
    ('Meal Plan 1', 'Entrees', 2),
    ('Meal Plan 2', 'Breakfasts', 1),
    ('Meal Plan 2', 'Entrees', 3);

# Dummy data for the 'person_info' table
INSERT INTO person_info (person_name, daily_caloric_intake, weight_goal, daily_protein_intake, percent_of_daily_calories_from_meal_prep, meal_plan_name, prep_cycle) VALUES
    ('John Doe', 2000, 150, 100, 50.0, 'Meal Plan 1', 5),
    ('Jane Smith', 1800, 120, 80, 40.0, 'Meal Plan 2', 7);

# Dummy data for the 'food_allergens' table
INSERT INTO food_allergens (allergen_name) VALUES
    ('Peanuts'),
    ('Shellfish'),
    ('Wheat');

# Dummy data for the 'dietary_restrictions' table
INSERT INTO dietary_restrictions (restriction_name) VALUES
    ('Vegetarian'),
    ('Vegan'),
    ('Gluten-free');

# Dummy data for the 'person_id_to_food_allergens' table
INSERT INTO person_id_to_food_allergens (person_id, allergen_name) VALUES
    (1, 'Peanuts'),
    (2, 'Shellfish'),
    (2, 'Wheat');

# Dummy data for the 'person_id_to_dietary_restrictions' table
INSERT INTO person_id_to_dietary_restrictions (person_id, restriction_name) VALUES
    (1, 'Vegetarian'),
    (1, 'Gluten-free'),
    (2, 'Vegan');

# Dummy data for the 'person_id_to_weight' table
INSERT INTO person_id_to_weight (weight, date, person_id) VALUES
    (180, '2023-01-01', 1),
    (175, '2023-01-15', 1),
    (170, '2023-02-01', 1),
    (160, '2023-01-01', 2),
    (155, '2023-01-15', 2),
    (150, '2023-02-01', 2);

# Dummy data for the 'stores' table
INSERT INTO stores (store_name) VALUES
    ('Store A'),
    ('Store B'),
    ('Store C');

# Dummy data for the 'store_locations' table
INSERT INTO store_locations (store_location, store_name) VALUES
    ('Location A', 'Store A'),
    ('Location B', 'Store B'),
    ('Location C', 'Store C');

# Dummy data for the 'brands' table
INSERT INTO brands (brand_name, store_name, generic) VALUES
    ('Brand A', 'Store A', 0),
    ('Brand B', 'Store B', 1),
    ('Brand C', 'Store C', 0);

# Dummy data for the 'generic_meals' table
INSERT INTO generic_meals (generic_meal_name, meal_type_name) VALUES
    ('Meal A', 'Breakfasts'),
    ('Meal B', 'Entrees'),
    ('Meal C', 'Desserts');

# Dummy data for the 'specific_meals' table
INSERT INTO specific_meals (specific_meal_name, generic_meal_name) VALUES
    ('Specific Meal 1', 'Meal A'),
    ('Specific Meal 2', 'Meal B'),
    ('Specific Meal 3', 'Meal B'),
    ('Specific Meal 4', 'Meal C');

# Dummy data for the 'specific_meal_ingredients' table
INSERT INTO specific_meal_ingredients (ingredient_name, specific_meal_name, generic_meal_name, grams_needed) VALUES
    ('Ingredient 1', 'Specific Meal 1', 'Meal A', 100),
    ('Ingredient 2', 'Specific Meal 1', 'Meal A', 50),
    ('Ingredient 3', 'Specific Meal 2', 'Meal B', 200),
    ('Ingredient 4', 'Specific Meal 2', 'Meal B', 150),
    ('Ingredient 5', 'Specific Meal 3', 'Meal B', 175),
    ('Ingredient 6', 'Specific Meal 4', 'Meal C', 300);

# Dummy data for the 'specific_meal_preparation_steps' table
INSERT INTO specific_meal_preparation_steps (preparation_step_number, specific_meal_name, generic_meal_name, preparation_step_description) VALUES
    (1, 'Specific Meal 1', 'Meal A', 'Step 1: Boil water'),
    (2, 'Specific Meal 1', 'Meal A', 'Step 2: Add ingredients'),
    (1, 'Specific Meal 2', 'Meal B', 'Step 1: Chop vegetables'),
    (2, 'Specific Meal 2', 'Meal B', 'Step 2: Cook vegetables'),
    (1, 'Specific Meal 4', 'Meal C', 'Step 1: Preheat oven'),
    (2, 'Specific Meal 4', 'Meal C', 'Step 2: Bake for 30 minutes');

# Dummy data for the 'specific_meal_cooking_steps' table
INSERT INTO specific_meal_cooking_steps (cooking_step_number, specific_meal_name, generic_meal_name, cooking_step_description) VALUES
    (1, 'Specific Meal 1', 'Meal A', 'Step 1: Heat oil in a pan'),
    (2, 'Specific Meal 1', 'Meal A', 'Step 2: Cook ingredients in the pan'),
    (1, 'Specific Meal 2', 'Meal B', 'Step 1: Heat oil in a wok'),
    (2, 'Specific Meal 2', 'Meal B', 'Step 2: Stir-fry vegetables in the wok'),
    (1, 'Specific Meal 4', 'Meal C', 'Step 1: Season meat with salt and pepper'),
    (2, 'Specific Meal 4', 'Meal C', 'Step 2: Grill meat for 10 minutes');

# Dummy data for the 'specific_meal_finishing_steps' table
INSERT INTO specific_meal_finishing_steps (finishing_step_number, specific_meal_name, generic_meal_name, finishing_step_description) VALUES
    (1, 'Specific Meal 1', 'Meal A', 'Step 1: Plate the cooked ingredients'),
    (2, 'Specific Meal 1', 'Meal A', 'Step 2: Garnish with herbs'),
    (1, 'Specific Meal 2', 'Meal B', 'Step 1: Transfer cooked vegetables to a plate'),
    (2, 'Specific Meal 2', 'Meal B', 'Step 2: Serve hot'),
    (1, 'Specific Meal 4', 'Meal C', 'Step 1: Remove meat from the oven'),
    (2, 'Specific Meal 4', 'Meal C', 'Step 2: Let it rest for 5 minutes');

# Dummy data for the 'ingredients' table
INSERT INTO ingredients (ingredient_name) VALUES
    ('Ingredient 1'),
    ('Ingredient 2'),
    ('Ingredient 3'),
    ('Ingredient 4'),
    ('Ingredient 5'),
    ('Ingredient 6');

# Dummy data for the 'ingredient_substitutes' table
INSERT INTO ingredient_substitutes (ingredient_name_1, ingredient_name_2) VALUES
    ('Ingredient 1', 'Ingredient 4'),
    ('Ingredient 2', 'Ingredient 5'),
    ('Ingredient 3', 'Ingredient 6');

# Dummy data for the 'products' table
INSERT INTO products (product_id, store_name, product_name, price, rating, brand_name, ingredient_name, size,	size_unit,	size_unit_per_serving,	organic,	indivisible_bool	)
VALUES
    -- For Ingredient Name 1
    (1, 'Store A', 'Product 1', 10.99, 4.5, 'Brand A', 'Ingredient 1', 100, 'g', 100, 1, 0),
    (2, 'Store B', 'Product 2', 9.99, 4.2, 'Brand B', 'Ingredient 1', 200, 'g', 100, 0, 0),
    (3, 'Store C', 'Product 3', 8.99, 4.0, 'Brand C', 'Ingredient 1', 150, 'g', 100, 0, 1),
    (4, 'Store A', 'Product 4', 7.99, 4.7, 'Brand A', 'Ingredient 1', 120, 'g', 100, 1, 1),
    (5, 'Store B', 'Product 5', 6.99, 3.8, 'Brand B', 'Ingredient 1', 180, 'g', 100, 0, 0),

    -- Repeat the above pattern for the remaining products and ingredient names
    -- For Ingredient Name 2
    (6, 'Store A', 'Product 6', 10.99, 4.5, 'Brand A', 'Ingredient 2', 100, 'g', 100, 1, 0),
    (7, 'Store B', 'Product 7', 9.99, 4.2, 'Brand B', 'Ingredient 2', 200, 'g', 100, 0, 0),
    (8, 'Store C', 'Product 8', 8.99, 4.0, 'Brand C', 'Ingredient 2', 150, 'g', 100, 0, 1),
    (9, 'Store A', 'Product 9', 7.99, 4.7, 'Brand A', 'Ingredient 2', 120, 'g', 100, 1, 1),
    (10, 'Store B', 'Product 10', 6.99, 3.8, 'Brand B', 'Ingredient 2', 180, 'g', 100, 0, 0),

    -- Repeat the above pattern for the remaining products and ingredient names
    -- For Ingredient Name 3
    (11, 'Store A', 'Product 11', 10.99, 4.5, 'Brand A', 'Ingredient 3', 100, 'g', 100, 1, 0),
    (12, 'Store B', 'Product 12', 9.99, 4.2, 'Brand B', 'Ingredient 3', 200, 'g', 100, 0, 0),
    (13, 'Store C', 'Product 13', 8.99, 4.0, 'Brand C', 'Ingredient 3', 150, 'g', 100, 0, 1),
    (14, 'Store A', 'Product 14', 7.99, 4.7, 'Brand A', 'Ingredient 3', 120, 'g', 100, 1, 1),
    (15, 'Store B', 'Product 15', 6.99, 3.8, 'Brand B', 'Ingredient 3', 180, 'g', 100, 0, 0),

    -- Repeat the above pattern for the remaining products and ingredient names
    -- For Ingredient Name 4
    (16, 'Store A', 'Product 16', 10.99, 4.5, 'Brand A', 'Ingredient 4', 100, 'g', 100, 1, 0),
    (17, 'Store B', 'Product 17', 9.99, 4.2, 'Brand B', 'Ingredient 4', 200, 'g', 100, 0, 0),
    (18, 'Store C', 'Product 18', 8.99, 4.0, 'Brand C', 'Ingredient 4', 150, 'g', 100, 0, 1),
    (19, 'Store A', 'Product 19', 7.99, 4.7, 'Brand A', 'Ingredient 4', 120, 'g', 100, 1, 1),
    (20, 'Store B', 'Product 20', 6.99, 3.8, 'Brand B', 'Ingredient 4', 180, 'g', 100, 0, 0),

    -- Repeat the above pattern for the remaining products and ingredient names
    -- For Ingredient Name 5
    (21, 'Store A', 'Product 21', 10.99, 4.5, 'Brand A', 'Ingredient 5', 100, 'g', 100, 1, 0),
    (22, 'Store B', 'Product 22', 9.99, 4.2, 'Brand B', 'Ingredient 5', 200, 'g', 100, 0, 0),
    (23, 'Store C', 'Product 23', 8.99, 4.0, 'Brand C', 'Ingredient 5', 150, 'g', 100, 0, 1),
    (24, 'Store A', 'Product 24', 7.99, 4.7, 'Brand A', 'Ingredient 5', 120, 'g', 100, 1, 1),
    (25, 'Store B', 'Product 25', 6.99, 3.8, 'Brand B', 'Ingredient 5', 180, 'g', 100, 0, 0);

# Dummy data for the 'product_nutrition_facts' table
INSERT INTO product_nutrition_facts (product_id, calories_per_serving, total_fat_per_serving, saturated_fat_per_serving, trans_fat_per_serving, cholesterol_per_serving, sodium_per_serving, total_carbs_per_serving, fiber_per_serving, total_sugar_per_serving, added_sugar_per_serving, protein_per_serving, vitamin_d_per_serving, calcium_per_serving, iron_per_serving, potassium_per_serving)
VALUES
    (1, 100.0, 5.0, 2.5, 0.0, 10.0, 200.0, 20.0, 3.0, 5.0, 2.0, 10.0, 1.0, 100.0, 2.0, 150.0),
    (2, 120.0, 6.0, 3.0, 0.0, 15.0, 250.0, 22.0, 4.0, 6.0, 2.5, 12.0, 1.5, 120.0, 2.5, 160.0),
    (3, 90.0, 4.5, 2.0, 0.0, 8.0, 180.0, 18.0, 2.5, 4.5, 1.5, 9.0, 1.2, 90.0, 1.8, 130.0),
    (4, 110.0, 5.5, 2.8, 0.0, 12.0, 220.0, 21.0, 3.5, 6.5, 2.8, 11.0, 1.3, 110.0, 2.2, 140.0),
    (5, 95.0, 4.0, 1.5, 0.0, 6.0, 190.0, 17.0, 2.0, 4.0, 1.0, 8.0, 1.0, 95.0, 1.5, 120.0),
    (6, 100.0, 5.0, 2.5, 0.0, 10.0, 200.0, 20.0, 3.0, 5.0, 2.0, 10.0, 1.0, 100.0, 2.0, 150.0),
    (7, 120.0, 6.0, 3.0, 0.0, 15.0, 250.0, 22.0, 4.0, 6.0, 2.5, 12.0, 1.5, 120.0, 2.5, 160.0),
    (8, 90.0, 4.5, 2.0, 0.0, 8.0, 180.0, 18.0, 2.5, 4.5, 1.5, 9.0, 1.2, 90.0, 1.8, 130.0),
    (9, 110.0, 5.5, 2.8, 0.0, 12.0, 220.0, 21.0, 3.5, 6.5, 2.8, 11.0, 1.3, 110.0, 2.2, 140.0),
    (10, 95.0, 4.0, 1.5, 0.0, 6.0, 190.0, 17.0, 2.0, 4.0, 1.0, 8.0, 1.0, 95.0, 1.5, 120.0),
    (11, 100.0, 5.0, 2.5, 0.0, 10.0, 200.0, 20.0, 3.0, 5.0, 2.0, 10.0, 1.0, 100.0, 2.0, 150.0),
    (12, 120.0, 6.0, 3.0, 0.0, 15.0, 250.0, 22.0, 4.0, 6.0, 2.5, 12.0, 1.5, 120.0, 2.5, 160.0),
    (13, 90.0, 4.5, 2.0, 0.0, 8.0, 180.0, 18.0, 2.5, 4.5, 1.5, 9.0, 1.2, 90.0, 1.8, 130.0),
    (14, 110.0, 5.5, 2.8, 0.0, 12.0, 220.0, 21.0, 3.5, 6.5, 2.8, 11.0, 1.3, 110.0, 2.2, 140.0),
    (15, 95.0, 4.0, 1.5, 0.0, 6.0, 190.0, 17.0, 2.0, 4.0, 1.0, 8.0, 1.0, 95.0, 1.5, 120.0),
    (16, 100.0, 5.0, 2.5, 0.0, 10.0, 200.0, 20.0, 3.0, 5.0, 2.0, 10.0, 1.0, 100.0, 2.0, 150.0),
    (17, 120.0, 6.0, 3.0, 0.0, 15.0, 250.0, 22.0, 4.0, 6.0, 2.5, 12.0, 1.5, 120.0, 2.5, 160.0),
    (18, 90.0, 4.5, 2.0, 0.0, 8.0, 180.0, 18.0, 2.5, 4.5, 1.5, 9.0, 1.2, 90.0, 1.8, 130.0),
    (19, 110.0, 5.5, 2.8, 0.0, 12.0, 220.0, 21.0, 3.5, 6.5, 2.8, 11.0, 1.3, 110.0, 2.2, 140.0),
    (20, 95.0, 4.0, 1.5, 0.0, 6.0, 190.0, 17.0, 2.0, 4.0, 1.0, 8.0, 1.0, 95.0, 1.5, 120.0),
    (21, 100.0, 5.0, 2.5, 0.0, 10.0, 200.0, 20.0, 3.0, 5.0, 2.0, 10.0, 1.0, 100.0, 2.0, 150.0),
    (22, 120.0, 6.0, 3.0, 0.0, 15.0, 250.0, 22.0, 4.0, 6.0, 2.5, 12.0, 1.5, 120.0, 2.5, 160.0),
    (23, 90.0, 4.5, 2.0, 0.0, 8.0, 180.0, 18.0, 2.5, 4.5, 1.5, 9.0, 1.2, 90.0, 1.8, 130.0),
    (24, 110.0, 5.5, 2.8, 0.0, 12.0, 220.0, 21.0, 3.5, 6.5, 2.8, 11.0, 1.3, 110.0, 2.2, 140.0),
    (25, 95.0, 4.0, 1.5, 0.0, 6.0, 190.0, 17.0, 2.0, 4.0, 1.0, 8.0, 1.0, 95.0, 1.5, 120.0);


# Dummy data for the 'product_allergen_info' table
-- Inserting data into product_allergen_info table
INSERT INTO product_allergen_info (product_id, contains_milk_bool, contains_tree_nuts_bool, contains_peanuts_bool, contains_eggs_bool, contains_fish_bool, contains_shellfish_bool, contains_wheat_bool, contains_soy_bool, contains_sesame_bool)
VALUES
    (1, 1, 0, 0, 1, 0, 0, 1, 0, 0),
    (2, 0, 1, 0, 1, 0, 0, 0, 1, 0),
    (3, 1, 0, 0, 0, 1, 0, 1, 1, 0),
    (4, 0, 0, 1, 1, 0, 1, 0, 0, 1),
    (5, 1, 1, 0, 0, 1, 0, 1, 0, 1),
    (6, 1, 0, 0, 1, 0, 0, 1, 0, 0),
    (7, 0, 1, 0, 1, 0, 0, 0, 1, 0),
    (8, 1, 0, 0, 0, 1, 0, 1, 1, 0),
    (9, 0, 0, 1, 1, 0, 1, 0, 0, 1),
    (10, 1, 1, 0, 0, 1, 0, 1, 0, 1),
    (11, 1, 0, 0, 1, 0, 0, 1, 0, 0),
    (12, 0, 1, 0, 1, 0, 0, 0, 1, 0),
    (13, 1, 0, 0, 0, 1, 0, 1, 1, 0),
    (14, 0, 0, 1, 1, 0, 1, 0, 0, 1),
    (15, 1, 1, 0, 0, 1, 0, 1, 0, 1),
    (16, 1, 0, 0, 1, 0, 0, 1, 0, 0),
    (17, 0, 1, 0, 1, 0, 0, 0, 1, 0),
    (18, 1, 0, 0, 0, 1, 0, 1, 1, 0),
    (19, 0, 0, 1, 1, 0, 1, 0, 0, 1),
    (20, 1, 1, 0, 0, 1, 0, 1, 0, 1),
    (21, 1, 0, 0, 1, 0, 0, 1, 0, 0),
    (22, 0, 1, 0, 1, 0, 0, 0, 1, 0),
    (23, 1, 0, 0, 0, 1, 0, 1, 1, 0),
    (24, 0, 0, 1, 1, 0, 1, 0, 0, 1),
    (25, 1, 1, 0, 0, 1, 0, 1, 0, 1);