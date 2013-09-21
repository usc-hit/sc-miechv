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
		$result = mysql_query("SELECT * FROM child_details WHERE PARENT_ID = '".$PARENT_ID."'");
		
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
		$result = mysql_query("INSERT INTO child_details (
			PARENT_ID,
			CHILD_ENROLLMENT_DATE,
			CHILD_SSN,
			CHILD_LAST_NAME,
			CHILD_FIRST_NAME,
			CHILD_MIDDLE_NAME,
			CHILD_BIRTH_DATE,
			CHILD_SEX,
			CHILD_RACE,
			CHILD_ETHNICITY

				) VALUES(
				" . $_POST["PARENT_ID"] . ",
				'" . $_POST["CHILD_ENROLLMENT_DATE"] . "',
				" . $_POST["CHILD_SSN"] . ",
				'" . $_POST["CHILD_LAST_NAME"] . "',
				'" . $_POST["CHILD_FIRST_NAME"] . "',
				'" . $_POST["CHILD_MIDDLE_NAME"] . "',
				" . $_POST["CHILD_BIRTH_DATE"] . ",
				'" . $_POST["CHILD_SEX"] . "',
				'" . $_POST["CHILD_RACE"] . "',
				'" . $_POST["CHILD_ETHNICITY"] . "'
				
				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM child_details WHERE CHILD_ID = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE child_details SET 
	
			CHILD_ENROLLMENT_DATE = 	" . $_POST["CHILD_ENROLLMENT_DATE"] . ", 
			CHILD_SSN = 			" . $_POST["CHILD_SSN"] . ", 
			CHILD_LAST_NAME = 		'" . $_POST["CHILD_LAST_NAME"] . "',
			CHILD_FIRST_NAME =		'" . $_POST["CHILD_FIRST_NAME"] . "',
			CHILD_MIDDLE_NAME =		'" . $_POST["CHILD_MIDDLE_NAME"] . "',
			CHILD_BIRTH_DATE =		" . $_POST["CHILD_BIRTH_DATE"] . ",
			CHILD_SEX = 			'" . $_POST["CHILD_SEX"] . "',
			CHILD_RACE =			'" . $_POST["CHILD_RACE"] . "',
			CHILD_ETHNICITY =		'" . $_POST["CHILD_ETHNICITY"] . "'
				
				WHERE CHILD_ID = " . $_POST["CHILD_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM child_details WHERE CHILD_ID = " . $_POST["CHILD_ID"] . ";");

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
