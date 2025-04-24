<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Redirects to login if not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mexican Recipes - Jabari's Kitchen</title>
    <style>
        body {
            background-color: #ffe5b4; /* Warm kitchen vibes */
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            padding: 0;
            margin: 0;
        }
        .main-header {
            background-color: #ff6f61;
            color: white;
            padding: 20px 0;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }
        h1 {
            font-size: 36px;
        }
        h2 {
            color: #ff6f61;
        }
        article {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            max-width: 800px;
        }
        ul {
            list-style-type: square;
            margin-left: 20px;
        }
        .footer {
            margin-top: 30px;
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header class="main-header">
        <h1>Mexican Recipes</h1>
        <nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="recipes.php">Recipes</a></li>
        <li><a href="contact.html">Contact</a></li> <!-- Ensure this matches the file's location -->
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

    </header>

    <main>
        <section id="recipes-list">
            <h2>Explore Authentic Mexican Dishes</h2>

            <!-- Recipe 1: Tacos Al Pastor -->
            <article>
                <h3>Tacos Al Pastor</h3>
                <p><em>A traditional taco made with marinated pork, pineapple, and flavorful Mexican spices.</em></p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>500g pork shoulder (thinly sliced)</li>
                    <li>1 cup pineapple chunks</li>
                    <li>2 tbsp achiote paste</li>
                    <li>1 tbsp vinegar</li>
                    <li>1 tbsp chili powder</li>
                    <li>Soft corn tortillas</li>
                    <li>Chopped onion and cilantro</li>
                </ul>
                <p><strong>Preparation Time:</strong> 30 minutes + marination</p>
                <p><strong>Cooking Instructions:</strong> Marinate pork with achiote paste, vinegar, chili powder, and spices for 2 hours. Grill with pineapple chunks and serve on tortillas topped with onion and cilantro.</p>
            </article>

            <!-- Recipe 2: Chiles Rellenos -->
            <article>
                <h3>Chiles Rellenos</h3>
                <p><em>Poblano peppers stuffed with cheese or meat, dipped in batter, and fried to perfection.</em></p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>4 large poblano peppers</li>
                    <li>1 cup shredded cheese (or cooked ground meat)</li>
                    <li>3 eggs (separated)</li>
                    <li>1/4 cup all-purpose flour</li>
                    <li>Vegetable oil (for frying)</li>
                    <li>1 cup tomato sauce</li>
                </ul>
                <p><strong>Preparation Time:</strong> 45 minutes</p>
                <p><strong>Cooking Instructions:</strong> Roast poblano peppers until charred, peel the skin, and remove seeds. Stuff peppers with cheese or meat. Beat egg whites until fluffy and fold in yolks. Dip peppers in flour, coat with egg mixture, and fry until golden. Serve with tomato sauce.</p>
            </article>

            <!-- Recipe 3: Guacamole -->
            <article>
                <h3>Guacamole</h3>
                <p><em>A creamy avocado dip with a fresh kick of lime, cilantro, and chili.</em></p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>3 ripe avocados</li>
                    <li>1 lime (juiced)</li>
                    <li>1 small tomato (diced)</li>
                    <li>2 tbsp chopped cilantro</li>
                    <li>1 small chili (optional)</li>
                    <li>Salt to taste</li>
                </ul>
                <p><strong>Preparation Time:</strong> 10 minutes</p>
                <p><strong>Cooking Instructions:</strong> Mash avocados and mix with lime juice, tomato, cilantro, and chili. Season with salt and serve as a dip or taco topping.</p>
            </article>

            <!-- Recipe 4: Tamales -->
            <article>
                <h3>Tamales</h3>
                <p><em>Steamed corn husks stuffed with masa dough and savory or sweet fillings.</em></p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>2 cups masa harina</li>
                    <li>1 cup chicken broth</li>
                    <li>1/2 cup lard or vegetable shortening</li>
                    <li>Cooked shredded chicken or pork (for filling)</li>
                    <li>Corn husks (soaked)</li>
                    <li>Salt to taste</li>
                </ul>
                <p><strong>Preparation Time:</strong> 1 hour + steaming</p>
                <p><strong>Cooking Instructions:</strong> Mix masa harina, broth, and lard until smooth. Spread dough onto corn husks, add filling, and fold. Steam for 1-2 hours until cooked. Serve with salsa or sauce.</p>
            </article>

            <!-- Recipe 5: Churros -->
            <article>
                <h3>Churros</h3>
                <p><em>Golden fried pastries dusted with cinnamon sugar, perfect for a sweet treat.</em></p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>1 cup all-purpose flour</li>
                    <li>1 cup water</li>
                    <li>2 tbsp sugar</li>
                    <li>1/2 tsp salt</li>
                    <li>1/4 cup butter</li>
                    <li>Vegetable oil (for frying)</li>
                    <li>Cinnamon sugar for dusting</li>
                </ul>
                <p><strong>Preparation Time:</strong> 30 minutes</p>
                <p><strong>Cooking Instructions:</strong> Heat water, butter, sugar, and salt until boiling. Add flour and mix until a dough forms. Pipe dough into hot oil and fry until golden. Dust with cinnamon sugar before serving.</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Jabari Thompson. All rights reserved.</p>
    </footer>
</body>
</html>
