<h1>Logged in</h1>

<?php

print_r($this->session->all_userdata());

echo "<a href='".base_url()."index.php/start/logout'>Log out</a>";