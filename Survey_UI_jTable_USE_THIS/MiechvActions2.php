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
		$result = mysql_query("SELECT * FROM household_survey WHERE PARENT_ID = '".$PARENT_ID."'");
		
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
		$result = mysql_query("INSERT INTO household_survey (
			PARENT_ID,
			HOUSEHOLD_INCOME,
			TOTAL_ADULTS,
			TOTAL_CHILDREN,
			EMPLOYMENT_STATUS,
			LOST_JOB,
			TANF,
			FOOD_STAMPS,
			ARRESTS,
			CONVICTED_CRIME,
			DOMESTIC_VIOLENCE,
			SAFE_PLAN,
			EDUCATION_OBTAINED,
			CURRENTLY_ENROLLED,
			PLANNING_TO_ENROLL,
			INSURANCE_STATUS,
			LAST_CHECKUP,
			PARTICIPANT_SMOKE,
			SMOKING_FREQUENCY,
			ATTEMPTED_QUIT_SMOKING,
			SAFE_SLEEPING,
			SHAKEN_BABY_SYNDROME,
			PASENGER_SAFETY,
			POISONING,
			FIRE_SAFETY,
			WATER_SAFETY,
			PLAYGROUND_SAFETY,
			HOUSEHOLD_LAST_UPDATE

				) VALUES(
				" . $_POST["PARENT_ID"] . ",
				'" . $_POST["HOUSEHOLD_INCOME"] . "',
				'" . $_POST["TOTAL_ADULTS"] . "',
				'" . $_POST["TOTAL_CHILDREN"] . "',
				'" . $_POST["EMPLOYMENT_STATUS"] . "',
				'" . $_POST["LOST_JOB"] . "',
				'" . $_POST["TANF"] . "',
				'" . $_POST["FOOD_STAMPS"] . "',
				'" . $_POST["ARRESTS"] . "',
				'" . $_POST["CONVICTED_CRIME"] . "',
				'" . $_POST["DOMESTIC_VIOLENCE"] . "',
				'" . $_POST["SAFE_PLAN"] . "',
				'" . $_POST["EDUCATION_OBTAINED"] . "',
				'" . $_POST["CURRENTLY_ENROLLED"] . "',
				'" . $_POST["PLANNING_TO_ENROLL"] . "',
				'" . $_POST["INSURANCE_STATUS"] . "',
				'" . $_POST["LAST_CHECKUP"] . "',
				'" . $_POST["PARTICIPANT_SMOKE"] . "',
				'" . $_POST["SMOKING_FREQUENCY"] . "',
				'" . $_POST["ATTEMPTED_QUIT_SMOKING"] . "',
				'" . $_POST["SAFE_SLEEPING"] . "',
				'" . $_POST["SHAKEN_BABY_SYNDROME"] . "',
				'" . $_POST["PASENGER_SAFETY"] . "',
				'" . $_POST["POISONING"] . "',
				'" . $_POST["FIRE_SAFETY"] . "',
				'" . $_POST["WATER_SAFETY"] . "',
				'" . $_POST["PLAYGROUND_SAFETY"] . "',
				now()

				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM household_survey WHERE HOUSEHOLD_SURVEY_ID = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE household_survey SET 
			HOUSEHOLD_INCOME = 	'" . $_POST["HOUSEHOLD_INCOME"] . "',
			TOTAL_ADULTS =		'" . $_POST["TOTAL_ADULTS"] . "',
			TOTAL_CHILDREN =	'" . $_POST["TOTAL_CHILDREN"] . "',
			EMPLOYMENT_STATUS =	'" . $_POST["EMPLOYMENT_STATUS"] . "',
			LOST_JOB =		'" . $_POST["LOST_JOB"] . "',
			TANF =			'" . $_POST["TANF"] . "',
			FOOD_STAMPS =		'" . $_POST["FOOD_STAMPS"] . "',
			ARRESTS =		'" . $_POST["ARRESTS"] . "',
			CONVICTED_CRIME =	'" . $_POST["CONVICTED_CRIME"] . "',
			DOMESTIC_VIOLENCE =	'" . $_POST["DOMESTIC_VIOLENCE"] . "',
			SAFE_PLAN =		'" . $_POST["SAFE_PLAN"] . "',
			EDUCATION_OBTAINED =	'" . $_POST["EDUCATION_OBTAINED"] . "',
			CURRENTLY_ENROLLED =	'" . $_POST["CURRENTLY_ENROLLED"] . "',
			PLANNING_TO_ENROLL =	'" . $_POST["PLANNING_TO_ENROLL"] . "',
			INSURANCE_STATUS =	'" . $_POST["INSURANCE_STATUS"] . "',
			LAST_CHECKUP =		'" . $_POST["LAST_CHECKUP"] . "',
			PARTICIPANT_SMOKE =	'" . $_POST["PARTICIPANT_SMOKE"] . "',
			SMOKING_FREQUENCY =	'" . $_POST["SMOKING_FREQUENCY"] . "',
			ATTEMPTED_QUIT_SMOKING =	'" . $_POST["ATTEMPTED_QUIT_SMOKING"] . "',
			SAFE_SLEEPING =		'" . $_POST["SAFE_SLEEPING"] . "',
			SHAKEN_BABY_SYNDROME =	'" . $_POST["SHAKEN_BABY_SYNDROME"] . "',
			PASSENGER_SAFETY =	'" . $_POST["PASENGER_SAFETY"] . "',
			POISONING =		'" . $_POST["POISONING"] . "',
			FIRE_SAFETY =		'" . $_POST["FIRE_SAFETY"] . "',
			WATER_SAFETY =		'" . $_POST["WATER_SAFETY"] . "',
			PLAYGROUND_SAFETY =	'" . $_POST["PLAYGROUND_SAFETY"] . "'
			
				WHERE HOUSEHOLD_SURVEY_ID = " . $_POST["HOUSEHOLD_SURVEY_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM household_survey WHERE HOUSEHOLD_SURVEY_ID = " . $_POST["HOUSEHOLD_SURVEY_ID"] . ";");

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
