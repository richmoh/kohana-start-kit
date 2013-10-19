<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-10-15 04:16:03 --- EMERGENCY: ErrorException [ 2 ]: preg_match(): Compilation failed: unmatched parentheses at offset 56 ~ SYSPATH/classes/Kohana/Route.php [ 423 ] in file:line
2013-10-15 04:16:03 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'preg_match(): C...', '/Users/richardm...', 423, Array)
#1 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Route.php(423): preg_match('#^(?:(?P<action...', 'index', NULL)
#2 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(466): Kohana_Route->matches(Object(Request))
#3 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(938): Kohana_Request::process(Object(Request), Array)
#4 /Users/richardmohammed/projects/personal/kohana-start-kit/index.php(118): Kohana_Request->execute()
#5 {main} in file:line
2013-10-15 04:16:08 --- EMERGENCY: ErrorException [ 2 ]: preg_match(): Compilation failed: unmatched parentheses at offset 56 ~ SYSPATH/classes/Kohana/Route.php [ 423 ] in file:line
2013-10-15 04:16:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'preg_match(): C...', '/Users/richardm...', 423, Array)
#1 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Route.php(423): preg_match('#^(?:(?P<action...', 'start', NULL)
#2 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(466): Kohana_Route->matches(Object(Request))
#3 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(938): Kohana_Request::process(Object(Request), Array)
#4 /Users/richardmohammed/projects/personal/kohana-start-kit/index.php(118): Kohana_Request->execute()
#5 {main} in file:line
2013-10-15 04:16:18 --- EMERGENCY: ErrorException [ 2 ]: preg_match(): Compilation failed: unmatched parentheses at offset 51 ~ SYSPATH/classes/Kohana/Route.php [ 423 ] in file:line
2013-10-15 04:16:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'preg_match(): C...', '/Users/richardm...', 423, Array)
#1 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Route.php(423): preg_match('#^(?P<action>[^...', 'start', NULL)
#2 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(466): Kohana_Route->matches(Object(Request))
#3 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(938): Kohana_Request::process(Object(Request), Array)
#4 /Users/richardmohammed/projects/personal/kohana-start-kit/index.php(118): Kohana_Request->execute()
#5 {main} in file:line
2013-10-15 10:13:56 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Cookie.php:67
2013-10-15 10:13:56 --- DEBUG: #0 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('_ga', NULL)
#1 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('_ga')
#2 /Users/richardmohammed/projects/personal/kohana-start-kit/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Cookie.php:67
2013-10-15 10:33:06 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Cookie.php:67
2013-10-15 10:33:06 --- DEBUG: #0 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('_ga', NULL)
#1 /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('_ga')
#2 /Users/richardmohammed/projects/personal/kohana-start-kit/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /Users/richardmohammed/projects/personal/kohana-start-kit/system/classes/Kohana/Cookie.php:67