<html>
    <head>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <h1>Login form</h1>
<p id="message"></p>
<form method="POST">
Name: <input type="text"id="name" name="name" required><br><br>
phone: <input type="text"id="phone" name="phone" required><p id="msg"></p>
E-mail: <input type="text"id="email" name="email" required><p id="msg1"></p>
<input type="button" onclick="submitform();"name="submit"value="login">

</form>

</body>

<?php
function redirect($url)

{
    header('Location:'.$url);
    exit();
}
?>
<?php if(isset($_REQUEST['e']) && $_REQUEST['e'] == 3){ ?>
                                        <div align="center">
                                            <div style="color:#FF0000;">Something went wrong !</div>
                                        </div>
                                        <?php } ?>



<script type="text/javascript">
function submitform() 
{
    var name=$('input[name=name]').val();

    var phone=$('input[name=phone]').val();
    var email=$('input[name=email]').val();
    
if(name!="" && phone!="" && email!=""){

var formdata ={name : name, phone : phone, email : email};

  



$.ajax({ url:'db.php',
    type:'POST',
    data:formdata,
    success:function(response){
    var res = JSON.parse(response);
    console.log(res);
    if(res.success==true)
        $('#message').html('DATA SUBMITTED SUCESSFULL');
    else
        $('#message').html('DATA NOT SUBMITTED');
    
    }
});

}else{
    $('#message').html('Please fill all the fields properly');
}
      
}

$(document).ready(function () {

var id = $('#phone').val();
if (id){
    $.ajax({
        url: "ajax3.php",
        type: "GET",
        dataType: 'JSON',
        data: {
            "id" : id,
            
        },
        success: function(result){
            if(result.status){
                $("#msg").val('user already exit');
            }else {
                $("#msg").val('No User Found !');
            }
        },
        error: function(error){
            alert('Something Went Wrong!');
            return false;
        }
    });
}

$('#phone').bind("keyup", function (e) {
    e.preventDefault();
    var id = $(this).val();

    $.ajax({
        url: "ajax3.php",
        type: "GET",
        dataType: 'JSON',
        data: {
            "id" : id
        },
        success: function(result){
            if(result.status){
                $('#msg').html('phone already exist');
            }else {
                $("#msg").html('');
            }
        },
        error: function(error){
            alert('Something Went Wrong!');
            return false;
        }
    });
});
});
// validation for email
$(document).ready(function () {

var id = $('#email').val();
if (id){
$.ajax({
url: "ajax2.php",
type: "GET",
dataType: 'JSON',
data: {
    "id" : id,
    
},
success: function(result){
    if(result.status){
        $("#msg1").val('user already exit');
    }else {
        $("#msg1").val('No User Found !');
    }
},
error: function(error){
    alert('Something Went Wrong!');
    return false;
}
});
}

$('#email').bind("keyup", function (e) {
e.preventDefault();
var id = $(this).val();

$.ajax({
url: "ajax2.php",
type: "GET",
dataType: 'JSON',
data: {
    "id" : id
},
success: function(result){
    if(result.status){
        $('#msg1').html('email already exist');
    }else {
        $("#msg1").html('');
    }
},
error: function(error){
    alert('Something Went Wrong!');
    return false;
}
});
});
});

</script>

</html>

  