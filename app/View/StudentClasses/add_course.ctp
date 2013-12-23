<div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Add Course to <?php echo $class['StudentClass']['title']?></h1>
        </div>
</div>
<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create("ClassesCourse"); ?>

        <div class="form-group required">
            <?php echo $this->Form->input("course_id",
                array('class' => 'form-control', 'label'=> 'Select Course'));?>
        </div>
        <?php echo $this->Form->input('class_id', array('type' => 'hidden', 'value'=> $class['StudentClass']['id'])); ?>

        <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>
</div>
