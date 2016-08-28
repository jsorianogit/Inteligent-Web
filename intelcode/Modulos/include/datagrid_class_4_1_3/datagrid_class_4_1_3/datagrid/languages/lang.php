<?
// Languages: if you found any word, that is not translated in your opinion -
//        please send your variant of translation to leumas.a@gmail.com
//        or post it on the forum:
//        http://www.phpbb88.com/phpbuilder/viewtopic.php?t=56&mforum=phpbuilder
//
// --- current supported languages ---------------------------------------------
// (ca) Catal� 
// (de) German 
// (es) Espa�ol
// (fr) Fran�ais 
// (hu) Hungarian 
// (hr) Bosnian/Croatian    - provided by: zewa666 http://www.thorax-music.com
// (it) Italiano            - provided by: Matteo Piotto piotto@gmail.com 
// (nl) Netherlands / "Vlaams" (Flemish) 
// (se) Swedish             - provided by: zewa666 http://www.thorax-music.com 
// (en) English

function setLanguage($lang_name){ 
    switch(strtolower($lang_name)){ 

        //------------------------------------------------------------------ 
        //*** Catal� (ca)
        //------------------------------------------------------------------             
        case "ca": 
            $lang['add'] = "Afegir"; 
            $lang['add_new'] = "+ Afegir Nou"; 
            $lang['add_new_record'] = "Afegir nou registre";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                        
            $lang['and'] = "and";
            $lang['any'] = "any";                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Tornar"; 
            $lang['cancel'] = "Cancel&middot;lar";
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All";
            $lang['create'] = "Crear"; 
            $lang['create_new_record'] = "Crear nou registre"; 
            $lang['current'] = "actual"; 
            $lang['delete'] = "Esborrar"; 
            $lang['delete_record'] = "Esborrar registre";
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                        
            $lang['descending'] = "Descending";
            $lang['details'] = "Veure";
            $lang['edit'] = "Editar"; 
            $lang['edit_record'] = "Editar registre"; 
            $lang['export_to_excel'] = "Exportar a Excel";
            $lang['export_to_xml'] = "Exportar a XML";                                                                                    
            $lang['field'] = "Camp"; 
            $lang['field_value'] = "Valor del camp"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "primer";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "&uacute;ltim";
            $lang['like'] = "like";
            $lang['max'] = "max";                                
            $lang['next'] = "seg&uuml;ent"; 
            $lang['no'] = "No";
            $lang['no_data_found'] = "No s'han trobat dades"; 
            $lang['no_data_found_error'] = "No s'han trobat dades! Si us plau, comprova atentament la sintaxi del teu codi!<br>Pot ser degut a l'&uacute;s erroni de Maj&uacute;scules/min&uacute;scules o a s&iacute;mbols inesperats."; 
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                                
            $lang['pages'] = "P&agrave;gines"; 
            $lang['page_size'] = "Registres per p&agrave;gina"; 
            $lang['previous'] = "Anterior"; 
            $lang['printable_view'] = "Vista imprimible";
            $lang['print_now'] = "Print Now";                
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #";
            $lang['results'] = "Resultats";
            $lang['remove'] = "Remove";                
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";                
            $lang['search'] = "Cercar"; 
            $lang['search_d'] = "Cercar"; // (description) 
            $lang['search_type'] = "Tipus de cerca"; 
            $lang['select'] = "seleccionar"; 
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Uncheck All";
            $lang['update'] = "Actualitzar";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update_record'] = "Actualitzar registre";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";                
            $lang['view'] = "Vista"; 
            $lang['view_details'] = "Detalls de la vista";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "S&iacute;"; 
    
            break; 

        //------------------------------------------------------------------            
        //*** German (de)
        //------------------------------------------------------------------             
        case "de": 
            $lang['add'] = "Hinzuf&uuml;gen";
            $lang['add_new'] = "+ Neuer Eintrag";                                                            
            $lang['add_new_record'] = "Neuer Eintrag";
            $lang['adding_operation_completed'] = "Das Hinzuf&uuml;gen war erfolgreich!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Aufsteigend"; 
            $lang['back'] = "Zur&uuml;ck";                                      
            $lang['cancel'] = "Abbrechen";
            $lang['cancel_creating_new_record'] = "Wollen Sie die Erstellung wirklich abbrechen?";
            $lang['check_all'] = "Alle w&auml;hlen";
            $lang['create'] = "Erstellen"; 
            $lang['create_new_record'] = "Neuen Eintrag erstellen";
            $lang['current'] = "aktueller";
            $lang['delete'] = "L&ouml;schen"; 
            $lang['delete_record'] = "Eintrag l&ouml;schen";
            $lang['delete_selected'] = "Gew&auml;hlte l&ouml;schen";
            $lang['delete_selected_records'] = "Sind Sie sicher die gewaehlten Eintraege loeschen zu wollen?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                 
            $lang['deleting_operation_completed'] = "Die L&ouml;schung wurde erfolgreich durchgef&uuml;hrt!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Absteigend";
            $lang['details'] = "Details";
            $lang['edit'] = "&Auml;ndern";
	    //$lang['edit_selected'] = "Auswahl editieren";
            $lang['edit_record'] = "Eintrag &auml;ndern"; 
            //$lang['edit_selected_records'] = "Sind Sie sicher das Sie diese Eintraege editieren wollen?";               
            $lang['export_to_excel'] = "Export zu Excel";
            $lang['export_to_xml'] = "Export zu XML";
            $lang['field'] = "Feld";
            $lang['field_value'] = "Feldinhalt"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "In der Datei kann nicht geschrieben werden. Kontrollieren Sie Ihre Zugriffsrechte!";
            $lang['file_invalid file_size'] = "Ung&uuml;ltige Dateigr&ouml;&szlig;e";
            $lang['file_uploading_error'] = "Es gab einen Fehler w&auml;hrend des Uploads, versuchen Sie es bitte erneut!";
            $lang['first'] = "erster";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "letzter";
            $lang['like'] = "like";
            $lang['max'] = "max";                                
            $lang['next'] = "n&auml;chste";
            $lang['no'] = "nein";
            $lang['no_data_found'] = "Keine Eintr&auml;ge gefunden";                
            $lang['no_data_found_error'] = "Keine Eintr&auml;ge gefunden! Bitte kontrollieren Sie genau ihre Code Syntax!<br>Wom&ouml;glich ist es case sensitive oder ein paar unerwartete Symbole.";                                
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                                
            $lang['pages'] = "Seiten"; 
            $lang['page_size'] = "Ergeb./Seite"; 
            $lang['previous'] = "vorige";                    
            $lang['printable_view'] = "Druckbare Vorschau";
            $lang['print_now'] = "Print Now";                
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Eintrag #";
            $lang['remove'] = "Entfernen";                
            $lang['results'] = "Ergebnisse";
            $lang['required_fields_msg'] = "Felder markiert mit <font color='#cd0000'>*</font> muessen ausgef?llt werden.";                
            $lang['search'] = "Suche"; 
            $lang['search_d'] = "Suchen"; 
            $lang['search_type'] = "Suchart"; 
            $lang['select'] = "w&auml;hlen";                         
            $lang['set_date'] = "Datum setzen";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Auswahl aufheben";
            $lang['update'] = "Update";
            $lang['unhide_search'] = "Suchfenster anzeigen";
            $lang['update_record'] = "Update record";
            $lang['updating_operation_completed'] = "Der Updatevorgang verlief erfolgreich!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";                
            $lang['view'] = "Ansicht"; 
            $lang['view_details'] = "Details ansehen";
            $lang['with_selected'] = "Auswahl";
            $lang['wrong_field_name'] = "Falscher Feldname";
            $lang['yes'] = "Ja";
            
            break; 

        //------------------------------------------------------------------ 
        //*** Espa�ol (es)
        //------------------------------------------------------------------             
        case "es":             
            $lang['add'] = "A&ntilde;adir"; 
            $lang['add_new'] = "+ A&ntilde;adir Nuevo"; 
            $lang['add_new_record'] = "A&ntilde;adir nuevo registro";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Volver"; 
            $lang['cancel'] = "Cancelar";
            $lang['cancel_creating_new_record'] = "Est� Ud. seguro de querer cancelar la creaci�n del nuevo registro ?"; 
            $lang['check_all'] = "Check All";
            $lang['create'] = "Crear"; 
            $lang['create_new_record'] = "Crear nuevo registro"; 
            $lang['current'] = "actual"; 
            $lang['delete'] = "Eliminar"; 
            $lang['delete_record'] = "Eliminar registro";
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Est� Ud. seguro de querer eliminar este registro ?"; 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Detalles";                      
            $lang['edit'] = "Editar"; 
            $lang['edit_record'] = "Editar registro"; 
            $lang['export_to_excel'] = "Exportar a Excel";
            $lang['export_to_xml'] = "Exportar a XML";
            $lang['field'] = "Campo"; 
            $lang['field_value'] = "Valor del campo"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "primero";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "&uacute;ltimo";
            $lang['like'] = "like";
            $lang['max'] = "max";                                
            $lang['next'] = "siguiente";
            $lang['no'] = "No"; 
            $lang['no_data_found'] = "No se han encontrado datos"; 
            $lang['no_data_found_error'] = "No se han encontrado datos! Por favor, comprueva atentamente la sintaxi de tu c&oacute;digo!<br>Puede ser debido al uso incorrecto de May&uacute;sculas/min&uacute;sculas o a s&iacute;mbolos inesperados."; 
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                                
            $lang['pages'] = "P&aacute;ginas"; 
            $lang['page_size'] = "Registros por p&aacute;gina"; 
            $lang['previous'] = "Anterior"; 
            $lang['printable_view'] = "Vista imprimible";
            $lang['print_now'] = "Print Now";                
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Registro #";
            $lang['remove'] = "Remove";                
            $lang['results'] = "Resultados";
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";                
            $lang['search'] = "Buscar"; 
            $lang['search_d'] = "Buscar"; // (description) 
            $lang['search_type'] = "Tipo de b&uacute;squeda"; 
            $lang['select'] = "seleccionar"; 
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Actualizar"; 
            $lang['update_record'] = "Actualizar registro";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";                
            $lang['view'] = "Vista"; 
            $lang['view_details'] = "Detalles de la vista";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "S&iacute;";                
    
            break; 

        //------------------------------------------------------------------ 
        //*** Fran�ais (fr)
        //------------------------------------------------------------------             
        case "fr": 
            $lang['add'] = "Ajouter";                               
            $lang['add_new'] = "+Ajouter nouveau"; 
            $lang['add_new_record'] = "Ajouter un nouveau enregistrement";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Retour";                             
            $lang['cancel'] = "Annuler"; 
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All";
            $lang['create'] = "Cr�er";                         
            $lang['create_new_record'] = "Cr�er un nouveau enregistrement";   
            $lang['current'] = "Courant";                        
            $lang['delete'] = "Supprimer"; 
            $lang['delete_record'] = "Supprimer l'enregistrement";            
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Modifier";                              
            $lang['edit_record'] = "Modifier l'enregistrement";                
            $lang['export_to_excel'] = "Exporter vers Excel";
            $lang['export_to_xml'] = "Exporter vers XML";
            $lang['field'] = "Champ"; 
            $lang['field_value'] = "Valeur du champ"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "Premier";                            
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "Dernier";                              
            $lang['like'] = "like";
            $lang['max'] = "max";                
            $lang['next'] = "Suivant";                              
            $lang['no'] = "Non";                                  
            $lang['no_data_found'] = "Aucune information trouv�e";                                                                      
            $lang['no_data_found_error'] = "Aucune information trouv�e! S'il vous pla�t, V�rifiez la syntaxe de votre code!<br> Il se peut qu'il y a distinction entre les majuscules et les minuscules ou qu'il ya des symb�les inattendus."; 
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                
            $lang['pages'] = "Pages"; 
            $lang['page_size'] = "Taille de la page"; 
            $lang['previous'] = "Pr�c�dent";                      
            $lang['printable_view'] = "Aper�u avant impression";          
            $lang['print_now'] = "Print Now";
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #"; 
            $lang['remove'] = "Remove";
            $lang['results'] = "R�sultats"; 
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";
            $lang['search'] = "Rechercher"; 
            $lang['search_d'] = "Rechercher";  // (description) 
            $lang['search_type'] = "Filtrer"; 
            $lang['select'] = "S�lectionner";                          
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Mise � jour";                             
            $lang['update_record'] = "Mise � jour de l'enregistrement";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";
            $lang['view'] = "Voir"; 
            $lang['view_details'] = "Voir en d�tails";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Oui";                                

            break; 

        //------------------------------------------------------------------ 
        //*** Hungarian (hu)
        //------------------------------------------------------------------             
        case "hu": 
            $lang['add'] = "Add";
            $lang['add_new'] = "+ �j rekord";
            $lang['add_new_record'] = "�j rekord hozz�ad�sa";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Vissza";
            $lang['cancel'] = "M�gse";
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";                
            $lang['check_all'] = "Check All";
            $lang['create'] = "L�trehoz";
            $lang['create_new_record'] = "�j rekord l�trehoz�sa";
            $lang['current'] = "aktu�lis";
            $lang['delete'] = "T�rl�s";
            $lang['delete_record'] = "Rekord t�rl�se";
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Szerkeszt�s";
            $lang['edit_record'] = "Rekord szerkeszt�se";
            $lang['export_to_excel'] = "Export�l�s Excel-be";
            $lang['export_to_xml'] = "Export�l�s XML-be";
            $lang['field'] = "Mez&#337;";
            $lang['field_value'] = "Mez&#337; �rt�k";
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "els&#337;";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "utols�";
            $lang['like'] = "like";
            $lang['max'] = "max";                                
            $lang['next'] = "k�vetkez&#337;";
            $lang['no'] = "Nem";
            $lang['no_data_found'] = "Nincs tal�lat!";
            $lang['no_data_found_error'] = "Nincs tal�lat! K�rlek ellen&#337;rizd a k�d szintaxis�t! <br />Esetleg kisbet&#369;-nagybet&#369; �rz�keny, vagy nem v�rt szimb�lumot tartalmaz.";
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                                
            $lang['pages'] = "Oldalak";
            $lang['page_size'] = "Oldal m�ret";
            $lang['previous'] = "megel�z&#337;";
            $lang['printable_view'] = "Nyomtathat� n�zet";
            $lang['print_now'] = "Print Now";                
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #";
            $lang['results'] = "Eredm�nyek";
            $lang['remove'] = "Remove";                
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";
            $lang['search'] = "Keres�s";
            $lang['search_d'] = "Keres�s"; // (description)
            $lang['search_type'] = "Keres�si t�pus";
            $lang['select'] = "select";
            $lang['set_date'] = "D�tum megad�sa";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "M�d�s�t�s";
            $lang['update_record'] = "Rekord m�d�s�t�sa";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";                
            $lang['view'] = "R�szletek";
            $lang['view_details'] = "R�szletek megtekin�se";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Igen";

            break;

        //------------------------------------------------------------------ 		
        //*** Bosnian/Croatian (hr)
        //------------------------------------------------------------------             
        case "hr": 
            $lang['add'] = "Add";                               
            $lang['add_new'] = "+ Novi unos";                                                            
            $lang['add_new_record'] = "Novi unos dodat";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Natrag";                           
            $lang['cancel'] = "Prekinuti";
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All";
            $lang['create'] = "Napravi";                         
            $lang['create_new_record'] = "Novi unos napravit";   
            $lang['current'] = "current";                       
            $lang['delete'] = "Bri&#353;i"; 
            $lang['delete_record'] = "Bri&#353;i unos";
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Edit";                             
            $lang['edit_record'] = "Edit record";               
            $lang['export_to_excel'] = "Export u Excel";
            $lang['export_to_xml'] = "Export u XML";
            $lang['field'] = "Polje"; 
            $lang['field_value'] = "Vrjednost polja"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "prva";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "sadnja";
            $lang['like'] = "like";
            $lang['max'] = "max";                                
            $lang['next'] = "sljede&#269;i";                
            $lang['no'] = "Ne";                                
            $lang['no_data_found'] = "Nema unosa"; 
            $lang['no_data_found_error'] = "Nema podataka! Molimte provjerite va&#353; Code!<br>Mo&#382;da je case sensitive ili ima pogre&#353;ni simbola.";                                
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                                
            $lang['pages'] = "Stranice"; 
            $lang['page_size'] = "Rezultati na stranici"; 
            $lang['previous'] = "pro&#353;li";                     
            $lang['printable_view'] = "Printversija";
            $lang['print_now'] = "Print Now";                
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #";
            $lang['remove'] = "Remove";                
            $lang['results'] = "Rezultati";
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";                
            $lang['search'] = "Tra&#382;i"; 
            $lang['search_d'] = "Tra&#382;enje"; 
            $lang['search_type'] = "Filter"; 
            $lang['select'] = "select";
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Update";                       
            $lang['update_record'] = "Update record";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";                
            $lang['view'] = "Pogled";                            
            $lang['view_details'] = "View details";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Da";                               
                
            break;  

        //------------------------------------------------------------------ 		
        //*** Italiano (it) provided by: Matteo Piotto piotto@gmail.com 
        //------------------------------------------------------------------             
        case "it":
            $lang['add'] = "Aggiungi"; 
            $lang['add_new'] = "+ Aggiungi nuovo"; 
            $lang['add_new_record'] = "Aggiungi nuovo record"; 
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Indietro"; 
            $lang['cancel'] = "Annulla"; 
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All"; 
            $lang['create'] = "Crea"; 
            $lang['create_new_record'] = "Crea nuovo record"; 
            $lang['current'] = "corrente";         
            $lang['delete'] = "Cancella"; 
            $lang['delete_record'] = "Cancella record"; 
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Modifica"; 
            $lang['edit_record'] = "Modifica record"; 
            $lang['export_to_excel'] = "Esporta su Excel";
            $lang['export_to_xml'] = "Esporta su XML";
            $lang['field'] = "Campo"; 
            $lang['field_value'] = "Valore campo"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "primo";                  
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "ultimo"; 
            $lang['like'] = "like";        
            $lang['max'] = "max";                
            $lang['next'] = "successivo"; 
            $lang['no'] = "No";                                
            $lang['no_data_found'] = "Nessun valore trovato"; 
            $lang['no_data_found_error'] = "Nessun valore trovato! Controlla la sintassi del SQL!<br>Si prega di fare attenzione alla sintassi e ad eventuali simboli.";                                
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                
            $lang['pages'] = "Pagine";                    
            $lang['page_size'] = "Lunghezza pagine"; 
            $lang['previous'] = "precedente";                
            $lang['printable_view'] = "Versione stampabile";                
            $lang['print_now'] = "Print Now";
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #"; 
            $lang['remove'] = "Remove";
            $lang['results'] = "Risultati"; 
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";
            $lang['search'] = "Cerca"; 
            $lang['search_d'] = "Cerca"; // (description) 
            $lang['search_type'] = "Tipo di ricerca"; 
            $lang['select'] = "seleziona"; 
            $lang['set_date'] = "Set date";        
            $lang['total'] = "Total";
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Aggiorna"; 
            $lang['update_record'] = "Aggiorna record"; 
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";
            $lang['view'] = "Mostra"; 
            $lang['view_details'] = "Mostra dettagli"; 
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Si";                        

            break; 

        //------------------------------------------------------------------ 		            
        //*** Netherlands / "Vlaams" (Flemish) (nl)
        //------------------------------------------------------------------ 		            
        case "nl": 
            $lang['add'] = "Toevoegen"; 
            $lang['add_new'] = "+ nieuw"; 
            $lang['add_new_record'] = "Voeg nieuwe record toe";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Terug"; 
            $lang['cancel'] = "Annuleer";                 
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All";
            $lang['create'] = "Maak nieuw"; 
            $lang['create_new_record'] = "Maak nieuwe record"; 
            $lang['current'] = "huidige"; 
            $lang['delete'] = "Verwijder"; 
            $lang['delete_record'] = "Verwijder record"; 
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Wijzig"; 
            $lang['edit_record'] = "Wijzig record"; 
            $lang['export_to_excel'] = "Exporteer naar Excel";
            $lang['export_to_xml'] = "Exporteer naar XML";
            $lang['field'] = "Veld"; 
            $lang['field_value'] = "Waarde"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "eerste"; 
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "laatste"; 
            $lang['like'] = "like";
            $lang['max'] = "max";                
            $lang['next'] = "volgende"; 
            $lang['no'] = "Nee"; 
            $lang['no_data_found'] = "Geen gegevens gevonden"; 
            $lang['no_data_found_error'] = "Geen gegevens gevonden! Kijk de syntax van uw code goed na!<br>Er kunnen problemen zijn met hoofdlettergevoeligheid of met onverwachte symbolen."; 
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                
            $lang['pages'] = "Pagina's"; 
            $lang['page_size'] = "Paginalengte"; 
            $lang['previous'] = "vorige"; 
            $lang['printable_view'] = "Afdrukvoorbeeld"; 
            $lang['print_now'] = "Print Now";
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #"; 
            $lang['remove'] = "Remove";
            $lang['results'] = "Resultaten"; 
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";
            $lang['search'] = "Zoek"; 
            $lang['search_d'] = "Zoek"; // (description) 
            $lang['search_type'] = "Zoeken met"; 
            $lang['select'] = "Selecteer"; 
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";                
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Bijwerken"; 
            $lang['update_record'] = "Record bijwerken";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";
            $lang['view'] = "Details"; 
            $lang['view_details'] = "Bekijk details";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Ja";                 
                
            break;

        //------------------------------------------------------------------ 		            
        //*** Swedish (se)
        //------------------------------------------------------------------ 		            
        case "se": 
            $lang['add'] = "Ny"; 
            $lang['add_new'] = "+ L�gg till ny"; 
            $lang['add_new_record'] = "L�gg till ny post";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Tillbaka";
            $lang['cancel'] = "Avbryt";
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All";
            $lang['create'] = "Skapa"; 
            $lang['create_new_record'] = "Skapa ny post"; 
            $lang['current'] = "aktuell"; 
            $lang['delete'] = "Ta bort"; 
            $lang['delete_record'] = "Ta bort post";
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Editera"; 
            $lang['edit_record'] = "Editera post"; 
            $lang['export_to_excel'] = "Exportera till Excel";
            $lang['export_to_xml'] = "Exportera till XML";            
            $lang['field'] = "F�lt"; 
            $lang['field_value'] = "F�ltv�rde"; 
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";                        
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "f�rsta";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "sista"; 
            $lang['like'] = "like";
            $lang['max'] = "max";                
            $lang['next'] = "n�sta"; 
            $lang['no'] = "Nej";                                
            $lang['no_data_found'] = "Det finns ingen data"; 
            $lang['no_data_found_error'] = "Det finns ingen data! V�nligen kontrollera er kod noggrant!<br>Den kanske inneh�ller stora/sm� tecken eller otill�tna tecken.";                                
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";
            $lang['pages'] = "Sidor";                    
            $lang['page_size'] = "Sidstorlek"; 
            $lang['previous'] = "f�reg�ende";                
            $lang['printable_view'] = "Vy f�r utskrift";                
            $lang['print_now'] = "Print Now";
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #"; 
            $lang['remove'] = "Remove";
            $lang['results'] = "Resultat"; 
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";
            $lang['search'] = "S�k"; 
            $lang['search_d'] = "S�k"; // (description) 
            $lang['search_type'] = "Soktyp"; 
            $lang['select'] = "v�lj"; 
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Updatera"; 
            $lang['update_record'] = "Updatera post";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";
            $lang['view'] = "Visa"; 
            $lang['view_details'] = "Visa detaljer";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Ja";                
                
            break; 

        //------------------------------------------------------------------             
        //*** English (en)
        //------------------------------------------------------------------             
        case "en": 
        default: 
            $lang['add'] = "Add"; 
            $lang['add_new'] = "+ Add New"; 
            $lang['add_new_record'] = "Add new record";
            $lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $lang['and'] = "and";
            $lang['any'] = "any";                                                 
            $lang['ascending'] = "Ascending"; 
            $lang['back'] = "Back"; 
            $lang['cancel'] = "Cancel";
            $lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $lang['check_all'] = "Check All"; 
            $lang['create'] = "Create"; 
            $lang['create_new_record'] = "Create new record"; 
            $lang['current'] = "current"; 
            $lang['delete'] = "Delete"; 
            $lang['delete_record'] = "Delete record";
            $lang['delete_selected'] = "Delete selected";
            $lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $lang['delete_this_record'] = "Are you sure you want to delete this record?";                                 
            $lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $lang['descending'] = "Descending";
            $lang['details'] = "Details";
            $lang['edit'] = "Edit"; 
            $lang['edit_record'] = "Edit record"; 
            $lang['export_to_excel'] = "Export to Excel";
            $lang['export_to_xml'] = "Export to XML";
            $lang['field'] = "Field"; 
            $lang['field_value'] = "Field Value";
            $lang['file_opening_error'] = "Cannot open a file. Check your permissions.";                        
            $lang['file_writing_error'] = "Cannot write to file. Check writing permissions!";
            $lang['file_invalid file_size'] = "Invalid file size";
            $lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $lang['first'] = "first";
            $lang['hide_search'] = "Hide Search";
            $lang['last'] = "last";
            $lang['like'] = "like";
            $lang['max'] = "max";                
            $lang['next'] = "next";
            $lang['no'] = "No";                                
            $lang['no_data_found'] = "No data found"; 
            $lang['no_data_found_error'] = "No data found! Please, check carefully your code syntax!<br>It may be case sensitive or there are some unexpected symbols.";                                
            $lang['no_image'] = "No Image";
            $lang['not_like'] = "not like";
            $lang['of'] = "of";
            $lang['or'] = "or";                
            $lang['pages'] = "Pages";                    
            $lang['page_size'] = "Page size"; 
            $lang['previous'] = "previous";                
            $lang['printable_view'] = "Printable View";
            $lang['print_now'] = "Print Now";
            $lang['print_now_title'] = "Click here to print this page";
            $lang['record_n'] = "Record #"; 
            $lang['remove'] = "Remove";
            $lang['results'] = "Results";
            $lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";
            $lang['search'] = "Search"; 
            $lang['search_d'] = "Search"; // (description) 
            $lang['search_type'] = "Search type"; 
            $lang['select'] = "select";
            $lang['set_date'] = "Set date";
            $lang['total'] = "Total";
            $lang['uncheck_all'] = "Uncheck All";
            $lang['unhide_search'] = "Unhide Search";
            $lang['update'] = "Update"; 
            $lang['update_record'] = "Update record";
            $lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                        
            $lang['upload'] = "Upload";
            $lang['view'] = "View"; 
            $lang['view_details'] = "View details";
            $lang['with_selected'] = "With selected";
            $lang['wrong_field_name'] = "Wrong field name";
            $lang['yes'] = "Yes";                

        break; 
    } 
    return $lang; 
}


?>

