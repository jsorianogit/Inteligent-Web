<?php
<object class="frmCatalogoEquipos" name="frmCatalogoEquipos" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmCatalogoEquipos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">480</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmCatalogoEquipos</property>
  <property name="Width">871</property>
  <property name="OnBeforeShow">frmCatalogoEquiposBeforeShow</property>
  <object class="Panel" name="Panel2" >
    <property name="Color">#408080</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">187</property>
    <property name="Left">13</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">29</property>
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
    <property name="Top">63</property>
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
    <property name="Height">235</property>
    <property name="Left">13</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">221</property>
    <property name="Width">723</property>
    <object class="Label" name="Label7" >
      <property name="Caption">Descripcion</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">65</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Cantidad</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="Top">171</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Item</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">40</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="txtItem" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">89</property>
      <property name="Name">txtItem</property>
      <property name="ParentColor">0</property>
      <property name="Top">34</property>
      <property name="Width">124</property>
      <property name="jsOnBlur">txtItemJSBlur</property>
      <property name="jsOnFocus">txtItemJSFocus</property>
      <property name="jsOnKeyPress">txtItemJSKeyPress</property>
    </object>
    <object class="Memo" name="memoDescribe" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">56</property>
      <property name="Left">89</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoDescribe</property>
      <property name="ParentColor">0</property>
      <property name="Top">59</property>
      <property name="Width">618</property>
      <property name="jsOnBlur">memoDescribeJSBlur</property>
      <property name="jsOnFocus">memoDescribeJSFocus</property>
      <property name="jsOnKeyPress">memoDescribeJSKeyPress</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Costo MN</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">253</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="Top">127</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Costo DLL</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">253</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="Top">152</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="txtCostoDLL" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">337</property>
      <property name="Name">txtCostoDLL</property>
      <property name="ParentColor">0</property>
      <property name="Top">149</property>
      <property name="Width">124</property>
      <property name="jsOnBlur">txtCostoDLLJSBlur</property>
      <property name="jsOnFocus">txtCostoDLLJSFocus</property>
      <property name="jsOnKeyPress">txtCostoDLLJSKeyPress</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">Venta MN</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">499</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="Top">132</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption">Venta DLL</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">499</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="Top">154</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="txtVentaMN" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">587</property>
      <property name="Name">txtVentaMN</property>
      <property name="ParentColor">0</property>
      <property name="Top">128</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">txtVentaMNJSBlur</property>
      <property name="jsOnFocus">txtVentaMNJSFocus</property>
      <property name="jsOnKeyPress">txtVentaMNJSKeyPress</property>
    </object>
    <object class="Edit" name="txtVentaDLL" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">587</property>
      <property name="Name">txtVentaDLL</property>
      <property name="ParentColor">0</property>
      <property name="Top">152</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">txtVentaDLLJSBlur</property>
      <property name="jsOnFocus">txtVentaDLLJSFocus</property>
      <property name="jsOnKeyPress">txtVentaDLLJSKeyPress</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Fecha Inicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">254</property>
      <property name="Name">Label12</property>
      <property name="Top">32</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">Fecha Final</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">499</property>
      <property name="Name">Label13</property>
      <property name="Top">32</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="txtJornada" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">88</property>
      <property name="Name">txtJornada</property>
      <property name="ParentColor">0</property>
      <property name="Top">196</property>
      <property name="Width">124</property>
      <property name="jsOnBlur">txtJornadaJSBlur</property>
      <property name="jsOnFocus">txtJornadaJSFocus</property>
      <property name="jsOnKeyPress">txtJornadaJSKeyPress</property>
    </object>
    <object class="DateTimePicker" name="FechaI" >
      <property name="Caption">FechaI</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">336</property>
      <property name="Name">FechaI</property>
      <property name="Top">24</property>
      <property name="Width">124</property>
    </object>
    <object class="DateTimePicker" name="FechaF" >
      <property name="Caption">FechaF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">523</property>
      <property name="Name">FechaF</property>
      <property name="Top">24</property>
      <property name="Width">121</property>
    </object>
    <object class="Label" name="Distribuye" >
      <property name="Caption">Distribuye</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">499</property>
      <property name="Name">Distribuye</property>
      <property name="ParentColor">0</property>
      <property name="Top">179</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Jornada" >
      <property name="Caption">Jornada</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Jornada</property>
      <property name="ParentColor">0</property>
      <property name="Top">195</property>
      <property name="Width">75</property>
    </object>
    <object class="ComboBox" name="CboTipo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">89</property>
      <property name="Name">CboTipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">122</property>
      <property name="Width">122</property>
      <property name="jsOnBlur">CboTipoJSBlur</property>
      <property name="jsOnFocus">CboTipoJSFocus</property>
      <property name="jsOnKeyPress">CboTipoJSKeyPress</property>
    </object>
    <object class="ComboBox" name="CboDistribuye" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items"><![CDATA[a:2:{s:2:&quot;Si&quot;;s:2:&quot;Si&quot;;s:2:&quot;No&quot;;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">538</property>
      <property name="Name">CboDistribuye</property>
      <property name="ParentColor">0</property>
      <property name="Top">178</property>
      <property name="Width">120</property>
      <property name="jsOnBlur">CboDistribuyeJSBlur</property>
      <property name="jsOnFocus">CboDistribuyeJSFocus</property>
      <property name="jsOnKeyPress">CboDistribuyeJSKeyPress</property>
    </object>
    <object class="Label" name="Prorrateo" >
      <property name="Caption">Prorrateo</property>
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">253</property>
      <property name="Name">Prorrateo</property>
      <property name="ParentColor">0</property>
      <property name="Top">179</property>
      <property name="Width">75</property>
    </object>
    <object class="ComboBox" name="CboProrrateo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items"><![CDATA[a:2:{s:2:&quot;Si&quot;;s:2:&quot;Si&quot;;s:2:&quot;No&quot;;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">338</property>
      <property name="Name">CboProrrateo</property>
      <property name="Top">176</property>
      <property name="Width">120</property>
      <property name="jsOnBlur">CboProrrateoJSBlur</property>
      <property name="jsOnFocus">CboProrrateoJSFocus</property>
      <property name="jsOnKeyPress">CboProrrateoJSKeyPress</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">CATALOGO DE EQUIPOS</property>
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
    <property name="Width">724</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Equipo</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">21</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">235</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Tipo Equipo</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">20</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">346</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Medida</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">20</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">370</property>
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
    <property name="Top">37</property>
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
    <property name="Top">91</property>
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
    <property name="Top">119</property>
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
    <property name="Top">147</property>
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
    <property name="Top">174</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="Edit" name="txtEquipo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">102</property>
    <property name="Name">txtEquipo</property>
    <property name="ParentColor">0</property>
    <property name="Top">230</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtEquipoJSBlur</property>
    <property name="jsOnFocus">txtEquipoJSFocus</property>
    <property name="jsOnKeyPress">txtEquipoJSKeyPress</property>
    <property name="jsOnKeyUp">txtEquipoJSKeyUp</property>
  </object>
  <object class="Edit" name="txtMedida" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">101</property>
    <property name="Name">txtMedida</property>
    <property name="ParentColor">0</property>
    <property name="Top">366</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtMedidaJSBlur</property>
    <property name="jsOnFocus">txtMedidaJSFocus</property>
    <property name="jsOnKeyPress">txtMedidaJSKeyPress</property>
  </object>
  <object class="DBGrid" name="GridTipos" >
    <property name="Columns"><![CDATA[a:16:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;*&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;30&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Id Equipo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdEquipo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;iItemOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Descipcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;TipoEquipo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;sIdTipoEquipo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;CostoMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dCostoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;CostoDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCostoDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;VentaMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;VentaDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dVentaDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;FechaInicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dFechaInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;FechaFinal&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dFechaFinal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Jornada&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;iJornada&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Distribuye&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;lDistribuye&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Prorrateo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;lProrrateo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">SourPozo</property>
    <property name="Height">185</property>
    <property name="Left">64</property>
    <property name="Name">GridTipos</property>
    <property name="Top">29</property>
    <property name="Width">672</property>
    <property name="jsOnClick">GridTiposJSClick</property>
    <property name="jsOnRowChanged">GridTiposJSRowChanged</property>
  </object>
  <object class="HiddenField" name="HiOldIdP" >
    <property name="Height">18</property>
    <property name="Left">747</property>
    <property name="Name">HiOldIdP</property>
    <property name="Top">312</property>
    <property name="Width">109</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">748</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">336</property>
    <property name="Width">108</property>
  </object>
  <object class="Edit" name="txtCantidad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">101</property>
    <property name="Name">txtCantidad</property>
    <property name="ParentColor">0</property>
    <property name="Top">392</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtCantidadJSBlur</property>
    <property name="jsOnFocus">txtCantidadJSFocus</property>
    <property name="jsOnKeyPress">txtCantidadJSKeyPress</property>
  </object>
  <object class="Edit" name="txtCostoMN" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">350</property>
    <property name="Name">txtCostoMN</property>
    <property name="ParentColor">0</property>
    <property name="Top">345</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtCostoMNJSBlur</property>
    <property name="jsOnFocus">txtCostoMNJSFocus</property>
    <property name="jsOnKeyPress">txtCostoMNJSKeyPress</property>
  </object>
  <object class="HiddenField" name="HiOldIdE" >
    <property name="Height">18</property>
    <property name="Left">747</property>
    <property name="Name">HiOldIdE</property>
    <property name="Top">288</property>
    <property name="Width">109</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">784</property>
        <property name="Top">28</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="SourPozo" >
        <property name="Left">768</property>
        <property name="Top">96</property>
    <property name="DataSet">QryPozo</property>
    <property name="Name">SourPozo</property>
  </object>
  <object class="Query" name="QryPozo" >
        <property name="Left">820</property>
        <property name="Top">93</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryPozo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
