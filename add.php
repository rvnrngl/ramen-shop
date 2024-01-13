<?php
    require('config/db_connect.php');

     $errors = array('email' => '', 'name' => '', 'ingredients' => '');
     $values = array('email' => '', 'name' => '', 'ingredients' => '');

    if(isset($_POST['submit'])) {

        include('validation/validate.php'); // perfom validations

        if(!array_filter($errors)) { // if there is no error save data in database and redirect to index
            $name = mysqli_real_escape_string($conn, $values['name']);
            $email = mysqli_real_escape_string($conn, $values['email']);
            $ingredients = mysqli_real_escape_string($conn, $values['ingredients']);
            
            // save to database
            $insert_sql = "INSERT INTO ramen(name, email, ingredients) VALUES('$name','$email','$ingredients')";
            if(mysqli_query($conn, $insert_sql)) {
                header('Location: index.php');
            } else {
                echo 'Query error: '.mysqli_error($conn);
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php require('templates/header.php'); ?>

    <section class="container primary-text">
        <h4 class="center"> Add Your Ramen Recipe</h4>
        <form class="orange lighten-5 z-depth-1" action="add.php" method="POST">

            <div class="input-field">
                <input 
                    class="validate" 
                    id="email" 
                    type="text" 
                    name="email" 
                    placeholder="Enter your email" 
                    value="<?php echo htmlspecialchars($values['email']); ?>">
                <label class="active" for="email">Email</label>
                <div class="red-text"><?php echo $errors['email']; ?></div>
            </div> 

            <div class="input-field">
                <input 
                    class="validate" 
                    id="name" 
                    type="text" 
                    name="name" 
                    placeholder="Enter a ramen recipe name" 
                    value="<?php echo htmlspecialchars($values['name']); ?>">
                <label class="active" for="name">Ramen Name</label>
                <div class="red-text"><?php echo $errors['name']; ?></div>
            </div>

            <div class="input-field">
                <textarea 
                    class="validate" 
                    id="ingredients" 
                    type="text" 
                    name="ingredients" 
                    placeholder="Enter ramen ingredients here..." ><?php if(!empty($values['ingredients'])) echo htmlspecialchars($values['ingredients']); ?></textarea>
                <label class="active" for="ingredients">Ingredients (comma seperated)</label>
                <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            </div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn orange lighten-2 z-depth-0 primary-text">
            </div>
        </form>
    </section>

    <?php require('templates/footer.php'); ?>
</html>