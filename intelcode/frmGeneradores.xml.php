<?php
<object class="FrmGeneradores" name="FrmGeneradores" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit2</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">533</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmGeneradores</property>
  <property name="UseAjax">1</property>
  <property name="Width">1197</property>
  <property name="OnBeforeShow">FrmGeneradoresBeforeShow</property>
  <property name="OnShow">FrmGeneradoresShow</property>
  <property name="jsOnLoad">FrmGeneradoresJSLoad</property>
  <object class="DBGrid" name="dbgGeneral" >
    <property name="Columns"><![CDATA[a:17:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;wbs&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:3:&quot;Wbs&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;partida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Partida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Cantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;isometrico&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Isometrico&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Isom&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Isom_Refer&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Instala&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Instalacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;O_Cambio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;O_Cambio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Total&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Total&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;WBS&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;WBS_1&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Cantidad_2&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Medida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Instalado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Instalado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Excedente&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Excedente&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:13;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Describir&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Descripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:14;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;N_Generador&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;N_Generador&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:15;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Estimado&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Estimado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:16;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;sPrefijo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sPrefijo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dtaGeneral</property>
    <property name="Height">147</property>
    <property name="Left">405</property>
    <property name="Name">dbgGeneral</property>
    <property name="Top">38</property>
    <property name="Width">307</property>
  </object>
  <object class="DBGrid" name="dbgGeneralComboAct" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dtaComboActividades</property>
    <property name="Height">32</property>
    <property name="Left">644</property>
    <property name="Name">dbgGeneralComboAct</property>
    <property name="Top">108</property>
    <property name="Width">52</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">277</property>
    <property name="Left">16</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">245</property>
    <property name="Width">824</property>
    <object class="Label" name="Label3" >
      <property name="Caption">Generador</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">20</property>
      <property name="Name">Label3</property>
      <property name="Top">30</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Estimacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">20</property>
      <property name="Name">Label4</property>
      <property name="Top">50</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">F.Inicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">20</property>
      <property name="Name">Label5</property>
      <property name="Top">71</property>
      <property name="Width">66</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">F.Final</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">20</property>
      <property name="Name">Label6</property>
      <property name="Top">92</property>
      <property name="Width">66</property>
    </object>
    <object class="Edit" name="txtsNumeroGenerador" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">91</property>
      <property name="Name">txtsNumeroGenerador</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Tag"></property>
      <property name="Top">27</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">txtsNumeroGeneradorJSBlur</property>
      <property name="jsOnFocus">txtsNumeroGeneradorJSFocus</property>
      <property name="jsOnKeyPress">txtsNumeroGeneradorJSKeyPress</property>
    </object>
    <object class="ComboBox" name="cboiNumeroEstimacion" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">91</property>
      <property name="Name">cboiNumeroEstimacion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Tag"></property>
      <property name="Top">50</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">cboiNumeroEstimacionJSBlur</property>
      <property name="jsOnFocus">cboiNumeroEstimacionJSFocus</property>
      <property name="jsOnKeyPress">cboiNumeroEstimacionJSKeyPress</property>
    </object>
    <object class="DateTimePicker" name="dateInicio" >
      <property name="Caption">dateInicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">91</property>
      <property name="Name">dateInicio</property>
      <property name="ParentFont">0</property>
      <property name="Top">72</property>
      <property name="Width">85</property>
    </object>
    <object class="DateTimePicker" name="dateFinal" >
      <property name="Caption">DateTimePicker1</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">9px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">91</property>
      <property name="Name">dateFinal</property>
      <property name="ParentFont">0</property>
      <property name="Top">91</property>
      <property name="Width">85</property>
    </object>
    <object class="Edit" name="Edit1" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">14</property>
      <property name="Left">352</property>
      <property name="Name">Edit1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">89</property>
      <property name="Width">12</property>
      <property name="jsOnChange">Edit1JSChange</property>
    </object>
    <object class="ListBox" name="listFases" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">74</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">200</property>
      <property name="MultiSelect">1</property>
      <property name="Name">listFases</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">39</property>
      <property name="Width">168</property>
      <property name="jsOnBlur">listFasesJSBlur</property>
      <property name="jsOnClick">listFasesJSClick</property>
      <property name="jsOnFocus">listFasesJSFocus</property>
      <property name="jsOnKeyPress">listFasesJSKeyPress</property>
      <property name="jsOnMouseMove">listFasesJSMouseMove</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">Detalles del Generador</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">3</property>
      <property name="Name">Label16</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">821</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">Comentarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">18</property>
      <property name="Name">Label17</property>
      <property name="Top">114</property>
      <property name="Width">75</property>
    </object>
    <object class="Memo" name="memoComentaGenerador" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">66</property>
      <property name="Left">19</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoComentaGenerador</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">135</property>
      <property name="Width">350</property>
      <property name="jsOnBlur">memoComentaGeneradorJSBlur</property>
      <property name="jsOnClick">memoComentaGeneradorJSClick</property>
      <property name="jsOnFocus">memoComentaGeneradorJSFocus</property>
      <property name="jsOnKeyPress">memoComentaGeneradorJSKeyPress</property>
    </object>
    <object class="Label" name="lblTituloFases" >
      <property name="Caption">Fases de Obra Afectadas</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">195</property>
      <property name="Name">lblTituloFases</property>
      <property name="Top">23</property>
      <property name="Width">152</property>
    </object>
    <object class="Label" name="lblRecomienda" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">111</property>
      <property name="Name">lblRecomienda</property>
      <property name="Top">117</property>
      <property name="Width">262</property>
    </object>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="Background">#FFFFFF</property>
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">289</property>
    <property name="Left">16</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">244</property>
    <property name="Width">824</property>
    <object class="DBGrid" name="dbgPartidasEstimacion" >
      <property name="Columns"><![CDATA[a:8:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;Wbs&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Partida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Isometrico&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Prefijo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Isometrico Ref.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Instalacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Total&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">dtaEstimaxPartida</property>
      <property name="Height">107</property>
      <property name="Left">7</property>
      <property name="Name">dbgPartidasEstimacion</property>
      <property name="Top">178</property>
      <property name="Width">746</property>
      <property name="jsOnClick">dbgPartidasEstimacionJSClick</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Partidas del Generador</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">1</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">823</property>
    </object>
    <object class="CheckBox" name="lEstima" >
      <property name="Caption">Estima?</property>
      <property name="Checked">1</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">221</property>
      <property name="Name">lEstima</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">73</property>
    </object>
    <object class="ComboBox" name="cbosNumeroActividad" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">84</property>
      <property name="Name">cbosNumeroActividad</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">16</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">cbosNumeroActividadJSBlur</property>
      <property name="jsOnChange">cbosNumeroActividadJSChange</property>
      <property name="jsOnFocus">cbosNumeroActividadJSFocus</property>
      <property name="jsOnKeyPress">cbosNumeroActividadJSKeyPress</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Concep/Partid</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label7</property>
      <property name="Top">21</property>
      <property name="Width">77</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cantidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label8</property>
      <property name="Top">42</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="txtdCantidadPartida" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">84</property>
      <property name="Name">txtdCantidadPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">37</property>
      <property name="Width">125</property>
      <property name="jsOnBlur">txtdCantidadPartidaJSBlur</property>
      <property name="jsOnFocus">txtdCantidadPartidaJSFocus</property>
      <property name="jsOnKeyPress">txtdCantidadPartidaJSKeyPress</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Isometrico</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">14</property>
      <property name="Name">Label1</property>
      <property name="Top">63</property>
      <property name="Width">68</property>
    </object>
    <object class="Edit" name="txtsIsometrico" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">84</property>
      <property name="Name">txtsIsometrico</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">58</property>
      <property name="Width">125</property>
      <property name="jsOnBlur">txtsIsometricoJSBlur</property>
      <property name="jsOnFocus">txtsIsometricoJSFocus</property>
      <property name="jsOnKeyPress">txtsIsometricoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtsPrefijo" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">224</property>
      <property name="Name">txtsPrefijo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">58</property>
      <property name="Width">58</property>
      <property name="jsOnBlur">txtsPrefijoJSBlur</property>
      <property name="jsOnFocus">txtsPrefijoJSFocus</property>
      <property name="jsOnKeyPress">txtsPrefijoJSKeyPress</property>
    </object>
    <object class="ComboBox" name="cbosInstalacionAfectada" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">123</property>
      <property name="Name">cbosInstalacionAfectada</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">79</property>
      <property name="Width">159</property>
      <property name="jsOnBlur">cbosInstalacionAfectadaJSBlur</property>
      <property name="jsOnFocus">cbosInstalacionAfectadaJSFocus</property>
      <property name="jsOnKeyPress">cbosInstalacionAfectadaJSKeyPress</property>
    </object>
    <object class="ComboBox" name="cbosOrdenCambio" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">123</property>
      <property name="Name">cbosOrdenCambio</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">99</property>
      <property name="Width">160</property>
      <property name="jsOnBlur">cbosOrdenCambioJSBlur</property>
      <property name="jsOnFocus">cbosOrdenCambioJSFocus</property>
      <property name="jsOnKeyPress">cbosOrdenCambioJSKeyPress</property>
    </object>
    <object class="ComboBox" name="cbosIsomtricoReferencia" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">123</property>
      <property name="Name">cbosIsomtricoReferencia</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">119</property>
      <property name="Width">160</property>
      <property name="jsOnBlur">cbosIsomtricoReferenciaJSBlur</property>
      <property name="jsOnFocus">cbosIsomtricoReferenciaJSFocus</property>
      <property name="jsOnKeyPress">cbosIsomtricoReferenciaJSKeyPress</property>
    </object>
    <object class="Memo" name="memoComentarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">33</property>
      <property name="Left">123</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoComentarios</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">140</property>
      <property name="Width">630</property>
      <property name="jsOnBlur">memoComentariosJSBlur</property>
      <property name="jsOnFocus">memoComentariosJSFocus</property>
      <property name="jsOnKeyPress">memoComentariosJSKeyPress</property>
    </object>
    <object class="DBGrid" name="dbgPartidas" >
      <property name="Columns"><![CDATA[a:7:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">dtaActividadesxOrd</property>
      <property name="Height">102</property>
      <property name="Left">294</property>
      <property name="Name">dbgPartidas</property>
      <property name="Top">34</property>
      <property name="Width">459</property>
      <property name="jsOnClick">dbgPartidasJSClick</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption"><![CDATA[&amp;nbsp; &lt;&lt; Seleccione un Paquete&gt;&gt;]]></property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Color">#000000</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">294</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">18</property>
      <property name="Width">459</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Instalacion Afectada</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">3</property>
      <property name="Name">Label12</property>
      <property name="Top">83</property>
      <property name="Width">120</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Orden de Cambio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">13</property>
      <property name="Name">Label13</property>
      <property name="Top">103</property>
      <property name="Width">107</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Isom. de Referencia</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">3</property>
      <property name="Name">Label14</property>
      <property name="Top">123</property>
      <property name="Width">117</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">28</property>
      <property name="Name">Label15</property>
      <property name="Top">143</property>
      <property name="Width">93</property>
    </object>
    <object class="HiddenField" name="HiCantidad" >
      <property name="Height">18</property>
      <property name="Left">545</property>
      <property name="Name">HiCantidad</property>
      <property name="Top">228</property>
      <property name="Value">0</property>
      <property name="Width">96</property>
    </object>
    <object class="Button" name="cmdAgregaPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Agregar</property>
      <property name="ImageSource">Symbol-Add.ico</property>
      <property name="Left">749</property>
      <property name="Name">cmdAgregaPartida</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">14</property>
      <property name="Width">39</property>
      <property name="jsOnClick">cmdAgregaPartidaJSClick</property>
      <property name="jsOnMouseMove">cmdAgregaPartidaJSMouseMove</property>
      <property name="jsOnMouseOut">cmdAgregaPartidaJSMouseOut</property>
    </object>
    <object class="Button" name="cmdModificaPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Modificar</property>
      <property name="ImageSource">Edit.ico</property>
      <property name="Left">749</property>
      <property name="Name">cmdModificaPartida</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">39</property>
      <property name="Width">39</property>
      <property name="jsOnClick">cmdModificaPartidaJSClick</property>
      <property name="jsOnMouseMove">cmdModificaPartidaJSMouseMove</property>
      <property name="jsOnMouseOut">cmdModificaPartidaJSMouseOut</property>
    </object>
    <object class="Button" name="cmdEliminaPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Eliminar</property>
      <property name="ImageSource">Symbol-Delete.ico</property>
      <property name="Left">749</property>
      <property name="Name">cmdEliminaPartida</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">67</property>
      <property name="Width">39</property>
      <property name="OnClick">cmdEliminaPartidaClick</property>
      <property name="jsOnClick">cmdEliminaPartidaJSClick</property>
      <property name="jsOnMouseMove">cmdEliminaPartidaJSMouseMove</property>
      <property name="jsOnMouseOut">cmdEliminaPartidaJSMouseOut</property>
    </object>
    <object class="Button" name="cmdAceptaDatosPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Aceptar</property>
      <property name="ImageSource">Symbol-Check.ico</property>
      <property name="Left">749</property>
      <property name="Name">cmdAceptaDatosPartida</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">94</property>
      <property name="Width">40</property>
      <property name="OnClick">cmdAceptaDatosPartidaClick</property>
      <property name="jsOnClick">cmdAceptaDatosPartidaJSClick</property>
      <property name="jsOnMouseMove">cmdAceptaDatosPartidaJSMouseMove</property>
      <property name="jsOnMouseOut">cmdAceptaDatosPartidaJSMouseOut</property>
    </object>
    <object class="Button" name="cmdCancelaPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Cancelar</property>
      <property name="ImageSource">Undo.ico</property>
      <property name="Left">749</property>
      <property name="Name">cmdCancelaPartida</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">119</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdCancelaPartidaJSClick</property>
      <property name="jsOnMouseMove">cmdCancelaPartidaJSMouseMove</property>
      <property name="jsOnMouseOut">cmdCancelaPartidaJSMouseOut</property>
    </object>
  </object>
  <object class="Edit" name="txtEstimado" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">553</property>
    <property name="Name">txtEstimado</property>
    <property name="Top">10</property>
    <property name="Width">16</property>
  </object>
  <object class="Edit" name="txtGenerAnterior" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">532</property>
    <property name="Name">txtGenerAnterior</property>
    <property name="Top">9</property>
    <property name="Width">16</property>
  </object>
  <object class="Edit" name="txtValorAntes" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">508</property>
    <property name="Name">txtValorAntes</property>
    <property name="Top">9</property>
    <property name="Width">20</property>
  </object>
  <object class="Edit" name="txtQueOpcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">480</property>
    <property name="Name">txtQueOpcion</property>
    <property name="Top">9</property>
    <property name="Width">24</property>
  </object>
  <object class="Edit" name="txtsNumActPartidas" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">460</property>
    <property name="Name">txtsNumActPartidas</property>
    <property name="Top">9</property>
    <property name="Width">16</property>
  </object>
  <object class="Edit" name="txtsWbsPartida" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">440</property>
    <property name="Name">txtsWbsPartida</property>
    <property name="Top">9</property>
    <property name="Width">16</property>
  </object>
  <object class="Edit" name="txtNumeroConsecutivo" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">425</property>
    <property name="Name">txtNumeroConsecutivo</property>
    <property name="Top">9</property>
    <property name="Width">11</property>
  </object>
  <object class="Panel" name="Panel5" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">202</property>
    <property name="Left">16</property>
    <property name="Name">Panel5</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">10</property>
    <property name="Width">825</property>
    <object class="Edit" name="txtFechasBitacoras" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">8</property>
      <property name="Left">397</property>
      <property name="Name">txtFechasBitacoras</property>
      <property name="Width">12</property>
    </object>
    <object class="Edit" name="txtSemanas" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">8</property>
      <property name="Left">565</property>
      <property name="Name">txtSemanas</property>
      <property name="Width">16</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption"><![CDATA[Generadores de Obra&amp;nbsp;]]></property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">824</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">Numero de Orden</property>
      <property name="Color">#AE9FA9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">55</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="Top">24</property>
      <property name="Width">125</property>
    </object>
    <object class="ComboBox" name="cbosNumeroOrden" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">186</property>
      <property name="Name">cbosNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">22</property>
      <property name="Width">172</property>
      <property name="OnChange">cbosNumeroOrdenChange</property>
      <property name="jsOnBlur">cbosNumeroOrdenJSBlur</property>
      <property name="jsOnChange">cbosNumeroOrdenJSChange</property>
      <property name="jsOnFocus">cbosNumeroOrdenJSFocus</property>
      <property name="jsOnKeyPress">cbosNumeroOrdenJSKeyPress</property>
    </object>
    <object class="Button" name="cmdCImportes" >
      <property name="Caption">Sem. c/Importes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">491</property>
      <property name="Name">cmdCImportes</property>
      <property name="Top">176</property>
      <property name="Width">102</property>
      <property name="jsOnClick">cmdCImportesJSClick</property>
    </object>
    <object class="Button" name="cmdGenrador" >
      <property name="Caption">Generador</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">300</property>
      <property name="Name">cmdGenrador</property>
      <property name="Top">176</property>
      <property name="Width">85</property>
      <property name="jsOnClick">cmdGenradorJSClick</property>
    </object>
    <object class="Button" name="cmdNumGenrador" >
      <property name="Caption">No. Generadores</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">387</property>
      <property name="Name">cmdNumGenrador</property>
      <property name="Top">176</property>
      <property name="Width">102</property>
      <property name="jsOnClick">cmdNumGenradorJSClick</property>
    </object>
    <object class="Button" name="cmdSImportes" >
      <property name="Caption">Sem. s/Importes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">595</property>
      <property name="Name">cmdSImportes</property>
      <property name="Top">176</property>
      <property name="Width">102</property>
      <property name="jsOnClick">cmdSImportesJSClick</property>
    </object>
    <object class="Button" name="cmdListaVer" >
      <property name="Caption">Lista de Verificacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">699</property>
      <property name="Name">cmdListaVer</property>
      <property name="Top">176</property>
      <property name="Width">118</property>
      <property name="jsOnClick">cmdListaVerJSClick</property>
    </object>
  </object>
  <object class="DBGrid" name="dbgGeneradores" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dsEstimaciones</property>
    <property name="Height">128</property>
    <property name="Left">72</property>
    <property name="Name">dbgGeneradores</property>
    <property name="Top">55</property>
    <property name="Width">760</property>
    <property name="jsOnClick">dbgGeneradoresJSClick</property>
  </object>
  <object class="Panel" name="Panel3" >
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
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">216</property>
    <property name="Width">823</property>
    <object class="Button" name="cmdInformacion" >
      <property name="Caption">Informacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">9</property>
      <property name="Name">cmdInformacion</property>
      <property name="Top">1</property>
      <property name="Width">108</property>
      <property name="jsOnClick">cmdInformacionJSClick</property>
    </object>
    <object class="Button" name="cmdPartidas" >
      <property name="Caption">Partidas del Generador</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">123</property>
      <property name="Name">cmdPartidas</property>
      <property name="Top">1</property>
      <property name="Width">144</property>
      <property name="jsOnClick">cmdPartidasJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hdfRecomienda" >
    <property name="Height">18</property>
    <property name="Left">80</property>
    <property name="Name">hdfRecomienda</property>
    <property name="Top">448</property>
    <property name="Value">1</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hdfRangoEstimacion" >
    <property name="Height">18</property>
    <property name="Left">196</property>
    <property name="Name">hdfRangoEstimacion</property>
    <property name="Top">448</property>
    <property name="Width">128</property>
  </object>
  <object class="HiddenField" name="hdfPartidas" >
    <property name="Height">18</property>
    <property name="Left">332</property>
    <property name="Name">hdfPartidas</property>
    <property name="Top">448</property>
    <property name="Value">no</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hdfRefrsPartida" >
    <property name="Height">18</property>
    <property name="Left">442</property>
    <property name="Name">hdfRefrsPartida</property>
    <property name="Top">448</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="HidGenAntes" >
    <property name="Height">18</property>
    <property name="Left">559</property>
    <property name="Name">HidGenAntes</property>
    <property name="Top">448</property>
    <property name="Width">97</property>
  </object>
  <object class="HiddenField" name="HDPartida" >
    <property name="Height">16</property>
    <property name="Left">80</property>
    <property name="Name">HDPartida</property>
    <property name="Top">468</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="HDCantidad" >
    <property name="Height">16</property>
    <property name="Left">332</property>
    <property name="Name">HDCantidad</property>
    <property name="Top">470</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="HDIsometrico" >
    <property name="Height">18</property>
    <property name="Left">443</property>
    <property name="Name">HDIsometrico</property>
    <property name="Top">470</property>
    <property name="Width">105</property>
  </object>
  <object class="HiddenField" name="HDWbs" >
    <property name="Height">18</property>
    <property name="Left">196</property>
    <property name="Name">HDWbs</property>
    <property name="Top">468</property>
    <property name="Width">128</property>
  </object>
  <object class="Button" name="cmdDeleteGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Eliminar</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">24</property>
    <property name="Name">cmdDeleteGenerador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">86</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdDeleteGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdDeleteGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdDeleteGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAcceptGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Aceptar</property>
    <property name="ImageSource">Symbol-Check.ico</property>
    <property name="Left">24</property>
    <property name="Name">cmdAcceptGenerador</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">115</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdAcceptGeneradorClick</property>
    <property name="jsOnClick">cmdAcceptGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdAcceptGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAcceptGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdCancelGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Cancelar</property>
    <property name="ImageSource">Undo.ico</property>
    <property name="Left">24</property>
    <property name="Name">cmdCancelGenerador</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">142</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdCancelGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdCancelGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdCancelGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdPrintGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Imprimir</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">24</property>
    <property name="Name">cmdPrintGenerador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">168</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdPrintGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdPrintGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdPrintGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdChangeGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Modificar</property>
    <property name="ImageSource">Edit.ico</property>
    <property name="Left">24</property>
    <property name="Name">cmdChangeGenerador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">58</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdChangeGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdChangeGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdChangeGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAddGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Agregar</property>
    <property name="ImageSource">Symbol-Add.ico</property>
    <property name="Left">24</property>
    <property name="Name">cmdAddGenerador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">33</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdAddGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdAddGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAddGeneradorJSMouseOut</property>
  </object>
  <object class="Query" name="qryEstimaciones" >
        <property name="Left">805</property>
        <property name="Top">10</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">100</property>
    <property name="Name">qryEstimaciones</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">753</property>
        <property name="Top">10</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="dsEstimaciones" >
        <property name="Left">773</property>
        <property name="Top">63</property>
    <property name="DataSet">qryEstimaciones</property>
    <property name="Name">dsEstimaciones</property>
  </object>
  <object class="Datasource" name="dtaEstimaxPartida" >
        <property name="Left">752</property>
        <property name="Top">140</property>
    <property name="DataSet">qryEstimaxpartida</property>
    <property name="Name">dtaEstimaxPartida</property>
  </object>
  <object class="Query" name="qryEstimaxpartida" >
        <property name="Left">852</property>
        <property name="Top">132</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">1</property>
    <property name="Name">qryEstimaxpartida</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dtaGeneral" >
        <property name="Left">752</property>
        <property name="Top">268</property>
    <property name="DataSet">qryGeneral</property>
    <property name="Name">dtaGeneral</property>
  </object>
  <object class="Query" name="qryGeneral" >
        <property name="Left">804</property>
        <property name="Top">268</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryGeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dtaActividadesxOrd" >
        <property name="Left">752</property>
        <property name="Top">193</property>
    <property name="DataSet">qryActxOrden</property>
    <property name="Name">dtaActividadesxOrd</property>
  </object>
  <object class="Query" name="qryActxOrden" >
        <property name="Left">804</property>
        <property name="Top">205</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">2</property>
    <property name="Name">qryActxOrden</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dtaComboActividades" >
        <property name="Left">749</property>
        <property name="Top">345</property>
    <property name="DataSet">qryComboActividades</property>
    <property name="Name">dtaComboActividades</property>
  </object>
  <object class="Query" name="qryComboActividades" >
        <property name="Left">804</property>
        <property name="Top">344</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryComboActividades</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
