<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $data['page_title']." - ".Option::get('site_name'); ?></title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/libs/AdminLTE/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/libs/AdminLTE/dist/css/skins/<?php echo Option::get('color_scheme'); ?>.min.css">

    <?php if (Option::get('google_font_cdn') == "google"): ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php elseif (Option::get('google_font_cdn') == "moefont"): ?>
    <link rel="stylesheet" href="https://cdn.moefont.com/fonts/css?family=Ubuntu">
    <link rel="stylesheet" href="https://cdn.moefont.com/fonts/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php elseif (Option::get('google_font_cdn') == "useso"): ?>
    <link rel="stylesheet" href="http://fonts.useso.com/css?family=Ubuntu">
    <link rel="stylesheet" href="http://fonts.useso.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php endif; ?>

    <link rel="stylesheet" href="../assets/libs/ply/ply.css">
    <?php if (isset($data['style'])) echo $data['style']; ?>
    <style><?php echo Option::get('custom_css'); ?></style>
</head>

<body class="hold-transition <?php echo Option::get('color_scheme'); ?> sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="<?php echo Option::get('site_url'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>B</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><?php echo Option::get('site_name'); ?></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $_SESSION['uname']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../get.php?type=avatar&uname=<?php echo $_SESSION['uname']; ?>&size=128" alt="User Image">
                                    <p>
                                        <?php echo $_SESSION['uname']; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">个人资料</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="javascript:;" id="logout" class="btn btn-default btn-flat">登出</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../get.php?type=avatar&uname=<?php echo $_SESSION['uname']; ?>&size=45" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['uname']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu"><?php
                    $pages  = array(1 => ['title'=>'用户中心', 'link'=>'index.php',   'icon'=>'fa-dashboard'],
                                    2 => ['title'=>'皮肤上传', 'link'=>'upload.php',  'icon'=>'fa-upload'],
                                    3 => ['title'=>'个人资料', 'link'=>'profile.php', 'icon'=>'fa-user'],
                                    4 => ['title'=>'使用说明', 'link'=>'manual.php',  'icon'=>'fa-book']);

                    foreach ($pages as $key => $value) {
                        echo ($data['page_title'] == $value['title']) ? '<li class="active">' : '<li>';
                        echo "<a href='{$value['link']}'><i class='fa {$value['icon']}'></i> <span>{$value['title']}</span></a>";
                        echo '</li>';
                    }

                    if ($data['user']->is_admin): ?>
                    <li><a href="../admin"><i class="fa fa-cog"></i> <span>管理面板</span></a></li>
                    <?php endif; ?>
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
