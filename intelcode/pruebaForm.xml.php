<?php
<object class="Unit1" name="Unit1" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">518</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit1</property>
  <property name="Width">677</property>
  <object class="Database" name="dblancia1" >
        <property name="Left">30</property>
        <property name="Top">11</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">lancia</property>
    <property name="Host">localhost</property>
    <property name="Name">dblancia1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Table" name="tbpersonal1" >
        <property name="Left">30</property>
        <property name="Top">61</property>
    <property name="Active">1</property>
    <property name="Database">dblancia1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpersonal1</property>
    <property name="TableName">personal</property>
  </object>
  <object class="Datasource" name="dspersonal1" >
        <property name="Left">30</property>
        <property name="Top">111</property>
    <property name="Dataset">tbpersonal1</property>
    <property name="Name">dspersonal1</property>
  </object>
  <object class="DBGrid" name="personal1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dspersonal1</property>
    <property name="Height">200</property>
    <property name="Left">80</property>
    <property name="Name">personal1</property>
    <property name="Top">11</property>
    <property name="Width">579</property>
  </object>
  <object class="Edit" name="dCantidad1" >
    <property name="DataField">dCantidad</property>
    <property name="Datasource">dspersonal1</property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">dCantidad1</property>
    <property name="Top">217</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="sDescripcion1" >
    <property name="DataField">sDescripcion</property>
    <property name="Datasource">dspersonal1</property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">sDescripcion1</property>
    <property name="Top">238</property>
    <property name="Width">459</property>
  </object>
</object>
?>
