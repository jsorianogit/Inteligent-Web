<?php
<object class="Unit1" name="Unit1" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">524</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit1</property>
  <property name="UseAjax">1</property>
  <property name="Width">880</property>
  <property name="OnShow">Unit1Show</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Buscar Texto:</property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="Top">8</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="txtTexto" >
    <property name="Height">21</property>
    <property name="Left">91</property>
    <property name="Name">txtTexto</property>
    <property name="Top">8</property>
    <property name="Width">279</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Coincidencias Encontradas</property>
    <property name="Height">11</property>
    <property name="Left">15</property>
    <property name="Name">Label2</property>
    <property name="Top">35</property>
    <property name="Width">471</property>
  </object>
  <object class="DBGrid" name="gridComentarios" >
    <property name="Columns"><![CDATA[a:5:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:17:&quot;Frente de Trabajo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;No. Reporte&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;sNumeroReporte&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;iIdDiario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Turno&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;sIdTurno&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}}]]></property>
    <property name="DataSource">dsBitacora</property>
    <property name="Height">219</property>
    <property name="Left">16</property>
    <property name="Name">gridComentarios</property>
    <property name="Top">78</property>
    <property name="Width">387</property>
    <property name="jsOnClick">gridComentariosJSClick</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Imprimir</property>
    <property name="Height">29</property>
    <property name="Left">720</property>
    <property name="Name">Button1</property>
    <property name="Top">43</property>
    <property name="Width">75</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="Caption">Panel1</property>
    <property name="Height">211</property>
    <property name="Name">Panel1</property>
    <property name="Top">305</property>
    <property name="Width">812</property>
    <object class="Memo" name="MemoComentarios" >
      <property name="Color">LightGoldenrodYellow</property>
      <property name="Height">195</property>
      <property name="Left">16</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">MemoComentarios</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">8</property>
      <property name="Width">780</property>
    </object>
  </object>
  <object class="Button" name="Button2" >
    <property name="Caption">Buscar</property>
    <property name="Height">22</property>
    <property name="Left">374</property>
    <property name="Name">Button2</property>
    <property name="Top">7</property>
    <property name="Width">75</property>
    <property name="OnClick">Button2Click</property>
  </object>
  <object class="CheckBox" name="chkAlbum" >
    <property name="Caption">Buscar en Album Fotografico</property>
    <property name="Height">21</property>
    <property name="Left">16</property>
    <property name="Name">chkAlbum</property>
    <property name="Top">54</property>
    <property name="Width">227</property>
  </object>
  <object class="HiddenField" name="txtNumeroReporte" >
    <property name="Height">18</property>
    <property name="Left">310</property>
    <property name="Name">txtNumeroReporte</property>
    <property name="Top">54</property>
    <property name="Width">69</property>
  </object>
  <object class="Image" name="Image1" >
    <property name="Border">0</property>
    <property name="Height">97</property>
    <property name="ImageSource"></property>
    <property name="Left">408</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">Image1</property>
    <property name="Stretch">1</property>
    <property name="Top">199</property>
    <property name="Width">152</property>
  </object>
  <object class="DBGrid" name="gridFotografico" >
    <property name="Columns"><![CDATA[a:2:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:1:&quot;#&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;iImagen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;400&quot;;}}]]></property>
    <property name="DataSource">dsReporteFotografico</property>
    <property name="Height">118</property>
    <property name="Left">408</property>
    <property name="Name">gridFotografico</property>
    <property name="Top">78</property>
    <property name="Width">387</property>
    <property name="jsOnClick">gridFotograficoJSClick</property>
  </object>
  <object class="Memo" name="memoDescripcionFoto" >
    <property name="Color">LightGoldenrodYellow</property>
    <property name="Height">98</property>
    <property name="Left">562</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">memoDescripcionFoto</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">199</property>
    <property name="Width">234</property>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">526</property>
        <property name="Top">14</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">lancia</property>
    <property name="Host">localhost</property>
    <property name="Name">Database1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="dsReporteFotografico" >
        <property name="Left">405</property>
        <property name="Top">296</property>
    <property name="DataSet">qryReporteFotografico</property>
    <property name="Name">dsReporteFotografico</property>
  </object>
  <object class="Query" name="qryReporteFotografico" >
        <property name="Left">481</property>
        <property name="Top">294</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryReporteFotografico</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dsBitacora" >
        <property name="Left">141</property>
        <property name="Top">168</property>
    <property name="DataSet">qryBitacora</property>
    <property name="Name">dsBitacora</property>
  </object>
  <object class="Query" name="qryBitacora" >
        <property name="Left">145</property>
        <property name="Top">110</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryBitacora</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="qryBusca" >
        <property name="Left">423</property>
        <property name="Top">37</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryBusca</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
