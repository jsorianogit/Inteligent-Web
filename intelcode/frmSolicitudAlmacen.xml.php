<?php
<object class="frmSolicitudesAlmacen" name="frmSolicitudesAlmacen" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmSolicitudesAlmacen</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">575</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmSolicitudesAlmacen</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">frmSolicitudesAlmacenBeforeShow</property>
  <property name="OnShow">frmSolicitudesAlmacenShow</property>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">238</property>
    <property name="Left">11</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">212</property>
    <property name="Width">765</property>
    <object class="DBGrid" name="ddanexo_psolicitud1" >
      <property name="Columns"><![CDATA[a:6:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Solicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sIdSolicitud&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Material&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;lStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="Datasource">dsanexo_psolicitud1</property>
      <property name="Height">121</property>
      <property name="Left">38</property>
      <property name="Name">ddanexo_psolicitud1</property>
      <property name="Top">24</property>
      <property name="Width">631</property>
      <property name="jsOnClick">ddanexo_psolicitud1JSClick</property>
    </object>
    <object class="Edit" name="sIdInsumo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">75</property>
      <property name="Name">sIdInsumo</property>
      <property name="ParentColor">0</property>
      <property name="Top">151</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">sIdInsumoJSBlur</property>
      <property name="jsOnClick">sIdInsumoJSClick</property>
      <property name="jsOnFocus">sIdInsumoJSFocus</property>
      <property name="jsOnKeyPress">sIdInsumoJSKeyPress</property>
      <property name="jsOnKeyUp">sIdInsumoJSKeyUp</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Insumo:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">10</property>
      <property name="Name">Label5</property>
      <property name="Top">152</property>
      <property name="Width">64</property>
    </object>
    <object class="Edit" name="dCantidad" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">290</property>
      <property name="Name">dCantidad</property>
      <property name="ParentColor">0</property>
      <property name="Top">150</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">dCantidadJSBlur</property>
      <property name="jsOnClick">dCantidadJSClick</property>
      <property name="jsOnFocus">dCantidadJSFocus</property>
      <property name="jsOnKeyPress">dCantidadJSKeyPress</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cantidad:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">204</property>
      <property name="Name">Label7</property>
      <property name="Top">155</property>
      <property name="Width">85</property>
    </object>
    <object class="Button" name="cmdAgregarIn" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">679</property>
      <property name="Name">cmdAgregarIn</property>
      <property name="Top">28</property>
      <property name="Width">70</property>
      <property name="jsOnClick">cmdAgregarInJSClick</property>
    </object>
    <object class="Button" name="cmdModificarIn" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">679</property>
      <property name="Name">cmdModificarIn</property>
      <property name="Top">48</property>
      <property name="Width">70</property>
      <property name="jsOnClick">cmdModificarInJSClick</property>
    </object>
    <object class="Button" name="cmdAceptarIn" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">679</property>
      <property name="Name">cmdAceptarIn</property>
      <property name="Top">89</property>
      <property name="Width">70</property>
      <property name="OnClick">cmdAceptarInClick</property>
      <property name="jsOnClick">cmdAceptarInJSClick</property>
    </object>
    <object class="Button" name="cmdCancelarIn" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">679</property>
      <property name="Name">cmdCancelarIn</property>
      <property name="Top">109</property>
      <property name="Width">70</property>
      <property name="jsOnClick">cmdCancelarInJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarIn" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">679</property>
      <property name="Name">cmdEliminarIn</property>
      <property name="Top">69</property>
      <property name="Width">70</property>
      <property name="OnClick">cmdEliminarInClick</property>
      <property name="jsOnClick">cmdEliminarInJSClick</property>
    </object>
    <object class="Memo" name="mDescripcionInsumo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">52</property>
      <property name="Left">74</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDescripcionInsumo</property>
      <property name="ParentColor">0</property>
      <property name="Top">177</property>
      <property name="Width">681</property>
      <property name="jsOnBlur">mDescripcionInsumoJSBlur</property>
      <property name="jsOnClick">mDescripcionInsumoJSClick</property>
      <property name="jsOnFocus">mDescripcionInsumoJSFocus</property>
      <property name="jsOnKeyPress">mDescripcionInsumoJSKeyPress</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Descripcion:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label6</property>
      <property name="Top">177</property>
      <property name="Width">69</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Materiales  de la Solicitud</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">18</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">765</property>
    </object>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">238</property>
    <property name="Left">10</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">212</property>
    <property name="Width">767</property>
    <object class="ComboBox" name="sNumeroOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">167</property>
      <property name="Name">sNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">10</property>
      <property name="Width">227</property>
      <property name="jsOnBlur">sNumeroOrdenJSBlur</property>
      <property name="jsOnClick">sNumeroOrdenJSClick</property>
      <property name="jsOnFocus">sNumeroOrdenJSFocus</property>
      <property name="jsOnKeyPress">sNumeroOrdenJSKeyPress</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">50</property>
      <property name="Name">Label1</property>
      <property name="Top">60</property>
      <property name="Width">115</property>
    </object>
    <object class="Edit" name="sReferencia" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">167</property>
      <property name="Name">sReferencia</property>
      <property name="ParentColor">0</property>
      <property name="Top">32</property>
      <property name="Width">227</property>
      <property name="jsOnBlur">sReferenciaJSBlur</property>
      <property name="jsOnClick">sReferenciaJSClick</property>
      <property name="jsOnFocus">sReferenciaJSFocus</property>
      <property name="jsOnKeyPress">sReferenciaJSKeyPress</property>
    </object>
    <object class="Memo" name="mComentarios" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">140</property>
      <property name="Left">167</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mComentarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">553</property>
      <property name="jsOnBlur">mComentariosJSBlur</property>
      <property name="jsOnClick">mComentariosJSClick</property>
      <property name="jsOnFocus">mComentariosJSFocus</property>
      <property name="jsOnKeyPress">mComentariosJSKeyPress</property>
    </object>
    <object class="DateTimePicker" name="dFechaEntrega" >
      <property name="Caption">dFechaEntrega</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">167</property>
      <property name="Name">dFechaEntrega</property>
      <property name="Top">203</property>
      <property name="Width">113</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Referencia:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">50</property>
      <property name="Name">Label2</property>
      <property name="Top">35</property>
      <property name="Width">115</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Numero de Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">50</property>
      <property name="Name">Label3</property>
      <property name="Top">10</property>
      <property name="Width">115</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Fecha Tentativa de Entrega</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">10</property>
      <property name="Name">Label4</property>
      <property name="Top">206</property>
      <property name="Width">155</property>
    </object>
    <object class="HiddenField" name="hsIdSolicitud" >
      <property name="Height">18</property>
      <property name="Left">400</property>
      <property name="Name">hsIdSolicitud</property>
      <property name="Top">32</property>
      <property name="Width">200</property>
    </object>
    <object class="HiddenField" name="hsOperacion" >
      <property name="Height">18</property>
      <property name="Left">400</property>
      <property name="Name">hsOperacion</property>
      <property name="Top">9</property>
      <property name="Width">200</property>
    </object>
    <object class="HiddenField" name="hsStatus" >
      <property name="Height">18</property>
      <property name="Left">567</property>
      <property name="Name">hsStatus</property>
      <property name="Top">9</property>
      <property name="Width">150</property>
    </object>
  </object>
  <object class="Memo" name="mMensajes" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Color">#FF0000</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">95</property>
    <property name="Left">10</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mMensajes</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">451</property>
    <property name="Width">765</property>
  </object>
  <object class="Panel" name="Panel4" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#C0C0C0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">10</property>
    <property name="Name">Panel4</property>
    <property name="ParentColor">0</property>
    <property name="Top">185</property>
    <property name="Width">765</property>
  </object>
  <object class="DBGrid" name="DBGrid1" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dsSolicitadas</property>
    <property name="Height">110</property>
    <property name="Left">90</property>
    <property name="Name">DBGrid1</property>
    <property name="Top">73</property>
    <property name="Width">687</property>
  </object>
  <object class="DBGrid" name="ddinsumos1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsinsumos1</property>
    <property name="Height">108</property>
    <property name="Left">90</property>
    <property name="Name">ddinsumos1</property>
    <property name="Top">74</property>
    <property name="Width">679</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Solicitud de Materiales</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">8</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">5</property>
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
    <property name="Top">24</property>
    <property name="Width">77</property>
    <object class="Button" name="cmdModificar" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdModificar</property>
      <property name="ParentColor">0</property>
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
      <property name="ParentColor">0</property>
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
      <property name="ParentColor">0</property>
      <property name="Top">75</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAceptarClick</property>
      <property name="jsOnClick">cmdAceptarJSClick</property>
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
      <property name="ParentColor">0</property>
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
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
    <object class="Button" name="cmdAgregar" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdAgregar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAgregarJSClick</property>
    </object>
  </object>
  <object class="DBGrid" name="ddanexo_solicitud1" >
    <property name="Columns"><![CDATA[a:9:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Solicitud&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sIdSolicitud&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Numero de Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:18:&quot;Fecha de Solicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;dFechaSolicitud&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:26:&quot;Fecha Tentativa de Entrega&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;dFechaEntrega&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;lStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:20:&quot;Creador de Solicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;sIdUsuarioCreador&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:18:&quot;Autoriza Solicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:18:&quot;sIdUsuarioAutoriza&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="Datasource">dsanexo_solicitud1</property>
    <property name="Height">159</property>
    <property name="Left">89</property>
    <property name="Name">ddanexo_solicitud1</property>
    <property name="Top">24</property>
    <property name="Width">688</property>
    <property name="jsOnClick">ddanexo_solicitud1JSClick</property>
  </object>
  <object class="HiddenField" name="hsIdInsumo" >
    <property name="Height">18</property>
    <property name="Left">10</property>
    <property name="Name">hsIdInsumo</property>
    <property name="Top">553</property>
    <property name="Width">142</property>
  </object>
  <object class="HiddenField" name="hsOperacionInsumo" >
    <property name="Height">18</property>
    <property name="Left">161</property>
    <property name="Name">hsOperacionInsumo</property>
    <property name="Top">553</property>
    <property name="Width">135</property>
  </object>
  <object class="Button" name="cmdCaratula" >
    <property name="Caption">Solicitud</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">13</property>
    <property name="Name">cmdCaratula</property>
    <property name="ParentColor">0</property>
    <property name="Top">185</property>
    <property name="Width">155</property>
    <property name="jsOnClick">cmdCaratulaJSClick</property>
  </object>
  <object class="Button" name="cmdMateriales" >
    <property name="Caption">Materiales de la Solicitud</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">170</property>
    <property name="Name">cmdMateriales</property>
    <property name="ParentColor">0</property>
    <property name="Top">185</property>
    <property name="Width">155</property>
    <property name="jsOnClick">cmdMaterialesJSClick</property>
  </object>
  <object class="HiddenField" name="hdPestana" >
    <property name="Height">15</property>
    <property name="Left">307</property>
    <property name="Name">hdPestana</property>
    <property name="Top">555</property>
    <property name="Width">109</property>
  </object>
  <object class="HiddenField" name="HidError" >
    <property name="Height">15</property>
    <property name="Left">424</property>
    <property name="Name">HidError</property>
    <property name="Top">555</property>
    <property name="Width">136</property>
  </object>
  <object class="HiddenField" name="HidFoco" >
    <property name="Height">15</property>
    <property name="Left">568</property>
    <property name="Name">HidFoco</property>
    <property name="Top">555</property>
    <property name="Width">112</property>
  </object>
  <object class="Panel" name="Panel5" >
    <property name="BorderColor">#C0C0C0</property>
    <property name="BorderWidth">3</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">224</property>
    <property name="Left">161</property>
    <property name="Name">Panel5</property>
    <property name="ParentColor">0</property>
    <property name="Top">112</property>
    <property name="Width">519</property>
    <object class="Label" name="Label11" >
      <property name="Caption">CATALOGO DE INSUMOS</property>
      <property name="Color">#FF5B5B</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">ARIAL BLACK</property>
      </property>
      <property name="Height">15</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">519</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">HAGA DOBLE CLICK PARA AGREGAR !!</property>
      <property name="Color">#EFEFEF</property>
      <property name="Font">
      <property name="Color">#FF0000</property>
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">18</property>
      <property name="Left">12</property>
      <property name="Name">Label12</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">197</property>
      <property name="Width">243</property>
    </object>
    <object class="DBGrid" name="dbgCatalogo" >
      <property name="Columns"><![CDATA[a:3:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Insumo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;250&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Existencias&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">dsanexo_psolicitud1</property>
      <property name="Height">165</property>
      <property name="Left">13</property>
      <property name="Name">dbgCatalogo</property>
      <property name="Top">24</property>
      <property name="Width">492</property>
      <property name="jsOnDblClick">dbgCatalogoJSDblClick</property>
    </object>
  </object>
  <object class="Database" name="dbgeotech1" >
        <property name="Left">614</property>
        <property name="Top">59</property>
    <property name="Connected"></property>
    <property name="Name">dbgeotech1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="dsanexo_solicitud1" >
        <property name="Left">711</property>
        <property name="Top">64</property>
    <property name="Dataset">tbanexo_solicitud1</property>
    <property name="Name">dsanexo_solicitud1</property>
  </object>
  <object class="Datasource" name="dsanexo_psolicitud1" >
        <property name="Left">273</property>
        <property name="Top">474</property>
    <property name="Dataset">tbanexo_psolicitud1</property>
    <property name="Name">dsanexo_psolicitud1</property>
  </object>
  <object class="Query" name="tbanexo_solicitud1" >
        <property name="Left">495</property>
        <property name="Top">65</property>
    <property name="Database">dbgeotech1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">tbanexo_solicitud1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Query" name="tbanexo_psolicitud1" >
        <property name="Left">135</property>
        <property name="Top">472</property>
    <property name="Database">dbgeotech1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">tbanexo_psolicitud1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="qrySolicitadas" >
        <property name="Left">627</property>
        <property name="Top">484</property>
    <property name="Database">dbgeotech1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qrySolicitadas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:11:{i:0;s:6:&quot;select&quot;;i:1;s:18:&quot;  ap.sIdSolicitud,&quot;;i:2;s:14:&quot;  i.sIdInsumo,&quot;;i:3;s:17:&quot;  i.mDescripcion,&quot;;i:4;s:12:&quot;  i.sMedida,&quot;;i:5;s:15:&quot;  ap.dCantidad,&quot;;i:6;s:12:&quot;  ap.lStatus&quot;;i:7;s:4:&quot;from&quot;;i:8;s:47:&quot;  anexo_psolicitud ap inner join insumos i on (&quot;;i:9;s:59:&quot;      ap.sContrato=i.sContrato and ap.sIdInsumo=i.sIdInsumo&quot;;i:10;s:3:&quot;  )&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dsSolicitadas" >
        <property name="Left">680</property>
        <property name="Top">471</property>
    <property name="DataSet">qrySolicitadas</property>
    <property name="Name">dsSolicitadas</property>
  </object>
  <object class="Table" name="tbinsumos1" >
        <property name="Left">483</property>
        <property name="Top">478</property>
    <property name="Database">dbgeotech1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbinsumos1</property>
    <property name="TableName">insumos</property>
  </object>
  <object class="Datasource" name="dsinsumos1" >
        <property name="Left">540</property>
        <property name="Top">483</property>
    <property name="Dataset">tbinsumos1</property>
    <property name="Name">dsinsumos1</property>
  </object>
</object>
?>
