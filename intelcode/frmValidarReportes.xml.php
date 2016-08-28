<?php
<object class="FrmValidarReportes" name="FrmValidarReportes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Aperturae Reportes Diarios</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">464</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmValidarReportes</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">FrmValidarReportesBeforeShow</property>
  <property name="OnShow">FrmValidarReportesShow</property>
  <property name="jsOnLoad">FrmValidarReportesJSLoad</property>
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
    <property name="Left">56</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">31</property>
    <property name="Width">710</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Numero de Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">26</property>
      <property name="Name">Label1</property>
      <property name="Top">24</property>
      <property name="Width">105</property>
    </object>
    <object class="ComboBox" name="cmbNumeroOrdenVali" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">130</property>
      <property name="Name">cmbNumeroOrdenVali</property>
      <property name="ParentColor">0</property>
      <property name="Top">24</property>
      <property name="Width">247</property>
      <property name="OnChange">cmbNumeroOrdenValiChange</property>
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
      <property name="Height">209</property>
      <property name="Left">589</property>
      <property name="Name">Panel1</property>
      <property name="Top">45</property>
      <property name="Width">105</property>
      <object class="Button" name="cmdValida" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Validar
 Reportes Diarios</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">39</property>
        <property name="Left">4</property>
        <property name="Name">cmdValida</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">6</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdValidaJSClick</property>
      </object>
      <object class="Button" name="cmdAutoriza" >
        <property name="Caption">Autorizar
 Reportes Diarios</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">39</property>
        <property name="Left">4</property>
        <property name="Name">cmdAutoriza</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">47</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdAutorizaJSClick</property>
      </object>
    </object>
    <object class="DBGrid" name="DBGrid1" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">210</property>
      <property name="Left">26</property>
      <property name="Name">DBGrid1</property>
      <property name="Top">45</property>
      <property name="Width">555</property>
    </object>
    <object class="Memo" name="Mensajes" >
      <property name="Color">#C7CCFC</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">145</property>
      <property name="Left">20</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">Mensajes</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">264</property>
      <property name="Width">690</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[Validar/Autorizar&amp;nbsp;Reportes Diarios]]></property>
      <property name="Color">#0000FF</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">9</property>
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
    <property name="Left">56</property>
    <property name="Name">cmdValidarReportes</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
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
    <property name="Left">224</property>
    <property name="Name">cmdValidarGeneradores</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidarGeneradoresJSClick</property>
  </object>
  <object class="Button" name="cmdEstimaciones" >
    <property name="Caption">Estimaciones</property>
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">394</property>
    <property name="Name">cmdEstimaciones</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdEstimacionesJSClick</property>
  </object>
  <object class="Image" name="Image1" >
    <property name="Border">0</property>
    <property name="Height">32</property>
    <property name="ImageSource">recursos/imagenesMenu/ToolBar/17.png</property>
    <property name="Left">9</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">Image1</property>
    <property name="Top">40</property>
    <property name="Width">31</property>
  </object>
  <object class="BasicAuthentication" name="autenficacion" >
        <property name="Left">684</property>
        <property name="Top">166</property>
    <property name="ErrorMessage"></property>
    <property name="Name">autenficacion</property>
    <property name="Password">nulo</property>
    <property name="Title">Validar/Autorizar Reportes</property>
    <property name="OnAuthenticate">autenficacionAuthenticate</property>
  </object>
</object>
?>
