<?php
<object class="frmValidarGeneradores" name="frmValidarGeneradores" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="Color">#D0DDF0</property>
  <property name="Cursor">crPointer</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">470</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmValidarGeneradores</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">frmValidarGeneradoresShow</property>
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
    <property name="Left">55</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">31</property>
    <property name="Width">710</property>
    <object class="Label" name="Label3" >
      <property name="Caption">Numero de Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">11</property>
      <property name="Name">Label3</property>
      <property name="Top">30</property>
      <property name="Visible">0</property>
      <property name="Width">105</property>
    </object>
    <object class="ComboBox" name="cmbNumeroOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">115</property>
      <property name="Name">cmbNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">29</property>
      <property name="Visible">0</property>
      <property name="Width">247</property>
      <property name="OnChange">cmbNumeroOrdenChange</property>
    </object>
    <object class="Panel" name="panelGeneradores" >
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
      <property name="Name">panelGeneradores</property>
      <property name="Top">34</property>
      <property name="Width">105</property>
      <object class="Button" name="cmdValidaGenerador" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Validar
 Generadores de 
Obra</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">7px</property>
        </property>
        <property name="Height">57</property>
        <property name="Left">4</property>
        <property name="Name">cmdValidaGenerador</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">1</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdValidaGeneradorJSClick</property>
      </object>
      <object class="Button" name="cmdAutorizaGenerador" >
        <property name="Caption">Autorizar
Generadores de 
Obra</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">7px</property>
        </property>
        <property name="Height">56</property>
        <property name="Left">4</property>
        <property name="Name">cmdAutorizaGenerador</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">66</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdAutorizaGeneradorJSClick</property>
      </object>
    </object>
    <object class="DBGrid" name="dbgGeneradores" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">210</property>
      <property name="Left">21</property>
      <property name="Name">dbgGeneradores</property>
      <property name="Top">35</property>
      <property name="Width">580</property>
    </object>
    <object class="Memo" name="memoMensajes" >
      <property name="Color">#C7CCFC</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">147</property>
      <property name="Left">19</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoMensajes</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">263</property>
      <property name="Width">690</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[Validar/Autorizar&amp;nbsp;Generadores]]></property>
      <property name="Color">#0000FF</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">21</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">685</property>
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
    <property name="Left">72</property>
    <property name="Name">cmdValidarReportes</property>
    <property name="ParentColor">0</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidarReportesJSClick</property>
  </object>
  <object class="Button" name="cmdValidarGeneradores" >
    <property name="Caption">Generadores</property>
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">240</property>
    <property name="Name">cmdValidarGeneradores</property>
    <property name="Top">8</property>
    <property name="Width">168</property>
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
    <property name="Left">410</property>
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
  <object class="BasicAuthentication" name="autentificacionGenerador" >
        <property name="Left">636</property>
        <property name="Top">190</property>
    <property name="ErrorMessage"></property>
    <property name="Name">autentificacionGenerador</property>
    <property name="Password">nulo</property>
    <property name="Title">Validar/Autorizar Generadores</property>
    <property name="OnAuthenticate">autentificacionGeneradorAuthenticate</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">481</property>
        <property name="Top">105</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">425</property>
        <property name="Top">105</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">361</property>
        <property name="Top">105</property>
    <property name="Connected"></property>
    <property name="Name">Database1</property>
  </object>
</object>
?>
