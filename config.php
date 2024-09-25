// config.php

<?php include 'path/to/config.php'; ?>

<?php
$company_tagline = "Empowering Innovation";
$company_description = "ThinkWood is a company that specializes in providing innovative solutions for businesses.";
$about_us = "ThinkWood was founded in 2020 with a mission to empower innovation and make a positive impact on the world.";
$team_members = array(
    array(
        'image' => 'image1.jpg',
        'name' => 'John Doe',
        'position' => 'CEO'
    ),
    array(
        'image' => 'image2.jpg',
        'name' => 'Jane Doe',
        'position' => 'CTO'
    ),
    // Add more team members here
);
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>