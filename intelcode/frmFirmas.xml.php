<?php
<object class="frmFirmas" name="frmFirmas" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit2</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">530</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmFirmas</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">frmFirmasBeforeShow</property>
  <property name="OnShow">frmFirmasShow</property>
  <object class="DBGrid" name="ddfirmas1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsfirmas1</property>
    <property name="Height">150</property>
    <property name="Left">90</property>
    <property name="Name">ddfirmas1</property>
    <property name="Top">29</property>
    <property name="Width">656</property>
    <property name="jsOnClick">ddfirmas1JSClick</property>
  </object>
  <object class="ComboBox" name="cbosNumeroOrden" >
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">170</property>
    <property name="Name">cbosNumeroOrden</property>
    <property name="ParentColor">0</property>
    <property name="Top">3</property>
    <property name="Width">190</property>
    <property name="OnChange">cbosNumeroOrdenChange</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[Firmantes de la Compa&ntilde;ia]]></property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">210</property>
    <property name="Width">740</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[Nombre del Representante de la Compa&ntilde;ia]]></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label2</property>
    <property name="Top">228</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label3</property>
    <property name="Top">228</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption"><![CDATA[Nombre Supervisor de la Compa&ntilde;ia de Patio]]></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label4</property>
    <property name="Top">250</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label5</property>
    <property name="Top">250</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label6</property>
    <property name="Top">272</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label7</property>
    <property name="Top">294</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Nombre del Representante Tecnico</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label8</property>
    <property name="Top">272</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Nombre de la Subcontrista</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label9</property>
    <property name="Top">294</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Firmantes de la dependencia</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">15</property>
    <property name="Left">5</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">318</property>
    <property name="Width">740</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Revisa Reportes Diarios / Estimaciones</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label11</property>
    <property name="Top">334</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label12</property>
    <property name="Top">334</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Revisa Generadores de Obra</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label13</property>
    <property name="Top">355</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label14</property>
    <property name="Top">355</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label15</property>
    <property name="Top">377</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label16</property>
    <property name="Top">399</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Revisa Resumenes de Generadores</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label17</property>
    <property name="Top">377</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Autoriza Reportes Diarios/Generadores/Estimaciones</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">11</property>
    <property name="Name">Label18</property>
    <property name="Top">395</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label19</property>
    <property name="Top">421</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Puesto</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label20</property>
    <property name="Top">443</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Residente de Obra</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label21</property>
    <property name="Top">421</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Nombre de la Subcontrista</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label22</property>
    <property name="Top">443</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">Orden:</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">90</property>
    <property name="Name">Label24</property>
    <property name="Top">8</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="cmdNuevo" >
    <property name="Caption">Nuevo</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">cmdNuevo</property>
    <property name="Top">29</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdNuevoJSClick</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">cmdModificar</property>
    <property name="Top">54</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">cmdAceptar</property>
    <property name="Top">79</property>
    <property name="Width">75</property>
    <property name="OnClick">cmdAceptarClick</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">cmdCancelar</property>
    <property name="Top">104</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Caption">Eliminar</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">cmdEliminar</property>
    <property name="Top">129</property>
    <property name="Width">75</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
  </object>
  <object class="Button" name="cmdReporteDiario" >
    <property name="Caption">Ir a Reportes Diarios</property>
    <property name="Color">#000080</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">565</property>
    <property name="Name">cmdReporteDiario</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Width">175</property>
    <property name="jsOnClick">cmdReporteDiarioJSClick</property>
  </object>
  <object class="Edit" name="sFirmante1" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">270</property>
    <property name="Name">sFirmante1</property>
    <property name="ParentColor">0</property>
    <property name="Top">228</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante1JSBlur</property>
    <property name="jsOnFocus">sFirmante1JSFocus</property>
    <property name="jsOnKeyPress">sFirmante1JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto1" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto1</property>
    <property name="ParentColor">0</property>
    <property name="Top">228</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto1JSBlur</property>
    <property name="jsOnFocus">sPuesto1JSFocus</property>
    <property name="jsOnKeyPress">sPuesto1JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante7" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">270</property>
    <property name="Name">sFirmante7</property>
    <property name="ParentColor">0</property>
    <property name="Top">250</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante7JSBlur</property>
    <property name="jsOnFocus">sFirmante7JSFocus</property>
    <property name="jsOnKeyPress">sFirmante7JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto7" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto7</property>
    <property name="ParentColor">0</property>
    <property name="Top">250</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto7JSBlur</property>
    <property name="jsOnFocus">sPuesto7JSFocus</property>
    <property name="jsOnKeyPress">sPuesto7JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante9" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">270</property>
    <property name="Name">sFirmante9</property>
    <property name="ParentColor">0</property>
    <property name="Top">272</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante9JSBlur</property>
    <property name="jsOnFocus">sFirmante9JSFocus</property>
    <property name="jsOnKeyPress">sFirmante9JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto9" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto9</property>
    <property name="ParentColor">0</property>
    <property name="Top">272</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto9JSBlur</property>
    <property name="jsOnFocus">sPuesto9JSFocus</property>
    <property name="jsOnKeyPress">sPuesto9JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante10" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">270</property>
    <property name="Name">sFirmante10</property>
    <property name="ParentColor">0</property>
    <property name="Top">294</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante10JSBlur</property>
    <property name="jsOnFocus">sFirmante10JSFocus</property>
    <property name="jsOnKeyPress">sFirmante10JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto10" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto10</property>
    <property name="ParentColor">0</property>
    <property name="Top">294</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto10JSBlur</property>
    <property name="jsOnFocus">sPuesto10JSFocus</property>
    <property name="jsOnKeyPress">sPuesto10JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante2" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">271</property>
    <property name="Name">sFirmante2</property>
    <property name="ParentColor">0</property>
    <property name="Top">334</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante2JSBlur</property>
    <property name="jsOnFocus">sFirmante2JSFocus</property>
    <property name="jsOnKeyPress">sFirmante2JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto2" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto2</property>
    <property name="ParentColor">0</property>
    <property name="Top">334</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto2JSBlur</property>
    <property name="jsOnFocus">sPuesto2JSFocus</property>
    <property name="jsOnKeyPress">sPuesto2JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante3" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">271</property>
    <property name="Name">sFirmante3</property>
    <property name="ParentColor">0</property>
    <property name="Top">355</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante3JSBlur</property>
    <property name="jsOnFocus">sFirmante3JSFocus</property>
    <property name="jsOnKeyPress">sFirmante3JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto3" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto3</property>
    <property name="ParentColor">0</property>
    <property name="Top">356</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto3JSBlur</property>
    <property name="jsOnFocus">sPuesto3JSFocus</property>
    <property name="jsOnKeyPress">sPuesto3JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante4" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">271</property>
    <property name="Name">sFirmante4</property>
    <property name="ParentColor">0</property>
    <property name="Top">377</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante4JSBlur</property>
    <property name="jsOnFocus">sFirmante4JSFocus</property>
    <property name="jsOnKeyPress">sFirmante4JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto4" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto4</property>
    <property name="ParentColor">0</property>
    <property name="Top">377</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto4JSBlur</property>
    <property name="jsOnFocus">sPuesto4JSFocus</property>
    <property name="jsOnKeyPress">sPuesto4JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante5" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">271</property>
    <property name="Name">sFirmante5</property>
    <property name="ParentColor">0</property>
    <property name="Top">399</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante5JSBlur</property>
    <property name="jsOnFocus">sFirmante5JSFocus</property>
    <property name="jsOnKeyPress">sFirmante5JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto5" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto5</property>
    <property name="ParentColor">0</property>
    <property name="Top">399</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto5JSBlur</property>
    <property name="jsOnFocus">sPuesto5JSFocus</property>
    <property name="jsOnKeyPress">sPuesto5JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante6" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">271</property>
    <property name="Name">sFirmante6</property>
    <property name="ParentColor">0</property>
    <property name="Top">421</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante6JSBlur</property>
    <property name="jsOnChange">sFirmante6JSChange</property>
    <property name="jsOnFocus">sFirmante6JSFocus</property>
    <property name="jsOnKeyPress">sFirmante6JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto6" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto6</property>
    <property name="ParentColor">0</property>
    <property name="Top">421</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto6JSBlur</property>
    <property name="jsOnFocus">sPuesto6JSFocus</property>
    <property name="jsOnKeyPress">sPuesto6JSKeyPress</property>
  </object>
  <object class="Edit" name="sFirmante8" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">271</property>
    <property name="Name">sFirmante8</property>
    <property name="ParentColor">0</property>
    <property name="Top">443</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sFirmante8JSBlur</property>
    <property name="jsOnFocus">sFirmante8JSFocus</property>
    <property name="jsOnKeyPress">sFirmante8JSKeyPress</property>
  </object>
  <object class="Edit" name="sPuesto8" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">545</property>
    <property name="Name">sPuesto8</property>
    <property name="ParentColor">0</property>
    <property name="Top">443</property>
    <property name="Width">200</property>
    <property name="jsOnBlur">sPuesto8JSBlur</property>
    <property name="jsOnFocus">sPuesto8JSFocus</property>
    <property name="jsOnKeyPress">sPuesto8JSKeyPress</property>
  </object>
  <object class="DateTimePicker" name="cbodIdFecha" >
    <property name="Caption">dIdFecha</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="IfFormat">%d/%m/%Y</property>
    <property name="Left">85</property>
    <property name="Name">cbodIdFecha</property>
    <property name="Top">185</property>
    <property name="Width">100</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Fecha:</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label23</property>
    <property name="Top">190</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="hdIdFecha" >
    <property name="Height">18</property>
    <property name="Left">270</property>
    <property name="Name">hdIdFecha</property>
    <property name="Top">190</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hsOperacion" >
    <property name="Height">18</property>
    <property name="Left">545</property>
    <property name="Name">hsOperacion</property>
    <property name="Top">190</property>
    <property name="Width">200</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Enabled">0</property>
    <property name="Font">
    <property name="Color">#FF0000</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">50</property>
    <property name="Left">10</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentFont">0</property>
    <property name="Top">470</property>
    <property name="Width">730</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Actualizar Pagina</property>
    <property name="Color">#000080</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">385</property>
    <property name="Name">Button1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Width">175</property>
  </object>
  <object class="Database" name="dbintelcode1" >
        <property name="Left">756</property>
        <property name="Top">320</property>
    <property name="Connected"></property>
    <property name="Name">dbintelcode1</property>
  </object>
  <object class="Datasource" name="dsfirmas1" >
        <property name="Left">758</property>
        <property name="Top">255</property>
    <property name="Dataset">qryFirmas1</property>
    <property name="Name">dsfirmas1</property>
  </object>
  <object class="Query" name="qryFirmas1" >
        <property name="Left">755</property>
        <property name="Top">377</property>
    <property name="Database">dbintelcode1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryFirmas1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
