<?php
/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 27/12/15
 * Time: 17:56
 */
require_once "../model/AuthenticateSession.php";

session_start();
session_destroy();
header("Location: login");