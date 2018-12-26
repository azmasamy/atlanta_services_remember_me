<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>View Request</h2>
      <?php
      $req = Requests::find_by_id($_GET['id']);
      $user = User::find_by_id($req->getUser_id());
      $service = Service::find_by_id($req->getService_id());
      $doc_array = UserDocuments::find_by_id($user->getId());
      print_r($doc_array);

      ?>
    </div>

    <?php
    echo "<h3> <b> Created At: </b> {$req->getCreated_at()} </h3>";
    echo "<h3> <b> Updated At: </b> {$req->getUpdated_at()} </h3>";
    echo "<h3> <b> Status: </b> {$req->getStatus()} </h3>";
    echo "<h3> <b> User name: </b> {$user->getUsername()} </h3>";
    echo "<h3> <b> Service: </b> {$service->getName()} </h3>";

    if(!empty($doc_array))
  foreach ($doc_array as $doc) {
    echo "<h3> <b> Documents: </b> {$doc_array->getName()} </h3>";
  } else {
    echo "<h3> <b> No Documents for this request </h3>";
  }


    ?>
  </div>
</section>
<table>

<!--
  <img src="<php echo PUBLIC_PATH ."/img/users_documents/smiley.gif";  ?> " alt="Smiley face" width="42" height="42"> -->

  </table>
</div>
</body>
</html>
