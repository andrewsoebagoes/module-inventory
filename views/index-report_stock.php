<?php get_header() ?>
<style>
    table td img {
        max-width: 150px;
    }
</style>
<div class="card">
    <div class="card-header d-flex flex-grow-1 align-items-center">
        <p class="h4 m-0"><?php get_title() ?></p>

    </div>
    <div class="card-body">
        <?php if ($success_msg) : ?>
            <div class="alert alert-success"><?= $success_msg ?></div>
        <?php endif ?>
        <?php if ($error_msg) : ?>
            <div class="alert alert-danger"><?= $error_msg ?></div>
        <?php endif ?>
        <div class="table-responsive table-hover table-sales">
            <table class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th>Organisasi</th>
                        <th>Jumlah Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) : ?>
                        <tr>
                            <td><?=$key+1;?></td>
                            <td><?= $value->name; ?></td>
                            <td><?= $value->total_stock; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php get_footer() ?>