<?php require_once 'connection.php'; ?>

<?php
    if(isset($_SESSION ['email']) && ($_SESSION ['loggedin']==True)) {
        $useremail = $_SESSION ['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<boby>
<div class="muck-up">
  <div class="overlay"></div>
  <div class="top">
    <div class="nav">
      <span class="ion-android-menu"></span>
      <p>Profile</p>
      <span class="ion-ios-more-outline"></span>
    </div>
    <div class="user-profile">
    <?php
        $query = "SELECT * FROM users WHERE EMAIL='$useremail'";
        $result = $conn->query($query);
        if($result->num_rows >0) {
            while($row = $result->fetch_assoc()) {
              $status = $row ['STATUS'];
              $photo = $row ['PHOTO'];
            }
        } else {
          $status = 'unknown';
          $useremail = 'unknown';
          $photo = "https://images.pexels.com/photos/5496586/pexels-photo-5496586.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=200";
        }
      ?>
      <img onclick="uploadphoto()" src="<?php echo $photo; ?>">
      <section id="uploadphoto">
        <div id="targetid" style="height:70px;width:400px;background:green;position:fixed;z-index:3;padding:20px;display:none;">
          <form action="" method="POST" enctype="multipart/form-data"><input type="file" name="profilephoto">
          <button type="submit" name="photosubmit" style="height:40px;width:100px;border-radius:10%;background:green;border:2px solid red;margin-left:-40px;">update</button></form>
        </div>
      </section>
      <div class="user-details">
        <h4><?php echo $useremail; ?></h4>
        <p><?php echo $status; ?></p>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="filter-btn">
    <a id="one" href="#"><i class="ion-ios-checkmark-outline"></i></a>
    <a id="two" href="#"><i class="ion-ios-alarm-outline"></i></a>
    <a id="three" href="#"><i class="ion-ios-heart-outline"></i></a>
    <a id="all" href="#"><i class="ion-ios-star-outline"></i></a>
    <span class="toggle-btn ion-android-funnel"></span>
  </div>
  <div class="clearfix"></div>
  <div class="bottom">
    <div class="title">
      <h2>My Tasks</h2>
      <small style="font-size:20px;"><?php echo date('m-d-yy'); ?></small>
    </div>
    <ul class="tasks">
    <?php
        $query = "SELECT * FROM messages WHERE EMAIL='$useremail'";
        $result = $conn->query($query);
        if($result->num_rows >0) {
            while($row = $result->fetch_assoc()) {
              $sender = $row ['SENDER'];
              $description = $row ['DESCRIPTION'];
              $date = $row ['DATE'];
            }
        } else {
          $sender = 'unknown';
          $description = 'unknown';
          $date = '00-00-0000';
        }
    ?>
      <li class="one red">
        <span class="task-title"><?php echo $sender; ?></span>
        <span class="task-time"><?php echo $date; ?></span>
        <span class="task-cat"><?php echo $description; ?></span>
      </li>
    </ul>
  </div>
</div>
<script>
  function uploadphoto() {
      document.getElementById('targetid').style.display = 'block';
  }
</script>
</body>
</html>

<?php
  if(isset($_POST ['photosubmit'])) {
    $file = $_FILES ['profilephoto'];
    $filename= $file ['name'];
    $filepath= $file ['tmp_name'];
    $fileerror= $file ['error'];
    if($fileerror==0){
        $destfile = 'images/'.$filename;
        move_uploaded_file($filepath,$destfile);

        $query = "UPDATE users SET PHOTO='$destfile' WHERE EMAIL='$useremail'";
        $conn->query($query);
    } else {
      echo '<script>alert("file error!");</script>';
    }
  } else {

  }
?>

<?php } else {
    header('location:login.php');
} ?>