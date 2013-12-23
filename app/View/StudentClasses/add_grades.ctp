<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $class['Course']['title']?>'s Grading -
            Class <?php echo $class['Class']['title']?></h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create("Grade", array('id'=>'grades')); ?>
        <div class="form-group required col-lg-5">
            <?php echo $this->Form->input("total_marks",
                array('class' => 'form-control'));?>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Marks</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($class['Class']['Student'] as $key =>  $student): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?></td>
                    <td><?php echo $this->Html->link($student['first_name'] . ' ' . $student['last_name'],
                            array('action' => 'view', $student['id']),
                            array('class' => 'btn btn-link'));
                        ?>
                        <?php echo $this->Form->input('Grade.'.$key.'.student_id',
                            array('type'=>'hidden', 'value'=>$student['id'])); ?>
                        <?php echo $this->Form->input('Grade.'.$key.'.classes_course_id',
                            array('type'=>'hidden', 'value'=>$class['ClassesCourse']['id'])); ?>
                        <?php echo $this->Form->hidden('Grade.'.$key.'.total_marks',
                            array('class'=>'update')); ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('Grade.'.$key.'.marks', array(
                            'label' => false,
                            'div' => false,
                            'class' => 'form-control',
                            'style' => 'width:30%;'
                        ));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Add Marks</button>
        <button type="button" class="btn btn-danger" onclick="window.history.back();">Cancel</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
