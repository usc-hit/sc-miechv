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
		$result = mysql_query("SELECT * FROM postpartum_mothers WHERE PARENT_ID = '".$PARENT_ID."'");
		
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
		$result = mysql_query("INSERT INTO postpartum_mothers (
			PARENT_ID,
			REPEATED_PREGNANCY,
			PREGNANCY_DATE,
			DEPRESSION_SCREENED,
			SCREENING_DATE,
			BREAST_FEEDING,
			WEEKS_BEFORE_BREAST_FEEDING,
			STRESS_LEVEL,
			SUPPORT_SYSTEM,
			POSTPARTUM_LAST_UPDATE

				) VALUES(
				" . $_POST["PARENT_ID"] . ",
				'" . $_POST["REPEATED_PREGNANCY"] . "',
				'" . $_POST["PREGNANCY_DATE"] . "',
				'" . $_POST["DEPRESSION_SCREENED"] . "',
				'" . $_POST["SCREENING_DATE"] . "',
				'" . $_POST["BREAST_FEEDING"] . "',
				'" . $_POST["WEEKS_BEFORE_BREAST_FEEDING"] . "',
				'" . $_POST["STRESS_LEVEL"] . "',
				'" . $_POST["SUPPORT_SYSTEM"] . "',
				now()
				
				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM postpartum_mothers WHERE POSTPARTUM_MOTHERS_ID = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE postpartum_mothers SET 
	
			REPEATED_PREGNANCY = 	'" . $_POST["REPEATED_PREGNANCY"] . "',
			PREGNANCY_DATE =	'" . $_POST["PREGNANCY_DATE"] . "',
			DEPRESSION_SCREENED =	'" . $_POST["DEPRESSION_SCREENED"] . "',
			SCREENING_DATE = 	'" . $_POST["SCREENING_DATE"] . "',
			BREAST_FEEDING =	'" . $_POST["BREAST_FEEDING"] . "',
			WEEKS_BEFORE_BREAST_FEEDING = 	'" . $_POST["WEEKS_BEFORE_BREAST_FEEDING"] . "',
			STRESS_LEVEL =		'" . $_POST["STRESS_LEVEL"] . "',
			SUPPORT_SYSTEM =	'" . $_POST["SUPPORT_SYSTEM"] . "'
				
				WHERE POSTPARTUM_MOTHERS_ID = " . $_POST["POSTPARTUM_MOTHERS_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM postpartum_mothers WHERE POSTPARTUM_MOTHERS_ID = " . $_POST["POSTPARTUM_MOTHERS_ID"] . ";");

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
