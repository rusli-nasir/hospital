
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-bordered box-color">
				<div class="box-title">
					<h3>
						<i class="fa fa-search"></i>
						Filter
					</h3>
				</div>
				<div class="box-content">
					<div class="row">
						<div class="col-sm-4">
							<label>Jenis Biaya</label>
							<select class="form-control" name="id_anggaran"  id="id_anggaran" data-datatable-filter="true" data-datatable-id='<?=$id_table?>'>
								<?php foreach($id_anggaran as $f) { ?>
									<option value="<?=$f['id']?>"><?=$f['nama_anggaran']?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-2">
							<label>Action</label>
							<button onclick="modal_objek()" class='btn btn-danger form-control' type='button'><i class='fa fa-pdf-o'></i> Cetak ke PDF</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-bordered box-color">
				<div class="box-title">
					<h3>
						<i class="fa fa-table"></i>
						<?=$title?>
					</h3>
				</div>
				<div class="box-content nopadding">
					<table id="<?=$id_table?>" class="table table-hover table-nomargin table-striped table-bordered" 
					data-plugin="datatable-server-side" 
					data-datatable-list="<?=$datatable_list?>"
					data-datatable-colvis="true"
					data-datatable-autorefresh="true"
					data-datatable-daterange="true"
					data-datatable-nocolvis=""
					>
						<thead>
							<tr>
								<th data-datatable-align="text-center" style="width:50px;">No.</th>
								<th data-datatable-align="text-left">Tgl</th>
								<th data-datatable-align="text-left">No. BKU</th>
								<th data-datatable-align="text-left">Uraian</th>
								<th data-datatable-align="text-left">Belanja LS</th>
								<th data-datatable-align="text-left">Belanja Gu</th>
								<th data-datatable-align="text-left">Belanja TUP</th>
								<th data-datatable-align="text-left">Saldo</th>
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
<?=$load_form?>
<script>
$('select').select2();
function modal_objek(){
	$('#tgl1').val($("#rincian_objek_daterange1").val());
	$('#tgl2').val($("#rincian_objek_daterange2").val());
	$('#form_id_anggaran').val($("#id_anggaran").val());
	$('#modal_<?=$id_table?>').modal('show');
}
function pdf(){
	var d1=$("#rincian_objek_daterange1").val();
	var d2=$("#rincian_objek_daterange2").val();
	var tgl1=d1.split("/");
	var tgl2=d2.split("/");
	var t1=tgl1[2]+"-"+tgl1[1]+"-"+tgl1[0]+" 00:00:00";
	var t2=tgl2[2]+"-"+tgl2[1]+"-"+tgl2[0]+" 23:59:59";
	var id_anggaran = $("#id_anggaran").val();

	window.open('<?=base_url()?>rincian_objek/pdf_buku_rincian_objek?id_anggaran='+id_anggaran+'&tgl1='+t1+'&tgl2='+t2);
}		
</script>
