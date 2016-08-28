<?php
<object class="frmProveedores" name="frmProveedores" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Proveedores</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmProveedores</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">frmProveedoresBeforeShow</property>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#000000</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">40</property>
    <property name="Left">22</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">519</property>
    <property name="Width">770</property>
  </object>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">169</property>
    <property name="Left">23</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">347</property>
    <property name="Width">772</property>
    <object class="Label" name="Label8" >
      <property name="Caption">Ordenes de Compra</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">arial</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">19</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">736</property>
    </object>
    <object class="DBGrid" name="dbgOrdenesCompra" >
      <property name="Columns"><![CDATA[a:6:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Folio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Numero de Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Orden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Fecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:16:&quot;Fecha de Entrega&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;FechaEntrega&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Referencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Elaboro&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Elaboro&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}}]]></property>
      <property name="DataSource">dsOrdenes</property>
      <property name="Height">110</property>
      <property name="Left">19</property>
      <property name="Name">dbgOrdenesCompra</property>
      <property name="ReadOnly">1</property>
      <property name="Top">48</property>
      <property name="Width">736</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">Usuario:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">22</property>
      <property name="Name">Label16</property>
      <property name="Top">11</property>
      <property name="Width">48</property>
    </object>
    <object class="ComboBox" name="CombUsuario" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">79</property>
      <property name="Name">CombUsuario</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">120</property>
      <property name="jsOnBlur">CombUsuarioJSBlur</property>
      <property name="jsOnFocus">CombUsuarioJSFocus</property>
      <property name="jsOnKeyPress">CombUsuarioJSKeyPress</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">Fecha Inicio:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">206</property>
      <property name="Name">Label17</property>
      <property name="Top">11</property>
      <property name="Width">72</property>
    </object>
    <object class="DateTimePicker" name="FechaI" >
      <property name="Caption">FechaI</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">281</property>
      <property name="Name">FechaI</property>
      <property name="Top">9</property>
      <property name="Width">101</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Fecha Final:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">397</property>
      <property name="Name">Label18</property>
      <property name="Top">11</property>
      <property name="Width">70</property>
    </object>
    <object class="DateTimePicker" name="FechaF" >
      <property name="Caption">FechaF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">473</property>
      <property name="Name">FechaF</property>
      <property name="Top">9</property>
      <property name="Width">103</property>
    </object>
    <object class="Button" name="cmdPrint" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">22</property>
      <property name="Left">640</property>
      <property name="Name">cmdPrint</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">5</property>
      <property name="Width">89</property>
      <property name="jsOnClick">cmdPrintJSClick</property>
    </object>
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
    <property name="Height">174</property>
    <property name="Left">24</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">170</property>
    <property name="Width">771</property>
    <object class="Edit" name="sIdProveedor" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">79</property>
      <property name="MaxLength">5</property>
      <property name="Name">sIdProveedor</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">sIdProveedorJSBlur</property>
      <property name="jsOnFocus">sIdProveedorJSFocus</property>
      <property name="jsOnKeyPress">sIdProveedorJSKeyPress</property>
    </object>
    <object class="Edit" name="sRazon" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">79</property>
      <property name="Name">sRazon</property>
      <property name="ParentColor">0</property>
      <property name="Top">30</property>
      <property name="Width">299</property>
      <property name="jsOnBlur">sRazonJSBlur</property>
      <property name="jsOnFocus">sRazonJSFocus</property>
      <property name="jsOnKeyPress">sRazonJSKeyPress</property>
    </object>
    <object class="Edit" name="sDomicilio" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">79</property>
      <property name="Name">sDomicilio</property>
      <property name="ParentColor">0</property>
      <property name="Top">53</property>
      <property name="Width">299</property>
      <property name="jsOnBlur">sDomicilioJSBlur</property>
      <property name="jsOnFocus">sDomicilioJSFocus</property>
      <property name="jsOnKeyPress">sDomicilioJSKeyPress</property>
    </object>
    <object class="Edit" name="sCiudad" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">444</property>
      <property name="Name">sCiudad</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">122</property>
      <property name="jsOnBlur">sCiudadJSBlur</property>
      <property name="jsOnFocus">sCiudadJSFocus</property>
      <property name="jsOnKeyPress">sCiudadJSKeyPress</property>
    </object>
    <object class="Edit" name="sEstado" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">621</property>
      <property name="Name">sEstado</property>
      <property name="ParentColor">0</property>
      <property name="Top">51</property>
      <property name="Width">134</property>
      <property name="jsOnBlur">sEstadoJSBlur</property>
      <property name="jsOnFocus">sEstadoJSFocus</property>
      <property name="jsOnKeyPress">sEstadoJSKeyPress</property>
    </object>
    <object class="Edit" name="sRfc" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">79</property>
      <property name="Name">sRfc</property>
      <property name="ParentColor">0</property>
      <property name="Top">76</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">sRfcJSBlur</property>
      <property name="jsOnFocus">sRfcJSFocus</property>
      <property name="jsOnKeyPress">sRfcJSKeyPress</property>
    </object>
    <object class="Edit" name="sTelefono" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">256</property>
      <property name="Name">sTelefono</property>
      <property name="ParentColor">0</property>
      <property name="Top">76</property>
      <property name="Width">122</property>
      <property name="jsOnBlur">sTelefonoJSBlur</property>
      <property name="jsOnFocus">sTelefonoJSFocus</property>
      <property name="jsOnKeyPress">sTelefonoJSKeyPress</property>
    </object>
    <object class="Edit" name="sCuenta" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">79</property>
      <property name="Name">sCuenta</property>
      <property name="ParentColor">0</property>
      <property name="Top">98</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">sCuentaJSBlur</property>
      <property name="jsOnFocus">sCuentaJSFocus</property>
      <property name="jsOnKeyPress">sCuentaJSKeyPress</property>
    </object>
    <object class="Edit" name="sSucursal" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">256</property>
      <property name="Name">sSucursal</property>
      <property name="ParentColor">0</property>
      <property name="Top">98</property>
      <property name="Width">122</property>
      <property name="jsOnBlur">sSucursalJSBlur</property>
      <property name="jsOnFocus">sSucursalJSFocus</property>
      <property name="jsOnKeyPress">sSucursalJSKeyPress</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Id</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">1</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="Top">10</property>
      <property name="Width">71</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Razon</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">1</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="Top">32</property>
      <property name="Width">71</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Domicilio</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">2</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="Top">55</property>
      <property name="Width">71</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Ciudad</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">386</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">57</property>
      <property name="Width">49</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Estado</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">574</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">41</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agRight</property>
      <property name="Caption">RFC</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">63</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Telefono</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">204</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="Top">80</property>
      <property name="Width">48</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cuenta</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="Top">99</property>
      <property name="Width">63</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Sucursal</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">205</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="Top">102</property>
      <property name="Width">46</property>
    </object>
    <object class="Edit" name="sBanco" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">444</property>
      <property name="Name">sBanco</property>
      <property name="ParentColor">0</property>
      <property name="Top">98</property>
      <property name="Width">312</property>
      <property name="jsOnBlur">sBancoJSBlur</property>
      <property name="jsOnFocus">sBancoJSFocus</property>
      <property name="jsOnKeyPress">sBancoJSKeyPress</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Banco</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">386</property>
      <property name="Name">Label12</property>
      <property name="ParentColor">0</property>
      <property name="Top">102</property>
      <property name="Width">47</property>
    </object>
    <object class="Memo" name="mComentarios" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">45</property>
      <property name="Left">78</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mComentarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">679</property>
      <property name="jsOnBlur">mComentariosJSBlur</property>
      <property name="jsOnFocus">mComentariosJSFocus</property>
      <property name="jsOnKeyPress">mComentariosJSKeyPress</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label13</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">71</property>
    </object>
    <object class="Edit" name="sRepresentante" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">22</property>
      <property name="Left">444</property>
      <property name="Name">sRepresentante</property>
      <property name="ParentColor">0</property>
      <property name="Top">12</property>
      <property name="Width">313</property>
      <property name="jsOnBlur">sRepresentanteJSBlur</property>
      <property name="jsOnFocus">sRepresentanteJSFocus</property>
      <property name="jsOnKeyPress">sRepresentanteJSKeyPress</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Representante</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">351</property>
      <property name="Name">Label14</property>
      <property name="ParentColor">0</property>
      <property name="Top">13</property>
      <property name="Width">83</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;PROVEEDORES&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">25</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Width">771</property>
  </object>
  <object class="DBGrid" name="dbgGeneral" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dsGeneral</property>
    <property name="Height">55</property>
    <property name="Left">251</property>
    <property name="Name">dbgGeneral</property>
    <property name="Top">65</property>
    <property name="Width">395</property>
  </object>
  <object class="DBGrid" name="dbgProveedores" >
    <property name="Columns"><![CDATA[a:12:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;Id&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sIdProveedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Razon&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;sRazon&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Domicilio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sDomicilio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Ciudad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sCiudad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Estado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sEstado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;RFC&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;sRfc&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Telefono&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sTelefono&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Cuenta&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sCuenta&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Sucursal&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sSucursal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Banco&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;sBanco&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Representante&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sRepresentante&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dsProveedores</property>
    <property name="Height">140</property>
    <property name="Left">103</property>
    <property name="Name">dbgProveedores</property>
    <property name="ReadOnly">1</property>
    <property name="Top">28</property>
    <property name="Width">692</property>
    <property name="jsOnClick">dbgProveedoresJSClick</property>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">140</property>
    <property name="Left">25</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">28</property>
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
      <property name="ParentColor">0</property>
      <property name="Top">4</property>
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
      <property name="ParentColor">0</property>
      <property name="Top">25</property>
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
      <property name="Top">48</property>
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
      <property name="Top">70</property>
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
      <property name="ParentColor">0</property>
      <property name="Top">93</property>
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
      <property name="Top">114</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hOldsIdProveedor" >
    <property name="Height">20</property>
    <property name="Left">482</property>
    <property name="Name">hOldsIdProveedor</property>
    <property name="Top">522</property>
    <property name="Width">134</property>
  </object>
  <object class="HiddenField" name="hOperacion" >
    <property name="Height">18</property>
    <property name="Left">481</property>
    <property name="Name">hOperacion</property>
    <property name="Top">543</property>
    <property name="Width">135</property>
  </object>
  <object class="ComboBox" name="sFormato" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
    <property name="Left">142</property>
    <property name="Name">sFormato</property>
    <property name="ParentColor">0</property>
    <property name="Top">533</property>
    <property name="Visible">0</property>
    <property name="Width">70</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Formato</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">55</property>
    <property name="Name">Label15</property>
    <property name="Top">535</property>
    <property name="Visible">0</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="HidError" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">HidError</property>
    <property name="Top">528</property>
    <property name="Width">112</property>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">339</property>
        <property name="Top">532</property>
    <property name="Connected"></property>
    <property name="DatabaseName">geotechadal</property>
    <property name="Name">Database1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Query" name="qryProveedores" >
        <property name="Left">396</property>
        <property name="Top">531</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryProveedores</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:25:&quot;select * from proveedores&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dsProveedores" >
        <property name="Left">453</property>
        <property name="Top">531</property>
    <property name="DataSet">qryProveedores</property>
    <property name="Name">dsProveedores</property>
  </object>
  <object class="Datasource" name="dsGeneral" >
        <property name="Left">291</property>
        <property name="Top">535</property>
    <property name="DataSet">qryGeneral</property>
    <property name="Name">dsGeneral</property>
  </object>
  <object class="Query" name="qryGeneral" >
        <property name="Left">226</property>
        <property name="Top">534</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryGeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:9:{i:0;s:6:&quot;select&quot;;i:1;s:20:&quot;  iFolioRequisicion,&quot;;i:2;s:15:&quot;  sNumeroOrden,&quot;;i:3;s:11:&quot;  dIdFecha,&quot;;i:4;s:16:&quot;  dFechaEntrega,&quot;;i:5;s:14:&quot;  sReferencia,&quot;;i:6;s:11:&quot;  sElaboro,&quot;;i:7;s:13:&quot; sIdProveedor&quot;;i:8;s:18:&quot;from anexo_pedidos&quot;;}]]></property>
  </object>
  <object class="Query" name="qryOrdenes" >
        <property name="Left">576</property>
        <property name="Top">534</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryOrdenes</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dsOrdenes" >
        <property name="Left">522</property>
        <property name="Top">534</property>
    <property name="DataSet">qryOrdenes</property>
    <property name="Name">dsOrdenes</property>
  </object>
</object>
?>
