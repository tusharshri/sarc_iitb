<?php

/**
 *  README for sample service
 *
 *  This generated sample service contains functions that illustrate typical service operations.
 *  Use these functions as a starting point for creating your own service implementation. Modify the 
 *  function signatures, references to the database, and implementation according to your needs. 
 *  Delete the functions that you do not use.
 *
 *  Save your changes and return to Flash Builder. In Flash Builder Data/Services View, refresh 
 *  the service. Then drag service operations onto user interface components in Design View. For 
 *  example, drag the getAllItems() operation onto a DataGrid.
 *  
 *  This code is for prototyping only.
 *  
 *  Authenticate the user prior to allowing them to call these methods. You can find more 
 *  information at http://www.adobe.com/go/flex_security
 *
 */
class StudentService {

	var $username = "sarciitborg";
	var $password = "j@g@njyoti";
	var $server ="admin@sarc-iitb.org";
	var $port = "3306";
	var $databasename = "sarc_iitb";
	var $tablename = "users";

	var $connection;

	/**
	 * The constructor initializes the connection to database. Everytime a request is 
	 * received by Zend AMF, an instance of the service class is created and then the
	 * requested method is invoked.
	 */
	public function __construct() {
	  	$this->connection = mysqli_connect(
	  							$this->server,  
	  							$this->username,  
	  							$this->password, 
	  							$this->databasename,
								$this->port
	  						);

		$this->throwExceptionOnError($this->connection);
	}

	/**
	 * Returns all the rows from the table.
	 *
	 * Add authroization or any logical checks for secure access to your data 
	 *
	 * @return array
	 */
	public function getAllStudent() {

		$stmt = mysqli_prepare($this->connection, "SELECT * FROM $this->tablename");		
		$this->throwExceptionOnError();
		
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		$rows = array();
		
		mysqli_stmt_bind_result($stmt, $row->id, $row->rollNumber, $row->ldapId, $row->salutation, $row->firstName, $row->middleName, $row->lastName, $row->nickName, $row->gender, $row->batch, $row->degree, $row->departmentCode, $row->hostel, $row->roomNumber, $row->dateOfBirth, $row->phoneNumber, $row->emailId, $row->skypeId, $row->createdAt, $row->updatedAt);
		
	    while (mysqli_stmt_fetch($stmt)) {
	      $row->dateOfBirth = new DateTime($row->dateOfBirth);
	      $row->createdAt = new DateTime($row->createdAt);
	      $row->updatedAt = new DateTime($row->updatedAt);
	      $rows[] = $row;
	      $row = new stdClass();
	      mysqli_stmt_bind_result($stmt, $row->id, $row->rollNumber, $row->ldapId, $row->salutation, $row->firstName, $row->middleName, $row->lastName, $row->nickName, $row->gender, $row->batch, $row->degree, $row->departmentCode, $row->hostel, $row->roomNumber, $row->dateOfBirth, $row->phoneNumber, $row->emailId, $row->skypeId, $row->createdAt, $row->updatedAt);
	    }
		
		mysqli_stmt_free_result($stmt);
	    mysqli_close($this->connection);
	
	    return $rows;
	}

	/**
	 * Returns the item corresponding to the value specified for the primary key.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * @return stdClass
	 */
	public function getStudentByID($itemID) {
		
		$stmt = mysqli_prepare($this->connection, "SELECT * FROM $this->tablename where id=?");
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'i', $itemID);		
		$this->throwExceptionOnError();
		
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_result($stmt, $row->id, $row->rollNumber, $row->ldapId, $row->salutation, $row->firstName, $row->middleName, $row->lastName, $row->nickName, $row->gender, $row->batch, $row->degree, $row->departmentCode, $row->hostel, $row->roomNumber, $row->dateOfBirth, $row->phoneNumber, $row->emailId, $row->skypeId, $row->createdAt, $row->updatedAt);
		
		if(mysqli_stmt_fetch($stmt)) {
	      $row->dateOfBirth = new DateTime($row->dateOfBirth);
	      $row->createdAt = new DateTime($row->createdAt);
	      $row->updatedAt = new DateTime($row->updatedAt);
	      return $row;
		} else {
	      return null;
		}
	}

	/**
	 * Returns the item corresponding to the value specified for the primary key.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * @return stdClass
	 */
	public function createStudent($item) {

		$stmt = mysqli_prepare($this->connection, "INSERT INTO $this->tablename (id, rollNumber, ldapId, salutation, firstName, middleName, lastName, nickName, gender, batch, degree, departmentCode, hostel, roomNumber, dateOfBirth, phoneNumber, emailId, skypeId, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$this->throwExceptionOnError();

		mysqli_stmt_bind_param($stmt, 'issssssssississsssss', $item->id, $item->rollNumber, $item->ldapId, $item->salutation, $item->firstName, $item->middleName, $item->lastName, $item->nickName, $item->gender, $item->batch, $item->degree, $item->departmentCode, $item->hostel, $item->roomNumber, $item->dateOfBirth->toString('YYYY-MM-dd HH:mm:ss'), $item->phoneNumber, $item->emailId, $item->skypeId, $item->createdAt->toString('YYYY-MM-dd HH:mm:ss'), $item->updatedAt->toString('YYYY-MM-dd HH:mm:ss'));
		$this->throwExceptionOnError();

		mysqli_stmt_execute($stmt);		
		$this->throwExceptionOnError();

		$autoid = $item->id;

		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);

		return $autoid;
	}

	/**
	 * Updates the passed item in the table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * @param stdClass $item
	 * @return void
	 */
	public function updateStudent($item) {
	
		$stmt = mysqli_prepare($this->connection, "UPDATE $this->tablename SET rollNumber=?, ldapId=?, salutation=?, firstName=?, middleName=?, lastName=?, nickName=?, gender=?, batch=?, degree=?, departmentCode=?, hostel=?, roomNumber=?, dateOfBirth=?, phoneNumber=?, emailId=?, skypeId=?, createdAt=?, updatedAt=? WHERE id=?");		
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'ssssssssississsssssi', $item->rollNumber, $item->ldapId, $item->salutation, $item->firstName, $item->middleName, $item->lastName, $item->nickName, $item->gender, $item->batch, $item->degree, $item->departmentCode, $item->hostel, $item->roomNumber, $item->dateOfBirth->toString('YYYY-MM-dd HH:mm:ss'), $item->phoneNumber, $item->emailId, $item->skypeId, $item->createdAt->toString('YYYY-MM-dd HH:mm:ss'), $item->updatedAt->toString('YYYY-MM-dd HH:mm:ss'), $item->id);		
		$this->throwExceptionOnError();

		mysqli_stmt_execute($stmt);		
		$this->throwExceptionOnError();
		
		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);
	}

	/**
	 * Deletes the item corresponding to the passed primary key value from 
	 * the table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * @return void
	 */
	public function deleteStudent($itemID) {
				
		$stmt = mysqli_prepare($this->connection, "DELETE FROM $this->tablename WHERE id = ?");
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'i', $itemID);
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);
	}


	/**
	 * Returns the number of rows in the table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 */
	public function count() {
		$stmt = mysqli_prepare($this->connection, "SELECT COUNT(*) AS COUNT FROM $this->tablename");
		$this->throwExceptionOnError();

		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_result($stmt, $rec_count);
		$this->throwExceptionOnError();
		
		mysqli_stmt_fetch($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_free_result($stmt);
		mysqli_close($this->connection);
		
		return $rec_count;
	}


	/**
	 * Returns $numItems rows starting from the $startIndex row from the 
	 * table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * 
	 * @return array
	 */
	public function getStudent_paged($startIndex, $numItems) {
		
		$stmt = mysqli_prepare($this->connection, "SELECT * FROM $this->tablename LIMIT ?, ?");
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'ii', $startIndex, $numItems);
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		$rows = array();
		
		mysqli_stmt_bind_result($stmt, $row->id, $row->rollNumber, $row->ldapId, $row->salutation, $row->firstName, $row->middleName, $row->lastName, $row->nickName, $row->gender, $row->batch, $row->degree, $row->departmentCode, $row->hostel, $row->roomNumber, $row->dateOfBirth, $row->phoneNumber, $row->emailId, $row->skypeId, $row->createdAt, $row->updatedAt);
		
	    while (mysqli_stmt_fetch($stmt)) {
	      $row->dateOfBirth = new DateTime($row->dateOfBirth);
	      $row->createdAt = new DateTime($row->createdAt);
	      $row->updatedAt = new DateTime($row->updatedAt);
	      $rows[] = $row;
	      $row = new stdClass();
	      mysqli_stmt_bind_result($stmt, $row->id, $row->rollNumber, $row->ldapId, $row->salutation, $row->firstName, $row->middleName, $row->lastName, $row->nickName, $row->gender, $row->batch, $row->degree, $row->departmentCode, $row->hostel, $row->roomNumber, $row->dateOfBirth, $row->phoneNumber, $row->emailId, $row->skypeId, $row->createdAt, $row->updatedAt);
	    }
		
		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);
		
		return $rows;
	}
	
	
	/**
	 * Utility function to throw an exception if an error occurs 
	 * while running a mysql command.
	 */
	private function throwExceptionOnError($link = null) {
		if($link == null) {
			$link = $this->connection;
		}
		if(mysqli_error($link)) {
			$msg = mysqli_errno($link) . ": " . mysqli_error($link);
			throw new Exception('MySQL Error - '. $msg);
		}		
	}
}

?>
