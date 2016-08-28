<?php
<object class="frmCategoriaPersonal" name="frmCategoriaPersonal" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmCategoriaPersonal</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">374</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmCategoriaPersonal</property>
  <property name="Width">710</property>
  <property name="OnBeforeShow">frmCategoriaPersonalBeforeShow</property>
  <object class="Panel" name="Panel2" >
    <property name="Color">#408080</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">172</property>
    <property name="Left">5</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">31</property>
    <property name="Width">48</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Modificar</property>
    <property name="ImageSource">Edit.ico</property>
    <property name="Left">7</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">59</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
    <property name="jsOnMouseMove">cmdModificarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdModificarJSMouseOut</property>
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
    <property name="Height">110</property>
    <property name="Left">5</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">210</property>
    <property name="Width">571</property>
    <object class="ComboBox" name="CboPernocta" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">79</property>
      <property name="Name">CboPernocta</property>
      <property name="Top">40</property>
      <property name="Width">208</property>
      <property name="jsOnBlur">CboPernoctaJSBlur</property>
      <property name="jsOnFocus">CboPernoctaJSFocus</property>
      <property name="jsOnKeyPress">CboPernoctaJSKeyPress</property>
    </object>
    <object class="ComboBox" name="CboLaboran" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">79</property>
      <property name="Name">CboLaboran</property>
      <property name="Top">67</property>
      <property name="Width">207</property>
      <property name="jsOnBlur">CboLaboranJSBlur</property>
      <property name="jsOnFocus">CboLaboranJSFocus</property>
      <property name="jsOnKeyPress">CboLaboranJSKeyPress</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">PAQUETE DE CATEGORIAS DE PERSONAL</property>
    <property name="Color">#AE9FA9</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">4</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">8</property>
    <property name="Width">572</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Id Paquete</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">226</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Pernocta</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">253</property>
    <property name="Width">65</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Laboran</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">281</property>
    <property name="Width">65</property>
  </object>
  <object class="Button" name="cmdAgregar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Agregar</property>
    <property name="ImageSource">Symbol-Add.ico</property>
    <property name="Left">7</property>
    <property name="Name">cmdAgregar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">33</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdAgregarJSClick</property>
    <property name="jsOnMouseMove">cmdAgregarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAgregarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Eliminar</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">7</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">87</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
    <property name="jsOnMouseMove">cmdEliminarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEliminarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Aceptar</property>
    <property name="ImageSource">Symbol-Check.ico</property>
    <property name="Left">7</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">115</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdAceptarClick</property>
    <property name="jsOnClick">cmdAceptarJSClick</property>
    <property name="jsOnMouseMove">cmdAceptarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAceptarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Cancelar</property>
    <property name="ImageSource">Undo.ico</property>
    <property name="Left">7</property>
    <property name="Name">cmdCancelar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">143</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
    <property name="jsOnMouseMove">cmdCancelarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdCancelarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Color">#408080</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Imprimir</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">7</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">170</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="Edit" name="txtId" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">84</property>
    <property name="Name">txtId</property>
    <property name="Top">222</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtIdJSBlur</property>
    <property name="jsOnFocus">txtIdJSFocus</property>
    <property name="jsOnKeyPress">txtIdJSKeyPress</property>
  </object>
  <object class="DBGrid" name="GridTipos" >
    <property name="Columns"><![CDATA[a:4:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;*&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;30&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Id Paquete&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sNumeroPaquete&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Pernocta&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sIdPernocta&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;220&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Laboran&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;sIdPlataforma&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">SourPozo</property>
    <property name="Height">168</property>
    <property name="Left">56</property>
    <property name="Name">GridTipos</property>
    <property name="Top">32</property>
    <property name="Width">520</property>
    <property name="jsOnClick">GridTiposJSClick</property>
    <property name="jsOnRowChanged">GridTiposJSRowChanged</property>
  </object>
  <object class="HiddenField" name="HiOldId" >
    <property name="Height">18</property>
    <property name="Left">11</property>
    <property name="Name">HiOldId</property>
    <property name="Top">328</property>
    <property name="Width">117</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">140</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">328</property>
    <property name="Width">108</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">616</property>
        <property name="Top">20</property>
    <property name="Connected"></property>
    <property name="Name">base</property>
  </object>
  <object class="Datasource" name="SourPozo" >
        <property name="Left">600</property>
        <property name="Top">88</property>
    <property name="DataSet">QryPozo</property>
    <property name="Name">SourPozo</property>
  </object>
  <object class="Query" name="QryPozo" >
        <property name="Left">652</property>
        <property name="Top">85</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryPozo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
