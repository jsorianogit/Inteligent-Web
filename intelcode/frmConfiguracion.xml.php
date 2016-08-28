<?php
<object class="FrmConfiguracion" name="FrmConfiguracion" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Configuracion</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">370</property>
  <property name="IsMaster">0</property>
  <property name="Name">FrmConfiguracion</property>
  <property name="UseAjax">1</property>
  <property name="Width">664</property>
  <property name="OnShow">FrmConfiguracionShow</property>
  <property name="jsOnLoad">FrmConfiguracionJSLoad</property>
  <object class="Panel" name="panelPersonal" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">panelPersonal</property>
    <property name="Color">#DFDFDF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">270</property>
    <property name="Left">10</property>
    <property name="Name">panelPersonal</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">640</property>
    <object class="Edit" name="iJLunes" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJLunes</property>
      <property name="ParentColor">0</property>
      <property name="Top">48</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJLunesJSBlur</property>
      <property name="jsOnFocus">iJLunesJSFocus</property>
      <property name="jsOnKeyPress">iJLunesJSKeyPress</property>
    </object>
    <object class="Edit" name="iJMartes" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJMartes</property>
      <property name="ParentColor">0</property>
      <property name="Top">70</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJMartesJSBlur</property>
      <property name="jsOnFocus">iJMartesJSFocus</property>
      <property name="jsOnKeyPress">iJMartesJSKeyPress</property>
      <property name="jsOnKeyUp">iJMartesJSKeyUp</property>
    </object>
    <object class="Edit" name="iJMiercoles" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJMiercoles</property>
      <property name="ParentColor">0</property>
      <property name="Top">92</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJMiercolesJSBlur</property>
      <property name="jsOnFocus">iJMiercolesJSFocus</property>
      <property name="jsOnKeyPress">iJMiercolesJSKeyPress</property>
    </object>
    <object class="Edit" name="iJJueves" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJJueves</property>
      <property name="ParentColor">0</property>
      <property name="Top">114</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJJuevesJSBlur</property>
      <property name="jsOnFocus">iJJuevesJSFocus</property>
      <property name="jsOnKeyPress">iJJuevesJSKeyPress</property>
    </object>
    <object class="Edit" name="iJViernes" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJViernes</property>
      <property name="ParentColor">0</property>
      <property name="Top">136</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJViernesJSBlur</property>
      <property name="jsOnFocus">iJViernesJSFocus</property>
      <property name="jsOnKeyPress">iJViernesJSKeyPress</property>
    </object>
    <object class="Edit" name="iJSabado" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJSabado</property>
      <property name="ParentColor">0</property>
      <property name="Top">158</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJSabadoJSBlur</property>
      <property name="jsOnFocus">iJSabadoJSFocus</property>
      <property name="jsOnKeyPress">iJSabadoJSKeyPress</property>
      <property name="jsOnKeyUp">iJSabadoJSKeyUp</property>
    </object>
    <object class="Edit" name="iJDomingo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">104</property>
      <property name="Name">iJDomingo</property>
      <property name="ParentColor">0</property>
      <property name="Top">180</property>
      <property name="Width">55</property>
      <property name="jsOnBlur">iJDomingoJSBlur</property>
      <property name="jsOnFocus">iJDomingoJSFocus</property>
      <property name="jsOnKeyPress">iJDomingoJSKeyPress</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Lunes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label1</property>
      <property name="Top">48</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Martes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label2</property>
      <property name="Top">72</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Miercoles</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label3</property>
      <property name="Top">96</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Jueves</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label4</property>
      <property name="Top">118</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Viernes</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label5</property>
      <property name="Top">140</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Sabado</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label6</property>
      <property name="Top">161</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Domingo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">26</property>
      <property name="Name">Label7</property>
      <property name="Top">183</property>
      <property name="Width">70</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Contrl de Personal</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">175</property>
      <property name="Name">Label8</property>
      <property name="Top">50</property>
      <property name="Width">120</property>
    </object>
    <object class="ComboBox" name="lAsistencia" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:10:&quot;Asistencia&quot;;i:1;s:8:&quot;Guardias&quot;;}]]></property>
      <property name="Left">300</property>
      <property name="Name">lAsistencia</property>
      <property name="ParentColor">0</property>
      <property name="Top">45</property>
      <property name="Width">150</property>
      <property name="jsOnBlur">lAsistenciaJSBlur</property>
      <property name="jsOnFocus">lAsistenciaJSFocus</property>
      <property name="jsOnKeyPress">lAsistenciaJSKeyPress</property>
    </object>
    <object class="Edit" name="sIdGuardia" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">299</property>
      <property name="Name">sIdGuardia</property>
      <property name="ParentColor">0</property>
      <property name="Top">68</property>
      <property name="Width">151</property>
      <property name="jsOnBlur">sIdGuardiaJSBlur</property>
      <property name="jsOnFocus">sIdGuardiaJSFocus</property>
      <property name="jsOnKeyPress">sIdGuardiaJSKeyPress</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Guardia</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">175</property>
      <property name="Name">Label9</property>
      <property name="Top">70</property>
      <property name="Width">120</property>
    </object>
    <object class="Edit" name="sFalta" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">299</property>
      <property name="Name">sFalta</property>
      <property name="ParentColor">0</property>
      <property name="Top">90</property>
      <property name="Width">151</property>
      <property name="jsOnBlur">sFaltaJSBlur</property>
      <property name="jsOnFocus">sFaltaJSFocus</property>
      <property name="jsOnKeyDown">sFaltaJSKeyDown</property>
      <property name="jsOnKeyPress">sFaltaJSKeyPress</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">Cve. Inasistencia</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">175</property>
      <property name="Name">Label10</property>
      <property name="Top">92</property>
      <property name="Width">120</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">JORNADAS DE TRABAJO</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">25</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">28</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">CONTROL DE ASISTENCIA</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">175</property>
      <property name="Name">Label12</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">28</property>
      <property name="Width">275</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">PAQUETES DE PERSONAL</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">180</property>
      <property name="Name">Label13</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">118</property>
      <property name="Width">275</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Caption">Paq. Personal Tierra</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">180</property>
      <property name="Name">Label14</property>
      <property name="Top">138</property>
      <property name="Width">185</property>
    </object>
    <object class="Edit" name="sClaveTierra" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">370</property>
      <property name="Name">sClaveTierra</property>
      <property name="ParentColor">0</property>
      <property name="Top">136</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">sClaveTierraJSBlur</property>
      <property name="jsOnFocus">sClaveTierraJSFocus</property>
      <property name="jsOnKeyPress">sClaveTierraJSKeyPress</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Caption">id de Tipo de Equipo de Seguridad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">8</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">180</property>
      <property name="Name">Label15</property>
      <property name="ParentFont">0</property>
      <property name="Top">160</property>
      <property name="Width">185</property>
    </object>
    <object class="Edit" name="sClaveSeguridad" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">370</property>
      <property name="Name">sClaveSeguridad</property>
      <property name="ParentColor">0</property>
      <property name="Top">158</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">sClaveSeguridadJSBlur</property>
      <property name="jsOnFocus">sClaveSeguridadJSFocus</property>
      <property name="jsOnKeyPress">sClaveSeguridadJSKeyPress</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">id del equipo de seguridad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">180</property>
      <property name="Name">Label16</property>
      <property name="ParentFont">0</property>
      <property name="Top">181</property>
      <property name="Width">185</property>
    </object>
    <object class="Edit" name="sEquipoSeguridad" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">370</property>
      <property name="Name">sEquipoSeguridad</property>
      <property name="ParentColor">0</property>
      <property name="Top">179</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">sEquipoSeguridadJSBlur</property>
      <property name="jsOnFocus">sEquipoSeguridadJSFocus</property>
      <property name="jsOnKeyPress">sEquipoSeguridadJSKeyPress</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">Pernocta Principal</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">180</property>
      <property name="Name">Label17</property>
      <property name="ParentFont">0</property>
      <property name="Top">203</property>
      <property name="Width">185</property>
    </object>
    <object class="Edit" name="sIdPernocta" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">370</property>
      <property name="Name">sIdPernocta</property>
      <property name="ParentColor">0</property>
      <property name="Top">201</property>
      <property name="Width">85</property>
      <property name="jsOnBlur">sIdPernoctaJSBlur</property>
      <property name="jsOnFocus">sIdPernoctaJSFocus</property>
      <property name="jsOnKeyPress">sIdPernoctaJSKeyPress</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Imprimir Personal PEP</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">180</property>
      <property name="Name">Label18</property>
      <property name="ParentFont">0</property>
      <property name="Top">228</property>
      <property name="Width">190</property>
    </object>
    <object class="ComboBox" name="sImprimePEP" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">370</property>
      <property name="Name">sImprimePEP</property>
      <property name="ParentColor">0</property>
      <property name="Top">224</property>
      <property name="Width">45</property>
      <property name="jsOnBlur">sImprimePEPJSBlur</property>
      <property name="jsOnFocus">sImprimePEPJSFocus</property>
      <property name="jsOnKeyPress">sImprimePEPJSKeyPress</property>
    </object>
    <object class="Label" name="Label43" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">PERSONAL</property>
      <property name="Color">#000040</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">7</property>
      <property name="Name">Label43</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">7</property>
      <property name="Width">625</property>
    </object>
  </object>
  <object class="Button" name="cmdCompania" >
    <property name="Caption"><![CDATA[Compa&ntilde;ia]]></property>
    <property name="Color">#FFFFDF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">10</property>
    <property name="Name">cmdCompania</property>
    <property name="ParentColor">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdCompaniaJSClick</property>
  </object>
  <object class="Button" name="cmdAlmacen" >
    <property name="Caption">Almacen</property>
    <property name="Color">#FFFFDF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">86</property>
    <property name="Name">cmdAlmacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdAlmacenJSClick</property>
  </object>
  <object class="Button" name="cmdFormatos" >
    <property name="Caption">Formatos
y parametros</property>
    <property name="Color">#FFFFDF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">162</property>
    <property name="Name">cmdFormatos</property>
    <property name="ParentColor">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdFormatosJSClick</property>
  </object>
  <object class="Button" name="cmdSeguridad" >
    <property name="Caption">Archivos
y seguridad</property>
    <property name="Color">#FFFFDF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">239</property>
    <property name="Name">cmdSeguridad</property>
    <property name="ParentColor">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdSeguridadJSClick</property>
  </object>
  <object class="Button" name="cmdSistema" >
    <property name="Caption">Sistema</property>
    <property name="Color">#FFFFDF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">315</property>
    <property name="Name">cmdSistema</property>
    <property name="ParentColor">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdSistemaJSClick</property>
  </object>
  <object class="Button" name="cmdPersonal" >
    <property name="Caption">Personal</property>
    <property name="Color">#FFFFDF</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">392</property>
    <property name="Name">cmdPersonal</property>
    <property name="ParentColor">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="jsOnClick">cmdPersonalJSClick</property>
  </object>
  <object class="Panel" name="panelSistema" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#DFDFDF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">270</property>
    <property name="Left">10</property>
    <property name="Name">panelSistema</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">640</property>
    <object class="Label" name="Label30" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">CONFIGURACION</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label30</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">17</property>
      <property name="Width">625</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">Tipo de Administracion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label19</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sTipoContrato" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:3:{i:0;s:13:&quot;Tarifa Diaria&quot;;i:1;s:15:&quot;Precio Unitario&quot;;i:2;s:20:&quot;Precio Unitario x OS&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">sTipoContrato</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sTipoContratoJSBlur</property>
      <property name="jsOnFocus">sTipoContratoJSFocus</property>
      <property name="jsOnKeyPress">sTipoContratoJSKeyPress</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Caption">Periodo de Generacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label20</property>
      <property name="ParentFont">0</property>
      <property name="Top">56</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sRangoEstimacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:3:{i:0;s:6:&quot;Diario&quot;;i:1;s:7:&quot;Semanal&quot;;i:2;s:7:&quot;Mensual&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">sRangoEstimacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">170</property>
      <property name="jsOnChange">sRangoEstimacionJSChange</property>
      <property name="jsOnFocus">sRangoEstimacionJSFocus</property>
      <property name="jsOnKeyPress">sRangoEstimacionJSKeyPress</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Caption">Incremento</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label21</property>
      <property name="ParentFont">0</property>
      <property name="Top">78</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="iIncremento" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:10:{i:0;s:1:&quot;1&quot;;i:1;s:1:&quot;2&quot;;i:2;s:1:&quot;3&quot;;i:3;s:1:&quot;4&quot;;i:4;s:1:&quot;5&quot;;i:5;s:1:&quot;6&quot;;i:6;s:1:&quot;7&quot;;i:7;s:1:&quot;8&quot;;i:8;s:1:&quot;9&quot;;i:9;s:2:&quot;10&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">iIncremento</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">iIncrementoJSBlur</property>
      <property name="jsOnFocus">iIncrementoJSFocus</property>
      <property name="jsOnKeyPress">iIncrementoJSKeyPress</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">REPORTE DIARIO</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label22</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">167</property>
      <property name="Width">625</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">Convenio/acta Vigente</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label23</property>
      <property name="ParentFont">0</property>
      <property name="Top">100</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sIdConvenio" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">148</property>
      <property name="Name">sIdConvenio</property>
      <property name="ParentColor">0</property>
      <property name="Top">100</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sIdConvenioJSBlur</property>
      <property name="jsOnFocus">sIdConvenioJSFocus</property>
      <property name="jsOnKeyPress">sIdConvenioJSKeyPress</property>
    </object>
    <object class="ComboBox" name="lCalculoPonderado" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:3:{i:0;s:8:&quot;Duracion&quot;;i:1;s:10:&quot;Financiero&quot;;i:2;s:6:&quot;Mezcla&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">lCalculoPonderado</property>
      <property name="ParentColor">0</property>
      <property name="Top">122</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">lCalculoPonderadoJSBlur</property>
      <property name="jsOnFocus">lCalculoPonderadoJSFocus</property>
      <property name="jsOnKeyPress">lCalculoPonderadoJSKeyPress</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Caption">Det. Ponderados</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label24</property>
      <property name="ParentFont">0</property>
      <property name="Top">122</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">Duracion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">507</property>
      <property name="Name">Label25</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">53</property>
    </object>
    <object class="ComboBox" name="sDuracion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:5:&quot;Horas&quot;;i:1;s:4:&quot;Dias&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sDuracion</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">66</property>
      <property name="jsOnBlur">sDuracionJSBlur</property>
      <property name="jsOnFocus">sDuracionJSFocus</property>
      <property name="jsOnKeyDown">sDuracionJSKeyDown</property>
      <property name="jsOnKeyPress">sDuracionJSKeyPress</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Caption">Base Generacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">323</property>
      <property name="Name">Label26</property>
      <property name="ParentFont">0</property>
      <property name="Top">79</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sBaseGeneracion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:17:&quot;Contrato Original&quot;;i:1;s:15:&quot;Ultimo Convenio&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sBaseGeneracion</property>
      <property name="ParentColor">0</property>
      <property name="Top">79</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sBaseGeneracionJSBlur</property>
      <property name="jsOnFocus">sBaseGeneracionJSFocus</property>
      <property name="jsOnKeyPress">sBaseGeneracionJSKeyPress</property>
      <property name="jsOnKeyUp">sBaseGeneracionJSKeyUp</property>
    </object>
    <object class="Label" name="Label27" >
      <property name="Caption">Long. Actividad</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">324</property>
      <property name="Name">Label27</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">91</property>
    </object>
    <object class="Edit" name="iLongActividad" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">430</property>
      <property name="Name">iLongActividad</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">50</property>
      <property name="jsOnBlur">iLongActividadJSBlur</property>
      <property name="jsOnFocus">iLongActividadJSFocus</property>
      <property name="jsOnKeyPress">iLongActividadJSKeyPress</property>
    </object>
    <object class="Label" name="Label28" >
      <property name="Caption">Distribuye Fechas?</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">324</property>
      <property name="Name">Label28</property>
      <property name="ParentFont">0</property>
      <property name="Top">57</property>
      <property name="Width">106</property>
    </object>
    <object class="Label" name="Label29" >
      <property name="Caption">Part. Autoriza</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">480</property>
      <property name="Name">Label29</property>
      <property name="ParentFont">0</property>
      <property name="Top">57</property>
      <property name="Width">80</property>
    </object>
    <object class="ComboBox" name="lAutomatico" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">lAutomatico</property>
      <property name="ParentColor">0</property>
      <property name="Top">57</property>
      <property name="Width">66</property>
      <property name="jsOnBlur">lAutomaticoJSBlur</property>
      <property name="jsOnFocus">lAutomaticoJSFocus</property>
      <property name="jsOnKeyPress">lAutomaticoJSKeyPress</property>
    </object>
    <object class="ComboBox" name="lCalculaFecha" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">430</property>
      <property name="Name">lCalculaFecha</property>
      <property name="ParentColor">0</property>
      <property name="Top">57</property>
      <property name="Width">50</property>
      <property name="jsOnBlur">lCalculaFechaJSBlur</property>
      <property name="jsOnFocus">lCalculaFechaJSFocus</property>
      <property name="jsOnKeyPress">lCalculaFechaJSKeyPress</property>
    </object>
    <object class="Label" name="Label32" >
      <property name="Caption">Tipo Generacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">323</property>
      <property name="Name">Label32</property>
      <property name="ParentFont">0</property>
      <property name="Top">101</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sTipoGeneracion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:22:&quot;Generaci&oacute;n Consolidada&quot;;i:1;s:24:&quot;Generaci&oacute;n Independiente&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sTipoGeneracion</property>
      <property name="ParentColor">0</property>
      <property name="Top">101</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sTipoGeneracionJSBlur</property>
      <property name="jsOnFocus">sTipoGeneracionJSFocus</property>
      <property name="jsOnKeyDown">sTipoGeneracionJSKeyDown</property>
      <property name="jsOnKeyPress">sTipoGeneracionJSKeyPress</property>
    </object>
    <object class="Label" name="Label33" >
      <property name="Caption">Seguridad Generacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">323</property>
      <property name="Name">Label33</property>
      <property name="ParentFont">0</property>
      <property name="Top">123</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sSeguridadGenerador" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:13:&quot;Con Seguridad&quot;;i:1;s:13:&quot;Sin Seguridad&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sSeguridadGenerador</property>
      <property name="ParentColor">0</property>
      <property name="Top">123</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sSeguridadGeneradorJSBlur</property>
      <property name="jsOnFocus">sSeguridadGeneradorJSFocus</property>
      <property name="jsOnKeyPress">sSeguridadGeneradorJSKeyPress</property>
      <property name="jsOnKeyUp">sSeguridadGeneradorJSKeyUp</property>
    </object>
    <object class="Label" name="Label34" >
      <property name="Caption">Tipo de Estimacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">323</property>
      <property name="Name">Label34</property>
      <property name="ParentFont">0</property>
      <property name="Top">144</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sTipoEstimacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:30:&quot;Generadores de Obra Inteligent&quot;;i:1;s:17:&quot;Estimacion Manual&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sTipoEstimacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">144</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sTipoEstimacionJSBlur</property>
      <property name="jsOnFocus">sTipoEstimacionJSFocus</property>
      <property name="jsOnKeyPress">sTipoEstimacionJSKeyPress</property>
    </object>
    <object class="Label" name="Label31" >
      <property name="Caption">Formato</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label31</property>
      <property name="ParentFont">0</property>
      <property name="Top">184</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label35" >
      <property name="Caption">Partidas a Reportar</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">323</property>
      <property name="Name">Label35</property>
      <property name="ParentFont">0</property>
      <property name="Top">183</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sTipoPartida" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:5:&quot;Todas&quot;;i:1;s:8:&quot;Anexo C &quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sTipoPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">183</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sTipoPartidaJSBlur</property>
      <property name="jsOnFocus">sTipoPartidaJSFocus</property>
      <property name="jsOnKeyPress">sTipoPartidaJSKeyPress</property>
    </object>
    <object class="Edit" name="sFormato" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">148</property>
      <property name="Name">sFormato</property>
      <property name="ParentColor">0</property>
      <property name="Top">184</property>
      <property name="Width">162</property>
      <property name="jsOnBlur">sFormatoJSBlur</property>
      <property name="jsOnFocus">sFormatoJSFocus</property>
      <property name="jsOnKeyPress">sFormatoJSKeyPress</property>
    </object>
    <object class="Label" name="Label36" >
      <property name="Caption">Consecutivo</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label36</property>
      <property name="ParentFont">0</property>
      <property name="Top">206</property>
      <property name="Width">135</property>
    </object>
    <object class="Edit" name="iConsecutivo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">148</property>
      <property name="Name">iConsecutivo</property>
      <property name="ParentColor">0</property>
      <property name="Top">206</property>
      <property name="Width">57</property>
      <property name="jsOnBlur">iConsecutivoJSBlur</property>
      <property name="jsOnFocus">iConsecutivoJSFocus</property>
      <property name="jsOnKeyPress">iConsecutivoJSKeyPress</property>
    </object>
    <object class="Label" name="Label37" >
      <property name="Caption">Imprime Extraordinario?</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label37</property>
      <property name="ParentFont">0</property>
      <property name="Top">228</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="lImprimeExtraordinario" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">149</property>
      <property name="Name">lImprimeExtraordinario</property>
      <property name="ParentColor">0</property>
      <property name="Top">227</property>
      <property name="Width">56</property>
      <property name="jsOnBlur">lImprimeExtraordinarioJSBlur</property>
      <property name="jsOnFocus">lImprimeExtraordinarioJSFocus</property>
      <property name="jsOnKeyPress">lImprimeExtraordinarioJSKeyPress</property>
    </object>
    <object class="Label" name="Label38" >
      <property name="Caption">Cantidades en Bitacoras</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label38</property>
      <property name="ParentFont">0</property>
      <property name="Top">248</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sAvanceBitacora" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:7:&quot;Volumen&quot;;i:1;s:10:&quot;Porcentaje&quot;;}]]></property>
      <property name="Left">149</property>
      <property name="Name">sAvanceBitacora</property>
      <property name="ParentColor">0</property>
      <property name="Top">247</property>
      <property name="Width">161</property>
      <property name="jsOnBlur">sAvanceBitacoraJSBlur</property>
      <property name="jsOnFocus">sAvanceBitacoraJSFocus</property>
      <property name="jsOnKeyPress">sAvanceBitacoraJSKeyPress</property>
    </object>
    <object class="Label" name="Label39" >
      <property name="Caption">Numero de Part. Efectivas</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">300</property>
      <property name="Name">Label39</property>
      <property name="ParentFont">0</property>
      <property name="Top">205</property>
      <property name="Width">158</property>
    </object>
    <object class="ComboBox" name="sPartidaEfectiva" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:5:&quot;Anexo&quot;;i:1;s:8:&quot;Anterior&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sPartidaEfectiva</property>
      <property name="ParentColor">0</property>
      <property name="Top">205</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sPartidaEfectivaJSBlur</property>
      <property name="jsOnFocus">sPartidaEfectivaJSFocus</property>
      <property name="jsOnKeyPress">sPartidaEfectivaJSKeyPress</property>
    </object>
    <object class="Label" name="Label40" >
      <property name="Caption">Agrupar Personal Por</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">300</property>
      <property name="Name">Label40</property>
      <property name="ParentFont">0</property>
      <property name="Top">226</property>
      <property name="Width">158</property>
    </object>
    <object class="ComboBox" name="sOrdenPerEq" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:9:&quot;Pernoctan&quot;;i:1;s:7:&quot;Laboran&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sOrdenPerEq</property>
      <property name="ParentColor">0</property>
      <property name="Top">226</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sOrdenPerEqJSBlur</property>
      <property name="jsOnFocus">sOrdenPerEqJSFocus</property>
      <property name="jsOnKeyPress">sOrdenPerEqJSKeyPress</property>
    </object>
    <object class="Label" name="Label41" >
      <property name="Caption">No. de reportes sin Val.</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">323</property>
      <property name="Name">Label41</property>
      <property name="ParentFont">0</property>
      <property name="Top">246</property>
      <property name="Width">135</property>
    </object>
    <object class="Edit" name="iReportesSinValid" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">461</property>
      <property name="Name">iReportesSinValid</property>
      <property name="ParentColor">0</property>
      <property name="Top">246</property>
      <property name="Width">57</property>
      <property name="jsOnBlur">iReportesSinValidJSBlur</property>
      <property name="jsOnFocus">iReportesSinValidJSFocus</property>
      <property name="jsOnKeyPress">iReportesSinValidJSKeyPress</property>
    </object>
    <object class="Label" name="Label42" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">SISTEMA</property>
      <property name="Color">#000040</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label42</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">625</property>
    </object>
  </object>
  <object class="Panel" name="panelArchivos" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">panelArchivos</property>
    <property name="Color">#DFDFDF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">270</property>
    <property name="Left">10</property>
    <property name="Name">panelArchivos</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">640</property>
    <object class="Label" name="Label45" >
      <property name="Caption">Rep. Diario</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label45</property>
      <property name="ParentFont">0</property>
      <property name="Top">21</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label48" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">RESUMEN DE GENERACION</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label48</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">171</property>
      <property name="Width">310</property>
    </object>
    <object class="ComboBox" name="sTipoSeguridad" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:6:&quot;Normal&quot;;i:1;s:8:&quot;Avanzada&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">sTipoSeguridad</property>
      <property name="ParentColor">0</property>
      <property name="Top">88</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sTipoSeguridadJSBlur</property>
      <property name="jsOnFocus">sTipoSeguridadJSFocus</property>
      <property name="jsOnKeyPress">sTipoSeguridadJSKeyPress</property>
    </object>
    <object class="Label" name="Label50" >
      <property name="Caption">Tipo Seg.en la Informacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label50</property>
      <property name="ParentFont">0</property>
      <property name="Top">88</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label67" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ARCHIVOS</property>
      <property name="Color">#000040</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label67</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">625</property>
    </object>
    <object class="Edit" name="sReporteDiario" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">148</property>
      <property name="Name">sReporteDiario</property>
      <property name="ParentColor">0</property>
      <property name="Top">21</property>
      <property name="Width">327</property>
      <property name="jsOnBlur">sReporteDiarioJSBlur</property>
      <property name="jsOnFocus">sReporteDiarioJSFocus</property>
      <property name="jsOnKeyPress">sReporteDiarioJSKeyPress</property>
    </object>
    <object class="Label" name="Label44" >
      <property name="Caption">Gerencial</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label44</property>
      <property name="ParentFont">0</property>
      <property name="Top">43</property>
      <property name="Width">135</property>
    </object>
    <object class="Edit" name="sGerencial" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">148</property>
      <property name="Name">sGerencial</property>
      <property name="ParentColor">0</property>
      <property name="Top">43</property>
      <property name="Width">327</property>
      <property name="jsOnBlur">sGerencialJSBlur</property>
      <property name="jsOnFocus">sGerencialJSFocus</property>
      <property name="jsOnKeyPress">sGerencialJSKeyPress</property>
    </object>
    <object class="Label" name="Label46" >
      <property name="Caption">Isometricos</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label46</property>
      <property name="ParentFont">0</property>
      <property name="Top">65</property>
      <property name="Width">135</property>
    </object>
    <object class="Edit" name="sIsometricos" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">148</property>
      <property name="Name">sIsometricos</property>
      <property name="ParentColor">0</property>
      <property name="Top">65</property>
      <property name="Width">327</property>
      <property name="jsOnBlur">sIsometricosJSBlur</property>
      <property name="jsOnFocus">sIsometricosJSFocus</property>
      <property name="jsOnKeyPress">sIsometricosJSKeyPress</property>
    </object>
    <object class="CheckBox" name="lExporta" >
      <property name="Caption">Exportar Archivos</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">322</property>
      <property name="Name">lExporta</property>
      <property name="Top">88</property>
      <property name="Width">121</property>
      <property name="jsOnBlur">lExportaJSBlur</property>
      <property name="jsOnFocus">lExportaJSFocus</property>
      <property name="jsOnKeyPress">lExportaJSKeyPress</property>
    </object>
    <object class="ComboBox" name="sFirmasElectronicas" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:1:&quot;2&quot;;i:1;s:1:&quot;3&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">sFirmasElectronicas</property>
      <property name="ParentColor">0</property>
      <property name="Top">110</property>
      <property name="Width">47</property>
      <property name="jsOnBlur">sFirmasElectronicasJSBlur</property>
      <property name="jsOnFocus">sFirmasElectronicasJSFocus</property>
      <property name="jsOnKeyPress">sFirmasElectronicasJSKeyPress</property>
    </object>
    <object class="Label" name="Label47" >
      <property name="Caption">No. de Firmas Electronicas</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label47</property>
      <property name="ParentFont">0</property>
      <property name="Top">110</property>
      <property name="Width">135</property>
    </object>
    <object class="Label" name="Label49" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">Parametros</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">485</property>
      <property name="Name">Label49</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">22</property>
      <property name="Width">150</property>
    </object>
    <object class="Label" name="Label51" >
      <property name="Caption">Meses</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">485</property>
      <property name="Name">Label51</property>
      <property name="ParentFont">0</property>
      <property name="Top">40</property>
      <property name="Width">50</property>
    </object>
    <object class="ComboBox" name="iMeses" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:40:{i:0;s:1:&quot;1&quot;;i:1;s:1:&quot;2&quot;;i:2;s:1:&quot;3&quot;;i:3;s:1:&quot;4&quot;;i:4;s:1:&quot;5&quot;;i:5;s:1:&quot;6&quot;;i:6;s:1:&quot;7&quot;;i:7;s:1:&quot;8&quot;;i:8;s:1:&quot;9&quot;;i:9;s:2:&quot;10&quot;;i:10;s:2:&quot;11&quot;;i:11;s:2:&quot;12&quot;;i:12;s:2:&quot;13&quot;;i:13;s:2:&quot;14&quot;;i:14;s:2:&quot;15&quot;;i:15;s:2:&quot;16&quot;;i:16;s:2:&quot;17&quot;;i:17;s:2:&quot;18&quot;;i:18;s:2:&quot;19&quot;;i:19;s:2:&quot;20&quot;;i:20;s:2:&quot;21&quot;;i:21;s:2:&quot;22&quot;;i:22;s:2:&quot;23&quot;;i:23;s:2:&quot;24&quot;;i:24;s:2:&quot;25&quot;;i:25;s:2:&quot;26&quot;;i:26;s:2:&quot;27&quot;;i:27;s:2:&quot;28&quot;;i:28;s:2:&quot;29&quot;;i:29;s:2:&quot;30&quot;;i:30;s:2:&quot;31&quot;;i:31;s:2:&quot;32&quot;;i:32;s:2:&quot;33&quot;;i:33;s:2:&quot;34&quot;;i:34;s:2:&quot;35&quot;;i:35;s:2:&quot;36&quot;;i:36;s:2:&quot;37&quot;;i:37;s:2:&quot;38&quot;;i:38;s:2:&quot;39&quot;;i:39;s:2:&quot;40&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">iMeses</property>
      <property name="ParentColor">0</property>
      <property name="Top">40</property>
      <property name="Width">92</property>
      <property name="jsOnBlur">iMesesJSBlur</property>
      <property name="jsOnFocus">iMesesJSFocus</property>
      <property name="jsOnKeyPress">iMesesJSKeyPress</property>
    </object>
    <object class="Label" name="Label52" >
      <property name="Caption">Imp.Dist.</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">485</property>
      <property name="Name">Label52</property>
      <property name="ParentFont">0</property>
      <property name="Top">62</property>
      <property name="Width">50</property>
    </object>
    <object class="ComboBox" name="lDistribucion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">lDistribucion</property>
      <property name="ParentColor">0</property>
      <property name="Top">62</property>
      <property name="Width">92</property>
      <property name="jsOnBlur">lDistribucionJSBlur</property>
      <property name="jsOnFocus">lDistribucionJSFocus</property>
      <property name="jsOnKeyPress">lDistribucionJSKeyPress</property>
    </object>
    <object class="Label" name="Label53" >
      <property name="Caption">Vista de Generacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label53</property>
      <property name="ParentFont">0</property>
      <property name="Top">190</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sViewIsometrico" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:7:&quot;AutoCad&quot;;i:1;s:7:&quot;Acrobat&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">sViewIsometrico</property>
      <property name="ParentColor">0</property>
      <property name="Top">190</property>
      <property name="Width">170</property>
      <property name="jsOnBlur">sViewIsometricoJSBlur</property>
      <property name="jsOnFocus">sViewIsometricoJSFocus</property>
      <property name="jsOnKeyPress">sViewIsometricoJSKeyPress</property>
    </object>
    <object class="Label" name="Label54" >
      <property name="Caption">No. de Firmas</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label54</property>
      <property name="ParentFont">0</property>
      <property name="Top">212</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="iFirmas" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:1:&quot;3&quot;;i:1;s:1:&quot;4&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">iFirmas</property>
      <property name="ParentColor">0</property>
      <property name="Top">212</property>
      <property name="Width">47</property>
      <property name="jsOnBlur">iFirmasJSBlur</property>
      <property name="jsOnFocus">iFirmasJSFocus</property>
      <property name="jsOnKeyPress">iFirmasJSKeyPress</property>
    </object>
    <object class="Label" name="Label55" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">REPORTE GERENCIAL</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">325</property>
      <property name="Name">Label55</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">134</property>
      <property name="Width">310</property>
    </object>
    <object class="Label" name="Label56" >
      <property name="Caption">Numero de Fotos en Gerencial</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">325</property>
      <property name="Name">Label56</property>
      <property name="ParentFont">0</property>
      <property name="Top">153</property>
      <property name="Width">235</property>
    </object>
    <object class="ComboBox" name="sFotografias" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">24</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:1:&quot;2&quot;;i:1;s:1:&quot;4&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">sFotografias</property>
      <property name="ParentColor">0</property>
      <property name="Top">153</property>
      <property name="Width">68</property>
      <property name="jsOnBlur">sFotografiasJSBlur</property>
      <property name="jsOnFocus">sFotografiasJSFocus</property>
      <property name="jsOnKeyPress">sFotografiasJSKeyPress</property>
    </object>
    <object class="Label" name="Label57" >
      <property name="Caption">Incluye Comentarios del Dia?</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">325</property>
      <property name="Name">Label57</property>
      <property name="ParentFont">0</property>
      <property name="Top">178</property>
      <property name="Width">235</property>
    </object>
    <object class="ComboBox" name="lComentariosReporte" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">lComentariosReporte</property>
      <property name="ParentColor">0</property>
      <property name="Top">178</property>
      <property name="Width">68</property>
      <property name="jsOnBlur">lComentariosReporteJSBlur</property>
      <property name="jsOnFocus">lComentariosReporteJSFocus</property>
      <property name="jsOnKeyPress">lComentariosReporteJSKeyPress</property>
    </object>
    <object class="Label" name="Label58" >
      <property name="Caption">Incluye Grafica de Avances?</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">325</property>
      <property name="Name">Label58</property>
      <property name="ParentFont">0</property>
      <property name="Top">199</property>
      <property name="Width">235</property>
    </object>
    <object class="ComboBox" name="lIncluyeGrafica" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">lIncluyeGrafica</property>
      <property name="ParentColor">0</property>
      <property name="Top">199</property>
      <property name="Width">68</property>
      <property name="jsOnBlur">lIncluyeGraficaJSBlur</property>
      <property name="jsOnFocus">lIncluyeGraficaJSFocus</property>
      <property name="jsOnKeyPress">lIncluyeGraficaJSKeyPress</property>
    </object>
    <object class="Label" name="Label59" >
      <property name="Caption">Incluye Avances del Contrato?</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">325</property>
      <property name="Name">Label59</property>
      <property name="ParentFont">0</property>
      <property name="Top">221</property>
      <property name="Width">235</property>
    </object>
    <object class="ComboBox" name="lIncluyeAvanceContrato" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">lIncluyeAvanceContrato</property>
      <property name="ParentColor">0</property>
      <property name="Top">221</property>
      <property name="Width">68</property>
      <property name="jsOnBlur">lIncluyeAvanceContratoJSBlur</property>
      <property name="jsOnFocus">lIncluyeAvanceContratoJSFocus</property>
      <property name="jsOnKeyPress">lIncluyeAvanceContratoJSKeyPress</property>
    </object>
    <object class="Label" name="Label60" >
      <property name="Caption"><![CDATA[&lt;P&gt;Incluye Avances de O. de Trabajo ?&lt;/P&gt;]]></property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">325</property>
      <property name="Name">Label60</property>
      <property name="ParentFont">0</property>
      <property name="Top">242</property>
      <property name="Width">235</property>
    </object>
    <object class="ComboBox" name="lIncluyeAvanceOrdenes" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">lIncluyeAvanceOrdenes</property>
      <property name="ParentColor">0</property>
      <property name="Top">242</property>
      <property name="Width">68</property>
      <property name="jsOnBlur">lIncluyeAvanceOrdenesJSBlur</property>
      <property name="jsOnFocus">lIncluyeAvanceOrdenesJSFocus</property>
      <property name="jsOnKeyPress">lIncluyeAvanceOrdenesJSKeyPress</property>
    </object>
    <object class="Label" name="Label61" >
      <property name="Caption">Mostrar Tips al Iniciar</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label61</property>
      <property name="ParentFont">0</property>
      <property name="Top">132</property>
      <property name="Width">135</property>
    </object>
    <object class="ComboBox" name="sTipsInicial" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
      <property name="Left">148</property>
      <property name="Name">sTipsInicial</property>
      <property name="ParentColor">0</property>
      <property name="Top">132</property>
      <property name="Width">47</property>
      <property name="jsOnBlur">sTipsInicialJSBlur</property>
      <property name="jsOnFocus">sTipsInicialJSFocus</property>
      <property name="jsOnKeyPress">sTipsInicialJSKeyPress</property>
    </object>
  </object>
  <object class="Panel" name="panelFormatos" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">panelFormatos</property>
    <property name="Color">#DFDFDF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">270</property>
    <property name="Left">10</property>
    <property name="Name">panelFormatos</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">640</property>
    <object class="Label" name="Label198" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">FORMATOS Y PARAMETROS</property>
      <property name="Color">#000040</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label198</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">625</property>
    </object>
    <object class="Label" name="Label167" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ORDENES DE TRABAJO</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label167</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">19</property>
      <property name="Width">220</property>
    </object>
    <object class="Edit" name="cStatusProceso" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">cStatusProceso</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">cStatusProcesoJSBlur</property>
      <property name="jsOnFocus">cStatusProcesoJSFocus</property>
      <property name="jsOnKeyPress">cStatusProcesoJSKeyPress</property>
    </object>
    <object class="Label" name="Label168" >
      <property name="Caption">Status Terminada</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label168</property>
      <property name="ParentFont">0</property>
      <property name="Top">56</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="cStatusTerminada" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">cStatusTerminada</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">cStatusTerminadaJSBlur</property>
      <property name="jsOnFocus">cStatusTerminadaJSFocus</property>
      <property name="jsOnKeyPress">cStatusTerminadaJSKeyPress</property>
    </object>
    <object class="Label" name="Label169" >
      <property name="Caption">Status Suspendidas</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label169</property>
      <property name="ParentFont">0</property>
      <property name="Top">78</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="cStatusSuspendida" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">cStatusSuspendida</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">cStatusSuspendidaJSBlur</property>
      <property name="jsOnFocus">cStatusSuspendidaJSFocus</property>
      <property name="jsOnKeyPress">cStatusSuspendidaJSKeyPress</property>
    </object>
    <object class="Label" name="Label170" >
      <property name="Caption">Orden Extraordinaria</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label170</property>
      <property name="ParentFont">0</property>
      <property name="Top">100</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sOrdenExtraordinaria" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sOrdenExtraordinaria</property>
      <property name="ParentColor">0</property>
      <property name="Top">100</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sOrdenExtraordinariaJSBlur</property>
      <property name="jsOnFocus">sOrdenExtraordinariaJSFocus</property>
      <property name="jsOnKeyPress">sOrdenExtraordinariaJSKeyPress</property>
    </object>
    <object class="Label" name="Label171" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ID. CATALOGOS</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label171</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">123</property>
      <property name="Width">220</property>
    </object>
    <object class="Label" name="Label172" >
      <property name="Caption">Depto</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label172</property>
      <property name="ParentFont">0</property>
      <property name="Top">140</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sIdDepartamento" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sIdDepartamento</property>
      <property name="ParentColor">0</property>
      <property name="Top">140</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sIdDepartamentoJSBlur</property>
      <property name="jsOnFocus">sIdDepartamentoJSFocus</property>
      <property name="jsOnKeyPress">sIdDepartamentoJSKeyPress</property>
    </object>
    <object class="Edit" name="sIdEmbarcacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sIdEmbarcacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">162</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sIdEmbarcacionJSBlur</property>
      <property name="jsOnFocus">sIdEmbarcacionJSFocus</property>
      <property name="jsOnKeyPress">sIdEmbarcacionJSKeyPress</property>
      <property name="jsOnKeyUp">sIdEmbarcacionJSKeyUp</property>
    </object>
    <object class="Label" name="Label173" >
      <property name="Caption">Embarcacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label173</property>
      <property name="ParentFont">0</property>
      <property name="Top">162</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label174" >
      <property name="Caption">Mov. Operacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label174</property>
      <property name="ParentFont">0</property>
      <property name="Top">183</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sTipoOperacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sTipoOperacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">183</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sTipoOperacionJSBlur</property>
      <property name="jsOnFocus">sTipoOperacionJSFocus</property>
      <property name="jsOnKeyPress">sTipoOperacionJSKeyPress</property>
    </object>
    <object class="Label" name="Label175" >
      <property name="Caption">Mov. x Alcance</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label175</property>
      <property name="ParentFont">0</property>
      <property name="Top">204</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sTipoAlcance" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sTipoAlcance</property>
      <property name="ParentColor">0</property>
      <property name="Top">204</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sTipoAlcanceJSBlur</property>
      <property name="jsOnFocus">sTipoAlcanceJSFocus</property>
      <property name="jsOnKeyPress">sTipoAlcanceJSKeyPress</property>
    </object>
    <object class="Label" name="Label176" >
      <property name="Caption">Fuera y Cia.</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label176</property>
      <property name="ParentFont">0</property>
      <property name="Top">225</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sTipoCIA" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sTipoCIA</property>
      <property name="ParentColor">0</property>
      <property name="Top">225</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sTipoCIAJSBlur</property>
      <property name="jsOnFocus">sTipoCIAJSFocus</property>
      <property name="jsOnKeyPress">sTipoCIAJSKeyPress</property>
    </object>
    <object class="Label" name="Label177" >
      <property name="Caption">Fuera y Cia.</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label177</property>
      <property name="ParentFont">0</property>
      <property name="Top">246</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sIdFase" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sIdFase</property>
      <property name="ParentColor">0</property>
      <property name="Top">246</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sIdFaseJSBlur</property>
      <property name="jsOnFocus">sIdFaseJSFocus</property>
      <property name="jsOnKeyDown">sIdFaseJSKeyDown</property>
      <property name="jsOnKeyPress">sIdFaseJSKeyPress</property>
    </object>
    <object class="Label" name="Label178" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">RETENCIONES Y PENAS CONVENCIONALES</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">234</property>
      <property name="Name">Label178</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">19</property>
      <property name="Width">241</property>
    </object>
    <object class="Label" name="Label179" >
      <property name="Caption">% Retencion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label179</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="dRetencion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">348</property>
      <property name="Name">dRetencion</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">dRetencionJSBlur</property>
      <property name="jsOnFocus">dRetencionJSFocus</property>
      <property name="jsOnKeyPress">dRetencionJSKeyPress</property>
    </object>
    <object class="Label" name="Label180" >
      <property name="Caption">Base Calculo</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label180</property>
      <property name="ParentFont">0</property>
      <property name="Top">57</property>
      <property name="Width">110</property>
    </object>
    <object class="ComboBox" name="sBaseCalculo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:7:&quot;Mensual&quot;;i:1;s:9:&quot;Acumulado&quot;;}]]></property>
      <property name="Left">348</property>
      <property name="Name">sBaseCalculo</property>
      <property name="ParentColor">0</property>
      <property name="Top">57</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sBaseCalculoJSBlur</property>
      <property name="jsOnFocus">sBaseCalculoJSFocus</property>
      <property name="jsOnKeyPress">sBaseCalculoJSKeyPress</property>
    </object>
    <object class="ComboBox" name="sImporteRetencion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:29:&quot;Solo los Generadores Normales&quot;;i:1;s:21:&quot;Todos los Generadores&quot;;}]]></property>
      <property name="Left">348</property>
      <property name="Name">sImporteRetencion</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sImporteRetencionJSBlur</property>
      <property name="jsOnFocus">sImporteRetencionJSFocus</property>
      <property name="jsOnKeyPress">sImporteRetencionJSKeyPress</property>
    </object>
    <object class="Label" name="Label181" >
      <property name="Caption">$ en Retencion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label181</property>
      <property name="ParentFont">0</property>
      <property name="Top">78</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label182" >
      <property name="Caption">% Pena</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label182</property>
      <property name="ParentFont">0</property>
      <property name="Top">99</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="dPenaConvencional" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">348</property>
      <property name="Name">dPenaConvencional</property>
      <property name="ParentColor">0</property>
      <property name="Top">99</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">dPenaConvencionalJSBlur</property>
      <property name="jsOnFocus">dPenaConvencionalJSFocus</property>
      <property name="jsOnKeyPress">dPenaConvencionalJSKeyPress</property>
    </object>
    <object class="Label" name="Label183" >
      <property name="Caption">Orden en Proceso</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label183</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label184" >
      <property name="Caption">Termino de Penalizacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">8</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label184</property>
      <property name="ParentFont">0</property>
      <property name="Top">121</property>
      <property name="Width">110</property>
    </object>
    <object class="ComboBox" name="sTerminoPenalizacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:16:&quot;Reportes Diarios&quot;;i:1;s:19:&quot;Generadores de Obra&quot;;}]]></property>
      <property name="Left">348</property>
      <property name="Name">sTerminoPenalizacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">121</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sTerminoPenalizacionJSBlur</property>
      <property name="jsOnFocus">sTerminoPenalizacionJSFocus</property>
      <property name="jsOnKeyPress">sTerminoPenalizacionJSKeyPress</property>
    </object>
    <object class="Label" name="Label185" >
      <property name="Caption">Tipo de Ajuste</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label185</property>
      <property name="ParentFont">0</property>
      <property name="Top">143</property>
      <property name="Width">110</property>
    </object>
    <object class="ComboBox" name="sTipoAjusteCosto" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:2:{i:0;s:6:&quot;Normal&quot;;i:1;s:9:&quot;Extendido&quot;;}]]></property>
      <property name="Left">348</property>
      <property name="Name">sTipoAjusteCosto</property>
      <property name="ParentColor">0</property>
      <property name="Top">143</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sTipoAjusteCostoJSBlur</property>
      <property name="jsOnFocus">sTipoAjusteCostoJSFocus</property>
      <property name="jsOnKeyPress">sTipoAjusteCostoJSKeyPress</property>
    </object>
    <object class="Label" name="Label186" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">REDONDEOS</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">479</property>
      <property name="Name">Label186</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">19</property>
      <property name="Width">156</property>
    </object>
    <object class="Label" name="Label187" >
      <property name="Caption">Materiales</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">479</property>
      <property name="Name">Label187</property>
      <property name="ParentFont">0</property>
      <property name="Top">36</property>
      <property name="Width">65</property>
    </object>
    <object class="ComboBox" name="iRedondeoMaterial" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:7:{i:0;s:1:&quot;2&quot;;i:1;s:1:&quot;3&quot;;i:2;s:1:&quot;4&quot;;i:3;s:1:&quot;5&quot;;i:4;s:1:&quot;6&quot;;i:5;s:1:&quot;7&quot;;i:6;s:1:&quot;8&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">iRedondeoMaterial</property>
      <property name="ParentColor">0</property>
      <property name="Top">36</property>
      <property name="Width">87</property>
      <property name="jsOnBlur">iRedondeoMaterialJSBlur</property>
      <property name="jsOnFocus">iRedondeoMaterialJSFocus</property>
      <property name="jsOnKeyPress">iRedondeoMaterialJSKeyPress</property>
    </object>
    <object class="ComboBox" name="iRedondeoEquipo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:7:{i:0;s:1:&quot;2&quot;;i:1;s:1:&quot;3&quot;;i:2;s:1:&quot;4&quot;;i:3;s:1:&quot;5&quot;;i:4;s:1:&quot;6&quot;;i:5;s:1:&quot;7&quot;;i:6;s:1:&quot;8&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">iRedondeoEquipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">57</property>
      <property name="Width">87</property>
      <property name="jsOnBlur">iRedondeoEquipoJSBlur</property>
      <property name="jsOnFocus">iRedondeoEquipoJSFocus</property>
      <property name="jsOnKeyPress">iRedondeoEquipoJSKeyPress</property>
    </object>
    <object class="Label" name="Label188" >
      <property name="Caption">Equipo</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">479</property>
      <property name="Name">Label188</property>
      <property name="ParentFont">0</property>
      <property name="Top">57</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label189" >
      <property name="Caption">Personal</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">479</property>
      <property name="Name">Label189</property>
      <property name="ParentFont">0</property>
      <property name="Top">79</property>
      <property name="Width">65</property>
    </object>
    <object class="ComboBox" name="iRedondeoPersonal" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:7:{i:0;s:1:&quot;2&quot;;i:1;s:1:&quot;3&quot;;i:2;s:1:&quot;4&quot;;i:3;s:1:&quot;5&quot;;i:4;s:1:&quot;6&quot;;i:5;s:1:&quot;7&quot;;i:6;s:1:&quot;8&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">iRedondeoPersonal</property>
      <property name="ParentColor">0</property>
      <property name="Top">79</property>
      <property name="Width">87</property>
      <property name="jsOnBlur">iRedondeoPersonalJSBlur</property>
      <property name="jsOnFocus">iRedondeoPersonalJSFocus</property>
      <property name="jsOnKeyPress">iRedondeoPersonalJSKeyPress</property>
    </object>
    <object class="Label" name="Label190" >
      <property name="Caption">Embarcacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">8</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">479</property>
      <property name="Name">Label190</property>
      <property name="ParentFont">0</property>
      <property name="Top">100</property>
      <property name="Width">65</property>
    </object>
    <object class="ComboBox" name="iRedondeoEmbarcacion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Items"><![CDATA[a:7:{i:0;s:1:&quot;2&quot;;i:1;s:1:&quot;3&quot;;i:2;s:1:&quot;4&quot;;i:3;s:1:&quot;5&quot;;i:4;s:1:&quot;6&quot;;i:5;s:1:&quot;7&quot;;i:6;s:1:&quot;8&quot;;}]]></property>
      <property name="Left">455</property>
      <property name="Name">iRedondeoEmbarcacion</property>
      <property name="ParentColor">0</property>
      <property name="Top">100</property>
      <property name="Width">87</property>
      <property name="jsOnBlur">iRedondeoEmbarcacionJSBlur</property>
      <property name="jsOnFocus">iRedondeoEmbarcacionJSFocus</property>
      <property name="jsOnKeyPress">iRedondeoEmbarcacionJSKeyPress</property>
    </object>
    <object class="Label" name="Label191" >
      <property name="Caption">Menor</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">479</property>
      <property name="Name">Label191</property>
      <property name="ParentFont">0</property>
      <property name="Top">141</property>
      <property name="Width">65</property>
    </object>
    <object class="Label" name="Label192" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">AJUSTES DE PRORRATEO</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">479</property>
      <property name="Name">Label192</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">124</property>
      <property name="Width">156</property>
    </object>
    <object class="Edit" name="sRangoAjusteMenor" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">519</property>
      <property name="Name">sRangoAjusteMenor</property>
      <property name="ParentColor">0</property>
      <property name="Top">140</property>
      <property name="Width">87</property>
      <property name="jsOnBlur">sRangoAjusteMenorJSBlur</property>
      <property name="jsOnFocus">sRangoAjusteMenorJSFocus</property>
      <property name="jsOnKeyPress">sRangoAjusteMenorJSKeyPress</property>
    </object>
    <object class="Label" name="Label193" >
      <property name="Caption">Mayor</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">480</property>
      <property name="Name">Label193</property>
      <property name="ParentFont">0</property>
      <property name="Top">162</property>
      <property name="Width">65</property>
    </object>
    <object class="Edit" name="sRangoAjusteMayor" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">519</property>
      <property name="Name">sRangoAjusteMayor</property>
      <property name="ParentColor">0</property>
      <property name="Top">161</property>
      <property name="Width">87</property>
      <property name="jsOnBlur">sRangoAjusteMayorJSBlur</property>
      <property name="jsOnFocus">sRangoAjusteMayorJSFocus</property>
      <property name="jsOnKeyPress">sRangoAjusteMayorJSKeyPress</property>
    </object>
    <object class="Label" name="Label194" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ORDENES DE TRABAJO</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">235</property>
      <property name="Name">Label194</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">187</property>
      <property name="Width">400</property>
    </object>
    <object class="Label" name="Label195" >
      <property name="Caption">txt Avance Inicial</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label195</property>
      <property name="ParentFont">0</property>
      <property name="Top">205</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sAvanceInicial" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">348</property>
      <property name="Name">sAvanceInicial</property>
      <property name="ParentColor">0</property>
      <property name="Top">205</property>
      <property name="Width">287</property>
      <property name="jsOnBlur">sAvanceInicialJSBlur</property>
      <property name="jsOnFocus">sAvanceInicialJSFocus</property>
      <property name="jsOnKeyPress">sAvanceInicialJSKeyPress</property>
    </object>
    <object class="Label" name="Label196" >
      <property name="Caption">txt Avance Anterior</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label196</property>
      <property name="ParentFont">0</property>
      <property name="Top">226</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sAvanceAnterior" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">348</property>
      <property name="Name">sAvanceAnterior</property>
      <property name="ParentColor">0</property>
      <property name="Top">226</property>
      <property name="Width">287</property>
      <property name="jsOnBlur">sAvanceAnteriorJSBlur</property>
      <property name="jsOnFocus">sAvanceAnteriorJSFocus</property>
      <property name="jsOnKeyPress">sAvanceAnteriorJSKeyPress</property>
    </object>
  </object>
  <object class="Panel" name="panelAlmacen" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">panelAlmacen</property>
    <property name="Color">#DFDFDF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">270</property>
    <property name="Left">10</property>
    <property name="Name">panelAlmacen</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">640</property>
    <object class="Label" name="Label62" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">ALMACEN</property>
      <property name="Color">#000040</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label62</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">625</property>
    </object>
    <object class="Edit" name="sClaveDevolucion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sClaveDevolucion</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sClaveDevolucionJSBlur</property>
      <property name="jsOnFocus">sClaveDevolucionJSFocus</property>
      <property name="jsOnKeyPress">sClaveDevolucionJSKeyPress</property>
    </object>
    <object class="Label" name="Label64" >
      <property name="Caption">Cancelacion</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label64</property>
      <property name="ParentFont">0</property>
      <property name="Top">56</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sDevolucion" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sDevolucion</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sDevolucionJSBlur</property>
      <property name="jsOnFocus">sDevolucionJSFocus</property>
      <property name="jsOnKeyPress">sDevolucionJSKeyPress</property>
    </object>
    <object class="Label" name="Label65" >
      <property name="Caption">Mats. Inc. Calculo</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label65</property>
      <property name="ParentFont">0</property>
      <property name="Top">78</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="txtValidaMaterial" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">txtValidaMaterial</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">492</property>
      <property name="jsOnBlur">txtValidaMaterialJSBlur</property>
      <property name="jsOnFocus">txtValidaMaterialJSFocus</property>
      <property name="jsOnKeyDown">txtValidaMaterialJSKeyDown</property>
      <property name="jsOnKeyPress">txtValidaMaterialJSKeyPress</property>
    </object>
    <object class="Label" name="Label66" >
      <property name="Caption">Mats. Dist. Exacta</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label66</property>
      <property name="ParentFont">0</property>
      <property name="Top">100</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="txtMaterialAutomatico" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">txtMaterialAutomatico</property>
      <property name="ParentColor">0</property>
      <property name="Top">100</property>
      <property name="Width">492</property>
      <property name="jsOnBlur">txtMaterialAutomaticoJSBlur</property>
      <property name="jsOnFocus">txtMaterialAutomaticoJSFocus</property>
      <property name="jsOnKeyPress">txtMaterialAutomaticoJSKeyPress</property>
    </object>
    <object class="Label" name="Label69" >
      <property name="Caption">Mats. Anexo</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label69</property>
      <property name="ParentFont">0</property>
      <property name="Top">121</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sIdAnexo" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sIdAnexo</property>
      <property name="ParentColor">0</property>
      <property name="Top">121</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sIdAnexoJSBlur</property>
      <property name="jsOnFocus">sIdAnexoJSFocus</property>
      <property name="jsOnKeyPress">sIdAnexoJSKeyPress</property>
    </object>
    <object class="Label" name="Label80" >
      <property name="Caption">Txt Dev.</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label80</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">110</property>
    </object>
    <object class="Label" name="Label68" >
      <property name="Caption">Medida</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">235</property>
      <property name="Name">Label68</property>
      <property name="ParentFont">0</property>
      <property name="Top">58</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sMedida" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">348</property>
      <property name="Name">sMedida</property>
      <property name="ParentColor">0</property>
      <property name="Top">58</property>
      <property name="Width">107</property>
      <property name="jsOnBlur">sMedidaJSBlur</property>
      <property name="jsOnFocus">sMedidaJSFocus</property>
      <property name="jsOnKeyPress">sMedidaJSKeyPress</property>
    </object>
  </object>
  <object class="Panel" name="panelCompania" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">1</property>
    <property name="Caption">panelCompania</property>
    <property name="Color">#DFDFDF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">270</property>
    <property name="Left">10</property>
    <property name="Name">panelCompania</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">640</property>
    <object class="Label" name="Label70" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[COMPA&Ntilde;IA]]></property>
      <property name="Color">#000040</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">10</property>
      <property name="Name">Label70</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">625</property>
    </object>
    <object class="Edit" name="sNombreCorto" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sNombreCorto</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">187</property>
      <property name="jsOnBlur">sNombreCortoJSBlur</property>
      <property name="jsOnFocus">sNombreCortoJSFocus</property>
      <property name="jsOnKeyPress">sNombreCortoJSKeyPress</property>
    </object>
    <object class="Label" name="Label72" >
      <property name="Caption">RFC</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label72</property>
      <property name="ParentFont">0</property>
      <property name="Top">56</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sRfc" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sRfc</property>
      <property name="ParentColor">0</property>
      <property name="Top">56</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sRfcJSBlur</property>
      <property name="jsOnFocus">sRfcJSFocus</property>
      <property name="jsOnKeyPress">sRfcJSKeyPress</property>
    </object>
    <object class="Label" name="Label73" >
      <property name="Caption">Domicilio</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label73</property>
      <property name="ParentFont">0</property>
      <property name="Top">78</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sDireccion1" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sDireccion1</property>
      <property name="ParentColor">0</property>
      <property name="Top">78</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sDireccion1JSBlur</property>
      <property name="jsOnFocus">sDireccion1JSFocus</property>
      <property name="jsOnKeyPress">sDireccion1JSKeyPress</property>
    </object>
    <object class="Edit" name="sDireccion2" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sDireccion2</property>
      <property name="ParentColor">0</property>
      <property name="Top">100</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sDireccion2JSBlur</property>
      <property name="jsOnFocus">sDireccion2JSFocus</property>
      <property name="jsOnKeyPress">sDireccion2JSKeyPress</property>
    </object>
    <object class="Edit" name="sDireccion3" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sDireccion3</property>
      <property name="ParentColor">0</property>
      <property name="Top">121</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sDireccion3JSBlur</property>
      <property name="jsOnFocus">sDireccion3JSFocus</property>
      <property name="jsOnKeyPress">sDireccion3JSKeyPress</property>
    </object>
    <object class="Label" name="Label76" >
      <property name="Caption">Nombre</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label76</property>
      <property name="ParentFont">0</property>
      <property name="Top">35</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sNombre" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">313</property>
      <property name="Name">sNombre</property>
      <property name="ParentColor">0</property>
      <property name="Top">35</property>
      <property name="Width">312</property>
      <property name="jsOnBlur">sNombreJSBlur</property>
      <property name="jsOnFocus">sNombreJSFocus</property>
      <property name="jsOnKeyPress">sNombreJSKeyPress</property>
    </object>
    <object class="Label" name="Label78" >
      <property name="Caption">Slogan</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label78</property>
      <property name="ParentFont">0</property>
      <property name="Top">142</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sSlogan" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sSlogan</property>
      <property name="ParentColor">0</property>
      <property name="Top">142</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sSloganJSBlur</property>
      <property name="jsOnFocus">sSloganJSFocus</property>
      <property name="jsOnKeyDown">sSloganJSKeyDown</property>
      <property name="jsOnKeyPress">sSloganJSKeyPress</property>
    </object>
    <object class="Label" name="Label79" >
      <property name="Caption">Pie de Pagina</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label79</property>
      <property name="ParentFont">0</property>
      <property name="Top">163</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sPiePagina" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sPiePagina</property>
      <property name="ParentColor">0</property>
      <property name="Top">163</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sPiePaginaJSBlur</property>
      <property name="jsOnFocus">sPiePaginaJSFocus</property>
      <property name="jsOnKeyPress">sPiePaginaJSKeyPress</property>
    </object>
    <object class="Label" name="Label81" >
      <property name="Caption">Telefono</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label81</property>
      <property name="ParentFont">0</property>
      <property name="Top">184</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sTelefono" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sTelefono</property>
      <property name="ParentColor">0</property>
      <property name="Top">184</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sTelefonoJSBlur</property>
      <property name="jsOnFocus">sTelefonoJSFocus</property>
      <property name="jsOnKeyPress">sTelefonoJSKeyPress</property>
    </object>
    <object class="Label" name="Label82" >
      <property name="Caption">Fax</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label82</property>
      <property name="ParentFont">0</property>
      <property name="Top">206</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sFax" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sFax</property>
      <property name="ParentColor">0</property>
      <property name="Top">206</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sFaxJSBlur</property>
      <property name="jsOnFocus">sFaxJSFocus</property>
      <property name="jsOnKeyPress">sFaxJSKeyPress</property>
    </object>
    <object class="Label" name="Label83" >
      <property name="Caption">Web</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label83</property>
      <property name="ParentFont">0</property>
      <property name="Top">227</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sWeb" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sWeb</property>
      <property name="ParentColor">0</property>
      <property name="Top">227</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sWebJSBlur</property>
      <property name="jsOnFocus">sWebJSFocus</property>
      <property name="jsOnKeyPress">sWebJSKeyPress</property>
    </object>
    <object class="Label" name="Label84" >
      <property name="Caption">E-Mail</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">9</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">10</property>
      <property name="Name">Label84</property>
      <property name="ParentFont">0</property>
      <property name="Top">248</property>
      <property name="Width">110</property>
    </object>
    <object class="Edit" name="sEmail" >
      <property name="Color">#FFFFFF</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">123</property>
      <property name="Name">sEmail</property>
      <property name="ParentColor">0</property>
      <property name="Top">248</property>
      <property name="Width">272</property>
      <property name="jsOnBlur">sEmailJSBlur</property>
      <property name="jsOnFocus">sEmailJSFocus</property>
      <property name="jsOnKeyPress">sEmailJSKeyPress</property>
    </object>
    <object class="Image" name="Image1" >
      <property name="Border">1</property>
      <property name="BorderColor">#000080</property>
      <property name="Center">1</property>
      <property name="Cursor">crPointer</property>
      <property name="Height">139</property>
      <property name="ImageSource">recursos/imagenes/intelcode.png</property>
      <property name="Left">400</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image1</property>
      <property name="Proportional">1</property>
      <property name="Top">88</property>
      <property name="Width">198</property>
      <property name="jsOnClick">Image1JSClick</property>
    </object>
    <object class="Button" name="cmdLoadImagen" >
      <property name="Caption">Recargar Imagen</property>
      <property name="Color">#000080</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">24</property>
      <property name="Left">398</property>
      <property name="Name">cmdLoadImagen</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">227</property>
      <property name="Width">232</property>
      <property name="jsOnClick">cmdLoadImagenJSClick</property>
    </object>
  </object>
  <object class="Button" name="cmdSalvar" >
    <property name="Caption">Guardar</property>
    <property name="Color">#000080</property>
    <property name="Font">
    <property name="Color">#FFFFFF</property>
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">575</property>
    <property name="Name">cmdSalvar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">9</property>
    <property name="Width">75</property>
    <property name="OnClick">cmdSalvarClick</property>
  </object>
  <object class="Label" name="Label71" >
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Color">#FF0000</property>
    <property name="Family">Verdana</property>
    <property name="Size">12px</property>
    <property name="Weight">bold</property>
    </property>
    <property name="Height">32</property>
    <property name="Left">8</property>
    <property name="Name">Label71</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">320</property>
    <property name="Width">640</property>
  </object>
</object>
?>
