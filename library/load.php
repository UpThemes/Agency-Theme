<?php

// Load some basic init stuff
include_once("theme-setup.php");

// Load some basic init stuff
include_once("init.php");

include_once("meta_handler.php");

// Load Theme Custom Post Types
include_once("theme-cpt.php");

// Load Theme Custom Post Types To Handle Slides
include_once("slides.php");

// Load Theme Options
include_once("theme-options.php");

// Load Breadcrumb function
include_once("breadcrumbs.php");

// Load some utility theme specific functions
include_once("utility-functions.php");

// Load comments callback
include_once("comments-callback.php");

// Load Theme Specific Widgets
include_once("widgets/load.php");

// Pass the Sass
include_once("pass-the-sass.php");