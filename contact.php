<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTech | Contact Us</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <link rel="icon" type="image/x-icon" href="images/logo_fav.png">
</head>

<body>
    <div class="container-fluid">
        <div class="navbar background h-nav-resp">
            <div class="logo" onclick="logo_load()">
                <img src="images/logo_fav.png" alt="logo">
            </div>
            <ul class="nav-list visible-resp">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="courses.html">Courses</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="rightnav visible-resp">
                <div class="searchbar">
                    <input type="text" name="search" id="search">
                    <button class="btn btn-small">Search</button>
                </div>
            </div>
            <div class="burger">
                <div class="burger_line"></div>
                <div class="burger_line"></div>
                <div class="burger_line"></div>
            </div>
        </div>

        <section class="contact" id="contact">
            <form method="post">
                <h2 class="heading">📞 Contact Us</h2>
                <br>
                <input type="text" name="name" id="name" placeholder="Enter Your Name......" class="form-tag">
                <br><br>
                <input type="tel" name="Phone" id="Phone" placeholder="Enter Your Phone Number......" class="form-tag">
                <br><br>
                <input type="email" name="email" id="email" placeholder="Enter Your E-Mail......" class="form-tag">
                <br><br>
                <textarea name="concern" id="concern" cols="30" rows="2" placeholder="Enter Your Concern......." class="form-tag"></textarea>
                <br><br>
                <button class="btn form-button" name="btn">Submit</button>
            </form> 
        </section>
    </div>
</body>
<script src="./JS/responsive.js"></script>

</html>

<?php
if (isset($_POST['btn'])) {
    $stdname = $_POST['name'];
    $stdcontact = $_POST['Phone'];
    $stdemail = $_POST['email'];
    $stdconcern = $_POST['concern'];
    $submit = mysqli_query($connection, "INSERT INTO `concerns`(`std_name`, `std_contact`, `std_email`, `std_concern`) VALUES ('$stdname','$stdcontact','$stdemail','$stdconcern')");
    if ($submit) {
        echo"<script>
        alert('Information Submitted!');
        location.assign('index.html');
        </script>";
    }
}
?>