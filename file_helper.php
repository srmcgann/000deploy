<?php
  @mkdir("full");
  $newFile = <<<'FILE'
<!DOCTYPE html>
<html>
...
</html>
FILE;
  file_put_contents('full/index.html', $newFile);
?>