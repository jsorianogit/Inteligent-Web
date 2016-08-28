<?php
<object class="frmProgramaciondePersonal" name="frmProgramaciondePersonal" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmProgramaciondePersonal</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">440</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmProgramaciondePersonal</property>
  <property name="Width">872</property>
  <property name="OnBeforeShow">frmProgramaciondePersonalBeforeShow</property>
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
    <property name="Height">110</property>
    <property name="Left">5</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">210</property>
    <property name="Width">571</property>
    <object class="DateTimePicker" name="Fecha" >
      <property name="Caption">Fecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat"></property>
      <property name="Left">75</property>
      <property name="Name">Fecha</property>
      <property name="Top">14</property>
      <property name="Width">112</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption"><![CDATA[A&ntilde;o]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">251</property>
      <property name="Name">Label5</property>
      <property name="Top">46</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Mes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">408</property>
      <property name="Name">Label6</property>
      <property name="Top">43</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Cantidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">249</property>
      <property name="Name">Label7</property>
      <property name="Top">75</property>
      <property name="Width">56</property>
    </object>
    <object class="Edit" name="txtTotal" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">308</property>
      <property name="Name">txtTotal</property>
      <property name="Top">70</property>
      <property name="Width">95</property>
      <property name="jsOnBlur">txtTotalJSBlur</property>
      <property name="jsOnFocus">txtTotalJSFocus</property>
      <property name="jsOnKeyPress">txtTotalJSKeyPress</property>
    </object>
    <object class="Edit" name="txtAn" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">307</property>
      <property name="Name">txtAn</property>
      <property name="Top">38</property>
      <property name="Width">96</property>
      <property name="jsOnBlur">txtAnJSBlur</property>
      <property name="jsOnFocus">txtAnJSFocus</property>
      <property name="jsOnKeyPress">txtAnJSKeyPress</property>
    </object>
    <object class="ComboBox" name="CboMes" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Items"><![CDATA[a:12:{s:2:&quot;01&quot;;s:5:&quot;Enero&quot;;s:2:&quot;02&quot;;s:7:&quot;Febrero&quot;;s:2:&quot;03&quot;;s:5:&quot;Marzo&quot;;s:2:&quot;04&quot;;s:5:&quot;Abril&quot;;s:2:&quot;05&quot;;s:4:&quot;Mayo&quot;;s:2:&quot;06&quot;;s:5:&quot;Junio&quot;;s:2:&quot;07&quot;;s:5:&quot;Julio&quot;;s:2:&quot;08&quot;;s:6:&quot;Agosto&quot;;s:2:&quot;09&quot;;s:10:&quot;Septiembre&quot;;i:10;s:7:&quot;Octubre&quot;;i:11;s:9:&quot;Noviembre&quot;;i:12;s:9:&quot;Diciembre&quot;;}]]></property>
      <property name="Left">386</property>
      <property name="Name">CboMes</property>
      <property name="Top">38</property>
      <property name="Width">104</property>
      <property name="jsOnBlur">CboMesJSBlur</property>
      <property name="jsOnFocus">CboMesJSFocus</property>
      <property name="jsOnKeyPress">CboMesJSKeyPress</property>
    </object>
    <object class="CheckBox" name="ChecaPropuesta" >
      <property name="Caption">Propuesta Mensual</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">245</property>
      <property name="Name">ChecaPropuesta</property>
      <property name="Top">12</property>
      <property name="Width">176</property>
      <property name="jsOnBlur">ChecaPropuestaJSBlur</property>
      <property name="jsOnChange">ChecaPropuestaJSChange</property>
      <property name="jsOnFocus">ChecaPropuestaJSFocus</property>
      <property name="jsOnKeyPress">ChecaPropuestaJSKeyPress</property>
    </object>
    <object class="Button" name="cmdOk" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Aceptar</property>
      <property name="ImageSource">Symbol-Check.ico</property>
      <property name="Left">411</property>
      <property name="Name">cmdOk</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">61</property>
      <property name="Width">40</property>
      <property name="OnClick">cmdOkClick</property>
      <property name="jsOnMouseMove">cmdOkJSMouseMove</property>
      <property name="jsOnMouseOut">cmdOkJSMouseOut</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">PROGRAMACION DE PERSONAL DIARIO</property>
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
    <property name="Caption">Fecha</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label2</property>
    <property name="Top">226</property>
    <property name="Width">57</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Cantidad</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label3</property>
    <property name="Top">253</property>
    <property name="Width">57</property>
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
  <object class="Edit" name="txtCantidad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">txtCantidad</property>
    <property name="Top">250</property>
    <property name="Width">112</property>
    <property name="jsOnBlur">txtCantidadJSBlur</property>
    <property name="jsOnFocus">txtCantidadJSFocus</property>
    <property name="jsOnKeyPress">txtCantidadJSKeyPress</property>
  </object>
  <object class="DBGrid" name="GridTipos" >
    <property name="Columns"><![CDATA[a:3:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;*&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;30&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;120&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">SourPozo</property>
    <property name="Height">168</property>
    <property name="Left">56</property>
    <property name="Name">GridTipos</property>
    <property name="Top">32</property>
    <property name="Width">520</property>
    <property name="jsOnClick">GridTiposJSClick</property>
    <property name="jsOnRowChanged">GridTiposJSRowChanged</property>
  </object>
  <object class="HiddenField" name="HiOldId" >
    <property name="Height">18</property>
    <property name="Left">11</property>
    <property name="Name">HiOldId</property>
    <property name="Top">328</property>
    <property name="Width">117</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">140</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">328</property>
    <property name="Width">108</property>
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
