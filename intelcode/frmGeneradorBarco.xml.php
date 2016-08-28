<?php
<object class="FrmGeneradorBarco" name="FrmGeneradorBarco" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">FrmGeneradorBarco</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">760</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmGeneradorBarco</property>
  <property name="UseAjax">1</property>
  <property name="Width">912</property>
  <property name="OnShow">FrmGeneradorBarcoShow</property>
  <object class="Label" name="Label8" >
    <property name="Caption">Formato del documento:</property>
    <property name="Color">#EAEAEA</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">68</property>
    <property name="Left">6</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="Top">452</property>
    <property name="Width">650</property>
  </object>
  <object class="Window" name="Window1" >
    <property name="Caption">Generadores de Barco</property>
    <property name="Height">440</property>
    <property name="Name">Window1</property>
    <property name="Width">656</property>
    <object class="ComboBox" name="Optativa" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">215</property>
      <property name="Name">Optativa</property>
      <property name="Top">75</property>
      <property name="Width">185</property>
      <property name="jsOnChange">OptativaJSChange</property>
    </object>
    <object class="ComboBox" name="Plataforma" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">215</property>
      <property name="Name">Plataforma</property>
      <property name="Top">94</property>
      <property name="Width">185</property>
    </object>
    <object class="DateTimePicker" name="dFechaFinal" >
      <property name="Caption">dFechaFinal</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">215</property>
      <property name="Name">dFechaFinal</property>
      <property name="Top">51</property>
      <property name="Width">118</property>
    </object>
    <object class="DateTimePicker" name="dFechaInicio" >
      <property name="Caption">dFechaInicio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">215</property>
      <property name="Name">dFechaInicio</property>
      <property name="Top">26</property>
      <property name="Width">118</property>
    </object>
    <object class="CheckBox" name="PersonalCategoria" >
      <property name="Caption">Genera Personal Por Categoria</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">409</property>
      <property name="Name">PersonalCategoria</property>
      <property name="ParentColor">0</property>
      <property name="Top">88</property>
      <property name="Visible">0</property>
      <property name="Width">224</property>
    </object>
    <object class="CheckBox" name="SeCobra" >
      <property name="Caption">Se Cobra?</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">535</property>
      <property name="Name">SeCobra</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Visible">0</property>
      <property name="Width">91</property>
    </object>
    <object class="CheckBox" name="PU" >
      <property name="Caption">P.U.</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">535</property>
      <property name="Name">PU</property>
      <property name="ParentColor">0</property>
      <property name="Top">70</property>
      <property name="Visible">0</property>
      <property name="Width">58</property>
    </object>
    <object class="ComboBox" name="sFormato" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:3:&quot;pdf&quot;;s:3:&quot;xls&quot;;s:3:&quot;xls&quot;;}]]></property>
      <property name="Left">471</property>
      <property name="Name">sFormato</property>
      <property name="Top">26</property>
      <property name="Width">45</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Formato del documento:</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">398</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">29</property>
      <property name="Width">139</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Fecha Inicio:</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">134</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="Top">32</property>
      <property name="Width">74</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Fecha Final:</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">138</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">58</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Numero de Optativa/Programada:</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">191</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Fuente Plataforma:</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">15</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="Top">99</property>
      <property name="Width">191</property>
    </object>
    <object class="GroupBox" name="GroupBox1" >
      <property name="Caption">Opciones</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">303</property>
      <property name="Left">20</property>
      <property name="Name">GroupBox1</property>
      <property name="ParentColor">0</property>
      <property name="Top">113</property>
      <property name="Width">626</property>
      <object class="Label" name="Label9" >
        <property name="Caption">Generadores de Obra (Volumenes)</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Style">fsItalic</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">16</property>
        <property name="Left">10</property>
        <property name="Name">Label9</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">19</property>
        <property name="Width">216</property>
      </object>
      <object class="Label" name="Label1" >
        <property name="Caption">Generadores de Obra (Importes)</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Style">fsItalic</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">16</property>
        <property name="Left">378</property>
        <property name="Name">Label1</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">19</property>
        <property name="Width">216</property>
      </object>
      <object class="RadioButton" name="RadioButton23" >
        <property name="Caption">Generador General de Barco</property>
        <property name="Checked">1</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton23</property>
        <property name="ParentColor">0</property>
        <property name="Top">31</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton24" >
        <property name="Caption">Generador de Barco por Tipo de Obra</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton24</property>
        <property name="ParentColor">0</property>
        <property name="Top">52</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton25" >
        <property name="Caption">Generador de Barco por Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton25</property>
        <property name="ParentColor">0</property>
        <property name="Top">74</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton1" >
        <property name="Caption">Generador de Barco por Fase</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton1</property>
        <property name="ParentColor">0</property>
        <property name="Top">95</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton2" >
        <property name="Caption">Generador de Equipos por Tipo de Obra</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton2</property>
        <property name="ParentColor">0</property>
        <property name="Top">117</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton3" >
        <property name="Caption">Generador de Equipos por Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton3</property>
        <property name="ParentColor">0</property>
        <property name="Top">138</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton4" >
        <property name="Caption">Generador de Personal por Tipo de Obra</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton4</property>
        <property name="ParentColor">0</property>
        <property name="Top">162</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton5" >
        <property name="Caption">Generador de Personal por Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton5</property>
        <property name="ParentColor">0</property>
        <property name="Top">184</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton6" >
        <property name="Caption">Generador de Pernoctas por Tipo de Obra</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton6</property>
        <property name="ParentColor">0</property>
        <property name="Top">205</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton7" >
        <property name="Caption">Generador de Pernoctas por Plataformas</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton7</property>
        <property name="ParentColor">0</property>
        <property name="Top">226</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton8" >
        <property name="Caption">Reporte de Tripulacion Diaria</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton8</property>
        <property name="ParentColor">0</property>
        <property name="Top">247</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton9" >
        <property name="Caption">Reporte de Tripulacion Por Grupo</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">9</property>
        <property name="Name">RadioButton9</property>
        <property name="ParentColor">0</property>
        <property name="Top">268</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton10" >
        <property name="Caption">Hoja Seguimiento Generador Barco</property>
        <property name="Color">#E7E6E2</property>
        <property name="Enabled">0</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton10</property>
        <property name="ParentColor">0</property>
        <property name="Top">268</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton11" >
        <property name="Caption">Estimacion x Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Enabled">0</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton11</property>
        <property name="ParentColor">0</property>
        <property name="Top">247</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton12" >
        <property name="Caption">Estimacion  x Orden</property>
        <property name="Color">#E7E6E2</property>
        <property name="Enabled">0</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton12</property>
        <property name="ParentColor">0</property>
        <property name="Top">226</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton13" >
        <property name="Caption">Generador de Pernoctas x Orden</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton13</property>
        <property name="ParentColor">0</property>
        <property name="Top">183</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton14" >
        <property name="Caption">Generador de Pernoctas x Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton14</property>
        <property name="ParentColor">0</property>
        <property name="Top">207</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton15" >
        <property name="Caption">Generador de Personal x Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton15</property>
        <property name="ParentColor">0</property>
        <property name="Top">162</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton16" >
        <property name="Caption">Generador de Personal x Orden</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton16</property>
        <property name="ParentColor">0</property>
        <property name="Top">138</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton17" >
        <property name="Caption">Generador de Equipos x Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton17</property>
        <property name="ParentColor">0</property>
        <property name="Top">117</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton18" >
        <property name="Caption">Generador de Equipos x Orden</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton18</property>
        <property name="ParentColor">0</property>
        <property name="Top">95</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton19" >
        <property name="Caption">Generador de Barco x Plataforma</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton19</property>
        <property name="ParentColor">0</property>
        <property name="Top">74</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton20" >
        <property name="Caption">Generador de Barco x Orden</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton20</property>
        <property name="ParentColor">0</property>
        <property name="Top">52</property>
        <property name="Width">264</property>
      </object>
      <object class="RadioButton" name="RadioButton21" >
        <property name="Caption">Generador General de Barco v</property>
        <property name="Color">#E7E6E2</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Group">RB</property>
        <property name="Height">21</property>
        <property name="Left">350</property>
        <property name="Name">RadioButton21</property>
        <property name="ParentColor">0</property>
        <property name="Top">31</property>
        <property name="Width">264</property>
      </object>
    </object>
    <object class="Button" name="cmdImprimir" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">571</property>
      <property name="Name">cmdImprimir</property>
      <property name="Top">414</property>
      <property name="Width">75</property>
      <property name="jsOnClick">cmdImprimirJSClick</property>
    </object>
    <object class="CheckBox" name="AplicaVigenciaBarco" >
      <property name="Caption">Aplica Vigencia Barco?</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">398</property>
      <property name="Name">AplicaVigenciaBarco</property>
      <property name="ParentColor">0</property>
      <property name="Top">54</property>
      <property name="Width">144</property>
    </object>
  </object>
</object>
?>
