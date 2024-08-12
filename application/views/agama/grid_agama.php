  <div class="block-header">
  	<div class="row">
  		<div class="col-lg-6 col-md-6 col-sm-12">
  			<?php if (isset($title)) { ?>
  				<h2><?= $title; ?></h2>
  				<ul class="breadcrumb">
  					<li class="breadcrumb-item "><a href="<?= base_url(); ?>" title="Dashboard"><i class="fa fa-dashboard"></i></a></li>
  					<li onclick="load_form('<?= $url_index; ?>', 'Add Data')" class="breadcrumb-item pointer"><?= $title; ?></li>
  				</ul>
  			<?php } ?>
  		</div>
  		<div class="col-lg-6 col-md-6 col-sm-12">
  			<div class="d-flex flex-row-reverse">
  				<div class="page_action">
  					<button onclick="adddata()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
  					<button onclick="load_form('<?= $url_index; ?>', 'Add Data')" type="button" class="btn btn-secondary"><i class="fa fa-refresh"></i> Refresh</button>
  				</div>
  				<div class="p-2 d-flex">

  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <div class="row clearfix">
  	<div class="col-lg-12">

  		<div class="card">
  			<div class="body">
  				<div class="table-responsive">
  					<table class="table table-bordered table-custom table-striped table-hover " id="mytable" style="width: 100%;">
  						<thead>
  							<tr>
  								<th style="width: 5%;">No</th>
  								<th>Nama Agama</th>
  								<th style="width: 5%;" class="text-center">Aksi</th>
  							</tr>
  						</thead>
  						<tbody>

  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>

  	</div>

  </div>




  <script>
  	$(document).ready(function() {

  		$('#mytable').DataTable({

  			"processing": false,
  			"serverSide": false,
  			"ajax": {
  				"url": "<?= $url_grid ?>",
  				"type": "POST",
  				"dataSrc": function(json) {
  					if (json.hasil == 'true') {
  						return json.datapost;
  					} else {
  						// menapilkan pesan erro jika data tidak ditemukan
  						return [];
  					}
  				}
  			},
  			"columns": [{
  					"data": null,
  					"render": function(data, type, row, meta) {
  						return meta.row + 1; // Menampilkan nomor urut
  					},
  					"title": "No" // Judul kolom
  				},
  				{
  					"data": 'nama_agama'
  				},
  				{
  					"data": 'nama_agama',
  					"render": function(data, type, row) {
  						return `
								<p class="demo-button">
                                <button type="button" class="btn btn-sm btn-primary" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
                            </p>
						`;
  					}
  				},

  			],

  		});

  	});

  	function adddata() {
  		load_form('<?= $url_add; ?>', 'Add Data');
  	}
  </script>
