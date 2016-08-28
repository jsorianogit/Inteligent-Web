<?php
<object class="frmReporteGerencial" name="frmReporteGerencial" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Reporte Gerencial</property>
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
  <property name="Height">445</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">frmReporteGerencial</property>
  <property name="Width">590</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow"></property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">frmReporteGerencialShow</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="Button" name="cmdIrGerencial" >
    <property name="Caption">Reporte Gerencial</property>
    <property name="Color">#FFFFFF</property>
    <property name="Cursor">crPointer</property>
    <property name="Enabled">0</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">9px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">25</property>
    <property name="Layer">Reporte Gerencial</property>
    <property name="Left">5</property>
    <property name="Name">cmdIrGerencial</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1</property>
    <property name="Width">190</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="cmdIrFotografico" >
    <property name="Caption">Reporte Fotografico/Tiempos Muertos</property>
    <property name="Color">#ECF3CF</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">9px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">25</property>
    <property name="Layer">Reporte Gerencial</property>
    <property name="Left">195</property>
    <property name="Name">cmdIrFotografico</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1</property>
    <property name="Width">190</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdIrFotograficoJSClick</property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#000040</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel1</property>
    <property name="Color">#FFFFFF</property>
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
    <property name="Height">415</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">5</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">27</property>
    <property name="Width">580</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="ListBox" name="listaOrdenes" >
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
      <property name="Items">a:0:{}</property>
      <property name="Left">315</property>
      <property name="MultiSelect">1</property>
      <property name="Name">listaOrdenes</property>
      <property name="ParentColor">0</property>
      <property name="Top">121</property>
      <property name="Width">225</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Button" name="cmdImprimirGerencial" >
      <property name="Caption">Imprimir Reporte Gerencial</property>
      <property name="Font">
            <property name="Align">taCenter</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style">fsItalic</property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">34</property>
      <property name="Left">320</property>
      <property name="Name">cmdImprimirGerencial</property>
      <property name="ParentFont">0</property>
      <property name="Top">286</property>
      <property name="Width">224</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdImprimirGerencialJSClick</property>
    </object>
    <object class="Button" name="Button2" >
      <property name="Caption">Guarcar Actividades y Problematicas</property>
      <property name="Enabled">0</property>
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
      <property name="Height">36</property>
      <property name="Left">22</property>
      <property name="Name">Button2</property>
      <property name="Top">284</property>
      <property name="Width">248</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Memo" name="memoProblematicas" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
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
      <property name="Height">57</property>
      <property name="Left">27</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoProblematicas</property>
      <property name="ParentColor">0</property>
      <property name="Top">218</property>
      <property name="Width">248</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Problematicas y Acciones</property>
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
      <property name="Left">53</property>
      <property name="Name">Label4</property>
      <property name="ParentFont">0</property>
      <property name="Top">198</property>
      <property name="Width">192</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Memo" name="memoRelevantes" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
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
      <property name="Height">49</property>
      <property name="Left">25</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoRelevantes</property>
      <property name="ParentColor">0</property>
      <property name="Top">130</property>
      <property name="Width">255</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Actividades Relevantes</property>
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
      <property name="Left">60</property>
      <property name="Name">Label3</property>
      <property name="ParentFont">0</property>
      <property name="Top">115</property>
      <property name="Width">195</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="ComboBox" name="cmbOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
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
      <property name="Left">128</property>
      <property name="Name">cmbOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">85</property>
      <property name="Width">152</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Numero de Orden</property>
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
      <property name="Left">25</property>
      <property name="Name">Label2</property>
      <property name="Top">90</property>
      <property name="Width">100</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption"><![CDATA[Actividades Relevantes, Problematicas y Acciones x &lt;br&gt;Orden de Trabajo]]></property>
      <property name="Color">#408080</property>
      <property name="Font">
            <property name="Align">taCenter</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">31</property>
      <property name="Left">20</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">49</property>
      <property name="Width">260</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Reporte Diario Gerencial</property>
      <property name="Color">#408080</property>
      <property name="Font">
            <property name="Align">taCenter</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">31</property>
      <property name="Left">315</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">54</property>
      <property name="Width">232</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Seleccione las Ordenes de Trabajo:</property>
      <property name="Font">
            <property name="Align">taCenter</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">315</property>
      <property name="Name">Label6</property>
      <property name="ParentFont">0</property>
      <property name="Top">96</property>
      <property name="Width">220</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="DateTimePicker" name="txtFecha" >
      <property name="Caption">DateTimePicker1</property>
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
      <property name="Left">290</property>
      <property name="Name">txtFecha</property>
      <property name="Top">13</property>
      <property name="Width">110</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Fecha de Impresion</property>
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
      <property name="Left">165</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">17</property>
      <property name="Width">115</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
  </object>
</object>
?>
