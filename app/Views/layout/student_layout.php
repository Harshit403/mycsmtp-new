<!DOCTYPE html>
<html lang="en" dir="ltr">

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
        <main role="main">
            <?= $this->renderSection('content') ?>
        </main>
    </div>
    <?=view('includes/student_footer.php')?>
    <?= $this->renderSection('jsContent') ?>

</body>

</html>