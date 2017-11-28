<?php
// activerecord3/core/database/model.php
namespace database;
		
abstract class model {
    protected $tableName;
    
	
	 public function save()
    {
        $db = dbConn::getConnection();
		if (!isset($this->id)) {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
        $statement = $db->prepare($sql);
        $statement->execute();
	}
	
	public function insert() {
		$array = get_object_vars($this);
		array_pop($array);
        array_shift($array);
		$columns = array_keys($array);
        $columnString = implode(', ', $columns);
        $valueString = implode(', ', $array);
		$table = $this->tableName; 
		$sql = 'INSERT INTO ' . $table .  ' (' . $columnString . ') VALUES  (' . $valueString . ')';
		echo "I just Instered a new row with the values " . $valueString . "<br>";
		return $sql;

    } 
	 public function update() {
	
	    $array = get_object_vars($this);
	    array_pop($array);
        array_shift($array);
		$sql = 'UPDATE ' . $this->tableName . ' SET ';
		foreach($array as $field => $value)
			if (isset($value)) 
                $values[] = $field.' = '. $value ;
			  
		$sql .= implode(', ', $values);	
		$sql .= ' WHERE id=' . $this->id;
       
		echo 'I just updated record ' . $this->id;
		return $sql;
		
    }

    public function delete() {
		$sql = 'DELETE FROM ' . $this->tableName . ' WHERE id=' . $this->id;
		$db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute(); 
        echo 'I just deleted record ' . $this->id .' from the ' . $this->tableName . ' table';
    }
}


?>
