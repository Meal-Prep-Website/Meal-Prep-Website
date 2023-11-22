USE testmpdb;
    
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
INSERT INTO store_locations (store_location, store_id) VALUES
    ('Location A', 1),
    ('Location B', 2),
    ('Location C', 3);

# Dummy data for the 'brands' table
INSERT INTO brands (brand_name, store_id, generic) VALUES
    ('Brand A', 1, 0),
    ('Brand B', 2, 1),
    ('Brand C', 3, 0);


# Dummy data for the 'ingredients' table
INSERT INTO ingredients (ingredient_name) VALUES
    ('Ingredient 1'),
    ('Ingredient 2'),
    ('Ingredient 3'),
    ('Ingredient 4'),
    ('Ingredient 5'),
    ('Ingredient 6');

# Dummy data for the 'ingredient_substitutes' table
INSERT INTO ingredient_substitutes (ingredient_id_1, ingredient_id_2) VALUES
    (1, 4),
    (2, 5),
    (3, 6);

# Dummy data for the 'products' table
INSERT INTO products (product_name, ingredient_id, store_id)
VALUES
('Product 1', 1, 1),
('Product 2', 1, 2), 
('Product 3', 1, 3), 
('Product 4', 1, 1), 
('Product 5', 1, 2), 
('Product 6', 2, 3), 
('Product 7', 2, 1), 
('Product 8', 2, 2), 
('Product 9', 2, 3), 
('Product 10', 2, 1), 
('Product 11', 3, 2), 
('Product 12', 3, 3), 
('Product 13', 3, 1), 
('Product 14', 3, 2), 
('Product 15', 3, 3), 
('Product 16', 4, 1), 
('Product 17', 4, 2), 
('Product 18', 4, 3), 
('Product 19', 4, 1), 
('Product 20', 4, 2), 
('Product 21', 5, 3), 
('Product 22', 5, 1), 
('Product 23', 5, 2), 
('Product 24', 5, 3), 
('Product 25', 5, 1); 

# Dummy data for the 'product_inf' table

INSERT INTO product_info(product_id, brand_name, price, rating, size, size_unit, size_unit_per_serving, organic, indivisible_bool)
VALUES
(1, 'Brand A', 10.99, 4.5, 100, 'g', 100, 1, 0 ),
(2, 'Brand B', 9.99, 4.2, 200, 'g', 100, 0, 0 ),
(3, 'Brand C', 8.99, 4.7, 150, 'g', 100, 1, 1 ),
(4, 'Brand A', 7.99, 4.0, 180, 'g', 100, 1, 0 ),
(5, 'Brand B', 6.99, 3.8, 120, 'g', 100, 1, 0 ),
(6, 'Brand C', 10.99, 4.5, 100, 'g', 100, 1, 0 ),
(7, 'Brand A', 9.99, 4.2, 200, 'g', 100, 1, 0 ),
(8, 'Brand B', 8.99, 4.7, 150, 'g', 100, 1, 0 ),
(9, 'Brand C', 7.99, 4.0, 180, 'g', 100, 1, 0 ),
(10, 'Brand A', 6.99, 3.5, 120, 'g', 100, 1, 0 ),
(11, 'Brand B', 10.99, 4.5, 100, 'g', 100, 1, 0 ),
(12, 'Brand C', 9.99, 4.2, 200, 'g', 100, 1, 0 ),
(13, 'Brand A', 8.99, 4.7, 130, 'g', 100, 1, 0 ),
(14, 'Brand B', 7.99, 4.0, 150, 'g', 100, 1, 0 ),
(15, 'Brand C', 6.99, 3.5, 180, 'g', 100, 1, 0 ),
(16, 'Brand A', 10.99, 2.5, 100, 'g', 100, 1, 0 ),
(17, 'Brand B', 9.99, 4.5, 200, 'g', 100, 1, 0 ),
(18, 'Brand C', 8.99, 4.0, 150, 'g', 100, 1, 0 ),
(19, 'Brand A', 7.99, 3.5, 170, 'g', 100, 1, 0 ),
(20, 'Brand B', 6.99, 4.7, 120, 'g', 100, 1, 0 ),
(21, 'Brand C', 10.99, 4.5, 90, 'g', 100, 1, 0 ),
(22, 'Brand A', 9.99, 4.0, 120, 'g', 100, 1, 0 ),
(23, 'Brand B', 8.99, 3.5, 140, 'g', 100, 1, 0 ),
(24, 'Brand C', 7.99, 4.7, 150, 'g', 100, 1, 0 ),
(25, 'Brand A', 6.99, 4.0, 160, 'g', 100, 1, 0 );


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
INSERT INTO specific_meal_ingredients (ingredient_id, specific_meal_name, generic_meal_name, grams_needed) VALUES
    (1, 'Specific Meal 1', 'Meal A', 100),
    (2, 'Specific Meal 1', 'Meal A', 50),
    (3, 'Specific Meal 2', 'Meal B', 200),
    (4, 'Specific Meal 2', 'Meal B', 150),
    (5, 'Specific Meal 3', 'Meal B', 175),
    (6, 'Specific Meal 4', 'Meal C', 300);

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

