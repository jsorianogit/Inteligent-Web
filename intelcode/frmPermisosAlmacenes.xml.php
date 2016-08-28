<?php
<object class="Unit4" name="Unit4" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit4</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">493</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit4</property>
  <property name="UseAjax">1</property>
  <property name="Width">784</property>
  <property name="OnShow">Unit4Show</property>
  <object class="DBGrid" name="ddalmacenxusuarios1" >
    <property name="Columns"><![CDATA[a:3:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Usuario&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdUsuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Clave Almacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdAlmacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:23:&quot;Descripcion del Almacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;600&quot;;}}]]></property>
    <property name="Datasource">dsPermisos</property>
    <property name="Height">161</property>
    <property name="Left">90</property>
    <property name="Name">ddalmacenxusuarios1</property>
    <property name="Top">24</property>
    <property name="Width">685</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Permisos de Acceso a Usuario a los Almacenes</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">8</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">5</property>
    <property name="Width">770</property>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">224</property>
    <property name="Left">629</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">191</property>
    <property name="Width">141</property>
    <object class="Button" name="cmdAsignar" >
      <property name="Caption">Asignar
el Almacen
a los Usuarios
Seleccionados</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">111</property>
      <property name="Left">7</property>
      <property name="Name">cmdAsignar</property>
      <property name="ParentColor">0</property>
      <property name="Top">13</property>
      <property name="Width">127</property>
      <property name="jsOnClick">cmdAsignarJSClick</property>
    </object>
  </object>
  <object class="ComboBox" name="sIdAlmacen" >
    <property name="Color">#FF8000</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">90</property>
    <property name="Name">sIdAlmacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">190</property>
    <property name="Width">530</property>
  </object>
  <object class="Label" name="Usuarios" >
    <property name="Caption">Usuarios</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">10</property>
    <property name="Name">Usuarios</property>
    <property name="ParentColor">0</property>
    <property name="Top">220</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Almacen" >
    <property name="Caption">Almacen</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">10</property>
    <property name="Name">Almacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">190</property>
    <property name="Width">75</property>
  </object>
  <object class="DBGrid" name="ddcontratosxusuario1" >
    <property name="Columns"><![CDATA[a:2:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Usuario&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdUsuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Nombre&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sNombre&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;600&quot;;}}]]></property>
    <property name="Datasource">dsUsuarios</property>
    <property name="Height">200</property>
    <property name="Left">90</property>
    <property name="Name">ddcontratosxusuario1</property>
    <property name="Top">215</property>
    <property name="Width">530</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">156</property>
    <property name="Left">9</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">24</property>
    <property name="Width">77</property>
    <object class="Button" name="cmdRevocar" >
      <property name="Caption">Revocar
Privilegios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">52</property>
      <property name="Left">2</property>
      <property name="Name">cmdRevocar</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdRevocarJSClick</property>
    </object>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">55</property>
    <property name="Left">90</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">425</property>
    <property name="Width">680</property>
  </object>
  <object class="Database" name="db" >
        <property name="Left">253</property>
        <property name="Top">74</property>
    <property name="Connected"></property>
    <property name="Name">db</property>
  </object>
  <object class="Datasource" name="dsPermisos" >
        <property name="Left">520</property>
        <property name="Top">89</property>
    <property name="Dataset">qryPermisos</property>
    <property name="Name">dsPermisos</property>
  </object>
  <object class="Datasource" name="dsUsuarios" >
        <property name="Left">372</property>
        <property name="Top">337</property>
    <property name="Dataset">qryUsuarios</property>
    <property name="Name">dsUsuarios</property>
  </object>
  <object class="Query" name="qryPermisos" >
        <property name="Left">405</property>
        <property name="Top">70</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryPermisos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:129:&quot;select au.sIdUsuario,au.sIdAlmacen,a.sDescripcion from almacenes a inner join almacenxusuarios au on (a.sIdAlmacen=au.sIdAlmacen)&quot;;}]]></property>
  </object>
  <object class="Query" name="qryUsuarios" >
        <property name="Left">205</property>
        <property name="Top">345</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryUsuarios</property>
    <property name="Order"></property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:133:&quot;select distinct(cu.sIdUsuario) as sIdUsuario,u.sNombre from contratosxusuario cu inner join usuarios u on(cu.sIdUsuario=u.sIdUsuario)&quot;;}]]></property>
  </object>
</object>
?>
