<?php
<object class="frmBitacoradePersonal" name="frmBitacoradePersonal" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Bitacora de Personal</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">315</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmBitacoradePersonal</property>
  <property name="Width">551</property>
  <property name="OnBeforeShow">frmBitacoradePersonalBeforeShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Personal</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label1</property>
    <property name="Top">24</property>
    <property name="Width">95</property>
  </object>
  <object class="ComboBox" name="cboPersonal" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">103</property>
    <property name="Name">cboPersonal</property>
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
    <property name="Top">86</property>
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
    <property name="Top">81</property>
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
    <property name="Top">102</property>
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
    <property name="Top">102</property>
    <property name="Width">100</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">INSERTANDO PERSONAL</property>
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
  <object class="Label" name="Label5" >
    <property name="Caption">Plataforma</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">8</property>
    <property name="Name">Label5</property>
    <property name="Top">63</property>
    <property name="Width">95</property>
  </object>
  <object class="ComboBox" name="cboPlataforma" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">103</property>
    <property name="Name">cboPlataforma</property>
    <property name="ParentColor">0</property>
    <property name="Top">61</property>
    <property name="Width">425</property>
  </object>
  <object class="HiddenField" name="txtdIdFecha" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtdIdFecha</property>
    <property name="Top">185</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="txtiIdDiario" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtiIdDiario</property>
    <property name="Top">205</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="txtsIdPlataforma" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtsIdPlataforma</property>
    <property name="Top">245</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="txtsIdPernocta" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtsIdPernocta</property>
    <property name="Top">265</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="txtsIdPersonal" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtsIdPersonal</property>
    <property name="Top">225</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="txtOperacion" >
    <property name="Height">20</property>
    <property name="Left">103</property>
    <property name="Name">txtOperacion</property>
    <property name="Top">285</property>
    <property name="Width">200</property>
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
    <property name="Top">130</property>
    <property name="Width">425</property>
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
    <property name="Top">131</property>
    <property name="Width">95</property>
  </object>
</object>
?>
