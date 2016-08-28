<?php
<object class="frmAlmacenes" name="frmAlmacenes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Almacenes</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmAlmacenes</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">frmAlmacenesBeforeShow</property>
  <property name="jsOnSubmit">frmAlmacenesJSSubmit</property>
  <object class="DBGrid" name="dbgAlmacenes" >
    <property name="Columns"><![CDATA[a:7:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;Id&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdAlmacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Ciudad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sCiudad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;CP&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:3:&quot;sCp&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Telefono&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sTelefono&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;600&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Direccion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sDireccion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;Fax&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;sFax&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}}]]></property>
    <property name="Datasource">dsAlmacenes</property>
    <property name="Height">158</property>
    <property name="Left">95</property>
    <property name="Name">dbgAlmacenes</property>
    <property name="Top">41</property>
    <property name="Width">680</property>
    <property name="jsOnClick">dbgAlmacenesJSClick</property>
  </object>
  <object class="Edit" name="sIdAlmacen" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">20</property>
    <property name="Name">sIdAlmacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">231</property>
    <property name="Width">123</property>
    <property name="jsOnBlur">sIdAlmacenJSBlur</property>
    <property name="jsOnFocus">sIdAlmacenJSFocus</property>
    <property name="jsOnKeyPress">sIdAlmacenJSKeyPress</property>
  </object>
  <object class="Edit" name="sCiudad" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">60</property>
    <property name="Name">sCiudad</property>
    <property name="ParentColor">0</property>
    <property name="Top">256</property>
    <property name="Width">250</property>
    <property name="jsOnBlur">sCiudadJSBlur</property>
    <property name="jsOnFocus">sCiudadJSFocus</property>
    <property name="jsOnKeyPress">sCiudadJSKeyPress</property>
  </object>
  <object class="Edit" name="sCp" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">15</property>
    <property name="Name">sCp</property>
    <property name="ParentColor">0</property>
    <property name="Top">282</property>
    <property name="Width">123</property>
    <property name="jsOnBlur">sCpJSBlur</property>
    <property name="jsOnFocus">sCpJSFocus</property>
    <property name="jsOnKeyPress">sCpJSKeyPress</property>
  </object>
  <object class="Edit" name="sTelefono" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">20</property>
    <property name="Name">sTelefono</property>
    <property name="ParentColor">0</property>
    <property name="Top">307</property>
    <property name="Width">250</property>
    <property name="jsOnBlur">sTelefonoJSBlur</property>
    <property name="jsOnFocus">sTelefonoJSFocus</property>
    <property name="jsOnKeyPress">sTelefonoJSKeyPress</property>
  </object>
  <object class="Edit" name="sDescripcion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">100</property>
    <property name="Name">sDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="Top">359</property>
    <property name="Width">453</property>
    <property name="jsOnBlur">sDescripcionJSBlur</property>
    <property name="jsOnFocus">sDescripcionJSFocus</property>
    <property name="jsOnKeyPress">sDescripcionJSKeyPress</property>
  </object>
  <object class="Edit" name="sDireccion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">200</property>
    <property name="Name">sDireccion</property>
    <property name="ParentColor">0</property>
    <property name="Top">384</property>
    <property name="Width">453</property>
    <property name="jsOnBlur">sDireccionJSBlur</property>
    <property name="jsOnFocus">sDireccionJSFocus</property>
    <property name="jsOnKeyPress">sDireccionJSKeyPress</property>
  </object>
  <object class="Edit" name="sFax" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">192</property>
    <property name="MaxLength">20</property>
    <property name="Name">sFax</property>
    <property name="ParentColor">0</property>
    <property name="Top">333</property>
    <property name="Width">250</property>
    <property name="jsOnBlur">sFaxJSBlur</property>
    <property name="jsOnFocus">sFaxJSFocus</property>
    <property name="jsOnKeyPress">sFaxJSKeyPress</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Id Almacen</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">231</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Ciudad</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">255</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Codigo Postal</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">283</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Telefono</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">309</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Descripcion</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="Top">361</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Direccion</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="Top">387</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fax</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">95</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">336</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Almacenes</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">8</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">18</property>
    <property name="Width">770</property>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">156</property>
    <property name="Left">9</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">77</property>
    <object class="Button" name="cmdAgregar" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdAgregar</property>
      <property name="Top">10</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAgregarJSClick</property>
    </object>
    <object class="Button" name="cmdModificar" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdModificar</property>
      <property name="Top">31</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdModificarJSClick</property>
    </object>
    <object class="Button" name="cmdEliminar" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdEliminar</property>
      <property name="Top">54</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdEliminarClick</property>
      <property name="jsOnClick">cmdEliminarJSClick</property>
    </object>
    <object class="Button" name="cmdAceptar" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdAceptar</property>
      <property name="Top">76</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAceptarClick</property>
    </object>
    <object class="Button" name="cmdCancelar" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdCancelar</property>
      <property name="Top">98</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdCancelarJSClick</property>
    </object>
    <object class="Button" name="cmdImprimir" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdImprimir</property>
      <property name="Top">120</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hOperacion" >
    <property name="Height">18</property>
    <property name="Left">445</property>
    <property name="Name">hOperacion</property>
    <property name="Top">329</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hOldsIdAlmacen" >
    <property name="Height">18</property>
    <property name="Left">445</property>
    <property name="Name">hOldsIdAlmacen</property>
    <property name="Top">309</property>
    <property name="Width">200</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FF0000</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">89</property>
    <property name="Left">95</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">414</property>
    <property name="Width">675</property>
  </object>
  <object class="Table" name="qryAlmacenes" >
        <property name="Left">739</property>
        <property name="Top">226</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">qryAlmacenes</property>
    <property name="TableName">almacenes</property>
  </object>
  <object class="Datasource" name="dsAlmacenes" >
        <property name="Left">738</property>
        <property name="Top">291</property>
    <property name="Dataset">qryAlmacenes</property>
    <property name="Name">dsAlmacenes</property>
  </object>
  <object class="FormValidator" name="FormValidator1" >
        <property name="Left">670</property>
        <property name="Top">329</property>
    <property name="Name">FormValidator1</property>
    <property name="Rules"><![CDATA[a:2:{i:0;a:12:{s:7:&quot;Control&quot;;s:10:&quot;sIdAlmacen&quot;;s:6:&quot;Equals&quot;;s:0:&quot;&quot;;s:12:&quot;ErrorMessage&quot;;s:25:&quot;El id no debe estar vacio&quot;;s:9:&quot;FieldName&quot;;s:0:&quot;&quot;;s:9:&quot;MaxLength&quot;;s:2:&quot;20&quot;;s:8:&quot;MaxValue&quot;;s:1:&quot;0&quot;;s:9:&quot;MinLength&quot;;s:1:&quot;1&quot;;s:8:&quot;MinValue&quot;;s:1:&quot;0&quot;;s:4:&quot;Name&quot;;s:9:&quot;idAlmacen&quot;;s:8:&quot;Required&quot;;s:4:&quot;true&quot;;s:14:&quot;ValidationType&quot;;s:0:&quot;&quot;;s:10:&quot;OnValidate&quot;;s:0:&quot;&quot;;}i:1;a:12:{s:7:&quot;Control&quot;;s:12:&quot;sDescripcion&quot;;s:6:&quot;Equals&quot;;s:0:&quot;&quot;;s:12:&quot;ErrorMessage&quot;;s:31:&quot;debe escribir una descripcion!!&quot;;s:9:&quot;FieldName&quot;;s:0:&quot;&quot;;s:9:&quot;MaxLength&quot;;s:3:&quot;100&quot;;s:8:&quot;MaxValue&quot;;s:1:&quot;0&quot;;s:9:&quot;MinLength&quot;;s:1:&quot;1&quot;;s:8:&quot;MinValue&quot;;s:1:&quot;0&quot;;s:4:&quot;Name&quot;;s:11:&quot;Descripcion&quot;;s:8:&quot;Required&quot;;s:4:&quot;true&quot;;s:14:&quot;ValidationType&quot;;s:0:&quot;&quot;;s:10:&quot;OnValidate&quot;;s:0:&quot;&quot;;}}]]></property>
    <property name="ValidateCompleteForm">0</property>
  </object>
  <object class="Database" name="database" >
        <property name="Left">750</property>
        <property name="Top">351</property>
    <property name="DatabaseName">ruliAdal</property>
    <property name="Host">192.168.62.4</property>
    <property name="Name">database</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
</object>
?>
