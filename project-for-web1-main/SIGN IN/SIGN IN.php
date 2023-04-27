
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./SIGN IN.css">
    <title>SIGN IN</title>
</head>
<body>
    <form action="insert.php" method="POST" >
        <div class="container">
        <div class="card">
            <a class="singup">Sign IN</a>
            <div class="inputBox1">
                <input type="text" name="name" required>
                <span class="user">Email</span>
            </div>

            

            <div class="inputBox">
                <input type="password"   name="pass" required >
                <span>Password</span>
            </div>

            <button type="submit" class="enter" name="submit">Enter</button>

        </div>
        </div>
    </form>

</body>
</html>

