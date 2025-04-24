<?php

$is_admin = true;

echo $is_admin ? 'Welcome, Admin' : 'Welcome, Guest';

$age = 18;

echo '<br>';

$is_adult = $age >= 18 ? 'yes you are adult' : 'you are not';

echo $is_adult;
