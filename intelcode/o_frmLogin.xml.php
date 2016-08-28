<?php
<object class="FrmLogin" name="FrmLogin" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Intel-Code Acceso</property>
  <property name="DocType">dtNone</property>
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
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">FrmLogin</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow"></property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">FrmLoginShow</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <property name="jsOnLoad">FrmLoginJSLoad</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel1</property>
    <property name="Color">#C0C0C0</property>
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
    <property name="Height">175</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">230</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">55</property>
    <property name="Width">390</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="Label" name="Label1" >
      <property name="Caption">Servidor</property>
      <property name="Color">#C0C0C0</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color">#000080</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">27</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">38</property>
      <property name="Width">95</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Usuario</property>
      <property name="Color">#C0C0C0</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color">#000080</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">27</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">60</property>
      <property name="Width">95</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption"><![CDATA[Contrase&ntilde;a]]></property>
      <property name="Color">#C0C0C0</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color">#000080</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">27</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">82</property>
      <property name="Width">95</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Base de Datos</property>
      <property name="Color">#C0C0C0</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color">#000080</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">27</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">105</property>
      <property name="Width">95</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="ComboBox" name="cmbDatabase" >
      <property name="Color">#FFFFFF</property>
      <property name="Cursor">crText</property>
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
      <property name="Items"><![CDATA[a:3:{s:9:&quot;intelcode&quot;;s:9:&quot;intelcode&quot;;s:10:&quot;inteligent&quot;;s:10:&quot;inteligent&quot;;s:7:&quot;proasip&quot;;s:7:&quot;proasip&quot;;}]]></property>
      <property name="Left">127</property>
      <property name="Name">cmbDatabase</property>
      <property name="ParentColor">0</property>
      <property name="Top">105</property>
      <property name="Width">210</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">cmbDatabaseJSBlur</property>
      <property name="jsOnFocus">cmbDatabaseJSFocus</property>
      <property name="jsOnKeyPress">cmbDatabaseJSKeyPress</property>
    </object>
    <object class="Button" name="cmdAceptar" >
      <property name="Caption">Aceptar</property>
      <property name="Color">#000080</property>
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
      <property name="Height">20</property>
      <property name="Left">186</property>
      <property name="Name">cmdAceptar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">4</property>
      <property name="Top">130</property>
      <property name="Width">70</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdAceptarJSClick</property>
    </object>
    <object class="Button" name="cmdCancelar" >
      <property name="Caption">Cancelar</property>
      <property name="Color">#000080</property>
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
      <property name="Height">20</property>
      <property name="Left">266</property>
      <property name="Name">cmdCancelar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">5</property>
      <property name="Top">130</property>
      <property name="Width">70</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdCancelarJSClick</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Acceso al Sistema Inteligent Web</property>
      <property name="Color">#000080</property>
      <property name="Font">
            <property name="Align">taCenter</property>
            <property name="Case"></property>
            <property name="Color">#FFFFFF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">20</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">390</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="lblMensajes" >
      <property name="Color">#C0C0C0</property>
      <property name="Font">
            <property name="Align">taCenter</property>
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
      <property name="Left">5</property>
      <property name="Name">lblMensajes</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">152</property>
      <property name="Width">380</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtServer" >
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
      <property name="Left">127</property>
      <property name="Name">txtServer</property>
      <property name="ParentColor">0</property>
      <property name="Text">intel-code.com.mx</property>
      <property name="Top">35</property>
      <property name="Width">210</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtServerJSBlur</property>
      <property name="jsOnFocus">txtServerJSFocus</property>
      <property name="jsOnKeyPress">txtServerJSKeyPress</property>
    </object>
    <object class="Edit" name="txtUser" >
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
      <property name="Left">127</property>
      <property name="Name">txtUser</property>
      <property name="ParentColor">0</property>
      <property name="Top">58</property>
      <property name="Width">210</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtUserJSBlur</property>
      <property name="jsOnFocus">txtUserJSFocus</property>
      <property name="jsOnKeyPress">txtUserJSKeyPress</property>
    </object>
    <object class="Edit" name="txtPasswd" >
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
      <property name="IsPassword">1</property>
      <property name="Left">127</property>
      <property name="Name">txtPasswd</property>
      <property name="ParentColor">0</property>
      <property name="Top">81</property>
      <property name="Width">210</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtPasswdJSBlur</property>
      <property name="jsOnFocus">txtPasswdJSFocus</property>
      <property name="jsOnKeyPress">txtPasswdJSKeyPress</property>
    </object>
    <object class="HiddenField" name="txtBaseDeDatos" >
      <property name="Height">25</property>
      <property name="Left">2</property>
      <property name="Name">txtBaseDeDatos</property>
      <property name="Top">26</property>
      <property name="Width">86</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="HiddenField" name="txtPassword" >
      <property name="Height">25</property>
      <property name="Left">2</property>
      <property name="Name">txtPassword</property>
      <property name="Top">26</property>
      <property name="Width">86</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="HiddenField" name="txtUsuario" >
      <property name="Height">25</property>
      <property name="Left">2</property>
      <property name="Name">txtUsuario</property>
      <property name="Top">26</property>
      <property name="Width">86</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="HiddenField" name="txtServidor" >
      <property name="Height">25</property>
      <property name="Left">2</property>
      <property name="Name">txtServidor</property>
      <property name="Top">26</property>
      <property name="Width">86</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
  </object>
</object>
?>
