<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Simple CRUD</title>
  <link rel='stylesheet prefetch' href='{{ asset("css/app.css") }}'>
  <link rel='stylesheet prefetch' href='{{ asset("css/toastr.css") }}'>
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <link rel='stylesheet prefetch' href='{{ asset("css/datatables.css") }}'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ url('/') }}"><h2>Simple <b>CRUD</b></h2>
            </a>
          </div>
          <div class="col-sm-6">
            <a class="btn btn-success btn-add"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
          </div>
        </div>
      </div>