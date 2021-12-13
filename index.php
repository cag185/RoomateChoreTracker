<DOCTYPE=html>
<html>

<head>	
<style>
	@font-face{
	font-family: googleFont;
	src: url(C:\Users\17578\Desktop\Programs\WebDev\ChoreWebServer\Roboto-Regular.tff);
	}
	table{
		 border-collapse: collapse;
 		 width: 100%;
			}
	td, th {
			  border: 1px solid #dddddd;
			  text-align: center;
				  padding: 8px;
			}

	body{
		text-size-adjust: 100%;
		font-size: 1.25em;
		text-align: center; 
		font-family: Arial, Helvetica, sans-serif;
		margin: auto;
		background-color: white;
		width: 100%;
		
</style>
<meta name="viewport" content="width=device-width">
</head>
	<body>
		<table>
			<tr>
				<th>Chore</th>
				<th>Name Assigned</th>
				<th>Name Completed</th>
				<th>Status</th>
				<th>Time and Date</th>
				<th>Points earned</th>
				<th>Due Date</th>
				<th>Time Left</th>
				
			</tr>
			<tr>
				<!---Make a row for every chore->
				<!--DUMP TRASH-->
                <th>
                <?php
                /* Attempt MySQL server connection. Assuming you are running MySQL
                server with default setting (user 'root' with password) */
                $link = mysqli_connect("localhost", "root", "Hawking314*", "ChoreDatabase");
 
                // Check connection
                if($link === false){
                   die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                //try to create a variable for Trash and retrieve it
                $Chore = "SELECT CHORE FROM ChoreData WHERE INDEX_=1 ";
                $Disp = $link->query($Chore);
                echo   $Disp;
               // echo "Dump the Trash";
                // Print host information
                //echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);

                ?>
                </th>
			</tr>

			<tr>
				<!--MOP LIVING ROOM-->
			</tr>

			<tr>
				<!--MOP KITCHEN-->
			</tr>

			<tr>
				<!--SWEEP LIVING ROOM-->
			</tr>

			<tr>
				<!--SWEEP KITCHEN-->
			</tr>

			<tr>
				<!--CLEAN BATHROOM UPSTAIRS-->
			</tr>

			<tr>
				<!--CLEAN DOWNSTAIRS BATHROOM-->
			</tr>

			<tr>
				<!--CLEAN SURFACES IN KITCHEN-->
			</tr>

			<tr>
				<!--SWEEP MICROWAVE AND STOVETOP-->
			</tr>

			<tr>
				<!--CLEAN LIVING ROOM-->
			</tr>

			<tr>
				<!--CLEAN KITCHEN-->
			</tr>

			<tr>
				<!--REFILL STUFF-->
			</tr>

			<tr>
				<!--BRING OUT TRASH-->
			</tr>

		</table>
	</body>
</html>