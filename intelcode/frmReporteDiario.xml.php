<?php
<object class="frmReporteDiario" name="frmReporteDiario" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmReporteDiario</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">460</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmReporteDiario</property>
  <property name="Width">1000</property>
  <property name="OnBeforeShow">frmReporteDiarioBeforeShow</property>
  <property name="OnShow">frmReporteDiarioShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000FF</property>
    <property name="BorderWidth">2</property>
    <property name="Color">#477378</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">190</property>
    <property name="Left">32</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">56</property>
    <object class="Button" name="cmdAgregar" >
      <property name="Caption">Button1</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Agregar</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Symbol-Add.ico</property>
      <property name="Name">cmdAgregar</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">4</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdAgregarJSClick</property>
    </object>
    <object class="Button" name="cmdModificar" >
      <property name="Caption">cmdModificar</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Modificar</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Edit.ico</property>
      <property name="Name">cmdModificar</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">32</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdModificarJSClick</property>
    </object>
    <object class="Button" name="cmdCancelar" >
      <property name="Caption">Button1</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Cancelar</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Undo.ico</property>
      <property name="Name">cmdCancelar</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">86</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdCancelarJSClick</property>
    </object>
    <object class="Button" name="cmdEliminar" >
      <property name="Caption">Button1</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Eliminar</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Symbol-Delete.ico</property>
      <property name="Name">cmdEliminar</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">110</property>
      <property name="Width">40</property>
      <property name="OnClick">cmdEliminarClick</property>
    </object>
    <object class="Button" name="cmdImprimir" >
      <property name="Caption">Button1</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Imprimir</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/32px-Crystal_Clear_action_fileprint.ico</property>
      <property name="Name">cmdImprimir</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">136</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
    <object class="Button" name="cmdAceptar" >
      <property name="Caption">Button1</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Aceptar</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Symbol-Check.ico</property>
      <property name="Name">cmdAceptar</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">60</property>
      <property name="Width">40</property>
      <property name="OnClick">cmdAceptarClick</property>
    </object>
    <object class="Button" name="cmdFinanciero" >
      <property name="Caption">Button1</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Imprimir</property>
      <property name="ImageSource">Modulos/imagenes/pesos.png</property>
      <property name="Name">cmdFinanciero</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">166</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdFinancieroJSClick</property>
    </object>
  </object>
  <object class="DBGrid" name="dbgReporteDiario" >
    <property name="Columns"><![CDATA[a:20:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Contrato&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sContrato&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Convenio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sIdConvenio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Convenio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Convenio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Turno&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sIdTurno&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Turno&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;turno&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sNumeroReporte&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;lStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Creador&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdUsuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Autoriza&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:18:&quot;sIdUsuarioAutoriza&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:16:&quot;sOperacionInicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sOperacionInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;sOperacionFinal&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;sOperacionFinal&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;sTiempoMuerto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;sTiempoMuerto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:17:&quot;sTiempoMuertoReal&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;sTiempoMuertoReal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;sTiempoEfectivo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;sTiempoEfectivo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;sTiempo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sTiempo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;sTransporte&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sTransporte&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:17;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;sInicioPlatica&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sInicioPlatica&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:18;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;sFinalPlatica&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;sFinalPlatica&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:19;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;sTema&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;sTema&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">dsRd</property>
    <property name="Height">192</property>
    <property name="Left">89</property>
    <property name="Name">dbgReporteDiario</property>
    <property name="Top">34</property>
    <property name="Width">796</property>
    <property name="jsOnClick">dbgReporteDiarioJSClick</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">Reportes Diarios</property>
    <property name="Color">#0000FF</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">32</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">21</property>
    <property name="Width">928</property>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000FF</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#477378</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">395</property>
    <property name="Left">884</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">72</property>
    <object class="Button" name="cmdJornadas" >
      <property name="Caption">Volumenes de Notas y Obra</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(1) Jornadas Diarias</property>
      <property name="ImageSource">Modulos/imagenes/Diarias.png</property>
      <property name="Name">cmdJornadas</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdJornadasJSClick</property>
    </object>
    <object class="Button" name="cmdFirmantes" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(2) Firmantes</property>
      <property name="ImageSource">Modulos/imagenes/firmantes.png</property>
      <property name="Name">cmdFirmantes</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">40</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdFirmantesJSClick</property>
    </object>
    <object class="Button" name="cmdPermisos" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(3) Permisos de Seguridad</property>
      <property name="ImageSource">Modulos/imagenes/permisos.png</property>
      <property name="Name">cmdPermisos</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">79</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdPermisosJSClick</property>
    </object>
    <object class="Button" name="cmdAlcances" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(6) Alcances xPartida</property>
      <property name="ImageSource">Modulos/imagenes/alcances.png</property>
      <property name="Name">cmdAlcances</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">199</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdAlcancesJSClick</property>
    </object>
    <object class="Button" name="cmdPersonal" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(7) Personal y Equipo</property>
      <property name="ImageSource">Modulos/imagenes/personal.png</property>
      <property name="Name">cmdPersonal</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">239</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdPersonalJSClick</property>
    </object>
    <object class="Button" name="cmdFotos" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(8) Reporte Fotografico</property>
      <property name="ImageSource">Modulos/imagenes/camara.png</property>
      <property name="Name">cmdFotos</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">277</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdFotosJSClick</property>
    </object>
    <object class="Button" name="Button16" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">33</property>
      <property name="Hint">(9) Control de Acarreos</property>
      <property name="ImageSource">recursos/imagenesMenu/ToolBar/4.png</property>
      <property name="Name">Button16</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">315</property>
      <property name="Width">41</property>
      <property name="jsOnClick">Button16JSClick</property>
    </object>
    <object class="Button" name="cmdVolumenes" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(5) Volumenes de Notas y Obras</property>
      <property name="ImageSource">Modulos/imagenes/volumenes.png</property>
      <property name="Name">cmdVolumenes</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">158</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdVolumenesJSClick</property>
    </object>
    <object class="Button" name="Button18" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(10) Relacion de Personal y Equipos</property>
      <property name="ImageSource">recursos/imagenesMenu/ToolBar/10.png</property>
      <property name="Name">Button18</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">354</property>
      <property name="Width">40</property>
      <property name="jsOnClick">Button18JSClick</property>
    </object>
    <object class="Button" name="cmdAvisosEmbarques" >
      <property name="Caption">Button1</property>
      <property name="Color">#0000FF</property>
      <property name="Cursor">crPointer</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Hint">(4) Avisos de Embarques</property>
      <property name="ImageSource">Modulos/imagenes/embarques.png</property>
      <property name="Name">cmdAvisosEmbarques</property>
      <property name="ParentColor">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">117</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdAvisosEmbarquesJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#0000FF</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#D7D7D7</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">202</property>
    <property name="Left">32</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">228</property>
    <property name="Width">849</property>
    <object class="DateTimePicker" name="dIdFecha" >
      <property name="Caption">dIdFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%Y-%m-%d</property>
      <property name="Left">169</property>
      <property name="Name">dIdFecha</property>
      <property name="Top">6</property>
      <property name="Width">92</property>
    </object>
    <object class="ComboBox" name="sIdTurno" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">27</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">169</property>
      <property name="Name">sIdTurno</property>
      <property name="ParentColor">0</property>
      <property name="Top">25</property>
      <property name="Width">380</property>
    </object>
    <object class="Edit" name="sNumeroReporte" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">169</property>
      <property name="Name">sNumeroReporte</property>
      <property name="ParentColor">0</property>
      <property name="Top">53</property>
      <property name="Width">192</property>
    </object>
    <object class="Edit" name="sOperacionInicio" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">169</property>
      <property name="Name">sOperacionInicio</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="sOperacionFinal" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">395</property>
      <property name="Name">sOperacionFinal</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="sTiempoEfectivo" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">169</property>
      <property name="Name">sTiempoEfectivo</property>
      <property name="ParentColor">0</property>
      <property name="Top">102</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="sTiempoMuerto" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">395</property>
      <property name="Name">sTiempoMuerto</property>
      <property name="ParentColor">0</property>
      <property name="Top">102</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="sTiempoMuertoReal" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">169</property>
      <property name="Name">sTiempoMuertoReal</property>
      <property name="ParentColor">0</property>
      <property name="Top">126</property>
      <property name="Width">72</property>
    </object>
    <object class="Edit" name="sTiempo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">395</property>
      <property name="Name">sTiempo</property>
      <property name="ParentColor">0</property>
      <property name="Top">126</property>
      <property name="Width">121</property>
    </object>
    <object class="Edit" name="sTransporte" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">625</property>
      <property name="Name">sTransporte</property>
      <property name="ParentColor">0</property>
      <property name="Top">128</property>
      <property name="Width">121</property>
    </object>
    <object class="Edit" name="sFinalPlatica" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">257</property>
      <property name="Name">sFinalPlatica</property>
      <property name="ParentColor">0</property>
      <property name="Top">149</property>
      <property name="Width">72</property>
      <property name="jsOnBlur">sFinalPlaticaJSBlur</property>
    </object>
    <object class="Edit" name="sTema" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">378</property>
      <property name="Name">sTema</property>
      <property name="ParentColor">0</property>
      <property name="Top">150</property>
      <property name="Width">368</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Fecha del Reporte:</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Turno/Origen</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="Top">32</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Numero de Folio</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Inicio Jornada</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">85</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption"><![CDATA[Termino&amp;nbsp;Jornada]]></property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">243</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="Top">84</property>
      <property name="Width">150</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Tiempo Efectivo</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">108</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Tiempo Muerto del Contrato</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">5</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="Top">132</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Estado del Tiempo</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">253</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="Top">132</property>
      <property name="Width">140</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Transporte</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">525</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="Top">132</property>
      <property name="Width">92</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Platicas de Seguridad</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">5</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="Top">154</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Tiempo Muerto de Orden</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">243</property>
      <property name="Name">Label12</property>
      <property name="ParentColor">0</property>
      <property name="Top">108</property>
      <property name="Width">150</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agRight</property>
      <property name="Caption">A</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">243</property>
      <property name="Name">Label13</property>
      <property name="ParentColor">0</property>
      <property name="Top">154</property>
      <property name="Width">10</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Tema</property>
      <property name="Color">#D7D7D7</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">333</property>
      <property name="Name">Label14</property>
      <property name="ParentColor">0</property>
      <property name="Top">154</property>
      <property name="Width">36</property>
    </object>
    <object class="Edit" name="sInicioPlatica" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">169</property>
      <property name="Name">sInicioPlatica</property>
      <property name="ParentColor">0</property>
      <property name="Top">149</property>
      <property name="Width">72</property>
      <property name="jsOnBlur">sInicioPlaticaJSBlur</property>
      <property name="jsOnKeyDown">sInicioPlaticaJSKeyDown</property>
    </object>
  </object>
  <object class="ComboBox" name="sNumeroOrden" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">204</property>
    <property name="Name">sNumeroOrden</property>
    <property name="ParentColor">0</property>
    <property name="Top">2</property>
    <property name="Width">185</property>
    <property name="OnChange">sNumeroOrdenChange</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Numero de Orden</property>
    <property name="Color">#D7D7D7</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label15</property>
    <property name="ParentColor">0</property>
    <property name="Top">4</property>
    <property name="Width">160</property>
  </object>
  <object class="HiddenField" name="hsContrato" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsContrato</property>
    <property name="Top">39</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsNumeroOrden" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsNumeroOrden</property>
    <property name="Top">56</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsIdTurno" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsIdTurno</property>
    <property name="Top">72</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsNumeroReporte" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsNumeroReporte</property>
    <property name="Top">88</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsIdConvenio" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsIdConvenio</property>
    <property name="Top">104</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hdIdFecha" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hdIdFecha</property>
    <property name="Top">120</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hlStatus" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hlStatus</property>
    <property name="Top">136</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsNumeroNuevoReporte" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsNumeroNuevoReporte</property>
    <property name="Top">152</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsdNuevaFecha" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hsdNuevaFecha</property>
    <property name="Top">171</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hOperacion" >
    <property name="Height">18</property>
    <property name="Left">640</property>
    <property name="Name">hOperacion</property>
    <property name="Top">190</property>
    <property name="Width">200</property>
  </object>
  <object class="ComboBox" name="sFormato" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
    <property name="Left">870</property>
    <property name="Name">sFormato</property>
    <property name="Top">2</property>
    <property name="Width">86</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Formato:</property>
    <property name="Color">#D7D7D7</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">819</property>
    <property name="Name">Label16</property>
    <property name="ParentColor">0</property>
    <property name="Top">5</property>
    <property name="Width">45</property>
  </object>
  <object class="Datasource" name="dsRd" >
        <property name="Left">384</property>
        <property name="Top">64</property>
    <property name="DataSet">qryRd</property>
    <property name="Name">dsRd</property>
  </object>
  <object class="Query" name="qryRd" >
        <property name="Left">304</property>
        <property name="Top">64</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryRd</property>
    <property name="Order">desc</property>
    <property name="OrderField">reportediario.dIdFecha</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:26:{i:0;s:6:&quot;SELECT&quot;;i:1;s:25:&quot; reportediario.sContrato,&quot;;i:2;s:27:&quot; reportediario.sIdConvenio,&quot;;i:3;s:36:&quot; convenios.sDescripcion as Convenio,&quot;;i:4;s:24:&quot; reportediario.dIdFecha,&quot;;i:5;s:28:&quot; reportediario.sNumeroOrden,&quot;;i:6;s:24:&quot; reportediario.sIdTurno,&quot;;i:7;s:30:&quot; turnos.sDescripcion as turno,&quot;;i:8;s:30:&quot; reportediario.sNumeroReporte,&quot;;i:9;s:23:&quot; reportediario.lStatus,&quot;;i:10;s:26:&quot; reportediario.sIdUsuario,&quot;;i:11;s:34:&quot; reportediario.sIdUsuarioAutoriza,&quot;;i:12;s:29:&quot;reportediario.sInicioPlatica,&quot;;i:13;s:28:&quot;reportediario.sFinalPlatica,&quot;;i:14;s:31:&quot;reportediario.sOperacionInicio,&quot;;i:15;s:30:&quot;reportediario.sOperacionFinal,&quot;;i:16;s:30:&quot;reportediario.sTiempoEfectivo,&quot;;i:17;s:28:&quot;reportediario.sTiempoMuerto,&quot;;i:18;s:32:&quot;reportediario.sTiempoMuertoReal,&quot;;i:19;s:22:&quot;reportediario.sTiempo,&quot;;i:20;s:26:&quot;reportediario.sTransporte,&quot;;i:21;s:29:&quot;reportediario.sInicioPlatica,&quot;;i:22;s:28:&quot;reportediario.sFinalPlatica,&quot;;i:23;s:19:&quot;reportediario.sTema&quot;;i:24;s:140:&quot;FROM reportediario inner join convenios on (reportediario.sContrato=convenios.sContrato and reportediario.sIdConvenio=convenios.sIdConvenio)&quot;;i:25;s:106:&quot;inner join turnos on (reportediario.sContrato=turnos.sContrato and turnos.sIdTurno=reportediario.sIdTurno)&quot;;}]]></property>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">454</property>
        <property name="Top">63</property>
    <property name="Connected"></property>
    <property name="DatabaseName">intelcode</property>
    <property name="Host">127.0.0.1</property>
    <property name="Name">Database1</property>
    <property name="UserName">inteligent</property>
    <property name="UserPassword">danae</property>
  </object>
</object>
?>
