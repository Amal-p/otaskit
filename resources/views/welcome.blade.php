<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    </head>
    <body class="antialiased">
        <center>

            <h1>Task manager</h1>
            <br>
            <a href="/add-employees" rel="noopener noreferrer">Add Employee</a>
            <br>
            <a href="/employee/list" rel="noopener noreferrer">List all Employee</a>
            <br>
            <a href="/add-task" rel="noopener noreferrer">Add Task</a>
            <br>
            <a href="/task/list" rel="noopener noreferrer">List all Task</a>
            <br>
            <a href="/task/assign" rel="noopener noreferrer">Asigne A Task</a>
            <br>
            <a href="/task/assign/list" rel="noopener noreferrer">Asigned List Task</a>
        </center>
    </body>
</html>
