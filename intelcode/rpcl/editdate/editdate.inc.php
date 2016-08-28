<?php
      //Includes
        require_once("rpcl/rpcl.inc.php");
        use_unit("stdctrls.inc.php");
        //Class definition

        class EditDate extends CustomEdit
        {
            function __construct($aowner = null)
            {
                parent::__construct($aowner);
            }
        function dumpHeaderCode()
        {
        parent::dumpHeaderCode();
        echo "<script type=\"text/javascript\"> var pathAbsolute='".VCL_HTTP_PATH."/editdate/icons/';</script>\n";
        echo "<script type=\"text/javascript\" src=\"".VCL_HTTP_PATH."/editdate/acc_calendar.js\"></script>\n";

        }
            function dumpContents()
            {
//                parent::dumpContents();
                // set type as file
                $type = 'text';

                $attributes = $this->getCommonAttributes();
                $style = $this->getCommonStyles();

                if ($style != "")  $style = "style=\"$style\"";

                if (($this->ControlState & csDesigning) != csDesigning)
                {
                        if ($this->hasValidDataField())
                        {
                                //The value to show on the field is the one from the table
                                $this->_text = $this->readDataFieldValue();

                                //Dumps hidden fields to know which is the record to update
                                $this->dumpHiddenKeyFields();
                        }
                }

                // call the OnShow event if assigned so the Text property can be changed
                if ($this->_onshow != null)
                {
                        $this->callEvent('onshow', array());
                }
         echo "\n<label for=\"$this->_name\">
               \n<input class='fecha rang100' name=\"$this->_name\" id=\"$this->_name\" type=\"$type\"  value=\"$this->_text\" $style $attributes />
               \n</label>";
                // add a hidden field so we can determine which event for the edit was fired
                if ($this->_onclick != null || $this->_ondblclick != null)
                {
                        $hiddenwrapperfield = $this->getJSWrapperHiddenFieldName();
                        echo "<input type=\"hidden\" id=\"$hiddenwrapperfield\" name=\"$hiddenwrapperfield\" value=\"\" />";
                }
            }


        /*
        * Publish the events for the Edit component
        */
        function getOnClick                     () { return $this->readOnClick(); }
        function setOnClick                     ($value) { $this->writeOnClick($value); }

        function getOnDblClick                  () { return $this->readOnDblClick(); }
        function setOnDblClick                  ($value) { $this->writeOnDblClick($value); }

        function getOnSubmit                    () { return $this->readOnSubmit(); }
        function setOnSubmit                    ($value) { $this->writeOnSubmit($value); }

        /*
        * Publish the JS events for the Edit component
        */
        function getjsOnBlur                    () { return $this->readjsOnBlur(); }
        function setjsOnBlur                    ($value) { $this->writejsOnBlur($value); }

        function getjsOnChange                  () { return $this->readjsOnChange(); }
        function setjsOnChange                  ($value) { $this->writejsOnChange($value); }

        function getjsOnClick                   () { return $this->readjsOnClick(); }
        function setjsOnClick                   ($value) { $this->writejsOnClick($value); }

        function getjsOnDblClick                () { return $this->readjsOnDblClick(); }
        function setjsOnDblClick                ($value) { $this->writejsOnDblClick($value); }

        function getjsOnFocus                   () { return $this->readjsOnFocus(); }
        function setjsOnFocus                   ($value) { $this->writejsOnFocus($value); }

        function getjsOnMouseDown               () { return $this->readjsOnMouseDown(); }
        function setjsOnMouseDown               ($value) { $this->writejsOnMouseDown($value); }

        function getjsOnMouseUp                 () { return $this->readjsOnMouseUp(); }
        function setjsOnMouseUp                 ($value) { $this->writejsOnMouseUp($value); }

        function getjsOnMouseOver               () { return $this->readjsOnMouseOver(); }
        function setjsOnMouseOver               ($value) { $this->writejsOnMouseOver($value); }

        function getjsOnMouseMove               () { return $this->readjsOnMouseMove(); }
        function setjsOnMouseMove               ($value) { $this->writejsOnMouseMove($value); }

        function getjsOnMouseOut                () { return $this->readjsOnMouseOut(); }
        function setjsOnMouseOut                ($value) { $this->writejsOnMouseOut($value); }

        function getjsOnKeyPress                () { return $this->readjsOnKeyPress(); }
        function setjsOnKeyPress                ($value) { $this->writejsOnKeyPress($value); }

        function getjsOnKeyDown                 () { return $this->readjsOnKeyDown(); }
        function setjsOnKeyDown                 ($value) { $this->writejsOnKeyDown($value); }

        function getjsOnKeyUp                   () { return $this->readjsOnKeyUp(); }
        function setjsOnKeyUp                   ($value) { $this->writejsOnKeyUp($value); }

        function getjsOnSelect                  () { return $this->readjsOnSelect(); }
        function setjsOnSelect                  ($value) { $this->writejsOnSelect($value); }



        /*
        * Publish the properties for the component
        */
        function getBorderStyle()
        {
                return $this->readBorderStyle();
        }
        function setBorderStyle($value)
        {
                $this->writeBorderStyle($value);
        }

        function getColor()
        {
                return $this->readColor();
        }
        function setColor($value)
        {
                $this->writeColor($value);
        }

        function getDataField()
        {
                return $this->readDataField();
        }
        function setDataField($value)
        {
                $this->writeDataField($value);
        }

        function getDataSource()
        {
                return $this->readDataSource();
        }
        function setDataSource($value)
        {
                $this->writeDataSource($value);
        }

        function getEnabled()
        {
                return $this->readEnabled();
        }
        function setEnabled($value)
        {
                $this->writeEnabled($value);
        }

        function getFont()
        {
                return $this->readFont();
        }
        function setFont($value)
        {
                $this->writeFont($value);
        }

        function getMaxLength()
        {
                return $this->readMaxLength();
        }
        function setMaxLength($value)
        {
                $this->writeMaxLength($value);
        }

        function getParentColor()
        {
                return $this->readParentColor();
        }
        function setParentColor($value)
        {
                $this->writeParentColor($value);
        }

        function getParentFont()
        {
                return $this->readParentFont();
        }
        function setParentFont($value)
        {
                $this->writeParentFont($value);
        }

        function getParentShowHint()
        {
                return $this->readParentShowHint();
        }
        function setParentShowHint($value)
        {
                $this->writeParentShowHint($value);
        }

        function getPopupMenu()
        {
                return $this->readPopupMenu();
        }
        function setPopupMenu($value)
        {
                $this->writePopupMenu($value);
        }

        function getReadOnly()
        {
                return $this->readReadOnly();
        }
        function setReadOnly($value)
        {
                $this->writeReadOnly($value);
        }

        function getShowHint()
        {
                return $this->readShowHint();
        }
        function setShowHint($value)
        {
                $this->writeShowHint($value);
        }

        function getStyle()             { return $this->readstyle(); }
        function setStyle($value)       { $this->writestyle($value); }

        function getTabOrder()
        {
                return $this->readTabOrder();
        }
        function setTabOrder($value)
        {
                $this->writeTabOrder($value);
        }

        function getTabStop()
        {
                return $this->readTabStop();
        }
        function setTabStop($value)
        {
                $this->writeTabStop($value);
        }

        function getVisible()
        {
                return $this->readVisible();
        }
        function setVisible($value)
        {
                $this->writeVisible($value);
        }

        }


?>
