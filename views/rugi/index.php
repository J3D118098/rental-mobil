<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= APP_NAME ?> - <?= $judul ?></title>
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<?php partial('navbar', $aktif) ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<?php partial('topbar') ?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<div class="clearfix">
								<div class="float-left">
									<h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
								</div>
								<!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
							</div>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">

						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="card shadow">
								<div class="card-header">
									<h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
								</div>
								<div class="card-body">
									<form method="POST" action="<?= base_url('rugi/tambah') ?>" enctype="multipart/form-data">
										<div class="form-group">
											<label for="id_pemesan">Nama Pemesan</label>
											<select name="id_pemesan" id="id_pemesan" class="form-control">
												<?php while ($pemesan = $data_pemesan->fetch_object()) : ?>
													<option value="<?= $pemesan->id ?>"><?= $pemesan->nama ?></option>
												<?php endwhile; ?>
											</select>
										</div>

										<div class="form-group">
											<label for="id_mobil">Mobil</label>
											<select name="id_mobil" id="id_mobil" class="form-control">
												<?php while ($mobil = $data_mobil->fetch_object()) : ?>
													<option value="<?= $mobil->id ?>"><?= $mobil->nama ?></option>
												<?php endwhile; ?>
											</select>
										</div>

										<div class="form-group">
											<label for="kondisi">Kondisi</label>
											<select name="kondisi" id="id_kondisi" class="form-control">
												<option value="Rusak">Rusak</option>
												<option value="Hilang">Hilang</option>
												<option value="Lecet">Lecet</option>
											</select>
										</div>

										<div class="form-group">
											<label for="biaya">Harga</label>
											<input type="number" name="biaya" id="biaya" placeholder="ketik" required="required" autocomplete="off" class="form-control">
										</div>


										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
											<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="card shadow">
								<div class="card-header">
									<h6 class="m-0 font-weight-bold text-primary">Daftar Ganti Rugi</h6>
								</div>
								<div class="card-body">
									<?php if (checkSession('success')) : ?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<?= getSession('success', true) ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php elseif (checkSession('error')) : ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= getSession('error', true) ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif ?>

									<table class="table table-bordered" id="dataTable" width="" cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
												<th>Pemesan</th>
												<th>Mobil</th>
												<th>Kondisi</th>
												<th>Harga</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Pemesan</th>
												<th>Mobil</th>
												<th>Kondisi</th>
												<th>Harga</th>
											</tr>
										</tfoot>
										<tbody>
											<?php while ($rugi = $data_rugi->fetch_object()) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $rugi->nama_pemesan ?></td>
													<td><?= $rugi->nama_mobil ?></td>
													<td><?= $rugi->kondisi ?></td>
													<td><?= $rugi->biaya ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php partial('footer') ?>
		</div>
	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

	<script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>