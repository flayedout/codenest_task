<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        .complete{
            background-color: lightgreen;
        }
        .incomplete{
            background-color: lightcoral;
        }
        .big-checkbox {width: 20px; height: 20px;}
    </style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TODO </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item active">
                <a class="nav-link" href="/logout">Logout <span class="sr-only">(current)</span></a>
            </li>
            <?php endif; ?>



            <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item active">
                <a class="nav-link" href="/mytasks">My Tasks</a>
            </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/task/create/index">Create a task</a>
                </li>
            <?php endif; ?>

            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/task/delete/index">Delete a task</a>
                </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/mylists">My Lists</a>
                </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/list/create/index">Create a list</a>
                </li>
            <?php endif; ?>

            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/list/delete/index">Pending requests</a>
                </li>
            <?php endif; ?>

        </ul>
            <?php if(!isset($_SESSION['user'])): ?>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="login/register">Register <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php endif; ?>

    </div>
</nav>
