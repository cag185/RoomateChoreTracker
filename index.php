<!DOCTYPE=html>

<HTML>
	<head>
		<style>
			table
			{
				border-collapse: collapse;
				width: 100%;
			}
			td,th{
				border: 1px solid #dddddd;
				text-align: center;
				padding: 8px;
			}

			body{
				font-family: Arial, Helvetica, sans-serif;
				text-align: left;
				margin: auto;
				font-size: 1.25em;
				background-color: OldLace;
				width:100%
			}
		</style>
	</head>

	<body>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "Hawking314*";
		$dbname = "ChoreDatabase";

		//create connection
		$link = mysqli_connect($servername, $username, $password, $dbname);
		//check connection
		if($link->connection_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		//Cant seem to load date assigned
		//$sql = "SELECT CHORE, NAME_ASSIGNED, _STATUS, DATE_ASSIGNED, POINTS, INDEX_ FROM ChoreData";
		$sql = "SELECT CHORE, NAME_ASSIGNED, _STATUS, POINTS, INDEX_ FROM ChoreData";
		$result = $link->query($sql);

		//if($result->num_rows > -1)
		{
		echo "<table> <tr> <th>Chore</th> <th>Name Assigned</th> <th>Status</th> <th>Due Date</th> <th>Points</th> <th>Index</th> </tr>";
		//echo "<table><tr><th>Chore</th><th>Name Assigned</th></tr>";
		//output the data of each row
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["CHORE"]."</td><td>".$row["NAME_ASSIGNED"]."</td><td>".$row["_STATUS"]."</td><td>".$row["POINTS"]."</td><td>".$row["INDEX_"]."</td></tr>";
			//echo "<tr><td>".$row["CHORE"]."</td><td>".$row["NAME_ASSIGNED"]."</td></tr>";
		}
		echo "</table>";
		}
		//else
		{
		//echo "0 results";
		}


		$link->close();

		?>
	</body>
</HTML> 