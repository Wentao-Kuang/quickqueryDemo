<?php
require 'connect.php';
$username = 'root';
$password = '19880818';
$DSN = 'mysql:host=127.0.0.1;port=3306;dbname=quickquery';
//$db = \atk4\data\Persistence::connect($DSN,$username,$password);

try {
		$db = new \atk4\data\Persistence_SQL($DSN, $username, $password);
	} catch (PDOException $e) {
    throw new \atk4\ui\Exception([
        'requires access to the database. See "database.php"',
    ], null, $e);
}

class Company extends \atk4\data\Model {
      public $table = 'company';
      function init() {
          parent::init();

          $this->addField('name',['required'=>true]);
          $this->addField('clientId', ['required'=>true]);
          $this->addField('clientSecret', ['required'=>true]);
          $this->addField('redirectUri', ['required'=>true]);
      }
  }

/*
try {
    $conn = new PDO("mysql:host=$localhost;dbname=quickquery", $username, $password);

    $sql = "SELECT * FROM Company;";
	$result = $conn->query($sql);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
*/

?>
