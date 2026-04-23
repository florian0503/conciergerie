<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Avis;
use App\Entity\FaqItem;
use App\Entity\Logement;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadUser($manager);
        $this->loadLogements($manager);
        $this->loadArticles($manager);
        $this->loadFaq($manager);
        $this->loadAvis($manager);

        $manager->flush();
    }

    private function loadUser(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@maisonmathis.fr');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->hasher->hashPassword($user, 'admin1234'));
        $manager->persist($user);
    }

    private function loadLogements(ObjectManager $manager): void
    {
        $logements = [
            [
                'slug'          => 'le-presquile',
                'nom'           => 'Le Presqu\'île',
                'type'          => 'Appartement',
                'quartier'      => 'Presqu\'île',
                'voyageurs'     => 6,
                'chambres'      => 3,
                'note'          => 4.97,
                'avis'          => 142,
                'occupation'    => 91,
                'revenus'       => '3 800',
                'imgIndex'      => 1,
                'photos'        => [
                    'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1400&q=80',
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
                    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&q=80',
                    'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=800&q=80',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800&q=80',
                ],
                'description'   => 'Un appartement haussmannien lumineux au cœur de la Presqu\'île, à deux pas de la place Bellecour. Parquet massif, hauteur sous plafond de 3,20 m, cuisine équipée ouverte sur le salon.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Climatisation', 'Parking à proximité', 'Terrasse', 'Baby-foot', 'Cafetière Nespresso'],
                'pointsInteret' => ['Place Bellecour — 3 min à pied', 'Vieux Lyon — 10 min à pied', 'Gare Part-Dieu — 20 min à pied', 'Marché Saint-Antoine — 5 min'],
            ],
            [
                'slug'          => 'haut-pave',
                'nom'           => 'Haut-Pavé',
                'type'          => 'Duplex',
                'quartier'      => 'Vieux Lyon',
                'voyageurs'     => 4,
                'chambres'      => 3,
                'note'          => 4.93,
                'avis'          => 89,
                'occupation'    => 88,
                'revenus'       => '2 900',
                'imgIndex'      => 2,
                'photos'        => [
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1400&q=80',
                    'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=800&q=80',
                    'https://images.unsplash.com/photo-1540518614846-7eded433c457?w=800&q=80',
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800&q=80',
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=80',
                ],
                'description'   => 'Un duplex de caractère niché dans une traboule du Vieux Lyon, classé au patrimoine mondial de l\'UNESCO. Pierres apparentes, poutres anciennes et vue sur les toits lyonnais.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Vue panoramique', 'Cafetière Nespresso', 'Linge de maison inclus', 'Accueil personnalisé'],
                'pointsInteret' => ['Traboules — sur place', 'Basilique Fourvière — 15 min à pied', 'Musée Gadagne — 5 min', 'Quais de Saône — 3 min'],
            ],
            [
                'slug'          => 'atelier-croix-rousse',
                'nom'           => 'Atelier Croix-Rousse',
                'type'          => 'Loft',
                'quartier'      => 'Croix-Rousse',
                'voyageurs'     => 2,
                'chambres'      => 1,
                'note'          => 4.98,
                'avis'          => 213,
                'occupation'    => 94,
                'revenus'       => '3 200',
                'imgIndex'      => 3,
                'photos'        => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1400&q=80',
                    'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=800&q=80',
                    'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80',
                    'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=800&q=80',
                    'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&q=80',
                ],
                'description'   => 'Un loft d\'artiste dans un ancien atelier de canuts, avec verrière industrielle et mezzanine. Esprit bohème et matériaux nobles se mêlent dans cet appartement unique en son genre.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine ouverte', 'Lave-linge', 'Vélos disponibles', 'Terrasse sur toit', 'Cafetière Nespresso', 'Vinyle & platine'],
                'pointsInteret' => ['Marché de la Croix-Rousse — 5 min', 'Boulevard de la Croix-Rousse — 2 min', 'Pentes — 10 min à pied', 'Parc de la Tête d\'Or — 25 min'],
            ],
            [
                'slug'          => 'soierie-confluence',
                'nom'           => 'Soierie Confluence',
                'type'          => 'Maison',
                'quartier'      => 'Confluence',
                'voyageurs'     => 8,
                'chambres'      => 3,
                'note'          => 4.89,
                'avis'          => 67,
                'occupation'    => 82,
                'revenus'       => '5 400',
                'imgIndex'      => 4,
                'photos'        => [
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=1400&q=80',
                    'https://images.unsplash.com/photo-1523217582562-09d0def993a6?w=800&q=80',
                    'https://images.unsplash.com/photo-1560185893-a55cbc8c57e8?w=800&q=80',
                    'https://images.unsplash.com/photo-1571939228382-b2f2b585ce15?w=800&q=80',
                    'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=800&q=80',
                ],
                'description'   => 'Une maison de ville contemporaine dans le quartier tendance de la Confluence. Architecture audacieuse, grandes baies vitrées et jardin privatif. À deux pas du Musée des Confluences.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine professionnelle', 'Lave-linge & sèche-linge', 'Jardin privatif', 'Barbecue', 'Parking privé', 'Climatisation', 'Piscine chauffée'],
                'pointsInteret' => ['Musée des Confluences — 8 min à pied', 'Centre commercial Confluence — 5 min', 'Quais de Saône — 10 min', 'Tram T1 — 3 min'],
            ],
            [
                'slug'          => 'rive-de-saone',
                'nom'           => 'Rive de Saône',
                'type'          => 'Appartement',
                'quartier'      => 'Vieux Lyon',
                'voyageurs'     => 8,
                'chambres'      => 3,
                'note'          => 4.85,
                'avis'          => 104,
                'occupation'    => 85,
                'revenus'       => '4 100',
                'imgIndex'      => 5,
                'photos'        => [
                    'https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=1400&q=80',
                    'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=800&q=80',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                    'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800&q=80',
                    'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&q=80',
                ],
                'description'   => 'Un grand appartement avec vue directe sur la Saône et les quais de Saint-Vincent. Séjour spacieux, trois chambres indépendantes et une terrasse face à l\'eau.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Terrasse avec vue', 'Climatisation', 'Cafetière Nespresso', 'Linge de maison inclus'],
                'pointsInteret' => ['Quais de Saône — vue directe', 'Vieux Lyon — 5 min', 'Marché quai Saint-Antoine — 8 min', 'Métro D Bellecour — 12 min'],
            ],
            [
                'slug'          => 'terreaux-haussmann',
                'nom'           => 'Terreaux Haussmann',
                'type'          => 'Appartement',
                'quartier'      => 'Terreaux',
                'voyageurs'     => 5,
                'chambres'      => 2,
                'note'          => 4.93,
                'avis'          => 156,
                'occupation'    => 89,
                'revenus'       => '3 500',
                'imgIndex'      => 6,
                'photos'        => [
                    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1400&q=80',
                    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&q=80',
                    'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=800&q=80',
                    'https://images.unsplash.com/photo-1565183997392-2f6f122e5912?w=800&q=80',
                    'https://images.unsplash.com/photo-1584622781564-1d987f7333c1?w=800&q=80',
                ],
                'description'   => 'Un appartement bourgeois au cœur du quartier des Terreaux, entre la place de la République et le Musée des Beaux-Arts. Moulures, cheminée d\'époque et parquet Versailles.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Cheminée décorative', 'Climatisation', 'Cafetière Nespresso', 'Piano droit'],
                'pointsInteret' => ['Place des Terreaux — 2 min', 'Musée des Beaux-Arts — 3 min', 'Opéra de Lyon — 5 min', 'Métro A Hôtel de Ville — 4 min'],
            ],
            [
                'slug'          => 'villa-monts-dor',
                'nom'           => 'Villa des Monts d\'Or',
                'type'          => 'Villa',
                'quartier'      => 'Monts d\'Or',
                'voyageurs'     => 10,
                'chambres'      => 4,
                'note'          => 4.96,
                'avis'          => 48,
                'occupation'    => 78,
                'revenus'       => '8 200',
                'imgIndex'      => 7,
                'photos'        => [
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=1400&q=80',
                    'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=800&q=80',
                    'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800&q=80',
                    'https://images.unsplash.com/photo-1560185893-a55cbc8c57e8?w=800&q=80',
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&q=80',
                ],
                'description'   => 'Une villa d\'exception dans les Monts d\'Or avec piscine à débordement et vue sur la vallée de la Saône. Cinq hectares de parc arboré, salle de cinéma, cave à vin et court de pétanque.',
                'equipements'   => ['Wi-Fi fibre', 'Cuisine professionnelle', 'Piscine à débordement', 'Salle de cinéma', 'Cave à vin', 'Court de pétanque', 'Parking 6 voitures', 'Concierge sur place'],
                'pointsInteret' => ['Neuville-sur-Saône — 10 min', 'Centre de Lyon — 30 min en voiture', 'Randonnées Monts d\'Or — départ direct', 'Gare TGV — 35 min'],
            ],
            [
                'slug'          => 'studio-part-dieu',
                'nom'           => 'Studio Part-Dieu',
                'type'          => 'Studio',
                'quartier'      => 'Part-Dieu',
                'voyageurs'     => 2,
                'chambres'      => 1,
                'note'          => 4.91,
                'avis'          => 201,
                'occupation'    => 93,
                'revenus'       => '1 900',
                'imgIndex'      => 8,
                'photos'        => [
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1400&q=80',
                    'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?w=800&q=80',
                    'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=800&q=80',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800&q=80',
                    'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80',
                ],
                'description'   => 'Un studio design et fonctionnel idéalement situé à 300 m de la gare Part-Dieu. Parfait pour les voyageurs d\'affaires ou les week-ends en couple. Tout le confort dans un espace optimisé avec goût.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Smart TV', 'Cafetière Nespresso', 'Linge de maison inclus', 'Check-in autonome 24h/24'],
                'pointsInteret' => ['Gare Part-Dieu — 3 min à pied', 'Centre commercial Part-Dieu — 5 min', 'Métro B Part-Dieu — 2 min', 'Bellecour — 15 min en métro'],
            ],
        ];

        foreach ($logements as $data) {
            $logement = new Logement();
            $logement->setSlug($data['slug']);
            $logement->setNom($data['nom']);
            $logement->setType($data['type']);
            $logement->setQuartier($data['quartier']);
            $logement->setVoyageurs($data['voyageurs']);
            $logement->setChambres($data['chambres']);
            $logement->setNote($data['note']);
            $logement->setAvis($data['avis']);
            $logement->setOccupation($data['occupation']);
            $logement->setRevenus($data['revenus']);
            $logement->setImgIndex($data['imgIndex']);
            $logement->setPhotos($data['photos']);
            $logement->setDescription($data['description']);
            $logement->setEquipements($data['equipements']);
            $logement->setPointsInteret($data['pointsInteret']);
            $manager->persist($logement);
        }
    }

    private function loadArticles(ObjectManager $manager): void
    {
        $articles = [
            [
                'slug'    => 'comment-augmenter-revenus-airbnb',
                'tag'     => 'À la une',
                'title'   => 'Comment augmenter ses revenus Airbnb de +34 % à Lyon en 3 mois',
                'excerpt' => 'Tarification dynamique, optimisation des annonces, gestion des délais de réponse : les leviers concrets que nous actionnons pour chacun de nos propriétaires, avec les chiffres à l\'appui.',
                'author'  => 'Sierra Mathis',
                'date'    => '12 avril 2026',
                'read'    => '8 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'Quand un propriétaire nous confie son bien, la première question est toujours la même : "Combien vais-je gagner de plus ?" La réponse honnête : ça dépend. Mais en moyenne, nos propriétaires observent une hausse de 34 % de leurs revenus dans les trois premiers mois. Voici comment.'],
                    ['type' => 'h2', 'text' => '1. La tarification dynamique, levier n°1'],
                    ['type' => 'p', 'text' => 'La plupart des propriétaires fixent un prix et l\'oublient. C\'est la première erreur. À Lyon, les événements — Sirha, Nuits de Fourvière, Biennale, matchs de foot — font exploser la demande certains week-ends.'],
                    ['type' => 'h2', 'text' => '2. Des annonces qui convertissent'],
                    ['type' => 'p', 'text' => 'Le titre, les photos, l\'ordre des images, la description : tout est optimisé pour le référencement Airbnb et la conversion.'],
                    ['type' => 'h2', 'text' => '3. La réactivité comme avantage concurrentiel'],
                    ['type' => 'p', 'text' => 'Notre temps de réponse moyen est de 15 minutes, 7j/7. Cela améliore le classement de l\'annonce et rassure les voyageurs hésitants.'],
                ],
            ],
            [
                'slug'    => 'micro-bic-ou-regime-reel',
                'tag'     => 'Fiscalité',
                'title'   => 'Micro-BIC ou régime réel : quel régime fiscal choisir pour votre location meublée ?',
                'excerpt' => 'Seuils, abattements, charges déductibles — un comparatif clair pour optimiser votre imposition sans vous noyer dans le jargon comptable.',
                'author'  => 'Sierra Mathis',
                'date'    => '8 avril 2026',
                'read'    => '6 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'Vous louez votre appartement en courte durée et vous vous demandez comment déclarer vos revenus ? Deux régimes s\'offrent à vous.'],
                    ['type' => 'h2', 'text' => 'Le micro-BIC : simple mais limité'],
                    ['type' => 'p', 'text' => 'Le micro-BIC s\'applique automatiquement si vos revenus annuels ne dépassent pas 77 700 €. Il vous accorde un abattement forfaitaire de 50 %.'],
                    ['type' => 'h2', 'text' => 'Le régime réel : plus complexe, souvent plus rentable'],
                    ['type' => 'p', 'text' => 'Au régime réel, vous déduisez toutes vos charges réelles : intérêts d\'emprunt, charges de copropriété, assurances, amortissement du bien.'],
                ],
            ],
            [
                'slug'    => 'tarification-dynamique',
                'tag'     => 'Stratégie',
                'title'   => 'Tarification dynamique : pourquoi fixer un prix fixe vous coûte cher',
                'excerpt' => 'Les événements lyonnais, la saisonnalité, la concurrence locale : autant de variables qui font varier la demande — et que votre prix doit refléter.',
                'author'  => 'Marc Duval',
                'date'    => '1 avril 2026',
                'read'    => '5 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'Un prix fixe, c\'est pratique. Mais c\'est aussi la façon la plus sûre de laisser de l\'argent sur la table — ou de rester vide quand la demande chute.'],
                    ['type' => 'h2', 'text' => 'La demande fluctue, votre prix aussi devrait'],
                    ['type' => 'p', 'text' => 'À Lyon, la demande varie considérablement selon la saison, les événements professionnels, culturels et même les jours de la semaine.'],
                ],
            ],
            [
                'slug'    => 'reglementation-location-courte-duree-lyon-2026',
                'tag'     => 'Réglementation',
                'title'   => 'Location courte durée à Lyon : ce que dit la loi en 2026',
                'excerpt' => 'Numéro d\'enregistrement, plafond de 120 nuits, règlement de copropriété : le point complet sur les obligations légales des propriétaires lyonnais.',
                'author'  => 'Sierra Mathis',
                'date'    => '22 mars 2026',
                'read'    => '7 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'La réglementation autour de la location courte durée s\'est durcie ces dernières années, et Lyon ne fait pas exception.'],
                    ['type' => 'h2', 'text' => 'Le numéro d\'enregistrement en mairie'],
                    ['type' => 'p', 'text' => 'Depuis 2019, toute location courte durée à Lyon doit faire l\'objet d\'une déclaration en mairie. Numéro obligatoire sur toutes vos annonces. Amende de 5 000 € en cas d\'absence.'],
                    ['type' => 'h2', 'text' => 'Le plafond de 120 nuits pour la résidence principale'],
                    ['type' => 'p', 'text' => 'Si vous louez votre résidence principale, vous êtes limité à 120 nuits par an.'],
                ],
            ],
            [
                'slug'    => '5-ajustements-deco',
                'tag'     => 'Mise en scène',
                'title'   => '5 ajustements déco qui font passer votre note de 4.6 à 4.9',
                'excerpt' => 'Lumière, literie, équipements cuisine : les retours les plus fréquents dans les avis voyageurs, et comment les corriger rapidement et sans budget.',
                'author'  => 'Léa Bernard',
                'date'    => '14 mars 2026',
                'read'    => '4 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'La différence entre un 4.6 et un 4.9 se joue souvent sur des détails.'],
                    ['type' => 'h2', 'text' => '1. La literie'],
                    ['type' => 'p', 'text' => 'C\'est le point n°1 des avis négatifs. Un matelas inconfortable ou des oreillers bas de gamme suffisent à plomber une note.'],
                    ['type' => 'h2', 'text' => '2. L\'éclairage'],
                    ['type' => 'p', 'text' => 'Une lumière froide et unique au plafond donne une ambiance cave. Ajoutez des lampes d\'appoint, optez pour des ampoules à 2700K.'],
                ],
            ],
            [
                'slug'    => 'gerer-airbnb-a-distance',
                'tag'     => 'Gestion',
                'title'   => 'Gérer un Airbnb à distance : ce que les propriétaires sous-estiment toujours',
                'excerpt' => 'Expatriés, investisseurs parisiens, propriétaires en déplacement : les pièges que nous voyons revenir, et pourquoi une conciergerie locale change tout.',
                'author'  => 'Thomas Renard',
                'date'    => '5 mars 2026',
                'read'    => '6 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'Beaucoup de propriétaires pensent qu\'avec les bons outils numériques, gérer un Airbnb à distance est simple. C\'est vrai... jusqu\'au premier imprévu.'],
                    ['type' => 'h2', 'text' => 'Les outils ne remplacent pas une présence locale'],
                    ['type' => 'p', 'text' => 'Quand le lave-linge tombe en panne à 18h un vendredi, quand un voyageur perd ses clés à 23h — aucun outil ne remplace quelqu\'un sur place.'],
                ],
            ],
            [
                'slug'    => 'meilleur-quartier-lyon-airbnb-2026',
                'tag'     => 'Marché',
                'title'   => 'Quel quartier de Lyon offre le meilleur rendement Airbnb en 2026 ?',
                'excerpt' => 'Presqu\'île, Vieux Lyon, Croix-Rousse, Confluence : analyse des taux d\'occupation, prix moyens et saisonnalité par quartier.',
                'author'  => 'Marc Duval',
                'date'    => '20 février 2026',
                'read'    => '9 min de lecture',
                'img'     => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=1200&q=80',
                'content' => [
                    ['type' => 'lead', 'text' => 'Tous les quartiers de Lyon ne se valent pas sur Airbnb. Voici notre analyse basée sur notre portefeuille de 120 biens.'],
                    ['type' => 'h2', 'text' => 'Presqu\'île — le plus demandé'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 82 %. Prix moyen par nuit : 95 €.'],
                    ['type' => 'h2', 'text' => 'Vieux Lyon — le charme qui se paie'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 78 %. Prix moyen par nuit : 110 €.'],
                    ['type' => 'h2', 'text' => 'Croix-Rousse — la montée en puissance'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 74 %. Prix moyen par nuit : 82 €.'],
                ],
            ],
        ];

        foreach ($articles as $data) {
            $article = new Article();
            $article->setSlug($data['slug']);
            $article->setTag($data['tag']);
            $article->setTitle($data['title']);
            $article->setExcerpt($data['excerpt']);
            $article->setAuthor($data['author']);
            $article->setDate($data['date']);
            $article->setReadTime($data['read']);
            $article->setImg($data['img']);
            $article->setContent($data['content']);
            $manager->persist($article);
        }
    }

    private function loadFaq(ObjectManager $manager): void
    {
        $items = [
            // Général
            ['categorie' => 'general', 'position' => 1, 'question' => 'Comment fonctionne Maison Mathis concrètement ?', 'reponse' => "Maison Mathis prend en charge l'intégralité de la gestion de votre location courte durée : création et optimisation de vos annonces, communication avec les voyageurs, gestion des arrivées et départs, ménage et linge, suivi qualité et optimisation des revenus.\n\nVous signez un mandat de gestion, nous faisons tout le reste. Vous recevez un reporting mensuel et votre virement — c'est tout."],
            ['categorie' => 'general', 'position' => 2, 'question' => 'Quels types de biens gérez-vous ?', 'reponse' => "Nous gérons tout type de bien situé à Lyon et dans ses proches environs : studios, appartements, maisons, duplex, lofts. Nous n'avons pas de surface minimum, mais nous sélectionnons les biens selon leur potentiel locatif et leur adéquation avec notre positionnement premium."],
            ['categorie' => 'general', 'position' => 3, 'question' => 'Sur quelles plateformes publiez-vous les annonces ?', 'reponse' => "Principalement Airbnb et Booking.com, qui représentent la grande majorité des réservations courte durée à Lyon. Selon votre bien, nous pouvons également publier sur Vrbo, Abritel ou d'autres plateformes spécialisées.\n\nTous les calendriers sont synchronisés automatiquement pour éviter les doublons."],
            ['categorie' => 'general', 'position' => 4, 'question' => 'Combien de biens gérez-vous actuellement ?', 'reponse' => "Nous gérons plus de 120 biens à Lyon et dans les Monts d'Or. Nous faisons le choix de ne pas grossir trop vite : chaque nouveau bien est accepté uniquement si nous sommes certains de maintenir notre niveau de service."],
            ['categorie' => 'general', 'position' => 5, 'question' => 'Que se passe-t-il en cas de problème avec un voyageur ?', 'reponse' => "Nous gérons tous les litiges directement avec les voyageurs et les plateformes. En cas de dégât, nous activons les garanties Airbnb (AirCover) et/ou votre assurance propriétaire, dont nous coordonnons les démarches.\n\nVous êtes informé à chaque étape mais n'avez rien à gérer de votre côté."],
            // Tarifs
            ['categorie' => 'tarifs', 'position' => 1, 'question' => 'Quel est votre mode de rémunération ?', 'reponse' => "Nous prélevons une commission unique de 18 % sur le chiffre d'affaires brut encaissé. Aucun abonnement mensuel, aucun frais fixe, aucune pénalité de sortie.\n\nNous ne gagnons que lorsque vous gagnez : si votre bien est inoccupé, nous ne vous facturons rien."],
            ['categorie' => 'tarifs', 'position' => 2, 'question' => 'Y a-t-il des frais cachés ?', 'reponse' => "Non. Les 18 % incluent l'intégralité de nos prestations : création des annonces, photos, communication voyageurs, check-in/out, suivi qualité, optimisation des prix et reporting mensuel.\n\nLes seuls frais annexes sont les frais de ménage, qui sont payés directement par le voyageur via la plateforme."],
            ['categorie' => 'tarifs', 'position' => 3, 'question' => 'Quand et comment reçois-je mes revenus ?', 'reponse' => "Les plateformes (Airbnb, Booking) virent directement les revenus sur votre compte bancaire, selon leurs propres délais. Nous prélevons notre commission en fin de mois via prélèvement automatique.\n\nVous recevez un récapitulatif détaillé chaque mois : réservations, revenus bruts, commission, net perçu."],
            ['categorie' => 'tarifs', 'position' => 4, 'question' => 'Proposez-vous un tarif dégressif pour plusieurs biens ?', 'reponse' => 'Oui. Si vous possédez plusieurs biens, nous étudions une commission adaptée à votre situation lors de notre premier échange. Contactez-nous pour en discuter.'],
            // Ménage
            ['categorie' => 'menage', 'position' => 1, 'question' => 'Qui s\'occupe du ménage entre les séjours ?', 'reponse' => "Nous coordonnons des prestataires ménage certifiés et formés aux standards hôteliers. Chaque rotation fait l'objet d'un contrôle qualité avec photos avant/après.\n\nLe linge plat (draps, serviettes) est fourni et lavé par un prestataire spécialisé — qualité hôtel, livré à chaque rotation."],
            ['categorie' => 'menage', 'position' => 2, 'question' => 'Qui paie les frais de ménage ?', 'reponse' => "Les frais de ménage sont payés par le voyageur au moment de sa réservation. Ils apparaissent comme ligne séparée sur la plateforme et sont reversés intégralement au prestataire. Vous n'avancez rien et ne supportez aucun coût de ménage."],
            ['categorie' => 'menage', 'position' => 3, 'question' => 'Que se passe-t-il si le ménage est mal fait ?', 'reponse' => "Un contrôle systématique est effectué après chaque ménage. Si un problème est constaté, une intervention corrective est organisée avant l'arrivée du voyageur suivant — sans frais supplémentaire pour vous."],
            // Contrat
            ['categorie' => 'contrat', 'position' => 1, 'question' => 'Quelle est la durée d\'engagement ?', 'reponse' => 'Le mandat de gestion est sans durée minimale. Vous pouvez mettre fin à la collaboration à tout moment, avec un préavis de 30 jours. Aucune pénalité, aucun frais de sortie.'],
            ['categorie' => 'contrat', 'position' => 2, 'question' => 'Puis-je récupérer mon bien quand je veux ?', 'reponse' => "Oui. Vous pouvez bloquer des dates dans le calendrier pour votre usage personnel à tout moment. Pour une reprise complète du bien, le préavis de 30 jours s'applique, le temps que nous gérions les réservations déjà confirmées."],
            ['categorie' => 'contrat', 'position' => 3, 'question' => 'Que contient le mandat de gestion ?', 'reponse' => 'Le mandat détaille : la liste des services inclus, le taux de commission, les modalités de reporting, les conditions de résiliation et les responsabilités de chaque partie. Il est rédigé en français, sans jargon juridique inutile.'],
            ['categorie' => 'contrat', 'position' => 4, 'question' => 'Dois-je déclarer mes revenus locatifs ?', 'reponse' => 'Oui. Les revenus issus de la location meublée courte durée sont imposables (régime micro-BIC ou réel). Notre reporting mensuel vous fournit tous les chiffres nécessaires pour votre déclaration. Nous vous recommandons de consulter un expert-comptable spécialisé en location meublée.'],
        ];

        foreach ($items as $data) {
            $faq = new FaqItem();
            $faq->setCategorie($data['categorie']);
            $faq->setPosition($data['position']);
            $faq->setQuestion($data['question']);
            $faq->setReponse($data['reponse']);
            $manager->persist($faq);
        }
    }

    private function loadAvis(ObjectManager $manager): void
    {
        $avisList = [
            [
                'nom'          => 'Claire B.',
                'role'         => 'Propriétaire, Presqu\'île',
                'texte'        => 'Une prise en charge impeccable du premier jour. Sierra et son équipe sont d\'une rigueur et d\'une discrétion exemplaires — notre appartement n\'a jamais été aussi bien tenu.',
                'note'         => 5,
                'proprietaire' => true,
                'position'     => 1,
            ],
            [
                'nom'          => 'Antoine L.',
                'role'         => 'Propriétaire, Vieux Lyon',
                'texte'        => 'Le rendement a augmenté de 34% dès le premier trimestre. Communication fluide, reportings clairs, zéro stress de mon côté.',
                'note'         => 5,
                'proprietaire' => true,
                'position'     => 2,
            ],
            [
                'nom'          => 'Marie & Jules',
                'role'         => 'Voyageurs',
                'texte'        => 'Logement parfaitement entretenu, accueil chaleureux à l\'arrivée. On se sentait vraiment attendus. Le guide de l\'appartement était une très belle attention.',
                'note'         => 5,
                'proprietaire' => false,
                'position'     => 3,
            ],
            [
                'nom'          => 'Philippe D.',
                'role'         => 'Propriétaire, Croix-Rousse',
                'texte'        => 'J\'avais des doutes sur la gestion à distance. Maison Mathis m\'a prouvé qu\'avec les bons interlocuteurs, c\'est non seulement possible, mais serein.',
                'note'         => 5,
                'proprietaire' => true,
                'position'     => 4,
            ],
            [
                'nom'          => 'Sophie K.',
                'role'         => 'Voyageuse',
                'texte'        => 'Réponse en moins de 10 minutes à chaque message. Le check-in était fluide, le logement impeccable. Une expérience haut de gamme à un prix très juste.',
                'note'         => 5,
                'proprietaire' => false,
                'position'     => 5,
            ],
            [
                'nom'          => 'Nathalie R.',
                'role'         => 'Propriétaire, Confluence',
                'texte'        => 'Deux ans de collaboration et jamais une surprise désagréable. Les comptes sont toujours justes, les locataires soigneusement sélectionnés. Je recommande sans hésiter.',
                'note'         => 5,
                'proprietaire' => true,
                'position'     => 6,
            ],
        ];

        foreach ($avisList as $data) {
            $avis = new Avis();
            $avis->setNom($data['nom']);
            $avis->setRole($data['role']);
            $avis->setTexte($data['texte']);
            $avis->setNote($data['note']);
            $avis->setProprietaire($data['proprietaire']);
            $avis->setPosition($data['position']);
            $manager->persist($avis);
        }
    }
}
