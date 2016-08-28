<?php
<object class="Unit2" name="Unit2" baseclass="Page">
  <property name="Background"></property>
  <property name="BottomMargin"></property>
  <property name="Caption">Orden de Cambio</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">535</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit2</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">Unit2Show</property>
  <property name="jsOnLoad">Unit2JSLoad</property>
  <object class="Panel" name="panelCedulaProcedencia" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#E0E0E0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">385</property>
    <property name="Left">5</property>
    <property name="Name">panelCedulaProcedencia</property>
    <property name="ParentColor">0</property>
    <property name="Top">117</property>
    <property name="Width">695</property>
    <object class="Edit" name="iCedulaProcedencia" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">380</property>
      <property name="Name">iCedulaProcedencia</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">115</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption"><![CDATA[CEDULA DE PROCEDENCIA DE LA NOTIFICACI&Oacute;N DE CAMBIO No.]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label1</property>
      <property name="Top">10</property>
      <property name="Width">375</property>
    </object>
    <object class="Memo" name="mCedulaMotivo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">47</property>
      <property name="Left">135</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mCedulaMotivo</property>
      <property name="ParentColor">0</property>
      <property name="Top">28</property>
      <property name="Width">550</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">MOTIVO DEL CAMBIO</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label2</property>
      <property name="Top">30</property>
      <property name="Width">130</property>
    </object>
    <object class="Memo" name="mCedulaProblematica" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">47</property>
      <property name="Left">135</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mCedulaProblematica</property>
      <property name="ParentColor">0</property>
      <property name="Top">75</property>
      <property name="Width">550</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">PROBLEMATICA ACTUAL</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label3</property>
      <property name="Top">77</property>
      <property name="Width">130</property>
    </object>
    <object class="Memo" name="mCedulaCambioPropuesto" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">47</property>
      <property name="Left">135</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mCedulaCambioPropuesto</property>
      <property name="ParentColor">0</property>
      <property name="Top">123</property>
      <property name="Width">550</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">CAMBIO PROPUESTO</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label4</property>
      <property name="Top">125</property>
      <property name="Width">130</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">SE REQUIERE:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label5</property>
      <property name="Top">175</property>
      <property name="Width">130</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">MONTO:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">135</property>
      <property name="Name">Label6</property>
      <property name="Top">175</property>
      <property name="Width">50</property>
    </object>
    <object class="Edit" name="dCedulaMontoRequerido" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">185</property>
      <property name="Name">dCedulaMontoRequerido</property>
      <property name="ParentColor">0</property>
      <property name="Top">172</property>
      <property name="Width">115</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">PLAZO:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">304</property>
      <property name="Name">Label7</property>
      <property name="Top">174</property>
      <property name="Width">50</property>
    </object>
    <object class="Edit" name="iCedulaDiasPlazo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">354</property>
      <property name="Name">iCedulaDiasPlazo</property>
      <property name="ParentColor">0</property>
      <property name="Top">171</property>
      <property name="Width">76</property>
    </object>
    <object class="Edit" name="iCedulaDiasProrroga" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">559</property>
      <property name="Name">iCedulaDiasProrroga</property>
      <property name="ParentColor">0</property>
      <property name="Top">167</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">PRORROGA:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">484</property>
      <property name="Name">Label8</property>
      <property name="Top">173</property>
      <property name="Width">71</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">DIAS</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">434</property>
      <property name="Name">Label9</property>
      <property name="Top">174</property>
      <property name="Width">50</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">DIAS</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">620</property>
      <property name="Name">Label10</property>
      <property name="Top">172</property>
      <property name="Width">50</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption"><![CDATA[N&uacute;mero de Hojas presentadas como soporte:]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label11</property>
      <property name="Top">197</property>
      <property name="Width">275</property>
    </object>
    <object class="Edit" name="sCedulaSoporte" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">265</property>
      <property name="Name">sCedulaSoporte</property>
      <property name="ParentColor">0</property>
      <property name="Top">192</property>
      <property name="Width">295</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[DETERMINACI&Oacute;N ACERCA DE LA PROCEDENCIA DE LA NOTIFICACI&Oacute;N DE CAMBIO]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">135</property>
      <property name="Name">Label12</property>
      <property name="ParentFont">0</property>
      <property name="Top">220</property>
      <property name="Width">545</property>
    </object>
    <object class="RadioGroup" name="lCedulaProcede" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:7:&quot;Procede&quot;;i:1;s:10:&quot;No Procede&quot;;}]]></property>
      <property name="Left">140</property>
      <property name="Name">lCedulaProcede</property>
      <property name="Top">235</property>
      <property name="Width">255</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">ACCIONES PROPUESTAS</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">31</property>
      <property name="Left">5</property>
      <property name="Name">Label13</property>
      <property name="Top">254</property>
      <property name="Width">130</property>
    </object>
    <object class="Memo" name="mCedulaAccionesPropuestas" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">47</property>
      <property name="Left">135</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mCedulaAccionesPropuestas</property>
      <property name="ParentColor">0</property>
      <property name="Top">255</property>
      <property name="Width">550</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[DETERMINA PROCEDENCIA
&Aacute;REA RESPONSABLE DE LA EJECUCI&Oacute;N DE LOS TRABAJOS]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">135</property>
      <property name="Name">Label14</property>
      <property name="ParentFont">0</property>
      <property name="Top">310</property>
      <property name="Width">540</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Caption">NOMBRE:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">5</property>
      <property name="Name">Label15</property>
      <property name="Top">329</property>
      <property name="Width">130</property>
    </object>
    <object class="Edit" name="sCedulaAreaResponsable" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">135</property>
      <property name="Name">sCedulaAreaResponsable</property>
      <property name="ParentColor">0</property>
      <property name="Top">327</property>
      <property name="Width">545</property>
    </object>
    <object class="Edit" name="sCedulaAntefirman" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">135</property>
      <property name="Name">sCedulaAntefirman</property>
      <property name="ParentColor">0</property>
      <property name="Top">349</property>
      <property name="Width">545</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">ANTEFIRMAN</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">5</property>
      <property name="Name">Label16</property>
      <property name="Top">351</property>
      <property name="Width">130</property>
    </object>
  </object>
  <object class="DBGrid" name="DBGrid1" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">88</property>
    <property name="Left">165</property>
    <property name="Name">DBGrid1</property>
    <property name="Top">2</property>
    <property name="Width">535</property>
    <property name="jsOnClick">DBGrid1JSClick</property>
  </object>
  <object class="Panel" name="panelNotificacionCambio" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#E0E0E0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">385</property>
    <property name="Left">5</property>
    <property name="Name">panelNotificacionCambio</property>
    <property name="ParentColor">0</property>
    <property name="Top">117</property>
    <property name="Width">695</property>
    <object class="Label" name="Label17" >
      <property name="Caption">FECHA EFECTIVA:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label17</property>
      <property name="Top">10</property>
      <property name="Width">110</property>
    </object>
    <object class="DateTimePicker" name="dNotificacionFecha" >
      <property name="Caption">dNotificacionFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">125</property>
      <property name="Name">dNotificacionFecha</property>
      <property name="Top">8</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption"><![CDATA[DESCRIPCI&Oacute;N DEL CAMBIO]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">33</property>
      <property name="Left">10</property>
      <property name="Name">Label18</property>
      <property name="Top">32</property>
      <property name="Width">110</property>
    </object>
    <object class="Memo" name="mNotificacionDescripcion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">125</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mNotificacionDescripcion</property>
      <property name="ParentColor">0</property>
      <property name="Top">30</property>
      <property name="Width">555</property>
    </object>
    <object class="ComboBox" name="sNotificacionProcede" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="ItemIndex">0</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">10</property>
      <property name="Name">sNotificacionProcede</property>
      <property name="Top">73</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">Proceder con el trabajo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">55</property>
      <property name="Name">Label19</property>
      <property name="Top">75</property>
      <property name="Width">210</property>
    </object>
    <object class="ComboBox" name="sNotificacionRequierePrecios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="ItemIndex">0</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">10</property>
      <property name="Name">sNotificacionRequierePrecios</property>
      <property name="Top">95</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Caption">Requiere precios extraordinarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">55</property>
      <property name="Name">Label20</property>
      <property name="Top">97</property>
      <property name="Width">210</property>
    </object>
    <object class="ComboBox" name="sNotificacionExtiendeTiempo" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="ItemIndex">0</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">457</property>
      <property name="Name">sNotificacionExtiendeTiempo</property>
      <property name="Top">72</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Alignment">agRight</property>
      <property name="Caption"><![CDATA[Se autoriza extensi&oacute;n de tiempo]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">267</property>
      <property name="Name">Label21</property>
      <property name="Top">75</property>
      <property name="Width">185</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Entregar Propuesta En:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">267</property>
      <property name="Name">Label22</property>
      <property name="Top">97</property>
      <property name="Width">185</property>
    </object>
    <object class="Edit" name="iNotificacionEntregaPropuesta" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">457</property>
      <property name="Name">iNotificacionEntregaPropuesta</property>
      <property name="ParentColor">0</property>
      <property name="Top">95</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">Dias</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">502</property>
      <property name="Name">Label23</property>
      <property name="Top">98</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Otro Requirimiento:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">267</property>
      <property name="Name">Label24</property>
      <property name="Top">118</property>
      <property name="Width">185</property>
    </object>
    <object class="Edit" name="sNotificacionOtroRequerimiento" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">457</property>
      <property name="Name">sNotificacionOtroRequerimiento</property>
      <property name="ParentColor">0</property>
      <property name="Top">116</property>
      <property name="Width">223</property>
    </object>
    <object class="CheckBox" name="sNotificacionPlanosAdjuntos" >
      <property name="Caption">Planos / Datos ADJUNTOS</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Left">10</property>
      <property name="Name">sNotificacionPlanosAdjuntos</property>
      <property name="Top">117</property>
      <property name="Width">255</property>
    </object>
    <object class="Memo" name="mNotificacionSupervisor" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">60</property>
      <property name="Left">15</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mNotificacionSupervisor</property>
      <property name="ParentColor">0</property>
      <property name="Top">142</property>
      <property name="Width">325</property>
    </object>
    <object class="Memo" name="mNotificacionResidente" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">60</property>
      <property name="Left">355</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mNotificacionResidente</property>
      <property name="ParentColor">0</property>
      <property name="Top">142</property>
      <property name="Width">325</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">AFIRMAN</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">20</property>
      <property name="Name">Label25</property>
      <property name="Top">226</property>
      <property name="Width">60</property>
    </object>
    <object class="Edit" name="sNotificacionAntefirman" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">87</property>
      <property name="Name">sNotificacionAntefirman</property>
      <property name="ParentColor">0</property>
      <property name="Top">223</property>
      <property name="Width">593</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Nombre del  Supervisor Autorizado y Fecha de Firma</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label26</property>
      <property name="ParentFont">0</property>
      <property name="Top">206</property>
      <property name="Width">325</property>
    </object>
    <object class="Label" name="Label27" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Nombre del  Residente y Fecha de Firma</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">355</property>
      <property name="Name">Label27</property>
      <property name="ParentFont">0</property>
      <property name="Top">206</property>
      <property name="Width">325</property>
    </object>
    <object class="Label" name="Label28" >
      <property name="Alignment">agLeft</property>
      <property name="Caption">OFICIO DE LA CONTRATISTA No.</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label28</property>
      <property name="ParentFont">0</property>
      <property name="Top">261</property>
      <property name="Width">200</property>
    </object>
    <object class="Edit" name="sNotificacionOficio" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">222</property>
      <property name="Name">sNotificacionOficio</property>
      <property name="ParentColor">0</property>
      <property name="Top">258</property>
      <property name="Width">123</property>
    </object>
    <object class="RadioGroup" name="lNotificacionComentarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">32</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:25:&quot;ACUSO RECIBO Y ACEPTACI&Oacute;N&quot;;i:1;s:28:&quot;ACUSO RECIBO CON COMENTARIOS&quot;;}]]></property>
      <property name="Left">355</property>
      <property name="Name">lNotificacionComentarios</property>
      <property name="Top">253</property>
      <property name="Width">325</property>
    </object>
    <object class="Label" name="Label29" >
      <property name="Alignment">agLeft</property>
      <property name="Caption">LA PROPUESTA:</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">16</property>
      <property name="Name">Label29</property>
      <property name="ParentFont">0</property>
      <property name="Top">298</property>
      <property name="Width">200</property>
    </object>
    <object class="RadioGroup" name="lNotificacionPropuesta" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:15:&quot;SERA PRESENTADA&quot;;i:1;s:8:&quot;SE ANEXA&quot;;}]]></property>
      <property name="Left">225</property>
      <property name="Name">lNotificacionPropuesta</property>
      <property name="Top">296</property>
      <property name="Width">320</property>
    </object>
    <object class="Memo" name="mNotificacionContratista" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">45</property>
      <property name="Left">155</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mNotificacionContratista</property>
      <property name="ParentColor">0</property>
      <property name="Top">320</property>
      <property name="Width">525</property>
    </object>
    <object class="DateTimePicker" name="dNotificacionFechaFirma" >
      <property name="Caption">dNotificacionFechaFirma</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">20</property>
      <property name="Name">dNotificacionFechaFirma</property>
      <property name="Top">330</property>
      <property name="Width">125</property>
    </object>
    <object class="Label" name="Label30" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">FECHA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">21</property>
      <property name="Name">Label30</property>
      <property name="Top">353</property>
      <property name="Width">119</property>
    </object>
    <object class="Label" name="Label31" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">NOMBRE CARGO DEL REPRESENTANTE AUTORIZADO Y FECHA DE FIRMA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">165</property>
      <property name="Name">Label31</property>
      <property name="ParentFont">0</property>
      <property name="Top">368</property>
      <property name="Width">485</property>
    </object>
  </object>
  <object class="Button" name="cmdCedulaProcedencia" >
    <property name="Caption">Cedula de Procedencia</property>
    <property name="Color">#FFFFD7</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">5</property>
    <property name="Name">cmdCedulaProcedencia</property>
    <property name="ParentColor">0</property>
    <property name="Top">92</property>
    <property name="Width">160</property>
    <property name="jsOnClick">cmdCedulaProcedenciaJSClick</property>
  </object>
  <object class="Button" name="cmdNotificacionCambio" >
    <property name="Caption">Notificacion de Cambio</property>
    <property name="Color">#FFFFD7</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">165</property>
    <property name="Name">cmdNotificacionCambio</property>
    <property name="ParentColor">0</property>
    <property name="Top">92</property>
    <property name="Width">160</property>
    <property name="jsOnClick">cmdNotificacionCambioJSClick</property>
  </object>
  <object class="Button" name="cmdDictamenTecnico" >
    <property name="Caption">Dictamen Tecnico</property>
    <property name="Color">#FFFFD7</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">325</property>
    <property name="Name">cmdDictamenTecnico</property>
    <property name="ParentColor">0</property>
    <property name="Top">92</property>
    <property name="Width">160</property>
    <property name="jsOnClick">cmdDictamenTecnicoJSClick</property>
  </object>
  <object class="Button" name="cmdOrdenCambio" >
    <property name="Caption">Orden de Cambio</property>
    <property name="Color">#FFFFD7</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">485</property>
    <property name="Name">cmdOrdenCambio</property>
    <property name="ParentColor">0</property>
    <property name="Top">92</property>
    <property name="Width">160</property>
    <property name="jsOnClick">cmdOrdenCambioJSClick</property>
  </object>
  <object class="Panel" name="panelDictamenTecnico" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#E0E0E0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">385</property>
    <property name="Left">5</property>
    <property name="Name">panelDictamenTecnico</property>
    <property name="ParentColor">0</property>
    <property name="Top">117</property>
    <property name="Width">695</property>
    <object class="Memo" name="mDictamenDescripcion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">145</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDictamenDescripcion</property>
      <property name="ParentColor">0</property>
      <property name="Top">10</property>
      <property name="Width">535</property>
    </object>
    <object class="Label" name="Label32" >
      <property name="Caption"><![CDATA[DESCRIPCI&Oacute;N DEL CAMBIO]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Left">5</property>
      <property name="Name">Label32</property>
      <property name="Top">13</property>
      <property name="Width">135</property>
    </object>
    <object class="Memo" name="mDictamenFundamento" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">145</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDictamenFundamento</property>
      <property name="ParentColor">0</property>
      <property name="Top">54</property>
      <property name="Width">535</property>
    </object>
    <object class="Label" name="Label33" >
      <property name="Caption">FUNDAMENTO NORMATIVO</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Left">5</property>
      <property name="Name">Label33</property>
      <property name="Top">57</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label34" >
      <property name="Caption">ANTECEDENTES DEL CONTRATO</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Left">5</property>
      <property name="Name">Label34</property>
      <property name="Top">101</property>
      <property name="Width">135</property>
    </object>
    <object class="Memo" name="mDictamenAntecedentes" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">145</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDictamenAntecedentes</property>
      <property name="ParentColor">0</property>
      <property name="Top">98</property>
      <property name="Width">535</property>
    </object>
    <object class="Memo" name="mDictamenJustificacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">145</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDictamenJustificacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">143</property>
      <property name="Width">535</property>
    </object>
    <object class="Label" name="Label35" >
      <property name="Caption"><![CDATA[JUSTIFICACI&Oacute;N DEL CAMBIO]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Left">5</property>
      <property name="Name">Label35</property>
      <property name="Top">146</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label36" >
      <property name="Caption"><![CDATA[DECLARACI&Oacute;N DE VERIFICACI&Oacute;N
PRESUPUESTAL]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Left">5</property>
      <property name="Name">Label36</property>
      <property name="Top">192</property>
      <property name="Width">135</property>
    </object>
    <object class="Memo" name="mDictamenVerificacionPresupuestal" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">145</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDictamenVerificacionPresupuestal</property>
      <property name="ParentColor">0</property>
      <property name="Top">189</property>
      <property name="Width">535</property>
    </object>
    <object class="Memo" name="mDictamenResidente" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">61</property>
      <property name="Left">20</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mDictamenResidente</property>
      <property name="ParentColor">0</property>
      <property name="Top">284</property>
      <property name="Width">315</property>
    </object>
    <object class="Label" name="Label37" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">DICTAMINA EL CAMBIO
RESIDENTE</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">35</property>
      <property name="Left">100</property>
      <property name="Name">Label37</property>
      <property name="Top">247</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label38" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">NOMBRE Y FIRMA DEL RESIDENTE DE OBRA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">35</property>
      <property name="Name">Label38</property>
      <property name="Top">347</property>
      <property name="Width">290</property>
    </object>
    <object class="Label" name="Label39" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ANTEFIRMAN</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">378</property>
      <property name="Name">Label39</property>
      <property name="Top">347</property>
      <property name="Width">290</property>
    </object>
    <object class="Memo" name="sDictamenAntefirman" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">363</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">sDictamenAntefirman</property>
      <property name="ParentColor">0</property>
      <property name="Top">320</property>
      <property name="Width">315</property>
    </object>
  </object>
  <object class="Panel" name="panelOrdenCambio" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#E0E0E0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">405</property>
    <property name="Left">5</property>
    <property name="Name">panelOrdenCambio</property>
    <property name="ParentColor">0</property>
    <property name="Top">117</property>
    <property name="Width">695</property>
    <object class="Label" name="Label40" >
      <property name="Caption">Oficio No.</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label40</property>
      <property name="Top">10</property>
      <property name="Width">65</property>
    </object>
    <object class="Edit" name="sOrdenOficio" >
      <property name="Color">#FFFFFF</property>
      <property name="Cursor">crText</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">99</property>
      <property name="Name">sOrdenOficio</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">4</property>
      <property name="Width">145</property>
      <property name="jsOnBlur">sOrdenOficioJSBlur</property>
      <property name="jsOnFocus">sOrdenOficioJSFocus</property>
      <property name="jsOnKeyPress">sOrdenOficioJSKeyPress</property>
    </object>
    <object class="Edit" name="sOrdenCambio" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">395</property>
      <property name="Name">sOrdenCambio</property>
      <property name="ParentColor">0</property>
      <property name="Top">2</property>
      <property name="Width">165</property>
      <property name="jsOnKeyPress">sOrdenCambioJSKeyPress</property>
    </object>
    <object class="Label" name="Label41" >
      <property name="Caption">Orden de Cambio No.</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">270</property>
      <property name="Name">Label41</property>
      <property name="Top">10</property>
      <property name="Width">115</property>
    </object>
    <object class="Label" name="Label42" >
      <property name="Caption">Fecha Efectiva</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label42</property>
      <property name="Top">28</property>
      <property name="Width">85</property>
    </object>
    <object class="DateTimePicker" name="dOrdenFecha" >
      <property name="Caption">dOrdenFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">100</property>
      <property name="Name">dOrdenFecha</property>
      <property name="Top">26</property>
      <property name="Width">145</property>
    </object>
    <object class="Label" name="Label43" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Por la Presente el Contratista y la Residencia de Obra acuerdan, incorporar los cambios siguientes:</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label43</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">50</property>
      <property name="Width">660</property>
    </object>
    <object class="Edit" name="dOrdenMonto" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">81</property>
      <property name="Name">dOrdenMonto</property>
      <property name="ParentColor">0</property>
      <property name="Top">65</property>
      <property name="Width">84</property>
      <property name="jsOnFocus">dOrdenMontoJSFocus</property>
      <property name="jsOnKeyPress">dOrdenMontoJSKeyPress</property>
    </object>
    <object class="Label" name="Label44" >
      <property name="Caption">MONTO</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label44</property>
      <property name="Top">67</property>
      <property name="Width">65</property>
    </object>
    <object class="Edit" name="iOrdenPlazo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">81</property>
      <property name="Name">iOrdenPlazo</property>
      <property name="ParentColor">0</property>
      <property name="Top">87</property>
      <property name="Width">59</property>
      <property name="jsOnKeyPress">iOrdenPlazoJSKeyPress</property>
    </object>
    <object class="Label" name="Label45" >
      <property name="Caption">PLAZO</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label45</property>
      <property name="Top">88</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label46" >
      <property name="Caption">DIAS</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">140</property>
      <property name="Name">Label46</property>
      <property name="Top">90</property>
      <property name="Width">65</property>
    </object>
    <object class="Memo" name="mOrdenOtros" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">31</property>
      <property name="Left">80</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mOrdenOtros</property>
      <property name="Top">109</property>
      <property name="Width">595</property>
      <property name="jsOnKeyPress">mOrdenOtrosJSKeyPress</property>
    </object>
    <object class="Label" name="Label47" >
      <property name="Caption">OTROS</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label47</property>
      <property name="Top">111</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label48" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Anexos</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">16</property>
      <property name="Name">Label48</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">144</property>
      <property name="Width">660</property>
    </object>
    <object class="CheckBox" name="sOrdenOficios" >
      <property name="Caption"><![CDATA[Oficios de Solicitud (Contratista, Supervisi&oacute;n, &Aacute;rea Solicitante, etc.)]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">15</property>
      <property name="Name">sOrdenOficios</property>
      <property name="ParentFont">0</property>
      <property name="Top">160</property>
      <property name="Width">405</property>
    </object>
    <object class="CheckBox" name="sOrdenIngenieria" >
      <property name="Caption"><![CDATA[Ingenier&iacute;a ( planos )]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">15</property>
      <property name="Name">sOrdenIngenieria</property>
      <property name="ParentFont">0</property>
      <property name="Top">182</property>
      <property name="Width">405</property>
    </object>
    <object class="CheckBox" name="sOrdenNotasBitacora" >
      <property name="Caption"><![CDATA[Notas de Bit&aacute;cora]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">15</property>
      <property name="Name">sOrdenNotasBitacora</property>
      <property name="ParentFont">0</property>
      <property name="Top">205</property>
      <property name="Width">405</property>
    </object>
    <object class="CheckBox" name="sOrdenModificacionProgramas" >
      <property name="Caption"><![CDATA[Modificaci&oacute;n a programas]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">15</property>
      <property name="Name">sOrdenModificacionProgramas</property>
      <property name="ParentFont">0</property>
      <property name="Top">229</property>
      <property name="Width">405</property>
    </object>
    <object class="Label" name="Label49" >
      <property name="Caption"><![CDATA[Notificaci&oacute;n(es) de cambio No(s).]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label49</property>
      <property name="Top">259</property>
      <property name="Width">210</property>
    </object>
    <object class="Edit" name="Edit7" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">220</property>
      <property name="Name">Edit7</property>
      <property name="ParentColor">0</property>
      <property name="Top">262</property>
      <property name="Width">155</property>
    </object>
    <object class="CheckBox" name="sOrdenAnalisisdePrecios" >
      <property name="Caption"><![CDATA[An&aacute;lisis de precios unitarios]]></property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">434</property>
      <property name="Name">sOrdenAnalisisdePrecios</property>
      <property name="ParentFont">0</property>
      <property name="Top">205</property>
      <property name="Width">206</property>
    </object>
    <object class="CheckBox" name="sOrdenSancionesdeCampo" >
      <property name="Caption">Sanciones de Campo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">434</property>
      <property name="Name">sOrdenSancionesdeCampo</property>
      <property name="ParentFont">0</property>
      <property name="Top">187</property>
      <property name="Width">206</property>
    </object>
    <object class="CheckBox" name="sOrdenPreciosExtraordinarios" >
      <property name="Caption">Precios Unitarios Extraordinarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">434</property>
      <property name="Name">sOrdenPreciosExtraordinarios</property>
      <property name="ParentFont">0</property>
      <property name="Top">160</property>
      <property name="Width">206</property>
    </object>
    <object class="Memo" name="mOrdenSupervisor" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">15</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mOrdenSupervisor</property>
      <property name="Top">276</property>
      <property name="Width">315</property>
      <property name="jsOnKeyPress">mOrdenSupervisorJSKeyPress</property>
    </object>
    <object class="Memo" name="mOrdenResidente" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">340</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mOrdenResidente</property>
      <property name="Top">274</property>
      <property name="Width">340</property>
      <property name="jsOnKeyPress">mOrdenResidenteJSKeyPress</property>
    </object>
    <object class="Label" name="Label50" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Nombre del  Supervisor Autorizado y Fecha de Firma</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label50</property>
      <property name="Top">316</property>
      <property name="Width">315</property>
    </object>
    <object class="Label" name="Label51" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Nombre del  Residente y Fecha de Firma</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">340</property>
      <property name="Name">Label51</property>
      <property name="Top">316</property>
      <property name="Width">335</property>
    </object>
    <object class="Edit" name="sOrdenNotificacionesdeCambio" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">220</property>
      <property name="Name">sOrdenNotificacionesdeCambio</property>
      <property name="ParentColor">0</property>
      <property name="Top">255</property>
      <property name="Width">155</property>
      <property name="jsOnKeyPress">sOrdenNotificacionesdeCambioJSKeyPress</property>
    </object>
    <object class="Edit" name="sOrdenAntefirman" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">95</property>
      <property name="Name">sOrdenAntefirman</property>
      <property name="ParentColor">0</property>
      <property name="Top">333</property>
      <property name="Width">580</property>
      <property name="jsOnKeyPress">sOrdenAntefirmanJSKeyPress</property>
    </object>
    <object class="Label" name="Label53" >
      <property name="Caption">ANTEFIRMAN</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">15</property>
      <property name="Name">Label53</property>
      <property name="Top">336</property>
      <property name="Width">80</property>
    </object>
    <object class="DateTimePicker" name="dOrdenFechaFirma" >
      <property name="Caption">DateTimePicker1</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">98</property>
      <property name="Name">dOrdenFechaFirma</property>
      <property name="Top">368</property>
      <property name="Width">145</property>
    </object>
    <object class="Label" name="Label54" >
      <property name="Caption">Fecha Efectiva</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">13</property>
      <property name="Name">Label54</property>
      <property name="Top">370</property>
      <property name="Width">85</property>
    </object>
    <object class="Memo" name="mOrdenContratista" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">29</property>
      <property name="Left">255</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mOrdenContratista</property>
      <property name="Top">356</property>
      <property name="Width">420</property>
    </object>
    <object class="Label" name="Label55" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">NOMBRE CARGO DEL REPRESENTANTE AUTORIZADO Y FECHA DE FIRMA</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">260</property>
      <property name="Name">Label55</property>
      <property name="Top">386</property>
      <property name="Width">410</property>
    </object>
  </object>
  <object class="Button" name="cmdNuevo" >
    <property name="Caption">Nuevo</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">10</property>
    <property name="Name">cmdNuevo</property>
    <property name="ParentColor">0</property>
    <property name="Top">5</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdNuevoJSClick</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Caption">Aceptar</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">10</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentColor">0</property>
    <property name="Top">30</property>
    <property name="Width">75</property>
    <property name="OnClick">cmdAceptarClick</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Caption">Imprimir</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">10</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="Top">55</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Caption">Modificar</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">85</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentColor">0</property>
    <property name="Top">5</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Caption">Cancelar</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">85</property>
    <property name="Name">cmdCancelar</property>
    <property name="ParentColor">0</property>
    <property name="Top">30</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Caption">Eliminar</property>
    <property name="Color">#FFFFFF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">85</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">55</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
  </object>
  <object class="HiddenField" name="cedulaProcedencia" >
    <property name="Height">20</property>
    <property name="Left">650</property>
    <property name="Name">cedulaProcedencia</property>
    <property name="Top">95</property>
    <property name="Width">130</property>
  </object>
  <object class="Database" name="Database1" >
        <property name="Left">722</property>
        <property name="Top">148</property>
    <property name="Connected"></property>
    <property name="DatabaseName">intelcode</property>
    <property name="Host">127.0.0.1</property>
    <property name="Name">Database1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">722</property>
        <property name="Top">270</property>
    <property name="Database">Database1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:279:&quot;select  iCedulaProcedencia as Notifiacion_No,  sCedulaAreaResponsable as Responsable,  dOrdenMonto as Monto_Requerido,  sOrdenOficio as  Oficio_De_Notificacion,  sOrdenCambio as Orden_De_Cambio,  dNotificacionFecha as Fecha_Efectiva from ordendecambio where sContrato='428237813'&quot;;}]]></property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">725</property>
        <property name="Top">210</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
</object>
?>
