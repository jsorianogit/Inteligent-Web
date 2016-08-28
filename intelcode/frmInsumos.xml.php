<?php
<object class="frmInsumos" name="frmInsumos" baseclass="Page">
  <property name="Background"></property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">536</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmInsumos</property>
  <property name="Width">730</property>
  <property name="OnBeforeShow">frmInsumosBeforeShow</property>
  <property name="OnShow">frmInsumosShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">253</property>
    <property name="Left">19</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">179</property>
    <property name="Width">708</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">56</property>
    <property name="Left">18</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">435</property>
    <property name="Width">710</property>
  </object>
  <object class="DBGrid" name="ddinsumos1" >
    <property name="Columns"><![CDATA[a:19:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Insumo&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:7:&quot;#FF8040&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;Tipo Actividad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sTipoActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Fecha de Inicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dFechaInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Costo MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dCostoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Costo DLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCostoDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Venta MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Venta DLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dVentaDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Fase&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sIdFase&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Grupo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sIdGrupo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Nuevo Precio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dNuevoPrecio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Porcentaje&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dPorcentaje&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Existencias&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dExistencias&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Stock Min&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dStockMin&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Stock Max&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dStockMax&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:17;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Ubicacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sUbicacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}i:18;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Almacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdAlmacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;1&quot;;}}]]></property>
    <property name="Datasource">dsinsumos1</property>
    <property name="Height">127</property>
    <property name="Left">96</property>
    <property name="Name">ddinsumos1</property>
    <property name="ReadOnly">1</property>
    <property name="Top">48</property>
    <property name="Width">632</property>
    <property name="jsOnClick">ddinsumos1JSClick</property>
  </object>
  <object class="Button" name="cmdNuevo" >
    <property name="Caption">Nuevo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">cmdNuevo</property>
    <property name="Top">45</property>
    <property name="Width">73</property>
    <property name="jsOnClick">cmdNuevoJSClick</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">cmdModificar</property>
    <property name="Top">67</property>
    <property name="Width">73</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">cmdAceptar</property>
    <property name="Top">89</property>
    <property name="Width">73</property>
    <property name="OnClick">cmdAceptarClick</property>
    <property name="jsOnClick">cmdAceptarJSClick</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">cmdCancelar</property>
    <property name="Top">111</property>
    <property name="Width">73</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Caption">Eliminar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">cmdEliminar</property>
    <property name="Top">133</property>
    <property name="Width">73</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
  </object>
  <object class="Edit" name="sIdInsumo" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">119</property>
    <property name="Name">sIdInsumo</property>
    <property name="ParentColor">0</property>
    <property name="Top">184</property>
    <property name="Width">137</property>
    <property name="jsOnBlur">sIdInsumoJSBlur</property>
    <property name="jsOnFocus">sIdInsumoJSFocus</property>
    <property name="jsOnKeyPress">sIdInsumoJSKeyPress</property>
  </object>
  <object class="ComboBox" name="sTipoActividad" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">119</property>
    <property name="Name">sTipoActividad</property>
    <property name="ParentColor">0</property>
    <property name="Top">207</property>
    <property name="Width">137</property>
    <property name="jsOnBlur">sTipoActividadJSBlur</property>
    <property name="jsOnFocus">sTipoActividadJSFocus</property>
    <property name="jsOnKeyPress">sTipoActividadJSKeyPress</property>
  </object>
  <object class="Memo" name="mDescripcion" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">41</property>
    <property name="Left">118</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="Top">230</property>
    <property name="Width">599</property>
    <property name="jsOnBlur">mDescripcionJSBlur</property>
    <property name="jsOnFocus">mDescripcionJSFocus</property>
    <property name="jsOnKeyPress">mDescripcionJSKeyPress</property>
  </object>
  <object class="DateTimePicker" name="dFechaInicio" >
    <property name="Caption">dFechaInicio</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">118</property>
    <property name="Name">dFechaInicio</property>
    <property name="Top">274</property>
    <property name="Width">100</property>
  </object>
  <object class="Edit" name="dCostoMN" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">dCostoMN</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">295</property>
    <property name="Width">100</property>
    <property name="jsOnBlur">dCostoMNJSBlur</property>
    <property name="jsOnFocus">dCostoMNJSFocus</property>
    <property name="jsOnKeyPress">dCostoMNJSKeyPress</property>
  </object>
  <object class="Edit" name="dCostoDLL" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">dCostoDLL</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">320</property>
    <property name="Width">100</property>
    <property name="jsOnBlur">dCostoDLLJSBlur</property>
    <property name="jsOnFocus">dCostoDLLJSFocus</property>
    <property name="jsOnKeyPress">dCostoDLLJSKeyPress</property>
  </object>
  <object class="Edit" name="dVentaDLL" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">dVentaDLL</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">367</property>
    <property name="Width">100</property>
    <property name="jsOnBlur">dVentaDLLJSBlur</property>
    <property name="jsOnFocus">dVentaDLLJSFocus</property>
    <property name="jsOnKeyPress">dVentaDLLJSKeyPress</property>
  </object>
  <object class="Edit" name="sMedida" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">sMedida</property>
    <property name="ParentColor">0</property>
    <property name="Top">390</property>
    <property name="Width">100</property>
    <property name="jsOnBlur">sMedidaJSBlur</property>
    <property name="jsOnFocus">sMedidaJSFocus</property>
    <property name="jsOnKeyPress">sMedidaJSKeyPress</property>
  </object>
  <object class="Edit" name="dCantidad" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">327</property>
    <property name="Name">dCantidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">294</property>
    <property name="Width">119</property>
    <property name="jsOnBlur">dCantidadJSBlur</property>
    <property name="jsOnFocus">dCantidadJSFocus</property>
    <property name="jsOnKeyPress">dCantidadJSKeyPress</property>
  </object>
  <object class="ComboBox" name="sIdFase" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">553</property>
    <property name="Name">sIdFase</property>
    <property name="ParentColor">0</property>
    <property name="Top">386</property>
    <property name="Visible">0</property>
    <property name="Width">157</property>
    <property name="jsOnBlur">sIdFaseJSBlur</property>
    <property name="jsOnFocus">sIdFaseJSFocus</property>
    <property name="jsOnKeyPress">sIdFaseJSKeyPress</property>
  </object>
  <object class="ComboBox" name="sIdGrupo" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">24</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">327</property>
    <property name="Name">sIdGrupo</property>
    <property name="ParentColor">0</property>
    <property name="Top">317</property>
    <property name="Width">119</property>
    <property name="jsOnBlur">sIdGrupoJSBlur</property>
    <property name="jsOnFocus">sIdGrupoJSFocus</property>
    <property name="jsOnKeyPress">sIdGrupoJSKeyPress</property>
  </object>
  <object class="Edit" name="dNuevoPrecio" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">327</property>
    <property name="Name">dNuevoPrecio</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">342</property>
    <property name="Width">119</property>
    <property name="jsOnBlur">dNuevoPrecioJSBlur</property>
    <property name="jsOnFocus">dNuevoPrecioJSFocus</property>
    <property name="jsOnKeyPress">dNuevoPrecioJSKeyPress</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Id Insumo</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">43</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">187</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Tipo de Actividad</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">20</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">210</property>
    <property name="Width">96</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Descripcion</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">27</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">235</property>
    <property name="Width">88</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fecha de Inicio</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">280</property>
    <property name="Width">88</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Costo MN</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">33</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="Top">298</property>
    <property name="Width">80</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Costo DLL</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">33</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="Top">323</property>
    <property name="Width">80</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Venta MN</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">33</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">347</property>
    <property name="Width">80</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Venta DLL</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">41</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="Top">372</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Medida</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">44</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="Top">396</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Cantidad</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">230</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="Top">296</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Almacen</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">arial</property>
    <property name="Size">12px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">21</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">7</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Grupo</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">230</property>
    <property name="Name">Label13</property>
    <property name="ParentColor">0</property>
    <property name="Top">321</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Nuevo Precio</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">230</property>
    <property name="Name">Label14</property>
    <property name="ParentColor">0</property>
    <property name="Top">345</property>
    <property name="Width">90</property>
  </object>
  <object class="Edit" name="dVentaMN" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">dVentaMN</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">344</property>
    <property name="Width">100</property>
    <property name="jsOnBlur">dVentaMNJSBlur</property>
    <property name="jsOnFocus">dVentaMNJSFocus</property>
    <property name="jsOnKeyPress">dVentaMNJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hsIdInsumo" >
    <property name="Height">23</property>
    <property name="Left">32</property>
    <property name="Name">hsIdInsumo</property>
    <property name="Top">493</property>
    <property name="Width">220</property>
  </object>
  <object class="HiddenField" name="sOperacion" >
    <property name="Height">23</property>
    <property name="Left">32</property>
    <property name="Name">sOperacion</property>
    <property name="Top">467</property>
    <property name="Width">220</property>
  </object>
  <object class="Edit" name="dPorcentaje" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">327</property>
    <property name="Name">dPorcentaje</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">366</property>
    <property name="Width">119</property>
    <property name="jsOnBlur">dPorcentajeJSBlur</property>
    <property name="jsOnFocus">dPorcentajeJSFocus</property>
    <property name="jsOnKeyPress">dPorcentajeJSKeyPress</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Porcentaje</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">230</property>
    <property name="Name">Label15</property>
    <property name="ParentColor">0</property>
    <property name="Top">369</property>
    <property name="Width">90</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Insumos</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">21</property>
    <property name="Name">Label16</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">29</property>
    <property name="Width">707</property>
  </object>
  <object class="Edit" name="dExistencias" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">327</property>
    <property name="Name">dExistencias</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Text">0</property>
    <property name="Top">389</property>
    <property name="Width">119</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Existencias</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">230</property>
    <property name="Name">Label11</property>
    <property name="ParentColor">0</property>
    <property name="Top">392</property>
    <property name="Width">90</property>
  </object>
  <object class="Edit" name="dStockMin" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">552</property>
    <property name="Name">dStockMin</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">296</property>
    <property name="Width">101</property>
    <property name="jsOnBlur">dStockMinJSBlur</property>
    <property name="jsOnFocus">dStockMinJSFocus</property>
    <property name="jsOnKeyPress">dStockMinJSKeyPress</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Stock Min</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">457</property>
    <property name="Name">Label17</property>
    <property name="ParentColor">0</property>
    <property name="Top">300</property>
    <property name="Width">90</property>
  </object>
  <object class="Edit" name="dStockMax" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">552</property>
    <property name="Name">dStockMax</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">319</property>
    <property name="Width">101</property>
    <property name="jsOnBlur">dStockMaxJSBlur</property>
    <property name="jsOnFocus">dStockMaxJSFocus</property>
    <property name="jsOnKeyPress">dStockMaxJSKeyPress</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Stock Max</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">458</property>
    <property name="Name">Label18</property>
    <property name="ParentColor">0</property>
    <property name="Top">320</property>
    <property name="Width">90</property>
  </object>
  <object class="Edit" name="sUbicacion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">552</property>
    <property name="Name">sUbicacion</property>
    <property name="ParentColor">0</property>
    <property name="Top">343</property>
    <property name="Width">164</property>
    <property name="jsOnBlur">sUbicacionJSBlur</property>
    <property name="jsOnFocus">sUbicacionJSFocus</property>
    <property name="jsOnKeyPress">sUbicacionJSKeyPress</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Ubicacion</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">458</property>
    <property name="Name">Label19</property>
    <property name="ParentColor">0</property>
    <property name="Top">348</property>
    <property name="Width">90</property>
  </object>
  <object class="ComboBox" name="sIdAlmacen" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">96</property>
    <property name="Name">sIdAlmacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">4</property>
    <property name="Width">205</property>
    <property name="OnChange">sIdAlmacenChange</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fase</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">460</property>
    <property name="Name">Label20</property>
    <property name="ParentColor">0</property>
    <property name="Top">390</property>
    <property name="Visible">0</property>
    <property name="Width">90</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">cmdImprimir</property>
    <property name="Top">155</property>
    <property name="Width">73</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="ComboBox" name="imprimir" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="ItemIndex">1</property>
    <property name="Items"><![CDATA[a:3:{s:3:&quot;min&quot;;s:12:&quot;Stock Minimo&quot;;s:3:&quot;max&quot;;s:12:&quot;Stock Maximo&quot;;s:5:&quot;todos&quot;;s:5:&quot;Todos&quot;;}]]></property>
    <property name="Left">552</property>
    <property name="Name">imprimir</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">185</property>
    <property name="Width">165</property>
    <property name="jsOnBlur">imprimirJSBlur</property>
    <property name="jsOnFocus">imprimirJSFocus</property>
    <property name="jsOnKeyPress">imprimirJSKeyPress</property>
  </object>
  <object class="Label" name="Buscar" >
    <property name="Caption">Buscar</property>
    <property name="Color">#0080C0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">275</property>
    <property name="Name">Buscar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">187</property>
    <property name="Width">45</property>
  </object>
  <object class="Edit" name="txtBusca" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">327</property>
    <property name="Name">txtBusca</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtBuscaJSBlur</property>
    <property name="jsOnFocus">txtBuscaJSFocus</property>
    <property name="jsOnKeyPress">txtBuscaJSKeyPress</property>
    <property name="jsOnKeyUp">txtBuscaJSKeyUp</property>
  </object>
  <object class="Database" name="dbintelcode1" >
        <property name="Left">305</property>
        <property name="Top">458</property>
    <property name="Connected"></property>
    <property name="Name">dbintelcode1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="dsinsumos1" >
        <property name="Left">422</property>
        <property name="Top">461</property>
    <property name="Dataset">qryInsumos</property>
    <property name="Name">dsinsumos1</property>
  </object>
  <object class="Query" name="qryInsumos" >
        <property name="Left">360</property>
        <property name="Top">462</property>
    <property name="Database">dbintelcode1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryInsumos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:22:{i:0;s:7:&quot;select &quot;;i:1;s:10:&quot;sContrato,&quot;;i:2;s:10:&quot;sIdInsumo,&quot;;i:3;s:15:&quot;sTipoActividad,&quot;;i:4;s:13:&quot;mDescripcion,&quot;;i:5;s:53:&quot;date_format(dFechaInicio,'%d/%m/%Y') as dFechaInicio,&quot;;i:6;s:9:&quot;dCostoMN,&quot;;i:7;s:10:&quot;dCostoDLL,&quot;;i:8;s:9:&quot;dVentaMN,&quot;;i:9;s:10:&quot;dVentaDLL,&quot;;i:10;s:8:&quot;sMedida,&quot;;i:11;s:10:&quot;dCantidad,&quot;;i:12;s:8:&quot;sIdFase,&quot;;i:13;s:9:&quot;sIdGrupo,&quot;;i:14;s:13:&quot;dNuevoPrecio,&quot;;i:15;s:12:&quot;dPorcentaje,&quot;;i:16;s:12:&quot;dExistencia,&quot;;i:17;s:10:&quot;dStockMin,&quot;;i:18;s:10:&quot;dStockMax,&quot;;i:19;s:11:&quot;sUbicacion,&quot;;i:20;s:10:&quot;sIdAlmacen&quot;;i:21;s:12:&quot;from insumos&quot;;}]]></property>
  </object>
</object>
?>
