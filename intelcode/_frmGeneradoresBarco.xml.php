<?php
<object class="FrmGeneradoresBarco" name="frmGeneradoresBarco" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Unit1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmGeneradoresBarco</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">frmGeneradoresBarcoShow</property>
  <object class="Label" name="Label8" >
    <property name="Caption">Label8</property>
    <property name="Height">24</property>
    <property name="Left">104</property>
    <property name="Name">Label8</property>
    <property name="Top">408</property>
    <property name="Width">128</property>
  </object>
  <object class="GroupBox" name="GroupBox1" >
    <property name="Caption">Opciones</property>
    <property name="Height">303</property>
    <property name="Left">12</property>
    <property name="Name">GroupBox1</property>
    <property name="Top">104</property>
    <property name="Width">626</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Generadores de Obra (Volumenes)</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
            <property name="Color">#0000FF</property>
            <property name="Style">fsItalic</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">10</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">19</property>
      <property name="Width">216</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Generadores de Obra (Importes)</property>
      <property name="Color">#EAEAEA</property>
      <property name="Font">
            <property name="Color">#0000FF</property>
            <property name="Style">fsItalic</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">378</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">19</property>
      <property name="Width">216</property>
    </object>
    <object class="RadioButton" name="RadioButton24" >
      <property name="Caption">Generador General de Barco</property>
      <property name="Checked">1</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton24</property>
      <property name="ParentColor">0</property>
      <property name="Top">31</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton25" >
      <property name="Caption">Generador de Barco por Tipo de Obra</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton25</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton1" >
      <property name="Caption">Generador de Barco por Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton1</property>
      <property name="ParentColor">0</property>
      <property name="Top">74</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton2" >
      <property name="Caption">Generador de Barco por Fase</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton2</property>
      <property name="ParentColor">0</property>
      <property name="Top">95</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton3" >
      <property name="Caption">Generador de Equipos por Tipo de Obra</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton3</property>
      <property name="ParentColor">0</property>
      <property name="Top">117</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton4" >
      <property name="Caption">Generador de Equipos por Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton4</property>
      <property name="ParentColor">0</property>
      <property name="Top">138</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton5" >
      <property name="Caption">Generador de Personal por Tipo de Obra</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton5</property>
      <property name="ParentColor">0</property>
      <property name="Top">162</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton6" >
      <property name="Caption">Generador de Personal por Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton6</property>
      <property name="ParentColor">0</property>
      <property name="Top">184</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton7" >
      <property name="Caption">Generador de Pernoctas por Tipo de Obra</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton7</property>
      <property name="ParentColor">0</property>
      <property name="Top">205</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton8" >
      <property name="Caption">Generador de Pernoctas por Plataformas</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton8</property>
      <property name="ParentColor">0</property>
      <property name="Top">226</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton9" >
      <property name="Caption">Reporte de Tripulacion Diaria</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton9</property>
      <property name="ParentColor">0</property>
      <property name="Top">247</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton10" >
      <property name="Caption">Reporte de Tripulacion Por Grupo</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">9</property>
      <property name="Name">RadioButton10</property>
      <property name="ParentColor">0</property>
      <property name="Top">268</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton11" >
      <property name="Caption">Hoja Seguimiento Generador Barco</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton11</property>
      <property name="ParentColor">0</property>
      <property name="Top">268</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton12" >
      <property name="Caption">Estimacion x Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton12</property>
      <property name="ParentColor">0</property>
      <property name="Top">247</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton13" >
      <property name="Caption">Estimacion  x Orden</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton13</property>
      <property name="ParentColor">0</property>
      <property name="Top">226</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton14" >
      <property name="Caption">Generador de Pernoctas x Orden</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton14</property>
      <property name="ParentColor">0</property>
      <property name="Top">205</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton15" >
      <property name="Caption">Generador de Materiales por Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton15</property>
      <property name="ParentColor">0</property>
      <property name="Top">184</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton16" >
      <property name="Caption">Generador de Personal x Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton16</property>
      <property name="ParentColor">0</property>
      <property name="Top">162</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton17" >
      <property name="Caption">Generador de Personal x Orden</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton17</property>
      <property name="ParentColor">0</property>
      <property name="Top">138</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton18" >
      <property name="Caption">Generador de Equipos x Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton18</property>
      <property name="ParentColor">0</property>
      <property name="Top">117</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton19" >
      <property name="Caption">Generador de Equipos x Orden</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton19</property>
      <property name="ParentColor">0</property>
      <property name="Top">95</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton20" >
      <property name="Caption">Generador de Barco x Plataforma</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton20</property>
      <property name="ParentColor">0</property>
      <property name="Top">74</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton21" >
      <property name="Caption">Generador de Barco x Orden</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton21</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">264</property>
    </object>
    <object class="RadioButton" name="RadioButton22" >
      <property name="Caption">Generador General de Barco</property>
      <property name="Color">#EAEAEA</property>
      <property name="Group">RB</property>
      <property name="Height">21</property>
      <property name="Left">350</property>
      <property name="Name">RadioButton22</property>
      <property name="ParentColor">0</property>
      <property name="Top">31</property>
      <property name="Width">264</property>
    </object>
  </object>
  <object class="ComboBox" name="Plataforma" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">215</property>
    <property name="Name">Plataforma</property>
    <property name="Top">78</property>
    <property name="Width">185</property>
  </object>
  <object class="ComboBox" name="Optativa" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">215</property>
    <property name="Name">Optativa</property>
    <property name="Top">59</property>
    <property name="Width">185</property>
    <property name="jsOnChange">OptativaJSChange</property>
  </object>
  <object class="CheckBox" name="SeCobra" >
    <property name="Caption">Se Cobra?</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">21</property>
    <property name="Left">438</property>
    <property name="Name">SeCobra</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">136</property>
  </object>
  <object class="CheckBox" name="PersonalCategoria" >
    <property name="Caption">Genera Personal Por Categoria</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">21</property>
    <property name="Left">435</property>
    <property name="Name">PersonalCategoria</property>
    <property name="ParentColor">0</property>
    <property name="Top">72</property>
    <property name="Width">195</property>
  </object>
  <object class="CheckBox" name="PU" >
    <property name="Caption">P.U.</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">21</property>
    <property name="Left">572</property>
    <property name="Name">PU</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">58</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Formato del documento:</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">13</property>
    <property name="Left">334</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">12</property>
    <property name="Width">139</property>
  </object>
  <object class="ComboBox" name="sFormato" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;pdf&quot;;s:24:&quot;Documento Portable (PDF)&quot;;s:3:&quot;xls&quot;;s:23:&quot;Hoja de Calculo (Excel)&quot;;}]]></property>
    <property name="Left">488</property>
    <property name="Name">sFormato</property>
    <property name="Top">17</property>
    <property name="Width">144</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fuente Plataforma:</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">191</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Numero de Optativa/Programada:</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">61</property>
    <property name="Width">191</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Fecha Final:</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">13</property>
    <property name="Left">14</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Fecha Inicio:</property>
    <property name="Color">#EAEAEA</property>
    <property name="Height">13</property>
    <property name="Left">14</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="Top">24</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Height">23</property>
    <property name="Left">563</property>
    <property name="Name">cmdImprimir</property>
    <property name="Top">416</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="DateTimePicker" name="dFechaInicio" >
    <property name="Caption">dFechaInicio</property>
    <property name="Height">17</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">213</property>
    <property name="Name">dFechaInicio</property>
    <property name="Top">14</property>
    <property name="Width">99</property>
  </object>
  <object class="DateTimePicker" name="dFechaFinal" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">213</property>
    <property name="Name">dFechaFinal</property>
    <property name="Top">38</property>
    <property name="Width">99</property>
  </object>
</object>
?>
