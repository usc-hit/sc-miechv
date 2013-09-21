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
		$result = mysql_query("SELECT * FROM asq_screening WHERE CHILD_ID = '".$CHILD_ID."'");
		
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
		$result = mysql_query("INSERT INTO asq_screening (
			
			CHILD_ID,
			EPSDT_VISITS,
			COMMUNICATION_SCREEN,
			COMMUNICATION_PROBLEM,
			COMMUNICATION_REFERRAL,
			PERSONAL_SCREEN,
			PERSONAL_PROBLEM,
			PERSONAL_REFERRAL,
			SOLVING_SCREEN,
			SOLVING_PROBLEM,
			SOLVING_REFERRAL,
			EMOTIONAL_SCREEN,
			EMOTIONAL_PROBLEM,
			EMOTIONAL_REFERRAL,
			GROWTH_SCREEN,
			GROWTH_PROBLEM,
			GROWTH_REFERRAL,
			ASQ_LAST_UPDATE

				) VALUES(
			
			" . $_POST["CHILD_ID"] . ",	
			'" . $_POST["EPSDT_VISITS"] . "',
			'" . $_POST["COMMUNICATION_SCREEN"] . "',
			'" . $_POST["COMMUNICATION_PROBLEM"] . "',
			'" . $_POST["COMMUNICATION_REFERRAL"] . "',
			'" . $_POST["PERSONAL_SCREEN"] . "',
			'" . $_POST["PERSONAL_PROBLEM"] . "',
			'" . $_POST["PERSONAL_REFERRAL"] . "',
			'" . $_POST["SOLVING_SCREEN"] . "',
			'" . $_POST["SOLVING_PROBLEM"] . "',
			'" . $_POST["SOLVING_REFERRAL"] . "',
			'" . $_POST["EMOTIONAL_SCREEN"] . "',
			'" . $_POST["EMOTIONAL_PROBLEM"] . "',
			'" . $_POST["EMOTIONAL_REFERRAL"] . "',
			'" . $_POST["GROWTH_SCREEN"] . "',
			'" . $_POST["GROWTH_PROBLEM"] . "',
			'" . $_POST["GROWTH_REFERRAL"] . "',
			now()
				
				);");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM asq_screening WHERE ASQ_SCREENING_ID = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE asq_screening SET 
	
			EPSDT_VISITS = 		'" . $_POST["EPSDT_VISITS"] . "',
			COMMUNICATION_SCREEN = 	'" . $_POST["COMMUNICATION_SCREEN"] . "',
			COMMUNICATION_PROBLEM = '" . $_POST["COMMUNICATION_PROBLEM"] . "',
			COMMUNICATION_REFERRAL ='" . $_POST["COMMUNICATION_REFERRAL"] . "',
			PERSONAL_SCREEN = 	'" . $_POST["PERSONAL_SCREEN"] . "',
			PERSONAL_PROBLEM = 	'" . $_POST["PERSONAL_PROBLEM"] . "',
			PERSONAL_REFERRAL = 	'" . $_POST["PERSONAL_REFERRAL"] . "',
			SOLVING_SCREEN = 	'" . $_POST["SOLVING_SCREEN"] . "',
			SOLVING_PROBLEM = 	'" . $_POST["SOLVING_PROBLEM"] . "',
			SOLVING_REFERRAL = 	'" . $_POST["SOLVING_REFERRAL"] . "',
			EMOTIONAL_SCREEN = 	'" . $_POST["EMOTIONAL_SCREEN"] . "',
			EMOTIONAL_PROBLEM = 	'" . $_POST["EMOTIONAL_PROBLEM"] . "',
			EMOTIONAL_REFERRAL = 	'" . $_POST["EMOTIONAL_REFERRAL"] . "',
			GROWTH_SCREEN = 	'" . $_POST["GROWTH_SCREEN"] . "',
			GROWTH_PROBLEM = 	'" . $_POST["GROWTH_PROBLEM"] . "',
			GROWTH_REFERRAL = 	'" . $_POST["GROWTH_REFERRAL"] . "'
				
				WHERE ASQ_SCREENING_ID = " . $_POST["ASQ_SCREENING_ID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM asq_screening WHERE ASQ_SCREENING_ID = " . $_POST["ASQ_SCREENING_ID"] . ";");

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
