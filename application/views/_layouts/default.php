<div class="body">
    <?php $this->load->view('_partials/navbar'); ?>
    <div role="main" class="main">
        <section class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('_partials/breadcrumb'); ?>
                            </div>
                        </div>
                        <h1><?php echo $page_title; ?></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <?php $this->load->view($inner_view); ?>
    </div>
    <?php $this->load->view('_partials/footer'); ?>
</div>