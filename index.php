<?php 
    // query and fetch the result into array and
    // free the result from memory and lastly,
    // close the connection

   require('config/db_connect.php');

    $res =  mysqli_query($conn, 'SELECT name, ingredients, id FROM ramen ORDER BY created_at');
    $ramens = mysqli_fetch_all($res, MYSQLI_ASSOC);

    mysqli_free_result($res);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <?php require('templates/header.php'); ?>

    <?php if(count($ramens) < 1): include('templates/empty.php') ?>
    <?php else: ?>
        <h4 class="center primary-text"><b>Browse Ramens</b></h4>
        <h6 class="center"><?php echo count($ramens).' recipes' ?></h6>
        <div class="container">
            <div class="row">
                <?php foreach($ramens as $ramen): ?>
                    <div class="col s4 md3">
                        <div class="card orange lighten-5">
                            <div class="card-content center">
                                <h6 class="left-align"><b><?php echo htmlspecialchars($ramen['name']); ?></b></h6>
                                <b><p class="left-align">Ingredients</p></b>
                                <div class="left-align truncate"><?php echo htmlspecialchars($ramen['ingredients']); ?></div>
                            </div>
                            <div class="card-action right-align">
                                <a href="details.php?id=<?php echo $ramen['id']; ?>" class="primary-text">more info</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    
    <?php require('templates/footer.php'); ?>
</html>