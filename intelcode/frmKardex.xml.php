<?php
<object class="Unit1" name="Unit1" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Kardex del Sistema</property>
  <property name="Color">#D0DDF0</property>
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
  <property name="Height">440</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">Unit1</property>
  <property name="Width">1000</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow"></property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">Unit1Show</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="DateTimePicker" name="txtFechaInicio" >
    <property name="Caption">txtFechaInicio</property>
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
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">125</property>
    <property name="Name">txtFechaInicio</property>
    <property name="Top">65</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="DateTimePicker" name="txtFechaFinal" >
    <property name="Caption">txtFechaFinal</property>
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
    <property name="Height">17</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">280</property>
    <property name="Name">txtFechaFinal</property>
    <property name="Top">65</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Bitacora de Usuarios del Sistema</property>
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
        <property name="Weight"></property>
    </property>
    <property name="Height">20</property>
    <property name="Left">10</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">15</property>
    <property name="Width">465</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Imprimir Desde :</property>
    <property name="Color">#D0DDF0</property>
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
    <property name="Left">10</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">105</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Hasta :</property>
    <property name="Color">#D0DDF0</property>
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
    <property name="Left">220</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">55</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Memo" name="memoMensajes" >
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
    <property name="Height">150</property>
    <property name="Left">10</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">memoMensajes</property>
    <property name="ParentColor">0</property>
    <property name="Top">120</property>
    <property name="Width">465</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Mensajes Para Usuarios del Sistema</property>
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
        <property name="Weight"></property>
    </property>
    <property name="Height">20</property>
    <property name="Left">10</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">93</property>
    <property name="Width">465</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="cmdGuardarMensajes" >
    <property name="Caption">Guardar</property>
    <property name="Color">#EAEAEA</property>
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
    <property name="Left">385</property>
    <property name="Name">cmdGuardarMensajes</property>
    <property name="ParentColor">0</property>
    <property name="Top">275</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnClick">cmdGuardarMensajesClick</property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="cmdImprimirKardex" >
    <property name="Caption">Imprimir</property>
    <property name="Color">#EAEAEA</property>
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
    <property name="Left">380</property>
    <property name="Name">cmdImprimirKardex</property>
    <property name="ParentColor">0</property>
    <property name="Top">66</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdImprimirKardexJSClick</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Ejemplo de Mensaje para Usuarios:</property>
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
        <property name="Weight"></property>
    </property>
    <property name="Height">15</property>
    <property name="Left">10</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">315</property>
    <property name="Width">230</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Contrato - Mensaje</property>
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
    <property name="Height">15</property>
    <property name="Left">10</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="Top">294</property>
    <property name="Width">270</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption"><![CDATA[428237819 - Se Ha Reprogramado el Contrato&lt;br&gt;428237801 - Se Ha Reprogramado el Contrato]]></property>
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
    <property name="Height">35</property>
    <property name="Left">10</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">335</property>
    <property name="Width">270</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Formato de Mensaje para Usuarios:</property>
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
        <property name="Weight"></property>
    </property>
    <property name="Height">15</property>
    <property name="Left">10</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">230</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="cmdRecargarMensajes" >
    <property name="Caption">Recargar</property>
    <property name="Color">#EAEAEA</property>
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
    <property name="Left">295</property>
    <property name="Name">cmdRecargarMensajes</property>
    <property name="ParentColor">0</property>
    <property name="Top">275</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnClick">cmdRecargarMensajesClick</property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Nota Importante:</property>
    <property name="Color">#FF0000</property>
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
    <property name="Height">15</property>
    <property name="Left">130</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">375</property>
    <property name="Width">230</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">LAS NOTAS DEBEN SER DE UNA SOLA LINEA, NO DEBEN LLEVAR ENTER'S</property>
    <property name="Color">#FFFFFF</property>
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
    <property name="Height">35</property>
    <property name="Left">10</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">395</property>
    <property name="Width">445</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Usuario:</property>
    <property name="Color">#D0DDF0</property>
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
    <property name="Height">19</property>
    <property name="Left">10</property>
    <property name="Name">Label11</property>
    <property name="ParentColor">0</property>
    <property name="Top">42</property>
    <property name="Width">105</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="ComboBox" name="cmbUsuarios" >
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
    <property name="Left">125</property>
    <property name="Name">cmbUsuarios</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">340</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption"><![CDATA[&lt;P&gt;Contratos Bloqueados&lt;/P&gt;]]></property>
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
        <property name="Weight"></property>
    </property>
    <property name="Height">20</property>
    <property name="Left">490</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">93</property>
    <property name="Width">465</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Memo" name="memoBloqueados" >
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
    <property name="Height">150</property>
    <property name="Left">490</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">memoBloqueados</property>
    <property name="ParentColor">0</property>
    <property name="Top">120</property>
    <property name="Width">465</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Button" name="cmdGuardarBloqueads" >
    <property name="Caption">Guardar</property>
    <property name="Color">#EAEAEA</property>
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
    <property name="Left">865</property>
    <property name="Name">cmdGuardarBloqueads</property>
    <property name="ParentColor">0</property>
    <property name="Top">275</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnClick">cmdGuardarBloqueadsClick</property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="cmdRecargarBloqueados" >
    <property name="Caption">Recargar</property>
    <property name="Color">#EAEAEA</property>
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
    <property name="Left">775</property>
    <property name="Name">cmdRecargarBloqueados</property>
    <property name="ParentColor">0</property>
    <property name="Top">275</property>
    <property name="Width">85</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnClick">cmdRecargarMensajesClick</property>
    <property name="OnShow"></property>
  </object>
</object>
?>
