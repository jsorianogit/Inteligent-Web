<?php
<object class="frmRequisiciones" name="frmRequisiciones" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption"><![CDATA[Requisici&oacute;n de Materiales]]></property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">552</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmRequisiciones</property>
  <property name="Width">912</property>
  <property name="OnBeforeShow">frmRequisicionesBeforeShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">256</property>
    <property name="Left">17</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">232</property>
    <property name="Width">759</property>
    <object class="Label" name="Label2" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Folio</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">11</property>
      <property name="Name">Label2</property>
      <property name="Top">13</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="iFolioRequisicion" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">89</property>
      <property name="Name">iFolioRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">114</property>
      <property name="jsOnBlur">iFolioRequisicionJSBlur</property>
      <property name="jsOnFocus">iFolioRequisicionJSFocus</property>
      <property name="jsOnKeyPress">iFolioRequisicionJSKeyPress</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Fecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">7</property>
      <property name="Name">Label3</property>
      <property name="Top">37</property>
      <property name="Width">79</property>
    </object>
    <object class="DateTimePicker" name="dIdFecha" >
      <property name="Caption">dIdFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">89</property>
      <property name="Name">dIdFecha</property>
      <property name="Top">36</property>
      <property name="Width">112</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Orden</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">7</property>
      <property name="Name">Label4</property>
      <property name="Top">117</property>
      <property name="Width">79</property>
    </object>
    <object class="ComboBox" name="sNumeroOrden" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">89</property>
      <property name="Name">sNumeroOrden</property>
      <property name="ParentColor">0</property>
      <property name="Top">116</property>
      <property name="Width">185</property>
      <property name="jsOnBlur">sNumeroOrdenJSBlur</property>
      <property name="jsOnFocus">sNumeroOrdenJSFocus</property>
      <property name="jsOnKeyPress">sNumeroOrdenJSKeyPress</property>
    </object>
    <object class="Edit" name="sReferencia" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">89</property>
      <property name="Name">sReferencia</property>
      <property name="ParentColor">0</property>
      <property name="Top">141</property>
      <property name="Width">186</property>
      <property name="jsOnBlur">sReferenciaJSBlur</property>
      <property name="jsOnFocus">sReferenciaJSFocus</property>
      <property name="jsOnKeyPress">sReferenciaJSKeyPress</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Referencia</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">1</property>
      <property name="Name">Label5</property>
      <property name="Top">142</property>
      <property name="Width">85</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Comentarios</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">7</property>
      <property name="Name">Label6</property>
      <property name="Top">167</property>
      <property name="Width">79</property>
    </object>
    <object class="Memo" name="mComentarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">63</property>
      <property name="Left">89</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mComentarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">168</property>
      <property name="Width">642</property>
      <property name="jsOnBlur">mComentariosJSBlur</property>
      <property name="jsOnFocus">mComentariosJSFocus</property>
      <property name="jsOnKeyPress">mComentariosJSKeyPress</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">F. Solicitado</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">19</property>
      <property name="Name">Label19</property>
      <property name="Top">64</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Caption">F. Requerido</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">12</property>
      <property name="Name">Label20</property>
      <property name="Top">91</property>
      <property name="Width">73</property>
    </object>
    <object class="DateTimePicker" name="dtaSolicita" >
      <property name="Caption">dtaSolicita</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">89</property>
      <property name="Name">dtaSolicita</property>
      <property name="Top">64</property>
      <property name="Width">112</property>
    </object>
    <object class="DateTimePicker" name="dtaRequerido" >
      <property name="Caption">dtaRequerido</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">89</property>
      <property name="Name">dtaRequerido</property>
      <property name="Top">91</property>
      <property name="Width">112</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Caption">Solicito</property>
      <property name="Font">
      <property name="Align">taRight</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">400</property>
      <property name="Name">Label21</property>
      <property name="Top">56</property>
      <property name="Visible">0</property>
      <property name="Width">42</property>
    </object>
    <object class="Edit" name="txtSolicita" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">447</property>
      <property name="Name">txtSolicita</property>
      <property name="Top">52</property>
      <property name="Visible">0</property>
      <property name="Width">284</property>
      <property name="jsOnBlur">txtSolicitaJSBlur</property>
      <property name="jsOnFocus">txtSolicitaJSFocus</property>
      <property name="jsOnKeyPress">txtSolicitaJSKeyPress</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Caption">Autorizo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">397</property>
      <property name="Name">Label22</property>
      <property name="Top">82</property>
      <property name="Visible">0</property>
      <property name="Width">44</property>
    </object>
    <object class="Edit" name="txtAutoriza" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">447</property>
      <property name="Name">txtAutoriza</property>
      <property name="Top">78</property>
      <property name="Visible">0</property>
      <property name="Width">284</property>
      <property name="jsOnBlur">txtAutorizaJSBlur</property>
      <property name="jsOnFocus">txtAutorizaJSFocus</property>
      <property name="jsOnKeyPress">txtAutorizaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtVerifica" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">447</property>
      <property name="Name">txtVerifica</property>
      <property name="Top">105</property>
      <property name="Visible">0</property>
      <property name="Width">284</property>
      <property name="jsOnBlur">txtVerificaJSBlur</property>
      <property name="jsOnFocus">txtVerificaJSFocus</property>
      <property name="jsOnKeyPress">txtVerificaJSKeyPress</property>
    </object>
    <object class="Edit" name="txtRecibe" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">447</property>
      <property name="Name">txtRecibe</property>
      <property name="Top">132</property>
      <property name="Visible">0</property>
      <property name="Width">284</property>
      <property name="jsOnBlur">txtRecibeJSBlur</property>
      <property name="jsOnFocus">txtRecibeJSFocus</property>
      <property name="jsOnKeyPress">txtRecibeJSKeyPress</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">Verificacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">379</property>
      <property name="Name">Label23</property>
      <property name="Top">108</property>
      <property name="Visible">0</property>
      <property name="Width">68</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Caption">Recibido</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">393</property>
      <property name="Name">Label24</property>
      <property name="Top">133</property>
      <property name="Visible">0</property>
      <property name="Width">47</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">Revision</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">396</property>
      <property name="Name">Label25</property>
      <property name="Top">29</property>
      <property name="Width">48</property>
    </object>
    <object class="Edit" name="txtRevision" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">448</property>
      <property name="Name">txtRevision</property>
      <property name="Top">26</property>
      <property name="Width">79</property>
      <property name="jsOnBlur">txtRevisionJSBlur</property>
      <property name="jsOnFocus">txtRevisionJSFocus</property>
      <property name="jsOnKeyPress">txtRevisionJSKeyPress</property>
    </object>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">256</property>
    <property name="Left">17</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">232</property>
    <property name="Width">759</property>
    <object class="Edit" name="txtCPT" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">12</property>
      <property name="Left">383</property>
      <property name="Name">txtCPT</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">16</property>
      <property name="jsOnBlur">txtCPTJSBlur</property>
      <property name="jsOnFocus">txtCPTJSFocus</property>
      <property name="jsOnKeyPress">txtCPTJSKeyPress</property>
    </object>
    <object class="Edit" name="txtCosto" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">459</property>
      <property name="Name">txtCosto</property>
      <property name="Top">56</property>
      <property name="Width">32</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Total Insumo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">549</property>
      <property name="Name">Label15</property>
      <property name="Top">71</property>
      <property name="Width">86</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Insumo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">2</property>
      <property name="Name">Label7</property>
      <property name="Top">13</property>
      <property name="Width">85</property>
    </object>
    <object class="Edit" name="txtNumPartida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">90</property>
      <property name="Name">txtNumPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">129</property>
      <property name="jsOnBlur">txtNumPartidaJSBlur</property>
      <property name="jsOnChange">txtNumPartidaJSChange</property>
      <property name="jsOnFocus">txtNumPartidaJSFocus</property>
      <property name="jsOnKeyPress">txtNumPartidaJSKeyPress</property>
      <property name="jsOnKeyUp">txtNumPartidaJSKeyUp</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Fecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">375</property>
      <property name="Name">Label8</property>
      <property name="Top">85</property>
      <property name="Width">32</property>
    </object>
    <object class="DateTimePicker" name="dtaFecha" >
      <property name="Caption">dIdFecha</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="IfFormat">%d/%m/%Y</property>
      <property name="Left">411</property>
      <property name="Name">dtaFecha</property>
      <property name="Top">83</property>
      <property name="Width">112</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Descripcion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">3</property>
      <property name="Name">Label11</property>
      <property name="Top">36</property>
      <property name="Width">84</property>
    </object>
    <object class="Memo" name="memoCometarios" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">46</property>
      <property name="Left">90</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoCometarios</property>
      <property name="ParentColor">0</property>
      <property name="Top">34</property>
      <property name="Width">433</property>
      <property name="jsOnBlur">memoCometariosJSBlur</property>
      <property name="jsOnFocus">memoCometariosJSFocus</property>
      <property name="jsOnKeyPress">memoCometariosJSKeyPress</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Cantidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">1</property>
      <property name="Name">Label9</property>
      <property name="Top">85</property>
      <property name="Width">85</property>
    </object>
    <object class="Edit" name="txtCantidad" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">90</property>
      <property name="Name">txtCantidad</property>
      <property name="ParentColor">0</property>
      <property name="Top">83</property>
      <property name="Width">66</property>
      <property name="jsOnBlur">txtCantidadJSBlur</property>
      <property name="jsOnFocus">txtCantidadJSFocus</property>
      <property name="jsOnKeyPress">txtCantidadJSKeyPress</property>
    </object>
    <object class="Edit" name="txtMedida" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">269</property>
      <property name="Name">txtMedida</property>
      <property name="ParentColor">0</property>
      <property name="Top">83</property>
      <property name="Width">66</property>
      <property name="jsOnBlur">txtMedidaJSBlur</property>
      <property name="jsOnFocus">txtMedidaJSFocus</property>
      <property name="jsOnKeyPress">txtMedidaJSKeyPress</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Medida</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">221</property>
      <property name="Name">Label10</property>
      <property name="Top">85</property>
      <property name="Width">46</property>
    </object>
    <object class="DBGrid" name="dbgPartidas" >
      <property name="Columns"><![CDATA[a:9:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Insumo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;40&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;110&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;65&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Cant_Anexo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;65&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Requerido&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Precio_MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;75&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Monto_MN&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:0:&quot;&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;75&quot;;}}]]></property>
      <property name="Datasource">dtaPartidas</property>
      <property name="Height">118</property>
      <property name="Left">16</property>
      <property name="Name">dbgPartidas</property>
      <property name="ReadOnly">1</property>
      <property name="Top">120</property>
      <property name="Width">656</property>
      <property name="jsOnClick">dbgPartidasJSClick</property>
    </object>
    <object class="Button" name="cmdEliminaPartida" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">22</property>
      <property name="Left">676</property>
      <property name="Name">cmdEliminaPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">159</property>
      <property name="Width">67</property>
      <property name="OnClick">cmdEliminaPartidaClick</property>
      <property name="jsOnClick">cmdEliminaPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdCancelaPartida" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">676</property>
      <property name="Name">cmdCancelaPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">201</property>
      <property name="Width">67</property>
      <property name="jsOnClick">cmdCancelaPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdAceptaPartida" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">676</property>
      <property name="Name">cmdAceptaPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">181</property>
      <property name="Width">67</property>
      <property name="OnClick">cmdAceptaPartidaClick</property>
      <property name="jsOnClick">cmdAceptaPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdEditPartida" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">676</property>
      <property name="Name">cmdEditPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">139</property>
      <property name="Width">67</property>
      <property name="jsOnClick">cmdEditPartidaJSClick</property>
    </object>
    <object class="Button" name="cmdAddPartida" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">18</property>
      <property name="Left">676</property>
      <property name="Name">cmdAddPartida</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">67</property>
      <property name="jsOnClick">cmdAddPartidaJSClick</property>
    </object>
    <object class="Edit" name="txtUnidad" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">638</property>
      <property name="Name">txtUnidad</property>
      <property name="ParentColor">0</property>
      <property name="Top">43</property>
      <property name="Width">105</property>
    </object>
    <object class="Edit" name="txtCantidadAnexo" >
      <property name="Enabled">0</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">638</property>
      <property name="Name">txtCantidadAnexo</property>
      <property name="ParentColor">0</property>
      <property name="Top">68</property>
      <property name="Width">105</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Alignment">agRight</property>
      <property name="Caption">Unidad</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">17</property>
      <property name="Left">548</property>
      <property name="Name">Label14</property>
      <property name="Top">47</property>
      <property name="Width">86</property>
    </object>
    <object class="Label" name="lblTituloAnexo" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">I  N  S  U  M  O</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">611</property>
      <property name="Name">lblTituloAnexo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">12</property>
      <property name="Width">140</property>
    </object>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">55</property>
    <property name="Left">17</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">490</property>
    <property name="Width">760</property>
  </object>
  <object class="DBGrid" name="dbgActMostrar" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dtaActMostrar</property>
    <property name="Height">25</property>
    <property name="Left">680</property>
    <property name="Name">dbgActMostrar</property>
    <property name="ReadOnly">1</property>
    <property name="Top">47</property>
    <property name="Width">24</property>
  </object>
  <object class="DBGrid" name="dbgGeneral" >
    <property name="Columns"><![CDATA[a:7:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;iFolioRequisicion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Item&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;iItem&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Actividad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sIdInsumo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mDescripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Medida&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sMedida&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Fecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;dCantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dtaGenral</property>
    <property name="Height">17</property>
    <property name="Left">642</property>
    <property name="Name">dbgGeneral</property>
    <property name="Top">63</property>
    <property name="Width">14</property>
  </object>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">180</property>
    <property name="Left">16</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">16</property>
    <property name="Width">760</property>
    <object class="Button" name="cmdAddRequisicion" >
      <property name="Caption">Agregar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdAddRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">28</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdAddRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdChangeRequisicion" >
      <property name="Caption">Modificar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdChangeRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">51</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdChangeRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdDeleteRequisicion" >
      <property name="Caption">Eliminar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdDeleteRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">74</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdDeleteRequisicionClick</property>
      <property name="jsOnClick">cmdDeleteRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdAcceptRequisicion" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdAcceptRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">97</property>
      <property name="Width">66</property>
      <property name="OnClick">cmdAcceptRequisicionClick</property>
      <property name="jsOnClick">cmdAcceptRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdCancelRequisicion" >
      <property name="Caption">Cancelar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdCancelRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdCancelRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdPrintRequisicion" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">7</property>
      <property name="Name">cmdPrintRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="Top">143</property>
      <property name="Width">66</property>
      <property name="jsOnClick">cmdPrintRequisicionJSClick</property>
    </object>
    <object class="DBGrid" name="dbgRequisisiones" >
      <property name="Columns"><![CDATA[a:13:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Folio&quot;;s:5:&quot;Color&quot;;s:7:&quot;#FF8000&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;iFolioRequisicion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:7:&quot;#FF8040&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Numero de Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;Fecha_Solicito&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:16:&quot;dFechaSolicitado&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Rerencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Fecha&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;F Requiere&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;dFechaRequerido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Revision&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sRevision&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:8;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Solicito&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sSolicito&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:9;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Autorizo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sAutorizo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:10;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Verificacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;sVerificacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:11;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Recibido&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sRecibido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:1:&quot;0&quot;;}i:12;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;lStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="Datasource">dsAnexo_requisicion</property>
      <property name="Height">135</property>
      <property name="Left">84</property>
      <property name="Name">dbgRequisisiones</property>
      <property name="ReadOnly">1</property>
      <property name="Top">27</property>
      <property name="Width">656</property>
      <property name="jsOnClick">dbgRequisisionesJSClick</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption"><![CDATA[Requisici&oacute;nes de Materiales]]></property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">12px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">760</property>
    </object>
  </object>
  <object class="Panel" name="Panel4" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#C0C0C0</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">17</property>
    <property name="Name">Panel4</property>
    <property name="ParentColor">0</property>
    <property name="Top">202</property>
    <property name="Width">759</property>
    <object class="Button" name="cmdShowRequisicion" >
      <property name="Caption">Informacion</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">9</property>
      <property name="Name">cmdShowRequisicion</property>
      <property name="Top">1</property>
      <property name="Width">108</property>
      <property name="jsOnClick">cmdShowRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdShowPartidas" >
      <property name="Caption">Partidas Anexo</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">23</property>
      <property name="Left">123</property>
      <property name="Name">cmdShowPartidas</property>
      <property name="Top">1</property>
      <property name="Width">144</property>
      <property name="jsOnClick">cmdShowPartidasJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hdfOpcion" >
    <property name="Height">18</property>
    <property name="Left">20</property>
    <property name="Name">hdfOpcion</property>
    <property name="Top">502</property>
    <property name="Width">76</property>
  </object>
  <object class="HiddenField" name="hdfHoraActual" >
    <property name="Height">18</property>
    <property name="Left">104</property>
    <property name="Name">hdfHoraActual</property>
    <property name="Top">502</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hdfFechaActual" >
    <property name="Height">18</property>
    <property name="Left">212</property>
    <property name="Name">hdfFechaActual</property>
    <property name="Top">502</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hdfUltimoFolio" >
    <property name="Height">18</property>
    <property name="Left">320</property>
    <property name="Name">hdfUltimoFolio</property>
    <property name="Top">502</property>
    <property name="Width">92</property>
  </object>
  <object class="HiddenField" name="hdfIniciaPartidas" >
    <property name="Height">17</property>
    <property name="Left">423</property>
    <property name="Name">hdfIniciaPartidas</property>
    <property name="Top">501</property>
    <property name="Value">si</property>
    <property name="Width">121</property>
  </object>
  <object class="HiddenField" name="hdfOpcionPartida" >
    <property name="Height">18</property>
    <property name="Left">20</property>
    <property name="Name">hdfOpcionPartida</property>
    <property name="Top">522</property>
    <property name="Width">108</property>
  </object>
  <object class="HiddenField" name="hdfPartidaOld" >
    <property name="Height">18</property>
    <property name="Left">140</property>
    <property name="Name">hdfPartidaOld</property>
    <property name="Top">522</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hdfItemOld" >
    <property name="Height">18</property>
    <property name="Left">256</property>
    <property name="Name">hdfItemOld</property>
    <property name="Top">522</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hdfMultisesion" >
    <property name="Height">17</property>
    <property name="Left">356</property>
    <property name="Name">hdfMultisesion</property>
    <property name="Top">522</property>
    <property name="Value">uno</property>
    <property name="Width">103</property>
  </object>
  <object class="HiddenField" name="hdfFolioActual" >
    <property name="Height">18</property>
    <property name="Left">480</property>
    <property name="Name">hdfFolioActual</property>
    <property name="Top">522</property>
    <property name="Value">1</property>
    <property name="Width">104</property>
  </object>
  <object class="Panel" name="Panel5" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EFEFEF</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">200</property>
    <property name="Left">237</property>
    <property name="Name">Panel5</property>
    <property name="ParentColor">0</property>
    <property name="Top">94</property>
    <property name="Width">480</property>
    <object class="Label" name="Label17" >
      <property name="Caption">CATALOGO DE INSUMOS</property>
      <property name="Color">#FF5B5B</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">arial black</property>
      </property>
      <property name="Height">15</property>
      <property name="Name">Label17</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">1</property>
      <property name="Width">480</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">HAGA DOBLE CLICK PARA AGRERAR !!!</property>
      <property name="Font">
      <property name="Color">#FF0000</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">15</property>
      <property name="Left">17</property>
      <property name="Name">Label18</property>
      <property name="ParentFont">0</property>
      <property name="Top">177</property>
      <property name="Width">218</property>
    </object>
    <object class="DBGrid" name="dbgCatalogo" >
      <property name="Columns">a:0:{}</property>
      <property name="DataSource">dtaCatalogo</property>
      <property name="Height">148</property>
      <property name="Left">16</property>
      <property name="Name">dbgCatalogo</property>
      <property name="ReadOnly">1</property>
      <property name="Top">26</property>
      <property name="Width">451</property>
      <property name="jsOnDblClick">dbgCatalogoJSDblClick</property>
    </object>
  </object>
  <object class="HiddenField" name="HidStrNum" >
    <property name="Height">18</property>
    <property name="Left">559</property>
    <property name="Name">HidStrNum</property>
    <property name="Top">501</property>
    <property name="Width">81</property>
  </object>
  <object class="HiddenField" name="hflStatus" >
    <property name="Height">20</property>
    <property name="Left">775</property>
    <property name="Name">hflStatus</property>
    <property name="Top">435</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="HidError" >
    <property name="Height">18</property>
    <property name="Left">606</property>
    <property name="Name">HidError</property>
    <property name="Top">522</property>
    <property name="Width">106</property>
  </object>
  <object class="Database" name="db" >
        <property name="Left">804</property>
        <property name="Top">20</property>
    <property name="Connected"></property>
    <property name="Name">db</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="dsAnexo_requisicion" >
        <property name="Left">864</property>
        <property name="Top">20</property>
    <property name="DataSet">qryAnexo_requisicion</property>
    <property name="Name">dsAnexo_requisicion</property>
  </object>
  <object class="Query" name="qryAnexo_requisicion" >
        <property name="Left">807</property>
        <property name="Top">85</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryAnexo_requisicion</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:16:{i:0;s:7:&quot;select &quot;;i:1;s:12:&quot;  sContrato,&quot;;i:2;s:20:&quot;  iFolioRequisicion,&quot;;i:3;s:15:&quot;  sNumeroOrden,&quot;;i:4;s:63:&quot;  date_format(dFechaSolicitado,&quot;%d/%m/%Y&quot;) as dFechaSolicitado,&quot;;i:5;s:61:&quot;  date_format(dFechaRequerido,&quot;%d/%m/%Y&quot;) as dFechaRequerido,&quot;;i:6;s:47:&quot;  date_format(dIdFecha,&quot;%d/%m/%Y&quot;) as dIdFecha,&quot;;i:7;s:14:&quot;  sReferencia,&quot;;i:8;s:15:&quot;  mComentarios,&quot;;i:9;s:12:&quot;  sRevision,&quot;;i:10;s:12:&quot;  sSolicito,&quot;;i:11;s:12:&quot;  sAutorizo,&quot;;i:12;s:16:&quot;  sVerificacion,&quot;;i:13;s:12:&quot;  sRecibido,&quot;;i:14;s:9:&quot;  lStatus&quot;;i:15;s:22:&quot;from anexo_requisicion&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaActMostrar" >
        <property name="Left">861</property>
        <property name="Top">148</property>
    <property name="DataSet">qryActMostrar</property>
    <property name="Name">dtaActMostrar</property>
  </object>
  <object class="Query" name="qryActMostrar" >
        <property name="Left">796</property>
        <property name="Top">148</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryActMostrar</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:10:{i:0;s:14:&quot;select        &quot;;i:1;s:22:&quot;        mDescripcion, &quot;;i:2;s:41:&quot;        format(dCantidad,1) as dCantidad,&quot;;i:3;s:16:&quot;        sMedida,&quot;;i:4;s:17:&quot;        dCostoMN,&quot;;i:5;s:18:&quot;        sIdInsumo,&quot;;i:6;s:20:&quot;        dExistencias&quot;;i:7;s:5:&quot;from &quot;;i:8;s:15:&quot;        insumos&quot;;i:9;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaGenral" >
        <property name="Left">860</property>
        <property name="Top">220</property>
    <property name="DataSet">qryGeneral</property>
    <property name="Name">dtaGenral</property>
  </object>
  <object class="Query" name="qryGeneral" >
        <property name="Left">791</property>
        <property name="Top">225</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryGeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:12:{i:0;s:6:&quot;select&quot;;i:1;s:18:&quot;        sContrato,&quot;;i:2;s:26:&quot;        iFolioRequisicion,&quot;;i:3;s:14:&quot;        iItem,&quot;;i:4;s:18:&quot;        sIdInsumo,&quot;;i:5;s:21:&quot;        mDescripcion,&quot;;i:6;s:16:&quot;        sMedida,&quot;;i:7;s:62:&quot;        date_format(dFechaRequerimiento,&quot;%d/%m/%Y&quot;)  as Fecha,&quot;;i:8;s:45:&quot;        format(dCantidad,2) as dCantidad     &quot;;i:9;s:5:&quot;from &quot;;i:10;s:25:&quot;      anexo_prequisicion &quot;;i:11;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Query" name="qryPartidas" >
        <property name="Left">798</property>
        <property name="Top">286</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryPartidas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:10:{i:0;s:7:&quot;select &quot;;i:1;s:21:&quot;        '' as Insumo,&quot;;i:2;s:19:&quot;        '' as Item,&quot;;i:3;s:21:&quot;        '' as Medida,&quot;;i:4;s:26:&quot;        '' as Descripcion,&quot;;i:5;s:24:&quot;        '' as Cantidad, &quot;;i:6;s:28:&quot;        '' as Cantida_Anexo,&quot;;i:7;s:24:&quot;        '' as Requerido,&quot;;i:8;s:24:&quot;        '' as Precio_MN,&quot;;i:9;s:22:&quot;        '' as Monto_MN&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaPartidas" >
        <property name="Left">860</property>
        <property name="Top">288</property>
    <property name="DataSet">qryPartidas</property>
    <property name="Name">dtaPartidas</property>
  </object>
  <object class="Query" name="qryCatalogo" >
        <property name="Left">798</property>
        <property name="Top">354</property>
    <property name="Database">db</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">qryCatalogo</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:8:{i:0;s:7:&quot;select &quot;;i:1;s:21:&quot;        '' as Insumo,&quot;;i:2;s:26:&quot;        '' as Descripcion,&quot;;i:3;s:23:&quot;        '' as Cantidad,&quot;;i:4;s:21:&quot;        '' as Medida,&quot;;i:5;s:20:&quot;        '' as Venta,&quot;;i:6;s:25:&quot;        '' as Existencias&quot;;i:7;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dtaCatalogo" >
        <property name="Left">856</property>
        <property name="Top">352</property>
    <property name="DataSet">qryCatalogo</property>
    <property name="Name">dtaCatalogo</property>
  </object>
</object>
?>
