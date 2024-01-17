<?php 
include('../db.php');

$sql = "SELECT categories.name AS category_name ,
            posts.id,
            posts.title,
            posts.text,posts.img ,
            posts.create_at
            FROM posts INNER JOIN  categories
            ON posts.category_id = categories.id ";

$stmt =$conn->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll();

// test($posts);




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
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">All <span
                                                        class="badge badge-white">10</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Draft <span
                                                        class="badge badge-primary">2</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Pending <span
                                                        class="badge badge-primary">3</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Trash <span
                                                        class="badge badge-primary">0</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>All Posts</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="float-left">
                                            <select class="form-control selectric">
                                                <option>Action For Selected</option>
                                                <option>Move to Draft</option>
                                                <option>Move to Pending</option>
                                                <option>Delete Permanently</option>
                                            </select>
                                        </div>
                                        <div class="float-right">
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix mb-3"></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>

                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Created At</th>
                                                    <th>Views</th>
                                                    <th>Status</th>
                                                </tr>
                                                <?php foreach($posts as $post): ?>
                                                <tr>

                                                    <td>
                                                        <a href="#">
                                                            <img alt="image" src="../img/<?php echo $post['img']?>"
                                                                class="" width="60" data-toggle="title" title="">
                                                            <span class="d-inline-block ml-1">Cara Stevens</span>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $post['title']  ?>
                                                        <div class="table-links">
                                                            <a href="single-post.php?post_id=<?php echo $post['id']; ?>   "> View</a>
                                                            <div class="bullet"></div>
                                                            <a href="#">Edit</a>
                                                            <div class="bullet"></div>
                                                            <a href="#" class="text-danger">Trash</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href=""><?php echo $post['category_name']  ?></a>
                                                    </td>
                                                    <td><?php echo $post['create_at']  ?></td>
                                                    <td>3,587</td>
                                                    <td>
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>

                                                <?php endforeach; ?>

                                            </table>
                                        </div>
                                        <div class="float-right">
                                            <nav>
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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