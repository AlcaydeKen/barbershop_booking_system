<?php
    /*
		Title Function That Echo The Page Title In Case The Page Has The Variable $pageTitle And Echo Default Title For Other Pages
	*/
	function getTitle()
	{
		global $pageTitle;
		if(isset($pageTitle))
			echo $pageTitle." | Barbershop Website";
		else
			echo "Barbershop Website";
	}

	/*
		This function returns the number of items in a given table
	*/

    function countItems($item,$table)
	{
		global $con;
		$stat_ = $con->prepare("SELECT COUNT($item) FROM $table");
		$stat_->execute();
		
		return $stat_->fetchColumn();
	}

    /*
	
	** Check Items Function
	** Function to Check Item In Database [Function with Parameters]
	** $select = the item to select [Example : user, item, category]
	** $from = the table to select from [Example : users, items, categories]
	** $value = The value of select [Example: Ossama, Box, Electronics]

	*/
	function checkItem($select, $from, $value)
	{
		global $con;
		$statment = $con->prepare("SELECT $select FROM $from WHERE $select = ? ");
		$statment->execute(array($value));
		$count = $statment->rowCount();
		
		return $count;
	}


  	/*
    	==============================================
    	TEST INPUT FUNCTION, IS USED FOR SANITIZING USER INPUTS
    	AND REMOVE SUSPICIOUS CHARS and Remove Extra Spaces
    	==============================================
	
	*/

  	function test_input($data) 
  	{
      	$data = trim($data);
      	$data = stripslashes($data);
      	$data = htmlspecialchars($data);
      	return $data;
  	}

	function logUserActivity($userId, $action) {
		global $con;
	
		// Get the user's username based on user_id
		$stmt = $con->prepare("SELECT name FROM users WHERE id = :userId");
		$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
	
		// Check if user information is found
		if ($user) {
			$username = $user['name'];
	
			// Log the activity with user_id and username
			$stmt = $con->prepare("INSERT INTO user_logs (user_id, username, action, date) VALUES (:userId, :username, :action, NOW())");
			$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
			$stmt->bindParam(':username', $username, PDO::PARAM_STR);
			$stmt->bindParam(':action', $action, PDO::PARAM_STR);
			$stmt->execute();
		} else {
			// Handle the case where the user information is not found
			// You might want to log an error or handle it based on your application's logic
		}
	}
	
	
?>

