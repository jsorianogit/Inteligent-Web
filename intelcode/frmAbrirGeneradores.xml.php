<?php
<object class="FrmAbrirGeneradores" name="FrmAbrirGeneradores" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">FrmAbrirGeneradores</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmAbrirGeneradores</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">FrmAbrirGeneradoresShow</property>
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
    <object class="Panel" name="Panel15" >
      <property name="BorderColor">#000000</property>
      <property name="BorderWidth">3</property>
      <property name="Caption">Panel1</property>
      <property name="Dynamic"></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">209</property>
      <property name="Left">595</property>
      <property name="Name">Panel15</property>
      <property name="Top">18</property>
      <property name="Width">105</property>
      <object class="Button" name="cmdDesvalidar" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Desvalidar
 Generadores</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">39</property>
        <property name="Left">4</property>
        <property name="Name">cmdDesvalidar</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">6</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdDesvalidarJSClick</property>
      </object>
      <object class="Button" name="cmdDesautorizar" >
        <property name="Caption">Desautorizar
 Generadores</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">39</property>
        <property name="Left">4</property>
        <property name="Name">cmdDesautorizar</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">47</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdDesautorizarJSClick</property>
      </object>
    </object>
    <object class="DBGrid" name="dbgGeneradores" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource2</property>
      <property name="Height">210</property>
      <property name="Left">29</property>
      <property name="Name">dbgGeneradores</property>
      <property name="Top">21</property>
      <property name="Width">563</property>
    </object>
    <object class="Memo" name="memoMsg" >
      <property name="Color">#C7CCFC</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">146</property>
      <property name="Left">31</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoMsg</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">255</property>
      <property name="Width">679</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[Abrir&amp;nbsp;Generadores]]></property>
      <property name="Color">#0000FF</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">18</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">674</property>
    </object>
    <object class="Database" name="Database2" >
            <property name="Left">12</property>
            <property name="Top">43</property>
      <property name="Connected"></property>
      <property name="Name">Database2</property>
    </object>
    <object class="Query" name="Query2" >
            <property name="Left">60</property>
            <property name="Top">43</property>
      <property name="Database">Database2</property>
      <property name="LimitCount">-1</property>
      <property name="Name">Query2</property>
      <property name="Params">a:0:{}</property>
      <property name="SQL">a:0:{}</property>
    </object>
    <object class="Datasource" name="Datasource2" >
            <property name="Left">110</property>
            <property name="Top">43</property>
      <property name="DataSet">Query2</property>
      <property name="Name">Datasource2</property>
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
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
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
    <property name="Left">415</property>
    <property name="Name">Button1</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
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
  <object class="BasicAuthentication" name="autenficacionGenerador" >
        <property name="Left">683</property>
        <property name="Top">211</property>
    <property name="ErrorMessage"></property>
    <property name="Name">autenficacionGenerador</property>
    <property name="Password">nulo</property>
    <property name="Title">Validar/Autorizar Reportes</property>
    <property name="OnAuthenticate">autenficacionGeneradorAuthenticate</property>
  </object>
</object>
?>
