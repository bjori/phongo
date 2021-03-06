--TEST--
MongoDB\BSON\toCanonicalExtendedJSON(): BSON decoding exceptions for malformed documents
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$tests = [
    pack('Vx', 4), // Empty document with invalid length (too small)
    pack('Vx', 6), // Empty document with invalid length (too large)
];

foreach ($tests as $bson) {
    echo throws(function() use ($bson) {
        toCanonicalExtendedJSON($bson);
    }, 'MongoDB\Driver\Exception\UnexpectedValueException'), "\n";
}

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\UnexpectedValueException
Could not read document from BSON reader
OK: Got MongoDB\Driver\Exception\UnexpectedValueException
Could not read document from BSON reader
===DONE===
