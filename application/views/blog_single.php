<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts single-post">
                <article class="post post-large blog-single-post">
                    <div class="post-image">
                        <div class="owl-carousel center" data-plugin-options='{"items":1,"autoplay": true, "autoplayTimeout": 7000}'>
                            <?php if(@$blog->image1!=''){ ?>
                            <div>
                                <div class="img-thumbnail" style="width: 1200px;height: 300px; ">
                                    <img class="img-responsive" style="max-width:100%;max-height:100%;" src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo @$blog->image1;?>" alt="">
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(@$blog->image2!=''){ ?>
                            <div>
                                <div class="img-thumbnail" style="width: 1200px;height: 300px; ">
                                    <img class="img-responsive" style="max-width:100%;max-height:100%;" src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo @$blog->image2;?>" alt="">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="post-date">
                        <span class="day"><?php echo @$day;?></span>
                        <span class="month"><?php echo @$month;?></span>
                    </div>
                    <div class="post-content">
                        <h2><a href="<?php echo current_full_url();?>"><?php echo @$blog->title;?></a></h2>
                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> By <a href="<?php echo base_url('about')?>">Dedy Pradana</a> </span>
                            <span><i class="fa fa-tag"></i> <a href="<?php echo base_url('blog/category/'.@$blog->name);?>"><?php echo @$blog->description?></a> </span>
                            <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                        </div>
                        <?php echo @$blog->content;?>
                        <div class="post-block post-share">
                            <h3><i class="fa fa-share"></i>Share this post</h3>
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_button_pinterest_pinit"></a>
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5846fb93883af156"></script>

                            <!-- AddThis Button END -->
                        </div>
                        <div class="post-block post-comments ">
                            <h3><i class="fa fa-comments"></i>Comments (<?php echo count($comment);?>)</h3>
                            <ul class="comments">
                                <?php if($comment){foreach($comment as $c){ 
                                    $reply = $this->fr->get_reply($c->id);?>
                                    <li>
                                        <div class="comment">
                                            <div class="img-thumbnail">
                                                <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/frontend/img/user_logo.png">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong><?php echo @$c->name;?></strong>
                                                </span>
                                                <p><?php echo @$c->comment;?></p>
                                                <span class="date pull-right"><?php echo @$c->date;?></span>
                                            </div>
                                        </div>
                                        <?php if($reply){ ?>
                                        <ul class="comments reply">
                                            <li>
                                                <div class="comment">
                                                    <div class="img-thumbnail">
                                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/frontend/img/admin_logo.png">
                                                    </div>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <span class="comment-by">
                                                            <strong>Dedy Pradana</strong>
                                                            <span class="pull-right">
                                                                <span> <a href="<?php echo base_url('about');?>"><i class="fa fa-user"></i> Dedy Pradana</a></span>
                                                            </span>
                                                        </span>
                                                        <?php echo @$reply->reply;?>
                                                        <span class="date pull-right"><?php echo @$reply->date;?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                <?php }} ?>
                            </ul>
                        </div>
                        <div class="post-block post-leave-comment">
                            <h3>Leave a comment</h3>
                            <?php echo $this->session->flashdata('flash_data'); ?>
                            <form action="<?php echo base_url('blog/add_comment');?>" method="POST">
                                <input type="hidden" name="id_blog" value="<?php echo uri(3);?>">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Your name *</label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="name" id="name" data-msg-required="Please enter your name." required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Your email address *</label>
                                            <input type="email" value="" maxlength="100" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Comment *</label>
                                            <textarea maxlength="5000" rows="5" class="form-control" name="comment" id="comment" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Post Comment" class="btn btn-primary btn-lg" data-loading-text="Loading...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-md-3">
            <aside class="sidebar">
                <form action="<?php echo base_url('blog/search');?>" method="POST">
                    <div class="input-group input-group-lg">
                        <input class="form-control" placeholder="Search..." name="search" id="s" type="text">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <hr />
                <h4>Categories</h4>
                <ul class="nav nav-list primary push-bottom">
                    <li><a href="<?php echo base_url('blog');?>">All Categories (<?php echo $total_blog?>)</a></li>
                    <?php foreach ($category as $cat) { 
                        $this->db->where('category', $cat->id);
                        $this->db->from('blog_post');
                        $total =  $this->db->count_all_results();?>
                    <li><a href="<?php echo base_url('blog/category/'.$cat->name);?>"><?php echo ucwords($cat->name);?> (<?php echo $total;?>)</a></li>
                    <?php } ?>
                </ul>
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#recentPosts" data-toggle="tab">Recent</a></li>
                        <li><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Popular</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="recentPosts">
                            <ul class="simple-post-list">
                                <?php foreach($blog_recent as $br){ ?>
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail" style="width: 50px;height: 50px; ">
                                            <a href="<?php echo base_url('blog/read/'.for_url($br->id,$br->title));?>">
                                                <img style="width:100%;height:100%;" src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo thumb($br->image1);?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info" style="font-size: 12px;">
                                        <a href="<?php echo base_url('blog/read/'.for_url($br->id,$br->title));?>"><?php echo @$br->title;?></a>
                                        <div class="post-meta">
                                            <?php echo @$br->date;?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="tab-pane" id="popularPosts">
                            <ul class="simple-post-list">
                                <?php foreach($blog_popular as $br){ ?>
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail" style="width: 50px;height: 50px; ">
                                            <a href="<?php echo base_url('blog/read/'.for_url($br->id,$br->title));?>">
                                                <img style="width:100%;height:100%;" src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo thumb($br->image1);?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info" style="font-size: 12px;">
                                        <a href="<?php echo base_url('blog/read/'.for_url($br->id,$br->title));?>"><?php echo @$br->title;?></a>
                                        <div class="post-meta">
                                            <?php echo @$br->date;?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>