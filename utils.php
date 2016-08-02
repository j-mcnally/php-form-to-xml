<?php
  function sanitizeFileName($dangerous_filename, $platform = 'Unix') {
    if (in_array(strtolower($platform), ['unix', 'linux'])) {
      $dangerous_characters = [" ", '"', "'", "&", "/", "\\", "?", "#"];
    }
    else {
        return $dangerous_filename;
    }
    return str_replace($dangerous_characters, '_', $dangerous_filename);
  }

  function handleFileUpload($file, $name) {
    $info = pathinfo($file);
    $ext = $info['extension']; // get the extension of the file
    $fname = $info['basename'];

    $types = ['doc', 'docx', 'pdf', 'txt'];

    if (!in_array($ext, $types)) {
      die("Invalid file type.");
    }

    $target = $dir . '/' . $fname;
    move_uploaded_file($file, $target);
  }

?>
