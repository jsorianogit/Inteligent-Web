<?php
<object class="frmActividadesAnexo2" name="frmActividadesAnexo2" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Actividades x Anexo</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">536</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmActividadesAnexo2</property>
  <property name="UseAjax">1</property>
  <property name="Width">992</property>
  <property name="OnBeforeShow">frmActividadesAnexo2BeforeShow</property>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000FF</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel2</property>
    <property name="Color">#D7D7D7</property>
    <property name="Height">518</property>
    <property name="Left">34</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">5</property>
    <property name="Width">868</property>
  </object>
  <object class="Button" name="cmdComentario" >
    <property name="Caption">Click3</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">852</property>
    <property name="Name">cmdComentario</property>
    <property name="Top">316</property>
    <property name="Width">20</property>
    <property name="jsOnClick">cmdComentarioJSClick</property>
  </object>
  <object class="Button" name="cmdAlcance" >
    <property name="Caption">Click</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">852</property>
    <property name="Name">cmdAlcance</property>
    <property name="Top">260</property>
    <property name="Width">24</property>
    <property name="jsOnClick">cmdAlcanceJSClick</property>
  </object>
  <object class="Button" name="cmdHistorial" >
    <property name="Caption">Click2</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">823</property>
    <property name="Name">cmdHistorial</property>
    <property name="Top">264</property>
    <property name="Width">29</property>
    <property name="jsOnClick">cmdHistorialJSClick</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">Lavender</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">312</property>
    <property name="Left">39</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">207</property>
    <property name="Width">857</property>
  </object>
  <object class="DBGrid" name="ddactividadesxanexo1" >
    <property name="Columns"><![CDATA[a:26:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;Wbs&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;sWbs&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:25:&quot;Concepto/Partida Anterior&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sWbsAnterior&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:16:&quot;Concepto/Partida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sNumeroActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:17:&quot;Tipo de Actividad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sTipoActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:18:&quot;Actividad Anterior&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:18:&quot;sActividadAnterior&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;F. Inicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dFechaInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;75&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Duracion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dDuracion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;F. Final&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dFechaFinal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;75&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Ponderado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dPonderado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;dCostoMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dCostoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;dCostoDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCostoDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Precio MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Precio DLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dVentaDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;lCalculo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;lCalculo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;False&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;Especificacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;sEspecificacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:17;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;dCantidadAnexo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:18;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;dCargado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dCargado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:19;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;dInstalado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dInstalado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:20;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;dExcedente&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dExcedente&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:21;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;iColor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;iColor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:22;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;lExtraordinario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;lExtraordinario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:23;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;sIdFase&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sIdFase&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:5:&quot;false&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:24;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Total MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;TotalMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:25;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Total DLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;TotalDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="Datasource">dsActividadesxAnexo</property>
    <property name="Height">169</property>
    <property name="Left">119</property>
    <property name="Name">ddactividadesxanexo1</property>
    <property name="Top">31</property>
    <property name="Width">777</property>
    <property name="jsOnClick">ddactividadesxanexo1JSClick</property>
  </object>
  <object class="ComboBox" name="sPaquete" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">127</property>
    <property name="Name">sPaquete</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">213</property>
    <property name="Width">749</property>
    <property name="jsOnBlur">sPaqueteJSBlur</property>
    <property name="jsOnFocus">sPaqueteJSFocus</property>
    <property name="jsOnKeyPress">sPaqueteJSKeyPress</property>
  </object>
  <object class="Edit" name="sNumeroActividad" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">sNumeroActividad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">237</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">sNumeroActividadJSBlur</property>
    <property name="jsOnFocus">sNumeroActividadJSFocus</property>
    <property name="jsOnKeyPress">sNumeroActividadJSKeyPress</property>
  </object>
  <object class="Edit" name="sWbsAnterior" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">sWbsAnterior</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">257</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">sWbsAnteriorJSBlur</property>
    <property name="jsOnFocus">sWbsAnteriorJSFocus</property>
    <property name="jsOnKeyPress">sWbsAnteriorJSKeyPress</property>
  </object>
  <object class="Edit" name="sEspecificacion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">sEspecificacion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">277</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">sEspecificacionJSBlur</property>
    <property name="jsOnFocus">sEspecificacionJSFocus</property>
    <property name="jsOnKeyPress">sEspecificacionJSKeyPress</property>
  </object>
  <object class="Edit" name="dCostoMN" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">dCostoMN</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">297</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">dCostoMNJSBlur</property>
    <property name="jsOnFocus">dCostoMNJSFocus</property>
    <property name="jsOnKeyPress">dCostoMNJSKeyPress</property>
  </object>
  <object class="Edit" name="dCostoDLL" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">dCostoDLL</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">317</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">dCostoDLLJSBlur</property>
    <property name="jsOnFocus">dCostoDLLJSFocus</property>
    <property name="jsOnKeyPress">dCostoDLLJSKeyPress</property>
  </object>
  <object class="Edit" name="dVentaMN" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">dVentaMN</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">337</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">dVentaMNJSBlur</property>
    <property name="jsOnFocus">dVentaMNJSFocus</property>
    <property name="jsOnKeyPress">dVentaMNJSKeyPress</property>
  </object>
  <object class="Edit" name="dVentaDLL" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">127</property>
    <property name="Name">dVentaDLL</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">357</property>
    <property name="Width">158</property>
    <property name="jsOnBlur">dVentaDLLJSBlur</property>
    <property name="jsOnFocus">dVentaDLLJSFocus</property>
    <property name="jsOnKeyPress">dVentaDLLJSKeyPress</property>
  </object>
  <object class="Edit" name="sMedida" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">709</property>
    <property name="Name">sMedida</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">238</property>
    <property name="Width">167</property>
    <property name="jsOnBlur">sMedidaJSBlur</property>
    <property name="jsOnFocus">sMedidaJSFocus</property>
    <property name="jsOnKeyPress">sMedidaJSKeyPress</property>
  </object>
  <object class="ComboBox" name="lExtraordinario" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:2:{s:2:&quot;Si&quot;;s:2:&quot;Si&quot;;s:2:&quot;No&quot;;s:2:&quot;No&quot;;}]]></property>
    <property name="Left">709</property>
    <property name="Name">lExtraordinario</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">259</property>
    <property name="Width">79</property>
    <property name="jsOnBlur">lExtraordinarioJSBlur</property>
    <property name="jsOnFocus">lExtraordinarioJSFocus</property>
    <property name="jsOnKeyPress">lExtraordinarioJSKeyPress</property>
  </object>
  <object class="Edit" name="dCantidadAnexo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">710</property>
    <property name="Name">dCantidadAnexo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">280</property>
    <property name="Width">165</property>
    <property name="jsOnBlur">dCantidadAnexoJSBlur</property>
    <property name="jsOnFocus">dCantidadAnexoJSFocus</property>
    <property name="jsOnKeyPress">dCantidadAnexoJSKeyPress</property>
  </object>
  <object class="Edit" name="dTotalMN" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">709</property>
    <property name="Name">dTotalMN</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">336</property>
    <property name="Width">167</property>
    <property name="jsOnBlur">dTotalMNJSBlur</property>
    <property name="jsOnFocus">dTotalMNJSFocus</property>
    <property name="jsOnKeyPress">dTotalMNJSKeyPress</property>
  </object>
  <object class="Edit" name="dTotalDLL" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">709</property>
    <property name="Name">dTotalDLL</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">357</property>
    <property name="Width">167</property>
    <property name="jsOnBlur">dTotalDLLJSBlur</property>
    <property name="jsOnFocus">dTotalDLLJSFocus</property>
    <property name="jsOnKeyPress">dTotalDLLJSKeyPress</property>
  </object>
  <object class="ComboBox" name="sIdFase" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">127</property>
    <property name="Name">sIdFase</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">379</property>
    <property name="Width">749</property>
    <property name="jsOnBlur">sIdFaseJSBlur</property>
    <property name="jsOnFocus">sIdFaseJSFocus</property>
    <property name="jsOnKeyPress">sIdFaseJSKeyPress</property>
  </object>
  <object class="Memo" name="mDescripcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">56</property>
    <property name="Left">127</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">402</property>
    <property name="Width">749</property>
    <property name="jsOnBlur">mDescripcionJSBlur</property>
    <property name="jsOnFocus">mDescripcionJSFocus</property>
    <property name="jsOnKeyPress">mDescripcionJSKeyPress</property>
  </object>
  <object class="DateTimePicker" name="dFechaInicio_1" >
    <property name="Caption">dFechaInicio_1</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">127</property>
    <property name="Name">dFechaInicio_1</property>
    <property name="Top">461</property>
    <property name="Width">164</property>
  </object>
  <object class="Edit" name="dDuracion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">430</property>
    <property name="Name">dDuracion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">460</property>
    <property name="Width">109</property>
    <property name="jsOnBlur">dDuracionJSBlur</property>
    <property name="jsOnFocus">dDuracionJSFocus</property>
    <property name="jsOnKeyPress">dDuracionJSKeyPress</property>
  </object>
  <object class="DateTimePicker" name="dFechaFinal_2" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">712</property>
    <property name="Name">dFechaFinal_2</property>
    <property name="Top">459</property>
    <property name="Width">164</property>
  </object>
  <object class="ComboBox" name="lCalculo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">127</property>
    <property name="Name">lCalculo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">488</property>
    <property name="Width">164</property>
    <property name="jsOnBlur">lCalculoJSBlur</property>
    <property name="jsOnFocus">lCalculoJSFocus</property>
    <property name="jsOnKeyPress">lCalculoJSKeyPress</property>
  </object>
  <object class="Edit" name="dPonderado" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">430</property>
    <property name="Name">dPonderado</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">485</property>
    <property name="Width">109</property>
    <property name="jsOnBlur">dPonderadoJSBlur</property>
    <property name="jsOnFocus">dPonderadoJSFocus</property>
    <property name="jsOnKeyPress">dPonderadoJSKeyPress</property>
  </object>
  <object class="ComboBox" name="iColor" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">711</property>
    <property name="Name">iColor</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">484</property>
    <property name="Width">165</property>
    <property name="jsOnBlur">iColorJSBlur</property>
    <property name="jsOnFocus">iColorJSFocus</property>
    <property name="jsOnKeyPress">iColorJSKeyPress</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">CATALOGO DE CONCEPTOS/PARTIDAS</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">ARIAL</property>
    <property name="Size">13px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">34</property>
    <property name="Name">Label16</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">7</property>
    <property name="Width">867</property>
  </object>
  <object class="Button" name="cmdNuevo" >
    <property name="Caption">Nuevo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">40</property>
    <property name="Name">cmdNuevo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">32</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdNuevoJSClick</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">40</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">55</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">40</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">78</property>
    <property name="Width">75</property>
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
    <property name="Left">40</property>
    <property name="Name">cmdCancelar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">101</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Caption">Eliminar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">40</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">124</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">40</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">147</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Paquete:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">46</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">216</property>
    <property name="Width">53</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Concepto/Part.</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">45</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">241</property>
    <property name="Width">80</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Concepto Ant.</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">45</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">261</property>
    <property name="Width">82</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Especificacion:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">46</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">281</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Costo MN:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">46</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="Top">301</property>
    <property name="Width">57</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Costo DLL:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">46</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="Top">321</property>
    <property name="Width">61</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Precio MN:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">46</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">342</property>
    <property name="Width">62</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Precio DLL:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">46</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="Top">361</property>
    <property name="Width">65</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fase:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">45</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="Top">386</property>
    <property name="Width">33</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Descripcion:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">44</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="Top">411</property>
    <property name="Width">69</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Fecha Inicio:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">43</property>
    <property name="Name">Label11</property>
    <property name="ParentColor">0</property>
    <property name="Top">466</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Cal. Pond.?:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">43</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="Top">491</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Duracion:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">354</property>
    <property name="Name">Label13</property>
    <property name="ParentColor">0</property>
    <property name="Top">466</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Ponderado:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">358</property>
    <property name="Name">Label14</property>
    <property name="ParentColor">0</property>
    <property name="Top">491</property>
    <property name="Width">70</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fecha Final:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">605</property>
    <property name="Name">Label15</property>
    <property name="ParentColor">0</property>
    <property name="Top">466</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Imprimir en Color:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">604</property>
    <property name="Name">Label17</property>
    <property name="ParentColor">0</property>
    <property name="Top">489</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Medida:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">602</property>
    <property name="Name">Label18</property>
    <property name="ParentColor">0</property>
    <property name="Top">241</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Extraordinario:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">602</property>
    <property name="Name">Label19</property>
    <property name="ParentColor">0</property>
    <property name="Top">261</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Cant. Anexo:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">602</property>
    <property name="Name">Label20</property>
    <property name="ParentColor">0</property>
    <property name="Top">284</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Total MN:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">600</property>
    <property name="Name">Label21</property>
    <property name="ParentColor">0</property>
    <property name="Top">339</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Total DLL:</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">600</property>
    <property name="Name">Label22</property>
    <property name="ParentColor">0</property>
    <property name="Top">364</property>
    <property name="Width">105</property>
  </object>
  <object class="HiddenField" name="hsWbs" >
    <property name="Height">18</property>
    <property name="Left">311</property>
    <property name="Name">hsWbs</property>
    <property name="Top">243</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsNumeroActividad" >
    <property name="Height">18</property>
    <property name="Left">311</property>
    <property name="Name">hsNumeroActividad</property>
    <property name="Top">261</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsWbsAnterior" >
    <property name="Height">18</property>
    <property name="Left">311</property>
    <property name="Name">hsWbsAnterior</property>
    <property name="Top">279</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hOperacion" >
    <property name="Height">18</property>
    <property name="Left">311</property>
    <property name="Name">hOperacion</property>
    <property name="Top">298</property>
    <property name="Width">200</property>
  </object>
  <object class="Button" name="cmdOpciones" >
    <property name="Caption">Opciones</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">40</property>
    <property name="Name">cmdOpciones</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">170</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdOpcionesJSClick</property>
  </object>
  <object class="GroupBox" name="GrupoMenu" >
    <property name="Color">#4AA5FF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">39</property>
    <property name="Left">118</property>
    <property name="Name">GrupoMenu</property>
    <property name="ParentColor">0</property>
    <property name="Top">161</property>
    <property name="Width">138</property>
    <object class="MainMenu" name="MenuOpcion" >
      <property name="Height">20</property>
      <property name="Images">ImageList1</property>
      <property name="Items"><![CDATA[a:1:{i:0;a:6:{s:7:&quot;Caption&quot;;s:22:&quot;  Conceptos / Partidas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:12:{i:0;a:6:{s:7:&quot;Caption&quot;;s:8:&quot;Imprimir&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;1&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:27:&quot;Imprimir Alcances x Partida&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;2&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:14:&quot;Buscar Partida&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;2&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;3&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Ficha Tecnica&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;4&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:32:&quot;Detalle de Alcances por Concepto&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;5&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;5&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Historial de Partida Anexo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;4&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;6&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:36:&quot;Comentarios Adicionales a la Partida&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;7&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Eliminar Alcances&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;8&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Copiar Alcances xPartida&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;9&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;9&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Pegar Alcances x Partida&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;10&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;10&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:29:&quot;Ponderar Conceptos / Partidas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;11&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;11&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Medidas del Anexo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;12&quot;;s:5:&quot;Items&quot;;a:0:{}}}}}]]></property>
      <property name="Left">9</property>
      <property name="Name">MenuOpcion</property>
      <property name="Top">11</property>
      <property name="Width">110</property>
      <property name="jsOnClick">MenuOpcionJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel_Alcances" >
    <property name="BorderColor">#000000</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">Panel_Alcances</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">196</property>
    <property name="Left">278</property>
    <property name="Name">Panel_Alcances</property>
    <property name="ParentColor">0</property>
    <property name="Top">170</property>
    <property name="Width">428</property>
    <object class="Label" name="Label23" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ALCANCES DE LA PARTIDA ANEXO</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">Label23</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">424</property>
    </object>
    <object class="DBGrid" name="GridAlcances" >
      <property name="Columns"><![CDATA[a:3:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Fase&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;iFase&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;(%) Avance&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;dAvance&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">DataAlcances</property>
      <property name="Height">132</property>
      <property name="Left">8</property>
      <property name="Name">GridAlcances</property>
      <property name="Top">29</property>
      <property name="Width">412</property>
      <property name="jsOnClick">GridAlcancesJSClick</property>
      <property name="jsOnDataChanged">GridAlcancesJSDataChanged</property>
    </object>
    <object class="Edit" name="txtPorcentaje" >
      <property name="Color">#FFFF80</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">307</property>
      <property name="Name">txtPorcentaje</property>
      <property name="ParentColor">0</property>
      <property name="Top">169</property>
      <property name="Width">92</property>
    </object>
    <object class="Button" name="cmdCerrar" >
      <property name="Caption">x</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Haga Click Aqui para Guardar Cambios</property>
      <property name="Left">353</property>
      <property name="Name">cmdCerrar</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Width">19</property>
      <property name="jsOnClick">cmdCerrarJSClick</property>
    </object>
    <object class="Button" name="cmdOtro" >
      <property name="Caption">Nuevo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">11</property>
      <property name="Name">cmdOtro</property>
      <property name="ParentColor">0</property>
      <property name="Top">168</property>
      <property name="Width">63</property>
      <property name="jsOnClick">cmdOtroJSClick</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Caption">Presione F2 para Editar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">167</property>
      <property name="Name">Label26</property>
      <property name="Top">171</property>
      <property name="Width">151</property>
    </object>
    <object class="Button" name="cmdQuitar" >
      <property name="Caption">Quitar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">83</property>
      <property name="Name">cmdQuitar</property>
      <property name="ParentColor">0</property>
      <property name="Top">168</property>
      <property name="Width">65</property>
      <property name="jsOnClick">cmdQuitarJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="HiTotal" >
    <property name="Height">18</property>
    <property name="Left">900</property>
    <property name="Name">HiTotal</property>
    <property name="Top">364</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HiMatriz" >
    <property name="Height">18</property>
    <property name="Left">900</property>
    <property name="Name">HiMatriz</property>
    <property name="Top">390</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">900</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">416</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="HiCopia" >
    <property name="Height">18</property>
    <property name="Left">898</property>
    <property name="Name">HiCopia</property>
    <property name="Top">441</property>
    <property name="Width">78</property>
  </object>
  <object class="Panel" name="Panel_Historial" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">121</property>
    <property name="Left">415</property>
    <property name="Name">Panel_Historial</property>
    <property name="ParentColor">0</property>
    <property name="Top">25</property>
    <property name="Width">476</property>
    <object class="Label" name="Label27" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">HISTORIAL DE LA PARTIDA EN LAS DISTINTAS REPROGRAMACIONES</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">1</property>
      <property name="Name">Label27</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">475</property>
    </object>
    <object class="DBGrid" name="GridHistorial" >
      <property name="Columns"><![CDATA[a:7:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Convenio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sIdConvenio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Inicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dFechaInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Termino&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dFechaFinal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;dCantidadAnexo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Venta MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Ponderado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;dPonderado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">DataHistorial</property>
      <property name="Height">89</property>
      <property name="Left">12</property>
      <property name="Name">GridHistorial</property>
      <property name="Top">24</property>
      <property name="Width">452</property>
    </object>
    <object class="Button" name="cmdCierra" >
      <property name="Caption">X</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">401</property>
      <property name="Name">cmdCierra</property>
      <property name="Width">16</property>
      <property name="jsOnClick">cmdCierraJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel_Comenta" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">226</property>
    <property name="Left">256</property>
    <property name="Name">Panel_Comenta</property>
    <property name="ParentColor">0</property>
    <property name="Top">170</property>
    <property name="Width">520</property>
    <object class="DateTimePicker" name="fecha" >
      <property name="Caption">fecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%Y-%m-%d</property>
      <property name="Left">320</property>
      <property name="Name">fecha</property>
      <property name="Top">190</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label28" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">COMENTARIOS ADICIONALES DE LA PARTIDA ANEXO</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">20</property>
      <property name="Name">Label28</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">520</property>
    </object>
    <object class="DBGrid" name="GridComentario" >
      <property name="Columns"><![CDATA[a:4:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Titulo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;sDescripcionCorta&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Usuario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdUsuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Comentario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
      <property name="DataSource">DataComentario</property>
      <property name="Height">159</property>
      <property name="Left">12</property>
      <property name="Name">GridComentario</property>
      <property name="Top">27</property>
      <property name="Width">268</property>
      <property name="jsOnClick">GridComentarioJSClick</property>
    </object>
    <object class="Memo" name="memoComenta" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">188</property>
      <property name="Left">292</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoComenta</property>
      <property name="ParentColor">0</property>
      <property name="Top">26</property>
      <property name="Width">211</property>
      <property name="jsOnBlur">memoComentaJSBlur</property>
      <property name="jsOnChange">memoComentaJSChange</property>
      <property name="jsOnFocus">memoComentaJSFocus</property>
      <property name="jsOnKeyPress">memoComentaJSKeyPress</property>
    </object>
    <object class="Button" name="cmdMas" >
      <property name="Caption">Nuevo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">143</property>
      <property name="Name">cmdMas</property>
      <property name="Top">198</property>
      <property name="Width">64</property>
      <property name="jsOnClick">cmdMasJSClick</property>
    </object>
    <object class="Button" name="cmdMenos" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">214</property>
      <property name="Name">cmdMenos</property>
      <property name="Top">198</property>
      <property name="Width">64</property>
      <property name="jsOnClick">cmdMenosJSClick</property>
    </object>
    <object class="Button" name="cmdClose" >
      <property name="Caption">X</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">445</property>
      <property name="Name">cmdClose</property>
      <property name="Top">2</property>
      <property name="Width">20</property>
      <property name="jsOnClick">cmdCloseJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel_Buscar" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#D0DDF0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">123</property>
    <property name="Left">356</property>
    <property name="Name">Panel_Buscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">172</property>
    <property name="Width">280</property>
    <object class="Label" name="Label24" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">BUSCAR PARTIDA</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">2</property>
      <property name="Name">Label24</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">278</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">Partida a Buscar ?</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label25</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">152</property>
    </object>
    <object class="Edit" name="txtBuscar" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">14</property>
      <property name="Name">txtBuscar</property>
      <property name="ParentColor">0</property>
      <property name="Top">57</property>
      <property name="Width">246</property>
      <property name="jsOnBlur">txtBuscarJSBlur</property>
      <property name="jsOnFocus">txtBuscarJSFocus</property>
      <property name="jsOnKeyPress">txtBuscarJSKeyPress</property>
    </object>
    <object class="Button" name="cmdOk" >
      <property name="Caption">Ok</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">59</property>
      <property name="Name">cmdOk</property>
      <property name="ParentColor">0</property>
      <property name="Top">87</property>
      <property name="Width">75</property>
      <property name="jsOnClick">cmdOkJSClick</property>
    </object>
    <object class="Button" name="cmdCancel" >
      <property name="Caption">Cancel</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">144</property>
      <property name="Name">cmdCancel</property>
      <property name="ParentColor">0</property>
      <property name="Top">86</property>
      <property name="Width">75</property>
      <property name="jsOnClick">cmdCancelJSClick</property>
    </object>
  </object>
  <object class="Database" name="db" >
        <property name="Left">302</property>
        <property name="Top">60</property>
    <property name="Connected"></property>
    <property name="Name">db</property>
  </object>
  <object class="Datasource" name="dsActividadesxAnexo" >
        <property name="Left">366</property>
        <property name="Top">85</property>
    <property name="Dataset">qryActividadesxAnexo</property>
    <property name="Name">dsActividadesxAnexo</property>
  </object>
  <object class="Query" name="qryActividadesxAnexo" >
        <property name="Left">253</property>
        <property name="Top">89</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryActividadesxAnexo</property>
    <property name="OrderField">iItemOrden</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:32:{i:0;s:6:&quot;select&quot;;i:1;s:14:&quot;  sIdConvenio,&quot;;i:2;s:28:&quot;  @iNivel:=iNivel as iNivel,&quot;;i:3;s:11:&quot;  sSimbolo,&quot;;i:4;s:45:&quot;  concat(repeat(&quot;_&quot;,@iNivel*2),sWbs) as sWbs,&quot;;i:5;s:15:&quot;  sWbsAnterior,&quot;;i:6;s:19:&quot;  sNumeroActividad,&quot;;i:7;s:17:&quot;  sTipoActividad,&quot;;i:8;s:18:&quot;  sEspecificacion,&quot;;i:9;s:21:&quot;  sActividadAnterior,&quot;;i:10;s:13:&quot;  iItemOrden,&quot;;i:11;s:15:&quot;  mDescripcion,&quot;;i:12;s:55:&quot;  date_format(dFechaInicio,&quot;%d/%m/%Y&quot;) as dFechaInicio,&quot;;i:13;s:12:&quot;  dDuracion,&quot;;i:14;s:53:&quot;  date_format(dFechaFinal,&quot;%d/%m/%Y&quot;) as dFechaFinal,&quot;;i:15;s:40:&quot;  concat(dPonderado,&quot; %&quot;) as dPonderado,&quot;;i:16;s:11:&quot;  dCostoMN,&quot;;i:17;s:12:&quot;  dCostoDLL,&quot;;i:18;s:46:&quot;  concat(&quot;$ &quot;,format(dVentaMN,2)) as dVentaMN,&quot;;i:19;s:48:&quot;  concat(&quot;$ &quot;,format(dVentaDLL,2)) as dVentaDLL,&quot;;i:20;s:11:&quot;  lCalculo,&quot;;i:21;s:10:&quot;  sMedida,&quot;;i:22;s:45:&quot;  format(dCantidadAnexo,2) as dCantidadAnexo,&quot;;i:23;s:11:&quot;  dCargado,&quot;;i:24;s:13:&quot;  dInstalado,&quot;;i:25;s:13:&quot;  dExcedente,&quot;;i:26;s:9:&quot;  iColor,&quot;;i:27;s:18:&quot;  lExtraordinario,&quot;;i:28;s:10:&quot;  sIdFase,&quot;;i:29;s:64:&quot;  concat(&quot;$ &quot;,format((dVentaMN * dCantidadAnexo),2)) as TotalMN,&quot;;i:30;s:65:&quot;  concat(&quot;$ &quot;,format((dVentaDLL * dCantidadAnexo),2)) as TotalDLL&quot;;i:31;s:26:&quot;    from actividadesxanexo&quot;;}]]></property>
  </object>
  <object class="ImageList" name="ImageList1" >
        <property name="Left">564</property>
        <property name="Top">455</property>
    <property name="Images"><![CDATA[a:15:{s:1:&quot;1&quot;;s:44:&quot;recursos/imagenesMenu/Opciones/fileprint.ico&quot;;s:1:&quot;2&quot;;s:36:&quot;recursos/imagenesMenu/Opciones/3.ico&quot;;s:1:&quot;3&quot;;s:41:&quot;recursos/imagenesMenu/Opciones/Delete.ico&quot;;s:1:&quot;4&quot;;s:44:&quot;recursos/imagenesMenu/Opciones/subscribe.ico&quot;;s:1:&quot;5&quot;;s:36:&quot;recursos/imagenesMenu/Opciones/6.ico&quot;;s:1:&quot;6&quot;;s:36:&quot;recursos/imagenesMenu/Opciones/2.ico&quot;;s:1:&quot;7&quot;;s:44:&quot;recursos/imagenesMenu/Opciones/app_kdict.ico&quot;;s:1:&quot;8&quot;;s:37:&quot;recursos/imagenesMenu/Opciones/10.ico&quot;;s:1:&quot;9&quot;;s:43:&quot;recursos/imagenesMenu/Opciones/editcopy.ico&quot;;s:2:&quot;10&quot;;s:44:&quot;recursos/imagenesMenu/Opciones/editpaste.ico&quot;;s:2:&quot;11&quot;;s:41:&quot;recursos/imagenesMenu/Opciones/status.ico&quot;;s:2:&quot;12&quot;;s:43:&quot;recursos/imagenesMenu/Opciones/source_s.ico&quot;;s:2:&quot;13&quot;;s:40:&quot;recursos/imagenesMenu/Opciones/_txt2.ico&quot;;s:2:&quot;14&quot;;s:39:&quot;recursos/imagenesMenu/Opciones/Redo.ico&quot;;s:2:&quot;15&quot;;s:39:&quot;recursos/imagenesMenu/Opciones/Undo.ico&quot;;}]]></property>
    <property name="Name">ImageList1</property>
  </object>
  <object class="Datasource" name="DataAlcances" >
        <property name="Left">911</property>
        <property name="Top">126</property>
    <property name="DataSet">qryAlcanes</property>
    <property name="Name">DataAlcances</property>
  </object>
  <object class="Query" name="qryAlcanes" >
        <property name="Left">912</property>
        <property name="Top">172</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryAlcanes</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="DataHistorial" >
        <property name="Left">908</property>
        <property name="Top">4</property>
    <property name="DataSet">qryHistorial</property>
    <property name="Name">DataHistorial</property>
  </object>
  <object class="Query" name="qryHistorial" >
        <property name="Left">911</property>
        <property name="Top">59</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryHistorial</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="DataComentario" >
        <property name="Left">912</property>
        <property name="Top">252</property>
    <property name="DataSet">qryComentario</property>
    <property name="Name">DataComentario</property>
  </object>
  <object class="Query" name="qryComentario" >
        <property name="Left">912</property>
        <property name="Top">308</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryComentario</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
