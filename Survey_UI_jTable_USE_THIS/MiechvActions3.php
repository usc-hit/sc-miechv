<?php

try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("sql_power", $con);

	//Getting records (listAction)
	if(isset($_GET['PARENT_ID']))
	
	{
		$PARENT_ID=($_GET['PARENT_ID']);

		//Get records from database
		$result = mysql_query("SELECT * FROM pregnant_mothers WHERE PARENT_ID = '".$PARENT_ID."'");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
		
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO pregnant_mothers (
			PARENT_ID,
			WEEKS_AFTER_DR_VISIT,
			MODE_OF_PAY,
			NO_OF_CIGS,
			DISCUSSED_NO_SMOKING,
			ATTEMPT_STOP_SMOKING,
			PREGNANT_LAST_UPDATE

				) VALUES(
				" . $_POST["PARENT_ID"] . ",
				'" . $_POST["WEEKS_AFTER_DR_VISIT"] . "',
				'" . $_POST["MODE_OF_PAY"] . "',
				'" . $_POST["NO_OF_CIGS"] . "',
				'" . $_POST["DISCUSSED_NO_SMOKING"] . "',
				'" . $_POST["ATTEMPT_STOP_SMOKING"] . "',
				now()
				
				
				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM pregnant_mothers WHERE PREGNANT_MOTHERS_ID = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE pregnant_mothers SET 
			WEEKS_AFTER_DR_VISIT =	'" . $_POST["WEEKS_AFTER_DR_VISIT"] . "',
			MODE_OF_PAY = 		'" . $_POST["MODE_OF_PAY"] . "',
			NO_OF_CIGS =		'" . $_POST["NO_OF_CIGS"] . "',
			DISCUSSED_NO_SMOKING = 	'" . $_POST["DISCUSSED_NO_SMOKING"] . "',
			ATTEMPT_STOP_SMOKING = 	'" . $_POST["ATTEMPT_STOP_SMOKING"] . "'
				
				WHERE PREGNANT_MOTHERS_ID = " . $_POST["PREGNANT_MOTHERS_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM pregnant_mothers WHERE PREGNANT_MOTHERS_ID = " . $_POST["PREGNANT_MOTHERS_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);
	

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>
