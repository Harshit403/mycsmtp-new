<!DOCTYPE html>
<html>

<head>
    <title>
        <?= $this->renderSection('title') ?>
    </title>
    <?=view('includes/header.php')?>
</head>

<body>
    <div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
    </div>
    <!-- Layout container -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?=view('includes/sidebar.php')?>
            <div class="layout-page">
                <!-- Navbar -->
                <?=view('includes/navbar.php')?>
                <!-- / Navbar -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=view('includes/footer.php')?>
    <?= $this->renderSection('jsContent') ?>
</body>

</html>