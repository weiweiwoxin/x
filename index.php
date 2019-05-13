<?php
/**
 * 每个人都有属于自已的故事，我们编织着、叙述着，只为了那个必定动人的结局。
 * 爱上自已的故事，爱上别人的故事，交织着的，是美好，是快乐，是幸福。
 * 本项目属于 ProjectNatureSimple
 *
 * @package Story
 * @author Trii Hsia
 * @version v1@.0 #20190422
 * @link https://yumoe.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
<?php while ($categories->next()): ?>
    <div class="container-fluid">
        <div class="row">

            <a id="<?php $categories->name(); ?>"></a>
            <div class="panel" role="panel">

                <div class="panel-title card">
                    <i></i>
                    <?php $categories->name(); ?>
                </div>

                <div class="panel-body">
                    <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'pageSize=10000&type=category', 'mid=' . $categories->mid)->to($posts); ?>
                    <ul class="post-list clearfix">
                    <?php while ($posts->next()): ?>
                        <li class="post-item grid-item" itemscope itemtype="http://schema.org/BlogPosting"
                            style="background-image: url(<?php echo img_postthumb($posts->cid); ?>)">
                            <a class="post-link" href="<?php $posts->permalink() ?>"
                               style="background-color: rgba(255, 255, 255, 0.5);">
                                <h3 class="post-title">
                                    <time class="index-time" datetime="<?php $posts->date('c'); ?>"
                                          itemprop="datePublished"><?php $posts->date('M j, Y'); ?></time>
                                    <br><?php $posts->title() ?></h3>
                                <?php if ($posts->category): ?>
                                    <div class="post-meta">
                                        <?php echo $posts->category; ?>
                                    </div>
                                <?php endif; ?>

                                <ul className="icofont-ul post-count" style="height: 30px;position: absolute;bottom:0;right: 20px;">
                                    <li style="list-style: none;float:left;color:#484848;"><span
                                                class="icofont-eye"></span> <?php echo ViewsCounter_Plugin::getViews(); ?>
                                    </li>
                                    <li style="list-style: none;float:left;padding-left: 50px;cursor: pointer;"
                                        class="post-like" data-pid="<?php echo $posts->cid ?>"><span
                                                class="icofont-heart"></span> <?php Like_Plugin::theLike(false); ?>
                                    </li>
                                </ul>
                            </a>
                        </li>
                    <?php endwhile; ?> <!-- end posts -->
                    </ul>
                </div>

            </div>
        </div>
    </div>
<?php endwhile; ?> <!-- end categories -->

<div class="container-fluid">
    <div class="row">
        <div class="nav-page">
            <?php $this->pageNav('&laquo;', '&raquo;'); ?>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
