<?php
class DBController
{
	private $host = "localhost";
	private $user = "hangpt";
	private $password = "122904";
	private $database = "web_prog";
	private $conn;

	function __construct()
	{
		$this->conn = $this->connectDB();
	}

	function connectDB()
	{
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		return $conn;
	}

	function runQuery($query)
	{
		$result = mysqli_query($this->conn, $query);
                if ($result === FALSE) {
                    die(mysqli_error($this->conn));
                }

		while ($row = mysqli_fetch_assoc($result)) { 
			$resultset[] = $row;
		}
		if (!empty($resultset))
			return $resultset;
	}

	function numRows($query)
	{
		$result  = mysqli_query($this->conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
