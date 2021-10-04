<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?=$title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="final project by pertiwi team" name="description" />
  <meta content="Pertiwi Team" name="author" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- App css -->
  <link href="<?=assets_dashboard() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <link href="<?=assets_dashboard() ?>css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="<?=assets_dashboard() ?>css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard() ?>css/style.css" rel="stylesheet" type="text/css" />

  <style>
    .tableHideToggle {
      border-left: 3px solid transparent;
    }
    .tableHideToggle.active {
      border-color: #333;
    }
    .tableHide {
      display: block;
      cursor: pointer;
    }
    .tableHide.hidden {
      display: none !important;
    }
    .sticky-top {
      z-index: 1 !important;
    }
  </style>


</head>

<body>