<?php
<object class="Unit1" name="Unit1" baseclass="Page">
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
  <property name="Name">Unit1</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">Unit1Show</property>
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
    <object class="Label" name="Label2" >
      <property name="Caption">Numero de Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">24</property>
      <property name="Name">Label2</property>
      <property name="Top">21</property>
      <property name="Visible">0</property>
      <property name="Width">105</property>
    </object>
    <object class="ComboBox" name="ComboBox1" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">131</property>
      <property name="Name">ComboBox1</property>
      <property name="ParentColor">0</property>
      <property name="Top">21</property>
      <property name="Visible">0</property>
      <property name="Width">247</property>
      <property name="OnChange">ComboBox1Change</property>
    </object>
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
      <property name="Top">48</property>
      <property name="Width">105</property>
      <object class="Button" name="cmdAutorizarEst" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Autorizar Estimaciones</property>
        <property name="Color">#D9F4E1</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">7px</property>
        </property>
        <property name="Height">57</property>
        <property name="Left">7</property>
        <property name="Name">cmdAutorizarEst</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">2</property>
        <property name="Width">92</property>
        <property name="jsOnClick">cmdAutorizarEstJSClick</property>
      </object>
    </object>
    <object class="DBGrid" name="dbgDesEstimaciones" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">207</property>
      <property name="Left">24</property>
      <property name="Name">dbgDesEstimaciones</property>
      <property name="Top">50</property>
      <property name="Width">563</property>
    </object>
    <object class="Memo" name="Memo1" >
      <property name="Color">#C7CCFC</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">147</property>
      <property name="Left">24</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">Memo1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">263</property>
      <property name="Width">676</property>
    </object>
    <object class="Label" name="Label3" >
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
      <property name="Left">20</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">3</property>
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
    <property name="Left">70</property>
    <property name="Name">cmdValidarReportes</property>
    <property name="ParentColor">0</property>
    <property name="Top">6</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidarReportesJSClick</property>
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
    <property name="Left">239</property>
    <property name="Name">cmdValidarGeneradores</property>
    <property name="ParentColor">0</property>
    <property name="Top">6</property>
    <property name="Width">168</property>
    <property name="jsOnClick">cmdValidarGeneradoresJSClick</property>
  </object>
  <object class="Button" name="cmdEstimaciones" >
    <property name="Caption">Estimaciones</property>
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">407</property>
    <property name="Name">cmdEstimaciones</property>
    <property name="ParentColor">0</property>
    <property name="Top">6</property>
    <property name="Width">168</property>
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
  <object class="Query" name="Query1" >
        <property name="Left">486</property>
        <property name="Top">105</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">430</property>
        <property name="Top">100</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">361</property>
        <property name="Top">105</property>
    <property name="Connected"></property>
    <property name="Name">Database1</property>
  </object>
  <object class="BasicAuthentication" name="BasicAuthentication1" >
        <property name="Left">571</property>
        <property name="Top">197</property>
    <property name="Name">BasicAuthentication1</property>
    <property name="OnAuthenticate">BasicAuthentication1Authenticate</property>
  </object>
</object>
?>
