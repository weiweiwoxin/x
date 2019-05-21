<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="archive-header">
        <span><?php $this->archiveTitle(array(
            'category'  =>  _t('- Category · %s -'),
            'search'    =>  _t('- Search · %s -'),
            'tag'       =>  _t('- Tag · %s -'),
            'author'    =>  _t('- Author · %s -')
        ), '', ''); ?></span>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div id="main" role="main">
            <ul class="post-list clearfix">
            <?php if ($this->have()): ?>
            <?php while($this->next()): ?>
                <li class="post-item grid-item" itemscope itemtype="http://schema.org/BlogPosting">

                    <div class="card" style="background-color: rgba(255, 255, 255, 0.5);">
                        <a class="card-heading link-tooltip" title="<?php $this->title() ?>" href="<?php $this->permalink() ?>" target="_blank">
                            <!--        <a class="card-heading link-tooltip" title="--><!--" href="--><!--" target="_blank">-->
                            <span class="card-icon">
                                            <img src="<?php echo img_postthumb($this->cid); ?>">
                                        </span>
                            <span class="card-title"><?php $this->title() ?></span>
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
                                    <span class="post-like" data-pid="<?php echo $this->cid ?>" > <?php Like_Plugin::theLike(false); ?></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
            <?php else: ?>
            <br><br>
            <h2 class="post-title"><center><?php _e('(´°̥̥̥̥̥̥̥̥ω°̥̥̥̥̥̥̥̥｀) 什么都没有找到唉...'); ?></center></h2>
            <?php endif; ?>
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
