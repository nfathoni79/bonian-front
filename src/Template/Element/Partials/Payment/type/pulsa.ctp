<dl class="dl-horizontal mg-t-10">
	<div class="pd-10 bd-b">
	    <dt>Jenis Layanan</dt>
	    <dd><?= $data['digital_details']['name']; ?></dd>
	</div>
	<div class="pd-10 bd-b">
	    <dt>Nomor Customer</dt>
	    <dd><?= $data['customer_number']; ?></dd>
	</div>
	<div class="pd-10">
	    <dt>Harga</dt>
	    <dd><?= $this->Number->format($data['digital_details']['price']); ?></dd>
	</div>
</dl>
