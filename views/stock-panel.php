<?php get_header() ?>
<style>
    table td img {
        max-width: 150px;
    }
</style>
<form method="post">
<?= csrf_field() ?>
<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap:10px">
                    <select class="form-control select2-item" data-placeholder="Cari item"></select>
                    <button class="btn btn-primary w-100" type="button" onclick="scan()"><i class="fas fa-qrcode fa-fw"></i> Scan Barcode</button>
                </div>

                <div id="my-qr-reader">
                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="stock-panel-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="3" class="text-center">Silahkan cari item atau scan barcode</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group w-100 mb-3">
                    <label for="">Asal</label>
                    <select class="form-control select2" name="organization_src_id">
                        <?php foreach($organizations as $organization): ?>
                        <option value="<?=$organization->id?>"><?=$organization->name?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="">Tujuan</label>
                    <select class="form-control select2" name="organization_dst_id">
                        <?php foreach($organizations as $organization): ?>
                        <option value="<?=$organization->id?>"><?=$organization->name?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success w-100">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php get_footer() ?>