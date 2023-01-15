#!/bin/php
<?php

function validatePassword(array $chars): bool
{
  if (count($chars) < 8) {
    return false;
  }
  
  $isLargeLetter = false;
  $isSmallLetter = false;
  $isNumber = false;
  $isSpecialChar = false;
  foreach($chars as $char) {
    $charAsciiNo = ord($char);
    
    if ($charAsciiNo >= 65 && $charAsciiNo <= 90) {
      $isLargeLetter = true;
    } elseif ($charAsciiNo >= 97 && $charAsciiNo <= 122) {
      $isSmallLetter = true;
    } elseif (is_numeric($char)) {
      $isNumber = true;
    } else {
      $isSpecialChar = true;
    }
  }
  
  return $isLargeLetter && $isSmallLetter && $isNumber && $isSpecialChar;
}

function generateSafePassword(): string
{
  $chars = [];
  for ($i = 0; $i < 20; $i++) {
    if (rand(0, 1) === 0) {
      $chars[] = chr(rand(65, 122));
    } else {
      $chars[] = rand(0, 9);
    }
  }
  
  if (!validatePassword($chars)) {
    return generateSafePassword();
  }
  
  return implode('', $chars);
}

echo generateSafePassword() . PHP_EOL;
