<?php
date_default_timezone_set('Europe/Berlin');

class datab 
{
private $table = "Mission";

private $con;

public function __construct(?string $server="172.17.0.2", ?string $user="user", ?string $passwd="secret", ?string $database="demo") {
$this->con = new mysqli($server, $user, $passwd, $database);

if ($this->con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if ( !$this->con->query( "DESCRIBE `" . $this->table . "`" ) ) {
    if ($this->con->query($this->getSchema()) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $this->con->error;
  }
}

if ( !$this->con->query( "DELETE FROM `" . $this->table . "` WHERE timest < (NOW() - INTERVAL 14 DAY)" ) ) {
  echo "Error creating table: " . $this->con->error;
}

}

private function getSchema() {
  return "CREATE TABLE " . $this->table . "
  (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  descr VARCHAR(50) NOT NULL,
  timest TIMESTAMP NOT NULL
  )";
}

public function newMission(string $time, string $descr){
    $stmt = $this->con->prepare("INSERT INTO " . $this->table . " (descr,timest) VALUES (?,FROM_UNIXTIME(?))");
    $stmt->bind_param("ss", htmlspecialchars($descr), substr($time, 0, 10));
    $stmt->execute();
    $stmt->close();
}

public function getMissions(){
    $stmt = $this->con->prepare("SELECT UNIX_TIMESTAMP(timest) as timest, descr FROM " . $this->table . " WHERE timest < (NOW() - INTERVAL 12 HOUR) ORDER BY timest DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

function __destruct() {
    $this->con->close();
  }
}

?>