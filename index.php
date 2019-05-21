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
                    <i class="icofont-label"></i>
                    <?php $categories->name(); ?>
                </div>

                <div class="panel-body">
                    <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'pageSize=10000&type=category', 'mid=' . $categories->mid)->to($posts); ?>
                    <ul class="post-list clearfix">
                    <?php while ($posts->next()): ?>

                            <li class="post-item grid-item" >
                                <div class="card" style="background-color: rgba(255, 255, 255, 0.5);">
                                    <a class="card-heading link-tooltip" title="<?php $posts->title() ?>" href="<?php $posts->permalink() ?>" target="_blank">
                                        <!--        <a class="card-heading link-tooltip" title="--><!--" href="--><!--" target="_blank">-->
                                        <span class="card-icon">
                                            <img src="<?php echo img_postthumb($posts->cid); ?>">
                                        </span>
                                        <span class="card-title"><?php $posts->title() ?></span>
                                    </a>
                                    <div class="card-body">

                                    </div>
                                    <div class="card-footer">
                                        <div class="footer-item">
                                                <i class="icofont-eye"></i>
                                                <span> <?php echo ViewsCounter_Plugin::getViews(); ?></span>
                                        </div>
                                        <div class="footer-item">
                                            <div class="clearfix" style="text-align: center;">
                                                <i class="icofont-heart"></i>
                                                <span class="post-like" data-pid="<?php echo $posts->cid ?>" > <?php Like_Plugin::theLike(false); ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </li>
                    <?php endwhile; ?> <!-- end posts -->
                    </ul>
                </div>

            </div>
        </div>
    </div>
<?php endwhile; ?> <!-- end categories -->



<?php $this->need('footer.php'); ?>
