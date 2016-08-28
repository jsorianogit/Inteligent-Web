<?php
<object class="Unit1" name="Unit1" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">467</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit1</property>
  <property name="Width">1064</property>
  <property name="OnShow">Unit1Show</property>
  <object class="GroupBox" name="GroupBox1" >
    <property name="Caption">Avances</property>
    <property name="Height">427</property>
    <property name="Left">7</property>
    <property name="Name">GroupBox1</property>
    <property name="Top">11</property>
    <property name="Width">435</property>
    <object class="DBGrid" name="DBGrid1" >
      <property name="Columns"><![CDATA[a:5:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:7:&quot;#C0C0C0&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:2:&quot;25&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;% Prog&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;dProgramado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;% Prog. Acum.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:20:&quot;dProgramadoAcumulado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;% Fisico&quot;;s:5:&quot;Color&quot;;s:7:&quot;#9ACD32&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;dFisico&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;% Fisico Acum.&quot;;s:5:&quot;Color&quot;;s:7:&quot;#9ACD32&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;dFisicoAcumulado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">347</property>
      <property name="Left">8</property>
      <property name="Name">DBGrid1</property>
      <property name="Top">22</property>
      <property name="Width">419</property>
    </object>
    <object class="Button" name="Button1" >
      <property name="Caption">Button1</property>
      <property name="Height">25</property>
      <property name="Left">348</property>
      <property name="Name">Button1</property>
      <property name="Top">373</property>
      <property name="Width">75</property>
      <property name="jsOnClick">Button1JSClick</property>
    </object>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">278</property>
        <property name="Top">199</property>
    <property name="DataSet">StoredProc1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">135</property>
        <property name="Top">335</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:41:&quot;call procAvancesContrato(&quot;ot-12.b.1&quot;,&quot;&quot;);&quot;;}]]></property>
  </object>
  <object class="Query" name="Query2" >
        <property name="Left">130</property>
        <property name="Top">275</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="StoredProc" name="StoredProc1" >
        <property name="Left">138</property>
        <property name="Top">215</property>
    <property name="Database">Connection.base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">StoredProc1</property>
    <property name="Params">a:0:{}</property>
    <property name="StoredProcName">procAvancesContrato</property>
  </object>
</object>
?>
