<?php
session_start();
include '../db.php';
$errMsg=[];
$category_id = $_POST['category_id'];
$title = $_POST['title'];
$text = $_POST['text'];
$img = $_FILES['img'];
   $imgName = $img['name'];
   $imgPath = $img['full_path'];
   $imgTemp = $img['tmp_name'];
   $imgType = $img['type'];
   $imgError = $img['error'];
   $imgSize = $img['size'];

   if(empty($title)){
    array_push($errMsg,"Title bos bolmasin")  ;
 }elseif(strlen($title)<2){
  array_push($errMsg,"Title 2 belgiden den kishi bolmasin ")  ;

 }
 if(trim($text)==""){

  array_push($errMsg,"text   bos bolmasin")  ;

 }

 if($imgSize>104800000){
  array_push($errMsg," fayl olshemi 10 mb tan az bolsin!")  ;

 }

 if(empty($errMsg)){
  if(isset($img) && $imgError==0){
      move_uploaded_file($imgTemp,"../img/".$imgName);
     }
  
     $sql = "UPDATE posts SET  category_id=:category_id, title =:ati,text = :text , img = :img 
     WHERE id=:id";
     $stmt = $conn->prepare($sql);
     $stmt->execute([
         'ati'=>$title,
         'category_id'=>$category_id,
         'text'=>$text,
         'img'=>$imgName,
         'id'=>$_POST['post_id']
     ]);

      $errMsg['post']="Post juklendi!";

     
     
 }



header('Location: edit-post.php');
?>