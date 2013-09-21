<html>
  <head>
  

    <link href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
    <link href="scripts/jtable/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
	
    <script src="scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	
  </head>
 
  <body>
	<div id="MiechvTableContainer" style="width: 650px;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
		    
		    var messageParents = {
		    	    addNewRecord: 'Add New Parent'
		    	  };
		    var messageHousehold = {
		    	    addNewRecord: 'Add New Household survey'
		    	  };
		    var messagePregnant = {
		    	    addNewRecord: 'Add Pregnant Mother info'
		    	  };
		    var messagePostpartum = {
		    	    addNewRecord: 'Add Postpartum Mother info'
		    	  };
		    var messageChild = {
		    	    addNewRecord: 'Add New Child'
		    	  };
		    var messageInsurance = {
		    	    addNewRecord: 'Update Insurance'
		    };
		    var messageScreening = {
		    	    addNewRecord: 'Add New Screening'    
		    };
		    
			$('#MiechvTableContainer').jtable({
				title: 'Parent Details',
				messages: messageParents,
				openChildAsAccordion: true,
				actions: {
					listAction: 'MiechvActions.php?action=list',
					createAction: 'MiechvActions.php?action=create',
					updateAction: 'MiechvActions.php?action=update',
					deleteAction: 'MiechvActions.php?action=delete'
				},
				fields: {
					PARENT_ID: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					ENROLLMENT_DATE: {
						title: 'Enrollment Date',
						width: '4%',
						type: 'date',
						displayFormat: 'mm-dd-yy'
					},
					SSN: {
						title: 'Social Security Number',
						list: false,
						defaultValue: 'xxx-xx-xxxx'
					},		
					LAST_NAME: {
						title: 'Last Name'
					},
					FIRST_NAME: {
						title: 'First Name',
					},
					MIDDLE_NAME: {
						title: 'Middle Name',
						list: false
					},
					BIRTH_DATE: {
						title: 'Date of Birth',
						type: 'date',
						displayFormat: 'mm-dd-yy',
						list: false
					},
					SEX: {
						title: 'Sex',
						list: false,
						type: 'radiobutton',
						options: ['Female','Male']
					},
					MARITAL_STATUS: {
						title: 'Marital Status',
						list: false,
						options: ['Unknown','Divorced','Married','Single', 'Never Married','Widowed']
					},
					RACE: {
						title: 'Race',
						list: false,
						options: ['Unknown','American Indian / Alaska Native ','Asian','Black / African American','Hawaiin Native / Other Pacific Islander','White','Enrollee Refused','Other']
					},
					ETHNICITY: {
						title: 'Ethnicity',
						list: false,
						options: ['Unknown','Hispanic / Latino','Non Hispanic / Latino','Enrollee Refused']
					},
					LANGUAGE: {
						title: 'Primary language in home',
						list: false,
						options: ['English','Spanish','Arabic','Chinese','French','Italian','Japanese','Korean','Polish','Russian','Tagalog','Vietnamese','Tribal Language','Other','Unknown / Did Not Report']
					},
					ADDRESS_LINE_1: {
						title: 'Address Line 1',
						list: false
					},
					ADDRESS_LINE_2: {
						title: 'Address Line 2',
						list: false
					},
					CITY: {
						title: 'City',
						list: false
					},
					STATE: {
						title: 'State',
						list: false,
						options: ['SC','AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY']
					},
					ZIP: {
						title: 'Zip Code',
						list: false
					},
					HOME_PHONE: {
						title: 'Home Phone',
						list: false
					},
					MOBILE_PHONE: {
						title: 'Mobile Phone',
						list: false
					},
					NEEDING_SERVICES: {
						title: 'Family identified as needing services at program intake?',
						list: false,
						type: 'radiobutton',
						options: {'1':'Yes','0':'No'}
					},
					REFERRAL_MADE: {
						title: 'Was a referral made?',
						list: false,
						type: 'radiobutton',
						options: {'1':'Yes','0':'No'}
					},
					FOLLOW_UP: {
						title: 'Was a follow-up completed?',
						list: false,
						type: 'radiobutton',
						options: {'1':'Yes','0':'No'}
					},
					HOUSEHOLD_SURVEY: {
						title: '',
						width: '1%',
						edit: false,
						create: false,
						display: function (houseData) {
							var $img = $('<img src="scripts/jtable/themes/custom_icons/survey.png" title="Household Survey" />');
							$img.click(function () {
								$('#MiechvTableContainer').jtable('openChildTable',
									$img.closest('tr'),
									{
										title: 	houseData.record.LAST_NAME + ' - Household Survey',
										messages: messageHousehold,
										actions: {
											listAction:   'MiechvActions2.php?PARENT_ID=' + houseData.record.PARENT_ID, 
											createAction: 'MiechvActions2.php?action=create',
											updateAction: 'MiechvActions2.php?action=update',
											deleteAction: 'MiechvActions2.php?action=delete'
										},
										fields: {
											PARENT_ID:{
												type: 'hidden',
												defaultValue: houseData.record.PARENT_ID
											},
											HOUSEHOLD_SURVEY_ID: {
												key: true,
												create: false,
												edit: false,
												list: false
											},
											HOUSEHOLD_INCOME: {
												title: 'Household Income',
												list: false,
												options: ['Unknown','Less than $6,000','$6,001 to $9,001','$9,001 to $16,000','$16,001 to $20,000','$20,001 to $30,000','$30,000 or more']
											},
											TOTAL_ADULTS: {
												title: 'Number of adults in household (supported by household income)',
												list: false,
												options: ['1','2','3','4','5','6','7','8','9','10 or more']
											},
											TOTAL_CHILDREN: {
												title: 'Number of children in household (supported by household income)',
												list: false,
												options: ['0','1','2','3','4','5','6','7','8','9','10 or more']
											},
											EMPLOYMENT_STATUS: {
												title: 'Employment status',
												list: false,
												options: ['Unknown','Employed Full-Time','Employed Part-Time','Not Employed']
											},
											LOST_JOB: {
												title: 'Anyone <strong>lost a job</strong> within last 12 months?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											TANF: {
												title: 'Anyone receiving <strong>TANF</strong> anytime within last 12 months?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											FOOD_STAMPS: {
												title: 'Anyone receiving <strong>food stamps</strong> anytime within last 12 months?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											ARRESTS: {
												title: 'Has the enrollee had a <strong>criminal arrest</strong>?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											CONVICTED_CRIME: {
												title: 'Has the enrollee been convicted of a crime?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											DOMESTIC_VIOLENCE: {
												title: 'Has the enrollee experienced <strong>domestic violence</strong>?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											SAFE_PLAN: {
												title: 'Does the enrollee have a <strong>safe plan</strong> in place?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											EDUCATION_OBTAINED: {
												title: 'Education attained',
												list: false,
												options: ['Unknown','High School eligible, not enrolled','Currently enrolled in High School','Less than High School diploma','High School diploma','GED','Some College/Training','Student (currently enrolled)/Enrolled in training','Technical Training Certification, Associates Degree','Bachelors Degree, or higher','Other']
											},
											CURRENTLY_ENROLLED: {
												title: 'Currently enrolled in school, vocational, educational program?',
												type: 'radiobutton',
												list: false,
												options: {'1':'Yes','0':'No'}
											},
											PLANNING_TO_ENROLL: {
												title: 'Planning to enroll in school, vocational, educational program?',
												type: 'radiobutton',
												list: false,
												options: {'1':'Yes','0':'No'}
											},
											INSURANCE_STATUS: {
												title: 'Insurance status',
												list: false,
												options: ['Unknown','No Insurance','Medicaid / SCCHIP','Private','Tri-Care','Other']
											},
											LAST_CHECKUP: {
												title: 'Last routine checkup (not related to pregnancy, injury, illness or condition)',
												list: false,
												options: ['Unknown','Within last 12 months','1 to 2 years ago','2 to 5 years ago','More than 5 years ago']
											},
											PARTICIPANT_SMOKE: {
												title: 'Does participant smoke? (Any cigarettes within the last 2 years?)',
												type: 'radiobutton',
												list: false,
												options: {'1':'Yes','0':'No'}
											},
											SMOKING_FREQUENCY: {
												title: 'Smoking frequency: How many cigarettes does enrollee report smoking a day? (a pack has 20 cigarettes)',
												list: false,
												options: ['Does not smoke','41 or more','21 - 40','11 - 20','6 - 10','1 - 5','Less than one cigarette','Stopped smoking after discovering pregnancy']
											},
											ATTEMPTED_QUIT_SMOKING: {
												title: 'Has participant attempted to quit smoking?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											SAFE_SLEEPING: {
												title: 'Has home visitor discussed <strong>safe sleeping</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											SHAKEN_BABY_SYNDROME: {
												title: 'Has home visitor discussed <strong>shaken baby syndrome</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											PASENGER_SAFETY: {
												title: 'Has home visitor discussed <strong>child passenger safety</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											POISONING: {
												title: 'Has home visitor discussed <strong>poisonings</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											FIRE_SAFETY: {
												title: 'Has home visitor discussed <strong>fire safety (including scalds)</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											WATER_SAFETY: {
												title: 'Has home visitor discussed <strong>water safety (including drowning)</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options:{'1':'Yes','0':'No'}
											},
											PLAYGROUND_SAFETY: {
												title: 'Has home visitor discussed <strong>playground safety</strong> with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											HOUSEHOLD_LAST_UPDATE: {
												title: 'Last update',
												type: 'date',
												displayFormat: 'mm-dd-yy',
												create: false,
												edit: false
											}

										}
									}, function (data) {
										data.childTable.jtable('load');
									});	
							});
							return $img;
						}
					},
						PREGNANT_MOTHERS: {
						title: '',
						width: '1%',
						edit: false,
						create: false,
						display: function (pregData) {
							var $img = $('<img src="scripts/jtable/themes/custom_icons/pregnant.png" title="Pregnant Mother" />');
							$img.click(function () {
								$('#MiechvTableContainer').jtable('openChildTable',
									$img.closest('tr'),
									{
										title: 	pregData.record.LAST_NAME + ' - Pregnancy Questionaire',
										messages: messagePregnant,
										actions: {
											listAction:   'MiechvActions3.php?PARENT_ID=' + pregData.record.PARENT_ID, 
											createAction: 'MiechvActions3.php?action=create',
											updateAction: 'MiechvActions3.php?action=update',
											deleteAction: 'MiechvActions3.php?action=delete'
										},
										fields: {
											PARENT_ID:{
												type: 'hidden',
												defaultValue: pregData.record.PARENT_ID
											},
											PREGNANT_MOTHERS_ID: {
												key: true,
												create: false,
												edit: false,
												list: false
											},
											WEEKS_AFTER_DR_VISIT: {
												title: 'How many weeks pregnant was the participant when the first doctor visit occurred? <i>(do not count a visit that was only for a pregnancy test or only for WIC (the Special Supplemental Nutrition Program for Women, Infants, and Children)</i>)',
												list: false
											},
											MODE_OF_PAY: {
												title: 'Prenatal Care & Insurance: How did participant pay for prenatal care?',
												options: ['No health insurance to pay for prenatal care','Health insurance from job or job of husband, partner, or parents','Health insurance not from a job','Medicaid','Tricare or other military health care'],
												list: false
											},
											NO_OF_CIGS: {
												title: 'Smoking frequency: How many cigarettes does enrollee report smoking a day? (a pack has 20 cigarettes)',
												list: false,
												options: ['Does not smoke','41 or more','21 - 40','11 - 20','6 - 10','1 - 5','Less than one cigarette','Stopped smoking after discovering pregnancy']
											},
											DISCUSSED_NO_SMOKING: {
												title: 'Has the home visitor discussed not smoking during pregnancy with participant?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											ATTEMPT_STOP_SMOKING: {
												title: 'Has the participant attempted to stop smoking for at least one day or longer since becoming pregnant?',
												list: false,
												options: ['Does not smoke','Yes','No','Unknown']
											},
											PREGNANT_LAST_UPDATE: {
												title: 'Last update',
												type: 'date',
												displayFormat: 'mm-dd-yy',
												create: false,
												edit: false
											}
										}
									}, function (data) {
										data.childTable.jtable('load');
									});	
							});
							return $img;
						}
					},
						POSTPARTUM_MOTHERS: {
						title: '',
						width: '1%',
						edit: false,
						create: false,
						display: function (postData) {
							var $img = $('<img src="scripts/jtable/themes/custom_icons/postpartum.png" title="Postpartum Mother" />');
							$img.click(function () {
								$('#MiechvTableContainer').jtable('openChildTable',
									$img.closest('tr'),
									{
										title: 	postData.record.LAST_NAME + ' - Postpartum Questionaire',
										messages: messagePostpartum,
										actions: {
											listAction:   'MiechvActions4.php?PARENT_ID=' + postData.record.PARENT_ID, 
											createAction: 'MiechvActions4.php?action=create',
											updateAction: 'MiechvActions4.php?action=update',
											deleteAction: 'MiechvActions4.php?action=delete'
										},
										fields: {
											PARENT_ID:{
												type: 'hidden',
												defaultValue: postData.record.PARENT_ID
											},
											POSTPARTUM_MOTHERS_ID: {
												key: true,
												create: false,
												edit: false,
												list: false
											},
											REPEATED_PREGNANCY: {
												title: 'Has the mother experienced a repeat pregnancy in the past 12 months since giving birth to child enrolled in home visiting program?',
												type: 'radiobutton',
												list: false,
												option: {'1':'Yes','0':'No'}
											},
											PREGNANCY_DATE: {
												title: 'If yes, include date of pregnancy',
												type: 'date',
												displayFormat: 'mm-dd-yy',
												list: false
											},
											DEPRESSION_SCREENED: {
												title: 'Was the mother screened for maternal depression by 8 week postpartum?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											SCREENING_DATE: {
												title: 'If yes, include date of screening',
												type: 'date',
												displayFormat: 'mm-dd-yy',
												list: false
											},
											BREAST_FEEDING: {
												title: 'Did the mother initiate breastfeeding?',
												list: false,
												type: 'radiobutton',
												options: {'1':'Yes','0':'No'}
											},
											WEEKS_BEFORE_BREAST_FEEDING: {
												title: 'If yes, include number of weeks mother breastfed child?',
												list: false
											},
											STRESS_LEVEL: {
												title: 'Parent Stress: How well they coping with demands of parenthood and raising children?',
												list: false,
												options: ['Unknown','Very Well','Somewhat Well','Not Very Well','Not Very Well At All']
											},
											SUPPORT_SYSTEM: {
												title: 'Support System: Does the participant have a support system in place to help with demands of parenthood and raising children?',
												list: false,
												options: ['Unknown','Yes','No']
											},
											POSTPARTUM_LAST_UPDATE: {
												title: 'Last update',
												type: 'date',
												displayFormat: 'mm-dd-yy',
												create: false,
												edit: false
											}
										}
									}, function (data) {
										data.childTable.jtable('load');
									});	
							});
							return $img;
						}
					},
					CHILD_DETAILS: {
						title: '',
						width: '1%',
						edit: false,
						create: false,
						display: function (childData) {
							var $img = $('<img src="scripts/jtable/themes/custom_icons/child.png" title="Child Details" />');
							$img.click(function () {
								$('#MiechvTableContainer').jtable('openChildTable',
									$img.closest('tr'),
									{
										title: 	'The ' + childData.record.LAST_NAME + ' Children',
										messages: messageChild,
										actions: {
											listAction:   'MiechvActions5.php?PARENT_ID=' + childData.record.PARENT_ID, 
											createAction: 'MiechvActions5.php?action=create',
											updateAction: 'MiechvActions5.php?action=update',
											deleteAction: 'MiechvActions5.php?action=delete'
										},
										fields: {
											PARENT_ID:{
												type: 'hidden',
												defaultValue: childData.record.PARENT_ID
											},
											CHILD_ID: {
												key: true,
												create: false,
												edit: false,
												list: false
											},
											CHILD_ENROLLMENT_DATE: {
												title: 'Enrollment Date',
												width: '2%',
												type: 'date',
												displayFormat: 'mm-dd-yy'
											},
											CHILD_SSN: {
												title: 'Social Security Number',
												list: false,
												defaultValue: 'xxx-xx-xxxx'
											},		
											CHILD_LAST_NAME: {
												title: 'Last Name',
												list: false
											},
											CHILD_FIRST_NAME: {
												title: 'First Name',
											},
											CHILD_MIDDLE_NAME: {
												title: 'Middle Name',
												list: false
											},
											CHILD_BIRTH_DATE: {
												title: 'Date of Birth',
												type: 'date',
												displayFormat: 'mm-dd-yy',
												list: false
											},
											CHILD_SEX: {
												title: 'Sex',
												list: false,
												type: 'radiobutton',
												options: ['Female','Male']
											},
											CHILD_RACE: {
												title: 'Race',
												list: false,
												options: ['Unknown','American Indian / Alaska Native ','Asian','Black / African American','Hawaiin Native / Other Pacific Islander','White','Enrollee Refused','Other']
											},
											CHILD_ETHNICITY: {
												title: 'Ethnicity',
												list: false,
												options: ['Unknown','Hispanic / Latino','Non Hispanic / Latino','Enrollee Refused']
											},
											INSURANCE_STATUS: {
												title: '',
												width: '0.1%',
												edit: false,
												create: false,
												display: function (insData) {
													var $img = $('<img src="scripts/jtable/themes/custom_icons/insurance.png" title="Insurance Status" />');
													$img.click(function () {
														$('#MiechvTableContainer').jtable('openChildTable',
															$img.closest('tr'),
															{
																title: 	insData.record.CHILD_FIRST_NAME + ' - Insurance Status',
																messages: messageInsurance,
																actions: {
																	listAction:   'MiechvActions6.php?CHILD_ID=' + insData.record.CHILD_ID, 
																	createAction: 'MiechvActions6.php?action=create',
																	updateAction: 'MiechvActions6.php?action=update',
																	deleteAction: 'MiechvActions6.php?action=delete'
																},
																fields: {
																	CHILD_ID: {
																		type: 'hidden',
																		defaultValue: insData.record.CHILD_ID
																	},
																	INSURANCE_STATUS_ID: {
																		key: true,
																		create: false,
																		edit: false,
																		list: false
																	},
																	STATUS: {
																		title: 'Child Insurance Status',
																		options: ['Unknown','Medicaid / SCHCHIP','Private','Tri-Care','Other']
																	},
																	INSURANCE_LAST_UPDATE: {
																		title: 'Last update',
																		type: 'date',
																		displayFormat: 'mm-dd-yy',
																		create: false,
																		edit: false
																	}
																		
																}
																
															}, function (data) {
																data.childTable.jtable('load');
															});	
													});
													return $img;
												}
											},
											KIPS_HOME_SCREENING: {
												title: '',
												width: '0.1%',
												edit: false,
												create: false,
												display: function (kipsData) {
													var $img = $('<img src="scripts/jtable/themes/custom_icons/kips.png" title="KIPS Screening" />');
													$img.click(function () {
														$('#MiechvTableContainer').jtable('openChildTable',
															$img.closest('tr'),
															{
																title: 	kipsData.record.CHILD_FIRST_NAME + ' - KIPS Screening',
																messages: messageScreening,
																actions: {
																	listAction:   'MiechvActions7.php?CHILD_ID=' + kipsData.record.CHILD_ID, 
																	createAction: 'MiechvActions7.php?action=create',
																	updateAction: 'MiechvActions7.php?action=update',
																	deleteAction: 'MiechvActions7.php?action=delete'
																},
																fields: {
																	
																	CHILD_ID: {
																		type: 'hidden',
																		defaultValue: kipsData.record.CHILD_ID
																	},
																	KIPS_HOME_SCREENING_ID: {
																		key: true,
																		create: false,
																		edit: false,
																		list: false
																	},
																	KIPS_SCORE: {
																		title: 'KIPS / Home Score'
																	},
																	DEMONSTRATES_SUPPORT: {
																		title: 'Are parent(s) demonstrating <strong>supportive actions</strong> for child learning and development?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}															
																	},
																	DEMONSTRATES_KNOWLEDGE: {
																		title: 'Are parent(s) demonstrating <strong>knowledge</strong> for child learning and development?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}															
																	},
																	POSITIVE_BEHAVIOR: {
																		title: 'Are parent(s) demonstrating <strong>positive parenting behaviors and parent-child relationships</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}															
																	},
																	KIPS_LAST_UPDATE: {
																		title: 'Last update',
																		type: 'date',
																		displayFormat: 'mm-dd-yy',
																		create: false,
																		edit: false
																	}
																}																
															}, function (data) {
																data.childTable.jtable('load');
															});	
													});
													return $img;
												}
											},
											ASQ_SCREENING: {
												title: '',
												width: '0.1%',
												edit: false,
												create: false,
												display: function (asqData) {
													var $img = $('<img src="scripts/jtable/themes/custom_icons/asq.png" title="ASQ Screening" />');
													$img.click(function () {
														$('#MiechvTableContainer').jtable('openChildTable',
															$img.closest('tr'),
															{
																title: 	asqData.record.CHILD_FIRST_NAME + ' - ASQ Screening',
																messages: messageScreening,
																actions: {
																	listAction:   'MiechvActions8.php?CHILD_ID=' + asqData.record.CHILD_ID,
																	createAction: 'MiechvActions8.php?action=create',
																	updateAction: 'MiechvActions8.php?action=update',
																	deleteAction: 'MiechvActions8.php?action=delete'
																},
																fields: {																	
																	CHILD_ID: {
																		type: 'hidden',
																		defaultValue: asqData.record.CHILD_ID
																	},
																	ASQ_SCREENING_ID: {
																		key: true,
																		create: false,
																		edit: false,
																		list: false
																	},
																	EPSDT_VISITS: {
																		title: 'How many <strong>EPSDT visits</strong> did the child receive by 12 months of age?',
																		list: false,
																		options: ['0','1','2','3','4','5','6','7','8','9','10 or more']
																	},																	
																	COMMUNICATION_SCREEN: { 
																		title: '<i>Communication Skills</i>: <strong>Screened by 12 months</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	COMMUNICATION_PROBLEM: {
																		title: '<i>Communication Skills</i>: <strong>Problem identified</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	COMMUNICATION_REFERRAL: { 
																		title: '<i>Communication Skills</i>: <strong>Referral Made</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	PERSONAL_SCREEN: { 
																		title: '<i>Personal / Social</i>: <strong>Screened by 12 months</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	PERSONAL_PROBLEM: { 
																		title: '<i>Personal / Social</i>: <strong>Problem identified</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	PERSONAL_REFERRAL: { 
																		title: '<i>Personal / Social</i>: <strong>Referral Made</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	SOLVING_SCREEN: { 
																		title: '<i>Problem Solving</i>: <strong>Screened by 12 months</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	SOLVING_PROBLEM: { 
																		title: '<i>Problem Solving</i>: <strong>Problem identified</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	SOLVING_REFERRAL: { 
																		title: '<i>Problem Solvings</i>: <strong>Referral Made</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	EMOTIONAL_SCREEN: { 
																		title: '<i>Social Emotional</i>: <strong>Screened by 12 months</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	EMOTIONAL_PROBLEM: { 
																		title: '<i>Social Emotional</i>: <strong>Problem identified</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	EMOTIONAL_REFERRAL: { 
																		title: '<i>Social Emotional</i>: <strong>Referral Made</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	GROWTH_SCREEN: { 
																		title: '<i>Personal Growth / Fine Moter</i>: <strong>Screened by 12 months?</strong>',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	GROWTH_PROBLEM: { 
																		title: '<i>Personal Growth / Fine Moter</i>: <strong>Problem identified</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	GROWTH_REFERRAL: { 
																		title: '<i>Personal Growth / Fine Moter</i>: <strong>Referral Made</strong>?',
																		list: false,
																		type: 'radiobutton',
																		options: {'1':'Yes','0':'No'}
																	},
																	ASQ_LAST_UPDATE: {
																		title: 'Last update',
																		type: 'date',
																		displayFormat: 'mm-dd-yy',
																		create: false,
																		edit: false
																	}
																	
																}																
															}, function (data) {
																data.childTable.jtable('load');
															});	
													});
													return $img;
												}
											}
											
											
											
											
										}
									}, function (data) {
										data.childTable.jtable('load');
									});	
							});
							return $img;
						}
					}
					
				}
			});

			//Load person list from server
			$('#MiechvTableContainer').jtable('load');

		});

	</script>
 
  </body>
</html>
