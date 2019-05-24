    <?php
    $file_path = "contactFile.txt";
    $action="delete";
    if(isset($_REQUEST["action"])) {
        $action=$_REQUEST['action'];
    }
    if(strcmp($action,"edit")==0){
        $id=$_POST["id"];

        file_upload($id);

        $lines = file($file_path);  // Read the whole file into an array
        $update_line="";
        foreach ($lines as $line){
            $details = explode(',', $line);
            if($details[0]==$id){
                $update_line=$line;
                break;
            }
        }
        $updatedContact=$id.",".readContactDetails();
        $content = file_get_contents($file_path);
        $newcontent = str_replace($update_line, $updatedContact, $content);
        file_put_contents($file_path, $newcontent);
    }if(strcmp($action,'new')==0){
        saveContact();
    }else{
        $id=$_GET["id"];
        $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $delete_line="";

        foreach ($lines as $line){
            $details = explode(',', $line);
            if($details[0]==$id){
                $delete_line=$line;
                break;
            }
        }
        $contents = file_get_contents($file_path);
        $contents = str_replace($delete_line, '', $contents);
        file_put_contents($file_path, $contents);
    }
    header('Location: index.php').exit();

    function readContactDetails(){
        $title=$_POST["title"];
        $firstName=$_POST["firstName"];
        $lastName=$_POST["lastName"];
        $email=$_POST["email"];
        $site=$_POST["site"];
        $cellNumber=$_POST["cellNumber"];
        $homeNumber=$_POST["homeNumber"];
        $officeNumber=$_POST["officeNumber"];
        $twitterUrl=$_POST["twitterUrl"];
        $facebookUrl=$_POST["facebookUrl"];
        $comment=$_POST["comment"];

        $contactDetails=$title.",".$firstName.",".$lastName.",".$email.",".$site.",".$cellNumber.",".
                $homeNumber.",".$officeNumber.",".$twitterUrl.",".$facebookUrl.",".$comment."\n";
        return $contactDetails;
    }
    function saveContact(){

        $id=getID();

        file_upload($id);

        $contactDetails=$id.",".readContactDetails();
        save_contacts($contactDetails);
    }

    function save_contacts($contactDetails){
        $contactFile = fopen("contactFile.txt", "a+") or die("Unable to open file!");
        fwrite($contactFile,$contactDetails);
        fclose($contactFile);
    }

    function file_upload($id){
        if(isset($_POST['saveContact']))
        {
            $pic = $_FILES['picture']['name'];
            $pic_loc = $_FILES['picture']['tmp_name'];
            $folder="pictures/";
            move_uploaded_file($pic_loc,$folder.$id.".jpg");
        }
    }

    function getID(){
        $file_name='ids';
        if(!file_exists($file_name)){
            touch($file_name);
            $handle=fopen($file_name,'r+');
            $id=0;
        }else{
            $handle=fopen($file_name,'r+');
            $id=fread($handle,filesize($file_name));
            settype($idd,"integer");
        }
        rewind($handle);
        fwrite($handle,++$id);

        fclose($handle);
        return $id;
    }

    ?>



