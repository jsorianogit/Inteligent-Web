<?php
<object class="frmEstimaciones" name="frmEstimaciones" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Acceso a datos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">464</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmEstimaciones</property>
  <property name="UseAjax">1</property>
  <property name="Width">808</property>
  <property name="OnBeforeShow">frmEstimacionesBeforeShow</property>
  <property name="OnShow">frmEstimacionesShow</property>
  <property name="OnStartBody">frmEstimacionesStartBody</property>
  <property name="jsOnLoad">frmEstimacionesJSLoad</property>
  <object class="DBGrid" name="dbgGeneral" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dtaGeneral</property>
    <property name="Height">28</property>
    <property name="Left">484</property>
    <property name="Name">dbgGeneral</property>
    <property name="Top">60</property>
    <property name="Width">24</property>
  </object>
  <object class="DBGrid" name="dbgEstimaciones" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">Datasource2</property>
    <property name="Height">128</property>
    <property name="Left">68</property>
    <property name="Name">dbgEstimaciones</property>
    <property name="Top">205</property>
    <property name="Width">718</property>
  </object>
  <object class="DBGrid" name="dbgPEstimacion" >
    <property name="Columns"><![CDATA[a:9:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Estimacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;Estimacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:8:&quot;taCenter&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Estimado?&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Estimado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:8:&quot;taCenter&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;F. Inicio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;F_Inicio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;F. Final&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;F_Final&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Tipo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;Tipo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Monto MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;Monto_MN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Retencion MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;Retencion_MN&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Moneda&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Moneda&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Fecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}}]]></property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">157</property>
    <property name="Left">115</property>
    <property name="Name">dbgPEstimacion</property>
    <property name="ReadOnly">1</property>
    <property name="Top">23</property>
    <property name="Width">452</property>
    <property name="jsOnClick">dbgPEstimacionJSClick</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">27</property>
    <property name="Hint">Imprimir</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">69</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">154</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="Button" name="cmdCancelGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">27</property>
    <property name="Hint">Cancelar</property>
    <property name="ImageSource">Undo.ico</property>
    <property name="Left">69</property>
    <property name="Name">cmdCancelGenerador</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">128</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdCancelGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdCancelGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdCancelGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAcceptGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">27</property>
    <property name="Hint">Aceptar</property>
    <property name="ImageSource">Symbol-Check.ico</property>
    <property name="Left">69</property>
    <property name="Name">cmdAcceptGenerador</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">102</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdAcceptGeneradorClick</property>
    <property name="jsOnClick">cmdAcceptGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdAcceptGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAcceptGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdDeleteGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">27</property>
    <property name="Hint">Eliminar</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">69</property>
    <property name="Name">cmdDeleteGenerador</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">75</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdDeleteGeneradorClick</property>
    <property name="jsOnClick">cmdDeleteGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdDeleteGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdDeleteGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="cmdChangeGenerador" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">27</property>
    <property name="Hint">Modificar</property>
    <property name="ImageSource">Edit.ico</property>
    <property name="Left">69</property>
    <property name="Name">cmdChangeGenerador</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">48</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdChangeGeneradorJSClick</property>
    <property name="jsOnMouseMove">cmdChangeGeneradorJSMouseMove</property>
    <property name="jsOnMouseOut">cmdChangeGeneradorJSMouseOut</property>
  </object>
  <object class="Button" name="buttAgregar" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">27</property>
    <property name="Hint">Agregar</property>
    <property name="ImageSource">Symbol-Add.ico</property>
    <property name="Left">69</property>
    <property name="Name">buttAgregar</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">24</property>
    <property name="Width">40</property>
    <property name="jsOnClick">buttAgregarJSClick</property>
    <property name="jsOnMouseMove">buttAgregarJSMouseMove</property>
    <property name="jsOnMouseOut">buttAgregarJSMouseOut</property>
  </object>
  <object class="Edit" name="txtQueOpcion" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">8</property>
    <property name="Left">496</property>
    <property name="Name">txtQueOpcion</property>
    <property name="Top">9</property>
    <property name="Width">16</property>
  </object>
  <object class="Edit" name="txtValorAntes" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">7</property>
    <property name="Left">480</property>
    <property name="Name">txtValorAntes</property>
    <property name="Top">9</property>
    <property name="Width">14</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;ESTIMACIONES EXISTENTES&lt;/STRONG&gt;]]></property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">66</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">4</property>
    <property name="Width">720</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">Panel1</property>
    <property name="Color">#F8F8F8</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">157</property>
    <property name="Left">567</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">24</property>
    <property name="Width">220</property>
    <object class="Label" name="Label4" >
      <property name="Caption">Estimacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label4</property>
      <property name="Top">24</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Tipo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label5</property>
      <property name="Top">48</property>
      <property name="Width">56</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Fecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label6</property>
      <property name="Top">68</property>
      <property name="Width">60</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">F. Inicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label7</property>
      <property name="Top">88</property>
      <property name="Width">60</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">F. Final</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label8</property>
      <property name="Top">108</property>
      <property name="Width">60</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Moneda</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label9</property>
      <property name="Top">128</property>
      <property name="Width">56</property>
    </object>
    <object class="Edit" name="txtEstimacion" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">72</property>
      <property name="Name">txtEstimacion</property>
      <property name="Top">20</property>
      <property name="Width">92</property>
      <property name="jsOnBlur">txtEstimacionJSBlur</property>
      <property name="jsOnFocus">txtEstimacionJSFocus</property>
      <property name="jsOnKeyPress">txtEstimacionJSKeyPress</property>
    </object>
    <object class="ComboBox" name="cboTipo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">35</property>
      <property name="Name">cboTipo</property>
      <property name="Top">42</property>
      <property name="Width">136</property>
      <property name="jsOnBlur">cboTipoJSBlur</property>
      <property name="jsOnFocus">cboTipoJSFocus</property>
      <property name="jsOnKeyPress">cboTipoJSKeyPress</property>
    </object>
    <object class="DateTimePicker" name="dtaFecha" >
      <property name="Caption">dtaFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">20</property>
      <property name="Name">dtaFecha</property>
      <property name="Top">65</property>
      <property name="Width">109</property>
    </object>
    <object class="DateTimePicker" name="dtaFechaI" >
      <property name="Caption">dtaFechaI</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">20</property>
      <property name="Name">dtaFechaI</property>
      <property name="Top">85</property>
      <property name="Width">109</property>
    </object>
    <object class="DateTimePicker" name="dtaFechaF" >
      <property name="Caption">dtaFechaF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">20</property>
      <property name="Name">dtaFechaF</property>
      <property name="Top">104</property>
      <property name="Width">109</property>
    </object>
    <object class="Edit" name="txtMoneda" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Left">73</property>
      <property name="Name">txtMoneda</property>
      <property name="Top">124</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">txtMonedaJSBlur</property>
      <property name="jsOnFocus">txtMonedaJSFocus</property>
      <property name="jsOnKeyPress">txtMonedaJSKeyPress</property>
    </object>
  </object>
  <object class="Label" name="Label2" >
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">arial</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">68</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">188</property>
    <property name="Width">718</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Informacion de la Estimacion</property>
    <property name="Color">#E2E0D6</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">570</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">24</property>
    <property name="Width">216</property>
  </object>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">28</property>
    <property name="Left">67</property>
    <property name="Name">Panel3</property>
    <property name="Top">336</property>
    <property name="Width">719</property>
    <object class="Button" name="cmdGenrador" >
      <property name="Caption">Generador</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdGenrador</property>
      <property name="Top">3</property>
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
      <property name="Left">89</property>
      <property name="Name">cmdNumGenrador</property>
      <property name="Top">3</property>
      <property name="Width">102</property>
      <property name="jsOnClick">cmdNumGenradorJSClick</property>
    </object>
    <object class="Button" name="cmdCImportes" >
      <property name="Caption">Sem. c/Importes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">193</property>
      <property name="Name">cmdCImportes</property>
      <property name="Top">3</property>
      <property name="Width">102</property>
      <property name="jsOnClick">cmdCImportesJSClick</property>
    </object>
    <object class="Button" name="cmdSImportes" >
      <property name="Caption">Sem. s/Importes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">297</property>
      <property name="Name">cmdSImportes</property>
      <property name="Top">3</property>
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
      <property name="Left">401</property>
      <property name="Name">cmdListaVer</property>
      <property name="Top">3</property>
      <property name="Width">118</property>
      <property name="jsOnClick">cmdListaVerJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="HiNumeroOrden" >
    <property name="Height">18</property>
    <property name="Left">567</property>
    <property name="Name">HiNumeroOrden</property>
    <property name="Top">380</property>
    <property name="Width">119</property>
  </object>
  <object class="HiddenField" name="HiFechaInver" >
    <property name="Height">18</property>
    <property name="Left">566</property>
    <property name="Name">HiFechaInver</property>
    <property name="Top">404</property>
    <property name="Width">120</property>
  </object>
  <object class="GroupBox" name="GrupoMenu" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">O P C I O N E S</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">52</property>
    <property name="Left">114</property>
    <property name="Name">GrupoMenu</property>
    <property name="Top">137</property>
    <property name="Width">236</property>
    <object class="MainMenu" name="MainMenu1" >
      <property name="Height">23</property>
      <property name="Images">ImageList1</property>
      <property name="Items"><![CDATA[a:2:{i:0;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Reportes Parciales&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:5:{i:0;a:6:{s:7:&quot;Caption&quot;;s:10:&quot;Estimacion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;1&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Resumen Estimacion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;2&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:11:&quot;Isometricos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;3&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:11:&quot;Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;4&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Generadores de Obra&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;5&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:1;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Reportes Acumulados&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:3:{i:0;a:6:{s:7:&quot;Caption&quot;;s:11:&quot;Isometricos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;6&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Concentrado de Generadores x Orden&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;7&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:22:&quot;Detalle de Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;8&quot;;s:5:&quot;Items&quot;;a:0:{}}}}}]]></property>
      <property name="Name">MainMenu1</property>
      <property name="Top">17</property>
      <property name="Width">221</property>
      <property name="jsOnClick">MainMenu1JSClick</property>
    </object>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">95</property>
        <property name="Top">396</property>
    <property name="DatabaseName">lancia</property>
    <property name="Host">localhost</property>
    <property name="Name">Database1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">241</property>
        <property name="Top">417</property>
    <property name="DataSet">qryEstimacionP</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="qryEstimacionP" >
        <property name="Left">241</property>
        <property name="Top">367</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryEstimacionP</property>
    <property name="Order">desc</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="qryEstimacion" >
        <property name="Left">383</property>
        <property name="Top">372</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryEstimacion</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="Datasource2" >
        <property name="Left">383</property>
        <property name="Top">410</property>
    <property name="DataSet">qryEstimacion</property>
    <property name="Name">Datasource2</property>
  </object>
  <object class="Datasource" name="dtaGeneral" >
        <property name="Left">524</property>
        <property name="Top">431</property>
    <property name="DataSet">qryGeneral</property>
    <property name="Name">dtaGeneral</property>
  </object>
  <object class="Query" name="qryGeneral" >
        <property name="Left">522</property>
        <property name="Top">371</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryGeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="ImageList" name="ImageList1" >
        <property name="Left">166</property>
        <property name="Top">392</property>
    <property name="Images"><![CDATA[a:1:{s:1:&quot;1&quot;;s:45:&quot;recursos/imagenesMenu/Opciones/frameprint.ico&quot;;}]]></property>
    <property name="Name">ImageList1</property>
  </object>
</object>
?>
