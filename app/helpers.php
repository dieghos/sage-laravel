<?php

function setActive($path, $active = 'active')
{
    return Request::path() == $path ? $active : '';
}

function getStateClass($state){
  $class = '';
  switch ($state) {
    case 'trabajando':
      $class = 'list-group-item-light';
      break;
    case 'para la firma':
      $class = 'list-group-item-primary';
      break;
    case 'finalizado':
      $class = 'list-group-item-success';
      break;
    default:
      $class = 'list-group-item-warning';
      break;
  }

  return $class;
}

function dateFormat($date)
{
  $time = strtotime($date);

  $newformat = date('d-m-Y',$time);

  return $newformat;
}
