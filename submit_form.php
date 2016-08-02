<?php
  include_once("array_to_xml.php");
  include_once("utils.php");

  // creating object of SimpleXMLElement
  // function call to convert array to xml
  $xml = Array2XML::createXML('application', $_POST);
  $out = $xml->saveXML();

  $name = $_POST['status']['email'];
  $name = sanitizeFileName($name);
  $dir = "uploads/" . $name;

  if(!file_exists($dir))
    mkdir($dir, 0744, true);

  $attachment = $_FILE['attachment'];
  if (isset($attachment)) {
    handleFileUpload($attachment, $dir);
  }

  $xml_name = $dir . '/submission.xml';
  file_put_contents($xml_name, $out);

?>
