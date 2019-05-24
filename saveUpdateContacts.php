    <html>
    <head>
    <meta charset="ISO-8859-1">
    <title>ContactUpdate</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    <body>
    <?php
    //$contactDetail;
    $title="";
    $firstName="";
    $lastName="";
    $email="";
    $site="";
    $cellNumber="";
    $homeNumber="";
    $officeNumber="";
    $twitterUrl="";
    $facebookUrl="";
    $comment="";
    $id="";
    function findContactById($id){
        $lines = file("contactFile.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach($lines as $line){
            $details = explode(',', $line);
            if($details[0]==$id){
                return $details;
            }
        }
        return $id;
    }
    $action="new";
    if(isset($_GET["id"])) {
        $action="edit";
        $details=findContactById($_GET["id"]);
        $id=$details[0];
        $title=$details[1];
        $firstName=$details[2];
        $lastName=$details[3];
        $email=$details[4];
        $site=$details[5];
        $cellNumber=$details[6];
        $homeNumber=$details[7];
        $officeNumber=$details[8];
        $twitterUrl=$details[9];
        $facebookUrl=$details[10];
        $comment=$details[11];

    }
    ?>

    <div class="container">
      <div class="col sol-sm-12">
            <h4 class="modal-title">Please insert the following contact details:</h4>
          </div>
          <div class="row">
      <form class="form-horizontal" method="post" action="contact.php" enctype="multipart/form-data">
      <input type="hidden" name="action" id="" value="<?php echo $action?>"/>
      <input type="hidden" name="id" id="id" value="<?php echo $id?>"/>
              <div class="form-group">
                <label for="title" class="col-sm-1 control-label">Title</label>
                <div class="col-sm-2">
                <select class="form-control" id="title" name="title" required="required">
                <option value="<?php echo $title?>"><?php echo $title?></option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                  </select>
                </div>
                <label for="firstName" class="col-sm-2 control-label">First name</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="firstName" name="firstName"  required="required" placeholder="First name" value="<?php echo $firstName?>">
                </div>
                <label for="lastName" class="col-sm-2 control-label">Last name</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="lastName" name="lastName" required="required" value="<?php echo $lastName?>" placeholder="Last name">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <label for="site" class="col-sm-1 control-label">Site</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="site" name="site" value="<?php echo $site?>" placeholder="Website URL">
                </div>
              </div>

              <div class="form-group">
                <label for="cellNumber" class="col-sm-2 control-label">Cell Number</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="cellNumber" name="cellNumber" value="<?php echo $cellNumber?>" placeholder="Cell Number">
                </div>
                <label for="homeNumber" class="col-sm-2 control-label">Home Number</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="homeNumber" name="homeNumber" value="<?php echo $homeNumber?>" placeholder="Home Number">
                </div>
                <label for="officeNumber" class="col-sm-2 control-label">Office Number</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="officeNumber" name="officeNumber" value="<?php echo $officeNumber?>" placeholder="Office Number">
                </div>
              </div>

              <div class="form-group">
                <label for="twitterUrl" class="col-sm-2 control-label">Twitter URL</label>
                <div class="col-sm-10">
                  <input type="url" class="form-control" id="twitterUrl" name="twitterUrl" value="<?php echo $twitterUrl?>" placeholder="Twitter URL">
                </div>
              </div>

              <div class="form-group">
                <label for="facebookUrl" class="col-sm-2 control-label">Facebook URL</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="facebookUrl" name="facebookUrl" value="<?php echo $facebookUrl?>" placeholder="Facebook URL">
                </div>
              </div>

              <div class="form-group">
                <label for="piture" class="col-sm-2 control-label">Picture</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                </div>
              </div>

              <div class="form-group">
                <label for="comment" class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="comment" id="comment" ><?php echo $comment?></textarea>
                </div>
              </div>
          <div class="row">
            <button type="submit" name="saveContact" id="saveContact" class="btn btn-default">Save</button>
            <a href="index.php" class="btn btn-default">Cancel</a>
          </div>
        </form>
      </div>
      </div>
      <!-- jQuery library
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     Latest compiled JavaScript
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->


    <button type = "submit" name="viewSource" class ="btn btn-default"><a href="./folder_view/vs.php?s=<?php echo __FILE__?>&page=saveUpdateContacts.php" target="_blank">View Source</a></button>


      </body>
      </html>

