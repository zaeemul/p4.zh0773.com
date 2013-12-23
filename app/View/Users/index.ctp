<div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Login Credentials</h1>
        </div>
</div>
<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create("User"); ?>

        <div class="form-group required">
            <?php echo $this->Form->input("username",
                array('class' => 'form-control',
                    'placeholder' => 'Username'));?>
        </div>
        <div class="form-group required">
            <?php echo $this->Form->input("password",
                array('class' => 'form-control',
                    'placeholder' => 'Password'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Html->link(__('Forgot your password?'), array('controller' => 'home', 'action' => 'remember_password')) ?>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[User][remember_me]" value="S"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
