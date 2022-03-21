<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/users.css">
    <title><?= !empty(trim($title)) ? $title:'document';?></title>
</head>
<body>
    <header>
       <h1><?= $_SESSION['user_pseudo'];?></h1>
       <a href="/Keysaver/">disconnect</a>
    </header>

    <div class="container">
        <?= !empty(trim($content)) ? $content:'<h1>Nothing to show</h1>';?>
    </div>
    
    <footer style="display: flex;justify-content:center;align-items:center;padding:15px;background:white;">
        <span>&copy;copyright - Nan_projetPerso - 2022</span>
    </footer>
</body>
</html>