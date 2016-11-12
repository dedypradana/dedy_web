<header id="header" class="narrow" data-plugin-options='{"alwaysStickyEnabled": true, "stickyEnabled": true, "stickyWithGap": false, "stickyChangeLogoSize": false}'>
    <div class="container">
        <div class="logo">
            <a href="<?php echo base_url(); ?>">
                <img alt="Porto" width="82" height="40" src="<?php echo base_url(); ?>assets/frontend/img/logo.png">
            </a>
        </div>
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container">
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