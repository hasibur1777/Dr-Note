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
        <div class="">
            <div class="card p-3">
                <?php
                if ($_GET['nid']) {
                    $nid = $_GET['nid'];
                        require "db_conn.php";
                        $my_query = "SELECT * FROM note WHERE id='$nid'";

                        $result = mysqli_query($conn, $my_query) or die("Query Faild");
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <p><b>Name: </b> <?php echo $row['name'];?></p>
                <p><b>Age: </b> <?php echo $row['age'];?></p>
                <p><b>Gender: </b> <?php echo $row['gender'];?></p>
                <p><b>Phone: </b> <?php echo $row['phone'];?></p>
                <p><b>Note: </b> <?php echo $row['name'];?></p>
                <br>
                <p><b>Date: </b> <?php echo $row['created_at'];?></p>

                <?php
                            }
                        }
                }else{
                    header("Location: home.php");
                }
                ?>
            </div>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

</body>

</html>