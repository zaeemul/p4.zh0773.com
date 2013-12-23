<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manage Courses</h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-12">
        <p style="text-align: right;">
            <?php echo $this->Html->link("Create Course", array('action' => 'add'),array('class' => 'btn btn-success')); ?>
        </p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($course['Course']['title'],
                            array('action' => 'view', $course['Course']['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                    </td>
                    <td>
                    <?php echo $course['Course']['description'];
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $course['Course']['created']);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            'Edit', array('action' => 'edit', $course['Course']['id'])
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $course['Course']['id']),
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
