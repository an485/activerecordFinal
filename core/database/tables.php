<?php
// activerecordFinal/core/database/tables.php
namespace database;

class tables {
    
    static public function print_Table($rows) {
		$table = "<table cellpadding='6'>";		
		foreach ($rows as $value){			
		  $table .='<tr>';
		     foreach($value as $value2) {
                    $table .= '<td>' . htmlspecialchars($value2) . '</td>';
                  } 
			$table .= '</tr>';
		}
			$table .= '</table>';
		return $table;
		
		}
		
}


?>
