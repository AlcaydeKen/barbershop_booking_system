
<?php
    
    /*
    	=========================================================================================================================
		Title Function That Echo The Page Title In Case The Page Has The Variable $pageTitle And Echo Default Title For Other Pages
		=========================================================================================================================
	*/

	function getTitle()
	{
		global $pageTitle;
		if(isset($pageTitle))
			echo $pageTitle.' | Barbershop Salon';
		else
			echo "Barbershop | Barbershop Salon";
	}

	/*
		=============================================================
		** Count Items Function
		** This function counts and return the number of elements in a given table
		==============================================================

	*/


    function countItems($item,$table)
	{
		global $con;
		$stat_ = $con->prepare("SELECT COUNT($item) FROM $table");
		$stat_->execute();
		
		return $stat_->fetchColumn();
	}

    /*
		=============================================================
		** Check Items Function
		** Function to Check Item In Database [Function with Parameters]
		** $select = the item to select [Example : user, item, category]
		** $from = the table to select from [Example : users, items, categories]
		** $value = The value of select [Example: Ossama, Box, Electronics]
		==============================================================

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

	function logAdminActivity($adminId, $action) {
		global $con;
	
		// Get the admin's username based on admin_id
		$stmt = $con->prepare("SELECT username FROM barber_admin WHERE admin_id = :adminId");
		$stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
		$stmt->execute();
		$admin = $stmt->fetch(PDO::FETCH_ASSOC);
	
		// Check if admin information is found
		if ($admin) {
			$adminUsername = $admin['username'];
	
			// Log the activity with admin_id and username
			$stmt = $con->prepare("INSERT INTO admin_logs (admin_id, admin_username, action) VALUES (:adminId, :adminUsername, :action)");
			$stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
			$stmt->bindParam(':adminUsername', $adminUsername, PDO::PARAM_STR);
			$stmt->bindParam(':action', $action, PDO::PARAM_STR);
			$stmt->execute();
		} else {
			// Handle the case where the admin information is not found
			// You might want to log an error or handle it based on your application's logic
		}
	}
	

	function getAdminIdByUsername($adminUsername)
	{
		global $con;  // Assuming $con is your PDO or MySQLi connection

		// Retrieve admin ID based on the username
		$query = "SELECT admin_id FROM barber_admin WHERE username = :username LIMIT 1";
		$stmt = $con->prepare($query);
		$stmt->bindParam(':username', $adminUsername, PDO::PARAM_STR);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($result) {
			return $result['admin_id'];
		} else {
			return null;  // Return null if admin is not found
		}
	}

	


	
	

