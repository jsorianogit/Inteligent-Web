<?php
<object class="frmOrdenesCompra" name="frmOrdenesCompra" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Ordenes de Compra</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">552</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmOrdenesCompra</property>
  <property name="UseAjax">1</property>
  <property name="Width">920</property>
  <property name="OnBeforeShow">frmOrdenesCompraBeforeShow</property>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">260</property>
    <property name="Left">17</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">232</property>
    <property name="Width">759</property>
    <object class="Edit" name="txtCPT" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">14</property>
      <property name="Left">383</property>
      <property name="Name">txtCPT</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">15</property>
      <property name="jsOnBlur">txtCPTJSBlur</property>
      <property name="jsOnFocus">txtCPTJSFocus</property>
      <property name="jsOnKeyPress">txtCPTJSKeyPress</property>
    </object>
    <object class="Edit" name="txtCostoInsumo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">427</property>
      <property name="Name">txtCostoInsumo</property>
      <property name="Top">52</property>
      <property name="Width">76</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Costo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">569</property>
      <property name="Name">Label13</property>
      <property name="Top">36</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cant. Insumos</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">551</property>
      <property name="Name">Label15</property>
      <property name="Top">82</property>
      <property name="Width">86</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Insumo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">19</property>
      <property name="Name">Label7</property>
      <property name="Top">13</property>
      <property name="Width">68</property>
    </object>
    <object class="Edit" name="txtNumPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">90</property>
      <property name="Name">txtNumPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">141</property>
      <property name="jsOnBlur">txtNumPartidaJSBlur</property>
      <property name="jsOnChange">txtNumPartidaJSChange</property>
      <property name="jsOnFocus">txtNumPartidaJSFocus</property>
      <property name="jsOnKeyPress">txtNumPartidaJSKeyPress</property>
      <property name="jsOnKeyUp">txtNumPartidaJSKeyUp</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">11</property>
      <property name="Name">Label11</property>
      <property name="Top">38</property>
      <property name="Width">76</property>
    </object>
    <object class="Memo" name="memoCometarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">58</property>
      <property name="Left">90</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoCometarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">32</property>
      <property name="Width">453</property>
      <property name="jsOnBlur">memoCometariosJSBlur</property>
      <property name="jsOnFocus">memoCometariosJSFocus</property>
      <property name="jsOnKeyPress">memoCometariosJSKeyPress</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cantidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">15</property>
      <property name="Name">Label9</property>
      <property name="Top">94</property>
      <property name="Width">71</property>
    </object>
    <object class="Edit" name="txtCantidad" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">90</property>
      <property name="Name">txtCantidad</property>
      <property name="ParentColor">0</property>
      <property name="Top">92</property>
      <property name="Width">81</property>
      <property name="jsOnBlur">txtCantidadJSBlur</property>
      <property name="jsOnFocus">txtCantidadJSFocus</property>
      <property name="jsOnKeyPress">txtCantidadJSKeyPress</property>
    </object>
    <object class="Edit" name="txtMedida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">269</property>
      <property name="Name">txtMedida</property>
      <property name="ParentColor">0</property>
      <property name="Top">92</property>
      <property name="Width">66</property>
      <property name="jsOnBlur">txtMedidaJSBlur</property>
      <property name="jsOnFocus">txtMedidaJSFocus</property>
      <property name="jsOnKeyPress">txtMedidaJSKeyPress</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Medida</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">214</property>
      <property name="Name">Label10</property>
      <property name="Top">94</property>
      <property name="Width">46</property>
    </object>
    <object class="Button" name="cmdEliminaPartida" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">677</property>
      <property name="Name">cmdEliminaPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">171</property>
      <property name="Width">67</property>
      <property name="OnClick">cmdEliminaPartidaClick</property>
      <property name="jsOnClick">cmdEliminaPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdCancelaPartida" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">677</property>
      <property name="Name">cmdCancelaPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">211</property>
      <property name="Width">67</property>
      <property name="jsOnClick">cmdCancelaPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdAceptaPartida" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">677</property>
      <property name="Name">cmdAceptaPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">191</property>
      <property name="Width">67</property>
      <property name="OnClick">cmdAceptaPartidaClick</property>
      <property name="jsOnClick">cmdAceptaPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdEditPartida" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">677</property>
      <property name="Name">cmdEditPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">151</property>
      <property name="Width">67</property>
      <property name="jsOnClick">cmdEditPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdAddPartida" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">677</property>
      <property name="Name">cmdAddPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">131</property>
      <property name="Width">67</property>
      <property name="jsOnClick">cmdAddPartidaJSClick</property>
    </object>
    <object class="Edit" name="txtMaterial" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">638</property>
      <property name="Name">txtMaterial</property>
      <property name="ParentColor">0</property>
      <property name="Top">32</property>
      <property name="Width">105</property>
    </object>
    <object class="Edit" name="txtUnidad" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">638</property>
      <property name="Name">txtUnidad</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">105</property>
    </object>
    <object class="Edit" name="txtCantidadAnexo" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">638</property>
      <property name="Name">txtCantidadAnexo</property>
      <property name="ParentColor">0</property>
      <property name="Top">80</property>
      <property name="Width">105</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Unidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">573</property>
      <property name="Name">Label14</property>
      <property name="Top">60</property>
      <property name="Width">63</property>
    </object>
    <object class="Label" name="lblTituloAnexo" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">I   N   S   U   M   O   S</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">615</property>
      <property name="Name">lblTituloAnexo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">7</property>
      <property name="Width">140</property>
    </object>
    <object class="DBGrid" name="dbgPartidas" >
      <property name="Columns"><![CDATA[a:9:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Partida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;40&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;110&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Cant_Insumos&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Precio Actual&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;90&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Monto_MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;90&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Nuevo Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
      <property name="Datasource">dtaPartidas</property>
      <property name="Height">118</property>
      <property name="Left">23</property>
      <property name="Name">dbgPartidas</property>
      <property name="ReadOnly">1</property>
      <property name="Top">122</property>
      <property name="Width">640</property>
      <property name="jsOnClick">dbgPartidasJSClick</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">Nuevo Costo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">372</property>
      <property name="Name">Label16</property>
      <property name="Top">96</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="txtNuevoCosto" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">450</property>
      <property name="Name">txtNuevoCosto</property>
      <property name="ParentColor">0</property>
      <property name="Top">92</property>
      <property name="Width">92</property>
      <property name="jsOnBlur">txtNuevoCostoJSBlur</property>
      <property name="jsOnFocus">txtNuevoCostoJSFocus</property>
      <property name="jsOnKeyPress">txtNuevoCostoJSKeyPress</property>
    </object>
    <object class="Button" name="CmdMostrar" >
      <property name="Caption">Mostrar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">239</property>
      <property name="Name">CmdMostrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">72</property>
      <property name="jsOnClick">CmdMostrarJSClick</property>
    </object>
    <object class="ComboBox" name="cmbPart" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">367</property>
      <property name="Name">cmbPart</property>
      <property name="Top">8</property>
      <property name="Width">176</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Caption">Partida:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">319</property>
      <property name="Name">Label24</property>
      <property name="Top">12</property>
      <property name="Width">45</property>
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
    <property name="Height">260</property>
    <property name="Left">17</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">231</property>
    <property name="Width">759</property>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Folio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">30</property>
      <property name="Name">Label2</property>
      <property name="Top">17</property>
      <property name="Width">55</property>
    </object>
    <object class="Edit" name="iFolioPedido" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">89</property>
      <property name="Name">iFolioPedido</property>
      <property name="ParentColor">0</property>
      <property name="Top">15</property>
      <property name="Width">110</property>
      <property name="jsOnBlur">iFolioPedidoJSBlur</property>
      <property name="jsOnFocus">iFolioPedidoJSFocus</property>
      <property name="jsOnKeyPress">iFolioPedidoJSKeyPress</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Fecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">26</property>
      <property name="Name">Label3</property>
      <property name="Top">66</property>
      <property name="Width">59</property>
    </object>
    <object class="DateTimePicker" name="dIdFecha" >
      <property name="Caption">dIdFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">89</property>
      <property name="Name">dIdFecha</property>
      <property name="Top">64</property>
      <property name="Width">112</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">22</property>
      <property name="Name">Label4</property>
      <property name="Top">110</property>
      <property name="Width">62</property>
    </object>
    <object class="ComboBox" name="sNumeroOrden" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">89</property>
      <property name="Name">sNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">111</property>
      <property name="Width">182</property>
      <property name="jsOnBlur">sNumeroOrdenJSBlur</property>
      <property name="jsOnFocus">sNumeroOrdenJSFocus</property>
      <property name="jsOnKeyPress">sNumeroOrdenJSKeyPress</property>
    </object>
    <object class="Edit" name="sReferencia" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">89</property>
      <property name="Name">sReferencia</property>
      <property name="ParentColor">0</property>
      <property name="Top">134</property>
      <property name="Width">182</property>
      <property name="jsOnBlur">sReferenciaJSBlur</property>
      <property name="jsOnFocus">sReferenciaJSFocus</property>
      <property name="jsOnKeyPress">sReferenciaJSKeyPress</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Referencia</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">14</property>
      <property name="Name">Label5</property>
      <property name="Top">134</property>
      <property name="Width">71</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">6</property>
      <property name="Name">Label6</property>
      <property name="Top">184</property>
      <property name="Width">79</property>
    </object>
    <object class="Memo" name="mComentarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">62</property>
      <property name="Left">89</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mComentarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">182</property>
      <property name="Width">270</property>
      <property name="jsOnBlur">mComentariosJSBlur</property>
      <property name="jsOnFocus">mComentariosJSFocus</property>
      <property name="jsOnKeyPress">mComentariosJSKeyPress</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">F. Entrega</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">26</property>
      <property name="Name">Label17</property>
      <property name="Top">90</property>
      <property name="Width">59</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Proveedor</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">26</property>
      <property name="Name">Label18</property>
      <property name="Top">161</property>
      <property name="Width">58</property>
    </object>
    <object class="DateTimePicker" name="dtaF_Entrega" >
      <property name="Caption">dtaFechaEntrega</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">89</property>
      <property name="Name">dtaF_Entrega</property>
      <property name="Top">88</property>
      <property name="Width">112</property>
    </object>
    <object class="ComboBox" name="sProveedor" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">89</property>
      <property name="Name">sProveedor</property>
      <property name="Top">159</property>
      <property name="Width">270</property>
      <property name="jsOnBlur">sProveedorJSBlur</property>
      <property name="jsOnFocus">sProveedorJSFocus</property>
      <property name="jsOnKeyPress">sProveedorJSKeyPress</property>
    </object>
    <object class="Label" name="Revision" >
      <property name="Caption">Revision</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">10</property>
      <property name="Left">541</property>
      <property name="Name">Revision</property>
      <property name="Top">92</property>
      <property name="Width">48</property>
    </object>
    <object class="Label" name="Elaboro" >
      <property name="Caption">Elaboro</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">547</property>
      <property name="Name">Elaboro</property>
      <property name="Top">140</property>
      <property name="Visible">0</property>
      <property name="Width">41</property>
    </object>
    <object class="Label" name="Autorizo" >
      <property name="Caption">Reviso 2</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">540</property>
      <property name="Name">Autorizo</property>
      <property name="Top">188</property>
      <property name="Visible">0</property>
      <property name="Width">48</property>
    </object>
    <object class="Label" name="Verificacion" >
      <property name="Caption">Autorizo</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">543</property>
      <property name="Name">Verificacion</property>
      <property name="Top">212</property>
      <property name="Visible">0</property>
      <property name="Width">45</property>
    </object>
    <object class="Label" name="Recibido" >
      <property name="Caption">L.A.B.</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">552</property>
      <property name="Name">Recibido</property>
      <property name="Top">116</property>
      <property name="Width">35</property>
    </object>
    <object class="Edit" name="txtRevision" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">593</property>
      <property name="Name">txtRevision</property>
      <property name="Top">88</property>
      <property name="Width">67</property>
      <property name="jsOnBlur">txtRevisionJSBlur</property>
      <property name="jsOnFocus">txtRevisionJSFocus</property>
      <property name="jsOnKeyPress">txtRevisionJSKeyPress</property>
    </object>
    <object class="Edit" name="txtElaboro" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">593</property>
      <property name="Name">txtElaboro</property>
      <property name="Top">136</property>
      <property name="Visible">0</property>
      <property name="Width">147</property>
      <property name="jsOnBlur">txtElaboroJSBlur</property>
      <property name="jsOnFocus">txtElaboroJSFocus</property>
      <property name="jsOnKeyPress">txtElaboroJSKeyPress</property>
    </object>
    <object class="Edit" name="txtReviso2" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">593</property>
      <property name="Name">txtReviso2</property>
      <property name="Top">184</property>
      <property name="Visible">0</property>
      <property name="Width">147</property>
      <property name="jsOnBlur">txtReviso2JSBlur</property>
      <property name="jsOnFocus">txtReviso2JSFocus</property>
      <property name="jsOnKeyPress">txtReviso2JSKeyPress</property>
    </object>
    <object class="Edit" name="txtAutorizo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">593</property>
      <property name="Name">txtAutorizo</property>
      <property name="Top">208</property>
      <property name="Visible">0</property>
      <property name="Width">147</property>
      <property name="jsOnBlur">txtAutorizoJSBlur</property>
      <property name="jsOnFocus">txtAutorizoJSFocus</property>
      <property name="jsOnKeyPress">txtAutorizoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtLAB" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">593</property>
      <property name="Name">txtLAB</property>
      <property name="Top">112</property>
      <property name="Width">147</property>
      <property name="jsOnBlur">txtLABJSBlur</property>
      <property name="jsOnFocus">txtLABJSFocus</property>
      <property name="jsOnKeyPress">txtLABJSKeyPress</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Caption">Reviso 1</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">540</property>
      <property name="Name">Label20</property>
      <property name="Top">166</property>
      <property name="Visible">0</property>
      <property name="Width">49</property>
    </object>
    <object class="Edit" name="txtReviso1" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">593</property>
      <property name="Name">txtReviso1</property>
      <property name="Top">160</property>
      <property name="Visible">0</property>
      <property name="Width">147</property>
      <property name="jsOnBlur">txtReviso1JSBlur</property>
      <property name="jsOnFocus">txtReviso1JSFocus</property>
      <property name="jsOnKeyPress">txtReviso1JSKeyPress</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Caption">Factura</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">321</property>
      <property name="Name">Label21</property>
      <property name="Top">17</property>
      <property name="Width">44</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Caption">Forma Pago</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">294</property>
      <property name="Name">Label22</property>
      <property name="Top">40</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">Tiempo Entrega</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">272</property>
      <property name="Name">Label23</property>
      <property name="Top">64</property>
      <property name="Width">88</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">Moneda</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">315</property>
      <property name="Name">Label25</property>
      <property name="Top">90</property>
      <property name="Width">44</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Caption">Calidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">546</property>
      <property name="Name">Label26</property>
      <property name="Top">67</property>
      <property name="Width">44</property>
    </object>
    <object class="Label" name="Label27" >
      <property name="Caption">Costo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">554</property>
      <property name="Name">Label27</property>
      <property name="Top">41</property>
      <property name="Width">32</property>
    </object>
    <object class="Label" name="Label28" >
      <property name="Caption">Credito</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">319</property>
      <property name="Name">Label28</property>
      <property name="Top">114</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label29" >
      <property name="Caption">M. Transporte</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">512</property>
      <property name="Name">Label29</property>
      <property name="Top">16</property>
      <property name="Width">80</property>
    </object>
    <object class="Edit" name="txtFactura" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">367</property>
      <property name="Name">txtFactura</property>
      <property name="Top">12</property>
      <property name="Width">132</property>
      <property name="jsOnBlur">txtFacturaJSBlur</property>
      <property name="jsOnFocus">txtFacturaJSFocus</property>
      <property name="jsOnKeyPress">txtFacturaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtFormaPag" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">367</property>
      <property name="Name">txtFormaPag</property>
      <property name="Top">36</property>
      <property name="Width">132</property>
      <property name="jsOnBlur">txtFormaPagJSBlur</property>
      <property name="jsOnFocus">txtFormaPagJSFocus</property>
      <property name="jsOnKeyPress">txtFormaPagJSKeyPress</property>
    </object>
    <object class="Edit" name="TiempoEntrega" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">367</property>
      <property name="Name">TiempoEntrega</property>
      <property name="Top">60</property>
      <property name="Width">132</property>
      <property name="jsOnBlur">TiempoEntregaJSBlur</property>
      <property name="jsOnFocus">TiempoEntregaJSFocus</property>
      <property name="jsOnKeyPress">TiempoEntregaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtMoneda" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">367</property>
      <property name="Name">txtMoneda</property>
      <property name="Top">85</property>
      <property name="Width">132</property>
      <property name="jsOnBlur">txtMonedaJSBlur</property>
      <property name="jsOnFocus">txtMonedaJSFocus</property>
      <property name="jsOnKeyPress">txtMonedaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtCredito" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">367</property>
      <property name="Name">txtCredito</property>
      <property name="Top">110</property>
      <property name="Width">132</property>
      <property name="jsOnBlur">txtCreditoJSBlur</property>
      <property name="jsOnFocus">txtCreditoJSFocus</property>
      <property name="jsOnKeyPress">txtCreditoJSKeyPress</property>
    </object>
    <object class="CheckBox" name="chkProveedor" >
      <property name="Caption">Proveedor Unico</property>
      <property name="Checked">1</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">364</property>
      <property name="Name">chkProveedor</property>
      <property name="Top">133</property>
      <property name="Width">121</property>
    </object>
    <object class="Edit" name="txtMTransporte" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">594</property>
      <property name="Name">txtMTransporte</property>
      <property name="Top">14</property>
      <property name="Width">145</property>
      <property name="jsOnBlur">txtMTransporteJSBlur</property>
      <property name="jsOnFocus">txtMTransporteJSFocus</property>
      <property name="jsOnKeyPress">txtMTransporteJSKeyPress</property>
    </object>
    <object class="Edit" name="txtCosto" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">594</property>
      <property name="Name">txtCosto</property>
      <property name="Top">38</property>
      <property name="Width">145</property>
      <property name="jsOnBlur">txtCostoJSBlur</property>
      <property name="jsOnFocus">txtCostoJSFocus</property>
      <property name="jsOnKeyPress">txtCostoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtCalidad" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">594</property>
      <property name="Name">txtCalidad</property>
      <property name="Top">63</property>
      <property name="Width">145</property>
      <property name="jsOnBlur">txtCalidadJSBlur</property>
      <property name="jsOnFocus">txtCalidadJSFocus</property>
      <property name="jsOnKeyPress">txtCalidadJSKeyPress</property>
    </object>
    <object class="CheckBox" name="chkStatus" >
      <property name="Caption">Orden Autorizada</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">590</property>
      <property name="Name">chkStatus</property>
      <property name="Top">233</property>
      <property name="Width">121</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Requisicion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">23</property>
      <property name="Name">Label12</property>
      <property name="Top">43</property>
      <property name="Width">64</property>
    </object>
    <object class="ComboBox" name="sRequisicion" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">89</property>
      <property name="Name">sRequisicion</property>
      <property name="Top">41</property>
      <property name="Width">110</property>
      <property name="jsOnBlur">sRequisicionJSBlur</property>
      <property name="jsOnChange">sRequisicionJSChange</property>
      <property name="jsOnFocus">sRequisicionJSFocus</property>
      <property name="jsOnKeyPress">sRequisicionJSKeyPress</property>
    </object>
    <object class="Label" name="Label30" >
      <property name="Caption">Periodo Pago</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">367</property>
      <property name="Name">Label30</property>
      <property name="Top">161</property>
      <property name="Width">76</property>
    </object>
    <object class="Label" name="Label31" >
      <property name="Caption">Total Pagos</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">367</property>
      <property name="Name">Label31</property>
      <property name="Top">184</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label32" >
      <property name="Caption">Anticipo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">367</property>
      <property name="Name">Label32</property>
      <property name="Top">227</property>
      <property name="Width">72</property>
    </object>
    <object class="Label" name="Label33" >
      <property name="Caption">Interes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">367</property>
      <property name="Name">Label33</property>
      <property name="Top">206</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="TxtPeriodoPago" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">444</property>
      <property name="Name">TxtPeriodoPago</property>
      <property name="ParentColor">0</property>
      <property name="Top">156</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">TxtPeriodoPagoJSBlur</property>
      <property name="jsOnFocus">TxtPeriodoPagoJSFocus</property>
      <property name="jsOnKeyPress">TxtPeriodoPagoJSKeyPress</property>
    </object>
    <object class="Edit" name="TxtTotalPagos" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">444</property>
      <property name="Name">TxtTotalPagos</property>
      <property name="ParentColor">0</property>
      <property name="Top">179</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">TxtTotalPagosJSBlur</property>
      <property name="jsOnFocus">TxtTotalPagosJSFocus</property>
      <property name="jsOnKeyPress">TxtTotalPagosJSKeyPress</property>
    </object>
    <object class="Edit" name="TxtInteres" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">444</property>
      <property name="Name">TxtInteres</property>
      <property name="ParentColor">0</property>
      <property name="Top">202</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">TxtInteresJSBlur</property>
      <property name="jsOnFocus">TxtInteresJSFocus</property>
      <property name="jsOnKeyPress">TxtInteresJSKeyPress</property>
    </object>
    <object class="Edit" name="TxtAnticipo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">444</property>
      <property name="Name">TxtAnticipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">225</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">TxtAnticipoJSBlur</property>
      <property name="jsOnFocus">TxtAnticipoJSFocus</property>
      <property name="jsOnKeyPress">TxtAnticipoJSKeyPress</property>
    </object>
  </object>
  <object class="DBGrid" name="dbgGeneral" >
    <property name="Columns"><![CDATA[a:7:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;iFolioPedido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;iItem&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Actividad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Costo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">dtaGenral</property>
    <property name="Height">20</property>
    <property name="Left">716</property>
    <property name="Name">dbgGeneral</property>
    <property name="Top">52</property>
    <property name="Width">12</property>
  </object>
  <object class="DBGrid" name="dbgActMostrar" >
    <property name="Columns"><![CDATA[a:6:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Actividad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dCostoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;NuevoCosto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dNuevoPrecio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dtaActMostrar</property>
    <property name="Height">16</property>
    <property name="Left">696</property>
    <property name="Name">dbgActMostrar</property>
    <property name="ReadOnly">1</property>
    <property name="Top">52</property>
    <property name="Width">12</property>
  </object>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">180</property>
    <property name="Left">16</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">16</property>
    <property name="Width">760</property>
    <object class="DBGrid" name="dbgPedidos" >
      <property name="Columns"><![CDATA[a:29:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Pedido&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;iFolioPedido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:7:&quot;#FF8040&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;F. Entrega&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;dFechaEntrega&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;No. Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Proveedor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sIdProveedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Requisicion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;iFolioRequisicion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Elaboro&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sElaboro&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Reviso1&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sReviso1&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Reviso2&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sReviso2&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Autorizo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sAutorizo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;Lab&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;sLab&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;MedTransporte&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sMedioTransporte&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Credito&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sCredito&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Pago&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sFormaPago&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Factura&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sFactura&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;dCosto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;sCosto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:17;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Calidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sCalidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:18;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;T_Entrega&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sTiempoEntrega&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:19;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;UnicoProveedor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;lUnicoProveedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:20;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Moneda&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMoneda&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:21;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Revision&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sRevision&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:22;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:23;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;dCosto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:24;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:25;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;PeriodoPag&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sPeriodoPago&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:26;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;TotalPagos&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dTotalPagos&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:27;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Abono&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;dAbono&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:28;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Interes&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dIntereses&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
      <property name="Datasource">dsAnexo_pedidos</property>
      <property name="Height">135</property>
      <property name="Left">76</property>
      <property name="Name">dbgPedidos</property>
      <property name="ReadOnly">1</property>
      <property name="Top">28</property>
      <property name="Width">656</property>
      <property name="jsOnClick">dbgPedidosJSClick</property>
    </object>
    <object class="Button" name="cmdAddRequisicion" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdAddRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">28</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAddRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdChangeRequisicion" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdChangeRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">51</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdChangeRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdDeleteRequisicion" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdDeleteRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">74</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdDeleteRequisicionClick</property>
      <property name="jsOnClick">cmdDeleteRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdAcceptRequisicion" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdAcceptRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">97</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAcceptRequisicionClick</property>
      <property name="jsOnClick">cmdAcceptRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdCancelRequisicion" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdCancelRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdCancelRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdPrintRequisicion" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdPrintRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="Top">143</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdPrintRequisicionJSClick</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Ordenes de Compra de Materiales</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">760</property>
    </object>
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
    <property name="Left">17</property>
    <property name="Name">Panel4</property>
    <property name="ParentColor">0</property>
    <property name="Top">202</property>
    <property name="Width">759</property>
    <object class="Button" name="cmdShowRequisicion" >
      <property name="Caption">Informacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">9</property>
      <property name="Name">cmdShowRequisicion</property>
      <property name="Top">1</property>
      <property name="Width">108</property>
      <property name="jsOnClick">cmdShowRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdShowPartidas" >
      <property name="Caption">Partidas Anexo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">123</property>
      <property name="Name">cmdShowPartidas</property>
      <property name="Top">1</property>
      <property name="Width">144</property>
      <property name="jsOnClick">cmdShowPartidasJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hdfOpcion" >
    <property name="Height">18</property>
    <property name="Left">24</property>
    <property name="Name">hdfOpcion</property>
    <property name="Top">504</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="hdfHoraActual" >
    <property name="Height">18</property>
    <property name="Left">108</property>
    <property name="Name">hdfHoraActual</property>
    <property name="Top">504</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hdfFechaActual" >
    <property name="Height">18</property>
    <property name="Left">216</property>
    <property name="Name">hdfFechaActual</property>
    <property name="Top">504</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hdfUltimoFolio" >
    <property name="Height">18</property>
    <property name="Left">324</property>
    <property name="Name">hdfUltimoFolio</property>
    <property name="Top">504</property>
    <property name="Width">92</property>
  </object>
  <object class="HiddenField" name="hdfIniciaPartidas" >
    <property name="Height">17</property>
    <property name="Left">423</property>
    <property name="Name">hdfIniciaPartidas</property>
    <property name="Top">503</property>
    <property name="Value">si</property>
    <property name="Width">121</property>
  </object>
  <object class="HiddenField" name="hdfOpcionPartida" >
    <property name="Height">18</property>
    <property name="Left">24</property>
    <property name="Name">hdfOpcionPartida</property>
    <property name="Top">524</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="hdfPartidaOld" >
    <property name="Height">18</property>
    <property name="Left">144</property>
    <property name="Name">hdfPartidaOld</property>
    <property name="Top">524</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hdfItemOld" >
    <property name="Height">18</property>
    <property name="Left">260</property>
    <property name="Name">hdfItemOld</property>
    <property name="Top">524</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hdfMultisesion" >
    <property name="Height">18</property>
    <property name="Left">356</property>
    <property name="Name">hdfMultisesion</property>
    <property name="Top">524</property>
    <property name="Value">uno</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hdfFolioActual" >
    <property name="Height">18</property>
    <property name="Left">468</property>
    <property name="Name">hdfFolioActual</property>
    <property name="Top">524</property>
    <property name="Value">1</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="HidStrNum" >
    <property name="Height">18</property>
    <property name="Left">551</property>
    <property name="Name">HidStrNum</property>
    <property name="Top">504</property>
    <property name="Width">109</property>
  </object>
  <object class="HiddenField" name="HidHayInsumo" >
    <property name="Height">18</property>
    <property name="Left">584</property>
    <property name="Name">HidHayInsumo</property>
    <property name="Top">524</property>
    <property name="Value">0</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="HidNReq" >
    <property name="Height">18</property>
    <property name="Left">676</property>
    <property name="Name">HidNReq</property>
    <property name="Top">504</property>
    <property name="Width">60</property>
  </object>
  <object class="HiddenField" name="hdlStatus" >
    <property name="Height">18</property>
    <property name="Left">695</property>
    <property name="Name">hdlStatus</property>
    <property name="Top">525</property>
    <property name="Width">190</property>
  </object>
  <object class="Panel" name="Panel5" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">206</property>
    <property name="Left">341</property>
    <property name="Name">Panel5</property>
    <property name="ParentColor">0</property>
    <property name="Top">33</property>
    <property name="Visible">0</property>
    <property name="Width">432</property>
    <object class="Edit" name="txtFolioCat" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Name">txtFolioCat</property>
      <property name="Top">2</property>
      <property name="Width">16</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption"><![CDATA[&lt;P&gt;INSUMOS DE LA REQUISICION NO. &lt;/P&gt;]]></property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">ARIAL BLACK</property>
      </property>
      <property name="Height">15</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">432</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">HAGA DOBLE CLICK PARA AGREGAR !!</property>
      <property name="Font">
      <property name="Color">#FF0000</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">17</property>
      <property name="Name">Label19</property>
      <property name="ParentFont">0</property>
      <property name="Top">181</property>
      <property name="Width">216</property>
    </object>
    <object class="DBGrid" name="dbgCatalogo" >
      <property name="Columns"><![CDATA[a:7:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Insumo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Insumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Descripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;800&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Cantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Medida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Costo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Nuevo Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;NvoCosto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Cantidad Insumo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;CantInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
      <property name="DataSource">dtaCatalogo</property>
      <property name="Height">149</property>
      <property name="Left">17</property>
      <property name="Name">dbgCatalogo</property>
      <property name="Top">26</property>
      <property name="Width">401</property>
      <property name="jsOnDblClick">dbgCatalogoJSDblClick</property>
    </object>
  </object>
  <object class="Database" name="db" >
        <property name="Left">824</property>
        <property name="Top">24</property>
    <property name="Connected"></property>
    <property name="DatabaseName">evya</property>
    <property name="Name">db</property>
  </object>
  <object class="Datasource" name="dsAnexo_pedidos" >
        <property name="Left">876</property>
        <property name="Top">24</property>
    <property name="DataSet">qryAnexo_pedidos</property>
    <property name="Name">dsAnexo_pedidos</property>
  </object>
  <object class="Query" name="qryAnexo_pedidos" >
        <property name="Left">852</property>
        <property name="Top">84</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryAnexo_pedidos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:35:{i:0;s:7:&quot;select &quot;;i:1;s:12:&quot;  sContrato,&quot;;i:2;s:15:&quot;  iFolioPedido,&quot;;i:3;s:20:&quot;  iFolioRequisicion,&quot;;i:4;s:15:&quot;  sIdProveedor,&quot;;i:5;s:15:&quot;  sNumeroOrden,&quot;;i:6;s:47:&quot;  date_format(dIdFecha,&quot;%d/%m/%Y&quot;) as dIdFecha,&quot;;i:7;s:57:&quot;  date_format(dFechaEntrega,&quot;%d/%m/%Y&quot;) as dFechaEntrega,&quot;;i:8;s:14:&quot;  sReferencia,&quot;;i:9;s:11:&quot;  sElaboro,&quot;;i:10;s:11:&quot;  sReviso1,&quot;;i:11;s:11:&quot;  sReviso2,&quot;;i:12;s:11:&quot;  sElaboro,&quot;;i:13;s:12:&quot;  sAutorizo,&quot;;i:14;s:7:&quot;  sLab,&quot;;i:15;s:19:&quot;  sMedioTransporte,&quot;;i:16;s:11:&quot;  sCredito,&quot;;i:17;s:13:&quot;  sFormaPago,&quot;;i:18;s:11:&quot;  sFactura,&quot;;i:19;s:9:&quot;  sCosto,&quot;;i:20;s:11:&quot;  sCalidad,&quot;;i:21;s:17:&quot;  sTiempoEntrega,&quot;;i:22;s:18:&quot;  lUnicoProveedor,&quot;;i:23;s:10:&quot;  sMoneda,&quot;;i:24;s:12:&quot;  sRevision,&quot;;i:25;s:15:&quot;  mComentarios,&quot;;i:26;s:11:&quot;  sStatus, &quot;;i:27;s:9:&quot;  dCosto,&quot;;i:28;s:15:&quot;  sPeriodoPago,&quot;;i:29;s:14:&quot;  dTotalPagos,&quot;;i:30;s:9:&quot;  dAbono,&quot;;i:31;s:12:&quot;  dIntereses&quot;;i:32;s:5:&quot;from &quot;;i:33;s:21:&quot;        anexo_pedidos&quot;;i:34;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaActMostrar" >
        <property name="Left">876</property>
        <property name="Top">152</property>
    <property name="DataSet">qryActMostrar</property>
    <property name="Name">dtaActMostrar</property>
  </object>
  <object class="Query" name="qryActMostrar" >
        <property name="Left">815</property>
        <property name="Top">157</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryActMostrar</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:9:{i:0;s:7:&quot; select&quot;;i:1;s:25:&quot;            mDescripcion,&quot;;i:2;s:45:&quot;            format(dCantidad,1) as dCantidad,&quot;;i:3;s:20:&quot;            sMedida,&quot;;i:4;s:21:&quot;            dCostoMN,&quot;;i:5;s:22:&quot;            sIdInsumo,&quot;;i:6;s:24:&quot;            dNuevoPrecio&quot;;i:7;s:5:&quot; from&quot;;i:8;s:20:&quot;             insumos&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaGenral" >
        <property name="Left">876</property>
        <property name="Top">224</property>
    <property name="DataSet">qryGeneral</property>
    <property name="Name">dtaGenral</property>
  </object>
  <object class="Query" name="qryGeneral" >
        <property name="Left">820</property>
        <property name="Top">224</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryGeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:12:{i:0;s:6:&quot;select&quot;;i:1;s:18:&quot;        sContrato,&quot;;i:2;s:21:&quot;        iFolioPedido,&quot;;i:3;s:14:&quot;        iItem,&quot;;i:4;s:18:&quot;        sIdInsumo,&quot;;i:5;s:21:&quot;        mDescripcion,&quot;;i:6;s:23:&quot;        sMedida,       &quot;;i:7;s:41:&quot;        format(dCantidad,2) as dCantidad,&quot;;i:8;s:23:&quot;        dCosto as Costo&quot;;i:9;s:5:&quot;from &quot;;i:10;s:19:&quot;      anexo_ppedido&quot;;i:11;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Query" name="qryPartidas" >
        <property name="Left">822</property>
        <property name="Top">290</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryPartidas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:9:{i:0;s:7:&quot;select &quot;;i:1;s:22:&quot;        '' as Partida,&quot;;i:2;s:19:&quot;        '' as Item,&quot;;i:3;s:21:&quot;        '' as Medida,&quot;;i:4;s:26:&quot;        '' as Descripcion,&quot;;i:5;s:24:&quot;        '' as Cantidad, &quot;;i:6;s:35:&quot;        '' as Cantida_Anexo,       &quot;;i:7;s:24:&quot;        '' as Precio_MN,&quot;;i:8;s:22:&quot;        '' as Monto_MN&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaPartidas" >
        <property name="Left">876</property>
        <property name="Top">292</property>
    <property name="DataSet">qryPartidas</property>
    <property name="Name">dtaPartidas</property>
  </object>
  <object class="Datasource" name="dtaCatalogo" >
        <property name="Left">875</property>
        <property name="Top">354</property>
    <property name="DataSet">qryCatalogo</property>
    <property name="Name">dtaCatalogo</property>
  </object>
  <object class="Query" name="qryCatalogo" >
        <property name="Left">809</property>
        <property name="Top">356</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryCatalogo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
