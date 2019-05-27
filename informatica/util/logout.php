<?php
session_start();
$_SESSION['nome'] = null;
session_unset();
session_destroy();
session_abort();
header("Location: ../index.php");