<?php
<object class="frmInformeSincronizador" name="frmInformeSincronizador" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Mensajes Sincronizacion</property>
  <property name="DocType">dtNone</property>
  <property name="Height">525</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmInformeSincronizador</property>
  <property name="UseAjax">1</property>
  <property name="Width">1129</property>
  <property name="OnShow">frmInformeSincronizadorShow</property>
  <object class="DBGrid" name="DBGrid1" >
    <property name="Columns"><![CDATA[a:5:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:2:&quot;Id&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:3:&quot;iid&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;35&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;dFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;55&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Base de datos&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;sbasedatos&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Servidor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sservidor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Mensajes&quot;;s:5:&quot;Color&quot;;s:7:&quot;#CCFFFF&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;mMensajes&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:4:&quot;1000&quot;;}}]]></property>
    <property name="DataSource">dsMensajesSincronizacion</property>
    <property name="Height">411</property>
    <property name="Left">13</property>
    <property name="Name">DBGrid1</property>
    <property name="Top">8</property>
    <property name="Width">459</property>
    <property name="jsOnClick">DBGrid1JSClick</property>
    <property name="jsOnDblClick">DBGrid1JSDblClick</property>
  </object>
  <object class="Button" name="cmdActualizar" >
    <property name="Caption">Actualizar</property>
    <property name="Height">25</property>
    <property name="Left">13</property>
    <property name="Name">cmdActualizar</property>
    <property name="Top">419</property>
    <property name="Width">75</property>
    <property name="OnClick">cmdActualizarClick</property>
  </object>
  <object class="Edit" name="txtLimite" >
    <property name="Height">21</property>
    <property name="Left">264</property>
    <property name="Name">txtLimite</property>
    <property name="Text">100</property>
    <property name="Top">421</property>
    <property name="Width">83</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Mostrar</property>
    <property name="Height">13</property>
    <property name="Left">216</property>
    <property name="Name">Label1</property>
    <property name="Top">422</property>
    <property name="Width">35</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Registros.</property>
    <property name="Height">13</property>
    <property name="Left">357</property>
    <property name="Name">Label2</property>
    <property name="Top">422</property>
    <property name="Width">51</property>
  </object>
  <object class="CheckBox" name="CheckBox1" >
    <property name="Caption">Refresco automatico</property>
    <property name="Height">21</property>
    <property name="Left">10</property>
    <property name="Name">CheckBox1</property>
    <property name="Top">445</property>
    <property name="Width">274</property>
    <property name="OnClick">CheckBox1Click</property>
  </object>
  <object class="RichEdit" name="Descripcion" >
    <property name="Font">
    <property name="Size">9px</property>
    </property>
    <property name="Height">411</property>
    <property name="Left">582</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Descripcion</property>
    <property name="ParentFont">0</property>
    <property name="Toolbars">a:0:{}</property>
    <property name="Top">8</property>
    <property name="Width">544</property>
  </object>
  <object class="HiddenField" name="hIid" >
    <property name="Height">18</property>
    <property name="Left">483</property>
    <property name="Name">hIid</property>
    <property name="Top">234</property>
    <property name="Width">85</property>
  </object>
  <object class="HiddenField" name="hdFecha" >
    <property name="Height">18</property>
    <property name="Left">483</property>
    <property name="Name">hdFecha</property>
    <property name="Top">260</property>
    <property name="Width">83</property>
  </object>
  <object class="Button" name="cmdAnalizar" >
    <property name="Caption">Ver Valores
de Campos</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    </property>
    <property name="Height">70</property>
    <property name="Left">483</property>
    <property name="Name">cmdAnalizar</property>
    <property name="ParentFont">0</property>
    <property name="Top">156</property>
    <property name="Width">83</property>
    <property name="OnClick">cmdAnalizarClick</property>
  </object>
  <object class="Query" name="qryMensajesSincronizacion" >
        <property name="Left">176</property>
        <property name="Top">240</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryMensajesSincronizacion</property>
    <property name="Order"></property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:3:{i:0;s:7:&quot;select &quot;;i:1;s:1:&quot;*&quot;;i:2;s:14:&quot;from smensajes&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dsMensajesSincronizacion" >
        <property name="Left">328</property>
        <property name="Top">240</property>
    <property name="DataSet">qryMensajesSincronizacion</property>
    <property name="Name">dsMensajesSincronizacion</property>
  </object>
  <object class="Timer" name="Timer1" >
        <property name="Left">288</property>
        <property name="Top">328</property>
    <property name="Enabled">0</property>
    <property name="Interval">5000</property>
    <property name="Name">Timer1</property>
    <property name="jsOnTimer">Timer1JSTimer</property>
  </object>
  <object class="CheckBox" name="CheckBox2" >
    <property name="Caption">Mostrar solo operaciones satisfactorias</property>
    <property name="Height">21</property>
    <property name="Left">10</property>
    <property name="Name">CheckBox2</property>
    <property name="Top">469</property>
    <property name="Width">275</property>
    <property name="OnClick">CheckBox1Click</property>
  </object>
</object>
?>
