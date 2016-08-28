<?php
<object class="FrmDesautorizarEstimacion" name="FrmDesautorizarEstimacion" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmDesautorizarEstimacion</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">FrmDesautorizarEstimacionShow</property>
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
    <property name="Width">710</property>
    <object class="Panel" name="Panel16" >
      <property name="BorderColor">#000000</property>
      <property name="BorderWidth">3</property>
      <property name="Caption">Panel1</property>
      <property name="Dynamic"></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">209</property>
      <property name="Left">597</property>
      <property name="Name">Panel16</property>
      <property name="Top">25</property>
      <property name="Width">105</property>
      <object class="Button" name="cmdDesautorizarEstimacion" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Desautorizar
Estimacion</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">39</property>
        <property name="Left">4</property>
        <property name="Name">cmdDesautorizarEstimacion</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">1</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdDesautorizarEstimacionJSClick</property>
      </object>
    </object>
    <object class="DBGrid" name="dbgEstimaciones2" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">210</property>
      <property name="Left">29</property>
      <property name="Name">dbgEstimaciones2</property>
      <property name="Top">25</property>
      <property name="Width">561</property>
    </object>
    <object class="Memo" name="memoMensajes2" >
      <property name="Color">#C7CCFC</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">146</property>
      <property name="Left">29</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoMensajes2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">263</property>
      <property name="Width">671</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Abrir Estimaciones</property>
      <property name="Color">#0000FF</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
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
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">77</property>
    <property name="Name">cmdValidarReportes</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidarReportesJSClick</property>
  </object>
  <object class="Button" name="cmdValidaGeneradores" >
    <property name="Caption">Generadores</property>
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">246</property>
    <property name="Name">cmdValidaGeneradores</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidaGeneradoresJSClick</property>
  </object>
  <object class="Button" name="Button3" >
    <property name="Caption">Estimaciones</property>
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">415</property>
    <property name="Name">Button3</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
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
  <object class="BasicAuthentication" name="autentificacionEstimacion" >
        <property name="Left">683</property>
        <property name="Top">211</property>
    <property name="ErrorMessage"></property>
    <property name="Name">autentificacionEstimacion</property>
    <property name="Password">nulo</property>
    <property name="Title">Validar/Autorizar Reportes</property>
    <property name="OnAuthenticate">autentificacionEstimacionAuthenticate</property>
  </object>
</object>
?>
