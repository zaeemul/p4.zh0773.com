<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $class['StudentClass']['title']?>'s Details
        <small>Everything about a class!</small></h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Current Students</h3>
        <p style="text-align: right;">
            <?php echo $this->Html->link("Add New Student",
                array('controller' => 'students','action' => 'add',$class['StudentClass']['id']),
                array('class' => 'btn btn-success')); ?>
        </p>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($class['Student'] as $student): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($student['first_name'] . ' ' . $student['last_name'],
                            array('controller' => 'students','action' => 'view', $student['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                    </td>
                    <td>
                        <?php echo $student['email'];
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $student['created']);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            'Edit', array('controller' => 'students','action' => 'edit', $student['id'])
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('controller' => 'students','action' => 'delete', $student['id']),
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

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Current Courses</h3>
        <p style="text-align: right;">
            <?php echo $this->Html->link("Add New Course",
                array('action' => 'add_course',$class['StudentClass']['id']),
                array('class' => 'btn btn-success')); ?>
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
            foreach ($class['Course'] as $course): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($course['title'],
                            array('action' => 'view', $course['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                    </td>
                    <td>
                        <?php echo $course['description'];
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $course['ClassesCourse']['created']);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            'Add Grades', array('action' => 'add_grades', $course['ClassesCourse']['id'])
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete_course',
                                $course['ClassesCourse']['id'],
                                $class['StudentClass']['id']),
                            array('confirm' => 'Are you sure to remove this course?'),
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