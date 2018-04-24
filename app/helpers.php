<?php
use App\User;

function setActive($path, $active = 'active')
{
    return Request::path() == $path ? $active : '';
}

function getStateClass($state){
  $class = '';
  switch ($state) {
    case 'Trabajando':
      $class = 'list-group-item-light';
      break;
    case 'Para la firma':
      $class = 'list-group-item-primary';
      break;
    case 'Finalizado':
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

function getCompleteName(User $user){
  return sprintf("%s L.P. N° %s %s, %s",
    $user->grado,$user->legajo,$user->apellido,$user->nombres);
}

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);   
}
