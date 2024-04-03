<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            overflow: hidden;
        }
        #wrapper {
            display: flex;
        }
        
        #page-wrapper {
            flex: 1;
        }
        .thumbnail {
            height: 100vh;
            width: 83vw;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div><?php include('navbar.php'); ?></div>
        <div id="page-wrapper">
            <div>
                <img src="../upload/KMTC1.jpg" class="thumbnail" alt="KMTC Thumbnail" style="width: 100%;">
            </div>
        </div>
    </div>
</body>
</html>
