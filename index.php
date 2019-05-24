    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="ISO-8859-1">
    <title>Contact</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>


    .center {
        text-align: center;
    }

    thead,th {
        text-align: center;
        border: solid 2px black;
    }
    tbody,tr {
        border: solid 2px brown;
    }
    table{

        background-color: #bce8f1;

    }

    .table-bordered{

       border: #1a1a1a 3px solid;

    }
    img {
        border: 1px solid  #ddd;
        border-radius: 4px;
        padding: 2px;
        width: 150px;

    }

    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
            }
    </style>



    </head>
    <body>
    <?php
    $searchKey="";
    if (isset($_POST['searchBtn'])) {
        $searchKey=$_POST['search'];
    }
    ?>
    <div class="container">
      <div class="row">

        <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th colspan="4">
            <div class="col-sm-6 text-center">Contact Summary</div>
            <div class="col-sm-2">
            <a href="saveUpdateContacts.php" class="btn btn-primary">Add more contact</a>
            </div>
            <div class="col-sm-4 text-right">
            <form class="form-inline" method="POST" action="index.php">
              <div class="form-group">
                <input type="search" class="form-control" id="search" name="search" value="<?php echo $searchKey?>" placeholder="Search by first/ last name">
              </div>
              <button type="submit" class="btn btn-primary" name="searchBtn" id="searchBtn">Search</button>
            </form>

            </div>
          </th>
        </tr>
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Picture</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(file_exists("contactFile.txt")){
        $lines = file("contactFile.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!empty($lines)) {
      foreach($lines as $line){
      $contactDetails = explode(',', $line);
      if(strcasecmp($contactDetails[2],$searchKey)!=0 && strcasecmp($contactDetails[3],$searchKey)!=0 && strlen($searchKey)>0){
        continue;
      }

      ?>
       <tr>
          <td><?php echo $contactDetails[2]?></td>
          <td><?php echo $contactDetails[3]?></td>
          <td class="center"><a target="_blank" href="pictures/<?php echo $contactDetails[0]?>.jpg">
                <img src="pictures/<?php echo $contactDetails[0]?>.jpg" style="width:150px">
            </a>
            </td>
          <td class = "center">
          <a href="saveUpdateContacts.php?id=<?php echo $contactDetails[0]?>" class="btn btn-warning">edit</a>
          <a href="contact.php?id=<?php echo $contactDetails[0]?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?');">delete</a></td>
        </tr>
      <?php
      }
      }
      }else{
        ?>
        <tr>
          <td colspan="4" class="text-center">No Records found!</td>
        </tr>
        <?php
      }
      ?>
      </tbody>
    </table>
    </div>
    </div>
    <!-- jQuery library
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <div style="text-align: center">
    <button type = "submit" name="viewSource" class ="btn-lg"><a href="./folder_view/vs.php?s=<?php echo __FILE__?>&page=index.php" target="_blank">View Source</a></button>
    </div>
    </body>


    </html>

