<?php
session_name("Authentication");
session_start();
session_unset();
session_destroy();
header("Location: /");