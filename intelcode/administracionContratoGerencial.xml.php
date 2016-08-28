<?php
<object class="Unit1" name="Unit1" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
    <property name="Align">taNone</property>
    <property name="Case"></property>
    <property name="Color"></property>
    <property name="Family">Verdana</property>
    <property name="LineHeight"></property>
    <property name="Size">10px</property>
    <property name="Style"></property>
    <property name="Variant"></property>
    <property name="Weight"></property>
  </property>
  <property name="Height">365</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">Unit1</property>
  <property name="Width">660</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow">Unit1BeforeShow</property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">Unit1Show</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <property name="jsOnLoad">Unit1JSLoad</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">252</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">15</property>
    <property name="Name">Panel1</property>
    <property name="Top">33</property>
    <property name="Width">615</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="Label" name="Label1" >
      <property name="Caption">Fecha de Calculo</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="Top">41</property>
      <property name="Width">128</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Frente de Trabajo:</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">18</property>
      <property name="Left">8</property>
      <property name="Name">Label2</property>
      <property name="Top">63</property>
      <property name="Width">128</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="ComboBox" name="cboNumeroOrden" >
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">136</property>
      <property name="Name">cboNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">62</property>
      <property name="Width">184</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnChange">cboNumeroOrdenChange</property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="DBGrid" name="cbgPartidas" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">Datasource1</property>
      <property name="Font">
            <property name="Align">taLeft</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">156</property>
      <property name="Left">7</property>
      <property name="Name">cbgPartidas</property>
      <property name="ReadOnly">1</property>
      <property name="Top">86</property>
      <property name="Width">523</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnRowChanged"></property>
      <property name="jsOnRowSaved"></property>
    </object>
    <object class="DateTimePicker" name="dtpFecha" >
      <property name="Caption">dtpFecha</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">19</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">136</property>
      <property name="Name">dtpFecha</property>
      <property name="Top">39</property>
      <property name="Width">116</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Button" name="cmdRecargar" >
      <property name="Caption">Recargar</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">25</property>
      <property name="Left">536</property>
      <property name="Name">cmdRecargar</property>
      <property name="Top">86</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Button" name="cmdImprimir" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">25</property>
      <property name="Left">536</property>
      <property name="Name">cmdImprimir</property>
      <property name="Top">112</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Gerencial</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#FFFFFF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">605</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Database" name="Database1" >
            <property name="Left">42</property>
            <property name="Top">184</property>
      <property name="Connected"></property>
      <property name="DatabaseName"></property>
      <property name="Dictionary"></property>
      <property name="DriverName">mysql</property>
      <property name="Host"></property>
      <property name="Name">Database1</property>
      <property name="UserName"></property>
      <property name="UserPassword"></property>
      <property name="OnAfterConnect"></property>
      <property name="OnAfterDisconnect"></property>
      <property name="OnBeforeConnect"></property>
      <property name="OnBeforeDisconnect"></property>
    </object>
    <object class="Datasource" name="Datasource1" >
            <property name="Left">104</property>
            <property name="Top">184</property>
      <property name="DataSet">qryPartidas</property>
      <property name="Name">Datasource1</property>
    </object>
    <object class="Query" name="Query3" >
            <property name="Left">288</property>
            <property name="Top">184</property>
      <property name="Database">Database1</property>
      <property name="LimitCount">-1</property>
      <property name="LimitStart">-1</property>
      <property name="Name">Query3</property>
      <property name="Params">a:0:{}</property>
      <property name="SQL">a:0:{}</property>
    </object>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">30</property>
    <property name="Left">15</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="Top">310</property>
    <property name="Visible">0</property>
    <property name="Width">615</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="HiddenField" name="dMontoMN" >
    <property name="Height">18</property>
    <property name="Left">242</property>
    <property name="Name">dMontoMN</property>
    <property name="Top">10</property>
    <property name="Width">200</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="ComboBox" name="sFormato" >
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">20</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
    <property name="Left">560</property>
    <property name="Name">sFormato</property>
    <property name="Top">288</property>
    <property name="Width">70</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Formato:</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">500</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">291</property>
    <property name="Width">56</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Query" name="qryPartidas" >
        <property name="Left">409</property>
        <property name="Top">310</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryPartidas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
