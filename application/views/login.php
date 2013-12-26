<h1>Login</h1>

<?php

echo form_open('start/login_validation');
echo validation_errors()."<br />";
echo form_input('email','','placeholder="Email..."');
echo form_password('password','','placeholder="Password..."');
echo form_submit('login_submit','Login');
echo form_close();

echo "<a href='".base_url()."index.php/start/signup'>Sign up</a>";