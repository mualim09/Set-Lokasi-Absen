<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Setting Parameter</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url();?>apps/home">Home</a></li>
					<li class="breadcrumb-item active">Setting Parameter</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<?php $this->load->view('apps/a_v_parameter/tab'); ?>
		<div class="card card-info card-outline">
			<div class="card-body">
				<form id="index1" name="form1">
					<h5><b><?php echo $groups; ?></b></h5>
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="text-center span1">pilih</th>
									<th class="text-center span1">no</th>
									<th class="span2">parameter_kode</th>
									<th>nama</th>
								</tr>
							</thead>
							<tbody id="view_data">

							</tbody>
						</table>
					</div>
				</form>
				<div id="coba"></div>

			</div>
		</div>
	</div>
</section>
<script type="text/javascript">

	var main = "<?php echo base_url(); ?>apps/a_c_parameter/views/?groups=<?php echo $this->input->get('groups') ? $this->input->get('groups') : 'USER'; ?>";

	func_view();

	function func_view(){
		Pace.restart();
		$("#view_data").html(loading_tabel);
		var string = $("#index1").serialize();
		$.ajax({
			type	: 'POST',
			url		: main,
			data	: string,
			cache	: false,
			success	: function(data){
				$("#view_data").html(data);
			}
		});
	}

	function pilih(groups,name,op){
		$('#coba').html(loading_tabel);
		$.ajax({
			type	: 'POST',
			url		: "<?php echo base_url(); ?>apps/a_c_parameter/tampil/?g="+groups+"&n="+name,
			cache	: false,
			success	: function(data){
				$('#coba').html(data);
				document.form_parameter.op.value=op;
				if(op=="tambah"){
					$(".btn-cek").addClass("btn-primary");
				}else if(op=="ubah"){
					$(".btn-cek").addClass("btn-warning");
				}else{
					$(".btn-cek").addClass("btn-danger");
				}
				$(".btn-keterangan").html(op);
			}
		});
	}

	function pilih2(offset,groups,name,op){
		$('#coba').html(loading_tabel);
		$.ajax({
			type	: 'POST',
			url		: "<?php echo base_url(); ?>apps/a_c_parameter/tampil/?g="+groups+"&n="+name,
			cache	: false,
			success	: function(data){
				$('#coba').html(data);
				document.form_parameter.op.value=op;
				if(op=="tambah"){
					$(".btn-cek").addClass("btn-primary");
				}else if(op=="ubah"){
					$(".btn-cek").addClass("btn-warning");
				}else{
					$(".btn-cek").addClass("btn-danger");
				}
				document.form_parameter.id.value=$("#form2_id"+offset).val();
				document.form_parameter.idLama.value=$("#form2_id"+offset).val();
				document.form_parameter.description.value=$("#form2_description"+offset).val();;
				document.form_parameter.notes.value=$("#form2_notes"+offset).val();;
				$(".btn-keterangan").html(op);
			}
		});
	}

</script>