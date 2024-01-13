<?php

    require('config/db_connect.php');

    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        if(mysqli_query($conn, "DELETE FROM ramen WHERE id = $id_to_delete")) {
            header('Location: index.php');
        } else {
            echo 'Qeury error: '.mysqli_error($conn);
        }
    }

    // get request from id parameter
    if(isset($_GET['id'])) {
        
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $res = mysqli_query($conn, "SELECT * FROM ramen WHERE id = $id");
        $ramen_details = mysqli_fetch_assoc($res);

        mysqli_free_result($res);
        mysqli_close($conn);

    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php require('templates/header.php'); ?>

    <section class="center primary-text">
        <img src="src/icons/ramen_icon2.png" alt="ramen icon" width="50">
        <div class="container flow-text">
            <?php if($ramen_details): ?>
                <h4><b><?php echo htmlspecialchars($ramen_details['name']); ?></b></h4>
                <p>Created by: <?php echo htmlspecialchars($ramen_details['email']); ?></p>
                <p><?php echo date($ramen_details['created_at']); ?></p>
                <h5><b>Ingredients</b></h5>
                <p><?php echo htmlspecialchars($ramen_details['ingredients']); ?></p>

                <form action="details.php" method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $ramen_details['id'] ?>">
                    <input type="submit" name="delete" value="Delete" class="btn red lighten-3 z-depth-0 primary-text">
                </form>

            <?php else: include('templates/empty-details.php') ?>
            <?php endif; ?>
        </div>
    </section>


    <?php require('templates/footer.php'); ?>
</html>