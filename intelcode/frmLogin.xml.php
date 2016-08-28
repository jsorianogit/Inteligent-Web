<?php
<object class="FrmLogin" name="FrmLogin" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Intel-Code Acceso</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">417</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmLogin</property>
  <property name="UseAjax">1</property>
  <property name="Width">673</property>
  <property name="OnShow">FrmLoginShow</property>
  <property name="jsOnLoad">FrmLoginJSLoad</property>
  <object class="HiddenField" name="txtServidor" >
    <property name="Height">25</property>
    <property name="Left">2</property>
    <property name="Name">txtServidor</property>
    <property name="Top">26</property>
    <property name="Width">86</property>
  </object>
  <object class="HiddenField" name="txtUsuario" >
    <property name="Height">25</property>
    <property name="Left">2</property>
    <property name="Name">txtUsuario</property>
    <property name="Top">82</property>
    <property name="Width">86</property>
  </object>
  <object class="HiddenField" name="txtPassword" >
    <property name="Height">25</property>
    <property name="Left">2</property>
    <property name="Name">txtPassword</property>
    <property name="Top">114</property>
    <property name="Width">86</property>
  </object>
  <object class="HiddenField" name="txtBaseDeDatos" >
    <property name="Height">25</property>
    <property name="Left">2</property>
    <property name="Name">txtBaseDeDatos</property>
    <property name="Top">170</property>
    <property name="Width">86</property>
  </object>
  <object class="HiddenField" name="hPanel" >
    <property name="Height">18</property>
    <property name="Left">248</property>
    <property name="Name">hPanel</property>
    <property name="Top">24</property>
    <property name="Width">200</property>
  </object>
  <object class="Window" name="wLogin" >
    <property name="Caption">Acceso al Sistema Inteligent Web</property>
    <property name="Height">379</property>
    <property name="Left">2</property>
    <property name="MoveMethod">mmTranslucent</property>
    <property name="Name">wLogin</property>
    <property name="Top">4</property>
    <property name="Width">659</property>
    <property name="jsOnClose">wLoginJSClose</property>
    <object class="Image" name="Image1" >
      <property name="Border">0</property>
      <property name="Height">379</property>
      <property name="ImageSource">recursos/imagenes/inteligent_acceso.jpg</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image1</property>
      <property name="Width">658</property>
    </object>
    <object class="Panel" name="Panel1" >
      <property name="BorderColor">#000080</property>
      <property name="BorderWidth">2</property>
      <property name="Color">#BFCDDB</property>
      <property name="Dynamic"></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">99</property>
      <property name="Left">134</property>
      <property name="Name">Panel1</property>
      <property name="ParentColor">0</property>
      <property name="Top">140</property>
      <property name="Width">309</property>
      <object class="Label" name="Label3" >
        <property name="Caption"><![CDATA[Contrase&ntilde;a]]></property>
        <property name="Color">#BFCDDB</property>
        <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">Navy</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">11</property>
        <property name="Name">Label3</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">10</property>
        <property name="Width">95</property>
      </object>
      <object class="Label" name="Label4" >
        <property name="Caption">Base de Datos</property>
        <property name="Color">#BFCDDB</property>
        <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">Navy</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">11</property>
        <property name="Name">Label4</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">35</property>
        <property name="Width">95</property>
      </object>
      <object class="ComboBox" name="cmbDatabase" >
        <property name="Color">#FFFFFF</property>
        <property name="Cursor">crText</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="Items"><![CDATA[a:3:{s:9:&quot;intelcode&quot;;s:9:&quot;intelcode&quot;;s:10:&quot;inteligent&quot;;s:10:&quot;inteligent&quot;;s:7:&quot;proasip&quot;;s:7:&quot;proasip&quot;;}]]></property>
        <property name="Left">108</property>
        <property name="Name">cmbDatabase</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">35</property>
        <property name="Width">185</property>
        <property name="jsOnBlur">cmbDatabaseJSBlur</property>
        <property name="jsOnFocus">cmbDatabaseJSFocus</property>
        <property name="jsOnKeyPress">cmbDatabaseJSKeyPress</property>
      </object>
      <object class="Button" name="cmdAceptar" >
        <property name="Caption">Aceptar</property>
        <property name="Color">#000080</property>
        <property name="Font">
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">150</property>
        <property name="Name">cmdAceptar</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="TabOrder">4</property>
        <property name="Top">58</property>
        <property name="Width">70</property>
        <property name="jsOnClick">cmdAceptarJSClick</property>
      </object>
      <object class="Button" name="cmdCancel" >
        <property name="Caption">Cancelar</property>
        <property name="Color">#000080</property>
        <property name="Font">
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">223</property>
        <property name="Name">cmdCancel</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="TabOrder">5</property>
        <property name="Top">58</property>
        <property name="Width">70</property>
        <property name="jsOnClick">cmdCancelJSClick</property>
      </object>
      <object class="Label" name="lblMensajes2" >
        <property name="Color">#BFCDDB</property>
        <property name="Font">
        <property name="Align">taCenter</property>
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">15</property>
        <property name="Left">8</property>
        <property name="Name">lblMensajes2</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">81</property>
        <property name="Width">298</property>
      </object>
      <object class="Edit" name="txtPasswd" >
        <property name="Color">#FFFFFF</property>
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">20</property>
        <property name="IsPassword">1</property>
        <property name="Left">108</property>
        <property name="Name">txtPasswd</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">10</property>
        <property name="Width">185</property>
        <property name="jsOnBlur">txtPasswdJSBlur</property>
        <property name="jsOnFocus">txtPasswdJSFocus</property>
        <property name="jsOnKeyPress">txtPasswdJSKeyPress</property>
      </object>
    </object>
    <object class="Panel" name="Panel2" >
      <property name="BorderColor">#000080</property>
      <property name="BorderWidth">2</property>
      <property name="Color">#BFCDDB</property>
      <property name="Dynamic"></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">100</property>
      <property name="Left">134</property>
      <property name="Name">Panel2</property>
      <property name="ParentColor">0</property>
      <property name="Top">140</property>
      <property name="Width">309</property>
      <object class="Button" name="cmdLogin" >
        <property name="Caption">Aceptar</property>
        <property name="Color">#000080</property>
        <property name="Font">
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">152</property>
        <property name="Name">cmdLogin</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="TabOrder">4</property>
        <property name="Top">35</property>
        <property name="Width">70</property>
        <property name="OnClick">cmdLoginClick</property>
        <property name="jsOnClick">cmdLoginJSClick</property>
      </object>
      <object class="Button" name="cmdRegresar" >
        <property name="Caption">Cancelar</property>
        <property name="Color">#000080</property>
        <property name="Font">
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">20</property>
        <property name="Left">223</property>
        <property name="Name">cmdRegresar</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="TabOrder">5</property>
        <property name="Top">35</property>
        <property name="Width">70</property>
        <property name="jsOnClick">cmdCancelarJSClick</property>
      </object>
      <object class="Label" name="lblMensajes1" >
        <property name="Color">#BFCDDB</property>
        <property name="Font">
        <property name="Align">taCenter</property>
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        <property name="Weight">bold</property>
        </property>
        <property name="Height">32</property>
        <property name="Left">3</property>
        <property name="Name">lblMensajes1</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">64</property>
        <property name="Width">294</property>
      </object>
      <object class="Edit" name="txtUser" >
        <property name="Font">
        <property name="Family">Verdana</property>
        <property name="Size">10px</property>
        </property>
        <property name="Height">21</property>
        <property name="Left">114</property>
        <property name="Name">txtUser</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">9</property>
        <property name="Width">179</property>
        <property name="jsOnBlur">txtUserJSBlur</property>
        <property name="jsOnFocus">txtUserJSFocus</property>
        <property name="jsOnKeyPress">txtUserJSKeyPress</property>
      </object>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Usuario:</property>
      <property name="Color">#BFCDDB</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Color">Navy</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">145</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">151</property>
      <property name="Width">95</property>
    </object>
  </object>
</object>
?>
