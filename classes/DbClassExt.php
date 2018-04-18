<?php

class DbClassExt extends DbClass {

 public function insertArray(array $data = []) {
  $keys = array_keys($data);
  $amountValues = count($data[$keys[0]]);
  for ($i = 0; $i < $amountValues; $i++) {
   $tmp = [];
   for ($j = 0; $j < count($keys); $j++) {
    $tmp[$keys[$j]] = $data[$keys[$j]][$i];
   }
   $this->insert($tmp);
  }
 }

}
