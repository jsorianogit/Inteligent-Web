<?php
<object class="frmBitacoradeEquipos" name="frmBitacoradeEquipos" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Bitacora de Equipos</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">275</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmBitacoradeEquipos</property>
  <property name="Width">540</property>
  <property name="OnShow">frmBitacoradeEquiposShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Equipo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label1</property>
    <property name="Top">26</property>
    <property name="Width">95</property>
  </object>
  <object class="ComboBox" name="cboEquipo" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">103</property>
    <property name="Name">cboEquipo</property>
    <property name="ParentColor">0</property>
    <property name="Top">21</property>
    <property name="Width">425</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Pernoctan</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label2</property>
    <property name="Top">43</property>
    <property name="Width">95</property>
  </object>
  <object class="ComboBox" name="cboPernocta" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">103</property>
    <property name="Name">cboPernocta</property>
    <property name="ParentColor">0</property>
    <property name="Top">41</property>
    <property name="Width">425</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Cantidad</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label3</property>
    <property name="Top">67</property>
    <property name="Width">95</property>
  </object>
  <object class="Edit" name="txtCantidad" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Align">taRight</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtCantidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Text">0.0</property>
    <property name="Top">62</property>
    <property name="Width">95</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">429</property>
    <property name="Name">cmdAceptar</property>
    <property name="Top">66</property>
    <property name="Width">100</property>
    <property name="OnClick">cmdAceptarClick</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">324</property>
    <property name="Name">cmdCancelar</property>
    <property name="Top">66</property>
    <property name="Width">100</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">INSERTANDO EQUIPO</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">5</property>
    <property name="Width">520</property>
  </object>
  <object class="HiddenField" name="iIdDiario" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">iIdDiario</property>
    <property name="Top">155</property>
    <property name="Width">210</property>
  </object>
  <object class="HiddenField" name="dIdFecha" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">dIdFecha</property>
    <property name="Top">175</property>
    <property name="Width">210</property>
  </object>
  <object class="HiddenField" name="operacion" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">operacion</property>
    <property name="Top">195</property>
    <property name="Width">210</property>
  </object>
  <object class="HiddenField" name="sIdEquipo" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">sIdEquipo</property>
    <property name="Top">215</property>
    <property name="Width">210</property>
  </object>
  <object class="HiddenField" name="sIdPernocta" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">sIdPernocta</property>
    <property name="Top">235</property>
    <property name="Width">210</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Status:</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label6</property>
    <property name="Top">101</property>
    <property name="Width">95</property>
  </object>
  <object class="Memo" name="memStatus" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">50</property>
    <property name="Left">103</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">memStatus</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">100</property>
    <property name="Width">425</property>
  </object>
</object>
?>
