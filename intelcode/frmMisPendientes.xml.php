<?php
<object class="frmMisPendientes" name="frmMisPendientes" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Mis Pendientes</property>
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
  <property name="Height">320</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">frmMisPendientes</property>
  <property name="Width">570</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow"></property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">frmMisPendientesShow</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="Window" name="winPendientes" >
    <property name="Caption">Mis Pendientes</property>
    <property name="Height">290</property>
    <property name="Left">65</property>
    <property name="Name">winPendientes</property>
    <property name="Resizeable">0</property>
    <property name="ShowClose">0</property>
    <property name="ShowMaximize">0</property>
    <property name="ShowMinimize">0</property>
    <property name="Top">10</property>
    <property name="Width">410</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClose"></property>
    <property name="jsOnMaximize"></property>
    <property name="jsOnMinimize"></property>
    <property name="jsOnMove"></property>
    <property name="jsOnRestore"></property>
    <object class="Memo" name="Memo1" >
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
      <property name="Height">95</property>
      <property name="Left">10</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">Memo1</property>
      <property name="ParentColor">0</property>
      <property name="Top">30</property>
      <property name="Width">385</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Periodo del Contrato:</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">135</property>
      <property name="Width">160</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Dias Laborados:</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">162</property>
      <property name="Width">160</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Dias Por Transcurrir:</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">11</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">190</property>
      <property name="Width">159</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Avance Programado Global</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">11</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">215</property>
      <property name="Width">159</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Avance Programado Fisico:</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">11</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">245</property>
      <property name="Width">159</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtFechaIinicio" >
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
      <property name="Left">173</property>
      <property name="Name">txtFechaIinicio</property>
      <property name="ParentColor">0</property>
      <property name="Top">135</property>
      <property name="Width">77</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Al :</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">15</property>
      <property name="Left">254</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">137</property>
      <property name="Width">30</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtFechaFinal" >
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
      <property name="Left">284</property>
      <property name="Name">txtFechaFinal</property>
      <property name="ParentColor">0</property>
      <property name="Top">135</property>
      <property name="Width">71</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Edit" name="txtLaborados" >
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
      <property name="Left">173</property>
      <property name="Name">txtLaborados</property>
      <property name="ParentColor">0</property>
      <property name="Top">160</property>
      <property name="Width">72</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Edit" name="txtTranscurridos" >
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
      <property name="Left">173</property>
      <property name="Name">txtTranscurridos</property>
      <property name="ParentColor">0</property>
      <property name="Top">185</property>
      <property name="Width">72</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Edit" name="txtGlobal" >
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
      <property name="Left">173</property>
      <property name="Name">txtGlobal</property>
      <property name="ParentColor">0</property>
      <property name="Top">210</property>
      <property name="Width">72</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Edit" name="txtFisico" >
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
      <property name="Left">173</property>
      <property name="Name">txtFisico</property>
      <property name="ParentColor">0</property>
      <property name="Top">240</property>
      <property name="Width">72</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Edit" name="txtAvanceProyecto" >
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
      <property name="Left">254</property>
      <property name="Name">txtAvanceProyecto</property>
      <property name="ParentColor">0</property>
      <property name="Top">160</property>
      <property name="Width">46</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Edit" name="txtPendiente" >
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
      <property name="Left">254</property>
      <property name="Name">txtPendiente</property>
      <property name="ParentColor">0</property>
      <property name="Top">186</property>
      <property name="Width">46</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">%</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">305</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">163</property>
      <property name="Width">30</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">%</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">307</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">188</property>
      <property name="Width">30</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">%</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">248</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">211</property>
      <property name="Width">30</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">%</property>
      <property name="Color">#EAEBEE</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000FF</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">20</property>
      <property name="Left">248</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">241</property>
      <property name="Width">30</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
  </object>
</object>
?>
