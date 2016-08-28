<?php
<object class="frmMedidasxviaje" name="frmMedidasxviaje" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unidad de Medidas de Viajes/Acarreos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmMedidasxviaje</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">frmMedidasxviajeBeforeShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">71</property>
    <property name="Left">13</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">171</property>
    <property name="Width">571</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">183</property>
    <property name="Width">74</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Medida</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">211</property>
    <property name="Width">74</property>
  </object>
  <object class="Edit" name="txtDescripcion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">97</property>
    <property name="Name">txtDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="Top">180</property>
    <property name="Width">472</property>
    <property name="jsOnBlur">txtDescripcionJSBlur</property>
    <property name="jsOnFocus">txtDescripcionJSFocus</property>
    <property name="jsOnKeyPress">txtDescripcionJSKeyPress</property>
  </object>
  <object class="Edit" name="txtMedida" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">97</property>
    <property name="Name">txtMedida</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0</property>
    <property name="Top">208</property>
    <property name="Width">123</property>
    <property name="jsOnBlur">txtMedidaJSBlur</property>
    <property name="jsOnFocus">txtMedidaJSFocus</property>
    <property name="jsOnKeyPress">txtMedidaJSKeyPress</property>
  </object>
  <object class="HiddenField" name="HiConsecutivo" >
    <property name="Height">18</property>
    <property name="Left">19</property>
    <property name="Name">HiConsecutivo</property>
    <property name="Top">242</property>
    <property name="Width">117</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">18</property>
    <property name="Left">148</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">242</property>
    <property name="Width">108</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Unidad de Medidas de Viajes/Acarreos</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">12</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">10</property>
    <property name="Width">572</property>
  </object>
  <object class="Button" name="cmdAgregar" >
    <property name="Caption">Agregar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">13</property>
    <property name="Name">cmdAgregar</property>
    <property name="Top">27</property>
    <property name="Width">68</property>
    <property name="jsOnClick">cmdAgregarJSClick</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">13</property>
    <property name="Name">cmdModificar</property>
    <property name="Top">50</property>
    <property name="Width">68</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Caption">Eliminar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">13</property>
    <property name="Name">cmdEliminar</property>
    <property name="Top">73</property>
    <property name="Width">68</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">13</property>
    <property name="Name">cmdAceptar</property>
    <property name="Top">96</property>
    <property name="Width">68</property>
    <property name="OnClick">cmdAceptarClick</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">13</property>
    <property name="Name">cmdCancelar</property>
    <property name="Top">120</property>
    <property name="Width">68</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">13</property>
    <property name="Name">cmdImprimir</property>
    <property name="Top">144</property>
    <property name="Width">68</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="DBGrid" name="GridMedidas" >
    <property name="Columns"><![CDATA[a:3:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;ID&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;iIdMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;dUnidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;300&quot;;}}]]></property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">134</property>
    <property name="Left">86</property>
    <property name="Name">GridMedidas</property>
    <property name="Top">28</property>
    <property name="Width">496</property>
    <property name="jsOnClick">GridMedidasJSClick</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">102</property>
    <property name="Left">16</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">268</property>
    <property name="Width">568</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">392</property>
        <property name="Top">106</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">456</property>
        <property name="Top">106</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:29:&quot;select * from a_medidasxviaje&quot;;}]]></property>
  </object>
  <object class="Database" name="db" >
        <property name="Left">536</property>
        <property name="Top">106</property>
    <property name="Connected"></property>
    <property name="Name">db</property>
  </object>
</object>
?>
