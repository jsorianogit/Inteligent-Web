<?php
<object class="FrmSelContrato" name="FrmSelContrato" baseclass="Page">
  <property name="Alignment">agLeft</property>
  <property name="Background"></property>
  <property name="Caption">Seleccion del Contrato</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Align">taCenter</property>
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmSelContrato</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">FrmSelContratoShow</property>
  <property name="jsOnLoad">FrmSelContratoJSLoad</property>
  <object class="TreeView" name="tvContratos" >
    <property name="Height">265</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">80</property>
    <property name="Name">tvContratos</property>
    <property name="Top">24</property>
    <property name="Width">274</property>
    <property name="jsOnChangeSelected">tvContratosJSChangeSelected</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agLeft</property>
    <property name="Caption"><![CDATA[Descripci&oacute;n de la Obra]]></property>
    <property name="Font">
    <property name="Color">#0000FF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">355</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">41</property>
    <property name="Width">130</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Periodo del Contrato</property>
    <property name="Font">
    <property name="Color">#0000FF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">360</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">162</property>
    <property name="Width">120</property>
  </object>
  <object class="Edit" name="txtFechaInicio" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">493</property>
    <property name="Name">txtFechaInicio</property>
    <property name="ReadOnly">1</property>
    <property name="Top">157</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="txtFechaFinal" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">588</property>
    <property name="Name">txtFechaFinal</property>
    <property name="ReadOnly">1</property>
    <property name="Top">157</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Al</property>
    <property name="Font">
    <property name="Color">#0000FF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">571</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">161</property>
    <property name="Width">15</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Turno / Origen</property>
    <property name="Font">
    <property name="Color">#0000FF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">360</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">221</property>
    <property name="Width">94</property>
  </object>
  <object class="ComboBox" name="cmbTurno" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">450</property>
    <property name="Name">cmbTurno</property>
    <property name="ParentColor">0</property>
    <property name="Top">216</property>
    <property name="Width">215</property>
  </object>
  <object class="Button" name="cmdSelContrato" >
    <property name="Caption">Seleccionar Contrato</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">26</property>
    <property name="Left">355</property>
    <property name="Name">cmdSelContrato</property>
    <property name="Top">257</property>
    <property name="Width">215</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Alignment">agCenter</property>
    <property name="Caption"><![CDATA[INFORMACI&Oacute;N DEL CONTRATO]]></property>
    <property name="Color">#000080</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">355</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">24</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">INTELIGENT</property>
    <property name="Color">#000080</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">360</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">191</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="lblSeleccionado" >
    <property name="Alignment">agCenter</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">355</property>
    <property name="Name">lblSeleccionado</property>
    <property name="Top">240</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">SELECIONANDO CONTRATO</property>
    <property name="Color">#000080</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">80</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">4</property>
    <property name="Width">580</property>
  </object>
  <object class="ListBox" name="ListBox1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Cached">1</property>
    <property name="Font">
    <property name="Align">taLeft</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">264</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">80</property>
    <property name="Name">ListBox1</property>
    <property name="Top">288</property>
    <property name="Visible">0</property>
    <property name="Width">272</property>
    <property name="OnClick">ListBox1Click</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Size">9px</property>
    </property>
    <property name="Height">99</property>
    <property name="Left">355</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">53</property>
    <property name="Width">306</property>
  </object>
</object>
?>
