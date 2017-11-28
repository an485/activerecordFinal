<html>

<head><meta charset="UTF-8">
<title>Refactor Active Record</title>
<?php 
		//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Load Core Namespace Classes
class loadClass  {
    static public function core($className)
	{
	
	//  echo $class;
	$class = 'core/' . str_replace('\\', '/', $className) . '.php';
	
	// echo $path . '<br>';
		if (is_file($class)) {
				include $class;
				return;
			}
	} //end of Core classes
	
	static public function models($className)
	{
			//this is useful to see what class and namespace is being asked for
			//echo $class . '<br>';
			$class = 'models/' . str_replace('\\', '/', $className) . '.php';
			//this is useful to see what path is being asked for
			//echo $path . '<br>';
			if (is_file($class)) {
				include $class;
				return;
				}
	}  //end of Model classes
}  //end namespace loader
	
	
	spl_autoload_register(array('loadClass', 'core'));
	spl_autoload_register(array('loadClass', 'models'));
	
	?>
	</head>

<body>
<?php 

   echo "<h1> Get all Rows from Todos Table</h1><br>";
   $allRecords = todos::findAll();
   echo database\tables::print_Table($allRecords);
	//print_r ($records);
 
	echo "<h1> Single Row with an ID of 1</h1><br>";
	$record = todos::findOne('1');
    echo database\tables::print_Table($record);

	
	echo "<h1>Delete a Record</h1><br>";	
	$delRecord = new todo();
    $delRecord->id ='3';
	echo $delRecord->delete();
	
	
	echo "<h1>Update a Record</h1><br>";
    $upRecord = new todo();
    $upRecord->id ='2';
	$upRecord->owneremail ="'updatedemail-1234@njit.edu'";
	$upRecord->ownerid ="'5'";
	$upRecord->duedate ="'2017-12-03 00:00:00'";
	$upRecord->message ="'I updated this record'";
    echo $upRecord->save();
	$anotherRecord = todos::findOne('2');
	echo database\tables::print_Table($anotherRecord);
	
	
	
	echo "<h1>Insert a Record</h1><br>";
    $insRecord = new todo();
	//$insRecord->id ="'";
	$insRecord->owneremail ="'insertedemail-1234@njit.edu'";
    $insRecord->ownerid ="'666'";
	$insRecord->createddate ="'2017-11-19 00:00:00'";
	$insRecord->duedate ="'2017-12-05 00:00:00'";
	$insRecord->message ="'I inserted this record'";
	$insRecord->isdone ="'0'";
	echo $insRecord->save(); 

	
	
	/* //////////////////  ACCOUNTS  ///////////////////////*/

	echo "<hr>";
	
    echo "<h1> Get all Rows from Accounts Table</h1><br>";
    $allRecords = accounts::findAll();
    echo database\tables::print_Table($allRecords);
	
 
	echo "<h1> Single Row with an ID of 1</h1><br>";
	$record = accounts::findOne('1');
    echo database\tables::print_Table($record);

	echo "<h1>Delete a Record</h1><br>";	
	$delRecord = new account();
    $delRecord->id ='5';
	echo $delRecord->delete();
	
	
	echo "<h1>Insert a Record</h1><br>";
    $insrtRecord = new account();
	//$insRecord->id ="'";
	$insrtRecord->email ="'insertedemail-456@njit.edu'";
    $insrtRecord->fname ="'Bob'";
	$insrtRecord->lname ="'Saget'";
	$insrtRecord->phone ="'123-789-5555'";
	$insrtRecord->birthday ="'1982-11-30'";
	$insrtRecord->gender ="'male'";
	$insrtRecord->password ="'xyz123'";
	echo  $insrtRecord->save(); 

	echo "<h1>Update a Record</h1><br>";
    $upRecord = new account();
    $upRecord->id ='3';
	$upRecord->email ="'updatedemail-456@njit.edu'";
	$upRecord->fname ="'Martha'";
	$upRecord->lname ="'Saget'";
	$upRecord->phone ="'123-555-5555'";
    echo $upRecord->save();
	$anotheracctRecord = accounts::findOne('3');
	echo database\tables::print_Table($anotheracctRecord);
		
	
?>





</body>
</html>