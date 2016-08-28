<?php
    require("stdctrls.inc.php");
    class EditColor extends Edit {
    /*
        function dumpJSEvent($event){
                if ($event!=null){
                        echo "function $event(event)\n";
                        echo "{\n\n";
                        echo "var event = event || window.event;\n";            //To get the right event object
                        echo "var params=null;\n";                              //For Ajax calls

                        //******* implementacion de adalberto reyes valenzuela**********
                        //echo $event;
                        if(strpos($event,"JSBlur")!==false)
                           echo "\ndocument.getElementById(\"".$this->getName()."\").style.background=\"#FFFFFF\"\n";
                        if(strpos($event,"JSKeyPress")!==false){
                           echo "\nvar keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
                           if(keyCode==13){
                              tab(document.getElementById(\"".$this->getName()."\"),event)  ;
                              return false;
                            }";
                        }
                        if(strpos($event,"JSFocus")!==false){
                           echo "\ndocument.getElementById(\"".$this->getName()."\").style.background=\"#FFAD5B\"\n";
                           echo "\ndocument.getElementById(\"".$this->getName()."\").select()\n";
                        }
                        //******* fin implementacion de adalberto reyes valenzuela**********

                        if ($this->inheritsFrom('CustomPage'))
                        {
                            $this->$event($this, array());
                        }
                        else
                        {
                            if ($this->owner!=null) $this->owner->$event($this, array());
                        }
                        echo "\n}\n";
                        echo "\n";
                }
        }   */
    }                                 

?>
