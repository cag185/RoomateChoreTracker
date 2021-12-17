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
		else{
			echo "Connection Successful -- Data accessable <br>";
		}
		//Cant seem to load date assigned

		//SQL command to select what data I want to use
		$sql = "SELECT CHORE, NAME_ASSIGNED, _STATUS, CURRENT_TIMESTAMP, POINTS, TIME_LEFT, DUE_DATE, INDEX_ FROM ChoreData";
		//Assigning a value to hold the queried data
		$result = $link->query($sql);
		//using a value to access the files in the result variable
		$res = $result->fetch_assoc();
		//$currTime = TIMESTAMPDIFF(HOUR, CURRENT_TIMESTAMP, DUE_DATE);
		$currTime = $res["CURRENT_TIMESTAMP"];
		$dueDate = $res["DUE_DATE"];
		//$res = $link->query($sql);
		echo strtotime($currTime);
		echo "<br>";
		echo strtotime($dueDate);

		//----TimeDiff function
		function timeDiff($firstTime, $secondTime)
		{
			//convert to unix timestamps
			$firstTime = strtotime($firstTime);
			$secondTime = strtotime($secondTime);

			//subtract
			if($secondTime > $firstTime)
				$interval1 = $secondTime - $firstTime;
			else
				$interval1 = $firstTime - $secondTime;
			//format in Hours Minutes Days
			$interval1 = date("h:i:s", $interval1);
			//return 
			return $interval1;
		}

		//create a variable to hold the difference
		$diffe = timeDiff($dueDate, $currTime);
		//$interval = $currTime->diff($dueDate);
		echo "<br> New Time Difference: ";
		echo " <br> stuff should be here <br>";
		echo $diffe;
		//echo $interval->date_format($interval, %H %i %s");

		//new SQL command to update the DataBase with a Time left
		$sql = "UPDATE ChoreData SET TIME_LEFT = " . $diffe;
		//$sql = "UPDATE ChoreData SET TIME_LEFT  = CURRENT_TIME";

		$result = $link->query($sql);	//actually creates query to update in DB
		//now that TIME_LEFT is updated, create a SQL command to select relevant data, create query, store query in variable
		$sql = "SELECT CHORE, NAME_ASSIGNED, _STATUS, CURRENT_TIMESTAMP, POINTS, TIME_LEFT, DUE_DATE, INDEX_ FROM ChoreData";
		//Assigning a value to hold the queried data
		$result = $link->query($sql);

		//$sql = "SELECT DUE_DATE, CURRENT_TIME, TIME_LEFT, TIMESTAMPDIFF(HOUR, DUE_DATE, CURRENT_TIME) AS TIME_LEFT FROM ChoreData";
		
		echo "<table> <tr> <th>Chore</th> <th>Name Assigned</th> <th>Status</th> <th>Due Date</th> <th>Time Remaining</th> <th>Points</th> <th>Index</th> </tr>";
		//output the data of each row
		while ($row = $result->fetch_assoc() ) {
			echo "<tr><td>".$row["CHORE"]."</td><td>".$row["NAME_ASSIGNED"]."</td><td>".$row["_STATUS"]."</td><td>".$row["DUE_DATE"]."</td><td>".$row["TIME_LEFT"]."</td><td>".$row["POINTS"]."</td><td>".$row["INDEX_"]."</td></tr>";
			//echo "<tr><td>".$row["CHORE"]."</td><td>".$row["NAME_ASSIGNED"]."</td></tr>";
		}
		echo "</table>";

		$link->close();
		?>
	</body>
</HTML> 