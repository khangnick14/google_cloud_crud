<?php
//include crud
require('crud_function.php');
session_start();
?>

<html>

<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>1st Question</title>
</head>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://apis.google.com/js/client.js"></script>
<body>
<?php
include('requestHandle.php');
?>
<div class="main">
    <h1 class="text-center">Data Title</h1>
    <div class="table">
        <?php
        include('header.php');
        ?>
    </div>
    <div class="form">
        <?php
        include('form.php');
        ?>
    </div>
</div>
</body>
</html>