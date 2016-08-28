<?php
<object class="FrmDiarioBarco" name="FrmDiarioBarco" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">FrmDiarioBarco</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">576</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmDiarioBarco</property>
  <property name="Width">680</property>
  <object class="Window" name="Window1" >
    <property name="Caption">Reporte Diario de Barco</property>
    <property name="Height">464</property>
    <property name="Left">16</property>
    <property name="Name">Window1</property>
    <property name="Top">8</property>
    <property name="Width">600</property>
    <object class="BitBtn" name="BitBtn1" >
      <property name="ButtonLayout">blImageTop</property>
      <property name="Caption">(6) Numeros Generadores</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">70</property>
      <property name="ImageSource">recursos/imagenesMenu/BotonesBarco/numeros.png</property>
      <property name="Left">16</property>
      <property name="Name">BitBtn1</property>
      <property name="Top">384</property>
      <property name="Width">216</property>
      <property name="jsOnClick">BitBtn1JSClick</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Impresion de Numeros Generadores</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Color">#000040</property>
      <property name="Family">Verdana</property>
      <property name="LineHeight">1</property>
      <property name="Size">10px</property>
      <property name="Style">fsOblique</property>
      <property name="Variant">vaSmallCaps</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">68</property>
      <property name="Left">236</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">386</property>
      <property name="Width">348</property>
    </object>
    <object class="BitBtn" name="BitBtn2" >
      <property name="ButtonLayout">blImageTop</property>
      <property name="Caption">(1)Movtos. Barco</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Align">taLeft</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">70</property>
      <property name="ImageSource">recursos/imagenesMenu/BotonesBarco/captura.png</property>
      <property name="Left">16</property>
      <property name="Name">BitBtn2</property>
      <property name="ParentFont">0</property>
      <property name="Top">24</property>
      <property name="Width">216</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Captura Movimientos de Embarcacion</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Color">#000040</property>
      <property name="Family">Verdana</property>
      <property name="LineHeight">1</property>
      <property name="Size">10px</property>
      <property name="Style">fsOblique</property>
      <property name="Variant">vaSmallCaps</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">66</property>
      <property name="Left">236</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">28</property>
      <property name="Width">348</property>
    </object>
    <object class="BitBtn" name="BitBtn3" >
      <property name="ButtonLayout">blImageTop</property>
      <property name="Caption">(2)Tripulacion Diaria</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">70</property>
      <property name="ImageSource">recursos/imagenesMenu/BotonesBarco/tripulacion.png</property>
      <property name="Left">16</property>
      <property name="Name">BitBtn3</property>
      <property name="Top">96</property>
      <property name="Width">216</property>
    </object>
    <object class="BitBtn" name="BitBtn4" >
      <property name="ButtonLayout">blImageTop</property>
      <property name="Caption">(3)Prorrateo Personal con Barco</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">70</property>
      <property name="ImageSource">recursos/imagenesMenu/BotonesBarco/prorrateo.png</property>
      <property name="Left">16</property>
      <property name="Name">BitBtn4</property>
      <property name="Top">168</property>
      <property name="Width">216</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Carga de la Tripulacion</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Color">#000040</property>
      <property name="Family">Verdana</property>
      <property name="LineHeight">1</property>
      <property name="Size">10px</property>
      <property name="Style">fsOblique</property>
      <property name="Variant">vaSmallCaps</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">69</property>
      <property name="Left">236</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">97</property>
      <property name="Width">348</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption"><![CDATA[&lt;P&gt;Asignar Ordenes de Trabajo a los Movimientos de Embarcacion&lt;/P&gt;]]></property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Color">#000040</property>
      <property name="Family">Verdana</property>
      <property name="LineHeight">1</property>
      <property name="Size">10px</property>
      <property name="Style">fsOblique</property>
      <property name="Variant">vaSmallCaps</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">68</property>
      <property name="Left">236</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">170</property>
      <property name="Width">348</property>
    </object>
    <object class="BitBtn" name="BitBtn5" >
      <property name="ButtonLayout">blImageTop</property>
      <property name="Caption">(4)Pernoctas</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">70</property>
      <property name="ImageSource">recursos/imagenesMenu/BotonesBarco/pernoctas.png</property>
      <property name="Left">16</property>
      <property name="Name">BitBtn5</property>
      <property name="Top">240</property>
      <property name="Width">216</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption"><![CDATA[&lt;P&gt;Captura de pernotas adicionales a las actividades diarias&lt;/P&gt;]]></property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Color">#000040</property>
      <property name="Family">Verdana</property>
      <property name="LineHeight">1</property>
      <property name="Size">10px</property>
      <property name="Style">fsOblique</property>
      <property name="Variant">vaSmallCaps</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">68</property>
      <property name="Left">236</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">242</property>
      <property name="Width">348</property>
    </object>
    <object class="BitBtn" name="BitBtn6" >
      <property name="ButtonLayout">blImageTop</property>
      <property name="Caption">(5)Reportes Diarios</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">70</property>
      <property name="ImageSource">recursos/imagenesMenu/BotonesBarco/reportes.png</property>
      <property name="Left">16</property>
      <property name="Name">BitBtn6</property>
      <property name="Top">312</property>
      <property name="Width">216</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Impresion de Reportes Diarios</property>
      <property name="Color">#E7E6E2</property>
      <property name="Font">
      <property name="Color">#000040</property>
      <property name="Family">Verdana</property>
      <property name="LineHeight">1</property>
      <property name="Size">10px</property>
      <property name="Style">fsOblique</property>
      <property name="Variant">vaSmallCaps</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">68</property>
      <property name="Left">236</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">314</property>
      <property name="Width">348</property>
    </object>
  </object>
</object>
?>
