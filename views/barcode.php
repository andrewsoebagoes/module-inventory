<?php get_header() ?>
<div class="row mt-3">
    <div class="col-12">
        <h2>Barcode - <?=$item->name?></h2>
        <div class="card">
            <div class="card-body">
            <svg id="barcode"></svg>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
<script>
JsBarcode("#barcode", "<?=$item->barcode?>");
</script>
<?php get_footer() ?>