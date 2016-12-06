<div class="container">
    <h2>Portfolio</h2>
    <ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
        <li data-option-value="*" class="active"><a href="#">Show All</a></li>
        <?php foreach($filter as $rec){ ?>
        <li data-option-value=".<?php echo @$rec->name;?>"><a href="#"><?php echo @$rec->description;?></a></li>    
        <?php } ?>
    </ul>
    <hr />
    <div class="row">
        <ul class="portfolio-list sort-destination" data-sort-id="portfolio">
            <?php foreach($portfolio as $rec){ ?>
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