<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;"> 
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'pages','action' => 'index', $pages['slug']]); ?>"><?= $pages['title'];?></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- end: header part -->

<div class="c-help-main mb-5">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 item-article">
                <div class="row box-1-about">
                    <div class="col-md-12 our-member">
                        <div class="title-pages title-about-us">
                            <h2><?= $pages['title'];?></h2>
                        </div>
                        <div class="mt-5" style="text-align:justify;"><?= $pages['content'];?></div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    /* show lightbox when clicking a thumbnail */
        $('a.thumb').click(function(event){
            event.preventDefault();
            var content = $('.modal-body');
            content.empty();
            var title = $(this).attr("title");
            $('.modal-title').html(title);          
            content.html($(this).html());
            $(".modal-profile").modal({show:true});
        });

      });
</script>