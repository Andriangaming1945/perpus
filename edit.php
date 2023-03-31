<?php 
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg= Update create sukses");
    }

    else{
        echo "gagal:". mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Php crud aplication</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php 
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        
        ?>

        <div class ="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw;min-width:300px;">
            <div class="row mb-3">

                <div class="col">
                    <label class="form-label">Judul buku:</label>
                    <input type="text" class="form-control"name="first_name"
                    value="<?php echo $row['first_name']?>">    
                </div>

                <div class="col">
                    <label class="form-label">Pengarang buku:</label>
                    <input type="text" class="form-control"name="last_name"
                    value="<?php echo $row['last_name']?>">  
                </div> 
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis buku:</label>
                    <input type="text" class="form-control"name="email"
                    value="<?php echo $row['email']?>"> 
            </div>

            <div class="mb-3">


            <div class="col">
                    <label class="form-label">Harga buku: </label> &nbsp;
                    <input type="text" class="form-control"name="gender"
                    value="<?php echo $row['gender']?>">    
                </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Update aja gak sih😅

                </button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
                
            </div>
        </form>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </scrip>
</body>
</html>