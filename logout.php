<?php

require 'helpers.php';

unset($_SESSION['user']);

header('Location: index.php');
