<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
	<title>Document</title>
</head>
<body>
	<div class="container mt-5" style="position: relative;">
		<div style="position: absolute; right: 23%; z-index: 1;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Add Data</button>
		</div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Code</th>
					<th>Name</th>
					<th>Price</th>
					<th>Stock</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include('connection/db.php');
				$no = 0;
				$query = "SELECT * FROM book";
				$result = mysqli_query($link, $query);
				while ($data = mysqli_fetch_assoc($result)) {
					$no++
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data['code_book']; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['price']; ?></td>
						<td><?php echo $data['stock']; ?></td>
						<td>
							<button type="button" class="btn btn-primary edit-data" data-toggle="modal" data-target="#modalEdit"
							data-id="<?php echo $data['id']; ?>" 
							data-code="<?php echo $data['code_book']; ?>"
							data-name="<?php echo $data['name']; ?>" 
							data-price="<?php echo $data['price']; ?>" 
							data-stock="<?php echo $data['stock']; ?>"
							>Edit</button>
							<button type="button" class="btn btn-danger delete" data-ids="<?php echo $data['id']; ?>">Delete</button>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>

    <!-- form delete -->
    <form id="delete" autocomplete="off" method="post" action="action/delete-data.php">
    <input type="hidden" name="ids" class="form-control ids">
    </form>


<!-- Modal create -->
	<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Create</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formCreate" autocomplete="off" method="post" action="action/create-data.php">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Name</label>
								<input type="text" name="names" class="form-control names" required>
							</div>
							<div class="form-group col-md-6">
								<label for="price">Price</label>
								<input type="number" name="prices" class="form-control prices" required>
							</div>
						</div>
						<div class="form-group">
							<label for="stock">Stock</label>
							<input type="number" name="stocks" class="form-control stocks" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary create">Save</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal edit -->
	<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formEdit" autocomplete="off" method="post" action="action/edit-data.php">
						<div class="form-group">
							<label for="code">Code Book</label>
							<input type="text" name="code" class="form-control code" id="code" disabled>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Name</label>
								<input type="hidden" name="id" class="form-control id" id="id">
								<input type="text" name="name" class="form-control name" id="name">
							</div>
							<div class="form-group col-md-6">
								<label for="price">Price</label>
								<input type="number" name="price" class="form-control price" id="price">
							</div>
						</div>
						<div class="form-group">
							<label for="stock">Stock</label>
							<input type="number" name="stock" class="form-control stock" id="stock">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary update">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable()

			$('.edit-data').click(function() {
				$('.id').val($(this).data('id'));
				$('.code').val($(this).data('code'));
				$('.name').val($(this).data('name'));
				$('.price').val($(this).data('price'));
				$('.stock').val($(this).data('stock'));
			})

			$(".create").click(function() {
				// console.log()
				if ($('.names').val() === "") {
					alert("name is required")
				}else if ($('.prices').val() === "") {
					alert("price is required")
				} else if ($('.stocks').val() === "") {
					alert("stock is required")
				} else{
					$( "#formCreate" ).submit();
				}
			})

			$(".update").click(function() {
					$( "#formEdit" ).submit();
			})

			$(".delete").click(function() {
                $('.ids').val($(this).data('ids'));
				var cek = confirm("you are sure you want to delete this data?");
				if (cek == true) {
					$( "#delete" ).submit();
				}
			})


		} );
	</script>
</body>
</html>