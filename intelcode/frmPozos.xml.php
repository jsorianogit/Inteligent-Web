<?php
<object class="frmPozos" name="frmPozos" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmPozos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">440</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmPozos</property>
  <property name="Width">872</property>
  <property name="OnBeforeShow">frmPozosBeforeShow</property>
  <object class="Button" name="cmdModificar" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Modificar</property>
    <property name="ImageSource">Edit.ico</property>
    <property name="Left">93</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">91</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
    <property name="jsOnMouseMove">cmdModificarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdModificarJSMouseOut</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">110</property>
    <property name="Left">93</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">242</property>
    <property name="Width">571</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">EQUIPOS/DIRECCIONAMIENTO</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">92</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">40</property>
    <property name="Width">572</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Pozo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">103</property>
    <property name="Name">Label2</property>
    <property name="Top">258</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Descripcion</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">103</property>
    <property name="Name">Label3</property>
    <property name="Top">285</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Equipo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">103</property>
    <property name="Name">Label4</property>
    <property name="Top">313</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="cmdAgregar" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Agregar</property>
    <property name="ImageSource">Symbol-Add.ico</property>
    <property name="Left">93</property>
    <property name="Name">cmdAgregar</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">65</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdAgregarJSClick</property>
    <property name="jsOnMouseMove">cmdAgregarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAgregarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Eliminar</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">93</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">119</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
    <property name="jsOnMouseMove">cmdEliminarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEliminarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Aceptar</property>
    <property name="ImageSource">Symbol-Check.ico</property>
    <property name="Left">93</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">147</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdAceptarClick</property>
    <property name="jsOnClick">cmdAceptarJSClick</property>
    <property name="jsOnMouseMove">cmdAceptarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAceptarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Cancelar</property>
    <property name="ImageSource">Undo.ico</property>
    <property name="Left">93</property>
    <property name="Name">cmdCancelar</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">175</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
    <property name="jsOnMouseMove">cmdCancelarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdCancelarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Imprimir</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">93</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">202</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="Edit" name="txtPozo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">175</property>
    <property name="Name">txtPozo</property>
    <property name="Top">254</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtPozoJSBlur</property>
    <property name="jsOnFocus">txtPozoJSFocus</property>
    <property name="jsOnKeyPress">txtPozoJSKeyPress</property>
  </object>
  <object class="Edit" name="txtDescripcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">175</property>
    <property name="Name">txtDescripcion</property>
    <property name="Top">282</property>
    <property name="Width">473</property>
    <property name="jsOnBlur">txtDescripcionJSBlur</property>
    <property name="jsOnFocus">txtDescripcionJSFocus</property>
    <property name="jsOnKeyPress">txtDescripcionJSKeyPress</property>
  </object>
  <object class="Edit" name="txtEquipo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">175</property>
    <property name="Name">txtEquipo</property>
    <property name="Top">310</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtEquipoJSBlur</property>
    <property name="jsOnFocus">txtEquipoJSFocus</property>
    <property name="jsOnKeyPress">txtEquipoJSKeyPress</property>
  </object>
  <object class="DBGrid" name="GridPozos" >
    <property name="Columns"><![CDATA[a:4:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;Id&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sIdPozo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Equipo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sEquipo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Consecutivo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;nConsecutivo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">SourPozo</property>
    <property name="Height">168</property>
    <property name="Left">144</property>
    <property name="Name">GridPozos</property>
    <property name="Top">64</property>
    <property name="Width">520</property>
    <property name="jsOnClick">GridPozosJSClick</property>
  </object>
  <object class="HiddenField" name="HiConsecutivo" >
    <property name="Height">18</property>
    <property name="Left">99</property>
    <property name="Name">HiConsecutivo</property>
    <property name="Top">360</property>
    <property name="Width">117</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">228</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">360</property>
    <property name="Width">108</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">704</property>
        <property name="Top">52</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="SourPozo" >
        <property name="Left">688</property>
        <property name="Top">120</property>
    <property name="DataSet">QryPozo</property>
    <property name="Name">SourPozo</property>
  </object>
  <object class="Query" name="QryPozo" >
        <property name="Left">740</property>
        <property name="Top">117</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryPozo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:2:{i:0;s:19:&quot;select * from pozos&quot;;i:1;s:0:&quot;&quot;;}]]></property>
  </object>
</object>
?>
