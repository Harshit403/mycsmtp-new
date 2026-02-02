<footer>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/adminlte.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/summernote-bs5.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/common.js?v=1.0.1"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		var baseUrl = "<?=base_url()?>";
		$("input[data-bootstrap-switch]").each(function() {
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		});
	</script>
</footer>