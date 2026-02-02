<!DOCTYPE html>
<html>
<head>
  <title><?= $this->renderSection('title') ?></title>
	<?=view('includes/header.php')?>
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?=view('includes/navbar.php')?>
		<?=view('includes/sidebar.php')?>
		<div class="content-wrapper">
			<div class="content-header">
        <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $this->renderSection('headingTitle') ?></h1>
          </div><!-- /.col -->
          <?= $this->renderSection('breadcumbs') ?><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
			  <?= $this->renderSection('content') ?>
      </div>
    </section>
		</div>
	</div>
	<?=view('includes/footer.php')?>
  <?= $this->renderSection('jsContent') ?>
</body>
</html>