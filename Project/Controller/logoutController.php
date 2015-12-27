<?php
/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 27/12/15
 * Time: 17:56
 */

session_start();
session_destroy();
header("Location: login");