<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Apple Manage- <?php echo $title ?>
    </title>
    <link rel="icon" href="./public/img/Apple_logo_black.svg" />

    <base href="/apple/Admin/">
    <!-- Link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Link file css -->
    <link rel="stylesheet" href="./public/css/app.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main -->
        <div class="main" id="main">
            <?php require_once "./App/views/pages/${page}.php" ?>
        </div>
        <div id='toast'></div>
        <!-- /Main -->
    </div>
    <script src="./public/js/app.js"></script>
</body>

</html>
