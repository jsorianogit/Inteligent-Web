<?php
<object class="frmTiposdeEmbarcacion" name="frmTiposdeEmbarcacion" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmTiposdeEmbarcacion</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">440</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmTiposdeEmbarcacion</property>
  <property name="Width">872</property>
  <property name="OnBeforeShow">frmTiposdeEmbarcacionBeforeShow</property>
  <object class="Panel" name="Panel2" >
    <property name="Color">#408080</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">172</property>
    <property name="Left">5</property>
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
    <property name="Left">7</property>
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
    <property name="Height">126</property>
    <property name="Left">5</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">210</property>
    <property name="Width">571</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">CATALOGO DE TIPOS DE EMBARCACION</property>
    <property name="Color">#AE9FA9</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">4</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">8</property>
    <property name="Width">572</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Tipo Embarcacion</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label2</property>
    <property name="Top">226</property>
    <property name="Width">100</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Descripcion</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">32</property>
    <property name="Name">Label3</property>
    <property name="Top">253</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Reglon</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">32</property>
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
    <property name="Left">7</property>
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
    <property name="Left">7</property>
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
    <property name="Left">7</property>
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
    <property name="Left">7</property>
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
    <property name="Left">7</property>
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
  <object class="Edit" name="txtIdEmbarcacion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">114</property>
    <property name="Name">txtIdEmbarcacion</property>
    <property name="Top">222</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtIdEmbarcacionJSBlur</property>
    <property name="jsOnFocus">txtIdEmbarcacionJSFocus</property>
    <property name="jsOnKeyPress">txtIdEmbarcacionJSKeyPress</property>
  </object>
  <object class="Edit" name="txtDescripcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">114</property>
    <property name="Name">txtDescripcion</property>
    <property name="Top">248</property>
    <property name="Width">446</property>
    <property name="jsOnBlur">txtDescripcionJSBlur</property>
    <property name="jsOnFocus">txtDescripcionJSFocus</property>
    <property name="jsOnKeyPress">txtDescripcionJSKeyPress</property>
  </object>
  <object class="Edit" name="txtRenglon" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">113</property>
    <property name="Name">txtRenglon</property>
    <property name="Top">275</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtRenglonJSBlur</property>
    <property name="jsOnFocus">txtRenglonJSFocus</property>
    <property name="jsOnKeyPress">txtRenglonJSKeyPress</property>
  </object>
  <object class="DBGrid" name="GridTipos" >
    <property name="Columns"><![CDATA[a:5:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;*&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;30&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;Id&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:18:&quot;sIdTipoEmbarcacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Renglon&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;iRenglon&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Titulo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sTitulo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">SourPozo</property>
    <property name="Height">173</property>
    <property name="Left">56</property>
    <property name="Name">GridTipos</property>
    <property name="Top">30</property>
    <property name="Width">520</property>
    <property name="jsOnClick">GridTiposJSClick</property>
    <property name="jsOnRowChanged">GridTiposJSRowChanged</property>
  </object>
  <object class="HiddenField" name="HiOldId" >
    <property name="Height">18</property>
    <property name="Left">587</property>
    <property name="Name">HiOldId</property>
    <property name="Top">152</property>
    <property name="Width">109</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">588</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">176</property>
    <property name="Width">108</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Titulo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">32</property>
    <property name="Name">Label5</property>
    <property name="Top">305</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="txtTitulo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">113</property>
    <property name="Name">txtTitulo</property>
    <property name="Top">302</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtTituloJSBlur</property>
    <property name="jsOnFocus">txtTituloJSFocus</property>
    <property name="jsOnKeyPress">txtTituloJSKeyPress</property>
  </object>
  <object class="Datasource" name="SourPozo" >
        <property name="Left">600</property>
        <property name="Top">88</property>
    <property name="DataSet">QryPozo</property>
    <property name="Name">SourPozo</property>
  </object>
  <object class="Query" name="QryPozo" >
        <property name="Left">652</property>
        <property name="Top">85</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryPozo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
