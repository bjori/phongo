--TEST--
MongoDB\Driver\CursorID: var_export()
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$cursorId = unserialize('C:23:"MongoDB\Driver\CursorId":42:{a:1:{s:2:"id";s:19:"7250031947823432848";}}');

echo var_export($cursorId, true), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
MongoDB\Driver\CursorId::__set_state(array(
   'id' => '7250031947823432848',
))
===DONE===
