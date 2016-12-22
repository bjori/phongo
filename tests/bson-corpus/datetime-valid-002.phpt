--TEST--
DateTime: positive ms
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('10000000096100C4D8D6CC3B01000000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"a" : {"$date" : "2012-12-24T12:15:30.500Z"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"a" : {"$date" : {"$numberLong" : "1356351330500"}}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000096100c4d8d6cc3b01000000
{"a":{"$date":{"$numberLong":"1356351330500"}}}
{"a":{"$date":{"$numberLong":"1356351330500"}}}
{"a":{"$date":{"$numberLong":"1356351330500"}}}
10000000096100c4d8d6cc3b01000000
10000000096100c4d8d6cc3b01000000
===DONE===