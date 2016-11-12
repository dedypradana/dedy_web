<div class="body">
<?php $this->load->view('_partials/navbar'); ?>
    <div role="main" class="main">
        <?php $this->load->view('_partials/slider'); ?>
        <?php $this->load->view($inner_view); ?>
    </div>
<?php $this->load->view('_partials/footer'); ?>
</div>