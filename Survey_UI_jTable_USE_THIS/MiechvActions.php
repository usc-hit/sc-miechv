<?php



try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("sql_power", $con);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysql_query("SELECT * FROM parent_details;");
		
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
		$result = mysql_query("INSERT INTO parent_details (
			ENROLLMENT_DATE,
			SSN,
			LAST_NAME,
			FIRST_NAME,
			MIDDLE_NAME,
			BIRTH_DATE,
			SEX,
			MARITAL_STATUS,
			RACE,
			ETHNICITY,
			LANGUAGE,
			ADDRESS_LINE_1,
			ADDRESS_LINE_2,
			CITY,
			STATE,
			ZIP,
			HOME_PHONE,
			MOBILE_PHONE,
			NEEDING_SERVICES,
			REFERRAL_MADE,
			FOLLOW_UP
				) VALUES(
				'" . $_POST["ENROLLMENT_DATE"] . "',
				" . $_POST["SSN"] . ",
				'" . $_POST["LAST_NAME"] . "',
				'" . $_POST["FIRST_NAME"] . "',
				'" . $_POST["MIDDLE_NAME"] . "',
				" . $_POST["BIRTH_DATE"] . ",
				'" . $_POST["SEX"] . "',
				'" . $_POST["MARITAL_STATUS"] . "',
				'" . $_POST["RACE"] . "',
				'" . $_POST["ETHNICITY"] . "',
				'" . $_POST["LANGUAGE"] . "',
				'" . $_POST["ADDRESS_LINE_1"] . "',
				'" . $_POST["ADDRESS_LINE_2"] . "',
				'" . $_POST["CITY"] . "',
				'" . $_POST["STATE"] . "',
				" . $_POST["ZIP"] . ",
				" . $_POST["HOME_PHONE"] . ",
				" . $_POST["MOBILE_PHONE"] . ",
				'" . $_POST["NEEDING_SERVICES"] . "',
				'" . $_POST["REFERRAL_MADE"] . "',
				'" . $_POST["FOLLOW_UP"] . "'
				
				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM parent_details WHERE PARENT_ID = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE parent_details SET 
			
			ENROLLMENT_DATE = 	" . $_POST["ENROLLMENT_DATE"] . ", 
			SSN = 			" . $_POST["SSN"] . ", 
			LAST_NAME = 		'" . $_POST["LAST_NAME"] . "',
			FIRST_NAME =		'" . $_POST["FIRST_NAME"] . "',
			MIDDLE_NAME =		'" . $_POST["MIDDLE_NAME"] . "',
			BIRTH_DATE =		" . $_POST["BIRTH_DATE"] . ",
			SEX = 			'" . $_POST["SEX"] . "',
			MARITAL_STATUS =	'" . $_POST["MARITAL_STATUS"] . "',
			RACE =			'" . $_POST["RACE"] . "',
			ETHNICITY =		'" . $_POST["ETHNICITY"] . "',
			LANGUAGE = 		'" . $_POST["LANGUAGE"] . "', 
			ADDRESS_LINE_1 = 	'" . $_POST["ADDRESS_LINE_1"] . "', 
			ADDRESS_LINE_2 = 	'" . $_POST["ADDRESS_LINE_2"] . "', 
			CITY =			 '" . $_POST["CITY"] . "', 
			STATE = 		'" . $_POST["STATE"] . "', 
			ZIP = 			" . $_POST["ZIP"] . ", 
			HOME_PHONE =		 " . $_POST["HOME_PHONE"] . ", 
			MOBILE_PHONE = 		" . $_POST["MOBILE_PHONE"] . " ,
			NEEDING_SERVICES = 	'" . $_POST["NEEDING_SERVICES"] . "', 
			REFERRAL_MADE = 	'" . $_POST["REFERRAL_MADE"] . "', 
			FOLLOW_UP = 		'" . $_POST["FOLLOW_UP"] . "' 
				
				WHERE PARENT_ID = " . $_POST["PARENT_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM parent_details WHERE PARENT_ID = " . $_POST["PARENT_ID"] . ";");

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
