<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$select = "SELECT * FROM user WHERE User_ID = '".$_COOKIE['uID']."'  ";

$statement = $conn->query($select);



if(isset($_POST['updateprof'])){
$folder ="img/";




$Image = ($_FILES['image']['name']);
$path = $folder . $Image ;


$target_file=$folder.basename($_FILES["image"]["name"]);


$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg');
$filename=$_FILES['image']['name'];

$ext=pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$allowed) )
{
echo "Invalid Photo";
}

else{

move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);




 $insert2 = "UPDATE user SET Pic = '".$Image."'  where User_ID = '".$_COOKIE['uID']."'   ";

 $conn->exec($insert2);





}




 }





?>
