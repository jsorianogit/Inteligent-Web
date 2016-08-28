<?php
<object class="FrmOrdenTrabajo" name="frmOrdenTrabajo" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Ordenes de Trabajo</property>
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
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
  </property>
  <property name="Name">frmOrdenTrabajo</property>
  <property name="Width">872</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow">frmOrdenTrabajoBeforeShow</property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">frmOrdenTrabajoShow</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <property name="jsOnLoad">frmOrdenTrabajoJSLoad</property>
  <object class="Button" name="cmdAgregar" >
    <property name="Caption">Agregar</property>
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
    <property name="Left">7</property>
    <property name="Name">cmdAgregar</property>
    <property name="Top">6</property>
    <property name="Width">75</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdAgregarJSClick</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Caption">Modificar</property>
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
    <property name="Left">7</property>
    <property name="Name">cmdModificar</property>
    <property name="Top">31</property>
    <property name="Width">75</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdModificarJSClick</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
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
    <property name="Left">7</property>
    <property name="Name">cmdAceptar</property>
    <property name="TabOrder">15</property>
    <property name="Top">56</property>
    <property name="Width">75</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnClick">cmdAceptarClick</property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Caption">Cancelar</property>
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
    <property name="Left">7</property>
    <property name="Name">cmdCancelar</property>
    <property name="Top">81</property>
    <property name="Width">75</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Caption">Eliminar</property>
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
    <property name="Left">7</property>
    <property name="Name">cmdEliminar</property>
    <property name="Top">106</property>
    <property name="Width">75</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
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
    <property name="Left">7</property>
    <property name="Name">cmdImprimir</property>
    <property name="Top">131</property>
    <property name="Width">75</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="DBGrid" name="dbgNumeroOrden" >
    <property name="Cursor">crPointer</property>
    <property name="DataSource">dsOrdenTrabajo</property>
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
    <property name="Height">145</property>
    <property name="Left">85</property>
    <property name="Name">dbgNumeroOrden</property>
    <property name="Top">5</property>
    <property name="Width">771</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">dbgNumeroOrdenJSClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Memo" name="txtmDescripcion" >
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
    <property name="Height">45</property>
    <property name="Left">116</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">txtmDescripcion</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">205</property>
    <property name="Width">505</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">txtmDescripcionJSBlur</property>
    <property name="jsOnFocus">txtmDescripcionJSFocus</property>
    <property name="jsOnKeyPress">txtmDescripcionJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbosIdTipoOrden" >
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
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">116</property>
    <property name="Name">cbosIdTipoOrden</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">256</property>
    <property name="Width">185</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">cbosIdTipoOrdenJSBlur</property>
    <property name="jsOnFocus">cbosIdTipoOrdenJSFocus</property>
  </object>
  <object class="ComboBox" name="cbosApoyo" >
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
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">116</property>
    <property name="Name">cbosApoyo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">280</property>
    <property name="Width">185</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">cbosApoyoJSBlur</property>
    <property name="jsOnFocus">cbosApoyoJSFocus</property>
  </object>
  <object class="DateTimePicker" name="timedFiProgramado" >
    <property name="Caption">timedFiProgramado</property>
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
    <property name="Left">116</property>
    <property name="Name">timedFiProgramado</property>
    <property name="Text">2013-01-09 04:50</property>
    <property name="Top">304</property>
    <property name="Width">185</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="DateTimePicker" name="timedFfProgramado" >
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
    <property name="Height">17</property>
    <property name="Left">438</property>
    <property name="Name">timedFfProgramado</property>
    <property name="Text">2013-01-09 04:50</property>
    <property name="Top">304</property>
    <property name="Width">183</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="ComboBox" name="cbosIdPlataforma" >
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
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">437</property>
    <property name="Name">cbosIdPlataforma</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">255</property>
    <property name="Width">185</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">cbosIdPlataformaJSBlur</property>
    <property name="jsOnFocus">cbosIdPlataformaJSFocus</property>
  </object>
  <object class="ComboBox" name="cbosIdPernocta" >
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
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">437</property>
    <property name="Name">cbosIdPernocta</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">280</property>
    <property name="Width">185</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">cbosIdPernoctaJSBlur</property>
    <property name="jsOnFocus">cbosIdPernoctaJSFocus</property>
  </object>
  <object class="ComboBox" name="cbocIdStatus" >
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
    <property name="Height">19</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">118</property>
    <property name="Name">cbocIdStatus</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">328</property>
    <property name="Width">185</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">cbocIdStatusJSBlur</property>
    <property name="jsOnFocus">cbocIdStatusJSFocus</property>
  </object>
  <object class="Memo" name="txtmComentarios" >
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
    <property name="Height">87</property>
    <property name="Left">117</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">txtmComentarios</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">353</property>
    <property name="Width">502</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
    <property name="jsOnBlur">txtmComentariosJSBlur</property>
    <property name="jsOnFocus">txtmComentariosJSFocus</property>
    <property name="jsOnKeyPress">txtmComentariosJSKeyPress</property>
  </object>
  <object class="GroupBox" name="GroupBox1" >
    <property name="Caption">Formato de Reporte Diario</property>
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
    <property name="Height">112</property>
    <property name="Left">642</property>
    <property name="Name">GroupBox1</property>
    <property name="Top">158</property>
    <property name="Width">205</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="Edit" name="txtsFormato" >
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
      <property name="Height">21</property>
      <property name="Left">81</property>
      <property name="Name">txtsFormato</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">11</property>
      <property name="Top">15</property>
      <property name="Width">114</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtsFormatoJSBlur</property>
      <property name="jsOnFocus">txtsFormatoJSFocus</property>
      <property name="jsOnKeyPress">txtsFormatoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtiJornada" >
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
      <property name="Height">21</property>
      <property name="Left">81</property>
      <property name="Name">txtiJornada</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">12</property>
      <property name="Top">36</property>
      <property name="Width">114</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtiJornadaJSBlur</property>
      <property name="jsOnFocus">txtiJornadaJSFocus</property>
      <property name="jsOnKeyPress">txtiJornadaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtiConsecutivo" >
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
      <property name="Height">21</property>
      <property name="Left">81</property>
      <property name="Name">txtiConsecutivo</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">13</property>
      <property name="Top">58</property>
      <property name="Width">114</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtiConsecutivoJSBlur</property>
      <property name="jsOnFocus">txtiConsecutivoJSFocus</property>
      <property name="jsOnKeyPress">txtiConsecutivoJSKeyPress</property>
    </object>
    <object class="Edit" name="txtiConsecutivoTierra" >
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
      <property name="Height">21</property>
      <property name="Left">81</property>
      <property name="Name">txtiConsecutivoTierra</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">14</property>
      <property name="Top">79</property>
      <property name="Width">114</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
      <property name="jsOnBlur">txtiConsecutivoTierraJSBlur</property>
      <property name="jsOnFocus">txtiConsecutivoTierraJSFocus</property>
      <property name="jsOnKeyPress">txtiConsecutivoTierraJSKeyPress</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">Jornada</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">12</property>
      <property name="Name">Label13</property>
      <property name="ParentFont">0</property>
      <property name="Top">38</property>
      <property name="Width">65</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Caption">Consecutivo</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">Label14</property>
      <property name="ParentFont">0</property>
      <property name="Top">60</property>
      <property name="Width">70</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Caption"><![CDATA[Consecutivo&lt;br&gt; Tierra]]></property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">23</property>
      <property name="Left">7</property>
      <property name="Name">Label15</property>
      <property name="ParentFont">0</property>
      <property name="Top">77</property>
      <property name="Width">70</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Formato</property>
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">12</property>
      <property name="Name">Label12</property>
      <property name="ParentFont">0</property>
      <property name="Top">19</property>
      <property name="Width">65</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Orden de Trabajo:</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">167</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Descripcion Corta:</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">189</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Descripcioin:</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">208</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Tipo</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">258</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Apoyo</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">283</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Inicio Programado</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">307</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Fin Programado</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">328</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">308</property>
    <property name="Width">109</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Plataforma</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">329</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">259</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Personal Pernocta</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">329</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">284</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Status</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">332</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Comentarios</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">357</property>
    <property name="Width">107</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="HiddenField" name="sNumeroOrdenOld" >
    <property name="Height">18</property>
    <property name="Left">11</property>
    <property name="Name">sNumeroOrdenOld</property>
    <property name="Top">544</property>
    <property name="Width">195</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="HiddenField" name="sOperacion" >
    <property name="Height">18</property>
    <property name="Left">230</property>
    <property name="Name">sOperacion</property>
    <property name="Top">544</property>
    <property name="Width">195</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="HiddenField" name="eliminar" >
    <property name="Height">18</property>
    <property name="Left">11</property>
    <property name="Name">eliminar</property>
    <property name="Top">564</property>
    <property name="Width">195</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Edit" name="txtsDescripcionCorta" >
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
    <property name="Height">21</property>
    <property name="Left">116</property>
    <property name="Name">txtsDescripcionCorta</property>
    <property name="Top">181</property>
    <property name="Width">506</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Edit" name="txtsIdFolio" >
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
    <property name="Height">21</property>
    <property name="Left">489</property>
    <property name="Name">txtsIdFolio</property>
    <property name="Top">159</property>
    <property name="Width">131</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Edit" name="txtsNumeroOrden" >
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
    <property name="Height">21</property>
    <property name="Left">116</property>
    <property name="Name">txtsNumeroOrden</property>
    <property name="Top">159</property>
    <property name="Width">275</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="GroupBox" name="GroupBox2" >
    <property name="Caption"><![CDATA[Impresi&oacute;n Reporte Diario]]></property>
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
    <property name="Height">167</property>
    <property name="Left">642</property>
    <property name="Name">GroupBox2</property>
    <property name="Top">273</property>
    <property name="Width">205</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="PageControl" name="PageControl1" >
      <property name="ActiveLayer">Contenido</property>
      <property name="Height">141</property>
      <property name="Left">5</property>
      <property name="Name">PageControl1</property>
      <property name="Tabs"><![CDATA[a:1:{i:0;s:9:&quot;Contenido&quot;;}]]></property>
      <property name="Top">18</property>
      <property name="Width">195</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <object class="CheckBox" name="ChkReal" >
        <property name="Caption">Avance Frente de Trabajo</property>
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
        <property name="Height">21</property>
        <property name="Layer">Contenido</property>
        <property name="Left">10</property>
        <property name="Name">ChkReal</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">30</property>
        <property name="Width">183</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
        <property name="jsOnClick">ChkRealJSClick</property>
        <property name="jsOnFocus">ChkRealJSFocus</property>
      </object>
      <object class="CheckBox" name="ChkProg" >
        <property name="Caption">Avance General Contrato</property>
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
        <property name="Height">21</property>
        <property name="Layer">Contenido</property>
        <property name="Left">10</property>
        <property name="Name">ChkProg</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">50</property>
        <property name="Width">168</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="CheckBox" name="ChkComent" >
        <property name="Caption">Comentarios</property>
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
        <property name="Height">21</property>
        <property name="Layer">Contenido</property>
        <property name="Left">10</property>
        <property name="Name">ChkComent</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">70</property>
        <property name="Width">121</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="CheckBox" name="ChkPermiso" >
        <property name="Caption">Permisos</property>
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
        <property name="Height">21</property>
        <property name="Layer">Contenido</property>
        <property name="Left">10</property>
        <property name="Name">ChkPermiso</property>
        <property name="ParentColor">0</property>
        <property name="ParentFont">0</property>
        <property name="Top">90</property>
        <property name="Width">121</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="CheckBox" name="ChkTipoA" >
        <property name="Caption">Tipo Administracion</property>
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
        <property name="Height">16</property>
        <property name="Layer">Contenido</property>
        <property name="Left">10</property>
        <property name="Name">ChkTipoA</property>
        <property name="ParentColor">0</property>
        <property name="Top">110</property>
        <property name="Width">151</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
    </object>
  </object>
  <object class="Panel" name="panelMensaje" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">panelMensaje</property>
    <property name="Color">#8080C0</property>
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
    <property name="Height">203</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
    </property>
    <property name="Left">144</property>
    <property name="Name">panelMensaje</property>
    <property name="ParentColor">0</property>
    <property name="Visible">0</property>
    <property name="Width">333</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="Memo" name="memoMensaje" >
      <property name="BorderStyle">bsNone</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled">0</property>
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
      <property name="Height">171</property>
      <property name="Left">3</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoMensaje</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">4</property>
      <property name="Width">326</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Button" name="cmdOcultarMensaje" >
      <property name="Caption">Aceptar</property>
      <property name="Color">#E1E1E1</property>
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
      <property name="Left">145</property>
      <property name="Name">cmdOcultarMensaje</property>
      <property name="ParentColor">0</property>
      <property name="Top">175</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdOcultarMensajeJSClick</property>
    </object>
  </object>
  <object class="Database" name="dataOrdenTrabajo" >
        <property name="Left">625</property>
        <property name="Top">60</property>
    <property name="Connected"></property>
    <property name="DatabaseName"></property>
    <property name="Dictionary"></property>
    <property name="DriverName">mysql</property>
    <property name="Host">127.0.0.1</property>
    <property name="Name">dataOrdenTrabajo</property>
    <property name="UserName"></property>
    <property name="UserPassword"></property>
    <property name="OnAfterConnect"></property>
    <property name="OnAfterDisconnect"></property>
    <property name="OnBeforeConnect"></property>
    <property name="OnBeforeDisconnect"></property>
  </object>
  <object class="Datasource" name="dsOrdenTrabajo" >
        <property name="Left">625</property>
        <property name="Top">10</property>
    <property name="DataSet">qryOrdenTrabajo</property>
    <property name="Name">dsOrdenTrabajo</property>
  </object>
  <object class="Query" name="qryOrdenTrabajo" >
        <property name="Left">625</property>
        <property name="Top">115</property>
    <property name="Database">dataOrdenTrabajo</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryOrdenTrabajo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
