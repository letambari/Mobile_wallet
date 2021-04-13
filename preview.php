<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Search HTML Table Data by using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">JSON Live Data Search using Ajax JQuery</h2>
   <h3 align="center">Employee Data</h3>   
   <br /><br />
   <div align="center">
    <input type="text" name="find" id="find" placeholder="Search Employee Details" class="form-control" />
   </div>
   <ul class="list-group" id="result"></ul>
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#find').keyup(function(){
  $('#result').html('');
  $('#state').val('');
  var searchField = $('#find').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('country_code.json', function(data) {
   $.each(data, function(key, value){
    if (value.code.search(expression) != -1 || value.name.search(expression) != -1)
    {
     $('#result').append('<li class="list-group-item link-class"><img src="'+value.img+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.code+'</span></li>');
    }
   });   
  });
 });
 
 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#find').val($.trim(click_text[0]));
  $("#result").html('');
 });
});
</script>