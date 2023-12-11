<?php
  $baseRepo = 'https://srmcgann.github.io/000deploy';
  $list = file_get_contents("$baseRepo/list.txt");
  $rows = explode("\n", $list);
  $ct = 0;
  forEach($rows as $row){
    $ar = explode(' ', $row);
    if(sizeof($ar)){
      switch(strtolower($ar[0])){
        case 'dir':
          array_shift($ar);
          $dir = implode(' ', $ar);
          @mkdir("..$dir");
          break;
        case 'file':
          array_shift($ar);
          $file = implode(' ', $ar);
          $f = "$baseRepo/deploy$file";
          echo "attempting download of... $f\n";

          echo "attempting write to -> " . "..$file\n";
          $s = file_get_contents("$baseRepo/deploy$file");
          echo "file contents: $s\n"; 
          @file_put_contents("..$file", $s);
          break;
      }
      $ct++;
    }
  }
  echo "\n\ndone\n\n";
  
?>