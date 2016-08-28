<?php
<object class="frmEntradasAlmacen" name="frmEntradasAlmacen" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">ENTRADAS AL ALMACEN</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">496</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmEntradasAlmacen</property>
  <property name="Width">992</property>
  <property name="OnAfterShow">frmEntradasAlmacenAfterShow</property>
  <property name="OnBeforeShow">frmEntradasAlmacenBeforeShow</property>
  <property name="jsOnLoad">frmEntradasAlmacenJSLoad</property>
  <object class="DBGrid" name="DbgProductos" >
    <property name="Columns"><![CDATA[a:18:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Folio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;Item&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;40&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Descripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Medida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Cant. Pedido&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Cantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;Cantidad_Entreg&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;90&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Costo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Existencia&quot;;s:5:&quot;Color&quot;;s:7:&quot;#0080FF&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Existencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Numero_Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;Numero_Orden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Estado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Estado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Proveedor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Proveedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Almacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Almacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Ubicacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Ubicacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Cant. Entregada&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Entrego&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Comentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Familia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Familia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;NCosto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;NCosto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:17;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;FolioPedido&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;FolioPedido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">DtaProductos</property>
    <property name="Height">157</property>
    <property name="Left">488</property>
    <property name="Name">DbgProductos</property>
    <property name="Top">58</property>
    <property name="Width">396</property>
    <property name="jsOnClick">DbgProductosJSClick</property>
  </object>
  <object class="Shape" name="ShpMascara" >
    <property name="Brush">
    <property name="Color">#F2F2F2</property>
    </property>
    <property name="Height">155</property>
    <property name="Left">488</property>
    <property name="Name">ShpMascara</property>
    <property name="Top">59</property>
    <property name="Width">396</property>
  </object>
  <object class="Button" name="CmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">823</property>
    <property name="Name">CmdModificar</property>
    <property name="Top">300</property>
    <property name="Width">64</property>
    <property name="jsOnClick">CmdModificarJSClick</property>
  </object>
  <object class="Button" name="CmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">823</property>
    <property name="Name">CmdAceptar</property>
    <property name="Top">348</property>
    <property name="Width">64</property>
    <property name="OnClick">CmdAceptarClick</property>
    <property name="jsOnClick">CmdAceptarJSClick</property>
  </object>
  <object class="Button" name="CmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">823</property>
    <property name="Name">CmdCancelar</property>
    <property name="Top">371</property>
    <property name="Width">64</property>
    <property name="jsOnClick">CmdCancelarJSClick</property>
  </object>
  <object class="Button" name="CmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">817</property>
    <property name="Name">CmdImprimir</property>
    <property name="Top">221</property>
    <property name="Width">64</property>
    <property name="OnClick">CmdImprimirClick</property>
    <property name="jsOnClick">CmdImprimirJSClick</property>
  </object>
  <object class="DBGrid" name="DbgEntradas" >
    <property name="Columns"><![CDATA[a:17:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Insumo&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Insumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;Item&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;40&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Folio Pedido&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;Folio_Pedido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Fecha Entrega&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;Fecha_Entrega&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Cantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Precio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Precio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Nuevo Precio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;Nuevo_Precio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;Cant. Anterior&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;Cant_Anterior&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;85&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Existencia&quot;;s:5:&quot;Color&quot;;s:7:&quot;#0080FF&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Existencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Almacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Almacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Proveedor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Proveedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Numero Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;Numero_Orden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Usuario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Usuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Comentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Ubicacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Ubicacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Familia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Familia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;IdAlmacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;IdAlmacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">DtaEntrada</property>
    <property name="Height">145</property>
    <property name="Left">68</property>
    <property name="Name">DbgEntradas</property>
    <property name="Top">291</property>
    <property name="Width">754</property>
    <property name="jsOnClick">DbgEntradasJSClick</property>
  </object>
  <object class="Label" name="lblTitulo" >
    <property name="Caption"><![CDATA[E&amp;nbsp; N&amp;nbsp; T&amp;nbsp; R&amp;nbsp; A &amp;nbsp;D&amp;nbsp; A&amp;nbsp;&amp;nbsp;&amp;nbsp; A L&amp;nbsp;&amp;nbsp;&amp;nbsp; A&amp;nbsp; L&amp;nbsp; M&amp;nbsp; A&amp;nbsp; C&amp;nbsp; E &amp;nbsp;N]]></property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">13px</property>
    <property name="Style">fsNormal</property>
    <property name="Weight">normal</property>
    </property>
    <property name="Height">17</property>
    <property name="Left">56</property>
    <property name="Name">lblTitulo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">17</property>
    <property name="Width">828</property>
  </object>
  <object class="Label" name="lblFolio_Pedido" >
    <property name="Caption">Fol. Compra</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblFolio_Pedido</property>
    <property name="Top">52</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="lblFecha_Entrega" >
    <property name="Caption">Fecha Entrega</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">281</property>
    <property name="Name">lblFecha_Entrega</property>
    <property name="Top">52</property>
    <property name="Width">87</property>
  </object>
  <object class="Label" name="lblCantidad" >
    <property name="Caption">Cantidad</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblCantidad</property>
    <property name="Top">126</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="lblPrecio" >
    <property name="Caption">Precio</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblPrecio</property>
    <property name="Top">150</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="lblAlmacen" >
    <property name="Caption">Almacen</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblAlmacen</property>
    <property name="Top">102</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="lblProveedor" >
    <property name="Caption">Proveedor</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblProveedor</property>
    <property name="Top">77</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="lblComentarios" >
    <property name="Caption">Comentarios</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">67</property>
    <property name="Name">lblComentarios</property>
    <property name="Top">228</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblUbicacion_Producto" >
    <property name="Caption">Ubicacion_Producto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblUbicacion_Producto</property>
    <property name="Top">201</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="lblFamilia" >
    <property name="Caption">Familia</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">lblFamilia</property>
    <property name="Top">173</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="lblSuntitulo" >
    <property name="Caption"><![CDATA[&lt;P&gt;P&amp;nbsp; &amp;nbsp;R&amp;nbsp; &amp;nbsp;O&amp;nbsp; &amp;nbsp;D&amp;nbsp; &amp;nbsp;U&amp;nbsp;&amp;nbsp; C&amp;nbsp;&amp;nbsp; T&amp;nbsp;&amp;nbsp; O&amp;nbsp; S &lt;/P&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Family">Verdana</property>
    <property name="Size">13px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">488</property>
    <property name="Name">lblSuntitulo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">24</property>
    <property name="Width">396</property>
  </object>
  <object class="Button" name="CmdEliminaProducto" >
    <property name="Caption">Eliminar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">823</property>
    <property name="Name">CmdEliminaProducto</property>
    <property name="Top">324</property>
    <property name="Width">64</property>
    <property name="OnClick">CmdEliminaProductoClick</property>
    <property name="jsOnClick">CmdEliminaProductoJSClick</property>
  </object>
  <object class="Button" name="cmdImprimeProdcuto" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">823</property>
    <property name="Name">cmdImprimeProdcuto</property>
    <property name="Top">394</property>
    <property name="Width">64</property>
    <property name="jsOnClick">cmdImprimeProdcutoJSClick</property>
  </object>
  <object class="Button" name="CmdMostrar" >
    <property name="Caption">Mostrar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">749</property>
    <property name="Name">CmdMostrar</property>
    <property name="Top">263</property>
    <property name="Width">64</property>
    <property name="OnClick">CmdMostrarClick</property>
    <property name="jsOnClick">CmdMostrarJSClick</property>
  </object>
  <object class="Label" name="lblFechaInicial" >
    <property name="Caption">Fecha de Inicio</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">376</property>
    <property name="Name">lblFechaInicial</property>
    <property name="ParentFont">0</property>
    <property name="Top">265</property>
    <property name="Width">88</property>
  </object>
  <object class="Label" name="lblFechaFinal" >
    <property name="Caption">Fecha Final</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">572</property>
    <property name="Name">lblFechaFinal</property>
    <property name="ParentFont">0</property>
    <property name="Top">265</property>
    <property name="Width">68</property>
  </object>
  <object class="ComboBox" name="CboFolioPedido" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">144</property>
    <property name="Name">CboFolioPedido</property>
    <property name="Top">48</property>
    <property name="Width">120</property>
    <property name="OnChange">CboFolioPedidoChange</property>
    <property name="jsOnBlur">CboFolioPedidoJSBlur</property>
    <property name="jsOnChange">CboFolioPedidoJSChange</property>
    <property name="jsOnFocus">CboFolioPedidoJSFocus</property>
    <property name="jsOnKeyPress">CboFolioPedidoJSKeyPress</property>
  </object>
  <object class="ComboBox" name="CboProveedor" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">144</property>
    <property name="Name">CboProveedor</property>
    <property name="Top">76</property>
    <property name="Width">185</property>
    <property name="jsOnBlur">CboProveedorJSBlur</property>
    <property name="jsOnChange">CboProveedorJSChange</property>
    <property name="jsOnFocus">CboProveedorJSFocus</property>
    <property name="jsOnKeyPress">CboProveedorJSKeyPress</property>
  </object>
  <object class="ComboBox" name="CboAlmacen" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">144</property>
    <property name="Name">CboAlmacen</property>
    <property name="Top">100</property>
    <property name="Width">185</property>
    <property name="jsOnBlur">CboAlmacenJSBlur</property>
    <property name="jsOnChange">CboAlmacenJSChange</property>
    <property name="jsOnFocus">CboAlmacenJSFocus</property>
    <property name="jsOnKeyPress">CboAlmacenJSKeyPress</property>
  </object>
  <object class="Edit" name="txtCantidad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">144</property>
    <property name="Name">txtCantidad</property>
    <property name="Top">124</property>
    <property name="Width">121</property>
    <property name="jsOnBlur">txtCantidadJSBlur</property>
    <property name="jsOnFocus">txtCantidadJSFocus</property>
    <property name="jsOnKeyPress">txtCantidadJSKeyPress</property>
    <property name="jsOnKeyUp">txtCantidadJSKeyUp</property>
  </object>
  <object class="Edit" name="txtPrecio" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">144</property>
    <property name="Name">txtPrecio</property>
    <property name="Top">148</property>
    <property name="Width">121</property>
    <property name="jsOnBlur">txtPrecioJSBlur</property>
    <property name="jsOnFocus">txtPrecioJSFocus</property>
    <property name="jsOnKeyPress">txtPrecioJSKeyPress</property>
    <property name="jsOnKeyUp">txtPrecioJSKeyUp</property>
  </object>
  <object class="Edit" name="txtUbicacion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">187</property>
    <property name="Name">txtUbicacion</property>
    <property name="Top">199</property>
    <property name="Width">143</property>
    <property name="jsOnBlur">txtUbicacionJSBlur</property>
    <property name="jsOnFocus">txtUbicacionJSFocus</property>
    <property name="jsOnKeyPress">txtUbicacionJSKeyPress</property>
    <property name="jsOnKeyUp">txtUbicacionJSKeyUp</property>
  </object>
  <object class="Memo" name="mComentarios" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">51</property>
    <property name="Left">144</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mComentarios</property>
    <property name="Top">225</property>
    <property name="Width">188</property>
    <property name="jsOnBlur">mComentariosJSBlur</property>
    <property name="jsOnFocus">mComentariosJSFocus</property>
    <property name="jsOnKeyPress">mComentariosJSKeyPress</property>
    <property name="jsOnKeyUp">mComentariosJSKeyUp</property>
  </object>
  <object class="CheckBox" name="ChkEntregado" >
    <property name="Caption">Entregado</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">387</property>
    <property name="Name">ChkEntregado</property>
    <property name="Top">125</property>
    <property name="Width">81</property>
    <property name="jsOnChange">ChkEntregadoJSChange</property>
  </object>
  <object class="CheckBox" name="ChkNoEntregado" >
    <property name="Caption">No Entregado</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">387</property>
    <property name="Name">ChkNoEntregado</property>
    <property name="Top">150</property>
    <property name="Width">97</property>
    <property name="jsOnChange">ChkNoEntregadoJSChange</property>
  </object>
  <object class="CheckBox" name="ChkIncompleto" >
    <property name="Caption">Incompleto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">387</property>
    <property name="Name">ChkIncompleto</property>
    <property name="Top">175</property>
    <property name="Width">96</property>
    <property name="jsOnChange">ChkIncompletoJSChange</property>
  </object>
  <object class="DateTimePicker" name="DtaFechaEntrega" >
    <property name="Caption">DtaFechaEntrega</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">376</property>
    <property name="Name">DtaFechaEntrega</property>
    <property name="Top">50</property>
    <property name="Width">96</property>
  </object>
  <object class="DateTimePicker" name="DtaFechaInicio" >
    <property name="Caption">DtaFechaInicio</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">472</property>
    <property name="Name">DtaFechaInicio</property>
    <property name="Top">264</property>
    <property name="Width">88</property>
  </object>
  <object class="DateTimePicker" name="DtaFechaFinal" >
    <property name="Caption">DtaFechaFinal</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">648</property>
    <property name="Name">DtaFechaFinal</property>
    <property name="Top">264</property>
    <property name="Width">88</property>
  </object>
  <object class="ComboBox" name="CboFamilia" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">144</property>
    <property name="Name">CboFamilia</property>
    <property name="Top">173</property>
    <property name="Width">185</property>
    <property name="jsOnBlur">CboFamiliaJSBlur</property>
    <property name="jsOnChange">CboFamiliaJSChange</property>
    <property name="jsOnFocus">CboFamiliaJSFocus</property>
    <property name="jsOnKeyPress">CboFamiliaJSKeyPress</property>
  </object>
  <object class="Button" name="cmdAgregarProductos" >
    <property name="Caption">Agregar Productos</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">684</property>
    <property name="Name">cmdAgregarProductos</property>
    <property name="Top">220</property>
    <property name="Width">120</property>
    <property name="OnClick">cmdAgregarProductosClick</property>
    <property name="jsOnClick">cmdAgregarProductosJSClick</property>
  </object>
  <object class="Label" name="lblNoProductos" >
    <property name="Caption"><![CDATA[&lt;P&gt;0&amp;nbsp;&amp;nbsp;&amp;nbsp; P R O D U C T O S&amp;nbsp;&amp;nbsp;&amp;nbsp; E N C O N T A D O S&lt;/P&gt;]]></property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#0000A0</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">544</property>
    <property name="Name">lblNoProductos</property>
    <property name="ParentFont">0</property>
    <property name="Top">115</property>
    <property name="Width">296</property>
  </object>
  <object class="HiddenField" name="HidProductos" >
    <property name="Height">18</property>
    <property name="Left">64</property>
    <property name="Name">HidProductos</property>
    <property name="Top">445</property>
    <property name="Value">0</property>
    <property name="Width">96</property>
  </object>
  <object class="HiddenField" name="HidMostrarxFecha" >
    <property name="Height">18</property>
    <property name="Left">64</property>
    <property name="Name">HidMostrarxFecha</property>
    <property name="Top">465</property>
    <property name="Value">0</property>
    <property name="Width">136</property>
  </object>
  <object class="HiddenField" name="HidMatriz" >
    <property name="Height">18</property>
    <property name="Left">164</property>
    <property name="Name">HidMatriz</property>
    <property name="Top">447</property>
    <property name="Value">0</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HidTotal" >
    <property name="Height">16</property>
    <property name="Left">204</property>
    <property name="Name">HidTotal</property>
    <property name="Top">467</property>
    <property name="Value">0</property>
    <property name="Width">68</property>
  </object>
  <object class="HiddenField" name="HidModif" >
    <property name="Height">18</property>
    <property name="Left">244</property>
    <property name="Name">HidModif</property>
    <property name="Top">447</property>
    <property name="Value">0</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HidOpcion" >
    <property name="Height">16</property>
    <property name="Left">276</property>
    <property name="Name">HidOpcion</property>
    <property name="Top">467</property>
    <property name="Width">72</property>
  </object>
  <object class="HiddenField" name="HidFecha" >
    <property name="Height">16</property>
    <property name="Left">395</property>
    <property name="Name">HidFecha</property>
    <property name="Top">447</property>
    <property name="Value">0</property>
    <property name="Width">69</property>
  </object>
  <object class="HiddenField" name="HidInsumo" >
    <property name="Height">18</property>
    <property name="Left">352</property>
    <property name="Name">HidInsumo</property>
    <property name="Top">467</property>
    <property name="Value">0</property>
    <property name="Width">80</property>
  </object>
  <object class="HiddenField" name="HidItem" >
    <property name="Height">16</property>
    <property name="Left">324</property>
    <property name="Name">HidItem</property>
    <property name="Top">447</property>
    <property name="Value">0</property>
    <property name="Width">64</property>
  </object>
  <object class="HiddenField" name="HidPedido" >
    <property name="Height">18</property>
    <property name="Left">440</property>
    <property name="Name">HidPedido</property>
    <property name="Top">467</property>
    <property name="Value">0</property>
    <property name="Width">80</property>
  </object>
  <object class="HiddenField" name="HidAlmacen" >
    <property name="Height">18</property>
    <property name="Left">468</property>
    <property name="Name">HidAlmacen</property>
    <property name="Top">447</property>
    <property name="Width">88</property>
  </object>
  <object class="CheckBox" name="ChkTodosAlm" >
    <property name="Caption">Aplicar a Todos</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">341</property>
    <property name="Name">ChkTodosAlm</property>
    <property name="Top">99</property>
    <property name="Width">112</property>
    <property name="jsOnChange">ChkTodosAlmJSChange</property>
  </object>
  <object class="CheckBox" name="ChkTodosUbic" >
    <property name="Caption">Aplicar a Todos</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">341</property>
    <property name="Name">ChkTodosUbic</property>
    <property name="Top">203</property>
    <property name="Width">113</property>
    <property name="jsOnChange">ChkTodosUbicJSChange</property>
  </object>
  <object class="HiddenField" name="HidFolioActual" >
    <property name="Height">18</property>
    <property name="Left">560</property>
    <property name="Name">HidFolioActual</property>
    <property name="Top">447</property>
    <property name="Value">0</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="HidMusFolio" >
    <property name="Height">18</property>
    <property name="Left">528</property>
    <property name="Name">HidMusFolio</property>
    <property name="Top">467</property>
    <property name="Value">0</property>
    <property name="Width">92</property>
  </object>
  <object class="HiddenField" name="HidStrNum" >
    <property name="Height">18</property>
    <property name="Left">628</property>
    <property name="Name">HidStrNum</property>
    <property name="Top">467</property>
    <property name="Width">80</property>
  </object>
  <object class="HiddenField" name="HidFechaI" >
    <property name="Height">18</property>
    <property name="Left">668</property>
    <property name="Name">HidFechaI</property>
    <property name="Top">446</property>
    <property name="Width">84</property>
  </object>
  <object class="HiddenField" name="HidFechaF" >
    <property name="Height">18</property>
    <property name="Left">716</property>
    <property name="Name">HidFechaF</property>
    <property name="Top">468</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HidFechaInv" >
    <property name="Height">18</property>
    <property name="Left">760</property>
    <property name="Name">HidFechaInv</property>
    <property name="Top">444</property>
    <property name="Width">80</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">914</property>
        <property name="Top">27</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="DtaEntrada" >
        <property name="Left">944</property>
        <property name="Top">76</property>
    <property name="DataSet">QryEntrada</property>
    <property name="Name">DtaEntrada</property>
  </object>
  <object class="Query" name="QryEntrada" >
        <property name="Left">896</property>
        <property name="Top">76</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryEntrada</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="DtaProductos" >
        <property name="Left">944</property>
        <property name="Top">140</property>
    <property name="DataSet">QryProductos</property>
    <property name="Name">DtaProductos</property>
  </object>
  <object class="Query" name="QryProductos" >
        <property name="Left">896</property>
        <property name="Top">140</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryProductos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
