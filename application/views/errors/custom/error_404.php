<div class="container">
    <section class="page-not-found">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="page-not-found-main">
                    <h2>404 <i class="fa fa-file"></i></h2>
                    <p>We're sorry, but the page you were looking for doesn't exist.</p>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Here are some useful links</h4>
                <ul class="nav nav-list primary">
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
            </div>
        </div>
    </section>

</div>