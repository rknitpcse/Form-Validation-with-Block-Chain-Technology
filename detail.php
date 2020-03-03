<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Student Registration Form</title>
		<meta name="Keyword content="FillDetails">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type="text/javascript">
    		function blockSpecialChar(e){
        		var k;
        		document.all ? k = e.keyCode : k = e.which;
        		return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        	}
			function isNumberKey(evt){
    				var charCode = (evt.which) ? evt.which : event.keyCode
    				if (charCode > 31 && (charCode < 48 || charCode > 57))
        				return false;
    				return true;
			}
			function isAlphaOnly(e){
				var e=window.event || e 
				var keyunicode=e.charCode || e.keyCode 
				return (keyunicode>=65 && keyunicode<=122 || keyunicode==8 || keyunicode==32)? true : false
			}
			function CopyCAdd2PAdd(f) {
  				if(f.copycadd2padd.checked == true) {
    					f.PAddress.value = f.CAddress.value;
 					 }
				else
					f.PAddress.value = "";
				}
			function loadImg(event) {
				   var output = document.getElementById('photo');
                   output.src = URL.createObjectURL(event.target.files[0]);
				  }
			function loadSign(event) {
				   var output = document.getElementById('sign');
                   output.src = URL.createObjectURL(event.target.files[0]);
				  }
			function reload()
			{
				var img = document.getElementById("capt");
				img.src="captcha-image.php?rand_number=" + Math.random();
			}
			function display_c(){
				var refresh=1000; // Refresh rate in milli seconds
				mytime=setTimeout('newRefresh()',refresh)
			}
			function newRefresh()
			{
				var x = new Date()
				document.getElementById('ct').innerHTML = x;
				display_c();
			}
			function hiding_QE(){
				var x = new Date()
				document.getElementById('ct').innerHTML = x;
				display_c();
				document.getElementById("idrow8").style.display='none';
				document.getElementById("idrow9").style.display='none';
				document.getElementById("idrow10").style.display='none';
				document.getElementById("idrow11").style.display='none';
				document.getElementById("idrow12").style.display='none';
				<!--disabling the text field and validate button until qualified exam selected -->
				document.getElementById('regnoid').disabled = true; 
				document.getElementById('validateButton').disabled = true;
			}
			function selectOnlyThis(id) {
				document.getElementById("idrow11").style.display='';
				for (var i = 1;i <= 2; i++)
				{
					document.getElementById(i).checked = false;
				}
				document.getElementById(id).checked = true;
				if(document.getElementById("2").checked== true)
				{
					document.getElementById("idrow8").style.display='';
					document.getElementById("idrow9").style.display='';
					document.getElementById("idrow10").style.display='';
				}
				else
				{
					
					document.getElementById("idrow8").style.display='none';
					document.getElementById("idrow9").style.display='none';
					document.getElementById("idrow10").style.display='none';
				}
				var r = document.querySelector('.chk:checked').value; 
				var xmlhttp;
				if (window.XMLHttpRequest)
				{  // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{   // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("course_display").innerHTML = this.responseText;
					}
				}
				xmlhttp.open("GET","course_display.php?q="+r,true);  //Sending request to validate.php 
				xmlhttp.send();
			}
			function showtitle()
			{
				document.getElementById("idrow12").style.display='';
				var z = document.forms["fillDetails"]["course"].value;
				var xmlhttp;
				if (window.XMLHttpRequest)
				{  // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{   // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("response").innerHTML = this.responseText;
					}
				}
				xmlhttp.open("GET","pr.php?q="+z,true);  //Sending request to validate.php 
				xmlhttp.send();
			}
			
			
			
			$(document).ready(function(){
    			$("select.regno").change(function(){
        		var selectedregno = $(".regno option:selected").val();
				var selectedqualexam= $(".qualexam option:selected").val();
        		$.ajax({
            			type: "POST",
            			url: "reg.php",
            			data: { regno : selectedregno, qual : selectedqualexam} 
        		}).done(function(data){
            		$("#score").html(data);
        		});
    			});
			});
			
			$( function() {
    				$( "#datepicker" ).datepicker();
  			} );
			function validateScore()
			{
				var v =document.forms["fillDetails"]["regno"].value;
				var x = document.forms["fillDetails"]["qualexam"].value;
				var xmlhttp;
				if (window.XMLHttpRequest)
				{  // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{   // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("score").value = this.responseText;
						document.getElementById("dscore").innerHTML = this.responseText;
					}
				}
				xmlhttp.open("GET","validate.php?q="+v+"&r="+x,true);  //Sending request to validate.php 
				xmlhttp.send();
			}
			function enableRegTextField()
			{
				document.getElementById('regnoid').disabled = false;
				document.getElementById('validateButton').disabled = false;
				var k = document.forms["fillDetails"]["qualexam"].value;
				var xmlhttp;
				if (window.XMLHttpRequest)
				{  // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{   // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("course_display").innerHTML = this.responseText;
					}
				}
				xmlhttp.open("GET","course_display.php?q="+k,true);  //Sending request to validate.php 
				xmlhttp.send();
			}
			function check(){
				var c=document.getElementById("score").value
				if(c=="Invalid number")
				{
					document.getElementById("score").focus();
					alert('Invalid Registration Number');
					return false;
				}
				else
					return true;
			}
    	</script>
		<style>
		#img{
  			display: block;
  			margin-left: auto;
  			margin-right: auto;
		    }
		body {
  			padding: 25px;
			background-color: #b7edff;
  			<!--background: url(Images/add.jpg);
  			background-repeat: no-repeat;
  			background-size: 1920px 1200px;-->
			}
		.button {
  				border-radius: 4px;
  				background-color: #FFFFFF;
 				 border: none;
  				color: #3e8e41;
 				 text-align: center;
 				font-size: 18px;
  				padding: 20px;
  				width: 130px;
  				transition: all 0.5s;
  				cursor: pointer;
 				 margin: 5px;
				}
			.button span {
  				cursor: pointer;
  				display: inline-block;
  				position: relative;
  				transition: 0.5s;
				}
			.button span:after {
 				 content: '\00bb';
  				position: absolute;
  				opacity: 0;
  				top: 0;
  				right: -20px;
  				transition: 0.5s;
				}
			.button:hover {background-color: #52bf1c; color: red;  }
			.button:hover span {
  				padding-right: 25px;
				}
			.button:hover span:after {
  				opacity: 1;
  				right: 0;
				}
			
			td{	
				color:#000000;
				}
			#reloadCaptcha{
				display: inline-block;
				padding: 8px 10px;
				width: 120px;
				font-size: 10px;
				cursor: pointer;
				text-align: center;
				text-decoration: none;
				outline: none;
				color: #fff;
				background-color: #4CAF50;
				border: none;
				border-radius: 8px;
				box-shadow: 0 3px #999;
			}
			#reloadCaptcha:hover{background-color: #3e8e41}
			#reloadCaptcha:active {
				background-color: #3e8e41;
				box-shadow: 0 3px #666;
				transform: translateY(4px);
			}
			#validateButton{
				display: inline-block;
				padding: 8px 10px;
				font-size: 10px;
				cursor: pointer;
				text-align: center;
				text-decoration: none;
				outline: none;
				color: #fff;
				background-color: #4CAF50;
				border: none;
				border-radius: 8px;
				box-shadow: 0 3px #999;
			}
			#validateButton:hover {background-color: #3e8e41}
			#validateButton:active {
				background-color: #3e8e41;
				box-shadow: 0 3px #666;
				transform: translateY(4px);
			}
		</style>
	</head>
	<body onload="hiding_QE()">
		<div align="right" style="color: #268e15">
			<span id='ct' ></span>
		</div>
		<div align="center" >	
			<h2 style="color: #000000"> Enter Your Details</h2>
				<form name="fillDetails"  method="POST"  action="insert.php" enctype="multipart/form-data" onsubmit="return check()">
					<table align="center" cellpadding = "8">
						<!----- Full Name ---------------------------------------------------------->
						<tr id="idrow1">
							<td >Full Name:</td>
							<td><input type="text" name="fname" placeholder="Full Name" maxlength="30" minlength="5"  onkeypress="return isAlphaOnly(event)" required/></td>
						</tr> 
						<!------------Father's Name--------------------------------------------------->
  						<tr id="idrow2">
							<td> Guardian's Name:</td>
							<td><input type="text" name="guard" minlength="5" placeholder="Guardian's Name" onkeypress="return isAlphaOnly(event)" required/></td>
						</tr>
						<!----- Gender ----------------------------------------------------------->
						<tr id="idrow7">
							<td>Gender:</td>
							<td>
				 				<input type="radio" name="Gender" value="Male" checked/>Male
				 				<input type="radio" name="Gender" value="Female" />Female
								<input type="radio" name="Gender" value="Other" />Other
							</td>
						</tr>
						<!-----------Date of Birth--------------------------------------------------------->
  						<tr id="idrow3">
							<td> Date of Birth:</td>
							<td><input type="date" name="dob"  placeholder="DD/MM/YYYY" required/></td>
						</tr>
						<!-------------Adhar Number---------------------------------------------------->
						<tr id="idrow4">
							<td> Adhar Number:</td>
							<td><input type="text" maxlength="12" minlength="12" name="adhar" placeholder="Adhar Number" onkeypress="return isNumberKey(event)" required/></td>
						</tr>
						<!----- Email Id ---------------------------------------------------------->
						<tr id="idrow5">
							<td>Email Id:</td>
							<td><input type="text" name="email" maxlength="100" placeholder="xyz@gmail.com" required/></td>
						</tr>
 						<!----- Mobile Number ---------------------------------------------------------->
						<tr id="idrow6">
							<td>Contact Number:</td>
							<td><input type="text" name="mobile" minlength="10" maxlength="10" placeholder="0123456789" onkeypress="return isNumberKey(event)" required/></td>
						</tr>
						<!-- Examination Type -------------------------------------------->
						<tr id="idrow7">
							<td>Select Examination Type:</td>
							<td><input type="checkbox" class="chk" id="1" name="examType" value="UEE" onclick="selectOnlyThis(this.id)"/>University Entrance Exam.<br>
				 				<input type="checkbox" class="chk" id="2" name="examType" value="OE" onclick="selectOnlyThis(this.id)"/>Other Competative Exam.
							</td>	
						</tr>
						<!-- choose qualified entrance exam ------------------------->
						<tr id="idrow8">
							<td>Choose Qualified Exam:</td>
							<td>
								<select class="qualexam" name="qualexam" onchange="enableRegTextField()">
									<option  value="">Select Exam</option> 
									<option  value="gate">GATE</option>
									<option  value="nimcet">NIMCET</option>
									<option  value="net">NET</option>
								</select>
							</td>
						</tr>
						<!--- Enter registration number ------------------------->
						<tr id="idrow9">
							<td>Registration/Application Number:</td>
							<td>
								<input type="text" name="regno" id="regnoid" class="regno"  placeholder="Registration Number" onkeypress="return blockSpecialChar(event)"/>&nbsp;
								<!--Edit from here   -->
								<input type="button" id="validateButton" onClick="validateScore()" value="Validate">
							</td>
						</tr>
						<tr id="idrow10">
							<td>Score:</td>
							<td id="fatchedscore">
                				<!-- Display Score fatch from DB---------------------------------------------->
								<input type="hidden" id="score" name="score" value="NA" >
								<span id="dscore">NA</span>
							</td>
						</tr>
						<!-- Choose Offered Course from DB--------------------------------------->
 						<tr id="idrow11">
							<td>Choose Course:</td>
							<td id="course_display_DB">
							    <span id="course_display">First Select Exam Type</span>
								<!-- Course as per Choosen exam from DB--------------------------------------->
						    </td>
					</tr>
					<!-- Maximum Qualification as per Choosen Offered Course from DB--------------------------------------->
 					<tr id="idrow12">
						<td>Maximum Qualification:</td>
						<td id="response">
                			<!-- Maximum Qualification as per Choosen Offered Course from DB--------------------------------------->
            			</td>
					</tr>
 					<!----- Correspondence Address ---------------------------------------------------------->
					<tr id="idrow13">
						<td>Correspondence Address:</td>
						<td><textarea placeholder="Correspondence Address" name="CAddress" cols="43" rows="5" required></textarea></td>
					</tr>
 					<!----- Permanent Address Check Box ---------------------------------------------------------->
					<tr id="idrow14">
						<td>Same as Correspondance Address: </td>
 						<td>
							<input type="checkbox" autocomplete="off"  name="copycadd2padd" value="same" onclick="CopyCAdd2PAdd(this.form)" />
						</td>
					</tr>
					<tr id="idrow15">
						<td>Permanent Address:</td>
						<td><textarea placeholder="Permanent Address" name="PAddress" cols="43" rows="5" required></textarea></td>
					</tr>
					<tr id="idrow16">
						<td>Choose Image:</td>
						<td><input type="file" accept="image/*" onchange="loadImg(event)" name="photo" required>
							<img id="photo" height="50px" width="50px"/>	
						</td>                            
					</tr>
					<tr id="idrow17">
						<td>Choose Signature:</td>
						<td><input type="file" accept="image/*" onchange="loadSign(event)" name="sign" required>	
						<img id="sign" height="30px" width="60px"/>
						</td>
					</tr>
					<tr id="idrow18">
						<td>Your Captcha Code:</td>
						<td><img src=captcha-image.php id="capt"><br><br>
							<input type="button" id="reloadCaptcha" onClick=reload(); value='Refresh'>
						</td>
					</tr>
					<tr id="idrow19">
						<td>Enter Captcha Code:</td>
						<td><input type=text name=t1 required></td>
					</tr>
				</table>
				<button class="button" id="button" type=submit value='submit' ><span>Submit</span></button>
			</form>
	     	</div>
	</body>
</html>
