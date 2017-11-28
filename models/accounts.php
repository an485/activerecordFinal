<?php
	

final class accounts extends database\collection {
    protected static $modelName = 'account';
	
	 public function __construct()
    {
       
    }
	
	//destruct and print the Html
    public function __destruct()
    {
      //stringFunctions::printThis($this->html);
    }

	
}

?>
