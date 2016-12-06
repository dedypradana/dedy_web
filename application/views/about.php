<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="owl-carousel" data-plugin-options='{"items": 1,"autoplay": true, "autoplayTimeout": 5000}'>
                <div>
                    <div class="thumbnail">
                        <img alt="" height="300" class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/media/<?php echo @$about->image1;?>">
                    </div>
                </div>
                <div>
                    <div class="thumbnail">
                        <img alt="" height="300" class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/media/<?php echo @$about->image2;?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h2 class="shorter">Dedy <strong>Pradana</strong></h2>
            <h4>Web Developer</h4>
            <p>
                I grew up in Madiun, East Java. 
                I have diploma degree majoring information system from Telkom University, 
                Bandung and bachelor degree majoring Informatics Engineering from Muhammadiyah University, Malang.<br>
                With my <?php echo date('Y')-2012;?> year experience as a professional programmer, I have completed more than 15 projects. 
                Besides my passion in programming, I am also fond of writing article for a blog. 
            </p>
            <ul class="list icons list-unstyled">
                <li><i class="fa fa-check"></i> Diploma Telkom University (2012)</li>
                <li><i class="fa fa-check"></i> PT. Jasamarga Purbaleunyi (2012)</li>
                <li><i class="fa fa-check"></i> PT. Industri Telekomunikasi (2012)</li>
                <li><i class="fa fa-check"></i> PT. Cendana Teknika Utama (2013 - 2015)</li>
                <li><i class="fa fa-check"></i> Bachelor Degree Muhammadiyah Malang University (Now)</li>
            </ul>

        </div>
    </div>

    <hr class="tall" />

    <div class="row center">

        <div class="col-md-3">
            <div class="circular-bar">
                <div class="circular-bar-chart" data-percent="90" data-plugin-options='{"barColor": "#E36159"}'>
                    <strong>Codeigniter</strong>
                    <label><span class="percent">90</span>%</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="circular-bar">
                <div class="circular-bar-chart" data-percent="85" data-plugin-options='{"barColor": "#0088CC", "delay": 300}'>
                    <strong>PHP</strong>
                    <label><span class="percent">85</span>%</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="circular-bar">
                <div class="circular-bar-chart" data-percent="75" data-plugin-options='{"barColor": "#2BAAB1", "delay": 600}'>
                    <strong>Database</strong>
                    <label><span class="percent">75</span>%</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="circular-bar">
                <div class="circular-bar-chart" data-percent="70" data-plugin-options='{"barColor": "#734BA9", "delay": 900}'>
                    <strong>Datawarehouse</strong>
                    <label><span class="percent">70</span>%</label>
                </div>
            </div>
        </div>

    </div>

</div>

<section class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo base_url(); ?>assets/frontend/img/parallax-transparent.jpg);">
    <div class="container">
        <div class="row center">
            <div class="col-md-12">

                <div class="row">
                    <div class="owl-carousel" data-plugin-options='{"items": 1}'>
                        <div>
                            <blockquote>
                                <p><i class="fa fa-quote-left"></i> Jangan melihat masa lalu dengan penyesalan dan jangan melihat masa depan dengan ketakutan tetapi hadapi disekelilingmu dengan penuh kesadaran.</p>
                                <span>- Best Quote</span>
                            </blockquote>
                        </div>
                        <div>
                            <blockquote>
                                <p><i class="fa fa-quote-left"></i> Sebaik-baiknya orang adalah berguna bagi orang lain.</p>
                                <span>- Best Quote</span>
                            </blockquote>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="short">Recent <strong>Project</strong></h3>
            <p>My recent project completed</p>
        </div>
        <ul class="portfolio-list">
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