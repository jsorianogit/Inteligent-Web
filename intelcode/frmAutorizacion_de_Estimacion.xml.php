<?php
<object class="frmAutorizacionEstimacion" name="frmAutorizacionEstimacion" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Autorizacion de Estimacion</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">484</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmAutorizacionEstimacion</property>
  <property name="UseAjax">1</property>
  <property name="Width">952</property>
  <property name="OnBeforeShow">frmAutorizacionEstimacionBeforeShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">34</property>
    <property name="Left">88</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">720</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Editar Estimacion</property>
    <property name="ImageSource">ppfinder.ico</property>
    <property name="Left">349</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">44</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
    <property name="jsOnMouseMove">cmdModificarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdModificarJSMouseOut</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">AUTORIZACION DE ESTIMACIONES</property>
    <property name="Color">#AE9FA9</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">88</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">21</property>
    <property name="Width">720</property>
  </object>
  <object class="Button" name="cmdEstimacionVacia" >
    <property name="Caption">cmdEstimacionVacia</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Generar Estimacion Vacia</property>
    <property name="ImageSource">Document_1.ico</property>
    <property name="Left">125</property>
    <property name="Name">cmdEstimacionVacia</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">43</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdEstimacionVaciaJSClick</property>
    <property name="jsOnMouseMove">cmdEstimacionVaciaJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEstimacionVaciaJSMouseOut</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Eliminar Estimacion</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">259</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">43</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
    <property name="jsOnMouseMove">cmdEliminarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEliminarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdEstimacionxGen" >
    <property name="Caption">cmdEstimacionxGen</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Generar Estimacion Segun Generadores de Obra</property>
    <property name="ImageSource">app_kexi.ico</property>
    <property name="Left">169</property>
    <property name="Name">cmdEstimacionxGen</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">42</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdEstimacionxGenClick</property>
    <property name="jsOnClick">cmdEstimacionxGenJSClick</property>
    <property name="jsOnMouseMove">cmdEstimacionxGenJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEstimacionxGenJSMouseOut</property>
  </object>
  <object class="Button" name="cmdActualizaAcum" >
    <property name="Caption">cmdActualizaAcum</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Actualiza Acumulados Anteriores a la Estimacion</property>
    <property name="ImageSource">Rename_1.ico</property>
    <property name="Left">217</property>
    <property name="Name">cmdActualizaAcum</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">43</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdActualizaAcumJSClick</property>
    <property name="jsOnMouseMove">cmdActualizaAcumJSMouseMove</property>
    <property name="jsOnMouseOut">cmdActualizaAcumJSMouseOut</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Imprimir Estimacion</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">393</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">43</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="DBGrid" name="GridEstimaciones" >
    <property name="Columns"><![CDATA[a:12:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;10&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Estimacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;iNumeroEstimacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:18:&quot;Tipo de Estimacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Autoriza?&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;lEstimado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;F_Inicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dFechaInicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;F_Final&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dFechaFinal&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;$GeneradoMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:19:&quot;dMontoMNGeneradores&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;$GeneradoDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:20:&quot;dMontoDLLGeneradores&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;EstimadoMN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dMontoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;EstimadoDLL&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dMontoDLL&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Retencion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;dRetencionMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;NumOrden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">SourPozo</property>
    <property name="Height">269</property>
    <property name="Left">88</property>
    <property name="Name">GridEstimaciones</property>
    <property name="Top">80</property>
    <property name="Width">720</property>
    <property name="jsOnClick">GridEstimacionesJSClick</property>
  </object>
  <object class="HiddenField" name="HiConsecutivo" >
    <property name="Height">18</property>
    <property name="Left">828</property>
    <property name="Name">HiConsecutivo</property>
    <property name="Top">315</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">828</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">291</property>
    <property name="Width">108</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">60</property>
    <property name="Left">87</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">352</property>
    <property name="Width">721</property>
  </object>
  <object class="Button" name="cmdEliminarConceptos" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Elimina Conceptos en Cero</property>
    <property name="ImageSource">kword.ico</property>
    <property name="Left">302</property>
    <property name="Name">cmdEliminarConceptos</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">44</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdEliminarConceptosJSClick</property>
    <property name="jsOnMouseMove">cmdEliminarConceptosJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEliminarConceptosJSMouseOut</property>
  </object>
  <object class="Button" name="cdmDatos" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Datos de Cabecera de la Estimacion</property>
    <property name="ImageSource">Symbol-Help_1.ico</property>
    <property name="Left">440</property>
    <property name="Name">cdmDatos</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">43</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cdmDatosJSClick</property>
    <property name="jsOnMouseMove">cdmDatosJSMouseMove</property>
    <property name="jsOnMouseOut">cdmDatosJSMouseOut</property>
  </object>
  <object class="HiddenField" name="HiImprime" >
    <property name="Height">18</property>
    <property name="Left">828</property>
    <property name="Name">HiImprime</property>
    <property name="Top">337</property>
    <property name="Value">no</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="HiPaquete" >
    <property name="Height">18</property>
    <property name="Left">828</property>
    <property name="Name">HiPaquete</property>
    <property name="Top">360</property>
    <property name="Value">0</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="HiEstimacion" >
    <property name="Height">18</property>
    <property name="Left">828</property>
    <property name="Name">HiEstimacion</property>
    <property name="Top">384</property>
    <property name="Width">108</property>
  </object>
  <object class="Panel" name="Panel_Datos" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">Panel_Datos</property>
    <property name="Color">#FFFFFF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">350</property>
    <property name="Left">206</property>
    <property name="Name">Panel_Datos</property>
    <property name="ParentColor">0</property>
    <property name="Top">78</property>
    <property name="Width">562</property>
    <object class="Label" name="Label2" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">DATOS GENERALES DE LA ESTIMACION</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">ARIAL</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">17</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">562</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Elemento PEP</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label3</property>
      <property name="Top">29</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Fondo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label4</property>
      <property name="Top">49</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Posicion Finaciera</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label5</property>
      <property name="Top">69</property>
      <property name="Width">100</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Cuenta de Mayor</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label6</property>
      <property name="Top">90</property>
      <property name="Width">100</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Centro Gestor</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label7</property>
      <property name="Top">110</property>
      <property name="Width">88</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Centro Costo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label8</property>
      <property name="Top">131</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Centro Beneficio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label9</property>
      <property name="Top">150</property>
      <property name="Width">100</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">Proyecto</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label10</property>
      <property name="Top">170</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption">Comentario</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label11</property>
      <property name="Top">190</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Monto del Contrato</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label12</property>
      <property name="Top">243</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Programado</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label13</property>
      <property name="Top">284</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Real</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">5</property>
      <property name="Name">Label14</property>
      <property name="Top">303</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">% Avance Fisico</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">74</property>
      <property name="Name">Label16</property>
      <property name="Top">267</property>
      <property name="Width">92</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">% Avance Financiero</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">176</property>
      <property name="Name">Label17</property>
      <property name="Top">267</property>
      <property name="Width">116</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Alignment">agRight</property>
      <property name="Caption">$Retencion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">291</property>
      <property name="Name">Label18</property>
      <property name="Top">320</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">Programa de Erogaciones MN</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">301</property>
      <property name="Name">Label19</property>
      <property name="Top">266</property>
      <property name="Width">164</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Mensual</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">291</property>
      <property name="Name">Label20</property>
      <property name="Top">285</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Acumulado</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">291</property>
      <property name="Name">Label21</property>
      <property name="Top">303</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Caption">F. I. Contrato</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">237</property>
      <property name="Name">Label22</property>
      <property name="Top">241</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">F. F. Contrato</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">391</property>
      <property name="Name">Label23</property>
      <property name="Top">243</property>
      <property name="Width">91</property>
    </object>
    <object class="Edit" name="txtPEP" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtPEP</property>
      <property name="ParentColor">0</property>
      <property name="Top">26</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtPEPJSBlur</property>
      <property name="jsOnFocus">txtPEPJSFocus</property>
      <property name="jsOnKeyPress">txtPEPJSKeyPress</property>
    </object>
    <object class="Edit" name="txtFondo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtFondo</property>
      <property name="ParentColor">0</property>
      <property name="Top">46</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtFondoJSBlur</property>
      <property name="jsOnFocus">txtFondoJSFocus</property>
      <property name="jsOnKeyPress">txtFondoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtPFinaciera" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtPFinaciera</property>
      <property name="ParentColor">0</property>
      <property name="Top">66</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtPFinacieraJSBlur</property>
      <property name="jsOnFocus">txtPFinacieraJSFocus</property>
      <property name="jsOnKeyPress">txtPFinacieraJSKeyPress</property>
    </object>
    <object class="Edit" name="txtMayor" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtMayor</property>
      <property name="ParentColor">0</property>
      <property name="Top">86</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtMayorJSBlur</property>
      <property name="jsOnFocus">txtMayorJSFocus</property>
      <property name="jsOnKeyPress">txtMayorJSKeyPress</property>
    </object>
    <object class="Edit" name="txtGestor" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtGestor</property>
      <property name="ParentColor">0</property>
      <property name="Top">106</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtGestorJSBlur</property>
      <property name="jsOnFocus">txtGestorJSFocus</property>
      <property name="jsOnKeyPress">txtGestorJSKeyPress</property>
    </object>
    <object class="Edit" name="txtCosto" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtCosto</property>
      <property name="ParentColor">0</property>
      <property name="Top">126</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtCostoJSBlur</property>
      <property name="jsOnFocus">txtCostoJSFocus</property>
      <property name="jsOnKeyPress">txtCostoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtBeneficio" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtBeneficio</property>
      <property name="ParentColor">0</property>
      <property name="Top">146</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtBeneficioJSBlur</property>
      <property name="jsOnFocus">txtBeneficioJSFocus</property>
      <property name="jsOnKeyPress">txtBeneficioJSKeyPress</property>
    </object>
    <object class="Edit" name="txtProyecto" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">114</property>
      <property name="Name">txtProyecto</property>
      <property name="ParentColor">0</property>
      <property name="Top">166</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">txtProyectoJSBlur</property>
      <property name="jsOnFocus">txtProyectoJSFocus</property>
      <property name="jsOnKeyPress">txtProyectoJSKeyPress</property>
    </object>
    <object class="Memo" name="memoComenta" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">114</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoComenta</property>
      <property name="ParentColor">0</property>
      <property name="Top">186</property>
      <property name="Width">428</property>
      <property name="jsOnBlur">memoComentaJSBlur</property>
      <property name="jsOnFocus">memoComentaJSFocus</property>
      <property name="jsOnKeyPress">memoComentaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtMonto" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">115</property>
      <property name="Name">txtMonto</property>
      <property name="ParentColor">0</property>
      <property name="Top">238</property>
      <property name="Width">119</property>
      <property name="jsOnBlur">txtMontoJSBlur</property>
      <property name="jsOnFocus">txtMontoJSFocus</property>
      <property name="jsOnKeyPress">txtMontoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtFisicoProg" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">85</property>
      <property name="Name">txtFisicoProg</property>
      <property name="ParentColor">0</property>
      <property name="Top">282</property>
      <property name="Width">80</property>
      <property name="jsOnBlur">txtFisicoProgJSBlur</property>
      <property name="jsOnFocus">txtFisicoProgJSFocus</property>
      <property name="jsOnKeyPress">txtFisicoProgJSKeyPress</property>
    </object>
    <object class="Edit" name="txtFisicoReal" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">85</property>
      <property name="Name">txtFisicoReal</property>
      <property name="ParentColor">0</property>
      <property name="Top">302</property>
      <property name="Width">80</property>
      <property name="jsOnBlur">txtFisicoRealJSBlur</property>
      <property name="jsOnFocus">txtFisicoRealJSFocus</property>
      <property name="jsOnKeyPress">txtFisicoRealJSKeyPress</property>
    </object>
    <object class="Edit" name="txtFinanzProg" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">191</property>
      <property name="Name">txtFinanzProg</property>
      <property name="ParentColor">0</property>
      <property name="Top">282</property>
      <property name="Width">88</property>
      <property name="jsOnBlur">txtFinanzProgJSBlur</property>
      <property name="jsOnFocus">txtFinanzProgJSFocus</property>
      <property name="jsOnKeyPress">txtFinanzProgJSKeyPress</property>
    </object>
    <object class="Edit" name="txtFinanzReal" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">191</property>
      <property name="Name">txtFinanzReal</property>
      <property name="ParentColor">0</property>
      <property name="Top">302</property>
      <property name="Width">88</property>
      <property name="jsOnBlur">txtFinanzRealJSBlur</property>
      <property name="jsOnFocus">txtFinanzRealJSFocus</property>
      <property name="jsOnKeyPress">txtFinanzRealJSKeyPress</property>
    </object>
    <object class="Edit" name="txtMensual" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">363</property>
      <property name="Name">txtMensual</property>
      <property name="ParentColor">0</property>
      <property name="Top">281</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">txtMensualJSBlur</property>
      <property name="jsOnFocus">txtMensualJSFocus</property>
      <property name="jsOnKeyPress">txtMensualJSKeyPress</property>
    </object>
    <object class="Edit" name="txtAcumulado" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">363</property>
      <property name="Name">txtAcumulado</property>
      <property name="ParentColor">0</property>
      <property name="Top">301</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">txtAcumuladoJSBlur</property>
      <property name="jsOnFocus">txtAcumuladoJSFocus</property>
      <property name="jsOnKeyPress">txtAcumuladoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtRetencion" >
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">363</property>
      <property name="Name">txtRetencion</property>
      <property name="ParentColor">0</property>
      <property name="Top">321</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">txtRetencionJSBlur</property>
      <property name="jsOnFocus">txtRetencionJSFocus</property>
      <property name="jsOnKeyPress">txtRetencionJSKeyPress</property>
    </object>
    <object class="Button" name="cmdActualizar" >
      <property name="Caption">Actualizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Actualizar Informacion del Contrato</property>
      <property name="ImageSource">Symbol-Check.ico</property>
      <property name="Left">487</property>
      <property name="Name">cmdActualizar</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">298</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdActualizarJSClick</property>
      <property name="jsOnMouseMove">cmdActualizarJSMouseMove</property>
      <property name="jsOnMouseOut">cmdActualizarJSMouseOut</property>
    </object>
    <object class="DateTimePicker" name="F_Inicio" >
      <property name="Caption">F_Inicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">314</property>
      <property name="Name">F_Inicio</property>
      <property name="Top">238</property>
      <property name="Width">75</property>
    </object>
    <object class="DateTimePicker" name="F_Final" >
      <property name="Caption">F_Final</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">362</property>
      <property name="Name">F_Final</property>
      <property name="Top">239</property>
      <property name="Width">72</property>
    </object>
    <object class="Button" name="cmdCerrar" >
      <property name="Caption">X</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Hint">Cerrar</property>
      <property name="Left">487</property>
      <property name="Name">cmdCerrar</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">2</property>
      <property name="Width">16</property>
      <property name="jsOnClick">cmdCerrarJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel_Editar" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">344</property>
    <property name="Left">132</property>
    <property name="Name">Panel_Editar</property>
    <property name="Top">96</property>
    <property name="Width">660</property>
    <object class="Label" name="Label24" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">HAGA CLICK EN REFRESCAR</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">205</property>
      <property name="Name">Label24</property>
      <property name="Top">149</property>
      <property name="Width">244</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">CONCEPTOS ESTIMADOS</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label15</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">660</property>
    </object>
    <object class="Button" name="cdmClose" >
      <property name="Caption">X</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Hint">Cerrar y Guardar Cambios</property>
      <property name="Left">585</property>
      <property name="Name">cdmClose</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Width">20</property>
      <property name="jsOnClick">cdmCloseJSClick</property>
    </object>
    <object class="DBGrid" name="GridEditar" >
      <property name="Columns"><![CDATA[a:14:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;*&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:1:&quot;p&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;30&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;WBS&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;sWbs&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Concepto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;sNumeroActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Cant. x Cont.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Cantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;UM&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;P.U.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dVentaMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Acum. Ant.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:18:&quot;dAcumuladoAnterior&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;$ Anterior&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:25:&quot;dMontoAcumuladoAnteriorMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:7:&quot;#6FB7FF&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Anterior&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;dAcumuladoActual&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Importe MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dMontoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Importe Acum.MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;dMontoAcumuladoMN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Tipo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sTipoActividad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
      <property name="DataSource">SourEditar</property>
      <property name="Height">314</property>
      <property name="Left">4</property>
      <property name="Name">GridEditar</property>
      <property name="Top">21</property>
      <property name="Width">652</property>
      <property name="jsOnClick">GridEditarJSClick</property>
    </object>
  </object>
  <object class="Button" name="cmdRefres" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Refrescar</property>
    <property name="ImageSource">Project6.ico</property>
    <property name="Left">491</property>
    <property name="Name">cmdRefres</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">43</property>
    <property name="Width">43</property>
    <property name="jsOnClick">cmdRefresJSClick</property>
    <property name="jsOnMouseMove">cmdRefresJSMouseMove</property>
    <property name="jsOnMouseOut">cmdRefresJSMouseOut</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">860</property>
        <property name="Top">16</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="SourPozo" >
        <property name="Left">844</property>
        <property name="Top">84</property>
    <property name="DataSet">QryPozo</property>
    <property name="Name">SourPozo</property>
  </object>
  <object class="Query" name="QryPozo" >
        <property name="Left">896</property>
        <property name="Top">81</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryPozo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="QryDatos" >
        <property name="Left">896</property>
        <property name="Top">144</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryDatos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="SourDatos" >
        <property name="Left">844</property>
        <property name="Top">144</property>
    <property name="DataSet">QryDatos</property>
    <property name="Name">SourDatos</property>
  </object>
  <object class="Datasource" name="SourEditar" >
        <property name="Left">843</property>
        <property name="Top">201</property>
    <property name="DataSet">QryEditar</property>
    <property name="Name">SourEditar</property>
  </object>
  <object class="Query" name="QryEditar" >
        <property name="Left">896</property>
        <property name="Top">200</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryEditar</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
