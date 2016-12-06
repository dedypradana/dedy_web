<div class="container">
    <div class="portfolio-title">
        <div class="row">
            <div class="portfolio-nav-all col-md-1">
                <a href="<?php echo base_url('portfolio');?>" data-tooltip data-original-title="Back to list"><i class="fa fa-th"></i></a>
            </div>
            <div class="col-md-10 center">
                <h2 class="shorter"><?php echo @$portfolio->title;?></h2>
            </div>
        </div>
    </div>
    <hr class="tall">
    <div class="row">
        <div class="col-md-4">
            <div class="owl-carousel" data-plugin-options='{"items": 1,"autoplay": true, "autoplayTimeout": 3000}'>
                <?php if(@$portfolio->path!=''){ ?>
                <div>
                    <div class="thumbnail">
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/portfolio/<?php echo @$portfolio->path;?>">
                    </div>
                </div>
                <?php } ?>
                <?php if(@$portfolio->image1!=''){ ?>
                <div>
                    <div class="thumbnail">
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/portfolio/<?php echo @$portfolio->image1;?>">
                    </div>
                </div>
                <?php } ?>
                <?php if(@$portfolio->image2!=''){ ?>
                <div>
                    <div class="thumbnail">
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/portfolio/<?php echo @$portfolio->image2;?>">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="portfolio-info">
                <div class="row">
                    <div class="col-md-12 center">
                        <ul>
                            <li>
                                <i class="fa fa-calendar"></i> <?php echo tgl_indo(@$portfolio->build);?>
                            </li>
                            <li>
                                <i class="fa fa-tags"></i> <?php echo $portfolio->description;?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <h4>Project <strong>Description</strong></h4>
            <?php echo html_entity_decode(@$portfolio->deskripsi);?>
            <?php if(@$portfolio->url!=''){ ?>
                <a href="<?php echo @$portfolio->url;?>" target="_blank" class="btn btn-primary btn-icon"><i class="fa fa-external-link"></i>Visit Site</a> 
                <span class="arrow hlb" data-appear-animation="rotateInUpLeft" data-appear-animation-delay="800"></span>
            <?php } ?>
            <ul class="portfolio-details">
                <li>
                    <p><strong>Skills:</strong></p>

                    <ul class="list list-skills icons list-unstyled list-inline">
                        <?php foreach($skill as $r){ ?>
                            <li><i class="fa fa-check-circle"></i> <?php echo $r?></li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <p><strong>Client:</strong></p>
                    <p><?php echo @$client->client;?></p>
                </li>
            </ul>
        </div>
    </div>
    <hr class="tall" />
    <div class="row">
        <div class="col-md-12">
            <h3>Related <strong>Project</strong></h3>
        </div>
        <ul class="portfolio-list">
            <?php foreach($related as $rec){ ?>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item <?php echo @$rec->name?>">
                    <div class="portfolio-item img-thumbnail">
                        <a href="<?php echo base_url('portfolio/view_detail/'.for_url($rec->id,$rec->title));?>" class="thumb-info">
                            <div style="height: 255px; width: 255px;"><img alt="" class="img-responsive" style="max-width:100%;max-height:100%;" src="<?php echo base_url(); ?>assets/uploads/portfolio/<?php echo thumb(@$rec->path); ?>"></div>
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner"><?php echo @$rec->title;?></span>
                                <span class="thumb-info-type"><?php echo @$rec->description;?></span>
                            </span>
                            <span class="thumb-info-action">
                                <span title="Universal" class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>