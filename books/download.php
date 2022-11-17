<?php
if (isset($_GET['book'])) {
  header('Content-Type: application/download');
  header('Content-Disposition: attachment; filename="' . $_GET['book'] . '.pdf' . '"');
  header("Content-Length: " . filesize("books/" . $_GET['book'] . ".pdf"));
  $fp = fopen("books/" . $_GET['book'] . ".pdf", "r");
  fpassthru($fp);
  fclose($fp);
}
