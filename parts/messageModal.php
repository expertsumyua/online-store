<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo $title ?></h5>
        <!-- <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo $email ?></h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>
        <?php            

            if ($link == "verification") {
                $u_code = generateRandomString(20);
                $sql_users = "SELECT * FROM users WHERE email='" . $email . "'";
                $result = $conn->query($sql_users);
                if($result->num_rows > 0) {
                    //$user = mysqli_fetch_assoc($result);
                    $sql ="UPDATE `users` SET `confirm_mail` = '". $u_code ."' WHERE email= '" . $email . "'";
                    if($conn->query($sql)) {
                        $mail_link = "<a href='".$_SERVER['HTTP_HOST']."/?u_code=$u_code'>Confirm</a>";
                        mail($email, 'You are registered!', $mail_link);
                        $link = "/";
                    }
                }                               
            }

            
        ?>
        <form action="<?php echo $link?>" method="POST">
            <div class="modal-body">

              <p><h3><?php echo $message_modal?></h3></p>

            </div>
            <div class="modal-footer">
            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>-->
            
            <?php
            if ($link != "") {
                ?>
                <a href="<?php echo $link ?>" class="btn btn-outline-secondary btn-lg" role="button" aria-pressed="true">OK</a>
                <?php
            } else {
              ?>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
              <?php
            }             
            ?>
            
            </div>
        </form>

    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>