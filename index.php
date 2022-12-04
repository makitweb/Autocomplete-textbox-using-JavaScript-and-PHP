<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>How to check Username Availability using JavaScript and PHP</title>
    </head>
    <body>

        <div> 
            <h1 style="font-size: 20px;text-align: center;margin-bottom: 25px;margin-top: 20px;">Check Username Availability using JavaScript and PHP</h1>
            
            <p>Try to enter yssyogesh, bsonarika, sunil, and vijay in the textbox.</p>
            <input type="text" id="txt_username" name="txt_username" placeholder="Enter Username" maxlength='60' onkeyup="checkUsername(this.value);" />
            <!-- Response --> 
            <div id="uname_response" ></div> 
        </div>
    
        <script>
            function checkUsername(username){
                
                var usernameRegex = /^[a-zA-Z0-9]+$/;
  			        
      			if(usernameRegex.test(username)){
      			    document.getElementById('uname_response').innerHTML ="";
      				if(username.length > 4){
                        // AJAX request
            		   	var xhttp = new XMLHttpRequest();
            		   	xhttp.open("POST", "ajaxfile.php", true); 
            		   	xhttp.setRequestHeader("Content-Type", "application/json");
            		   	xhttp.onreadystatechange = function() {
            		      	if (this.readyState == 4 && this.status == 200) {
            
            			      	// Response
            			      	var response = this.responseText; 
            			      	document.getElementById('uname_response').innerHTML = response;
            			   	}
            		   	};
            		   	var data = {username: username};
            		   	xhttp.send(JSON.stringify(data));
                    }
    			}else{
    				document.getElementById('uname_response').innerHTML ="<span style='color: red;'>Please enter valid value</span>";
    			}
    			
    		}

        </script>

    </body>
</html>