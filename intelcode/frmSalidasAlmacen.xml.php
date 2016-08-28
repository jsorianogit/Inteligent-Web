<?php
<object class="frmSalidasAlmacen" name="frmSalidasAlmacen" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmSalidasAlmacen</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">484</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmSalidasAlmacen</property>
  <property name="Width">928</property>
  <property name="OnBeforeShow">frmSalidasAlmacenBeforeShow</property>
  <object class="Label" name="Label8" >
    <property name="Caption">Bajas de Almacen</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">71</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">37</property>
    <property name="Width">769</property>
  </object>
  <object class="DBGrid" name="dbgSolicitudes" >
    <property name="Columns"><![CDATA[a:5:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Insumo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:2:&quot;md&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:21:&quot;Faltantes de Entregar&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;faltante&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="Datasource">dsSolicitudes</property>
    <property name="Height">158</property>
    <property name="Left">466</property>
    <property name="Name">dbgSolicitudes</property>
    <property name="Top">86</property>
    <property name="Width">375</property>
    <property name="jsOnClick">dbgSolicitudesJSClick</property>
  </object>
  <object class="Edit" name="dFechaSalida" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">196</property>
    <property name="Name">dFechaSalida</property>
    <property name="ParentColor">0</property>
    <property name="Top">117</property>
    <property name="Width">116</property>
    <property name="jsOnBlur">dFechaSalidaJSBlur</property>
    <property name="jsOnFocus">dFechaSalidaJSFocus</property>
    <property name="jsOnKeyPress">dFechaSalidaJSKeyPress</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Fecha de Salida</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">71</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">120</property>
    <property name="Width">120</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Personal que recibe</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">71</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">96</property>
    <property name="Width">120</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Folio de Solicitud</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">71</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">120</property>
  </object>
  <object class="ComboBox" name="sIdSolicitud" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">196</property>
    <property name="Name">sIdSolicitud</property>
    <property name="ParentColor">0</property>
    <property name="Top">68</property>
    <property name="Width">120</property>
    <property name="OnChange">sIdSolicitudChange</property>
    <property name="jsOnBlur">sIdSolicitudJSBlur</property>
    <property name="jsOnFocus">sIdSolicitudJSFocus</property>
    <property name="jsOnKeyPress">sIdSolicitudJSKeyPress</property>
  </object>
  <object class="Edit" name="sRecibe" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">196</property>
    <property name="Name">sRecibe</property>
    <property name="ParentColor">0</property>
    <property name="Top">92</property>
    <property name="Width">265</property>
    <property name="jsOnBlur">sRecibeJSBlur</property>
    <property name="jsOnFocus">sRecibeJSFocus</property>
    <property name="jsOnKeyPress">sRecibeJSKeyPress</property>
  </object>
  <object class="DBGrid" name="dbgBitacora" >
    <property name="Columns"><![CDATA[a:5:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Insumos&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;250&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Exitencias&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dExistencias&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:18:&quot;Cantidad Entregada&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:2:&quot;dc&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}}]]></property>
    <property name="DataSource">dsBitacorasalida</property>
    <property name="Height">145</property>
    <property name="Left">70</property>
    <property name="Name">dbgBitacora</property>
    <property name="Top">298</property>
    <property name="Width">770</property>
    <property name="jsOnClick">dbgBitacoraJSClick</property>
  </object>
  <object class="Edit" name="dCantidad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">196</property>
    <property name="Name">dCantidad</property>
    <property name="ParentColor">0</property>
    <property name="Top">251</property>
    <property name="Width">120</property>
    <property name="jsOnBlur">dCantidadJSBlur</property>
    <property name="jsOnFocus">dCantidadJSFocus</property>
    <property name="jsOnKeyPress">dCantidadJSKeyPress</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Cantidad a Retirar</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">71</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">254</property>
    <property name="Width">120</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Material de Salida</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">71</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">278</property>
    <property name="Width">770</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Material Solicitado</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">466</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">68</property>
    <property name="Width">375</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">324</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentColor">0</property>
    <property name="Top">250</property>
    <property name="Width">137</property>
    <property name="OnClick">cmdAceptarClick</property>
  </object>
  <object class="ComboBox" name="sNumeroOrden" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">196</property>
    <property name="Name">sNumeroOrden</property>
    <property name="ParentColor">0</property>
    <property name="Top">142</property>
    <property name="Width">180</property>
    <property name="jsOnBlur">sNumeroOrdenJSBlur</property>
    <property name="jsOnFocus">sNumeroOrdenJSFocus</property>
    <property name="jsOnKeyPress">sNumeroOrdenJSKeyPress</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Numero de Orden</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">71</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">145</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hsIdInsumo" >
    <property name="Height">18</property>
    <property name="Left">72</property>
    <property name="Name">hsIdInsumo</property>
    <property name="Top">443</property>
    <property name="Width">140</property>
  </object>
  <object class="Memo" name="mDescripcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">78</property>
    <property name="Left">71</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="Top">165</property>
    <property name="Width">391</property>
    <property name="jsOnBlur">mDescripcionJSBlur</property>
    <property name="jsOnFocus">mDescripcionJSFocus</property>
    <property name="jsOnKeyPress">mDescripcionJSKeyPress</property>
  </object>
  <object class="Label" name="label" >
    <property name="Caption">Seleccione el Almacen</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">71</property>
    <property name="Name">label</property>
    <property name="ParentColor">0</property>
    <property name="Top">15</property>
    <property name="Width">124</property>
  </object>
  <object class="ComboBox" name="sIdAlmacen" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">196</property>
    <property name="Name">sIdAlmacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">11</property>
    <property name="Width">644</property>
    <property name="jsOnBlur">sIdAlmacenJSBlur</property>
    <property name="jsOnFocus">sIdAlmacenJSFocus</property>
    <property name="jsOnKeyPress">sIdAlmacenJSKeyPress</property>
  </object>
  <object class="Button" name="cmdCrearRequisicion" >
    <property name="Caption">Crear Requisicion de Existencias en Cero</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">470</property>
    <property name="Name">cmdCrearRequisicion</property>
    <property name="ParentColor">0</property>
    <property name="Top">249</property>
    <property name="Width">262</property>
    <property name="OnClick">cmdCrearRequisicionClick</property>
    <property name="jsOnClick">cmdCrearRequisicionJSClick</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">752</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="Top">249</property>
    <property name="Width">88</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="Button" name="cmdBuscar" >
    <property name="Caption">Buscar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">380</property>
    <property name="Name">cmdBuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">66</property>
    <property name="Width">81</property>
    <property name="jsOnClick">cmdBuscarJSClick</property>
  </object>
  <object class="Database" name="db" >
        <property name="Left">877</property>
        <property name="Top">319</property>
    <property name="Connected"></property>
    <property name="DatabaseName">geotech</property>
    <property name="Name">db</property>
  </object>
  <object class="Datasource" name="dsBitacorasalida" >
        <property name="Left">874</property>
        <property name="Top">186</property>
    <property name="Dataset">qryBitacorasalida</property>
    <property name="Name">dsBitacorasalida</property>
  </object>
  <object class="Query" name="qrySolicitudes" >
        <property name="Left">874</property>
        <property name="Top">118</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qrySolicitudes</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:9:{i:0;s:6:&quot;select&quot;;i:1;s:27:&quot;  i.mDescripcion as md,b.*,&quot;;i:2;s:39:&quot;  b.dCantidad-bs.dCantidad as faltante,&quot;;i:3;s:28:&quot;  b.dCantidad as solicitado,&quot;;i:4;s:27:&quot;  bs.dCantidad as entregado&quot;;i:5;s:4:&quot;from&quot;;i:6;s:41:&quot;  anexo_psolicitud b inner join insumos i&quot;;i:7;s:59:&quot;    on(i.sContrato=b.sContrato and i.sIdInsumo=b.sIdInsumo)&quot;;i:8;s:128:&quot; left join bitacoradetallesalida bs on(b.sContrato=bs.sContrato and b.sIdInsumo=bs.sIdInsumo and bs.sIdSolicitud=b.sIdSolicitud)&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dsSolicitudes" >
        <property name="Left">869</property>
        <property name="Top">51</property>
    <property name="DataSet">qrySolicitudes</property>
    <property name="Name">dsSolicitudes</property>
  </object>
  <object class="Query" name="qryBitacorasalida" >
        <property name="Left">879</property>
        <property name="Top">250</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryBitacorasalida</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:2:{i:0;s:138:&quot;select *,sum(b.dCantidad) as dc from bitacoradetallesalida b inner join insumos i on(i.sContrato=b.sContrato and i.sIdInsumo=b.sIdInsumo) &quot;;i:1;s:20:&quot;group by b.sIdInsumo&quot;;}]]></property>
  </object>
</object>
?>
