<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php require_once 'functions.php'; ?>
<!DOCTYPE HTML>
<?php
require_once 'config.php';
if ($GLOBALS['style_BG'] != '') {
    echo '<style>';
    echo "\n";
    echo 'body{background: #fff;}body::before {background: url(' . $GLOBALS['style_BG'] . ') center/cover no-repeat;}blockquote::before {background: transparent !important;}';
    echo "\n";
    echo '</style>';
    echo "\n";
}
?>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
                'category'  =>  _t('%s'),
                'search'    =>  _t('%s'),
                'tag'       =>  _t('%s'),
                'author'    =>  _t('%s')
            ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link type="text/css" rel="stylesheet" href="https://lib.baomitu.com/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('assert/css/prism.css'); ?>">
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('assert/css/zoom.css'); ?>">
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('assert/css/main.css'); ?>">
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('assert/css/custom.css'); ?>">
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('assert/icofont/icofont.min.css'); ?>">
    <?php if ($GLOBALS['isIconNav'] == 'on') : ?>
        <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('assert/css/twemoji-awesome.css'); ?>">
    <?php endif; ?>

    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>
    <!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
    <header class="mobile-header">
        <div class="mobile-header-logo">
            <img src="#">
        </div>
    </header>

    <div class="mobile-side-btn" >
        <div class="mobile-nav-bar">
            <i class="icofont-navigation-menu icofont-2x"></i>
        </div>
    </div>

    <header id="header" class="clearfix">
        <div class="container-fluid">
            <div class="row header-container">
                <div class="header-item">
                    <a class="header-link" href="<?php $this->options->siteUrl(); ?>">
                        <svg class="octicon  v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true">
                            <!-- 标题开始 -->
                            <span class="b">L</span>
                            <span class="b">e</span>
                            <span class="b">m</span>
                            <span class="b">o</span>
                            <span class="b">n</span>

                            <a href="<?php $this->options->siteUrl(); ?>">
                                <span class="w">X</span>
                            </a>
                            <span class="b">S</span>
                            <span class="b">a</span>
                            <span class="b">a</span>
                            <span class="b">S</span>
                            <!-- 标题结束 -->
<!--                            <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>-->
                        </svg>
                    </a>
                </div>
                <div class="logo">
                    <div id="database-search-box" class="search-box mr-3 position-relative" aria-expanded="false">
                        <form id="search" method="post" action="./" role="search">
                            <label class="form-control input-sm header-search-wrapper p-0 header-search-wrapper-jump-to position-relative d-flex flex-justify-between flex-items-center js-chromeless-input-container">
                                <input class="form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus js-site-search-field is-clearable" autocomplete="off" type="text" name="s" id="database-search" placeholder="Type something~" />
                                <img src="https://github.githubassets.com/images/search-key-slash.svg" alt="" class="mr-2 header-search-key-slash">
                            </label>
                        </form>
                    </div>
                    <div class="header-logo">
                        <!-- 标题开始 -->
                        <span class="b">L</span>
                        <span class="b">e</span>
                        <span class="b">m</span>
                        <span class="b">o</span>
                        <span class="b">n</span>

                        <a href="<?php $this->options->siteUrl(); ?>">
                            <span class="w">X</span>
                        </a>
                        <span class="b">S</span>
                        <span class="b">a</span>
                        <span class="b">a</span>
                        <span class="b">S</span>
                        <!-- 标题结束 -->
                        <a id="btn-menu" href="javascript:isMenu();">
                            <span class="b">·</span>
                        </a>
                        <a href="javascript:isMenu1();">
                            <?php if ($GLOBALS['isIconNav'] == 'on') : ?>
                                <span id="menu-1" class="bf"><i class="twa twa-flags"></i></span>
                            <?php else : ?>
                                <span id="menu-1" class="bf">1</span>
                            <?php endif; ?>
                        </a>
                        <a href="javascript:isMenu2();">
                            <?php if ($GLOBALS['isIconNav'] == 'on') : ?>
                                <span id="menu-2" class="bf"><i class="twa twa-evergreen-tree"></i></span>
                            <?php else : ?>
                                <span id="menu-2" class="bf">2</span>
                            <?php endif; ?>
                        </a>
                        <a href="javascript:isMenu3();">
                            <?php if ($GLOBALS['isIconNav'] == 'on') : ?>
                                <span id="menu-3" class="bf"><i class="twa twa-mag"></i></span>
                            <?php else : ?>
                                <span id="menu-3" class="bf">3</span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div id="menu-page">
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()) : ?>
                            <a href="<?php $pages->permalink(); ?>">
                                <li><?php $pages->title(); ?></li>
                            </a>
                        <?php endwhile; ?>
                        <?php if ($GLOBALS['isRSS'] == 'on') : ?>
                            <a href="<?php $this->options->feedUrl(); ?>">
                                <li>RSS</li>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <div id="sidebar" class="clearfix">
        <div class="container-fluid fixed">
            <div class="row">
                <ul class="nav-tags text-center">
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                    <?php while($categorys->next()): ?>
                        <?php if ($categorys->levels === 0): ?>
                            <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                            <?php if (empty($children)) { ?>
                                <li>
                                    <a href="<?php if ($this->is('index')): ?><?php else: ?>/<?php endif; ?>#<?php $categorys->name();?>" class="smooth">
                                        <i class="fa fa-<?php $categorys->slug();?>"></i>
                                        <span class="title"><?php $categorys->name(); ?></span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a>
                                        <i class="fa fa-<?php $categorys->slug();?>"></i>
                                        <span class="title"><?php $categorys->name(); ?></span>
                                    </a>
                                    <ul>
                                        <?php foreach ($children as $mid) { ?>
                                            <?php $child = $categorys->getCategory($mid); ?>
                                            <li>
                                                <a href="<?php if ($this->is('index')): ?><?php else: ?>/<?php endif; ?>#<?php echo $child['name'];?>" class="smooth"><?php echo $child['name']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>

    <div id="main" class="clearfix">
        <div class="main-wrap">

        <div class="container-fluid">


        <div id="body" class="clearfix">

