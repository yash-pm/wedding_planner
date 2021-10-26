<?php
    include_once './connection.php';
    
    session_start();
    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
    }
    //print_r($user_id);
    
    if(isset($_POST['comment']))
    {
        $comment = $_POST['comment'];
    }
    //print_r($comment);
    $feedback_query = "INSERT INTO `tbl_feedback`(`feedback_id`, `customer_id`, `comment`) VALUES ('','$user_id','$comment')";
    $feedback_result = mysqli_query($conn, $feedback_query);
    
    if($feedback_result)
    {
        echo "<script>alert('Thank You For Your Review')</script>";
        echo "<script>window.location.href='testimonials.php'</script>";
    }
    else
    {
        echo "<script>alert('Sorry Review Is Not Stored')</script>";
        echo "<script>window.location.href='testimonials.php'</script>";
    }
?>
