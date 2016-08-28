<?php
<object class="FrmAbrirReportes" name="FrmAbrirReportes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Aperturae Reportes Diarios</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">535</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmAbrirReportes</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">FrmAbrirReportesBeforeShow</property>
  <property name="OnShow">FrmAbrirReportesShow</property>
  <property name="jsOnLoad">FrmAbrirReportesJSLoad</property>
  <object class="Panel" name="Panel2" >
    <property name="Alignment">agCenter</property>
    <property name="BorderColor">#C0C0C0</property>
    <property name="BorderWidth">3</property>
    <property name="Caption">Panel2</property>
    <property name="Color">#E9E9E9</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">425</property>
    <property name="Left">61</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">31</property>
    <property name="Width">705</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Numero de Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">20</property>
      <property name="Name">Label1</property>
      <property name="Top">18</property>
      <property name="Width">105</property>
    </object>
    <object class="ComboBox" name="cmdOrdenAbre" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">125</property>
      <property name="Name">cmdOrdenAbre</property>
      <property name="ParentColor">0</property>
      <property name="Top">18</property>
      <property name="Width">247</property>
      <property name="OnChange">cmdOrdenAbreChange</property>
    </object>
    <object class="Panel" name="Panel1" >
      <property name="BorderColor">#000000</property>
      <property name="BorderWidth">3</property>
      <property name="Caption">Panel1</property>
      <property name="Dynamic"></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">207</property>
      <property name="Left">596</property>
      <property name="Name">Panel1</property>
      <property name="Top">40</property>
      <property name="Width">104</property>
      <object class="Button" name="cmdValidaReporte" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Validar
 Apertura
 de
 Reportes Diarios</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">64</property>
        <property name="Left">4</property>
        <property name="Name">cmdValidaReporte</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">6</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdValidaReporteJSClick</property>
      </object>
      <object class="Button" name="cmdAutorizaReporte" >
        <property name="Caption">Autorizar
 Apertura
 de
 Reportes Diarios</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">55</property>
        <property name="Left">5</property>
        <property name="Name">cmdAutorizaReporte</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">75</property>
        <property name="Width">90</property>
        <property name="jsOnClick">cmdAutorizaReporteJSClick</property>
      </object>
    </object>
    <object class="DBGrid" name="DBGrid1" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">210</property>
      <property name="Left">20</property>
      <property name="Name">DBGrid1</property>
      <property name="Top">39</property>
      <property name="Width">580</property>
    </object>
    <object class="Memo" name="Memo1" >
      <property name="Color">#C7CCFC</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">146</property>
      <property name="Left">15</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">Memo1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">259</property>
      <property name="Width">690</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Abrir Reportes Diarios</property>
      <property name="Color">#0000FF</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">20</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">685</property>
    </object>
    <object class="Database" name="Database1" >
            <property name="Left">12</property>
            <property name="Top">43</property>
      <property name="Connected"></property>
      <property name="Name">Database1</property>
    </object>
    <object class="Query" name="Query1" >
            <property name="Left">60</property>
            <property name="Top">43</property>
      <property name="Database">Database1</property>
      <property name="LimitCount">-1</property>
      <property name="Name">Query1</property>
      <property name="Params">a:0:{}</property>
      <property name="SQL">a:0:{}</property>
    </object>
    <object class="Datasource" name="Datasource1" >
            <property name="Left">110</property>
            <property name="Top">43</property>
      <property name="DataSet">Query1</property>
      <property name="Name">Datasource1</property>
    </object>
  </object>
  <object class="Button" name="cmdValidarReportes" >
    <property name="Caption">Reportes Diarios</property>
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">61</property>
    <property name="Name">cmdValidarReportes</property>
    <property name="ParentColor">0</property>
    <property name="Top">7</property>
    <property name="Width">168</property>
  </object>
  <object class="Button" name="cmdValidarGeneradores" >
    <property name="Caption">Generadores</property>
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">229</property>
    <property name="Name">cmdValidarGeneradores</property>
    <property name="ParentColor">0</property>
    <property name="Top">7</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidarGeneradoresJSClick</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Estimaciones</property>
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">398</property>
    <property name="Name">Button1</property>
    <property name="ParentColor">0</property>
    <property name="Top">7</property>
    <property name="Width">168</property>
    <property name="jsOnClick">Button1JSClick</property>
  </object>
  <object class="Image" name="Image1" >
    <property name="Border">0</property>
    <property name="Height">32</property>
    <property name="ImageSource">recursos/imagenesMenu/ToolBar/18.png</property>
    <property name="Left">16</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">Image1</property>
    <property name="Top">40</property>
    <property name="Width">32</property>
  </object>
  <object class="BasicAuthentication" name="aut" >
        <property name="Left">684</property>
        <property name="Top">212</property>
    <property name="ErrorMessage"></property>
    <property name="Name">aut</property>
    <property name="Title">Abrir  Reportes</property>
    <property name="OnAuthenticate">autAuthenticate</property>
  </object>
</object>
?>
