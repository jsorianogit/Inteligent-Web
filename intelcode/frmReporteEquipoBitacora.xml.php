<?php
<object class="frmReporteEquipoBitacora" name="frmReporteEquipoBitacora" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Reporte de Equipos por Bitacora</property>
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
  <property name="Height">216</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">frmReporteEquipoBitacora</property>
  <property name="Width">552</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow">frmReporteEquipoBitacoraBeforeShow</property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow"></property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="Panel" name="Panel1" >
    <property name="Color">#EBEBEB</property>
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
    <property name="Height">184</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">16</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">16</property>
    <property name="Width">520</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="DateTimePicker" name="DateTimePicker1" >
      <property name="Caption">DateTimePicker1</property>
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
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">258</property>
      <property name="Name">DateTimePicker1</property>
      <property name="Top">55</property>
      <property name="Width">200</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="DateTimePicker" name="DateTimePicker2" >
      <property name="Caption">DateTimePicker2</property>
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
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">258</property>
      <property name="Name">DateTimePicker2</property>
      <property name="Top">79</property>
      <property name="Width">200</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Imprimir reporte de equipo desde:</property>
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
      <property name="Height">16</property>
      <property name="Left">48</property>
      <property name="Name">Label1</property>
      <property name="Top">55</property>
      <property name="Width">208</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Hasta:</property>
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
      <property name="Height">16</property>
      <property name="Left">48</property>
      <property name="Name">Label2</property>
      <property name="Top">79</property>
      <property name="Width">208</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Button" name="Button1" >
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
      <property name="Left">377</property>
      <property name="Name">Button1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="Top">136</property>
      <property name="Width">79</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">Button1JSClick</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">REPORTE DE EQUIPO UTILIZADO EN BITACORA DE ACTIVIDADES</property>
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
            <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">520</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Imprimir en Formato:</property>
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
      <property name="Height">16</property>
      <property name="Left">48</property>
      <property name="Name">Label4</property>
      <property name="Top">103</property>
      <property name="Width">208</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
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
      <property name="Height">24</property>
      <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
      <property name="Left">258</property>
      <property name="Name">sFormato</property>
      <property name="Top">103</property>
      <property name="Width">64</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Equipo:</property>
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
      <property name="Left">48</property>
      <property name="Name">Label5</property>
      <property name="Top">34</property>
      <property name="Width">204</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="ComboBox" name="cboEquipo" >
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
      <property name="Height">17</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">258</property>
      <property name="Name">cboEquipo</property>
      <property name="Top">31</property>
      <property name="Width">200</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">cboEquipoJSBlur</property>
      <property name="jsOnFocus">cboEquipoJSFocus</property>
      <property name="jsOnKeyPress">cboEquipoJSKeyPress</property>
    </object>
  </object>
</object>
?>
