<?php
echo "success";
$name1 = $_POST['name'];
$list1 = $_POST["list"];
$targetfolder = "testupload/";
$connect = new mysqli('localhost','root','','cfg');
  $file=$_FILES["pd"]["name"];
    $file_size = $_FILES['pd']['size'];
    $tmp_name=$_FILES["pd"]["tmp_name"];
    $path="pdfs/".$file;
    $file1=explode(".",$file);
    $ext=$file1[1];
    $allowed=array("pdf");
    if(in_array($ext,$allowed))
    {
      move_uploaded_file($tmp_name,$path);
    }
    $sql="INSERT INTO `content` (`contenttype`, `contentname`) VALUES ('$list1', '$name1')";
    $query=mysqli_query($connect,$sql);
  
  
  echo "Data sucessfully added<br>";
  echo "<br><strong>PROOF</strong> : <a href='pdfs/$file' target='_blank'><br>$file</a><pre></pre>";
?>