<?php

try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("sql_power", $con);

	//Getting records (listAction)
	if(isset($_GET['CHILD_ID']))
	
	{
		$CHILD_ID=($_GET['CHILD_ID']);

		//Get records from database
		$result = mysql_query("SELECT * FROM insurance_status WHERE CHILD_ID = '".$CHILD_ID."'");
		
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
		$result = mysql_query("INSERT INTO insurance_status (
			CHILD_ID,
			STATUS,
			INSURANCE_LAST_UPDATE

				) VALUES(
				" . $_POST["CHILD_ID"] . ",
				'" . $_POST["STATUS"] . "',
				now()
				
				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM insurance_status WHERE INSURANCE_STATUS_ID = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE insurance_status SET 
	
			STATUS = 	'" . $_POST["STATUS"] . "'
				
				WHERE INSURANCE_STATUS_ID = " . $_POST["INSURANCE_STATUS_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM insurance_status WHERE INSURANCE_STATUS_ID = " . $_POST["INSURANCE_STATUS_ID"] . ";");

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
