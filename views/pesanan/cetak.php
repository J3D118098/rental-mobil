<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
</head>

<body>
	<table id="example" class="display nowrap" style="width:100%">
		<thead>
			<tr>
				<th>No</th>
				<th>Pemesan</th>
				<th>Mobil</th>
				<th>Jenis Bayar</th>
				<th>Status</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>No</th>
				<th>Pemesan</th>
				<th>Mobil</th>
				<th>Jenis Bayar</th>
				<th>Status</th>
			</tr>
		</tfoot>
		<tbody>
			<?php while ($pesanan = $data_pesanan->fetch_object()) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $pesanan->nama_pemesan ?></td>
					<td><?= $pesanan->nama_mobil ?></td>
					<td><?= $pesanan->jenis_bayar ?></td>
					<?php
					if ($pesanan->status == 0) {
						echo '<td class="btn btn-sm btn-secondary mb-1"><i class="fa fa-user-clock"></i> Dipinjam </td>';
					}
					if ($pesanan->status == 1) {
						echo '<td class="btn btn-sm btn-success mb-1"><i class="fa fa-check"></i> Kembali </td>';
					} ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({
				dom: 'Bfrtip',
				buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			});
		});
	</script>

	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>


</html>