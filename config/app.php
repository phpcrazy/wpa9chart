<?php 

/*

class Config 
{
	public function nottouse() 
	{
		$dir = "config";
		if (is_dir($dir)) 
		{
    		if ($dh = opendir($dir)) 
    		{
		        while (($file = readdir($dh)) !== false) 
		        {
        	    	// echo $file . "<br />";
        	    	if(strpos($file,'php') !== FALSE) {
        	    		if($file != 'config.php') {
        	    			include_once($file);
        	    		}
        	    	} 
        	    	echo "<br />";

        		}
        		closedir($dh);
    		}
		}
	}
}
*/

return array(
    'default_chart' => 'Line'
    );
?>