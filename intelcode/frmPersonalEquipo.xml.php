<?php
<object class="frmPersonalEquipo" name="frmPersonalEquipo" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Personal Equipo</property>
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
  <property name="Height">425</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">frmPersonalEquipo</property>
  <property name="UseAjax">1</property>
  <property name="Width">645</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow">frmPersonalEquipoBeforeShow</property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow">frmPersonalEquipoShow</property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="DBGrid" name="dbgNotas" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dsNotas</property>
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
    <property name="Height">110</property>
    <property name="Left">16</property>
    <property name="Name">dbgNotas</property>
    <property name="Top">73</property>
    <property name="Width">488</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">dbgNotasJSClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">Panel1</property>
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
    <property name="Height">211</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">16</property>
    <property name="Name">Panel1</property>
    <property name="Top">209</property>
    <property name="Width">488</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="DBGrid" name="dbgPersonal" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">dsPersonal</property>
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
      <property name="Height">139</property>
      <property name="Left">10</property>
      <property name="Name">dbgPersonal</property>
      <property name="ReadOnly">1</property>
      <property name="Top">5</property>
      <property name="Width">390</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnRowChanged"></property>
      <property name="jsOnRowSaved"></property>
    </object>
    <object class="Button" name="cmdCargarPersonal" >
      <property name="Caption">Cargar Personal del Dia Anterior</property>
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
      <property name="Height">22</property>
      <property name="Left">12</property>
      <property name="Name">cmdCargarPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">146</property>
      <property name="Width">188</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdCargarPersonalJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarPersonal" >
      <property name="Caption">Eliminar Todo el Personal</property>
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
      <property name="Height">22</property>
      <property name="Left">212</property>
      <property name="Name">cmdEliminarPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">146</property>
      <property name="Width">188</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdEliminarPersonalJSClick</property>
    </object>
    <object class="Button" name="cmdNuevoPersonal" >
      <property name="Caption">Nuevo</property>
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
      <property name="Height">22</property>
      <property name="Left">402</property>
      <property name="Name">cmdNuevoPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">5</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdNuevoPersonalJSClick</property>
    </object>
    <object class="Button" name="cmdModificarPersonal" >
      <property name="Caption">Modificar</property>
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
      <property name="Height">22</property>
      <property name="Left">402</property>
      <property name="Name">cmdModificarPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">27</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdModificarPersonalJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarRegistroPersonal" >
      <property name="Caption">Eliminar</property>
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
      <property name="Height">22</property>
      <property name="Left">402</property>
      <property name="Name">cmdEliminarRegistroPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">50</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdEliminarRegistroPersonalJSClick</property>
    </object>
    <object class="Button" name="cmdRecargaPersonal" >
      <property name="Caption"><![CDATA[Recargar
Personal
&lt;--]]></property>
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
      <property name="Height">52</property>
      <property name="Left">402</property>
      <property name="Name">cmdRecargaPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">72</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Personal</property>
      <property name="Color">#0000A0</property>
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
      <property name="Height">16</property>
      <property name="Left">404</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">126</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="lblTotalPersonal" >
      <property name="Caption">0</property>
      <property name="Color">#BCC923</property>
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
      <property name="Height">20</property>
      <property name="Left">404</property>
      <property name="Name">lblTotalPersonal</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">142</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="GroupBox" name="GroupBox3" >
      <property name="Caption">Insertar Grupos/Paquetes de Personal</property>
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
      <property name="Height">40</property>
      <property name="Left">14</property>
      <property name="Name">GroupBox3</property>
      <property name="Top">170</property>
      <property name="Width">385</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <object class="ComboBox" name="cboPaquetePersonal" >
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
        <property name="Left">13</property>
        <property name="Name">cboPaquetePersonal</property>
        <property name="ParentColor">0</property>
        <property name="Top">13</property>
        <property name="Width">292</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="Button" name="cmdPaquetePersonal" >
        <property name="Caption">Aceptar</property>
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
        <property name="Left">320</property>
        <property name="Name">cmdPaquetePersonal</property>
        <property name="ParentColor">0</property>
        <property name="Top">13</property>
        <property name="Width">53</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="jsOnClick">cmdPaquetePersonalJSClick</property>
      </object>
    </object>
    <object class="Datasource" name="dsPersonal" >
            <property name="Left">8</property>
            <property name="Top">115</property>
      <property name="DataSet">qryPersonal</property>
      <property name="Name">dsPersonal</property>
    </object>
    <object class="Query" name="qryPersonal" >
            <property name="Left">40</property>
            <property name="Top">115</property>
      <property name="Database">database</property>
      <property name="LimitCount">-1</property>
      <property name="LimitStart">-1</property>
      <property name="Name">qryPersonal</property>
      <property name="Params">a:0:{}</property>
      <property name="SQL">a:0:{}</property>
    </object>
  </object>
  <object class="Button" name="cmdPersonal" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Personal</property>
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
    <property name="Left">16</property>
    <property name="Name">cmdPersonal</property>
    <property name="ParentColor">0</property>
    <property name="Top">188</property>
    <property name="Width">80</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdPersonalJSClick</property>
  </object>
  <object class="Button" name="cmdEquipo" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Equipo</property>
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
    <property name="Left">96</property>
    <property name="Name">cmdEquipo</property>
    <property name="ParentColor">0</property>
    <property name="Top">188</property>
    <property name="Width">80</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">cmdEquipoJSClick</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">Conceptos/Partidas/Notas Afectadas en el Dia</property>
    <property name="Color">#0000A0</property>
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
    <property name="Height">16</property>
    <property name="Left">16</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">57</property>
    <property name="Width">488</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="GroupBox" name="GroupBox1" >
    <property name="Caption">Numero de Orden y Fecha</property>
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
    <property name="Height">40</property>
    <property name="Left">16</property>
    <property name="Name">GroupBox1</property>
    <property name="Top">18</property>
    <property name="Width">488</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="ComboBox" name="cboNumeroOrden" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">17</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">240</property>
      <property name="Name">cboNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">168</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnChange">cboNumeroOrdenChange</property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Orden</property>
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
      <property name="Left">192</property>
      <property name="Name">Label1</property>
      <property name="Top">15</property>
      <property name="Width">48</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="DateTimePicker" name="dIdFecha" >
      <property name="Caption">dIdFecha</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">17</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">64</property>
      <property name="Name">dIdFecha</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">104</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Fecha</property>
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
      <property name="Left">16</property>
      <property name="Name">Label2</property>
      <property name="Top">15</property>
      <property name="Width">48</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Button" name="Button4" >
      <property name="Caption">Ir</property>
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
      <property name="Left">415</property>
      <property name="Name">Button4</property>
      <property name="ParentColor">0</property>
      <property name="Top">13</property>
      <property name="Width">53</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
  </object>
  <object class="HiddenField" name="txtFechaSeleccionada" >
    <property name="Height">18</property>
    <property name="Left">525</property>
    <property name="Name">txtFechaSeleccionada</property>
    <property name="Top">168</property>
    <property name="Width">105</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Edit" name="txtIdSeleccionado" >
    <property name="BorderStyle">bsNone</property>
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
    <property name="Left">178</property>
    <property name="Name">txtIdSeleccionado</property>
    <property name="Top">188</property>
    <property name="Width">237</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="OnSubmit"></property>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#0000A0</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">Panel1</property>
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
    <property name="Height">211</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">16</property>
    <property name="Name">Panel2</property>
    <property name="Top">209</property>
    <property name="Width">489</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="DBGrid" name="dbgEquipo" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">dsEquipo</property>
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
      <property name="Height">139</property>
      <property name="Left">9</property>
      <property name="Name">dbgEquipo</property>
      <property name="ReadOnly">1</property>
      <property name="Top">10</property>
      <property name="Width">390</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnRowChanged"></property>
      <property name="jsOnRowSaved"></property>
    </object>
    <object class="Button" name="cmdCargarEquipo" >
      <property name="Caption">Cargar Equipo del Dia Anterior</property>
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
      <property name="Height">22</property>
      <property name="Left">12</property>
      <property name="Name">cmdCargarEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">146</property>
      <property name="Width">188</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdCargarEquipoJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarEquipo" >
      <property name="Caption">Eliminar Todo el Equipo</property>
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
      <property name="Height">22</property>
      <property name="Left">212</property>
      <property name="Name">cmdEliminarEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">146</property>
      <property name="Width">188</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdEliminarEquipoJSClick</property>
    </object>
    <object class="Button" name="cmdNuevoEquipo" >
      <property name="Caption">Nuevo</property>
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
      <property name="Height">22</property>
      <property name="Left">402</property>
      <property name="Name">cmdNuevoEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">5</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdNuevoEquipoJSClick</property>
    </object>
    <object class="Button" name="cmdModificarEquipo" >
      <property name="Caption">Modificar</property>
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
      <property name="Height">22</property>
      <property name="Left">402</property>
      <property name="Name">cmdModificarEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">27</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdModificarEquipoJSClick</property>
    </object>
    <object class="Button" name="cmdEliminarRegistroEquipo" >
      <property name="Caption">Eliminar</property>
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
      <property name="Height">22</property>
      <property name="Left">402</property>
      <property name="Name">cmdEliminarRegistroEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">49</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">cmdEliminarRegistroEquipoJSClick</property>
    </object>
    <object class="Button" name="cmdRecargaEquipo" >
      <property name="Caption"><![CDATA[Recargar
Equipo
&lt;--]]></property>
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
      <property name="Height">52</property>
      <property name="Left">402</property>
      <property name="Name">cmdRecargaEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">72</property>
      <property name="Width">80</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Equipo</property>
      <property name="Color">#0000A0</property>
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
      <property name="Height">16</property>
      <property name="Left">405</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">125</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Label" name="lblTotalEquipo" >
      <property name="Caption">0</property>
      <property name="Color">#BCC923</property>
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
      <property name="Height">20</property>
      <property name="Left">405</property>
      <property name="Name">lblTotalEquipo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">141</property>
      <property name="Width">74</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="GroupBox" name="GroupBox2" >
      <property name="Caption">Insertar Grupos/Paquetes de Equipo</property>
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
      <property name="Height">40</property>
      <property name="Left">14</property>
      <property name="Name">GroupBox2</property>
      <property name="Top">170</property>
      <property name="Width">385</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <object class="ComboBox" name="cboPaqueteEquipo" >
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
        <property name="Left">13</property>
        <property name="Name">cboPaqueteEquipo</property>
        <property name="ParentColor">0</property>
        <property name="Top">13</property>
        <property name="Width">292</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="OnSubmit"></property>
      </object>
      <object class="Button" name="cmdPaqueteEquipo" >
        <property name="Caption">Aceptar</property>
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
        <property name="Left">320</property>
        <property name="Name">cmdPaqueteEquipo</property>
        <property name="ParentColor">0</property>
        <property name="Top">13</property>
        <property name="Width">53</property>
        <property name="OnAfterShow"></property>
        <property name="OnBeforeShow"></property>
        <property name="OnShow"></property>
        <property name="jsOnClick">cmdPaqueteEquipoJSClick</property>
      </object>
    </object>
    <object class="Datasource" name="Datasource1" >
            <property name="Left">8</property>
            <property name="Top">115</property>
      <property name="DataSet">qryPersonal</property>
      <property name="Name">Datasource1</property>
    </object>
    <object class="Query" name="Query1" >
            <property name="Left">40</property>
            <property name="Top">115</property>
      <property name="Database">database</property>
      <property name="Name">Query1</property>
      <property name="Params">a:0:{}</property>
      <property name="SQL">a:0:{}</property>
    </object>
  </object>
  <object class="Button" name="Button1" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Ir A
Reportes
Diarios</property>
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
    <property name="Height">50</property>
    <property name="Left">506</property>
    <property name="Name">Button1</property>
    <property name="ParentColor">0</property>
    <property name="Top">58</property>
    <property name="Width">59</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">Button1JSClick</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Registro  de Personal y de Equipo de Construccion</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
        <property name="Align">taCenter</property>
        <property name="Case"></property>
        <property name="Color">#FFFFFF</property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">11px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">17</property>
    <property name="Left">15</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Width">490</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Database" name="database" >
        <property name="Left">588</property>
        <property name="Top">258</property>
    <property name="Connected"></property>
    <property name="DatabaseName"></property>
    <property name="Dictionary"></property>
    <property name="DriverName">mysql</property>
    <property name="Host"></property>
    <property name="Name">database</property>
    <property name="UserName"></property>
    <property name="UserPassword"></property>
    <property name="OnAfterConnect"></property>
    <property name="OnAfterDisconnect"></property>
    <property name="OnBeforeConnect"></property>
    <property name="OnBeforeDisconnect"></property>
  </object>
  <object class="Datasource" name="dsNotas" >
        <property name="Left">513</property>
        <property name="Top">133</property>
    <property name="DataSet">qryNotas</property>
    <property name="Name">dsNotas</property>
  </object>
  <object class="Query" name="qryNotas" >
        <property name="Left">551</property>
        <property name="Top">138</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryNotas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dsEquipo" >
        <property name="Left">585</property>
        <property name="Top">313</property>
    <property name="DataSet">qryEquipo</property>
    <property name="Name">dsEquipo</property>
  </object>
  <object class="Query" name="qryEquipo" >
        <property name="Left">590</property>
        <property name="Top">198</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryEquipo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="ActionList" name="ActionList1" >
        <property name="Left">520</property>
        <property name="Top">254</property>
    <property name="Actions">a:0:{}</property>
    <property name="Name">ActionList1</property>
    <property name="OnExecute"></property>
  </object>
</object>
?>
