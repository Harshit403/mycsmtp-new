<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Order History
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section" style="min-height:400px">
        <div class="text-center">
            <h2>Order History</h2>
        </div>
        <div class="invoiceSubContainer my-3">
            <div class="row">
                <?php if (!empty($invoiceDetails)): ?>
                    <?php foreach ($invoiceDetails as $value): ?>
                        <?php
                            $invoiceJson = $value->invoice_json;
                            if (!empty($invoiceJson)) {
                                $jsonDecoded = json_decode($invoiceJson);
                                ?>
                                <div class="col-md-12 p-4 mt-3" style="border: 1px solid;border-radius: 5px;">
                                    <div class="d-flex justify-content-between">
                                        <?php $order_id = $jsonDecoded[0]->order_id; ?>
                                        <?php $payement_date = $jsonDecoded[0]->payement_date; ?>
                                        <h5><?=$order_id?><br/><?=$payement_date?></h5>
                                        <div class="d-flex" style="flex-direction:column;">
                                            <?=$jsonDecoded[0]->payment_status?>
                                            <a href="<?=base_url()?>download-invoice?order_id=<?=base64_encode($order_id)?>" class="btn btn-sm btn-success"><i class="bi bi-arrow-down-circle"></i> Download</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
    <script type="text/javascript">
        var pageType = 'order_history';
    </script>
    <script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.2"></script>
<?= $this->endSection() ?>

