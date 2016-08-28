<?php
<object class="frmTiposdeEquipos" name="frmTiposdeEquipos" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmTiposdeEquipos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">364</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmTiposdeEquipos</property>
  <property name="Width">701</property>
  <property name="OnBeforeShow">frmTiposdeEquiposBeforeShow</property>
  <object class="Panel" name="Panel2" >
    <property name="Color">#408080</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">172</property>
    <property name="Left">13</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">31</property>
    <property name="Width">48</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Modificar</property>
    <property name="ImageSource">Edit.ico</property>
    <property name="Left">15</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">59</property>
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
    <property name="Left">13</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">210</property>
    <property name="Width">571</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">CATALOGO DE TIPOS DE EQUIPO</property>
    <property name="Color">#AE9FA9</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">12</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">8</property>
    <property name="Width">572</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Id Tipo de Equipo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">23</property>
    <property name="Name">Label2</property>
    <property name="Top">226</property>
    <property name="Width">113</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Descripcion</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">63</property>
    <property name="Name">Label3</property>
    <property name="Top">253</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Mascara</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">63</property>
    <property name="Name">Label4</property>
    <property name="Top">281</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="cmdAgregar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Agregar</property>
    <property name="ImageSource">Symbol-Add.ico</property>
    <property name="Left">15</property>
    <property name="Name">cmdAgregar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">33</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdAgregarJSClick</property>
    <property name="jsOnMouseMove">cmdAgregarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAgregarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Eliminar</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">15</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">87</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
    <property name="jsOnMouseMove">cmdEliminarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEliminarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Aceptar</property>
    <property name="ImageSource">Symbol-Check.ico</property>
    <property name="Left">15</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">115</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdAceptarClick</property>
    <property name="jsOnClick">cmdAceptarJSClick</property>
    <property name="jsOnMouseMove">cmdAceptarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAceptarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Cancelar</property>
    <property name="ImageSource">Undo.ico</property>
    <property name="Left">15</property>
    <property name="Name">cmdCancelar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">143</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
    <property name="jsOnMouseMove">cmdCancelarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdCancelarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Imprimir</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">15</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">170</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="Edit" name="txtId" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">144</property>
    <property name="Name">txtId</property>
    <property name="Top">222</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtIdJSBlur</property>
    <property name="jsOnFocus">txtIdJSFocus</property>
    <property name="jsOnKeyPress">txtIdJSKeyPress</property>
  </object>
  <object class="Edit" name="txtDescripcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">144</property>
    <property name="Name">txtDescripcion</property>
    <property name="Top">250</property>
    <property name="Width">424</property>
    <property name="jsOnBlur">txtDescripcionJSBlur</property>
    <property name="jsOnFocus">txtDescripcionJSFocus</property>
    <property name="jsOnKeyPress">txtDescripcionJSKeyPress</property>
  </object>
  <object class="Edit" name="txtMascara" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">143</property>
    <property name="Name">txtMascara</property>
    <property name="Top">278</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtMascaraJSBlur</property>
    <property name="jsOnFocus">txtMascaraJSFocus</property>
    <property name="jsOnKeyPress">txtMascaraJSKeyPress</property>
  </object>
  <object class="HiddenField" name="HiOldId" >
    <property name="Height">18</property>
    <property name="Left">19</property>
    <property name="Name">HiOldId</property>
    <property name="Top">328</property>
    <property name="Width">117</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">148</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">328</property>
    <property name="Width">108</property>
  </object>
  <object class="DBGrid" name="GridTipos" >
    <property name="Columns"><![CDATA[a:3:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Clave&quot;;s:5:&quot;Color&quot;;s:7:&quot;#CCFF66&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;sIdTipoEquipo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Mascara&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sMascara&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dsTiposEquipos</property>
    <property name="Height">173</property>
    <property name="Left">63</property>
    <property name="Name">GridTipos</property>
    <property name="Top">30</property>
    <property name="Width">521</property>
    <property name="jsOnClick">GridTiposJSClick</property>
  </object>
  <object class="Datasource" name="dsTiposEquipos" >
        <property name="Left">608</property>
        <property name="Top">88</property>
    <property name="DataSet">qryTiposEquipos</property>
    <property name="Name">dsTiposEquipos</property>
  </object>
  <object class="Query" name="qryTiposEquipos" >
        <property name="Left">600</property>
        <property name="Top">162</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryTiposEquipos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
