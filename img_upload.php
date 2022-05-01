<?php

$connect = mysqli_connect("localhost","root","","multiple_img");

if(isset($_POST['add'])){
    $f_img = $_FILES['f_img']['name'];
    $f_img_path = $_FILES['f_img']['tmp_name'];

    $s_img = $_FILES['s_img']['name'];
    $s_img_path = $_FILES['s_img']['tmp_name'];

    $t_img = $_FILES['t_img']['name'];
    $t_img_path = $_FILES['t_img']['tmp_name'];

    $insert ="INSERT INTO  image_multiple (First_image,Second_image,Third_image)
    VALUES('$f_img','$s_img','$t_img')";

    $query=mysqli_query($connect,$insert);

    if($query){
        move_uploaded_file($f_img_path,$f_img);
        move_uploaded_file($s_img_path,$s_img);
        move_uploaded_file($t_img_path,$t_img);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>img_upload</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <h5>First Image</h5>
            <input type="file" name="f_img">
        </div>
        <div>
            <h5>Second Image</h5>
            <input type="file" name="s_img">
        </div>
        <div>
            <h5>Third Image</h5>
            <input type="file" name="t_img">
        </div>
        <br>
        <button name="add">Add</button>
    </form>
    <br>
    <?php
    $sql ="SELECT * FROM image_multiple";
    $query2 = mysqli_query($connect,$sql);
    $i=0;
    while($row = mysqli_fetch_array($query2)){ ?>


    <img src="<?php echo $row['First_image']; ?>" style="width: 300px;height:300px" alt="">


    <img src="<?php echo $row['Second_image']; ?>" style="width: 300px;height:300px" alt="">


    <img src="<?php echo $row['Third_image']; ?>" style="width: 300px;height:300px" alt="">


    <?php $i++;}

    ?>

</body>

</html>