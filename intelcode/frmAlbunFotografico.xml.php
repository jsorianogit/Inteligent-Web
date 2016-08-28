<?php
<object class="frmAlbunFotografico" name="frmAlbunFotografico" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit2</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">448</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmAlbunFotografico</property>
  <property name="Width">696</property>
  <property name="OnShow">frmAlbunFotograficoShow</property>
  <object class="PageControl" name="PageControl1" >
    <property name="ActiveLayer">Tiempos Muertos / Albun Fotografico</property>
    <property name="Height">416</property>
    <property name="Left">8</property>
    <property name="Name">PageControl1</property>
    <property name="TabIndex">1</property>
    <property name="Tabs"><![CDATA[a:2:{i:0;s:17:&quot;Reporte Gerencial&quot;;i:1;s:35:&quot;Tiempos Muertos / Albun Fotografico&quot;;}]]></property>
    <property name="Top">8</property>
    <property name="Width">656</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Seleccion del Periodo</property>
      <property name="Color">#2D5A9F</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Style">fsNormal</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">8</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">56</property>
      <property name="Width">304</property>
    </object>
    <object class="Panel" name="Panel1" >
      <property name="Color">#FFFFFF</property>
      <property name="Dynamic"></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">80</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">8</property>
      <property name="Name">Panel1</property>
      <property name="ParentColor">0</property>
      <property name="Top">72</property>
      <property name="Width">304</property>
      <object class="Label" name="Label2" >
        <property name="Caption">Fecha de Inicio de Impresion</property>
        <property name="Color">#FFFFFF</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">16</property>
        <property name="Left">8</property>
        <property name="Name">Label2</property>
        <property name="ParentColor">0</property>
        <property name="Top">8</property>
        <property name="Width">168</property>
      </object>
      <object class="Label" name="Label3" >
        <property name="Caption">Fecha de Termino de Impresion</property>
        <property name="Color">#FFFFFF</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">13</property>
        <property name="Left">9</property>
        <property name="Name">Label3</property>
        <property name="ParentColor">0</property>
        <property name="Top">32</property>
        <property name="Width">183</property>
      </object>
      <object class="DateTimePicker" name="FechaInicio" >
        <property name="Caption">Fecha de Inicio de Impresion</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">16</property>
        <property name="IfFormat">%d/%m/%Y</property>
        <property name="Left">104</property>
        <property name="Name">FechaInicio</property>
        <property name="Top">8</property>
        <property name="Width">96</property>
      </object>
      <object class="DateTimePicker" name="FechaFinal" >
        <property name="Caption">Fecha De Termino de Impresion</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">17</property>
        <property name="IfFormat">%d/%m/%Y</property>
        <property name="Left">104</property>
        <property name="Name">FechaFinal</property>
        <property name="Top">32</property>
        <property name="Width">96</property>
      </object>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Reportes Diarios</property>
      <property name="Color">#000000</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Style">fsNormal</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">8</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">156</property>
      <property name="Width">304</property>
    </object>
    <object class="RadioGroup" name="optReportesDiarios" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">80</property>
      <property name="Items"><![CDATA[a:4:{i:0;s:26:&quot;Comentarios/Notas de Obras&quot;;i:1;s:33:&quot;Detalle de Generacion por Periodo&quot;;i:2;s:33:&quot;Resumen de Generacion por Periodo&quot;;i:3;s:19:&quot;Analisis Financiero&quot;;}]]></property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">8</property>
      <property name="Name">optReportesDiarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">216</property>
      <property name="Width">304</property>
    </object>
    <object class="ComboBox" name="cmbOrdenDiarios" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Items">a:0:{}</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">76</property>
      <property name="Name">cmbOrdenDiarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">181</property>
      <property name="Width">164</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">No. Orden</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">9</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">184</property>
      <property name="Width">63</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Tiempos Muertos</property>
      <property name="Color">#000000</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Style">fsNormal</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">8</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">303</property>
      <property name="Width">304</property>
    </object>
    <object class="ComboBox" name="cmbOrdenTiempos" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">76</property>
      <property name="Name">cmbOrdenTiempos</property>
      <property name="ParentColor">0</property>
      <property name="Top">331</property>
      <property name="Width">164</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">No. Orden</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">11</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">333</property>
      <property name="Width">63</property>
    </object>
    <object class="CheckBox" name="chkTiemposMuertos" >
      <property name="Caption">Solo Tiempos Muertos</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">72</property>
      <property name="Name">chkTiemposMuertos</property>
      <property name="ParentColor">0</property>
      <property name="Top">360</property>
      <property name="Width">160</property>
    </object>
    <object class="CheckBox" name="chkPorContrato" >
      <property name="Caption">Consolidar por Contrato</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">72</property>
      <property name="Name">chkPorContrato</property>
      <property name="ParentColor">0</property>
      <property name="Top">384</property>
      <property name="Width">160</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Album Fotografico</property>
      <property name="Color">#000000</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Style">fsNormal</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">56</property>
      <property name="Width">304</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Distribucion de Personal</property>
      <property name="Color">#000000</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Style">fsNormal</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">303</property>
      <property name="Width">304</property>
    </object>
    <object class="CheckBox" name="CheckBox1" >
      <property name="Caption">Comparativo por Lugar donde Pernocta el Personal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="Name">CheckBox1</property>
      <property name="ParentColor">0</property>
      <property name="Top">325</property>
      <property name="Width">256</property>
    </object>
    <object class="CheckBox" name="CheckBox2" >
      <property name="Caption">Comparativo por Donde Labora el Personal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="Name">CheckBox2</property>
      <property name="ParentColor">0</property>
      <property name="Top">359</property>
      <property name="Width">264</property>
    </object>
    <object class="CheckBox" name="CheckBox3" >
      <property name="Caption">Detalle Diario de Personal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="Name">CheckBox3</property>
      <property name="ParentColor">0</property>
      <property name="Top">385</property>
      <property name="Width">264</property>
    </object>
    <object class="ListBox" name="listaNumeroOrden" >
      <property name="Color">#D0DDF0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">192</property>
      <property name="Items">a:0:{}</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="MultiSelect">1</property>
      <property name="Name">listaNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">104</property>
      <property name="Width">246</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">Seleccionar las Ordenes de Trabajo:</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">328</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="Top">88</property>
      <property name="Width">248</property>
    </object>
    <object class="Button" name="cmdFotografico" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">581</property>
      <property name="Name">cmdFotografico</property>
      <property name="ParentColor">0</property>
      <property name="Top">104</property>
      <property name="Width">32</property>
      <property name="jsOnClick">cmdFotograficoJSClick</property>
    </object>
    <object class="Button" name="cmdPersonal" >
      <property name="Caption">cmdPersonal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">581</property>
      <property name="Name">cmdPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">329</property>
      <property name="Width">32</property>
    </object>
    <object class="Button" name="cmdTiempos" >
      <property name="Caption">cmdTiempos</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">272</property>
      <property name="Name">cmdTiempos</property>
      <property name="ParentColor">0</property>
      <property name="Top">329</property>
      <property name="Width">32</property>
    </object>
    <object class="Button" name="cmdReportesDiarios" >
      <property name="Caption">cmdReportesDiarios</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Layer">Tiempos Muertos / Albun Fotografico</property>
      <property name="Left">272</property>
      <property name="Name">cmdReportesDiarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">185</property>
      <property name="Width">32</property>
    </object>
  </object>
</object>
?>
