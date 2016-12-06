<header id="header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo base_url();?>">
                <img alt="Porto" width="250" height="90" data-sticky-width="180" data-sticky-height="50" src="<?php echo base_url(); ?>assets/frontend/img/logo.png">
            </a>
        </div>
        <nav>
            <ul class="nav nav-pills nav-top">
                <li>
                    <a href="<?php echo base_url('contact');?>"><i class="fa fa-angle-right"></i>Contact Us</a>
                </li>
                <li class="phone">
                    <span><i class="fa fa-phone"></i>+62 857 2000 4220</span>
                </li>
            </ul>
        </nav>
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container">
            <ul class="social-icons">
                <li class="facebook"><a href="<?php echo @$sosmed['facebook']?>" target="_blank" title="Facebook">Facebook</a></li>
                <li class="instagram"><a href="<?php echo @$sosmed['instagram']?>" target="_blank" title="Instagram">Instagram</a></li>
                <li class="linkedin"><a href="<?php echo @$sosmed['linkedin']?>" target="_blank" title="Linkedin">Linkedin</a></li>
            </ul>
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main" id="mainMenu">
                    <?php foreach ($menu as $parent => $parent_params): ?>
                        <?php if (empty($parent_params['children'])): ?>
                            <?php $active = ($current_uri == $parent_params['url'] || $ctrler == $parent); ?>
                            <li <?php if ($active) echo 'class="active"'; ?>>
                                <a href='<?php echo $parent_params['url']; ?>'>
                                    <?php echo $parent_params['name']; ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <?php $parent_active = ($ctrler == $parent); ?>
                            <li class='dropdown <?php if ($parent_active) echo 'active'; ?>'>
                                <a data-toggle='dropdown' class='dropdown-toggle' href='#'>
                                    <?php echo $parent_params['name']; ?> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul role='menu' class='dropdown-menu'>
                                    <?php foreach ($parent_params['children'] as $name => $url): ?>
                                        <li><a href='<?php echo $url; ?>'><?php echo $name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>