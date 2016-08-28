<?php
<object class="frmContratosxUsuario" name="frmContratosxUsuario" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">480</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmContratosxUsuario</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">frmContratosxUsuarioShow</property>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">257</property>
    <property name="Left">56</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">167</property>
    <property name="Width">560</property>
    <object class="Button" name="cmdAsignar" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">36</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Symbol-Check.ico</property>
      <property name="Left">485</property>
      <property name="Name">cmdAsignar</property>
      <property name="ParentColor">0</property>
      <property name="Top">29</property>
      <property name="Width">47</property>
      <property name="jsOnClick">cmdAsignarJSClick</property>
      <property name="jsOnMouseMove">cmdAsignarJSMouseMove</property>
      <property name="jsOnMouseOut">cmdAsignarJSMouseOut</property>
    </object>
    <object class="DBGrid" name="ddcontratos1" >
      <property name="Columns"><![CDATA[a:2:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Contrato&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sContrato&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;450&quot;;}}]]></property>
      <property name="Datasource">dscontratos1</property>
      <property name="Height">200</property>
      <property name="Hint">Control + Clic = seleccionar varios contratos</property>
      <property name="Left">96</property>
      <property name="Name">ddcontratos1</property>
      <property name="Top">33</property>
      <property name="Width">400</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Usuario:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">6</property>
      <property name="Name">Label1</property>
      <property name="Top">12</property>
      <property name="Width">88</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Contratos:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label2</property>
      <property name="Top">33</property>
      <property name="Width">88</property>
    </object>
    <object class="ComboBox" name="sIdUsuario" >
      <property name="Color">#FF8000</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">96</property>
      <property name="Name">sIdUsuario</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">400</property>
      <property name="OnChange">sIdUsuarioChange</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">CTRL + Clic = seleccionar varios contratos</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">96</property>
      <property name="Name">Label5</property>
      <property name="Top">233</property>
      <property name="Width">400</property>
    </object>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">120</property>
    <property name="Left">56</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">24</property>
    <property name="Width">560</property>
    <object class="Button" name="cmdEliminar" >
      <property name="Caption">Revocar
Privilegios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">36</property>
      <property name="ImageSource">recursos/imagenesMenu/Botones/Symbol-Delete.ico</property>
      <property name="Left">485</property>
      <property name="Name">cmdEliminar</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">47</property>
      <property name="jsOnClick">cmdEliminarJSClick</property>
      <property name="jsOnMouseMove">cmdEliminarJSMouseMove</property>
      <property name="jsOnMouseOut">cmdEliminarJSMouseOut</property>
    </object>
    <object class="DBGrid" name="ddcontratosxusuario1" >
      <property name="Columns"><![CDATA[a:2:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Usuario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sIdUsuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Contratos&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sContrato&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;250&quot;;}}]]></property>
      <property name="Datasource">dscontratosxusuario1</property>
      <property name="Height">110</property>
      <property name="Left">96</property>
      <property name="Name">ddcontratosxusuario1</property>
      <property name="Top">5</property>
      <property name="Width">400</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Contratos
Asignados</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">36</property>
      <property name="Left">6</property>
      <property name="Name">Label3</property>
      <property name="Top">12</property>
      <property name="Width">88</property>
    </object>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Contratos x Usuario</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">56</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">5</property>
    <property name="Width">560</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Asignar</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">18</property>
    <property name="Left">56</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">149</property>
    <property name="Width">560</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">48</property>
    <property name="Left">56</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">424</property>
    <property name="Width">560</property>
  </object>
  <object class="Table" name="tbcontratosxusuario1" >
        <property name="Left">648</property>
        <property name="Top">66</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbcontratosxusuario1</property>
    <property name="TableName">contratosxusuario</property>
  </object>
  <object class="Database" name="dbgeotechAdal1" >
        <property name="Left">688</property>
        <property name="Top">170</property>
    <property name="Connected"></property>
    <property name="Name">dbgeotechAdal1</property>
  </object>
  <object class="Datasource" name="dscontratosxusuario1" >
        <property name="Left">736</property>
        <property name="Top">50</property>
    <property name="Dataset">tbcontratosxusuario1</property>
    <property name="Name">dscontratosxusuario1</property>
  </object>
  <object class="Table" name="tbcontratos1" >
        <property name="Left">720</property>
        <property name="Top">238</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbcontratos1</property>
    <property name="TableName">contratos</property>
  </object>
  <object class="Datasource" name="dscontratos1" >
        <property name="Left">664</property>
        <property name="Top">238</property>
    <property name="Dataset">tbcontratos1</property>
    <property name="Name">dscontratos1</property>
  </object>
</object>
?>
