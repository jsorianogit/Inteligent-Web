<?php
<object class="FrmGeneracionInformes" name="FrmGeneracionInformes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">frmGeneracionInformes</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">488</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmGeneracionInformes</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">FrmGeneracionInformesBeforeShow</property>
  <property name="jsOnLoad">FrmGeneracionInformesJSLoad</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#C0C0C0</property>
    <property name="BorderWidth">3</property>
    <property name="Caption">Panel1</property>
    <property name="Color">#E9E9E9</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">435</property>
    <property name="Left">9</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">5</property>
    <property name="Width">500</property>
    <object class="GroupBox" name="GroupBox1" >
      <property name="Caption">Parametros</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">138</property>
      <property name="Left">6</property>
      <property name="Name">GroupBox1</property>
      <property name="Top">20</property>
      <property name="Width">485</property>
      <object class="DateTimePicker" name="txtFecha" >
        <property name="Caption">txtFecha</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">22</property>
        <property name="IfFormat">%Y-%m-%d</property>
        <property name="Left">123</property>
        <property name="Name">txtFecha</property>
        <property name="Text">2009-04-14 09:41</property>
        <property name="Top">20</property>
        <property name="Width">99</property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox2" >
      <property name="Caption">Reporte de Avance de Obra</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">224</property>
      <property name="Left">7</property>
      <property name="Name">GroupBox2</property>
      <property name="Top">171</property>
      <property name="Width">255</property>
      <object class="Button" name="cmdStatus" >
        <property name="Caption">Status de Conceptos</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdStatus</property>
        <property name="Top">20</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdStatusJSClick</property>
      </object>
      <object class="Button" name="cmdReportadoVsGenerado" >
        <property name="Caption">Reportado Vs Generado</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdReportadoVsGenerado</property>
        <property name="Top">45</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdReportadoVsGeneradoJSClick</property>
      </object>
      <object class="Button" name="cmdAnexoVsGenerado" >
        <property name="Caption">Cantidad Anexo Vs Generado</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdAnexoVsGenerado</property>
        <property name="Top">70</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdAnexoVsGeneradoJSClick</property>
      </object>
      <object class="Button" name="cmdAnexoVsEstimaciones" >
        <property name="Caption">Cantidad Anexo Vs Estimaciones</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdAnexoVsEstimaciones</property>
        <property name="Top">94</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdAnexoVsEstimacionesJSClick</property>
      </object>
      <object class="Button" name="cmdAnexoVsEstimacionesSub" >
        <property name="Caption">Cantidad Anexo Vs Estimaciones SubContratos</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdAnexoVsEstimacionesSub</property>
        <property name="ParentFont">0</property>
        <property name="Top">118</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdAnexoVsEstimacionesSubJSClick</property>
      </object>
      <object class="Button" name="cmdRetraso" >
        <property name="Caption">Partidas Con Retraso</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdRetraso</property>
        <property name="Top">144</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdRetrasoJSClick</property>
      </object>
      <object class="Button" name="cmdSuministro" >
        <property name="Caption">Concentrados de Suministros</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">cmdSuministro</property>
        <property name="Top">167</property>
        <property name="Width">245</property>
        <property name="jsOnClick">cmdSuministroJSClick</property>
      </object>
      <object class="Button" name="btnrecxcon" >
        <property name="Caption">Recursos Por Concepto</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">25</property>
        <property name="Left">3</property>
        <property name="Name">btnrecxcon</property>
        <property name="Top">192</property>
        <property name="Width">245</property>
        <property name="jsOnClick">btnrecxconJSClick</property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox3" >
      <property name="Caption">Reporte de Generacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">98</property>
      <property name="Left">267</property>
      <property name="Name">GroupBox3</property>
      <property name="Top">179</property>
      <property name="Width">225</property>
      <object class="Button" name="cmdGeneracionxEstimacion" >
        <property name="Caption">Detalle de Generacion x Estimacion</property>
        <property name="Enabled">0</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">10</property>
        <property name="Name">cmdGeneracionxEstimacion</property>
        <property name="Top">40</property>
        <property name="Width">205</property>
      </object>
      <object class="Button" name="cmdGeneracionxTrinomio" >
        <property name="Caption">Acumulado de Generacion x Trinomio</property>
        <property name="Enabled">0</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">10</property>
        <property name="Name">cmdGeneracionxTrinomio</property>
        <property name="ParentFont">0</property>
        <property name="Top">64</property>
        <property name="Width">205</property>
      </object>
      <object class="Label" name="Label5" >
        <property name="Caption">No. Estimacion</property>
        <property name="Color">#E9E9E9</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">15</property>
        <property name="Left">10</property>
        <property name="Name">Label5</property>
        <property name="ParentColor">0</property>
        <property name="Top">20</property>
        <property name="Width">95</property>
      </object>
      <object class="ComboBox" name="cmbEstimacion" >
        <property name="Color">#FFFFFF</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Items">a:0:{}</property>
        <property name="Left">112</property>
        <property name="Name">cmbEstimacion</property>
        <property name="ParentColor">0</property>
        <property name="Top">15</property>
        <property name="Width">103</property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox4" >
      <property name="Caption">Costo de Instalacion (Personal/Equipo)</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">102</property>
      <property name="Left">267</property>
      <property name="Name">GroupBox4</property>
      <property name="ParentFont">0</property>
      <property name="Top">279</property>
      <property name="Width">225</property>
      <object class="Button" name="cmdPersonal" >
        <property name="Caption">Personal</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">170</property>
        <property name="Name">cmdPersonal</property>
        <property name="Top">24</property>
        <property name="Width">51</property>
        <property name="jsOnClick">cmdPersonalJSClick</property>
      </object>
      <object class="Button" name="cmdEquipo" >
        <property name="Caption">Equipo</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">168</property>
        <property name="Name">cmdEquipo</property>
        <property name="Top">54</property>
        <property name="Width">53</property>
        <property name="jsOnClick">cmdEquipoJSClick</property>
      </object>
      <object class="RadioGroup" name="RadioGroup1" >
        <property name="Color">#E9E9E9</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">9px</property>
        </property>
        <property name="Height">65</property>
        <property name="ItemIndex">0</property>
        <property name="Items"><![CDATA[a:2:{i:0;s:24:&quot;Cantidad Programada/Real&quot;;i:1;s:21:&quot;Costo Programado/Real&quot;;}]]></property>
        <property name="Left">8</property>
        <property name="Name">RadioGroup1</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">24</property>
        <property name="Width">155</property>
      </object>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Los Informes Presentados en Este Modulo Son Relacionados Al Convenio Con el que Fue Registrado el Reporte Diario En La Fecha Seleccionada</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">27</property>
      <property name="Left">10</property>
      <property name="Name">Label7</property>
      <property name="Top">400</property>
      <property name="Width">478</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Fecha:</property>
      <property name="Color">#E9E9E9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">15</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="Top">43</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Numero de Orden:</property>
      <property name="Color">#E9E9E9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">15</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="Top">69</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Filtrar Por:</property>
      <property name="Color">#E9E9E9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">15</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="Top">95</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Ordenar Por:</property>
      <property name="Color">#E9E9E9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">15</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">110</property>
    </object>
    <object class="ComboBox" name="cmbNumeroOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">129</property>
      <property name="Name">cmbNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">66</property>
      <property name="Width">340</property>
    </object>
    <object class="ComboBox" name="cmbFiltro" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items"><![CDATA[a:3:{s:5:&quot;TODAS&quot;;s:18:&quot;TODAS LAS PARTIDAS&quot;;s:7:&quot;RETRASO&quot;;s:11:&quot;CON RETRASO&quot;;s:10:&quot;DESFASADAS&quot;;s:10:&quot;DESFASADAS&quot;;}]]></property>
      <property name="Left">130</property>
      <property name="Name">cmbFiltro</property>
      <property name="ParentColor">0</property>
      <property name="Top">90</property>
      <property name="Width">340</property>
    </object>
    <object class="ComboBox" name="cmbOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items"><![CDATA[a:3:{s:5:&quot;ANEXO&quot;;s:9:&quot;ANEXO &quot;C&quot;&quot;;s:9:&quot;PONDERADO&quot;;s:9:&quot;PONDERADO&quot;;s:8:&quot;UNITARIO&quot;;s:15:&quot;PRECIO UNITARIO&quot;;}]]></property>
      <property name="Left">129</property>
      <property name="Name">cmbOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">118</property>
      <property name="Width">340</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Generacion de Informes</property>
      <property name="Color">#0000FF</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">500</property>
    </object>
    <object class="ComboBox" name="sFormato" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
      <property name="Left">423</property>
      <property name="Name">sFormato</property>
      <property name="Top">155</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Formado del reporte:</property>
      <property name="Color">#E9E9E9</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">267</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="Top">158</property>
      <property name="Width">155</property>
    </object>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="Caption">Panel2</property>
    <property name="Color">#AEAEFF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">179</property>
    <property name="Left">186</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">199</property>
    <property name="Width">147</property>
    <object class="GroupBox" name="GroupBox5" >
      <property name="Caption">Opciones</property>
      <property name="Color">#E4E4E4</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">159</property>
      <property name="Left">10</property>
      <property name="Name">GroupBox5</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">131</property>
      <object class="Button" name="cmdTerminadas" >
        <property name="Caption">Terminadas</property>
        <property name="Color">#B4B3CE</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">9</property>
        <property name="Name">cmdTerminadas</property>
        <property name="ParentColor">0</property>
        <property name="Top">31</property>
        <property name="Width">105</property>
        <property name="jsOnClick">cmdTerminadasJSClick</property>
      </object>
      <object class="Button" name="cmdAdicionales" >
        <property name="Caption">Adicionales</property>
        <property name="Color">#B4B3CE</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">9</property>
        <property name="Name">cmdAdicionales</property>
        <property name="ParentColor">0</property>
        <property name="Top">53</property>
        <property name="Width">105</property>
        <property name="jsOnClick">cmdAdicionalesJSClick</property>
      </object>
      <object class="Button" name="cmdGeneradas" >
        <property name="Caption">Generadas</property>
        <property name="Color">#B4B3CE</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">9</property>
        <property name="Name">cmdGeneradas</property>
        <property name="ParentColor">0</property>
        <property name="Top">75</property>
        <property name="Width">105</property>
        <property name="jsOnClick">cmdGeneradasJSClick</property>
      </object>
      <object class="Button" name="cmdSinTerminar" >
        <property name="Caption">Sin Terminar</property>
        <property name="Color">#B4B3CE</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">9</property>
        <property name="Name">cmdSinTerminar</property>
        <property name="ParentColor">0</property>
        <property name="Top">97</property>
        <property name="Width">106</property>
        <property name="jsOnClick">cmdSinTerminarJSClick</property>
      </object>
      <object class="Button" name="cmdSinGenerar" >
        <property name="Caption">Sin Generar</property>
        <property name="Color">#B4B3CE</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">19</property>
        <property name="Left">9</property>
        <property name="Name">cmdSinGenerar</property>
        <property name="ParentColor">0</property>
        <property name="Top">119</property>
        <property name="Width">106</property>
        <property name="jsOnClick">cmdSinGenerarJSClick</property>
      </object>
    </object>
  </object>
</object>
?>
