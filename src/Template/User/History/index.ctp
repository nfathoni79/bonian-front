<style>
    .title-panel p{
        margin : 0 0 0 0px;
    }
    .panel-heading{
        background:  #d9534f !important;
        color:  #ffffff !important;
    }

    .panel-footer{
        background:  #FFF6F6 !important;
    }

    hr.style3 {
        border-top: 1px dashed #8c8b8b;
        margin-top : 0px !important;
        margin-bottom : 0px !important;
    }
    address{
        margin-bottom: 5px !important;
    }
</style>
<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Riwayat Pesanan </h4>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Tanggal transaksi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="search" class="form-control"  placeholder="Cari Tansaksi">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-md btn-danger btn-radius"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-4">
                               <span class="label label-danger">Riwayat Pembelian</span>
                            </div>
                            <div class="col-md-8">
                                <div class=" pull-right">
                                    <span class="label label-danger">Semua</span>
                                    <span class="label label-default">Menunggu Pembayaran</span>
                                    <span class="label label-default">Di Proses</span>
                                    <span class="label label-default">Di Kirim</span>
                                    <span class="label label-default">Di Selesai</span>
                                    <span class="label label-default">Di Batalkan</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="title-panel pull-left">
                                                    <strong>Invoice No. 12345678</strong>
                                                    <p>03 Feb 2019 17:35 WIB</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="title-panel pull-right">
                                                    <strong>Invoice Status : Di Proses</strong>
                                                    <p>Dibayar pada : 03 Feb 2019 17:35 WIB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : Z10012019</strong><br>
                                                Shipping origin : jakarta
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. 622.000</strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr class="style3">
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : Z10012019</strong><br>
                                                Shipping origin : jakarta
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. 622.000</strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="pull-left">
                                            <button class="btn btn-md btn-danger btn-radius">Rincian Pesanan</button>
                                        </div>
                                        <div class="pull-right">
                                            <strong>Total Tagihan Rp. 750.000</strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="title-panel pull-left">
                                                    <strong>Invoice No. 12345678</strong>
                                                    <p>03 Feb 2019 17:35 WIB</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="title-panel pull-right">
                                                    <strong>Invoice Status : Di Proses</strong>
                                                    <p>Dibayar pada : 03 Feb 2019 17:35 WIB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : Z10012019</strong><br>
                                                Shipping origin : jakarta
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. 622.000</strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr class="style3">
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : Z10012019</strong><br>
                                                Shipping origin : jakarta
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. 622.000</strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="pull-left">
                                            <button class="btn btn-md btn-danger btn-radius">Rincian Pesanan</button>
                                        </div>
                                        <div class="pull-right">
                                            <strong>Total Tagihan Rp. 750.000</strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="title-panel pull-left">
                                                    <strong>Invoice No. 12345678</strong>
                                                    <p>03 Feb 2019 17:35 WIB</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="title-panel pull-right">
                                                    <strong>Invoice Status : Di Proses</strong>
                                                    <p>Dibayar pada : 03 Feb 2019 17:35 WIB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : Z10012019</strong><br>
                                                Shipping origin : jakarta
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. 622.000</strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr class="style3">
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : Z10012019</strong><br>
                                                Shipping origin : jakarta
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. 622.000</strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="pull-left">
                                            <button class="btn btn-md btn-danger btn-radius">Rincian Pesanan</button>
                                        </div>
                                        <div class="pull-right">
                                            <strong>Total Tagihan Rp. 750.000</strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>

<?php $this->end(); ?>