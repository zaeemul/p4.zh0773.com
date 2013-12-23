<div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Create Class</h1>
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
        <button type="submit" class="btn btn-primary">Add Class</button>
        </form>
    </div>
</div>
