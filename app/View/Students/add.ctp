<div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Add Student Information</h1>
        </div>
</div>
<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create("Student"); ?>

        <div class="form-group required">
            <?php echo $this->Form->input("first_name",
                array('class' => 'form-control'));?>
        </div>

        <div class="form-group required">
            <?php echo $this->Form->input("last_name",
                array('class' => 'form-control'));?>
        </div>

        <div class="form-group required left">
            <label>Date Of Birth</label> <br/>
            <?php echo $this->Form->input("date_of_birth",
                array('class' => 'form-control left',
                 'style'=> 'width: 31%;display:inline',
                 'label'=> '',
                 'dateFormat' => 'DMY',
                     'minYear' => date('Y') - 70,
                     'maxYear' => date('Y') - 5 ));?>
        </div>

        <div class="form-group required">
            <?php echo $this->Form->input("phone",
                array('class' => 'form-control'));?>
        </div>

        <div class="form-group required">
            <?php echo $this->Form->input("email",
                array('class' => 'form-control'));?>
        </div>

        <div class="form-group required">
            <?php echo $this->Form->input("address",
                array('class' => 'form-control', 'label'=> 'Permanent Address'));?>
        </div>

        <div class="form-group required">
            <?php echo $this->Form->input("class_id",
                array('class' => 'form-control', 'label'=> 'Select Class'));?>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
</div>
