<?php
<object class="FrmSelContrato" name="FrmSelContrato" baseclass="page">
  <property name="Alignment">agLeft</property>
  <property name="Background"></property>
  <property name="Caption">Seleccion del Contrato</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Case"></property>
    <property name="Color"></property>
    <property name="Family">Verdana</property>
    <property name="LineHeight"></property>
    <property name="Size">10px</property>
    <property name="Style"></property>
    <property name="Variant"></property>
    <property name="Weight"></property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">FrmSelContrato</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow"></property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">FrmSelContratoShow</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <property name="jsOnLoad">FrmSelContratoJSLoad</property>
  <object class="Panel" name="Panel1" >
    <property name="Alignment">agCenter</property>
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">3</property>
    <property name="Caption">Panel1</property>
    <property name="Color">#EEEEEE</property>
    <property name="Dynamic"></property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">305</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">40</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">625</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="TreeView" name="tvContratos" >
      <property name="Height">265</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">10</property>
      <property name="Name">tvContratos</property>
      <property name="Top">30</property>
      <property name="Width">260</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnChangeSelected">tvContratosChangeSelected</property>
      <property name="OnShow"></property>
      <property name="jsOnChangeSelected"></property>
    </object>
    <object class="GroupBox" name="GroupBox3" >
      <property name="Caption"><![CDATA[Informaci&oacute;n del Contrato]]></property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">140</property>
      <property name="Left">271</property>
      <property name="Name">GroupBox3</property>
      <property name="ParentFont">0</property>
      <property name="Top">28</property>
      <property name="Width">335</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <object class="Label" name="Label1" >
        <property name="Alignment">agLeft</property>
        <property name="Caption"><![CDATA[Descripci&oacute;n de la Obra]]></property>
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color">#0000FF</property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight">bold</property>
        </property>
        <property name="Height">15</property>
        <property name="Left">15</property>
        <property name="Name">Label1</property>
        <property name="ParentFont">0</property>
        <property name="Top">20</property>
        <property name="Width">130</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
      </object>
      <object class="Label" name="Label2" >
        <property name="Caption">Periodo del Contrato</property>
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color">#0000FF</property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight">bold</property>
        </property>
        <property name="Height">15</property>
        <property name="Left">15</property>
        <property name="Name">Label2</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">90</property>
        <property name="Width">120</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
      </object>
      <object class="Edit" name="txtFechaInicio" >
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color"></property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight"></property>
        </property>
        <property name="Height">20</property>
        <property name="Left">135</property>
        <property name="Name">txtFechaInicio</property>
        <property name="ReadOnly">1</property>
        <property name="Top">85</property>
        <property name="Width">75</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="Edit" name="txtFechaFinal" >
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color"></property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight"></property>
        </property>
        <property name="Height">20</property>
        <property name="Left">230</property>
        <property name="Name">txtFechaFinal</property>
        <property name="ReadOnly">1</property>
        <property name="Top">85</property>
        <property name="Width">75</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="Label" name="Label3" >
        <property name="Caption">Al</property>
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color">#0000FF</property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight">bold</property>
        </property>
        <property name="Height">15</property>
        <property name="Left">213</property>
        <property name="Name">Label3</property>
        <property name="ParentFont">0</property>
        <property name="Top">89</property>
        <property name="Width">15</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
      </object>
      <object class="Memo" name="memoDescripcion" >
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color"></property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight">normal</property>
        </property>
        <property name="Height">40</property>
        <property name="Left">15</property>
        <property name="Lines">a:0:{}</property>
        <property name="Name">memoDescripcion</property>
        <property name="ParentFont">0</property>
        <property name="ReadOnly">1</property>
        <property name="Top">40</property>
        <property name="Width">290</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox1" >
      <property name="Caption">Inteligent</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">115</property>
      <property name="Left">271</property>
      <property name="Name">GroupBox1</property>
      <property name="ParentFont">0</property>
      <property name="Top">181</property>
      <property name="Width">335</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <object class="Label" name="Label4" >
        <property name="Caption">Turno / Origen</property>
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color">#0000FF</property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight">bold</property>
        </property>
        <property name="Height">15</property>
        <property name="Left">10</property>
        <property name="Name">Label4</property>
        <property name="ParentFont">0</property>
        <property name="Top">25</property>
        <property name="Width">94</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
      </object>
      <object class="ComboBox" name="cmbTurno" >
        <property name="Color">#FFFFFF</property>
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color"></property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight"></property>
        </property>
        <property name="Height">20</property>
        <property name="Items">a:0:{}</property>
        <property name="Left">99</property>
        <property name="Name">cmbTurno</property>
        <property name="ParentColor">0</property>
        <property name="Top">20</property>
        <property name="Width">215</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="Button" name="cmdSelContrato" >
        <property name="Caption">Seleccionar Contrato</property>
        <property name="Font">
                <property name="Align">taNone</property>
                <property name="Case"></property>
                <property name="Color"></property>
                <property name="Family">Verdana</property>
                <property name="LineHeight"></property>
                <property name="Size">10px</property>
                <property name="Style"></property>
                <property name="Variant"></property>
                <property name="Weight"></property>
        </property>
        <property name="Height">25</property>
        <property name="Left">99</property>
        <property name="Name">cmdSelContrato</property>
        <property name="Top">55</property>
        <property name="Width">215</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
      </object>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Seleccion del Contrato</property>
      <property name="Color">#5E69F7</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#FFFFFF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">4</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">3</property>
      <property name="Width">617</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
  </object>
</object>
?>
