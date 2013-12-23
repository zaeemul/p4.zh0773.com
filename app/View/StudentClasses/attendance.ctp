<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $class['StudentClass']['title']?>'s Attendance</h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create("Attendance"); ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Attendance</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($class['Student'] as $key =>  $student): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($student['first_name'] . ' ' . $student['last_name'],
                            array('action' => 'view', $student['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                        <?php echo $this->Form->input('Attendance.'.$key.'.student_id',
                            array('type'=>'hidden', 'value'=>$student['id'])); ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('Attendance.'.$key.'.status', array(
                            'label' => false,
                            'div' => false,
                            'class' => 'form-control',
                            'style' => 'width:30%;',
                            'type' => 'select',
                            'options' => array(
                                'Present' => 'Present',
                                'Absent' => 'Absent',
                            ),
                        ));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Mark Attendance</button>
        <button type="button" class="btn btn-danger" onclick="window.history.back();">Cancel</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

