<?php
require 'scripts/PHPMailer/PHPMailerAutoload.php';
require 'scripts/PHPMailer/class.phpmailer.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$_SESSION['token'] = 0;
?>
<!DOCTYPE html>
	<html lang="pl">

		<head>
			<meta charset="utf-8">
			<title>AVEQ</title>
			<meta name="description" content="Event ninjas">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="style.css" type="text/css">
			<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500,700&display=swap" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Be+Vietnam:300,400,500,600,700,800&display=swap" rel="stylesheet">

			<link rel="stylesheet" href="form.css" type="text/css">
			<link rel="stylesheet" href="grid.css" type="text/css">
			<link rel="stylesheet" href="checkbox.css" type="text/css">
			<link rel="stylesheet" href="form.css" type="text/css">
		</head>

		<body class="form">

			<header>
				<div class="nav">
						<a href="index.html"><img class="logo-pic" src="img/aveq_logo.svg"></a>
					<ul>

						<li><a href="crew.html" >ninja crew</a></li>
						<li><a href="realizacje.html" >realizacje</a></li>
						<li><a href="mozliwosci.html" >możliwości</a></li>
						<li><a href="kontakt.html">kontakt</a></li>

						<!-- <li><a href="kontakt.html" target="_blank" ><img src="img/contact.svg" class="social-menu"></a></li>-->
						<li><a href="https://www.instagram.com/aveqpl/" target="_blank" ><img src="img/instagram.svg" class="social-menu"></a></li>
						<li><a href="https://www.facebook.com/AVEQpl/" target="_blank" ><img src="img/facebook.svg" class="social-menu"></a></li>
						<!-- <li><a href="eng/index_eng.html" >eng</a></li> -->

					</ul>
				</div>
            </header>

			<div class="form_content">
			<?php
			if (isset($_POST['btnSubmit'])){
				if(!isset($_SESSION['sesja']) || (isset($_SESSION['sesja']) && $_SESSION['sesja'] != $_POST['sesja'])){
						$_SESSION['sesja'] = $_POST['sesja'];
				if(isset($_POST['data_od'])) {
					$data_od = $_POST['data_od'];
					$zamowienie = '<html><body><b>Data zlecenia</b> od: '.$data_od;
				};
				if(isset($_POST['data_do'])) {
					$data_do = $_POST['data_do'];
					$zamowienie .= ' do: '.$data_do;
				};
				if(isset($_POST['miejsce'])) {
					$miejsce = $_POST['miejsce'];
					$zamowienie .= '<br/><b>Miejsce wydarzenia:</b> '.$miejsce;
				};
				if(isset($_POST['ilosc_osob'])) {
					$ilosc_osob = $_POST['ilosc_osob'];
					$zamowienie .= '<br/><b>Ilość osób na wydarzeniu:</b> '.$ilosc_osob;
				};
				$zamowienie .= '<br/><br/><b>Zamawiany sprzęt:</b>';
				if(isset($_POST['naglosnienie'])) {
					$naglosnienie = $_POST['naglosnienie'];
					$zamowienie .= '</br><b>Nagłośnienie:</b><br/>'.$naglosnienie;
					};
				if(isset($_POST['mikrofony_reka'])) {
					$mikrofony_reka_ilsoc = $_POST['mikrofony_reka_ilsoc'];
					$zamowienie .='<br/>Mikrofony do ręki - ilość: '.$mikrofony_reka_ilsoc;
					};
				if(isset($_POST['mikrofony_glowa'])) {
					$mikrofony_glowa_ilosc = $_POST['mikrofony_glowa_ilosc'];
					$zamowienie .= '<br/>Mikrofony nagłowne - ilość: '.$mikrofony_glowa_ilosc;
					};
				if(isset($_POST['mikrofon_kabel'])) {
					$mikrofon_kabel_ilosc = $_POST['mikrofon_kabel_ilosc'];
					$zamowienie .= '</br>Mikrofony na kablu - ilość: '.$mikrofon_kabel_ilosc;
					};
				if(isset($_POST['oswietlenie_prelegentow'])) {
					$liczba_prelegentow = $_POST['liczba_prelegentow'];
					$szerokosc_sceny = $_POST['szerokosc_sceny'];
					$zamowienie .= '<br/><b>Oświetlenie</b><br/>Oświetlenie prelegentów - ilość prelegnetów na scenie: '.$liczba_prelegentow;
					$zamowienie .= '<br/>Szerokość sceny: '.$szerokosc_sceny;
					};
				if(isset($_POST['oswietlenie_klimat'])) {
					$wielkosc_sali = $_POST['wielkosc_sali'];
					$zamowienie .= '<br/>Oświetlenie - klimat - wielkość sali: '.$wielkosc_sali;
					};
				if(isset($_POST['oswietlenie_koncert'])) {
					$oswietlenie_koncert = 'TAK';
					$zamowienie .= '<br/>Oświetlenie koncertowe : TAK';
					};
				if(isset($_POST['liczba_jezykow'])){
					$liczba_jezykow= $_POST['liczba_jezykow'];
						if($liczba_jezykow>0){
							$zamowienie .= '<br/><b>Tłumaczenia symultaniczne</b><br/>Ilość języków :'.$liczba_jezykow;
						};
					};
				if(isset($_POST['jezyki'])){
					$jezyki= $_POST['jezyki'];
						if(strlen($jezyki)>3){
							$zamowienie .= '<br/>Języki do tłumaczenia: '.$jezyki;
						};
					};
				if(isset($_POST['symultana_ilosc'])) {
					$symultana_ilosc = $_POST['symultana_ilosc'];
					$zamowienie .= '<br/>'.$symultana_ilosc;
					};
				if(isset($_POST['symultanailosc_zestawow'])) {
					$symultanailosc_zestawow_ilsoc = $_POST['symultanailosc_zestawow_ilsoc'];
					$zamowienie .= '<br/>Ilość odbiorników i zestawów słuchawkowych: '.$symultanailosc_zestawow_ilsoc;
					};
				if(isset($_POST['systemy_dyskusyjne'])) {
					$systemy_dyskusyjne_ilosc = $_POST['systemy_dyskusyjne_ilosc'];
					$zamowienie .= '<br/>Ilość systemów dyskusyjnych/multifonów: '.$systemy_dyskusyjne_ilosc;
					};
				if(isset($_POST['systemy_do_glosowania'])) {
					$systemy_do_glosowania_ilosc = $_POST['systemy_do_glosowania_ilosc'];
					$zamowienie .= '<br/>Systemy do głosowania ilość: '.$systemy_do_glosowania_ilosc;
					};
				if(isset($_POST['p3_wewnetrzny'])) {
					$p3_wewnetrzny_ilsoc = $_POST['p3_wewnetrzny_ilsoc'];
					$p3_wewnetrzny_szerokosc = $_POST['p3_wewnetrzny_szerokosc'];
					$p3_wewnetrzny_dlugosc = $_POST['p3_wewnetrzny_dlugosc'];
					$zamowienie .= '<br/><b>Multimedia</b><br/>Ekran diodowy P3 wewnętrzny - ilość: '.$p3_wewnetrzny_ilsoc.' - rozmiar - '.$p3_wewnetrzny_szerokosc.' X '.$p3_wewnetrzny_dlugosc;
					};
				if(isset($_POST['p5_wewnetrzny'])) {
					$p5_wewnetrzny_ilsoc = $_POST['p5_wewnetrzny_ilsoc'];
					$p5_wewnetrzny_szerokosc = $_POST['p5_wewnetrzny_szerokosc'];
					$p5_wewnetrzny_dlugosc = $_POST['p5_wewnetrzny_dlugosc'];
					$zamowienie .= '<br/>Ekran diodowy P5 wewnętrzny - ilość: '.$p5_wewnetrzny_ilsoc.' - rozmiar - '.$p5_wewnetrzny_szerokosc.' X '.$p5_wewnetrzny_dlugosc;
					};
				if(isset($_POST['p5_zewnętrzny'])) {
					$p5_zewnetrzny_ilsoc = $_POST['p5_zewnetrzny_ilsoc'];
					$p5_zewnetrzny_szerokosc = $_POST['p5_zewnetrzny_szerokosc'];
					$p5_zewnetrzny_dlugosc = $_POST['p5_zewnetrzny_dlugosc'];
					$zamowienie .= '<br/>Ekran diodowy P5 zewnetrzny - ilość: '.$p5_zewnetrzny_ilsoc.' - rozmiar - '.$p5_zewnetrzny_szerokosc.' X '.$p5_zewnetrzny_dlugosc;
					};
				if(isset($_POST['lcd_led'])) {
					$lcd_led_ilsoc = $_POST['lcd_led_ilsoc'];
					$lcd_led_rozmiar = $_POST['lcd_led_rozmiar'];
					$zamowienie .= '<br/>Monitory LCD/LED - ilość: '.$lcd_led_ilsoc.' - rozmiar - '.$lcd_led_rozmiar;
					};
				if(isset($_POST['projektor_standard'])) {
					$projektor_standard = 'TAK';
					$zamowienie .= '<br/>Projektor standardowej mocy: TAK';
					};
				if(isset($_POST['projektor_duzy'])) {
					$projektor_duzy = 'TAK';
					$zamowienie .= '<br/>Projektor dużej mocy: TAK';
					};
				if(isset($_POST['ekran_ramowy'])) {
					$ekran_ramowy_ilsoc = $_POST['ekran_ramowy_ilsoc'];
					$ekran_ramowy_rozmiar = $_POST['ekran_ramowy_rozmiar'];
					$zamowienie .= '<br/>Ekran ramowy tylna/przednia projkcja - ilość: '.$ekran_ramowy_ilsoc.' - rozmiar - '.$ekran_ramowy_rozmiar;
					};
				if(isset($_POST['prompter'])) {
					$prompter_ilsoc = $_POST['prompter_ilsoc'];
					$prompter_rozmiar = $_POST['prompter_rozmiar'];
					$zamowienie .= '<br/>prompter / podgląd dla prelegneów - ilość: '.$prompter_ilsoc.' - rozmiar - '.$prompter_rozmiar;
					};
				if(isset($_POST['mikser_obsluga'])) {
					$mikser_obsluga = 'TAK';
					$zamowienie .= '<br/>mikser wizji/obsługa prezentacji: TAK';
					};
				if(isset($_POST['laptop'])) {
					$laptop = 'TAK';
					$zamowienie .= '<br/>Laptop do obsługi prezentacji: TAK';
					};
				if(isset($_POST['uwagi'])) {
					$uwagi = $_POST['uwagi'];
					$zamowienie .= '<br/><br/><b>UWAGI:</b><br/>'.$uwagi;
				};
				if(isset($_POST['imie'])) {
					$imie = $_POST['imie'];
					$zamowienie .= '<br/><b>Dane kontaktowe:</b><br/>'.$imie;
				};
				if(isset($_POST['nazwisko'])) {
					$nazwisko = $_POST['nazwisko'];
					$zamowienie .= ' '.$nazwisko;
				};
				if(isset($_POST['firma'])) {
					$firma = $_POST['firma'];
					$zamowienie .= '<br/>Firma: '.$firma;
				};
				if(isset($_POST['numer_telefonu'])) {
					$numer_telefonu = $_POST['numer_telefonu'];
					$zamowienie .= '<br/>Numer telefonu: '.$numer_telefonu;
				};
				if(isset($_POST['email'])) {
					$email = $_POST['email'];
					$zamowienie .= '<br/>Email: '.$email.'</body></html>';
				};

				//echo $zamowienie;

			$mail_glowny = 'aveq_proba@o2.pl';
			$login = 'aveq_proba@o2.pl';
			$haslo = 'qwerty123456';
			$email_do_wysylki = $email;
			$temat = 'Wiadomość z Aveq.pl';
			$tresc_meila = $zamowienie;
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Host = 'poczta.o2.pl';
			$mail->SMTPAuth = true;
			$mail->Username = $login;
			$mail->Password = $haslo;
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom($mail_glowny, 'Aveq.pl');
			$mail->addAddress($email_do_wysylki);
			$mail->addReplyTo($mail_glowny , 'Informacja Zwrotna Aveq.pl');
			$mail->CharSet = "UTF-8";
			$mail->Subject = $temat;
			$mail->isHTML(true);
			$mail->Body    = $tresc_meila;
			if(!$mail->send()) {
				  echo 'Message was not sent.';
				  echo 'Mailer error: ' . $mail->ErrorInfo;
			}else{
				echo '<div class="wiadomosc_wyslana">Dziękujemy za wiadomość. Nasz ninja skotnaktuje się jak tylko odczyta wiadomość.</div>';
			}



				}
			}else{
			?>
			<form id="aveq_form" action="form.php" method="post">
				<div class="form_flex row">
					<div class="col1 col-sm-5"><div class="button_up">wypełnij formularz</div></div>
					<div class="col2 col-sm-2"><div class="lub">lub</div></div>
					<div class="col3 col-sm-5"><div class="button_up">skontaktuj się z nami</div></div>
				</div>
				<div class="form_flex form_ico">
					<img src="img/form.svg" />
					</div>
				<div class="form_naglowek">Data wydarzenia</div>
				<div class="row form_data">
					<div class="col-sm-4">
						od <input type="date" name="data_od" id="start" value="<?php echo date("Y-m-d"); ?>" min="<?php  echo date("Y-m-d"); ?>">
					</div>
					<div class="col-sm-4">
						do  <input type="date" name="data_do" id="end" value="<?php echo date("Y-m-d"); ?>" min="<?php  echo date("Y-m-d"); ?>">
					</div>
				</div>
				<div class="form_miejsce"><div class="miejsce_content">miejsce wydarzenia</div><input type="text" class="miejsce_input" name="miejsce"/></div>
				<div class="form_miejsce"><div class="miejsce_ilosc_osob">ilość osób na wydarzeniu</div><input type="number" min="0" class="ilosc_osob_wyadrzenie" name="ilosc_osob"/></div>
				<div class="form_naglowek">NAGŁOŚNIENIE:</div>
				<div class="row">
					<div class="col form_flex_column">
					<!--
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">

							<div class="state p-primary ilosc_osob">
								ilość osób na wydarzeniu
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><input type="number" min="0" name="ilosc_osob na wydarzeniu"/></div>
						</div>
					</div>-->
					  <div class="pretty p-default p-curve">
							<input type="radio" name="naglosnienie" value="Nagłośnienie konferencyjne do 200m2" />
							<div class="state p-primary-o">
								<label>nagłośnienie konferencyjne do 200m2</label>
							</div>
						</div>
						<div class="pretty p-default p-curve">
							<input type="radio" name="naglosnienie" value="Nagłośnienie konferencyjne do 500m2"/>
							<div class="state p-primary-o">
								<label>nagłośnienie konferencyjne do 500m2</label>
							</div>
						</div>
						<div class="pretty p-default p-curve">
							<input type="radio" name="naglosnienie" value="Nagłośnienie konferencyjne powyżej 500m2" />
							<div class="state p-primary-o">
								<label>nagłośnienie konferencyjne powyżej 500m2</label>
							</div>
						</div>

						<div class="pretty p-default p-curve">
							<input type="radio" name="naglosnienie" value="Inne opisane w uwagach"/>
							<div class="state p-primary-o">
								<label>inne</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form_row">
					<div class="row">
						<div class="col-sm-6 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="mikrofony_reka"/>
							<div class="state p-primary">
								<label>mikrofony bezprzewodowe do ręki</label>
							</div>
						</div>
						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="ilosc_screen">ILOSC</div>
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="mikrofony_reka_ilsoc"/></div>
						</div>
					</div>
					<div class="row ">
						<div class="col-sm-6 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="mikrofony_glowa"/>
							<div class="state p-primary">
								<label>mikforony bezprzewodowe nagłowne</label>
							</div>
						</div>
						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="mikrofony_glowa_ilosc"/></div>
						</div>
					</div>
					<div class="row ">
						<div class="col-sm-6 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="mikrofon_kabel"/>
							<div class="state p-primary">
								<label>mikrofony przewodowe</label>
							</div>
						</div>
						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="mikrofon_kabel_ilosc"/></div>
						</div>
					</div>
				</div>
				<div class="form_naglowek">OŚWIETLENIE:</div>
				<div class="row form_row">
					<div class="col form_flex_column">
						<div class="pretty p-default">
								<input type="checkbox" name="oswietlenie_prelegentow"/>
								<div class="state p-primary">
									<label>Oświetlenie konferencyjne prelegentów:</label>
								</div>
						</div>
						<div class="row row_light">
						<div class="col-sm-6 form_flex_column form_column_ilosc_light">
							<div class="form_ilosc">LICZBA PRELEGOENTÓW<input type="number" min="0" class="light_ilosc_input" name="liczba_prelegentow"/></div>
							<div class="form_ilosc">SZEROKOŚĆ SCENY<input type="number" min="0" class="light_ilosc_input" name="szerokosc_sceny"/></div>
							<div class="form_ilosc">DŁUGOŚĆ SCENY<input type="number" min="0" class="light_ilosc_input" name="dlugosc_sceny"/></div>
						</div>
						</div>

						<div class="pretty p-default">
								<input type="checkbox" name="oswietlenie_klimat"/>
								<div class="state p-primary">
									<label>Oświetlenie klimatyczne konferencji:*</label>
								</div>
						</div>
						<div class="row row_light">
							<div class="col-sm-6 form_flex_column">
								<div class="form_ilosc">SALA<input type="number" min="0" class="light_ilosc_input" name="wielkosc_sali"/></div>
							</div>
						</div>

						<div class="pretty p-default">
								<input type="checkbox" name="oswietlenie_koncert"/>
								<div class="state p-primary">
									<label>Oświetlenie koncertowe:*</label>
								</div>
						</div>
						<div class="oswietlenie_koncert_opis">*nasza ninja odezwie się żeby omówić szczegóły lub prosimy o szczegółowy opis w uwagach</div>
					</div>
				</div>

				<div class="form_naglowek">TŁUMACZENIA SYMULTANICZNE</div>
				<div class="row row_symyltana">
						<div class="col-sm-6 form_flex_column">
							<div class="form_ilosc form_ilosc_jezyki">ilość języków do tłumaczenia na konferencji<input type="number" min="0" class="symultana_ilosc_input" name="liczba_jezykow"/><div class="form_symultana_opis media"><img src="img/i_ico.jpg" /></div><div class="form_symultana_opis_1 media">pozwoli to ustalićliczbę potrzebnych kabin 1 kabina 2 osobowa to 1 jezyk obcy</div></div>
							<div class="form_ilosc form_jezyki">języki tłumaczeń<input type="text" class="symultana_ilosc_input" name="jezyki"/></div>
						</div>
						<div class="col-sm-6 form_flex_column_symultana_opis screen">
							<div class="form_symultana_opis"><img src="img/i_ico.jpg" /></div><div class="form_symultana_opis_1">pozwoli to ustalićliczbę potrzebnych kabin 1 kabina 2 osobowa to 1 jezyk obcy</div>
						</div>
				</div>
				<div class="form_row">
					<div class="row">
						<div class="col form_flex_column">
						  <div class="pretty p-default p-curve">
								<input type="radio" name="symultana_ilosc" Value="Aparatura symultaniczna do 200m2"/>
								<div class="state p-primary-o">
									<label>aparatura symultaniczna do 200m2</label>
								</div>
							</div>
							<div class="pretty p-default p-curve">
								<input type="radio" name="symultana_ilosc" Value="Aparatura symultaniczna do 500m2"/>
								<div class="state p-primary-o">
									<label>aparatura symultaniczna do 500m2</label>
								</div>
							</div>
							<div class="pretty p-default p-curve">
								<input type="radio" name="symultana_ilosc" Value="Aparatura symultaniczna powyżej 500m2"/>
								<div class="state p-primary-o">
									<label>aparatura symultaniczna  powyżej 500m2</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form_row">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="symultanailosc_zestawow"/>
							<div class="state p-primary">
								<label>odbiorniki i zestawy słuchawkowe</label>
							</div>
						</div>
						</div>
						<div class="col-sm-1 form_flex_column form_column_ilosc_mic">
							<div class="ilosc_screen">ILOSC</div>
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="symultanailosc_zestawow_ilsoc"/><div class="form_symultana_opis_3 media"><img src="img/i_ico.jpg" /></div><div class="form_symultana_opis_4 media">1 uczestnik to jeden odbiornik i 1 zestaw słuchawkowy</div></div>

						</div>
						<div class="col-sm-2 form_flex_column_symultana_opis screen">
							<div class="form_symultana_opis_3"><img src="img/i_ico.jpg" /></div><div class="form_symultana_opis_4">1 uczestnik to jeden odbiornik i 1 zestaw słuchawkowy</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="systemy_dyskusyjne"/>
							<div class="state p-primary">
								<label>system dyskusyjny / multifony</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="systemy_dyskusyjne_ilosc"/></div>
						</div>
					</div>
				</div>
				<div class="form_naglowek">SYSTEMY DO GŁOSOWANIA</div>
				<div class="form_row">
					<div class="row">
						<div class="col-sm-3 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="systemy_do_glosowania"/>
							<div class="state p-primary">
								<label>ILOŚĆ OSÓB</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column">
							<div class="form_ilosc"><input type="number" min="0" name="systemy_do_glosowania_ilosc"/></div>
						</div>
					</div>
				</div>
				<div class="form_naglowek">MULTIMEDIA</div>
				<div class="form_row multimedia">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="p3_wewnetrzny"/>
							<div class="state p-primary">
								<label>ekran diodowy P3 wewnętrzny</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="ilosc_screen">ILOSC</div>
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" class="mod" name="p3_wewnetrzny_ilsoc"/></div>

						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="rozmiar_screen">ROZMIAR EKRANU</div>
						<div class="p3_wew"><div class="ilosc_media">ROZMIAR EKRANU</div>
						<select class="p3_wewnetrzny_szerokosc" name="p3_wewnetrzny_szerokosc">
									  <option value="brak"></option>
									  <option value="0.5">0.5</option>
									  <option value="1.0">1.0</option>
									  <option value="1.5">1.5</option>
									  <option value="2.0">2.0</option>
									  <option value="2.5">2.5</option>
									  <option value="3.0">3.0</option>
									  <option value="3.5">3.5</option>
									  <option value="4.0">4.0</option>
									  <option value="4.5">4.5</option>
									  <option value="5.0">5.0</option>
									  <option value="5.5">5.5</option>
									  <option value="6.0">6.0</option>
									  <option value="6.5">6.5</option>
									  <option value="7.0">7.0</option>
									  <option value="7.5">7.5</option>
									  <option value="8.0">8.0</option>
									  <option value="8.5">8.5</option>
									  <option value="9.0">9.0</option>
									  <option value="9.5">9.5</option>
									  <option value="10.0">10.0</option>
								</select>
								X
								<select class="p3_wewnetrzny_dlugosc" name="p3_wewnetrzny_dlugosc">
									  <option value="brak"></option>
									  <option value="0.5">0.5</option>
									  <option value="1.0">1.0</option>
									  <option value="1.5">1.5</option>
									  <option value="2.0">2.0</option>
									  <option value="2.5">2.5</option>
									  <option value="3.0">3.0</option>
									  <option value="3.5">3.5</option>
									  <option value="4.0">4.0</option>
									  <option value="4.5">4.5</option>
									  <option value="5.0">5.0</option>
									  <option value="5.5">5.5</option>
									  <option value="6.0">6.0</option>
									  <option value="6.5">6.5</option>
									  <option value="7.0">7.0</option>
									  <option value="7.5">7.5</option>
									  <option value="8.0">8.0</option>
									  <option value="8.5">8.5</option>
									  <option value="9.0">9.0</option>
									  <option value="9.5">9.5</option>
									  <option value="10.0">10.0</option>
									  <option value="10.5">10.5</option>
									  <option value="11.0">11.0</option>
									  <option value="11.5">11.5</option>
									  <option value="12.0">12.0</option>
									  <option value="12.5">12.5</option>
									  <option value="13.0">13.0</option>
									  <option value="13.5">13.5</option>
									  <option value="14.0">14.0</option>
									  <option value="14.5">14.5</option>
									  <option value="15.0">15.0</option>
									  <option value="15.5">15.5</option>
									  <option value="16.0">16.0</option>
									  <option value="16.5">16.5</option>
									  <option value="17.0">17.0</option>
									  <option value="17.5">17.5</option>
									  <option value="18.0">18.0</option>
									  <option value="18.5">18.5</option>
									  <option value="19.0">19.0</option>
									  <option value="19.5">19.5</option>
									  <option value="20.0">20.0</option>
								</select>
						</div>
						</div>
					</div>
					<hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="p5_wewnetrzny"/>
							<div class="state p-primary">
								<label>ekran diodowy P5 wewnętrzny</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="p5_wewnetrzny_ilsoc"/></div>

						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="p3_wew"><div class="ilosc_media">ROZMIAR EKRANU</div>
							<select class="p5_wewnetrzny_szerokosc" name="p5_wewnetrzny_szerokosc">
									  <option value="brak"></option>
									  <option value="0.5">0.5</option>
									  <option value="1.0">1.0</option>
									  <option value="1.5">1.5</option>
									  <option value="2.0">2.0</option>
									  <option value="2.5">2.5</option>
									  <option value="3.0">3.0</option>
									  <option value="3.5">3.5</option>
									  <option value="4.0">4.0</option>
									  <option value="4.5">4.5</option>
									  <option value="5.0">5.0</option>
									  <option value="5.5">5.5</option>
									  <option value="6.0">6.0</option>
									  <option value="6.5">6.5</option>
									  <option value="7.0">7.0</option>
									  <option value="7.5">7.5</option>
									  <option value="8.0">8.0</option>
									  <option value="8.5">8.5</option>
									  <option value="9.0">9.0</option>
									  <option value="9.5">9.5</option>
									  <option value="10.0">10.0</option>
								</select>
								X
								<select class="p5_wewnetrzny_dlugosc" name="p5_wewnetrzny_dlugosc">
									  <option value="brak"></option>
									  <option value="0.5">0.5</option>
									  <option value="1.0">1.0</option>
									  <option value="1.5">1.5</option>
									  <option value="2.0">2.0</option>
									  <option value="2.5">2.5</option>
									  <option value="3.0">3.0</option>
									  <option value="3.5">3.5</option>
									  <option value="4.0">4.0</option>
									  <option value="4.5">4.5</option>
									  <option value="5.0">5.0</option>
									  <option value="5.5">5.5</option>
									  <option value="6.0">6.0</option>
									  <option value="6.5">6.5</option>
									  <option value="7.0">7.0</option>
									  <option value="7.5">7.5</option>
									  <option value="8.0">8.0</option>
									  <option value="8.5">8.5</option>
									  <option value="9.0">9.0</option>
									  <option value="9.5">9.5</option>
									  <option value="10.0">10.0</option>
									  <option value="10.5">10.5</option>
									  <option value="11.0">11.0</option>
									  <option value="11.5">11.5</option>
									  <option value="12.0">12.0</option>
									  <option value="12.5">12.5</option>
									  <option value="13.0">13.0</option>
									  <option value="13.5">13.5</option>
									  <option value="14.0">14.0</option>
									  <option value="14.5">14.5</option>
									  <option value="15.0">15.0</option>
									  <option value="15.5">15.5</option>
									  <option value="16.0">16.0</option>
									  <option value="16.5">16.5</option>
									  <option value="17.0">17.0</option>
									  <option value="17.5">17.5</option>
									  <option value="18.0">18.0</option>
									  <option value="18.5">18.5</option>
									  <option value="19.0">19.0</option>
									  <option value="19.5">19.5</option>
									  <option value="20.0">20.0</option>
								</select>
							</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="p5_zewnętrzny"/>
							<div class="state p-primary">
								<label>ekran diodowy P5 zewnętrzny</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="p5_zewnetrzny_ilsoc"/></div>

						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="p3_wew"><div class="ilosc_media">ROZMIAR EKRANU</div>
							<select class="p5_zewnetrzny_szerokosc" name="p5_zewnetrzny_szerokosc">
									  <option value="brak"></option>
									  <option value="0.5">0.5</option>
									  <option value="1.0">1.0</option>
									  <option value="1.5">1.5</option>
									  <option value="2.0">2.0</option>
									  <option value="2.5">2.5</option>
									  <option value="3.0">3.0</option>
									  <option value="3.5">3.5</option>
									  <option value="4.0">4.0</option>
									  <option value="4.5">4.5</option>
									  <option value="5.0">5.0</option>
									  <option value="5.5">5.5</option>
									  <option value="6.0">6.0</option>
									  <option value="6.5">6.5</option>
									  <option value="7.0">7.0</option>
									  <option value="7.5">7.5</option>
									  <option value="8.0">8.0</option>
									  <option value="8.5">8.5</option>
									  <option value="9.0">9.0</option>
									  <option value="9.5">9.5</option>
									  <option value="10.0">10.0</option>
								</select>
								X
								<select class="p5_zewnetrzny_dlugosc" name="p5_zewnetrzny_dlugosc">
									  <option value="brak"></option>
									  <option value="0.5">0.5</option>
									  <option value="1.0">1.0</option>
									  <option value="1.5">1.5</option>
									  <option value="2.0">2.0</option>
									  <option value="2.5">2.5</option>
									  <option value="3.0">3.0</option>
									  <option value="3.5">3.5</option>
									  <option value="4.0">4.0</option>
									  <option value="4.5">4.5</option>
									  <option value="5.0">5.0</option>
									  <option value="5.5">5.5</option>
									  <option value="6.0">6.0</option>
									  <option value="6.5">6.5</option>
									  <option value="7.0">7.0</option>
									  <option value="7.5">7.5</option>
									  <option value="8.0">8.0</option>
									  <option value="8.5">8.5</option>
									  <option value="9.0">9.0</option>
									  <option value="9.5">9.5</option>
									  <option value="10.0">10.0</option>
									  <option value="10.5">10.5</option>
									  <option value="11.0">11.0</option>
									  <option value="11.5">11.5</option>
									  <option value="12.0">12.0</option>
									  <option value="12.5">12.5</option>
									  <option value="13.0">13.0</option>
									  <option value="13.5">13.5</option>
									  <option value="14.0">14.0</option>
									  <option value="14.5">14.5</option>
									  <option value="15.0">15.0</option>
									  <option value="15.5">15.5</option>
									  <option value="16.0">16.0</option>
									  <option value="16.5">16.5</option>
									  <option value="17.0">17.0</option>
									  <option value="17.5">17.5</option>
									  <option value="18.0">18.0</option>
									  <option value="18.5">18.5</option>
									  <option value="19.0">19.0</option>
									  <option value="19.5">19.5</option>
									  <option value="20.0">20.0</option>
								</select>
							</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="lcd_led"/>
							<div class="state p-primary">
								<label>monitory LCD/LED</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="lcd_led_ilsoc"/></div>

						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="p3_wew"><div class="ilosc_media">ROZMIAR EKRANU</div>
							<select class="lcd_select" name="lcd_led_rozmiar">
									  <option value="brak"></option>
									  <option value="30">30"</option>
									  <option value="40">40"</option>
									  <option value="50">50"</option>
									  <option value="60">60"</option>
									  <option value="70">70"</option>
									  <option value="80">80"</option>
								</select>
							</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="projektor_standard"/>
							<div class="state p-primary">
								<label>projektor standardowej mocy</label>
							</div>
						</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="projektor_duzy"/>
							<div class="state p-primary">
								<label>projektor dużej mocy</label>
							</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="ekran_ramowy"/>
							<div class="state p-primary">
								<label>ekran ramowy tylna/przednia projekcja</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="ekran_ramowy_ilsoc"/></div>

						</div>
						<div class="col-sm-3 form_flex_column form_column_ilosc_mic">
							<div class="p3_wew"><div class="ilosc_media">ROZMIAR EKRANU</div>
							<select class="p3_wewnetrzny_szerokosc" name="ekran_ramowy_rozmiar">
									  <option value="brak"></option>
									  <option value="1.8x1.8 na statywie">1.8x1.8 na statywie</option>
									  <option value="2.0x2.0 na statywie">2.0x2.0 na statywie</option>
									  <option value="2.0x3.0 ramowy">2.0x3.0 ramowy</option>
									  <option value="3.0x3.0 ramowy">3.0x3.0 ramowy</option>
									  <option value="2.7ramowy">2.7x4.3 ramowy</option>
									  <option value="2.7x4.3 ramowy">5.0x3.0 ramowy</option>
									  <option value="6.0x4.0 ramowy">6.0x4.0 ramowy</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2 form_flex_column_symultana_opis screen">
							<div class="form_symultana_opis_3"><img src="img/i_ico.jpg" /></div><div class="form_symultana_opis_5">Większe ekrany przygotowujemy pod projekty, konstrukcja przygotowana jest na kratownicy o różnych rozmiarach</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="prompter"/>
							<div class="state p-primary">
								<label>prompter/podgląd dla prelegentów</label>
							</div>
						</div>
						</div>
						<div class="col-sm-2 form_flex_column form_column_ilosc_mic">
							<div class="form_ilosc"><div class="ilosc_media">ILOSC</div><input type="number" min="0" name="prompter_ilsoc"/></div>

						</div>
						<div class="col-sm-4 form_flex_column form_column_ilosc_mic">
							<div class="p3_wew"><div class="ilosc_media">ROZMIAR EKRANU</div>
							<select class="lcd_select" name="prompter_rozmiar">
									  <option value="brak"></option>
									  <option value="30">30"</option>
									  <option value="40">40"</option>
									  <option value="50">50"</option>
									  <option value="60">60"</option>
									  <option value="70">70"</option>
									  <option value="80">80"</option>
								</select>
							</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="mikser_obsluga"/>
							<div class="state p-primary">
								<label>mixer wizji/obsługa prezentacji</label>
							</div>
						</div>
						</div>
					</div><hr class="media">
					<div class="row">
						<div class="col-sm-5 form_flex_column">
						<div class="pretty p-default">
							<input type="checkbox" name="laptop"/>
							<div class="state p-primary">
								<label>laptop do obsługi prezentacji</label>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="form_naglowek_uwagi">UWAGI*</div>
				<textarea name="uwagi" id="messageInput" ></textarea>
				<div class="row_dane">
					<div class="row form_dane">
						<div class="col-sm-3">
						Imie*<br/>
							<input type="text" name="imie" id="imie"  />
						</div>
						<div class="col-sm-3">
						Nazwisko*<br/>
							<input type="text" name="nazwisko" id="nazwisko"  />
						</div>
						<div class="col-sm-3">
						Firma<br/>
							<input type="text" name="firma"/>
						</div>
					</div>
					<div class="row form_dane">
						<div class="col-sm-3">
						Numer telefonu*<br/>
							<input type="text" name="numer_telefonu" id="nr_telefonu"  />
						</div>
						<div class="col-sm-3">
						Adres e-mail*<br/>
							<input type="text" name="email" id="email"  />
						</div>
					</div>
				</div>
				<div class="wymagane">*pola wymagane</div>
				<input type="hidden" name="sesja" value="'<?php echo date('YmdHms'); ?>'">
				<input class="button_wyslij" id="submitButton" type="submit" name='btnSubmit' value="WYŚLIJ" />
			</form>
			<?php
			};
			?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }
</script>
<script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#start').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        onSelect: function () {
            var end = $('#end');
            var minDate = $(this).datepicker('getDate');
            end.datepicker('option', 'minDate', minDate);
        }
    });
		$('#end').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        onSelect: function () {
            var start = $('#start');
            var startDate = $('#end').datepicker('getDate');
            start.datepicker('option', 'maxDate', startDate);
        }
    });
    })
}
</script>
	<script>
	$(document).ready(function() {

		$('#start').on('change', function() {
			var poczatek = $(this).val();
			$('#end').attr('min',poczatek);
		});
		$('#end').on('change', function() {
			var koniec = $(this).val();
			$('#start').attr('max',koniec);
		});

	$('#aveq_form').submit(function(e){
    //e.preventDefault();

	var isValid = 1;
    var imie = $('#imie').val();
    var nazwisko = $('#nazwisko').val();
    var telefon = $('#nr_telefonu').val();
    var email = $('#email').val();
    var uwagi = $('#messageInput').val();
	   $(".error").remove();
	if (imie.length < 1) {
	  $('#imie').addClass('required');
	  $('.wymagane').addClass('wymagane_alert');
	  var isValid = 0;
    }
    if (nazwisko.length < 1) {
	  $('#nazwisko').addClass('required');
	  $('.wymagane').addClass('wymagane_alert');
	  isValid = 0;
    }
	if (telefon.length < 1) {
	  $('#nr_telefonu').addClass('required');
	  $('.wymagane').addClass('wymagane_alert');
	  isValid = 0;
    }
    if (email.length < 1) {
	  $('#email').addClass('required');
	  $('.wymagane').addClass('wymagane_alert');
	  isValid = 0;
    } else {
      var regEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $('#email').after('<span class="error">Wprowadź prawidłowy adres email</span>');
		$('.wymagane').addClass('wymagane_alert');
		isValid = 0;
      }
    }
	if (uwagi.length < 1) {
	  $('#messageInput').addClass('required');
	  $('.wymagane').addClass('wymagane_alert');
	  isValid = 0;
    }
    if(isValid==0) {
      e.preventDefault(); //prevent the default action
    }
	});
	});
	</script>
</body>
</html>
