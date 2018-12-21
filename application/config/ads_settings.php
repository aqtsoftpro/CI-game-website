<?php
defined("BASEPATH") OR exit("No direct script access allowed");
$config["sidebartop"] = '';
$config["sidebarbottom"] = '<script type="text/javascript" charset="utf-8">

  var pageOptions = {
    "pubId": "pub-9616389000213823", // Make sure this the correct client ID!
    "query": "cars",
    "adPage": 1
  };

  var adblock1 = {
    "container": "afscontainer1",
    "width": "300",
    "number": 3
  };

  _googCsa(\'ads\', pageOptions, adblock1);

</script>';
$config["sidebarcontent"] = '';
?>