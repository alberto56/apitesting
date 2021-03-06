<?php
/**
 * @file
 * A page request to the frontend.
 */

require_once('src/Frontend.php');
require_once('../common/src/EnvSettings.php');
if (EnvSettings::get('frontend', 'backend_type') == 'fake') {
  require_once('src/FakeBackend.php');
  $backend = new FakeBackend();
}
else {
  require_once('src/RealBackend.php');
  $backend = new RealBackend();
}
$frontend = new Frontend($backend);
echo $frontend->getPage($_POST);
