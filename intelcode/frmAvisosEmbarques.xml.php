<?php
<object class="frmAvisosEmbarques" name="frmAvisosEmbarques" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Avisos de Embarques</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">544</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmAvisosEmbarques</property>
  <property name="UseAjax">1</property>
  <property name="Width">960</property>
  <property name="OnBeforeShow">frmAvisosEmbarquesBeforeShow</property>
  <property name="OnShow">frmAvisosEmbarquesShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">277</property>
    <property name="Left">17</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">230</property>
    <property name="Width">731</property>
    <object class="Label" name="Label10" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Folio:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">34</property>
      <property name="Name">Label10</property>
      <property name="Top">30</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Alignment">agRight</property>
      <property name="Caption">F.Captura:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">35</property>
      <property name="Name">Label12</property>
      <property name="Top">48</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agRight</property>
      <property name="Caption">F.Requisicion:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">24</property>
      <property name="Name">Label13</property>
      <property name="Top">69</property>
      <property name="Width">91</property>
    </object>
    <object class="Edit" name="iFolio" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">116</property>
      <property name="Name">iFolio</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Tag"></property>
      <property name="Top">27</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">iFolioJSBlur</property>
      <property name="jsOnFocus">iFolioJSFocus</property>
      <property name="jsOnKeyPress">iFolioJSKeyPress</property>
    </object>
    <object class="DateTimePicker" name="dIdFecha" >
      <property name="Caption">dateInicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">116</property>
      <property name="Name">dIdFecha</property>
      <property name="ParentFont">0</property>
      <property name="Top">49</property>
      <property name="Width">85</property>
    </object>
    <object class="DateTimePicker" name="dFechaAviso" >
      <property name="Caption">DateTimePicker1</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">116</property>
      <property name="Name">dFechaAviso</property>
      <property name="ParentFont">0</property>
      <property name="Top">69</property>
      <property name="Width">85</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Caption">Informacion</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">1</property>
      <property name="Name">Label14</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">727</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">111</property>
      <property name="Name">Label17</property>
      <property name="Top">117</property>
      <property name="Width">262</property>
    </object>
    <object class="ComboBox" name="sNumeroOrden" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">116</property>
      <property name="Name">sNumeroOrden</property>
      <property name="Top">88</property>
      <property name="Width">185</property>
      <property name="jsOnBlur">sNumeroOrdenJSBlur</property>
      <property name="jsOnFocus">sNumeroOrdenJSFocus</property>
      <property name="jsOnKeyPress">sNumeroOrdenJSKeyPress</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Numero Orden:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">23</property>
      <property name="Name">Label1</property>
      <property name="Top">91</property>
      <property name="Width">91</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Tipo Movimiento:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">2</property>
      <property name="Name">Label11</property>
      <property name="Top">112</property>
      <property name="Width">112</property>
    </object>
    <object class="ComboBox" name="sIdTipo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">116</property>
      <property name="Name">sIdTipo</property>
      <property name="Top">109</property>
      <property name="Width">185</property>
      <property name="jsOnBlur">sIdTipoJSBlur</property>
      <property name="jsOnFocus">sIdTipoJSFocus</property>
      <property name="jsOnKeyPress">sIdTipoJSKeyPress</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Referencia:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">34</property>
      <property name="Name">Label15</property>
      <property name="Top">132</property>
      <property name="Width">80</property>
    </object>
    <object class="Edit" name="sReferencia" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">116</property>
      <property name="Name">sReferencia</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Tag"></property>
      <property name="Top">129</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">sReferenciaJSBlur</property>
      <property name="jsOnFocus">sReferenciaJSFocus</property>
      <property name="jsOnKeyPress">sReferenciaJSKeyPress</property>
    </object>
    <object class="ComboBox" name="sIdProveedor" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">116</property>
      <property name="Name">sIdProveedor</property>
      <property name="Top">151</property>
      <property name="Width">185</property>
      <property name="jsOnBlur">sIdProveedorJSBlur</property>
      <property name="jsOnFocus">sIdProveedorJSFocus</property>
      <property name="jsOnKeyPress">sIdProveedorJSKeyPress</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Proveedor:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">2</property>
      <property name="Name">Label16</property>
      <property name="Top">154</property>
      <property name="Width">112</property>
    </object>
    <object class="Edit" name="sOrigen" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">116</property>
      <property name="Name">sOrigen</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Tag"></property>
      <property name="Top">171</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">sOrigenJSBlur</property>
      <property name="jsOnFocus">sOrigenJSFocus</property>
      <property name="jsOnKeyPress">sOrigenJSKeyPress</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Origen:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">34</property>
      <property name="Name">Label19</property>
      <property name="Top">174</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">34</property>
      <property name="Name">Label22</property>
      <property name="Top">196</property>
      <property name="Width">80</property>
    </object>
    <object class="Memo" name="mComentarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">61</property>
      <property name="Left">116</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mComentarios</property>
      <property name="Top">194</property>
      <property name="Width">594</property>
      <property name="jsOnBlur">mComentariosJSBlur</property>
      <property name="jsOnFocus">mComentariosJSFocus</property>
      <property name="jsOnKeyPress">mComentariosJSKeyPress</property>
    </object>
    <object class="HiddenField" name="hdfOldFolio" >
      <property name="Height">18</property>
      <property name="Left">205</property>
      <property name="Name">hdfOldFolio</property>
      <property name="Top">29</property>
      <property name="Width">200</property>
    </object>
    <object class="HiddenField" name="hdfOperacion" >
      <property name="Height">18</property>
      <property name="Left">415</property>
      <property name="Name">hdfOperacion</property>
      <property name="Top">29</property>
      <property name="Width">200</property>
    </object>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="Background">#FFFFFF</property>
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">278</property>
    <property name="Left">17</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">229</property>
    <property name="Width">730</property>
    <object class="DBGrid" name="dbgPsuministros" >
      <property name="Columns"><![CDATA[a:9:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Partida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sNumeroActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;Cantidad Anexo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;dCantidadAnexo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Precio MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Precio DLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dVentaDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Total MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dTotalMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Total DLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dTotalDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}}]]></property>
      <property name="DataSource">dsAnexo_psuministro</property>
      <property name="Height">125</property>
      <property name="Left">10</property>
      <property name="Name">dbgPsuministros</property>
      <property name="Top">142</property>
      <property name="Width">637</property>
      <property name="jsOnClick">dbgPsuministrosJSClick</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Partidas Anexo</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">1</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">729</property>
    </object>
    <object class="Button" name="cmdAgregarP" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">654</property>
      <property name="Name">cmdAgregarP</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">176</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAgregarPJSClick</property>
    </object>
    <object class="Button" name="cmdModificarP" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">654</property>
      <property name="Name">cmdModificarP</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">195</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdModificarPJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarP" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">654</property>
      <property name="Name">cmdEliminarP</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">214</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdEliminarPJSClick</property>
    </object>
    <object class="Button" name="cmdAceptarP" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">654</property>
      <property name="Name">cmdAceptarP</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">233</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAceptarPClick</property>
      <property name="jsOnClick">cmdAceptarPJSClick</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Concepto</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label4</property>
      <property name="Top">22</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Medida:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">14</property>
      <property name="Name">Label5</property>
      <property name="Top">43</property>
      <property name="Width">68</property>
    </object>
    <object class="Edit" name="sMedida" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">84</property>
      <property name="Name">sMedida</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">38</property>
      <property name="Width">125</property>
      <property name="jsOnBlur">sMedidaJSBlur</property>
      <property name="jsOnFocus">sMedidaJSFocus</property>
      <property name="jsOnKeyPress">sMedidaJSKeyPress</property>
    </object>
    <object class="Button" name="cmdCancelarP" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">654</property>
      <property name="Name">cmdCancelarP</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">251</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdCancelarPJSClick</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Descripcion:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label9</property>
      <property name="Top">64</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Volumen Anexo:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">215</property>
      <property name="Name">Label2</property>
      <property name="Top">43</property>
      <property name="Width">99</property>
    </object>
    <object class="Edit" name="dCantidadAnexo" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">324</property>
      <property name="Name">dCantidadAnexo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">38</property>
      <property name="Width">125</property>
      <property name="jsOnBlur">dCantidadAnexoJSBlur</property>
      <property name="jsOnFocus">dCantidadAnexoJSFocus</property>
      <property name="jsOnKeyPress">dCantidadAnexoJSKeyPress</property>
    </object>
    <object class="Edit" name="dCantidad" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">82</property>
      <property name="Name">dCantidad</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">116</property>
      <property name="Width">125</property>
      <property name="jsOnBlur">dCantidadJSBlur</property>
      <property name="jsOnFocus">dCantidadJSFocus</property>
      <property name="jsOnKeyPress">dCantidadJSKeyPress</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cantidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label6</property>
      <property name="Top">121</property>
      <property name="Width">75</property>
    </object>
    <object class="ComboBox" name="sNumeroActividad" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">84</property>
      <property name="Name">sNumeroActividad</property>
      <property name="ParentColor">0</property>
      <property name="Top">17</property>
      <property name="Width">632</property>
      <property name="jsOnBlur">sNumeroActividadJSBlur</property>
      <property name="jsOnChange">sNumeroActividadJSChange</property>
      <property name="jsOnFocus">sNumeroActividadJSFocus</property>
      <property name="jsOnKeyPress">sNumeroActividadJSKeyPress</property>
    </object>
    <object class="HiddenField" name="hdfOldNumeroActividad" >
      <property name="Height">18</property>
      <property name="Left">217</property>
      <property name="Name">hdfOldNumeroActividad</property>
      <property name="Top">122</property>
      <property name="Width">200</property>
    </object>
    <object class="Memo" name="mDescripcion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">51</property>
      <property name="Left">83</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDescripcion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">61</property>
      <property name="Width">632</property>
      <property name="jsOnBlur">mDescripcionJSBlur</property>
      <property name="jsOnFocus">mDescripcionJSFocus</property>
      <property name="jsOnKeyPress">mDescripcionJSKeyPress</property>
    </object>
  </object>
  <object class="DBGrid" name="dbgGeneral" >
    <property name="Columns"><![CDATA[a:10:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;iFolio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Actividad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sNumeroActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;VentaMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;VentaDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dVentaDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;TotalMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dTotalMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;TotalDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dTotalDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;dCantidadAnexo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;dCantidadAnexo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;sMedida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;mDescripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dtaGeneral</property>
    <property name="Height">92</property>
    <property name="Left">140</property>
    <property name="Name">dbgGeneral</property>
    <property name="Top">58</property>
    <property name="Width">580</property>
  </object>
  <object class="Panel" name="Panel5" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">191</property>
    <property name="Left">16</property>
    <property name="Name">Panel5</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">5</property>
    <property name="Width">728</property>
    <object class="Edit" name="Edit6" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">8</property>
      <property name="Left">397</property>
      <property name="Name">Edit6</property>
      <property name="Width">12</property>
    </object>
    <object class="Edit" name="Edit7" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">8</property>
      <property name="Left">565</property>
      <property name="Name">Edit7</property>
      <property name="Width">16</property>
    </object>
    <object class="Button" name="cmdAgregarS" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">cmdAgregarS</property>
      <property name="ParentColor">0</property>
      <property name="Top">30</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAgregarSJSClick</property>
    </object>
    <object class="Button" name="cmdModificarS" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">cmdModificarS</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdModificarSJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarS" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">cmdEliminarS</property>
      <property name="ParentColor">0</property>
      <property name="Top">74</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdEliminarSClick</property>
      <property name="jsOnClick">cmdEliminarSJSClick</property>
    </object>
    <object class="Button" name="cmdImprimirS" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">cmdImprimirS</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="Top">140</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdImprimirSJSClick</property>
    </object>
    <object class="Button" name="cmdAceptarS" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">cmdAceptarS</property>
      <property name="ParentColor">0</property>
      <property name="Top">96</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAceptarSClick</property>
    </object>
    <object class="Button" name="cmdCancelarS" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">cmdCancelarS</property>
      <property name="ParentColor">0</property>
      <property name="Top">118</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdCancelarSJSClick</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Recepcion de Materiales</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">arial</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">18</property>
      <property name="Name">Label18</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">732</property>
    </object>
    <object class="DBGrid" name="dbgSuministros" >
      <property name="Columns"><![CDATA[a:9:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;iFolio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Fecha Recepcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dFechaAviso&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Numero Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sIdTipo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Origen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sOrigen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Proveedor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sIdProveedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">dsAnexo_suministro</property>
      <property name="Height">150</property>
      <property name="Left">81</property>
      <property name="Name">dbgSuministros</property>
      <property name="Top">24</property>
      <property name="Width">595</property>
      <property name="jsOnClick">dbgSuministrosJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#C0C0C0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">17</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">200</property>
    <property name="Width">731</property>
    <object class="Button" name="Button14" >
      <property name="Caption">Informacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">9</property>
      <property name="Name">Button14</property>
      <property name="Top">1</property>
      <property name="Width">108</property>
      <property name="jsOnClick">Button14JSClick</property>
    </object>
    <object class="Button" name="Button15" >
      <property name="Caption">Partidas del Generador</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">123</property>
      <property name="Name">Button15</property>
      <property name="Top">1</property>
      <property name="Width">144</property>
      <property name="jsOnClick">Button15JSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hdfRecomienda" >
    <property name="Height">18</property>
    <property name="Left">16</property>
    <property name="Name">hdfRecomienda</property>
    <property name="Top">517</property>
    <property name="Value">1</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hdfRangoEstimacion" >
    <property name="Height">18</property>
    <property name="Left">132</property>
    <property name="Name">hdfRangoEstimacion</property>
    <property name="Top">517</property>
    <property name="Width">128</property>
  </object>
  <object class="HiddenField" name="hdfPartidas" >
    <property name="Height">18</property>
    <property name="Left">268</property>
    <property name="Name">hdfPartidas</property>
    <property name="Top">517</property>
    <property name="Value">no</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hdfRefrsPartida" >
    <property name="Height">18</property>
    <property name="Left">378</property>
    <property name="Name">hdfRefrsPartida</property>
    <property name="Top">517</property>
    <property name="Width">108</property>
  </object>
  <object class="Window" name="Window1" >
    <property name="Caption">Mensaje del Sistema</property>
    <property name="Height">110</property>
    <property name="IsVisible">0</property>
    <property name="Left">249</property>
    <property name="MoveMethod">mmTranslucent</property>
    <property name="Name">Window1</property>
    <property name="ResizeMethod">rmTranslucent</property>
    <property name="Top">110</property>
    <property name="Width">310</property>
    <object class="Memo" name="Memo1" >
      <property name="BorderStyle">bsNone</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">50</property>
      <property name="Left">14</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">Memo1</property>
      <property name="ParentFont">0</property>
      <property name="Top">30</property>
      <property name="Width">280</property>
    </object>
    <object class="Button" name="Button1" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">218</property>
      <property name="Name">Button1</property>
      <property name="Top">85</property>
      <property name="Width">75</property>
      <property name="jsOnClick">Button1JSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hdfOcultarVentana" >
    <property name="Height">18</property>
    <property name="Left">760</property>
    <property name="Name">hdfOcultarVentana</property>
    <property name="Top">263</property>
    <property name="Width">180</property>
  </object>
  <object class="Button" name="Button2" >
    <property name="Caption">ir a Reportes Dirios</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">615</property>
    <property name="Name">Button2</property>
    <property name="ParentColor">0</property>
    <property name="Top">201</property>
    <property name="Width">130</property>
    <property name="jsOnClick">Button2JSClick</property>
  </object>
  <object class="Database" name="data" >
        <property name="Left">763</property>
        <property name="Top">473</property>
    <property name="Connected"></property>
    <property name="Name">data</property>
  </object>
  <object class="Query" name="qryAnexo_suministro" >
        <property name="Left">743</property>
        <property name="Top">150</property>
    <property name="Database">data</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryAnexo_suministro</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:12:{i:0;s:6:&quot;select&quot;;i:1;s:11:&quot; sContrato,&quot;;i:2;s:8:&quot; iFolio,&quot;;i:3;s:14:&quot; sNumeroOrden,&quot;;i:4;s:46:&quot; date_format(dIdFecha,'%d/%m/%Y') as dIdFecha,&quot;;i:5;s:52:&quot; date_format(dFechaAviso,'%d/%m/%Y') as dFechaAviso,&quot;;i:6;s:9:&quot; sIdTipo,&quot;;i:7;s:13:&quot; sReferencia,&quot;;i:8;s:14:&quot; sIdProveedor,&quot;;i:9;s:9:&quot; sOrigen,&quot;;i:10;s:13:&quot; mComentarios&quot;;i:11;s:21:&quot;from anexo_suministro&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dsAnexo_suministro" >
        <property name="Left">748</property>
        <property name="Top">96</property>
    <property name="DataSet">qryAnexo_suministro</property>
    <property name="Name">dsAnexo_suministro</property>
  </object>
  <object class="Datasource" name="dsAnexo_psuministro" >
        <property name="Left">770</property>
        <property name="Top">283</property>
    <property name="DataSet">qryAnexo_psuministro</property>
    <property name="Name">dsAnexo_psuministro</property>
  </object>
  <object class="Query" name="qryAnexo_psuministro" >
        <property name="Left">773</property>
        <property name="Top">340</property>
    <property name="Database">data</property>
    <property name="Name">qryAnexo_psuministro</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:12:{i:0;s:6:&quot;select&quot;;i:1;s:22:&quot;  ap.sNumeroActividad,&quot;;i:2;s:13:&quot;  an.sMedida,&quot;;i:3;s:15:&quot;  ap.dCantidad,&quot;;i:4;s:20:&quot;  an.dCantidadAnexo,&quot;;i:5;s:14:&quot;  an.dVentaMN,&quot;;i:6;s:15:&quot;  an.dVentaDLL,&quot;;i:7;s:44:&quot;  an.dVentaMN*an.dCantidadAnexo as dTotalMN,&quot;;i:8;s:46:&quot;  an.dVentaDLL*an.dCantidadAnexo as dTotalDLL,&quot;;i:9;s:17:&quot;  an.mDescripcion&quot;;i:10;s:60:&quot;from anexo_psuministro ap inner join actividadesxanexo an on&quot;;i:11;s:74:&quot;  (ap.sContrato=an.sContrato  and ap.sNumeroActividad=an.sNumeroActividad)&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaGeneral" >
        <property name="Left">814</property>
        <property name="Top">413</property>
    <property name="DataSet">qryGeneral</property>
    <property name="Name">dtaGeneral</property>
  </object>
  <object class="Query" name="qryGeneral" >
        <property name="Left">771</property>
        <property name="Top">414</property>
    <property name="Database">data</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryGeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:13:{i:0;s:6:&quot;select&quot;;i:1;s:12:&quot;  ap.iFolio,&quot;;i:2;s:22:&quot;  ap.sNumeroActividad,&quot;;i:3;s:38:&quot;  format(ap.dCantidad,2) as dCantidad,&quot;;i:4;s:13:&quot;  an.sMedida,&quot;;i:5;s:48:&quot;  format(an.dCantidadAnexo,2) as dCantidadAnexo,&quot;;i:6;s:36:&quot;  format(an.dVentaMN,2) as dVentaMN,&quot;;i:7;s:38:&quot;  format(an.dVentaDLL,2) as dVentaDLL,&quot;;i:8;s:57:&quot;  format((an.dVentaMN*an.dCantidadAnexo),2) as  dTotalMN,&quot;;i:9;s:58:&quot;  format((an.dVentaDLL*an.dCantidadAnexo),2) as dTotalDLL,&quot;;i:10;s:17:&quot;  an.mDescripcion&quot;;i:11;s:60:&quot;from anexo_psuministro ap inner join actividadesxanexo an on&quot;;i:12;s:74:&quot;  (ap.sContrato=an.sContrato  and ap.sNumeroActividad=an.sNumeroActividad)&quot;;}]]></property>
  </object>
</object>
?>
