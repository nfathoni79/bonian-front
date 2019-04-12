<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;"> </div>

<!-- end: header part -->

<div class="c-help-main mb-5">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
            <li><a >Halaman</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'pages','action' => 'index', $pages['slug']]); ?>"><?= $pages['title'];?></a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12 item-article">
                <div class="row box-1-about">
                    <div class="col-md-12 our-member">
                        <div class="title-about-us mb-5">
                            <h2><?= $pages['title'];?></h2>
                        </div>
                        <div class="short-des" style="text-align:justify;"><?= $pages['content'];?></div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
