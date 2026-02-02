<!DOCTYPE html>
<html>

<head>
    <title>
        <?= $this->renderSection('title') ?>
    </title>
    <?=view('includes/student_header.php')?>
    <?= $this->renderSection('seoSection') ?>
</head>

<body>
    <div class="wrapper">
        <?=view('includes/student_navbar.php')?>
        <?= $this->renderSection('content') ?>
    </div>
    <?=view('includes/student_footer.php')?>
    <?= $this->renderSection('jsContent') ?>
</body>

</html>