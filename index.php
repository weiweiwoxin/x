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

<div class="container-fluid">
    <div class="row">
        <div id="main" role="main">
            <ul class="post-list clearfix">
                <?php while ($this->next()): ?>
                    <li class="post-item grid-item" itemscope itemtype="http://schema.org/BlogPosting" style="background-image: url(<?php echo img_postthumb($this->cid); ?>)">
                        <a class="post-link" href="<?php $this->permalink() ?>" style="background-color: rgba(255, 255, 255, 0.5);">
                            <h3 class="post-title">
                                <time class="index-time" datetime="<?php $this->date('c'); ?>"
                                      itemprop="datePublished"><?php $this->date('M j, Y'); ?></time>
                                <br><?php $this->title() ?></h3>
                            <?php if ($this->category): ?>
                                <div class="post-meta">
                                    <?php echo $this->category; ?>
                                </div>
                            <?php endif; ?>

                            <ul className="icofont-ul post-count" style="
            height: 30px;
            position: absolute;
            bottom:0;
            right: 20px;


">
                                <li style="list-style: none;float:left;color:#484848;"><span
                                            class="icofont-eye"></span> <?php echo ViewsCounter_Plugin::getViews(); ?>
                                </li>
                                <li style="list-style: none;float:left;padding-left: 50px;cursor: pointer;"
                                    class="post-like" data-pid="<?php echo $this->cid ?>"><span
                                            class="icofont-heart"></span> <?php Like_Plugin::theLike(false); ?></li>
                            </ul>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="nav-page">
            <?php $this->pageNav('&laquo;', '&raquo;'); ?>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
