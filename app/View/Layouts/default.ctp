<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php echo $title_for_layout; ?> - <?php echo Configure::read('Application.name') ?>
    </title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css(array('bootstrap', 'modern-business', '../font-awesome/css/font-awesome.min')); ?>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"><?php echo Configure::read('Application.name') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
            <?php echo
            $this->Html->link(Configure::read('Application.name'),
                array('controller' => 'student_classes', 'action' => 'index'),
                array('class' => 'navbar-brand')); ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($this->Session->check('User.id')) {
                    ?>
                    <li>
                        <?php echo $this->Html->link('Classes', '/student_classes') ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Courses', '/courses') ?>
                    </li>
                    <li class="dropdown">
                        <a href="/students/" class="dropdown-toggle" data-toggle="dropdown">Students
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo $this->Html->link('View Students', '/students') ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add Student', '/students/add') ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Logout', '/users/logout') ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</div>
<!-- /.container -->

<div class="container">

    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <?php echo Configure::read('Application.name') ?> <?php echo date('Y'); ?></p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- JavaScript -->
<?php echo $this->Html->script(array('jquery-1.10.2', 'bootstrap', 'modern-business')); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#grades").submit(function(){
            var value = $("#GradeTotalMarks").val();
            $(".update").val(value);
        });

    });
</script>

</body>
</html>
