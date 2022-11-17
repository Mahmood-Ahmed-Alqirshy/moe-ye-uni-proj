<?php

namespace UsefullClass {

  class Done
  {

    public static function getSession()
    {
      if (isset($_SESSION['session_id']))
        return $_SESSION['session_id'];
      if (count($_COOKIE) > 0 && isset($_COOKIE['session_id'])) {
        $_SESSION['session_id'] = $_COOKIE['session_id'];
        return $_SESSION['session_id'];
      }
      return '';
    }
    public static function setSession($session_id)
    {
      $_SESSION['session_id'] = $session_id;
      if (count($_COOKIE) > 0)
        $_COOKIE['session_id'] = $session_id;
    }
    // the table must contain session_id column
    public static function checkLogin(\PDO $dataBaseConnection, $tableName, $ifFoundURL)
    {
      $nameQuery = $dataBaseConnection->prepare("select session_id from $tableName where session_id = ?;");
      $nameQuery->execute([Done::getSession()]);
      if (count($nameQuery->fetchAll()) > 0) {
        header("location: " . $ifFoundURL);
        die();
      }
    }
    public static function query(\PDO $dataBaseConnection, $sqlStatement, ...$param)
    {
      $nameQuery = $dataBaseConnection->prepare($sqlStatement);
      if (count($param) === 1 && is_array($param[0]))
        $nameQuery->execute([...$param[0]]);
      else
        $nameQuery->execute($param);
      return $nameQuery->fetchAll();
    }
    public static function uploadFile($file, array $allowedExtensions, $maxSize, $MIMEType, $storingDir)
    {
      $ext = explode('.', $file['name']);
      $extension = strtolower(end($ext));
      if (
        $file['error'] <= 0
        && (($MIMEType !== "") ? (strpos($file['type'], $MIMEType) !== false) : true)
        && $file['size'] <= $maxSize
        && (($allowedExtensions !== []) ? in_array($extension, $allowedExtensions) : true)
      ) {
        $newName = uniqid('', true) . '.' . $extension;
        $fileDir = $storingDir . $newName;
        move_uploaded_file($file['tmp_name'], $fileDir);
        return $newName;
      } else {
        return null;
      }
    }
    public static function downloadFile($fileDir, $fullFileName, $file)
    {
      $fileExtension = explode('.', $fullFileName);
      $fileExtension = strtolower(end($fileExtension));
      $fileName = explode('.', $fullFileName);
      array_pop($fileName);
      $fileName = implode('.', $fileName);
      header('Content-Type: application/download');
      header('Content-Disposition: attachment; filename="' . $fileName . $fileExtension . '"');
      header("Content-Length: " . filesize($fileDir . $fileName . $fileExtension));
      $fp = fopen($fileDir . $fileName . $fileExtension, "r");
      fpassthru($fp);
      fclose($fp);
    }
    // $sqlStatement must contain ? in the place of the username and pass word and the user name must be before the password 
    // the $sqlStatement must return session_id column
    public static function signIn(\PDO $dataBaseConnection, $sqlStatement, $username, $password, $rememberMe, $onSuccessURL)
    {
      if ($username && $password) {
        $getSesstion = $dataBaseConnection->prepare($sqlStatement);
        $getSesstion->execute([$username, $password]);
        $returnedData = $getSesstion->fetch();
        if ($returnedData) {
          $_SESSION['session_id'] = $returnedData->session_id;
          if (count($_COOKIE) > 0 && $rememberMe)
            setcookie('session_id', $returnedData->session_id, time() + 3600 * 24 * 365, '/');
          header("location: $onSuccessURL");
          die();
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }
    public static function signOut($toGoAfterURL)
    {
      $_SESSION['session_id'] = null;
      if (count($_COOKIE) > 0 && isset($_COOKIE['session_id']))
        setcookie('session_id', $_SESSION['session_id'], time() - 3600 * 24 * 365, '/');
      header("location: $toGoAfterURL");
      die();
    }
  }
  class MIME_TYPES
  {
    const VIDEO = 'video';
    const IMAGE = 'image';
    const PDF = 'application/pdf';
  }
}
