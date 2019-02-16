<h3>Login Form</h3>
<?php $attributes = array('id' => 'login_form', 'class' => 'form-horizontal'); ?>
<?php echo form_open('user/login', $attributes); ?> 
<!-- parameter 1 : controller, parameter 2 : data -->

<!-- USERNAME -->
<p>
    <?php echo form_label('Username:'); ?>
    <?php 
    $data = array(  'name' => 'username', 
                    'placeholder' => 'Enter Username',
                    'style' => 'width:90%',
                    'value' => set_value('username'));
    ?>
    <?php echo form_input($data); ?>

</p>

<!-- PASSWORD -->
<p>
    <?php echo form_label('Password:'); ?>
    <?php 
    $data = array(  'name' => 'password', 
                    'placeholder' => 'Enter Password',
                    'style' => 'width:90%',
                    'value' => set_value('password'));
    ?>
    <?php echo form_password($data); ?>
</p>

<!-- SUBMIT -->
<p>
    <?php 
    $data = array(  'name' => 'submit', 
                    'class' => 'btn btn-primary',
                    'value' => 'Login');
    ?>
    <?php echo form_submit($data); ?>
</p>

<?php echo form_close(); ?>