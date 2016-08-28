<?php
<object class="frmFamilias" name="frmFamilias" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmFamilias</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">440</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmFamilias</property>
  <property name="Width">784</property>
  <property name="OnShow">frmFamiliasShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">154</property>
    <property name="Left">32</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">220</property>
    <property name="Width">672</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">40</property>
    <property name="Left">32</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">368</property>
    <property name="Width">681</property>
  </object>
  <object class="DBGrid" name="dbgFamilias" >
    <property name="Columns"><![CDATA[a:2:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Id Familia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdFamilia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;500&quot;;}}]]></property>
    <property name="Datasource">dsFamilias</property>
    <property name="Height">156</property>
    <property name="Left">112</property>
    <property name="Name">dbgFamilias</property>
    <property name="Top">41</property>
    <property name="Width">591</property>
    <property name="jsOnClick">dbgFamiliasJSClick</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Familias</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">31</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">21</property>
    <property name="Width">672</property>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">156</property>
    <property name="Left">32</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">77</property>
    <object class="Button" name="cmdAgregar" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdAgregar</property>
      <property name="Top">10</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAgregarJSClick</property>
    </object>
    <object class="Button" name="cmdModificar" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdModificar</property>
      <property name="Top">31</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdModificarJSClick</property>
    </object>
    <object class="Button" name="cmdEliminar" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdEliminar</property>
      <property name="Top">54</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdEliminarClick</property>
      <property name="jsOnClick">cmdEliminarJSClick</property>
    </object>
    <object class="Button" name="cmdAceptar" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdAceptar</property>
      <property name="Top">76</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAceptarClick</property>
    </object>
    <object class="Button" name="cmdCancelar" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdCancelar</property>
      <property name="Top">98</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdCancelarJSClick</property>
    </object>
    <object class="Button" name="cmdImprimir" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">2</property>
      <property name="Name">cmdImprimir</property>
      <property name="Top">120</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
  </object>
  <object class="Edit" name="sIdFamilia" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">130</property>
    <property name="MaxLength">10</property>
    <property name="Name">sIdFamilia</property>
    <property name="ParentColor">0</property>
    <property name="Top">220</property>
    <property name="Width">100</property>
    <property name="jsOnBlur">sIdFamiliaJSBlur</property>
    <property name="jsOnFocus">sIdFamiliaJSFocus</property>
    <property name="jsOnKeyPress">sIdFamiliaJSKeyPress</property>
  </object>
  <object class="Memo" name="mDescripcion" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">58</property>
    <property name="Left">129</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="Top">246</property>
    <property name="Width">550</property>
    <property name="jsOnBlur">mDescripcionJSBlur</property>
    <property name="jsOnFocus">mDescripcionJSFocus</property>
    <property name="jsOnKeyPress">mDescripcionJSKeyPress</property>
  </object>
  <object class="Label" name="fdfamilias2" >
    <property name="Caption">Id Familia</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">50</property>
    <property name="Name">fdfamilias2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">225</property>
    <property name="Width">65</property>
  </object>
  <object class="Label" name="fdfamilias3" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">43</property>
    <property name="Name">fdfamilias3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">72</property>
  </object>
  <object class="HiddenField" name="hOperacion" >
    <property name="Height">18</property>
    <property name="Left">173</property>
    <property name="Name">hOperacion</property>
    <property name="Top">381</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hOldsIdFamilia" >
    <property name="Height">18</property>
    <property name="Left">442</property>
    <property name="Name">hOldsIdFamilia</property>
    <property name="Top">381</property>
    <property name="Width">200</property>
  </object>
  <object class="Table" name="qryFamilias" >
        <property name="Left">736</property>
        <property name="Top">100</property>
    <property name="Database">database</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">qryFamilias</property>
    <property name="TableName">familias</property>
  </object>
  <object class="Database" name="database" >
        <property name="Left">734</property>
        <property name="Top">159</property>
    <property name="Connected"></property>
    <property name="Name">database</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="dsFamilias" >
        <property name="Left">734</property>
        <property name="Top">44</property>
    <property name="Dataset">qryFamilias</property>
    <property name="Name">dsFamilias</property>
  </object>
</object>
?>
