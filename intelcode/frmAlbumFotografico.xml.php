<?php
<object class="frmAlbumFotografico" name="frmAlbumFotografico" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Album Fotografico / Tiempos Muertos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">450</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmAlbumFotografico</property>
  <property name="Width">590</property>
  <property name="OnShow">frmAlbumFotograficoShow</property>
  <object class="Button" name="cmdIrFotografico" >
    <property name="Caption">Reporte Fotografico/Tiempos Muertos</property>
    <property name="Color">#FFFFFF</property>
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">9px</property>
    </property>
    <property name="Height">25</property>
    <property name="Layer">Album Fotografico/Tiempos Muertos</property>
    <property name="Left">196</property>
    <property name="Name">cmdIrFotografico</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1</property>
    <property name="Width">190</property>
  </object>
  <object class="Button" name="cmdIrGerencial" >
    <property name="Caption">Reporte Gerencial</property>
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">9px</property>
    </property>
    <property name="Height">25</property>
    <property name="Layer">Album Fotografico/Tiempos Muertos</property>
    <property name="Left">6</property>
    <property name="Name">cmdIrGerencial</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1</property>
    <property name="Width">190</property>
    <property name="jsOnClick">cmdIrGerencialJSClick</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#000040</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel1</property>
    <property name="Color">#FFFFFF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">415</property>
    <property name="Left">5</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">27</property>
    <property name="Width">580</property>
    <object class="CheckBox" name="chkPorContrato" >
      <property name="Caption">Consolidar por Contrato</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">72</property>
      <property name="Name">chkPorContrato</property>
      <property name="ParentColor">0</property>
      <property name="Top">341</property>
      <property name="Width">160</property>
    </object>
    <object class="CheckBox" name="chkTiemposMuertos" >
      <property name="Caption">Solo Tiempos Muertos</property>
      <property name="Checked">1</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">chkTiemposMuertos</property>
      <property name="ParentColor">0</property>
      <property name="Top">317</property>
      <property name="Width">160</property>
    </object>
    <object class="ComboBox" name="cmbOrdenTiempos" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">76</property>
      <property name="Name">cmbOrdenTiempos</property>
      <property name="ParentColor">0</property>
      <property name="Top">288</property>
      <property name="Width">154</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">No. Orden</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">11</property>
      <property name="Name">Label13</property>
      <property name="ParentColor">0</property>
      <property name="Top">290</property>
      <property name="Width">63</property>
    </object>
    <object class="Label" name="Label12" >
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
      <property name="Left">8</property>
      <property name="Name">Label12</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">260</property>
      <property name="Width">267</property>
    </object>
    <object class="RadioGroup" name="optReportesDiarios" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">80</property>
      <property name="Items"><![CDATA[a:4:{i:0;s:26:&quot;Comentarios/Notas de Obras&quot;;i:1;s:33:&quot;Detalle de Generacion por Periodo&quot;;i:2;s:33:&quot;Resumen de Generacion por Periodo&quot;;i:3;s:19:&quot;Analisis Financiero&quot;;}]]></property>
      <property name="Left">8</property>
      <property name="Name">optReportesDiarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">173</property>
      <property name="Width">304</property>
    </object>
    <object class="ComboBox" name="cmbOrdenDiarios" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">76</property>
      <property name="Name">cmbOrdenDiarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">138</property>
      <property name="Width">149</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption">No. Orden</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">9</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="Top">141</property>
      <property name="Width">63</property>
    </object>
    <object class="Label" name="Label10" >
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
      <property name="Left">8</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">113</property>
      <property name="Width">262</property>
    </object>
    <object class="Button" name="cmdReportesDiarios" >
      <property name="Caption">cmdReportesDiarios</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Left">237</property>
      <property name="Name">cmdReportesDiarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">137</property>
      <property name="Width">32</property>
    </object>
    <object class="DateTimePicker" name="FechaFinal" >
      <property name="Caption">Fecha De Termino de Impresion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">160</property>
      <property name="Name">FechaFinal</property>
      <property name="Top">87</property>
      <property name="Width">111</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">F. Termino de Impresion</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">10</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="Top">85</property>
      <property name="Width">145</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">F. Inicio de Impresion</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">22</property>
      <property name="Left">10</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="Top">55</property>
      <property name="Width">127</property>
    </object>
    <object class="DateTimePicker" name="FechaInicio" >
      <property name="Caption">Fecha de Inicio de Impresion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">22</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">160</property>
      <property name="Name">FechaInicio</property>
      <property name="Top">55</property>
      <property name="Width">111</property>
    </object>
    <object class="Label" name="Label7" >
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
      <property name="Left">10</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">33</property>
      <property name="Width">260</property>
    </object>
    <object class="Label" name="Label16" >
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
      <property name="Left">276</property>
      <property name="Name">Label16</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">33</property>
      <property name="Width">299</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Caption">Seleccionar las Ordenes de Trabajo:</property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">288</property>
      <property name="Name">Label15</property>
      <property name="ParentColor">0</property>
      <property name="Top">50</property>
      <property name="Width">248</property>
    </object>
    <object class="ListBox" name="listaNumeroOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">176</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">288</property>
      <property name="MultiSelect">1</property>
      <property name="Name">listaNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">65</property>
      <property name="Width">203</property>
    </object>
    <object class="Button" name="cmdFotografico" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Left">505</property>
      <property name="Name">cmdFotografico</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">32</property>
      <property name="jsOnClick">cmdFotograficoJSClick</property>
    </object>
    <object class="Label" name="Label14" >
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
      <property name="Left">280</property>
      <property name="Name">Label14</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">260</property>
      <property name="Width">295</property>
    </object>
    <object class="CheckBox" name="CheckBox1" >
      <property name="Caption">Comparativo por Lugar donde Pernocta el Personal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">284</property>
      <property name="Name">CheckBox1</property>
      <property name="ParentColor">0</property>
      <property name="Top">287</property>
      <property name="Width">256</property>
    </object>
    <object class="CheckBox" name="CheckBox2" >
      <property name="Caption">Comparativo por Donde Labora el Personal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">285</property>
      <property name="Name">CheckBox2</property>
      <property name="ParentColor">0</property>
      <property name="Top">323</property>
      <property name="Width">264</property>
    </object>
    <object class="CheckBox" name="CheckBox3" >
      <property name="Caption">Detalle Diario de Personal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">285</property>
      <property name="Name">CheckBox3</property>
      <property name="ParentColor">0</property>
      <property name="Top">352</property>
      <property name="Width">264</property>
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
      <property name="Left">242</property>
      <property name="Name">cmdTiempos</property>
      <property name="ParentColor">0</property>
      <property name="Top">286</property>
      <property name="Width">32</property>
      <property name="jsOnClick">cmdTiemposJSClick</property>
    </object>
    <object class="Button" name="cmdPersonal" >
      <property name="Caption">cmdPersonal</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="ImageSource">Modulos/imagenes/impresora.png</property>
      <property name="Left">505</property>
      <property name="Name">cmdPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">286</property>
      <property name="Width">32</property>
    </object>
  </object>
</object>
?>
