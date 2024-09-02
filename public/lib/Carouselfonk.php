<?php
try {
    $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    die($e->getMessege());
}


class CarouselTema
{

    public $title, $metatitle, $metadesc, $metakey, $metaauthor, $metaowner, $metacopy, $logoyazisi, $twit, $face, $inst, $telefonno, $adres, $mailadres, $slogan, $referansbaslik, $filobaslik, $yorumbaslik, $iletisimbaslik, $hizmetlerbaslik, $haritabilgi, $footer;


    function __construct()
    {

        try {
            $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8", "root", "");
            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            die($e->getMessege());
        }

        $ayarcek = $baglanti->prepare("select * from ayarlar");
        $ayarcek->execute();
        $sorguson = $ayarcek->fetch();
        $this->title = $sorguson['title'];
        $this->metatitle = $sorguson['metatitle'];
        $this->metadesc = $sorguson['metadesc'];
        $this->metakey = $sorguson['metakey'];
        $this->metaauthor = $sorguson['metaauthor'];
        $this->metaowner = $sorguson['metaowner'];
        $this->metacopy = $sorguson['metacopy'];
        $this->logoyazisi = $sorguson['logoyazisi'];
        $this->twit = $sorguson['twit'];
        $this->face = $sorguson['face'];
        $this->inst = $sorguson['inst'];
        $this->telefonno = $sorguson['telefonno'];
        $this->adres = $sorguson['adres'];
        $this->mailadres = $sorguson['mailadres'];
        $this->slogan = $sorguson['slogan'];
        $this->referansbaslik = $sorguson['referansbaslik'];
        $this->filobaslik = $sorguson['filobaslik'];
        $this->yorumbaslik = $sorguson['yorumbaslik'];
        $this->iletisimbaslik = $sorguson['iletisimbaslik'];
        $this->hizmetlerbaslik = $sorguson['hizmetlerbaslik'];
        $this->haritabilgi = $sorguson['haritabilgi'];
        $this->footer = $sorguson['footer'];

    } // ayarlar geliyor


    function introbak($baglanti)
    {


        $introal = $baglanti->prepare("select * from intro");
        $introal->execute();

        $sayi = 0;

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            if ($sayi == 0):
                echo '<div class="carousel-item active" style="background-image: url(' . $sonucum["resimyol"] . ')"></div>';
                $sayi = 1;
            else:
                echo '<div class="carousel-item" style="background-image: url(' . $sonucum["resimyol"] . ')"></div>';

            endif;

        endwhile;


    } // intro


    function slidericon($baglanti)
    {
        $introal = $baglanti->prepare("select * from intro");
        $introal->execute();
        $verisayi = $introal->rowCount();

        for ($i = 0; $i < $verisayi; $i++) :

            if ($i == 0):
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>';

            else:

                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
            endif;

        endfor;


    } // slidericon


    function anasayfa($baglanti)
    {

        echo '
	<header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">';

        $this->slidericon($baglanti);

        echo '</ol>
        <div class="carousel-inner" role="listbox">';

        $this->introbak($baglanti);
        echo ' </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Geri</span>
        </a>
        
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">İleri</span>
        </a>
      </div>
    </header>
     
     <div class="container">
     
     	<div class="row mt-4">';

        $this->hizmetler($baglanti);
        echo '</div></div> ';

    }  // anasayfa


    function hakkimizda($baglanti)
    {

        $introal = $baglanti->prepare("select * from hakkimizda");
        $introal->execute();

        $sonucum = $introal->fetch();

        echo '<div class="container" style="min-height:75vh">
    
    	<h4 class="mt-4 mb-3 hetiketRenk">Hakkımızda</h4><hr>       
       
         <div class="row">
         
         <div class="col-lg-6 ">
         		<img class="img-fluid rounded mb-4" src="' . $sonucum["resim"] . '"  alt=""/>  
            </div> 
            
            <div class="col-lg-6">
         		<h2>' . $sonucum["baslik"] . '</h2>
                <p>' . $sonucum["icerik"] . '</p>
            </div>      
            
        </div>
    </div>
   ';


    } // hakkimizda bölümü


    function hizmetler($baglanti, $tercih = 0)
    {

        $introal = $baglanti->prepare("select * from hizmetler");
        $introal->execute();

        echo ' <div class="container" style="min-height:75vh"><h4 class="mt-4 mb-3 hetiketRenk">' . $this->hizmetlerbaslik . '</h4><hr>';
        /*
        if ($tercih==1):
        echo '<ol class="breadcrumb breadcrumbRenk">
            <li class="breadcrumb-item"><a href="index" class="breadcrumLink">Anasayfa</a></li>
             <li class="breadcrumb-item"><a href="hizmetlerimiz.html" class="breadcrumLink">Hizmetlerimiz</a></li>

             </ol>';

        endif;
         */

        echo '<div class="row mt-4">	';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4 mb-4">
                	<div class="card h-100">
                    	<h4 class="card-header"><i class="fas fa-bookmark hetiketRenk mr-1"></i>' . $sonucum["baslik"] . '</h4>
                        <div class="card-body">
                        <p class="card-text">
                        ' . $sonucum["icerik"] . '</p>
                        </div>
                       </div>
                       </div> ';

        endwhile;

        echo '</div></div> ';


    } // hizmetler bölümü


    function referans($baglanti)
    {

        $introal = $baglanti->prepare("select * from referanslar");
        $introal->execute();

        echo ' <div class="container">		   
       
		<h4 class="mt-4 mb-3 hetiketRenk" >' . $this->referansbaslik . '</h4><hr>
		      
     	<div class="row mt-4">	';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-2 m-3 p-2 bg-white border rounded"><img src="' . $sonucum["resimyol"] . '" alt="Referans-' . $sonucum["id"] . '" class="col-lg-12" /></div> ';

        endwhile;

        echo '</div></div> ';


    }  // referanslar


    function filomuz($baglanti)
    {

        $introal = $baglanti->prepare("select * from filomuz");
        $introal->execute();

        echo ' <div class="container">
	
		<h4 class="mt-4 mb-3 hetiketRenk">' . $this->filobaslik . '</h4><hr>		 
		      
     	<div class="row mt-4">	';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4 mb-4">
                	<div class="card h-100 border-0">
					
                     <img src="' . $sonucum["resimyol"] . '" alt="Referans-' . $sonucum["id"] . '"  class="img-responsive col-lg-12"/>
						
                     </div>
       </div> ';

        endwhile;

        echo '</div></div> ';


    } // filomuz


    function yorumlar($baglanti)
    {

        $introal = $baglanti->prepare("select * from yorumlar");
        $introal->execute();

        echo ' <div class="container ">
	
		<h4 class="mt-4 mb-3 hetiketRenk" >' . $this->yorumbaslik . '</h4><hr>		 
		      
     	<div class="row mt-4">	';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4 text-center mt-1 ">
		 		<div class="row">
						<div class="col-lg-12">
								<div class="row  border p-3 m-2 bg-white">
								
								<div class="col-lg-12 border-bottom mb-1">
							' . $sonucum["icerik"] . '
						</div>	
						
						<div class="col-lg-12 font-weight-bold">
		
				Müşterimiz : <span class="hetiketRenk">' . $sonucum["isim"] . '</span>
						</div>						
					</div>						
			</div>		
				</div>
		 </div> ';

        endwhile;

        echo '</div></div>';


    } // yorumlar


    function iletisimform()
    {

        echo '<div class="container" style="min-height:60vh">
    
    	<h4 class="mt-4 mb-3 hetiketRenk">' . $this->iletisimbaslik . '</h4>    <hr>    
             
         <div class="row">
         
         <div class="col-lg-6">
         		<iframe src="' . $this->haritabilgi . '" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div> 
            
            <div class="col-lg-6">
         		 <p class="font-weight-bold hetiketRenk">Adresimiz</p>
         <address class="font-italic">' . $this->adres . '</address>
		 <hr>
		  <p class="font-weight-bold hetiketRenk">Telefon Numaramız</p>
         <p class="font-italic"><a href="tel:' . $this->telefonno . '" class="breadcrumLink">' . $this->telefonno . '</a></p>
		 <hr>
		   <p class="font-weight-bold hetiketRenk">Mail</p>
         <p class="font-italic"><a href="mailto:' . $this->mailadres . '" class="breadcrumLink">' . $this->mailadres . '</a></p>
		 		 
            </div>               
        </div>
    </div>

<div class="container mt-2 mb-2">
<div class="form">

<div id="mesajsonuc"></div>

<div id="formtutucu">

<form id="mailform">

<div class="form-row">

<div class="form-group col-md-6">
<input type="text" name="isim" class="form-control" placeholder="Adınız" required="required" />

</div>

<div class="form-group col-md-6">
<input type="text" name="mail" class="form-control" placeholder="Mail Adresiniz" required="required" />

</div>
</div>

<div class="form-group">
<input type="text" name="konu" class="form-control" placeholder="Mesaj Konusu" required="required" />
</div>

<div class="form-group">
<textarea class="form-control" name="mesaj" rows="5"></textarea>
</div>

<div class="text-center"><input type="button"  value="Gönder" id="gonderbtn" class="btn iletformbtn"/></div>

</form>
</div>

</div>
</div>';
    }


    function ContentKontrol($baglanti, $sayfa)
    {
        switch (@$sayfa):

            case "1":
                $this->hakkimizda($baglanti);
                break;
            case "2":
                $this->hizmetler($baglanti, 1);

                break;
            case "3":
                $this->filomuz($baglanti);
                break;
            case "4":
                $this->iletisimform();
                break;
            case "5":
                $this->referans($baglanti);
                $this->yorumlar($baglanti);
                break;

            default:
                $this->anasayfa($baglanti);

        endswitch;
    }


}
