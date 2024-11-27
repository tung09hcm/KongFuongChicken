<!-- DONE -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'navBar.php';
    ?>

    <div class="big-container">
        <h1>Menu</h1>

        <!-- /*menu*/ -->
        <div class="contain2" style="margin-top: 0px;">
            <div class="link">
                <a id="add-dish" href="dish.php?id=0">Thêm món</a>
            </div>
            <div id="card-items"></div>
        </div>

        <script src="script/menu.js"></script>


        <?php 
            include '../partials/footer.php';
        ?>
    </div>

    
</body>
</html>