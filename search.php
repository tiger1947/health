<?php include_once('includes/application_top.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
$(function() {
    $("#skill_input").autocomplete({
        source: "demo.php",
    });
});
</script>

<style type="text/css">

input{height:25px; font-size:16px;}
</style>
</head>

<body>
<div class="container">
<p>Your Skills: <input type="text" id="skill_input" />
                <input type="submit" value="Search" /></p>
</div>
</body>
</html>