#!/bin/php
<?php

function encodeAsBase64(string $string): string
{
	return base64_encode($string);
}

fscanf(STDIN, "%[^\n]", $input);

echo 'Base64: "' . encodeAsBase64($input) . '"' . PHP_EOL;
