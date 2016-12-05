<?php
/**
 * A simple PHP MVC skeleton
 *
 * @package zaferoon
 * @author Ehsan Mokhtari
 * @link http://www.mokhi.ir
 * @link https://gitlab.com/ehsanm94/zaferoon
 * @license http://opensource.org/licenses/MIT MIT License
 */

/**
 * don't show errors in production
 */

// error_reporting(0);
// ini_set('display_errors', 0);

require __DIR__ . '/bootstrap/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';