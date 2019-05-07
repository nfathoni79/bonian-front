<dl class="dl-horizontal" style="margin-top:30px;">
    <dt>Jenis Layanan</dt>
    <dd><?= $data['digital_details']['name']; ?></dd>
    <dt>Nomor Customer</dt>
    <dd><?= $data['customer_number']; ?></dd>
    <dt>Harga</dt>
    <dd><?= $this->Number->format($data['digital_details']['price']); ?></dd>
</dl>
