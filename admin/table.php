<?php require_once 'connection.php'; ?>

<?php
    if(isset($_SESSION ['email']) && ($_SESSION ['username']=='admin')) {?>
      
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/css.css">
  </head>
  <body>
    <nav class="side_bar">
        <a href="panel.php"><i class="fas fa-desktop" style="font-size:40px;margin-bottom:50px;margin-right:10px;color:white;"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-cogs" style="font-size:40px;margin-bottom:50px;margin-right:10px;color:white;"></i><span>Components</span></a>
        <a href="table.php"><i class="fas fa-table" style="font-size:40px;margin-bottom:50px;margin-right:10px;color:white;"></i><span>Tables</span></a>
        <a href="#"><i class="fas fa-th" style="font-size:40px;margin-bottom:50px;margin-right:10px;color:white;"></i><span>Forms</span></a>
        <!--<a href="#"><i class="fas fa-info-circle"></a>-->
        <a href="#"><i class="fas fa-sliders-h" style="font-size:40px;margin-bottom:50px;margin-right:10px;color:white;"></i><span>Settings</span></a>
    </nav>
    <header class="top_header">
      <h1><i class="fas fa-bars" style="margin-right:10px;"></i>Dashboard</h1>
      <a href="logout.php" ><button class="logout">Log out</button></a>
    </header>
    <section class="section">
      <div class="left_div">
        <a href="panel.php"><i class="fas fa-desktop"></i></a>
        <a href="#"><i class="fas fa-cogs"></i></a>
        <a href="table.php"><i class="fas fa-table"></i></a>
        <a href="#"><i class="fas fa-th"></i></a>
        <!--<a href="#"><i class="fas fa-info-circle"></a>-->
        <a href="#"><i class="fas fa-sliders-h"></i></a>
      </div>
      <div class="right_div">
          <div class="right_body">
            <table>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $query = "SELECT * FROM users";
                    $result = $conn->query($query);
                    if($result->num_rows >0) {
                        while($row = $result->fetch_assoc()) {

                ?>
                    <tr>
                    <td><?php echo $row ['ID'] ;?></td>
                    <td><?php echo $row ['EMAIL'] ;?></td>
                    <td><?php echo $row ['PHOTO'] ;?></td>
                    <td><?php echo $row ['STATUS'] ;?></td>
                    <td><form action="" method="POST" ><button type="hidden" name="delete" value="<?php echo $row ['ID'] ;?>">Delete</button></form></td>
                    </tr>
                <?php } }else {} ?>
                
            </table>
        </div>
          </div>
      </div>
    </section>
  </body>
</html>

<?php } else {
      header('location:index.php');
    }
?>