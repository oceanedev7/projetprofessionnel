@extends('layouts.cgv')

@section ('titre')

<div class="flex flex-col ">
<h1 class=" ml-36 mt-56 text-6xl text-white font-bold"> MENTIONS <br/> LÉGALES </h1>
<hr class="border-t-4 border-custom-beige w-32 relative top-4 left-36">
</div>
@endsection



    @section('main')
    <div style="background-color:#F9F4EE" class="w-full">
        <div class="ml-44 mr-44 text-justify p-10">
            <h3 class="text-custom-vert font-bold text-xl">1- Propriétaire du site :</h3> 
            <br/>
            <p>
                Tout Là-Haut<br />
                Adresse : Route de Jolimont, 97226 Morne-Vert<br />
                Téléphone : 0596 67 64 53<br />
                Email : contact@toutlahaut.org
            </p>
            <br/>


            <h3 class="text-custom-vert font-bold text-xl">2- Responsable de la publication :</h3>
            <br/>
            <p>
                Agence de Communication "CréaWeb"<br />
                Adresse : 123 Avenue des Créateurs, Ville, Pays<br />
                Téléphone : +123456789<br />
                Email : contact@creaweb.com
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">3- Hébergeur :</h3>
            <br/>
            <p>
                Nom de l'hébergeur : Exemple<br />
                Adresse de l'hébergeur : 123 Rue de l'Hébergement, Ville, Pays<br />
                Téléphone de l'hébergeur : +123456789<br />
                Email de l'hébergeur : support@exemple.com
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">4- Protection des données personnelles :</h3>
            <br/>
            <p>
                Conformément à la loi informatique et libertés du 6 janvier 1978 modifiée et au Règlement Général sur la Protection des Données (RGPD), vous disposez d'un droit d'accès, de rectification, de suppression et de portabilité des données vous concernant. Pour exercer ce droit, veuillez nous contacter à l'adresse contact@toutlahaut.org. Les données collectées sur ce site sont destinées à un usage interne et ne seront en aucun cas cédées à des tiers.
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">5- Droits d'auteur :</h3>
            <br/>
            <p>
                L'ensemble des contenus présents sur le site Tout Là-Haut (textes, photographies, vidéos, etc.) sont protégés par les dispositions du Code de la Propriété Intellectuelle. Toute reproduction, même partielle, est strictement interdite sans autorisation préalable de Tout Là-Haut.
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">6- Liens hypertextes :</h3>
            <br/>
            <p>
                Les liens hypertextes présents sur le site Tout Là-Haut et orientant les utilisateurs vers d'autres sites internet n'engagent pas la responsabilité de Tout Là-Haut quant au contenu de ces sites.
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">7- Cookies :</h3>
            <br/>
            <p>
                Le site Tout Là-Haut peut être amené à vous demander l'acceptation des cookies à des fins de statistiques et d'amélioration de l'expérience utilisateur. Vous pouvez à tout moment modifier vos préférences en matière de cookies via les réglages de votre navigateur.
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">8- Crédits :</h3>
            <br/>
            <p>
                Conception et réalisation du site : Agence de Communication "CréaWeb"<br />
                Crédits photographiques : Les photographies utilisées sur le site sont fournies par John Doe Photography.
            </p>
            <br/>
        </div>
    </div>
@endsection

