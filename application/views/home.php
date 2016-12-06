<div class="container">
    <div class="row center">
        <div class="col-md-12">
            <h2 class="short word-rotator-title">
                With technology, we
                <strong>
                    <span class="word-rotate" data-plugin-options='{"delay": 3500, "animDelay": 400}'>
                        <span class="word-rotate-items">
                            <span>create</span>
                            <span>navigate</span>
                            <span>perform</span>
                        </span>
                    </span>
                </strong>
                whatever you need
            </h2>
            <h4 class="lead tall">Recent Projects</h4>
        </div>
    </div>
    <div class="row center">
        <div class="owl-carousel" data-plugin-options='{"items": 4, "autoplay": true, "autoplayTimeout": 3000}'>
            <div>
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/logos/jm.png" alt="">
            </div>
            <div>
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/logos/inti.png" alt="">
            </div>
            <div>
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/logos/ctu.png" alt="">
            </div>
            <div>
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/logos/ga.png" alt="">
            </div>
            <div>
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/logos/malang-landscape.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="map-section">
    <section class="featured footer map">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="recent-posts push-bottom">
                        <h2>Latest <strong>Blog</strong> Posts</h2>
                        <div class="row">
                            <div class="owl-carousel" data-plugin-options='{"items": 1}'>
                                <?php $i = 1; foreach($blog_recent as $br){ 
                                    $date = day_month($br->date);?>
                                <?php if($i==1||$i==3){echo '<div>';} ?>
                                    <div class="col-md-6">
                                        <article>
                                            <div class="date">
                                                <span class="day"><?php echo $date['day'];?></span>
                                                <span class="month"><?php echo $date['month'];?></span>
                                            </div>
                                            <h4><a href="<?php echo base_url('blog/read/'.for_url($br->id,$br->title));?>"><?php echo @$br->title;?></a></h4>
                                            <?php echo read_more(@$br->content);?>
                                        </article>
                                    </div>
                                <?php if($i==2||$i==4){echo '</div>';} ?>
                                <?php $i++;} ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2><strong>Best</strong> Quotes</h2>
                    <div class="row">
                        <div class="owl-carousel push-bottom" data-plugin-options='{"items": 1}'>
                            <div>
                                <div class="col-md-12">
                                    <blockquote class="testimonial">
                                        <p>If you can't explain it simply. You don't understand it well enough</p>
                                    </blockquote>
                                    <div class="testimonial-arrow-down"></div>
                                    <div class="testimonial-author">
                                        <div class="img-thumbnail img-thumbnail-small">
                                            <img src="<?php echo base_url(); ?>assets/frontend/img/clients/einstein.png" alt="">
                                        </div>
                                        <p><strong>Albert Einstein</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-12">
                                    <blockquote class="testimonial">
                                        <p>Sometimes when you innovate, you make mistakes. It is best to admit them quickly, and get on with improving your other innovations.</p>
                                    </blockquote>
                                    <div class="testimonial-arrow-down"></div>
                                    <div class="testimonial-author">
                                        <div class="img-thumbnail img-thumbnail-small">
                                            <img src="<?php echo base_url(); ?>assets/frontend/img/clients/steve-jobs.png" alt="">
                                        </div>
                                        <p><strong>Steve Jobs</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>