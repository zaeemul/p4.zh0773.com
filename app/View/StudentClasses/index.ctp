<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Welcome to <?php echo Configure::read('Application.name') ?>
        <small>Available classes!</small></h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-12">
        <p style="text-align: right;">
            <?php echo $this->Html->link("Create Class", array('action' => 'add'),array('class' => 'btn btn-success')); ?>
        </p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created</th>
                <th>Last Modified</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($classes as $class): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($class['StudentClass']['title'],
                            array('action' => 'view', $class['StudentClass']['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $class['StudentClass']['created']);
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $class['StudentClass']['modified']);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            'Mark Attendance', array('action' => 'attendance', $class['StudentClass']['id'])
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?php echo $this->Html->link(
                            'Edit', array('action' => 'edit', $class['StudentClass']['id'])
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $class['StudentClass']['id']),
                            array('confirm' => 'Are you sure?'),
                            array('class' => 'btn btn-link')
                        );
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
