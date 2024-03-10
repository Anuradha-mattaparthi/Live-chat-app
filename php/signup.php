<?php 

include_once "config.php";
session_start();

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']); 
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - This email already exists!";
        }else{
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions)){
                    $new_image_name = time() . '_' . $img_name;
                    $upload_path = "images/" . $new_image_name;
                    if(move_uploaded_file($tmp_name, $upload_path)){
                        $rand_id = rand(time(), 100000000);
                        $status = "Online";
                        $encrpt_pass = md5($password);
                        $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                                              VALUES ('{$rand_id}', '{$fname}', '{$lname}', '{$email}', '{$encrpt_pass}', '{$new_image_name}', '{$status}')");
                        if($insert_query){
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                $_SESSION['unique_id'] = $result["unique_id"];
                                echo "success";
                            }else{
                                echo "This email address does not exist!";
                            }
                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }else{
                        echo "Failed to upload image!";
                    }
                }else{
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }
        }
    }else{
        echo "$email is not a valid email";
    }
}else{
    echo "All inputs are required";
}

?>
