<div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Edit Class Detail</h1>
        </div>
</div>
<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create("StudentClass"); ?>

        <div class="form-group required">
            <?php echo $this->Form->input("title",
                array('class' => 'form-control',
                    'placeholder' => 'Title'));?>
        </div>
        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
        <button type="submit" class="btn btn-primary">Update Details</button>
        </form>
    </div>
</div>
