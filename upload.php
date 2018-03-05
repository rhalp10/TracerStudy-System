<?php
include('session.php'); 

if ($login_level == 1)
{
    $user_type  = "student";
}
if ($login_level == 2)
{
    $user_type  = "teacher";
}
if ($login_level == 3)
{
    $user_type  = "admin";
   
}
$result = mysqli_query($con,"SELECT * FROM `user_".$user_type."_detail` WHERE ".$user_type."_userID = $login_id");
$data = mysqli_fetch_array($result);
$data_img = $data[$user_type.'_img']; 
$data_id = $data[$user_type.'_userID'];

$target_dir = "assets/img/profile_img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (isset($_POST['submit']))
{
   
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                                window.location='profile.php';
                            </script>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            echo "<script>alert('Sorry, your file was not uploaded.');
                                window.location='profile.php';
                            </script>";
        // if everything is ok, try to upload file
        } 
        else 
        {


            if ($data_img == 'temp.gif') {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $imgName = $_FILES["fileToUpload"]["name"];
                    $query = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_img` = '$imgName' WHERE `".$user_type."_userID` =".$data_id." ";
                    mysqli_query($con,$query);
                    echo "<script>alert('Successfully Update');
                                    window.location='profile.php';
                                </script>";
                } 
                else 
                {
                    echo "<script>alert('Sorry, there was an error uploading your file.');
                                    window.location='profile.php';
                                </script>";
                }

            }
            else
            {
        

                unlink('assets/img/profile_img/'.$data_img);
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $imgName = $_FILES["fileToUpload"]["name"];
                    $query = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_img` = '$imgName' WHERE `".$user_type."_userID` =".$data_id." ";
                    mysqli_query($con,$query);
                    echo "<script>alert('Successfully Update');
                                    window.location='profile.php';
                                </script>";
                } 
                else 
                {
                    echo "<script>alert('Sorry, there was an error uploading your file.');
                                    window.location='profile.php';
                                </script>";
                }
            }
        }
        

}    
    



?>