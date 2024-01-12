<?php 
include('../db.php');

$sql = "SELECT * FROM categories  ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add-post'])){
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
    
   if(isset($img) && $imgError==0){
    move_uploaded_file($imgTemp,"../img/".$imgName);
   }

   $sql = "INSERT INTO posts (category_id,title,text,img) 
   VALUES (:category_id,:title,:text,:img)";

   $stmt = $conn->prepare($sql);
   $stmt->execute([
    'category_id'=>$category_id,
    'title'=>$title,
    'text'=>$text,
    'img'=>$imgName
   ]);
   
//    echo '<pre>';
//    print_r($img);
//    echo '</pre>';
    
//    exit;
}
?>




<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <?php include('css.php') ?>

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php include('navbar.php') ?>
            <div class="main-sidebar sidebar-style-2">
                <?php include('saidbar.php') ?>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Post create</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data" >
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select category</label>
                                        <select name="category_id" class="form-control">
                                            <?php foreach($categories as $category): ?>
                                            <option value="<?php echo $category['id'] ?>">
                                                <?php echo $category['name'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Post title</label>
                                        <input type="text" name="title" class="form-control" placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Text</label>
                                        <textarea name="text" class="form-control">

                                    </textarea>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" name="add-post" type="submit">Submit</button>
                                    </div>

                                </div>

                            </form>

                        </div>


                </section>
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php') ?>
        </div>
    </div>
    <!-- General JS Scripts -->
    <?php include('js.php') ?>

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>