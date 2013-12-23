<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manage Students</h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-12">
        <p style="text-align: right;">
            <?php echo $this->Html->link("Create Student", array('action' => 'add'), array('class' => 'btn btn-success')); ?>
        </p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Class</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($student['Student']['first_name'] . ' ' . $student['Student']['last_name'],
                            array('action' => 'view', $student['Student']['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                    </td>
                    <td>
                        <?php echo $student['Student']['phone'];
                        ?>
                    </td>
                    <td>
                        <?php echo $student['Student']['email'];
                        ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($student['Class']['title'],
                            array('controller' => 'student_classes', 'action' => 'view', $student['Class']['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $student['Student']['created']);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            'Edit', array('action' => 'edit', $student['Student']['id'])
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $student['Student']['id']),
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
