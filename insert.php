<html>
    <head>
    <title> Ajax Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="jquery.min.js"> </script>
<style>
#modal 
{
background: rgba(0,0,0,0.7);
position: fixed;
left: 0;
top: 0;
width: 100%;
height: 100%;
z-index: 100;
display: none;
}
#modal-form 
{
background: white;
width: 30%;
position: relative;
top: 20%;
margin-left: 30%;
margin-bottom: 200px;
border: 1px solid black;
}
#close-btn 
{
background: red;
color: white;
width: 30px;
font-size: 24px;
text-align: center;
height: 30px;
position: absolute;
cursor: pointer;

}

</style>
</head>
<body>

<div class="container">

<h3> Ajax Crud Operation </h3> <br>


<form id="insertform" class="form-inline" autocomplete="off">

<div class="form-group">
    <label> Name </label>
    <input type="text" id="name" class="form-control" >
</div>
&nbsp; &nbsp;
<div class="form-group">
    <label> Username </label>
    <input type="text" id="username" class="form-control" >
</div>
&nbsp; &nbsp;
<div class="form-group">
    <label> Password </label>
    <input type="text" id="password" class="form-control" >
</div>
&nbsp; &nbsp;
  <button type="submit" value="submit" id="insertbtn" class="btn btn-primary">Submit</button>

</form>

</div>


<div class="container">

<div id="searchdata">
Search Data Here : <input type="text" id="search" autocomplete="off">
</div>
<br>

<table id="list" border="1">  
</table>
</div>

<div id="modal">
    <div id="modal-form" style="padding: 10px;">
    <div id="close-btn"> x </div>
    <br>
<h2> Edit Data </h2>
<table>

</table>
</div>
</div>
<script type="text/javascript"> 

$(document).ready(function(){

function dataload(){

$.ajax({

url: 'datalist.php',
type: 'post',
success: function(data)
{
    $("#list").html(data);
}
})
} 

dataload();

// click to submit btn 

$("#insertbtn").on("click",function(e){

// using jquery store data in variable
e.preventDefault();

var name = $("#name").val();
var user = $("#username").val();
var pass = $("#password").val();

//alert(name);

// ajax code start
$.ajax({

    url: "insertajax.php",
    type: "POST",
    data: {name:name,username:user,password:pass}, // var store in name
    success:function(data){

if(data == 'success')
{
        // form field reset
        // ----------------------------------
        $("#name").val("");
        $("#username").val("");
        $("#password").val("");
  
        dataload();
     
// or
// using form id

//$('#insertform').trigger('reset');

// -----------------------------------------

     alert('data insert successfully');
}
else
{
     alert('data insert failed');
}
}

});

});


// delete code start
// click to dlt btn

$(document).on("click",".dltbtn", function(){

var id = $(this).data('id');

$.ajax({

url: "deleteajax.php",
type: "POST",
data: {id:id},
success:function(data){

if(data == 'success')
{
    alert('data delete successfully');
    dataload();
}
}
})

});

// delete code over

// edit start

//open modal
$(document).on("click",".edtbtn", function(){

$("#modal").show();

var id = $(this).data('id');

$.ajax({

url: "editajax.php",
type: "POST",
data: {id:id},
success: function(data)
{

$("#modal-form table").html(data);
    
}

})

});

// update modal
$(document).on("click","#update", function(e){

    e.preventDefault();

    var id = $("#eid").val();
    var name = $("#ename").val();
var user = $("#eusername").val();
var pass = $("#epassword").val();

$.ajax({

url: "updateajax.php",
type: "POST",
data: {id:id,name:name,username:user,password:pass}, // var store in name
success:function(data){

if(data == 'success')
{
  
    $("#modal").hide();

    dataload();

 alert('data update successfully');
}
else
{
 alert('data update failed');
}
}

});

});

// close modal

$("#close-btn").on("click",function(){

    $("#modal").hide();

});

// live search

$("#search").on("keyup",function(){

var search = $(this).val();

$.ajax({

    url: 'search.php',
    type: 'POST',   
    data: {search:search},
    success: function(data){
        $("#list").html(data);
    }

});


});

});

</script>
</body>
</html>