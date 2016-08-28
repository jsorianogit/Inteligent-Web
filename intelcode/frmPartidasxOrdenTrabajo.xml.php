<?php
<object class="frmPartidasxOrdenTrabajo" name="frmPartidasxOrdenTrabajo" baseclass="Page">
  <property name="Background">#D0DDF0</property>
  <property name="Caption">Partidas por Orden de Trabajo</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">524</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmPartidasxOrdenTrabajo</property>
  <property name="UseAjax">1</property>
  <property name="Width">976</property>
  <property name="OnBeforeShow">frmPartidasxOrdenTrabajoBeforeShow</property>
  <property name="OnShow">frmPartidasxOrdenTrabajoShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">306</property>
    <property name="Left">44</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">213</property>
    <property name="Width">804</property>
  </object>
  <object class="DBGrid" name="DBGActividades" >
    <property name="Columns"><![CDATA[a:22:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;*&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sSimbolo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;30&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Concepto&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sNumeroActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Inicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dFechaInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Termino&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dFechaFinal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Unidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;M.N.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Total M.N.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Total&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;%&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dPonderado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Costo M.N&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dCostoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:16:&quot;Costo Total M.N.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Costo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;sWbs&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sWbsAnterior&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Gerencial&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;lGerencial&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Color&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;iColor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;20&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Duracion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dDuracion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:17;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;sWbs2&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;sWbs&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:18;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;TipoAct&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sTipoActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:19;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;sNumeroOrden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:20;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Instalado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dInstalado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:21;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Excedente&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dExcedente&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">DtaActividad</property>
    <property name="Height">152</property>
    <property name="Left">123</property>
    <property name="Name">DBGActividades</property>
    <property name="Top">32</property>
    <property name="Width">725</property>
    <property name="jsOnClick">DBGActividadesJSClick</property>
    <property name="jsOnRowChanged">DBGActividadesJSRowChanged</property>
  </object>
  <object class="ComboBox" name="CboPaquete" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">141</property>
    <property name="Name">CboPaquete</property>
    <property name="Top">239</property>
    <property name="Width">662</property>
    <property name="jsOnBlur">CboPaqueteJSBlur</property>
    <property name="jsOnFocus">CboPaqueteJSFocus</property>
    <property name="jsOnKeyPress">CboPaqueteJSKeyPress</property>
  </object>
  <object class="Edit" name="TxtPartida" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">141</property>
    <property name="Name">TxtPartida</property>
    <property name="Top">260</property>
    <property name="Width">121</property>
    <property name="jsOnBlur">TxtPartidaJSBlur</property>
    <property name="jsOnFocus">TxtPartidaJSFocus</property>
    <property name="jsOnKeyPress">TxtPartidaJSKeyPress</property>
  </object>
  <object class="CheckBox" name="ChkConcepto" >
    <property name="Caption">Concepto Gerencial ?</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">275</property>
    <property name="Name">ChkConcepto</property>
    <property name="Top">261</property>
    <property name="Width">140</property>
    <property name="jsOnBlur">ChkConceptoJSBlur</property>
    <property name="jsOnFocus">ChkConceptoJSFocus</property>
    <property name="jsOnKeyPress">ChkConceptoJSKeyPress</property>
  </object>
  <object class="Memo" name="MemoDescripcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">49</property>
    <property name="Left">141</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">MemoDescripcion</property>
    <property name="Top">283</property>
    <property name="Width">662</property>
    <property name="jsOnBlur">MemoDescripcionJSBlur</property>
    <property name="jsOnFocus">MemoDescripcionJSFocus</property>
    <property name="jsOnKeyPress">MemoDescripcionJSKeyPress</property>
  </object>
  <object class="Edit" name="TxtCantidad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">141</property>
    <property name="Name">TxtCantidad</property>
    <property name="Top">335</property>
    <property name="Width">121</property>
    <property name="jsOnBlur">TxtCantidadJSBlur</property>
    <property name="jsOnFocus">TxtCantidadJSFocus</property>
    <property name="jsOnKeyPress">TxtCantidadJSKeyPress</property>
  </object>
  <object class="Edit" name="TxtMoneda" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">141</property>
    <property name="Name">TxtMoneda</property>
    <property name="Top">358</property>
    <property name="Width">121</property>
    <property name="jsOnBlur">TxtMonedaJSBlur</property>
    <property name="jsOnFocus">TxtMonedaJSFocus</property>
    <property name="jsOnKeyPress">TxtMonedaJSKeyPress</property>
  </object>
  <object class="Edit" name="TxtCosto" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">141</property>
    <property name="Name">TxtCosto</property>
    <property name="Top">381</property>
    <property name="Width">121</property>
    <property name="jsOnBlur">TxtCostoJSBlur</property>
    <property name="jsOnFocus">TxtCostoJSFocus</property>
    <property name="jsOnKeyPress">TxtCostoJSKeyPress</property>
  </object>
  <object class="ComboBox" name="CboColor" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:16:{i:0;s:5:&quot;Negro&quot;;i:1;s:6:&quot;Maroon&quot;;i:2;s:5:&quot;Verde&quot;;i:3;s:5:&quot;Olivo&quot;;i:4;s:4:&quot;Azul&quot;;i:5;s:6:&quot;Morado&quot;;i:6;s:8:&quot;Verde Cl&quot;;i:7;s:4:&quot;Gris&quot;;i:8;s:6:&quot;Silver&quot;;i:9;s:4:&quot;Rojo&quot;;i:10;s:5:&quot;Limon&quot;;i:11;s:8:&quot;Amarillo&quot;;i:12;s:7:&quot;Azul Cl&quot;;i:13;s:6:&quot;Fiusha&quot;;i:14;s:4:&quot;Agua&quot;;i:15;s:6:&quot;Blanco&quot;;}]]></property>
    <property name="Left">141</property>
    <property name="Name">CboColor</property>
    <property name="Top">404</property>
    <property name="Width">122</property>
    <property name="jsOnBlur">CboColorJSBlur</property>
    <property name="jsOnFocus">CboColorJSFocus</property>
    <property name="jsOnKeyPress">CboColorJSKeyPress</property>
  </object>
  <object class="Edit" name="TxtUnidad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">335</property>
    <property name="Name">TxtUnidad</property>
    <property name="Top">336</property>
    <property name="Width">80</property>
    <property name="jsOnBlur">TxtUnidadJSBlur</property>
    <property name="jsOnFocus">TxtUnidadJSFocus</property>
    <property name="jsOnKeyPress">TxtUnidadJSKeyPress</property>
  </object>
  <object class="DateTimePicker" name="DatFechaF" >
    <property name="Caption">DatFechaF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">141</property>
    <property name="Name">DatFechaF</property>
    <property name="Top">486</property>
    <property name="Width">119</property>
  </object>
  <object class="DateTimePicker" name="DtaFechaI" >
    <property name="Caption">DtaFechaI</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">141</property>
    <property name="Name">DtaFechaI</property>
    <property name="Top">444</property>
    <property name="Width">119</property>
  </object>
  <object class="Edit" name="TxtDuracion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">141</property>
    <property name="Name">TxtDuracion</property>
    <property name="Top">463</property>
    <property name="Width">119</property>
    <property name="jsOnBlur">TxtDuracionJSBlur</property>
    <property name="jsOnChange">TxtDuracionJSChange</property>
    <property name="jsOnFocus">TxtDuracionJSFocus</property>
    <property name="jsOnKeyPress">TxtDuracionJSKeyPress</property>
  </object>
  <object class="Memo" name="MemoComentarios" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">60</property>
    <property name="Left">277</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">MemoComentarios</property>
    <property name="Top">444</property>
    <property name="Width">527</property>
    <property name="jsOnBlur">MemoComentariosJSBlur</property>
    <property name="jsOnFocus">MemoComentariosJSFocus</property>
    <property name="jsOnKeyPress">MemoComentariosJSKeyPress</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">No. Programa</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">36</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">12</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">DETALLE DEL CONCEPTO</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">64</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">218</property>
    <property name="Width">199</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption"><![CDATA[&lt;P&gt;Paquete&lt;/P&gt;]]></property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">61</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">234</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Partida</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">62</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">264</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Descripcion</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">62</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">285</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Cantidad</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">63</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">338</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Moneda Nac.</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">63</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">362</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Costo M.N.</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">63</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">383</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Impr.  Color</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">63</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">406</property>
    <property name="Width">74</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Unidad</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">276</property>
    <property name="Name">Label10</property>
    <property name="Top">340</property>
    <property name="Width">55</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">PERIODO EJECUCION</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">64</property>
    <property name="Name">Label11</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">427</property>
    <property name="Width">201</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">COMENTARIOS ADICIONALES</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">276</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">427</property>
    <property name="Width">227</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Fecha Inicial</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">60</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">448</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Duracion</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">59</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">468</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Fecha Final</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">58</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">488</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="CmdAgregar" >
    <property name="Caption">Agregar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">CmdAgregar</property>
    <property name="Top">40</property>
    <property name="Width">66</property>
    <property name="jsOnClick">CmdAgregarJSClick</property>
  </object>
  <object class="Button" name="CmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">CmdModificar</property>
    <property name="Top">61</property>
    <property name="Width">66</property>
    <property name="jsOnClick">CmdModificarJSClick</property>
  </object>
  <object class="Button" name="CmdEliminar" >
    <property name="Caption">Eliminar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">CmdEliminar</property>
    <property name="Top">61</property>
    <property name="Width">66</property>
    <property name="OnClick">CmdEliminarClick</property>
    <property name="jsOnClick">CmdEliminarJSClick</property>
  </object>
  <object class="Button" name="CmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">CmdAceptar</property>
    <property name="Top">82</property>
    <property name="Width">66</property>
  </object>
  <object class="Button" name="CmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">CmdCancelar</property>
    <property name="Top">103</property>
    <property name="Width">66</property>
    <property name="jsOnClick">CmdCancelarJSClick</property>
  </object>
  <object class="Button" name="CmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">CmdImprimir</property>
    <property name="Top">124</property>
    <property name="Width">66</property>
    <property name="jsOnClick">CmdImprimirJSClick</property>
  </object>
  <object class="HiddenField" name="HidWbs" >
    <property name="Height">18</property>
    <property name="Left">863</property>
    <property name="Name">HidWbs</property>
    <property name="Top">231</property>
    <property name="Width">77</property>
  </object>
  <object class="HiddenField" name="HidTipo" >
    <property name="Height">18</property>
    <property name="Left">864</property>
    <property name="Name">HidTipo</property>
    <property name="Top">260</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HidOrden" >
    <property name="Height">18</property>
    <property name="Left">864</property>
    <property name="Name">HidOrden</property>
    <property name="Top">288</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HidActividad" >
    <property name="Height">18</property>
    <property name="Left">864</property>
    <property name="Name">HidActividad</property>
    <property name="Top">314</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HidModifica" >
    <property name="Height">18</property>
    <property name="Left">864</property>
    <property name="Name">HidModifica</property>
    <property name="Top">340</property>
    <property name="Width">76</property>
  </object>
  <object class="ComboBox" name="sFormato" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
    <property name="Left">45</property>
    <property name="Name">sFormato</property>
    <property name="Top">145</property>
    <property name="Width">65</property>
  </object>
  <object class="ComboBox" name="sNumeroOrden" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">125</property>
    <property name="Name">sNumeroOrden</property>
    <property name="Top">10</property>
    <property name="Width">185</property>
    <property name="OnChange">sNumeroOrdenChange</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">893</property>
        <property name="Top">28</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="DtaActividad" >
        <property name="Left">857</property>
        <property name="Top">60</property>
    <property name="DataSet">QryActividad</property>
    <property name="Name">DtaActividad</property>
  </object>
  <object class="Query" name="QryActividad" >
        <property name="Left">853</property>
        <property name="Top">148</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">50</property>
    <property name="Name">QryActividad</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:25:{i:0;s:7:&quot;select &quot;;i:1;s:11:&quot;  sSimbolo,&quot;;i:2;s:19:&quot;  sNumeroActividad,&quot;;i:3;s:55:&quot;  date_format(dFechaInicio,&quot;%d/%m/%Y&quot;) as dFechaInicio,&quot;;i:4;s:53:&quot;  date_format(dFechaFinal,&quot;%d/%m/%Y&quot;) as dFechaFinal,&quot;;i:5;s:35:&quot;  format(dCantidad,2) as dCantidad,&quot;;i:6;s:10:&quot;  sMedida,&quot;;i:7;s:13:&quot;  dPonderado,&quot;;i:8;s:11:&quot;  dVentaMN,&quot;;i:9;s:11:&quot;  dCostoMN,&quot;;i:10;s:40:&quot;  format(dCantidad*dVentaMN,2) as Total,&quot;;i:11;s:40:&quot;  format(dCantidad*dCostoMN,2) as Costo,&quot;;i:12;s:15:&quot;  sWbsAnterior,&quot;;i:13;s:13:&quot;  lGerencial,&quot;;i:14;s:15:&quot;  mDescripcion,&quot;;i:15;s:9:&quot;  iColor,&quot;;i:16;s:35:&quot;  format(dDuracion,0) as dDuracion,&quot;;i:17;s:15:&quot;  mComentarios,&quot;;i:18;s:7:&quot;  sWbs,&quot;;i:19;s:17:&quot;  sTipoActividad,&quot;;i:20;s:15:&quot;  sNumeroOrden,&quot;;i:21;s:13:&quot;  dInstalado,&quot;;i:22;s:12:&quot;  dExcedente&quot;;i:23;s:5:&quot;from &quot;;i:24;s:19:&quot;  actividadesxorden&quot;;}]]></property>
  </object>
</object>
?>
