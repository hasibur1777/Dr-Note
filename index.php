<?php

require "db_conn.php";

if(isset($_POST['btn_login'])){
    $username=$_POST['user'];
	$password=$_POST['password'];

      if((!empty($username))and(!empty($password))){
        
        $my_query = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";

        $result = mysqli_query($conn, $my_query) or die("Query Faild");
        if(mysqli_num_rows($result) > 0){
            if (!session_start()) {
                session_start();
            }
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                header("Location: home.php");
            }
        }

	}
}

?>


<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr Note</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <h1 class="text-center">Login</h1>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="card p-3" style="width: 30rem">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="user" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwd" name="password" required>
                    </div>
                    <input type="submit" name="btn_login" class="btn btn-outline-primary" value="Login" />
                </form>
            </div>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

</body>

</html>