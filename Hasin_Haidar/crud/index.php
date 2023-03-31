<?php 
    require_once "inc/function.php";
    $info = '';
    $task = $_GET['task'] ?? 'report';
    if('seed' == $task){
        seed();
        $info = "Seeding is complete!";
    }

    if(isset($_POST['submit'])){
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $roll = filter_input(INPUT_POST, 'roll', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if($fname != '' && $lname != '' && $roll != ''){
            addStudent($fname, $lname, $roll);
            header('location: /Hasin_Haidar/crud/index.php?task=report');
        }
    }
?>
<!-- ..............................................HTML Section........................................ -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <h2> Project 02 - CRUD </h2>
                    <p>A simple project to perform CRUD operatons using plain files and PHP</p>
                    <?php include_once('inc/templates/nav.php'); ?>
                    <hr/>
                    <?php
                        if($info != ''){
                            echo "<p>{$info}</p>";
                        } 
                    ?>
                </div>
            </div>
            <?php if('report' == $task): ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <?php generateReport(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- ..........................................Add Student Section.................. -->
            <?php if('add' == $task): ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <form action="/Hasin_Haidar/crud/index.php?report" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname">
                        <label for="roll">Roll</label>
                        <input type="number" name="roll" id="roll">
                        <button type="submit" class="button-primary" name="submit">Save</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </body>
</html>