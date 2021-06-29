<?php
session_start();
unset($_SESSION["session_id"]);
unset($_SESSION["user"]);
header("Location: ../index.php");
