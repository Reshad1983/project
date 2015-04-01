$(document).ready(function(){
	$("#updateInfo").click(function(){	
		$username = $("#user").text();
		$username = $username.substring(10);
		$firstName = $("#firstname").text();	
		$firstName = $firstName.substring(12);	
		$familyName = $("#lastname").text();
		$familyName = $familyName.substring(13);
		$emailaddress = $("#emailAddress").text();
		$address = $("#address").text();
		$address = $address.substring(8);
		$('#userinfo').empty();
		$('#userinfo').append("\
		<form role='form' id='userInfoUpdate' action='user_detail.php' method='post'>\
			<h3>User information</h2>\
			<div class='form-group'>\
				<input type='text' class='form-control' name='editusername' id='olUser' placeholder='User name'/>\
			</div>\
			<div class='form-group'>\
				<input type='text' class='form-control' name='firstnameedit' id='oldfirstname' placeholder='First name'/>\
			</div>\
			<div class='form-group'>\
				<input type='text' class='form-control' name='lastnameedit' id='oldfamilyname'  placeholder='Family name'/>\
			</div>\
			<div class='form-group'>\
				<input type='email' class='form-control' name='emailedit' id='oldemail' placeholder='Email'/>\
			</div>\
			<div class='form-group'>\
				<textarea type='text' class='form-control' name='addressedit' id='oldaddress' placeholder='Address'></textarea>\
			</div>\
			<div class='form-group'>\
				<button type='submit' class='btn btn-primary btn-block' name='submit'>Submit</button>\
			</div>\
		</form>"
		);
		$("#olUser").val($username);
		$("#oldfirstname").val($firstName);
		$("#oldfamilyname").val($familyName);
		$("#oldaddress").val($address);
		
	});
});
/*
<div class='form-group'>\
				<input type='password' class='form-control' id='oldPassword' name='passwordedit' placeholder='Password' />\
				<input type='password' class='form-control' id='oldPassword1' name='passwordedit2' placeholder='type assword again' />\
			</div>\
*/
