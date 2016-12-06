<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts">
                <?php if($blog){foreach($blog as $bg){
                    $comment = $this->fr->get_comment(@$bg->id); ?>
                <article class="post post-medium">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="post-image">
                                <div class="owl-carousel" data-plugin-options='{"items":1,"autoplay": true, "autoplayTimeout": 3000}'>
                                    <?php if($bg->image1!=''){ ?>
                                    <div>
                                        <div class="img-thumbnail" style="width: 330px;height: 160px; ">
                                            <img class="img-responsive" style="max-width:100%;max-height:100%;" src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo thumb(@$bg->image1);?>" alt="">
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if($bg->image2!=''){ ?>
                                    <div>
                                        <div class="img-thumbnail" style="width: 330px;height: 160px; ">
                                            <img class="img-responsive" style="max-width:100%;max-height:100%;" src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo thumb(@$bg->image2);?>" alt="">
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="post-content">
                                <h4><a href="<?php echo base_url('blog/read/'.for_url(@$bg->id,@$bg->title));?>"><?php echo @$bg->title;?></a></h4>
                                <?php echo read_more_blog(@$bg->content);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> <?php echo @$bg->date;?> </span>
                                <span><i class="fa fa-user"></i> <a href="<?php echo base_url('about')?>">By Dedy Pradana</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="<?php echo base_url('blog/category/'.$bg->name);?>"><?php echo $bg->description?></a> </span>
                                <span><i class="fa fa-comments"></i> <a href="<?php echo base_url('blog/read/'.for_url(@$bg->id,@$bg->title));?>"><?php echo count($comment);?> Comments</a></span>
                                <a href="<?php echo base_url('blog/read/'.for_url(@$bg->id,@$bg->title));?>" class="btn btn-xs btn-primary pull-right">Read more...</a>
                            </div>
                        </div>
                    </div>
                </article>
                <?php }} else { ?>
                <div class="alert alert-success" id="newsletterSuccess">
                    <strong>Nothing Found</strong>, <br>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.
                </div>
                <a href="<?php echo base_url('blog');?>" class="btn btn-lg btn-primary push-top">Visit Blog</a>
                <?php } ?>
                <ul class="pagination pagination-lg pull-right">
                    <?php echo $paging; ?>
                </ul>

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
                <hr />
            </aside>
        </div>
    </div>
</div>