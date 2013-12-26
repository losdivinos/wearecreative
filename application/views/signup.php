<h1>Sign up</h1>

<?php

echo form_open('start/signup_validation');
echo validation_errors()."<br />";
echo form_input('email','','placeholder="Email..."');
echo form_input('username','','placeholder="Username..."');
echo form_password('password','','placeholder="Password..."');
echo form_password('password2','','placeholder="Password again..."');
echo form_submit('signup_submit','Sign up');
echo form_close();