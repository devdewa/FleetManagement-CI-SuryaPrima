<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

A PHP Error was encountered

Severity:    <?php echo  output($severity), "\n"; ?>
Message:     <?php echo  output($message), "\n"; ?>
Filename:    <?php echo  output($filepath), "\n"; ?>
Line Number: <?php echo  output($line); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach (debug_backtrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo  output($error['file']), "\n"; ?>
	Line: <?php echo  output($error['line']), "\n"; ?>
	Function: <?php echo  output($error['function']), "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
