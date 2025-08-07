<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTech | Enrollment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/logo_fav.png">
    <style>
        .background {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(./images/bg.png);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>

<body class="background">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 bg-white p-5 round shadow">
                <h1 class="h-1 text-center">
                    Enroll Yourself
                </h1>
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="guardianname" id="guardianname" class="form-control"
                            placeholder="Enter Your Guardian's Name" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="surname" id="surname" class="form-control"
                            placeholder="Enter Your Surname" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="gender" id="gender" class="form-control"
                            placeholder="Enter Your Gender" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="date" name="dob" id="dob" class="form-control"
                            placeholder="Enter Your Date of Birth" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="admclass" id="admclass" class="form-control"
                            placeholder="Enter Your Class of Admission" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="tel" name="contact" id="contact" class="form-control"
                            placeholder="Enter Your Contact Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="b-form" id="b-form" class="form-control"
                            placeholder="Enter Your Form-B Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="cnic" id="cnic" class="form-control"
                            placeholder="Enter Your Guardian's CNIC Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-2">
                        <input type="file" name="img" id="img" class="form-control" aria-describedby="helpId">
                    </div>
                    <input type="submit" value="Enroll" class="btn btn-outline-info w-100" name="btn">
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_POST["btn"])) {
    $stdname = $_POST["name"];
    $guardian = $_POST["guardianname"];
    $surname = $_POST["surname"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $class = $_POST["admclass"];
    $contact = $_POST["contact"];
    $formb = $_POST["b-form"];
    $cnic = $_POST["cnic"];
    $img = $_FILES["img"]["name"];
    $tmpimg = $_FILES["img"]["tmp_name"];
    $destination = "images/" . $img;
    $extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
        if (move_uploaded_file($tmpimg, $destination)) {
            mysqli_query($connection, "INSERT INTO `enrollments`(`name`, `guardian_name`, `surname`, `gender`, `dob`, `enrolled_class`, `contact_number`, `form_b_number`, `guardian_cnic`, `student_image`) VALUES ('$stdname','$guardian','$surname','$gender','$dob','$class','$contact','$formb','$cnic','$img')");
            echo "<script>alert('Form Submitted!');
            location.assign('index.html');
            </script>";
        }
    } else {
        echo "<script>alert('Enrollment Unsuccessfull!')</script>";
    }
}
?>