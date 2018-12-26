<?php require_once('../../private/initialize.php'); ?>
<?php require_once('../../private/includes/user_header.php'); ?>
<?php $page = "home";?>
<body>
<h3>welcome to profile page<h3>



//
// //   $user ;
//   //   $user = new Users($args);
//   //  $obj=new Users.Class($args);
// //  userid =user id                      $user->getusername()
//
  <br>USERNAME :  <?php echo "ah" ?>
  <br>FIRST NAME :  <?php echo"sadasddas"  ?>
  <br>LASTNAME :
  <br>EMAIL :
  <br>CREATED AT :
   // list user's requests
               <section class="services_area p_120">
                 <div class="container">
                   <div class="main_title">
                     <h2>Services</h2>
                     <p>All You Need Is HERE</p>
                   </div>
                   <?php
                   $counter = 0;
                   $services_per_row = 3;
                   $services = Service::find_all();
                   foreach ($services as $service ) {
                     if($counter % $services_per_row == 0) {
                       echo "<div class=\"row services_inner\">";
                     }
                     ?>

                       <div class="col-lg-4">
                         <div class="services_item">
                           <img src="img/icon/<?php echo $service->getIcon(); ?>" alt="">
                           <a><h4> <?php echo $service->getName(); ?> </h4></a>
                           <p><?php echo $service->getDescription(); ?></p>
                         </div>
                     </div>

                   <?php
                    $counter++;
                    if($counter % $services_per_row == 0) {
                      echo "</div>";
                    }
                 }
