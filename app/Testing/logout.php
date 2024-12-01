<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #ff4c4c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e04343;
        }
    </style>
</head>
<body>
    <form action="index.php?controller=auth&action=logout" method="POST">
        <button type="submit">Logout</button>
    </form>
    


</body>
</html>
