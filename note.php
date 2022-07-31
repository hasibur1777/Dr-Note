<?php

require "db_conn.php";

if(isset($_POST['btn_save'])){
    $name=$_POST['name'];
	$age=$_POST['age'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $note=$_POST['note'];
    $time = date("h:i:sa Y/m/d");

    $my_query = "INSERT INTO note (name, age, gender, phone, note, created_at) 
    VALUES ('$name', '$age','$gender', '$phone', '$note', '$time')";

    //$result = mysqli_query($conn, $my_query) or die("Query Faild");
        
    if (mysqli_query($conn, $my_query)) {
        header("Location: home.php");
    }else{
        header("Location: note.php");
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


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="note.php">Note</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <button class="btn btn-outline-danger btn-sm" type="submit" name="btn_logout">Logout</button>
                </form>

            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h1 class="text-center">Note</h1>
        <hr>

        <div class="row">

            <div class="col-2">
            </div>

            <div class="col-8">
                <div class="card p-3">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" id="age" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option selected>select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" name="note" aria-label="With textarea"></textarea>
                        </div>
                        <input type="submit" name="btn_save" class="btn btn-outline-primary" value="Save" />
                    </form>
                </div>
            </div>

            <div class="col-2">
            </div>

        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

</body>

</html>