<?php
  header('Content-Type: application/jsont; charset=utf-8');
  echo json_encode(array('time' => date('G:i')));
